<?php require_once('scytale.name.php'); lang('en de'); hdr(array('en' => 'Wishlist', 'de' => 'Wunschzettel')); ?>
<p><?php i18n(array('en' => '
	I helped you out with some computer related problem?
	You like the software, talks or other things I published and want to give something back?
	I was exceptionally good in bed last night?
	Or it\'s simply my birthday again and you don\'t know what to get for me?
	<em>Rejoice,</em> for you have found the way to my wishlist that tells you lots of ways for how to surprise me in a positive way.
	The items on this list are ordered by categories, not by price and neither by importance.
	Choose whatever you like, I\'ll be happy about everything.
', 'de' => '
	Ich hab dir bei einem Computerproblem geholfen?
	Dir gefällt die Software, ein Vortrag oder andere Dinge, die ich veröffentlicht habe, und du willst mir was zurück geben?
	Ich war letzte Nacht außergewöhnlich gut im Bett?
	Oder ist einfach mal wieder mein Geburtstag, und du weißt nicht, was du mir holen sollst?
	<em>Frohlocke,</em> denn du hast den Weg zu meinem Wunschzettel gefunden, der dir haufenweise Möglichkeiten verrät, mich auf positive Art zu überraschen.
	Die Dinge auf dieser Liste sind nach Kategorien sortiert, nicht nach Preis und auch nicht nach Wichtigkeit.
	Such dir aus, was auch immer du magst, ich freu mich über alles.
')); ?></p>
<p><?php i18n(array('en' => '
	To send a present to me, you\'ll most likely find having <a href=\'/contact/\' class=\'contact\'>my address</a> useful.
', 'de' => '
	Um mir ein Geschenk zu schicken, findest du es wahrscheinlich ganz praktisch, <a href=\'/contact/\' class=\'contact\'>meine Adresse</a> zu kennen.
')); ?></p>
<?php i18n(array('en' => '
	<p><a href=\'/wish/?LANG=DE\'>Diese Seite auf Deutsch. This page in German.</a></p>
')); ?>
<h2><?php i18n(array('en' => 'Music', 'de' => 'Musik')); ?></h2>
<ul>
	<li>Mike Oldfield<ul>
		<li>Music of the Spheres</li>
		<li>Ommadawn</li>
		<li><?php i18n(array('en' => 'and everything else except', 'de' => 'und alles andere außer')); ?> Tubular Bells 1/2/3/2003, Orchestral Tubular Bells, Five Miles Out, Amarok, Tr3s Lunas, The Millenium Bell</li>
	</ul></li>
	<li>Ralley<?php i18n(array('en' => ' (these albums might be hard to get, but a great present, even used CDs)', 'de' => ' (diese Alben sind schwer zu kriegen, aber ein großartiges Geschenk, sogar gebrauchte CDs)')); ?><ul>
		<li>Ralley</li>
	</ul></li>
</ul>
<h2><?php i18n(array('en' => 'Books', 'de' => 'Bücher')); ?></h2>
<?php i18n(array('en' => '<p>German versions, please, except if noted otherwise.</p>')); ?>
<ul>
	<li>Uwe Schütte: Basisdiskothek Rock und Pop</li>
</ul>

<!--<h2>DVDs</h2>
<p><?php i18n(array('en' => 'German versions, please, except if noted otherwise. If there are multiple versions available, please get me that with most bonus material.', 'de' => 'Falls es mehrere Versionen gibt, bitte die mit dem meisten Bonusmaterial.')); ?></p>
<ul>
	<li><em>Spaceballs</em> (1987)</li>
</ul>
-->
<!--<h2>Hardware</h2>
<ul>
	<li>Korg Kaoss Pad KP3</li>
</ul>-->
<?php i18n(array('de' => '
<h2>Haushalt</h2>
<ul>
	<li>FS20-Systemfunksteckdosen (eine oder zwei), bei Conrad (Sendegeräte hab ich bereits!)</li>
</ul>
')); ?>

<h2><?php i18n(array('en' => 'Money', 'de' => 'Geld')); ?></h2>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style='text-align:center;'>
<input type="hidden" name="cmd" value="_s-xclick"/>
<input type="hidden" name="hosted_button_id" value="9631037"/>
<input type="image" src="https://www.paypal.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal."/>
<img alt="" border="0" src="https://www.paypal.com/de_DE/i/scr/pixel.gif" width="1" height="1"/>
</form>
<p><?php i18n(array('en' => '
	Please <a href=\'/contact/\' class=\'contact\'>contact me</a> if you want to send me money.
	You may also use the PayPal button above or transfer money via PayPal to <a href=\'/contact/\' class=\'contact\'>my mail address</a>.
', 'de' => '
	Bitte <a href=\'/contact/\' class=\'contact\'>kontaktiere mich</a>, wenn du mir Geld schicken willst.
	Du kannst auch den PayPal-Button oben benutzen oder via PayPal Geld an <a href=\'/contact/\' class=\'contact\'>meine Mailadresse</a> senden.
')); ?></p>
<p><?php i18n(array('en' => '
	You can support the things I stand for by donating to a variety of organizations, for example the <a href=\'http://www.ccc.de/\'>Chaos Computer Club</a> or the <a href=\'http://www.fsfeurope.org/\'>Free Software Foundation Europe</a>.
', 'de' => '
	Du kannst die Dinge, für die ich stehe, durch Spenden an eine Vielzahl von Organisationen unterstützen, zum Beispiel den <a href=\'http://www.ccc.de/\'>Chaos Computer Club</a> oder die <a href=\'http://www.fsfeurope.org/\'>Free Software Foundation Europe</a>.
')); ?></p>

<?php ftr(); ?>
