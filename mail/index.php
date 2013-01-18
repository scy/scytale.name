<?php require_once('scytale.name.php'); lang('en de'); hdr(array('en' => 'Mail Services', 'de' => 'Maildienste')); ?>
<p><?php i18n(array('en' => "
	On this page you can find information about some rules of the " . sn() . " mail service, run by <a href='/contact/'>Tim Weber</a>, that is managing e-mail for several domains.
	If you have received a link to this page as an error message while you were trying to send an e-mail to one of my users, you can find additional explanations of what caused the error and what you can do to fix it here.
", 'de' => "
	Auf dieser Seite finden Sie Informationen über einige Regeln des " . sn() . "-Maildienstes, betrieben von <a href='/contact/'>Tim Weber</a>, der E-Mail für verschiedene Domains verwaltet.
	Falls Sie einen Link auf diese Seite als Fehlermeldung erhalten haben, während Sie versucht haben, einem meiner Benutzer eine E-Mail zu schreiben, dann finden Sie weitere Erklärungen darüber, was den Fehler verursacht hat und was Sie tun können, um ihn zu beheben, hier.
")); ?></p>
<h2 id='norelay'><?php i18n(array('en' => 'No relaying', 'de' => 'Kein Relaying')); ?></h2>
<p><?php i18n(array('en' => "
	The message <samp class='net-in'>This server won't relay for you</samp> means that you were trying to deliver an e-mail to my server with a recipient address for which it is not responsible.
	Please contact the correct mail server or ask your administrator about it.
	If you are sure that I am indeed responsible for the address you are trying to send mail to, please <a href='/contact/'>contact me</a>.
", 'de' => "
	Die Meldung <samp class='net-in'>This server won't relay for you</samp> bedeutet, dass Sie versucht haben, eine E-Mail an meinen Server einzuliefern, die eine Empfängeradresse trägt, für die er nicht zuständig ist.
	Bitte benutzen Sie den korrekten Mailserver oder fragen Sie bei Ihrem Administrator nach.
	Wenn Sie sicher sind, dass ich tatsächlich zuständig für die Adresse bin, an die Sie die E-Mail verschicken möchten, <a href='/contact/'>kontaktieren Sie mich</a> bitte.
")); ?></p>
<p><?php i18n(array('en' => "
	If you are a legitimate user of the " . sn() . " mail service, please activate SMTP authentication in your e-mail client software.
	If you have problems doing this, <a href='/contact/'>contact me</a>.
", 'de' => "
	Falls Sie ein berechtigter Benutzer des " . sn() . "-Maildienstes sind, aktivieren Sie bitte SMTP-Authentifizierung in Ihrer Mailclient-Software.
	Sollten Sie damit Probleme haben, <a href='/contact/'>kontaktieren Sie mich</a> bitte.
")); ?></p>
<h2 id='grey'>Greylisting</h2>
<p><?php i18n(array('en' => "
	The message <samp class='net-in'>Spam protection, please wait two minutes</samp> means exactly that:
	In two minutes, your message will be allowed to reach the desired recipients, please try again later.
	Note that you as a normal user don't have to re-send your e-mail; the mail server of your provider will do that automatically.
", 'de' => "
	Die Meldung <samp class='net-in'>Spam protection, please wait two minutes</samp> bedeutet genau das:
	In zwei Minuten wird Ihre Nachricht ihre gewünschten Empfänger erreichen dürfen, bitte versuchen Sie es später noch einmal.
	Beachten Sie, dass Sie als normaler Benutzer Ihre E-Mail nicht erneut versenden müssen; der Mailserver Ihres Providers wird dies automatisch tun.
")); ?></p>
<p><?php i18n(array('en' => "
	The idea behind this spam protection measure is that spammers usually don't care about retrying:
	If a message doesn't reach its recipient at the first try, the spammer moves on to the next victim, while real mail servers delivering real mail will try the delivery again some minutes later.
	Your first delivery attempt is noted down, and the second one will be allowed to pass through.
", 'de' => "
	Die Idee hinter dieser Schutzmaßnahme gegen Spam besteht darin, dass Spammer sich für gewöhnlich nicht um mehrere Zustellungsversuche kümmern:
	Wenn eine Nachricht ihren Empfänger nicht beim ersten Versuch erreicht, macht der Spammer beim nächsten Opfer weiter, während echte Mailserver, die echte Mails ausliefern, einige Minuten später einen zweiten Auslieferungsversuch starten werden.
	Ihr erster Zustellversuch wird notiert, der zweite wird dann durchgelassen.
")); ?></p>
<h2 id='nouser'><?php i18n(array('en' => 'User does not exist', 'de' => 'Benutzer existiert nicht')); ?></h2>
<p><?php i18n(array('en' => "
	If my mail server is responsible for the domain your mail is addressed to, but there is no such user, you will receive the error message <samp class='net-in'>No such user</samp>.
	Please check that the address you are trying to send your mail to is valid.
	If you are sure it is correct, or at least was once, <a href='/contact/'>contact me</a> please.
", 'de' => "
	Wenn mein Mailserver zwar verantwortlich ist für die Domain, an die Ihre Mail adressiert ist, aber es keinen entsprechenden Benutzer gibt, erhalten Sie die Fehlermeldung <samp class='net-in'>No such user</samp>.
	Bitte stellen Sie sicher, dass die Adresse, an die Sie Ihre Mail senden möchten, gültig ist.
	Wenn Sie genau wissen, dass sie korrekt ist oder es zumindest einmal war, <a href='/contact/'>kontaktieren Sie mich</a> bitte.
")); ?></p>
<h2 id='spamonly'><?php i18n(array('en' => 'Too much spam?', 'de' => 'Zu viel Spam?')); ?></h2>
<p><?php i18n(array('en' => "
	Some e-mail addresses become unusable because of spam attacks.
	If an address receives nothing but spam, its owner may choose to disable it.
	It can no longer receive any e-mails then, and all attempts are blocked with the message <samp class='net-in'>This address has been deactivated because of too much spam</samp>.
	If you really need to contact the person who owns that address, please <a href='/contact/'>ask me</a> for a working address.
", 'de' => "
	Einige E-Mail-Adressen werden aufgrund von Spam-Attacken unbenutzbar.
	Wenn eine Adresse nichts als Spam erhält, kann ihr Besitzer sich entscheiden, sie zu deaktivieren.
	Sie kann dann keine E-Mails mehr empfangen, und alle Versuche werden mit der Meldung <samp class='net-in'>This address has been deactivated because of too much spam</samp> abgelehnt.
	Wenn Sie trotzdem die Person, der diese Adresse gehört, erreichen müssen, <a href='/contact/'>fragen Sie mich</a> bitte nach einer funktionierenden Adresse.
")); ?></p>
<h2 id='malware'>Malware</h2>
<p><?php i18n(array('en' => "
	If you receive the message <samp class='net-in'>This message contains a virus or other malware</samp>, then my virus scanner identified a virus, a phishing attempt or other malicious software in your e-mail.
	Please check your system for possible virus infections.
", 'de' => "
	Falls Sie die Meldung <samp class='net-in'>This message contains a virus or other malware</samp> erhalten, hat mein Virenscanner einen Virus, Phishingversuch oder andere böswillige Software in Ihrer E-Mail erkannt.
	Bitte prüfen Sie Ihr System auf mögliche Vireninfektionen.
")); ?></p>
<h2 id='expn'><?php i18n(array('en' => 'No', 'de' => 'Kein')); ?> EXPN</h2>
<p><?php i18n(array('en' => "
	The command <code class='cmd'>EXPN</code> is not available for privacy reasons, sorry.
", 'de' => "
	Der Befehl <code class='cmd'>EXPN</code> ist leider aus Vertraulichkeitsgründen nicht verfügbar.
")); ?></p>
<?php ftr(); ?>
