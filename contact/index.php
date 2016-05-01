<?php require_once('scytale.name.php'); lang('en de'); hdr(array('en' => 'Contact', 'de' => 'Kontakt')); ?>
<h2><?php i18n(array('en' => 'Contact', 'de' => 'Kontakt')); ?></h2>
<p>
	<?php i18n(array('en' => 'My <strong>e-mail</strong> address is:', 'de' => 'Meine <strong>E-Mail-Adresse</strong> lautet:')); ?>
</p>
<p style='text-align:center; font-style:italic; font-size:150%; color:#8f4;'>s<!-- confused yet, spam bot? -->c<span class='sondela'><!-- maybe now. --></span>y-e<?php echo(($expire = date('ymd', time() + 604800))); ?>&#x40;scy.name</p>
<p><?php i18n(array('en' => '
	This address will <strong>expire</strong> in one week, starting from now, to protect me from spam.
	If you write to me, I will reply from my real address which does not expire.
	Alternatively, simply remove the “-e' . $expire . '” part.
', 'de' => '
	Diese Adresse <strong>wird ungültig</strong> in einer Woche, ab jetzt, um mich vor Spam zu schützen.
	Wenn Sie mir schreiben, werde ich mit meiner echten Mailadresse antworten, die nie ungültig wird.
	Alternativ denken Sie sich einfach den Teil „-e' . $expire . '“ weg.
')); ?></p>
<p><?php i18n(array('en' => '
	If you want to contact me via e-mail, please use a meaningful subject line, else your message might be deleted when I manually sort out the spam that got through my filter.
	Sending me anonymous e-mail is fine if you\'ve got a reason for it, but please use an e-mail address that accepts replies, even if I need not reply:
	The sender address of incoming mail is automatically checked for existence, and if it doesn\'t accept replies, the mail is automatically discarded in order to stop spam from spoofed sender addresses.
', 'de' => '
	Um mich per E-Mail zu erreichen, benutzen Sie bitte eine aussagekräftige Betreffzeile; ansonsten könnte Ihre Mail beim manuellen Aussortieren von Spam, der es durch meinen Filter geschafft hat, gelöscht werden.
	Mir wenn nötig eine anonyme Mail zu schicken ist kein Problem, aber benutzen Sie bitte eine Mail-Adresse, die Antworten empfangen kann, selbst wenn ich nicht antworten muss:
	Die Absenderadresse eingehender Mails wird automatisch auf Existenz geprüft, und wenn sie keine Antworten akzeptiert, wird die Mail zum Schutz vor Spam von gefälschten Absenderadressen automatisch verworfen.
')); ?></p>
<p>
	<?php i18n(array('en' => 'I receive <strong>"normal" mail</strong> at the following address:', 'de' => '<strong>"Normale" Post</strong> empfange ich an folgender Adresse:')); ?>
</p>
<pre class='postal' style='clear:both;'>
Tim Weber
Bethmannstr.&nbsp;17
60311 Frankfurt am Main
Germany
</pre>
<p><?php i18n(array('en' => '
	I can <em>currently not</em> be found in several <strong>IRC</strong> networks:
	<del>I am <em>Scytale</em> on Freenode, OFTC and Hackint, but <em>Scyta1e</em> (with the number "one" instead of an "L") on IRCNet.</del>
', 'de' => '
	Man findet mich <em>momentan nicht</em> in verschiedenen <strong>IRC</strong>-Netzwerken:
	<del>Ich bin <em>Scytale</em> auf Freenode, OFTC und Hackint, aber <em>Scyta1e</em> (mit der Zahl "eins" statt einem "L") im IRCNet.</del>
')); ?></p>
<p><?php i18n(array('en' => '
	Additionally, I am <a href="https://twitter.com/scy">scy on Twitter</a>, <a href="http://www.last.fm/user/Scy83">Scy83 on Last.fm</a> and <a href="http://www.facebook.com/Scy83">on Facebook</a>.
', 'de' => '
	Darüberhinaus bin ich <a href="https://twitter.com/scy">scy auf Twitter</a>, <a href="http://www.last.fm/user/Scy83">Scy83 bei Last.fm</a> und <a href="http://www.facebook.com/Scy83">in Facebook</a>.
')); ?></p>
<h2><?php i18n(array('en' => 'Imprint', 'de' => 'Impressum')); ?></h2>
<p><?php i18n(array('en' => '
	This private, non-commercial web site is being run by Tim Weber (address and phone number see above).
', 'de' => '
	Diese private, nichtkommerzielle Website wird betrieben von Tim Weber (Adresse und Telefonnummer siehe oben).
')); ?></p>
<p><?php i18n(array('en' => '
	Disclaimer: Even though I carefully check the contents of external web sites at the moment I create a link to them, I cannot be liable for their content.
	Only the operator of the other web site is responsible for its content.
', 'de' => '
	Haftungshinweis: Trotz sorgfältiger inhaltlicher Kontrolle zum Zeitpunkt der Verlinkung übernehme ich keine Haftung für den Inhalt fremder Websites.
	Für die Inhalte der Websites Dritter ist ausschließlich deren Betreiber verantwortlich.
')); ?></p>
<p><?php i18n(array('en' => '
	It is not my intention to violate other people\'s rights or break the law.
	If you think I have done this somewhere, please contact me via any of the methods listed above and we will find a fast, simple and uncomplicated solution.
	There is no need for lawyer bills of several hundred Euros.
', 'de' => '
	Es liegt nicht in meiner Absicht, die Rechte Anderer zu verletzen oder Gesetze zu brechen.
	Falls Sie denken, ich hätte das irgendwo getan, kontaktieren Sie mich bitte über einen der oben aufgeführten Wege.
	Wir werden dann eine schnelle, einfache und unkomplizierte Lösung finden.
	Es besteht kein Grund für Anwaltsrechnungen über mehrere hundert Euro.
')); ?></p>
<?php ftr(); ?>
