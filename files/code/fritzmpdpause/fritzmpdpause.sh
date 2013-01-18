#!/bin/sh

# fritzmpdpause.sh
# Tim 'Scytale' Weber, 2010/01/29. http://scytale.name/files/code/fritzmpdpause/
# Blog post: http://scytale.name/blog/2010/01/fritzmpdmute
# Public domain.
#
# You'll have to enable the call monitor by dialing #96*5* (disable: #96*4*).
# When starting this script, make sure no calls are currently active.
#
# Depends on sed and netcat being available as "nc".
# Does not need mpc or other MPD software on the host it runs on.
# MPD options are read from MPD_HOST and MPD_PORT variables as usual.

# First, parse MPD options.

# The host is everything after the last '@' character.
host="$(echo -n "$MPD_HOST" | grep -o '[^@]*$')"
# If none is set, it defaults to localhost.
[ -z "$host" ] && host=localhost

# The port defaults to 6600.
port="$MPD_PORT"
[ -z "$port" ] && port=6600

# The password is everything until the last @ character.
# If there is no @ in MPD_HOST, there is no password.
pass="$(echo -n "$MPD_HOST" | sed -n -e '/@/ s/@[^@]*$//p')"
# $pass is the complete password command (empty if not needed).
[ -n "$pass" ] && pass="password $pass"

# Run a command to MPD.
mpdcmd() {
	(echo "$pass"; echo "$*"; echo close) | nc "$host" "$port"
}

# Get the current play status.
mpdstatus() {
	mpdcmd status | sed -n -e 's/^state: //p'
}

# Now, loop until we are killed.
while true; do
	# When initially connecting, we have to assume that there are no calls.
	active=''
	# Connect to the call monitor and read events.
	# The Fritz!Box is always at 169.254.1.1.
	nc 169.254.1.1 1012 | while read -r event; do
		# If we currently don't have any calls, note down the play state.
		# $werenone keeps track whether there were any before handling.
		if [ -z "$active" ]; then
			orig="$(mpdstatus)"
			werenone='y'
		else
			werenone='n'
		fi
		# Debug output.
		echo "$orig '$active' $werenone $event"
		# Parse type and connection ID.
		type="$(echo "$event" | cut -d ';' -f 2)"
		id="$(echo "$event" | cut -d ';' -f 3)"
		case "$type" in
		RING|CALL)
			# A new call, add it to the list.
			active="$active<$id>"
			;;
		DISCONNECT)
			# A call ended, remove it from the list.
			active="$(echo -n "$active" | sed -s "s/<$id>//")"
			;;
		esac
		if [ "$werenone" = 'y' -a -n "$active" -a "$orig" = 'play' ]; then
			# If there were no calls before we handled and now there are
			# and MPD is currenty playing, pause.
			echo pausing
			mpdcmd pause 1 >/dev/null
		elif [ -z "$active" -a "$orig" = 'play' -a "$(mpdstatus)" = 'pause' ]; then
			# If there are no calls left, MPD was originally playing and
			# has not been manually stopped in the meantime, resume.
			echo resuming
			mpdcmd pause 0 >/dev/null
		fi
	done
	# If we come here, we were disconnected from the box. Retry slowly.
	sleep 1
done
