<?php require_once('scytale.name.php'); lang('en de'); hdr(array('en' => 'Projects', 'de' => 'Projekte')); ?>

<p><?php i18n(array('en' => '
	I\'ve worked on a large variety of software projects.
	Most of them are too small, too hackish or too custom to be released, but every once in a while there\'s something that can be useful to the public.
	These are the projects you find here.
', 'de' => '
	Ich habe an einer großen Vielfalt von Softwareprojekten gearbeitet.
	Die meisten von ihnen sind zu klein, zu gefrickelt oder zu sehr auf meine Bedürfnisse zugeschnitten, um sie zu veröffentlichen, aber von Zeit zu Zeit gibt es welche, die für die Öffentlichkeit nützlich sein könnten.
	Das sind die Projekte, die du hier findest.
')); ?></p>
<dl>
<dt><a href='/git/' class='proj'><?php i18n(array('en' => 'my Git repositories', 'de' => 'meine Git-Repositories')); ?></a></dt>
<dd><?php i18n(array('en' => '
	I prefer using the <a href=\'http://git.or.cz/\'>Git</a> or <a href=\'http://subversion.tigris.org/\'>Subversion</a> version control systems when developing software.
	Since not every project is big enough to get its own web page (or simply because I lack the time to document it), I\'ve put some of my Git repositories online for you to browse.
	They contain for example <a href=\'/git/scytools.git/\' class=\'proj\'>some little tools</a> or <a href=\'/git/dotscy.git/\' class=\'proj\'>my configuration files</a>.
	If you have any questions, <a href=\'/contact/\' class=\'contact\'>just ask</a>.
', 'de' => '
	Ich arbeite am liebsten mit den Versionskontrollsystemen <a href=\'http://git.or.cz/\'>Git</a> oder <a href=\'http://subversion.tigris.org/\'>Subversion</a>, wenn ich Software entwickle.
	Da nicht jedes Projekt groß genug ist, um seine eigene Webseite zu bekommen (oder weil mir schlicht die Zeit fehlt, es zu dokumentieren), habe ich einige meiner Git-Repositories online gestellt.
	Sie enthalten zum Beispiel <a href=\'/git/scytools.git/\' class=\'proj\'>einige kleine Tools</a> oder <a href=\'/git/dotscy.git/\' class=\'proj\'>meine Konfigurationsdateien</a>.
	Falls du Fragen hast, <a href=\'/contact/\' class=\'contact\'>frag einfach</a>.
')); ?></dd>
<dt><a href='qb/' class='proj'>qb</a></dt>
<dd><?php i18n(array('en' => '
	A simple, fast and secure database-less blogging system.
	This is what\'s running <a href=\'/blog/\' class=\'blog\'>my blog</a> and some others.
	Currently development has stopped due to a lack of time.
', 'de' => '
	Ein einfaches, schnelles und sicheres datenbankfreies Blogsystem.
	Es steckt hinter <a href=\'/blog/\' class=\'blog\'>meinem Blog</a> und einigen anderen.
	Momentan wird es aus Zeitmangel nicht weiterentwickelt.
')); ?></dd>
<dt><a href='/files/code/' class='files'><?php i18n(array('en' => 'code snippets', 'de' => 'Codeschnipsel')); ?></a></dt>
<dd><?php i18n(array('en' => '
	If you are really adventurous, you can check out some old, unsorted, undocumented and maybe broken code snippets as well.
	Don\'t blame me if it doesn\'t work (although it would be nice if you tell me about it).
', 'de' => '
	Wenn du wirklich abenteuerlustig bist, kannst du dir ein paar alte, unsortierte, undokumentierte und vielleicht kaputte Codeschnipsel anschauen.
	Beschwer dich nicht wenn was nicht funktioniert (obwohl es nett wäre, wenn du mir Bescheid sagst).
')); ?></dd>
</dl>

<?php ftr(); ?>
