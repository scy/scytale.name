<?php require_once('scytale.name.php'); lang('de'); hdr('Benutzen einer offenen Mailingliste'); ?>
<p>Am Beispiel von <a href='http://www.ccc.de/mailinglists/debate'>debate@lists.ccc.de</a>.</p>
<p>
	Von <a href='http://scytale.name/'>Tim Weber</a> im September 2007 geschrieben.
	Es gibt inzwischen eine <a href='#history'>Versionsgeschichte</a>.
	Kopieren und zitieren (auch auszugsweise) bitte nur mit Link auf <a href='http://scytale.name/files/doc/list-faq/'><tt>http://scytale.name/files/doc/list-faq/</tt></a>.
	Anregungen und Kritik bitte an <a href='mailto:scy-doc-listfaq@scytale.name'><tt>scy-doc-listfaq@scytale.name</tt></a>.
	Fragen bitte nur, wenn man sie nicht durch das Benutzen einer Suchmaschine oder seines Verstandes selbst beantworten kann, die <a href='http://www.lugbz.org/documents/smart-questions_de.html'>Regeln für kluge Fragen</a> finden auch hier Anwendung.
	Unnötige Fragen werden ignoriert.
</p>
<p>
	Womöglich hilft dir auch die weniger geschwätzige <a href='http://fdik.org/debate-faq'>Debate-FAQ von Volker</a> weiter.
</p>

<h2 id='offen'>Was bedeutet "offene" Mailingliste?</h2>
<p>
	Das bedeutet, dass jeder eine Mail an die Liste schicken kann, die dann an alle Abonnenten verteilt wird.
	Es gibt auch <em>moderierte</em> Listen, bei denen alle Mails vorher von einem oder mehreren Moderatoren geprüft werden, bevor sie verteilt werden.
	Und es gibt <em>geschlossene</em> oder <em>Announcement-</em>Listen, bei denen der Kreis der Personen, die Mails an die Liste schreiben dürfen, eingeschränkt ist.
	Alle anderen Mitglieder dürfen nur zuhören, was der erlauchte Kreis an Informationen verteilt (z.B. neue Releases von Software etc.).
</p>

<h2 id='lesen'>Meine Mails gehen also direkt an alle? Cool.</h2>
<p>
	Es ist überraschend, wie schnell der CCC-Listenserver die Mails an hunderte Empfänger verteilt.
	Innerhalb weniger Sekunden kannst du als Idiot dastehen, wenn du beim Verfassen deiner Mail irgendwelchen Unsinn geschrieben hast.
	Deshalb solltest du deine Mails <em>vor dem Absenden nochmals durchlesen</em>.
	Achte besonders auf folgende Punkte:
</p>
<ul>
	<li>Stimmt der <a href='#an'>Empfänger</a>?</li>
	<li>Stimmt der <a href='#von'>Absender</a>?</li>
	<li>Mach ich auch die <a href='#thread'>Threads</a> nicht kaputt?</li>
	<li>Habe ich (nur) den relevanten Teil korrekt <a href='#quote'>zitiert</a>?</li>
	<li>Stimmt der <a href='#betreff'>Betreff</a> noch?</li>
	<li>Ist die <a href='#stil'>Rechtschreibung und Grammatik</a> sowie die <a href='#format'>Formatierung</a> in Ordnung?</li>
	<li>Ist das überhaupt <a href='#topic'>on-topic</a>?</li>
</ul>
<p>
	Die einzelnen Punkte werden im Folgenden erklärt.
</p>

<h2 id='warum'>Moment. Warum sollte ich mich an deine Regeln überhaupt halten?</h2>
<p>
	Ich (der Autor) bin auf Debate auch nur ein normaler User.
	Allerdings hab ich jahrelange Erfahrung mit der Liste und kann dir versichern, dass das Einhalten dieser Regeln auch dir persönlich einiges bringt.
	Denn folgendes wird wahrscheinlich passieren, wenn du sie nicht befolgst (in Klammern die beliebtesten Gründe für die beschriebene Reaktion):
</p>
<dl>
	<dt>Du gehst Leuten auf die Nerven. (<a href='#topic'>Topic</a>, <a href='#stil'>Stil</a>)</dt>
	<dd>Das bedeutet, sie werden dich entweder ignorieren, angreifen oder nicht mit dem von dir wahrscheinlich erwünschten Respekt behandeln. Und zwar zurecht, denn durch das Ignorieren der Regeln behandelst auch du sie nicht mit dem nötigen Respekt.</dd>
	<dt>Du stehst als Idiot da. (<a href='#stil'>Stil</a>, <a href='#topic'>Topic</a>)</dt>
	<dd>Auf der Debate tummeln sich viele <a href='http://koeln.ccc.de/prozesse/writing/artikel/hacker-howto-esr.xml'>Hacker</a>. In Hackerkreisen wird man danach behandelt, was man tut; nicht etwa wer man ist, wen man kennt oder wieviel Geld man hat. Wenn du dir offensichtlich keine Mühe gibst, in verständlichem Deutsch zu schreiben; wenn du sichtbar keine Ahnung von dem hast, was du erzählst; wenn du anderen Leuten auf die Füße trittst, die das nicht verdient haben, dann wird man dir das sehr deutlich zu verstehen geben. Und dich weniger ernst nehmen, als du dir das erhoffst.</dd>
	<dt>Du wirst nicht gelesen. (<a href='#topic'>Topic</a>, <a href='#quote'>Zitate</a>, <a href='#stil'>Stil</a>)</dt>
	<dd>Führ dir vor Augen, wofür du deine Mails überhaupt schreibst: Du willst, dass sie jemand liest. Aus diesem Grund solltest du es den anderen auch <a href='#stil'>angenehm</a> machen, dich zu lesen. Wenn man den Eindruck bekommt, dass bei deinen Mails eigentlich nie was Lesenswertes dabei ist, wird man sie auch nicht lesen.</dd>
	<dt>Du wirst ignoriert. (<a href='#topic'>Topic</a>, <a href='#stil'>Stil</a>)</dt>
	<dd>Spätestens, wenn dir jemand ein <a href='http://de.wikipedia.org/wiki/Killfile'>Plonk</a> entgegenwirft, solltest du dir überlegen, ob du dich nicht irgendwie falsch verhältst. Wenn du nicht nur "manuell überlesen", sondern tatsächlich maschinell aus dem Sichtfeld von Leuten verschwindest, kannst du so sehr schreien und protestieren wie du willst, es wird nichts mehr helfen. (Übrigens, mit anderen Absenderadressen und Ähnlichem zu versuchen, dem Killfile zu entrinnen, ist eine ziemlich blöde Idee und bringt dir nur <em>noch</em> mehr Probleme ein. Find dich damit ab.)</dd>
</dl>

<h2 id='an'>An wen schreibe ich die Mail?</h2>
<p>
	Überlege dir zuerst, ob deine Mail überhaupt an die Liste soll.
	Denn wenn sie nichts enthält, <a href='#topic'>was die Listenmitglieder interessiert</a>, solltest du sie nur an die Person schicken, der du antwortest.
	Beziehungsweise, für den Fall dass deine Mail gar keine Antwort ist sondern du ein neues Thema anfangen willst:
	Wenn du der Meinung bist, dass sie die Abonnenten nicht interessiert, solltest du sie schlicht und ergreifend nicht schicken.
</p>
<p>
	Wenn du dich entschlossen hast, deine Mail an die Liste zu schicken, dann sollten die drei Empfängerfelder, die dir deine Mailsoftware bietet (nämlich <em>To:</em>, <em>Cc:</em> und <em>Bcc:</em> bzw. bei deutschen Versionen <em>An</em>, <em>Kopie</em> und <em>Blindkopie</em>) so belegt sein, dass im <em>To:</em> die Adresse der Liste steht (bei der Debate also <tt>debate@lists.ccc.de</tt>, vgl. auch "<a href='#listspunkt'>lists.?</a>"), während die anderen beiden Felder leer sind.
	Du solltest dir ansehen, <a href='#muareply'>was man dafür am besten anklickt</a> und <a href='#keinekopie'>warum der Vorposter darin nicht auftauchen sollte</a>.
</p>

<h2 id='muareply'>Wie schreibe ich eine Antwort mit <em>Mailprogramm XY</em>?</h2>
<p>
	(Hier geht es vorrangig darum, wie man am einfachsten <a href='#an'>die richtigen Empfänger</a> auswählt. Du solltest zusätzlich noch schauen, dass du <a href='#thread'>die Threads nicht kaputt machst</a>.)
</p>
<ul>
	<li>Falls deine Mailsoftware die Funktion "an Liste antworten" hat, benutze sie. (Für Thunderbird gibt es anscheinend die Extension <a href='http://www.juergen-ernst.de/addons/replytolist.html'>ReplyToList</a>, die das kann.)</li>
	<li>Falls du die Funktion "an alle antworten" oder "Gruppe antworten" hast, benutze diese, und entferne die Person, auf die du antwortest, aus der Liste der Empfänger (<a href='#keinekopie'>warum?</a>). Es sollte nur noch die Adresse der Liste übrig bleiben, und zwar im <em>To:</em>- bzw. <em>An</em>-Feld. Wenn sie da nicht steht, sondern beispielsweise unter <em>Cc:</em> (<em>Kopie</em>) oder <em>Bcc:</em> (<em>Blindkopie</em>), verschiebe sie in das <em>To:</em>-Feld, um schlechte <a href='#filter'>Filterregeln</a> nicht zu überlisten.</li>
	<li>Falls du nicht mal eine solche Funktion hast, wirf am besten deine Mailsoftware weg. Wenn das keine Option ist, klick auf "antworten" und trag statt der Person, auf die du dich beziehst, die Listenadresse ein.</li>
</ul>
<p>
	Jetzt sollte <a href='#an'>der Empfänger</a> stimmen, kontrollier das am besten nochmal.
</p>

<h2 id='von'>Wie muss der Absender aussehen?</h2>
<p>
	Da auf Debate nur Listenmitglieder Mails versenden dürfen, musst du von der selben Mailadresse aus schreiben, mit der du die Liste auch abonniert hast, ansonsten bekommst du eine Fehlermeldung zurück.
</p>
<p>
	Außerdem solltest du deinen echten Namen angeben.
	Erstens gehört das zum guten Ton, zweitens sind viele Nicknames schlicht lächerlich, drittens solltest du zu dem stehen, was du sagst, und viertens finden "sie" dich sowieso, auch wenn du einen falschen Namen benutzt.
</p>

<h2 id='thread'>Was sind diese Threads und wie halte ich sie intakt?</h2>
<p>
	<em>(Im Folgenden eine ausführliche Erklärung. Für eilige Leser: Wenn du ein komplett neues Thema diskutieren willst, klick auf "neue Mail" und trag als Empfänger die Listenadresse (also <tt>debate@lists.ccc.de</tt>) ein. Klick <strong>nicht</strong> auf "antworten" bei einer bestehenden Mail und ändere den Betreff ab: Auch wenn du den Unterschied wahrscheinlich nicht siehst, so wird es sich bei deiner Mail dann nicht um ein neues Thema, sondern um eine Antwort auf die bestehende Mail handeln. Ja, selbst wenn du den Betreff änderst.)</em>
</p>
<p>
	Die meisten Leute, die auf Mailinglisten diskutieren, erleichtern sich den Überblick, indem sie sich die Mails in einer Baumstruktur anzeigen lassen, statt einfach in Eingangsreihenfolge.
	Dabei wird dann eine Mail, die eine Antwort auf eine andere ist, unterhalb der Ursprungsmail eingerückt dargestellt:
</p>
<p style='text-align:center;'><img src='thread.jpg' alt='Baumansicht' width='605' height='391'/></p>
<p>
	<em>(Bevor die Frage aufkommt: Bei Antworten mit dem selben Betreff wird dieser nicht nochmal angezeigt; Dunkelblau steht für Mails von mir, Cyan für signierte Mails; das ist <a href='http://www.mutt.org/'>Mutt</a> in einer pseudotransparenten <a href='http://konsole.kde.org/'>Konsole</a> mit meinem momentanen Hintergrundbild, das eine Knospenschale auf einem bemoosten Stein zeigt (Nahaufnahme).)</em>
</p>
<p>
	Das Wort "Thread" (englisch für "Faden") bezeichnet dabei alle im selben Baum liegenden Mails, also alle, die sich auf die selbe Ursprungsmail beziehen oder, anders formuliert, alle die sich um das selbe Thema drehen.
	Im Beispiel oben hat Bettina einen neuen Thread mit Betreff <em>Demo gegen Überwachung am 22.09.2007 (Sonderbusse)</em> gestartet, Celia hat darauf geantwortet, und auf diese Antwort von Celia beziehen sich dann wieder Bettina (Mail 1902), michel (Mail 1905), Volker (Mail 1926), Alexander (Mail 1930) und Celia selbst (z.B. für eine Korrektur, Mail 1938).
	Diese Antworten haben dann wieder Unterbäume.
</p>
<p>
	Um diese Baumstruktur aufbauen zu können, braucht ein Mailprogramm die Information, auf welche Mail sich eine Antwort bezieht.
	Das geschieht <em>nicht</em> durch die Betreffzeile (auch wenn einige Mailer diese Möglichkeit bieten, die aber bei sich ändernden Betreffzeilen oder sehr ähnlichen Zeilen aus verschiedenen Threads versagt), sondern durch drei Felder im <a href='#header'>Header</a> einer Mail: <em>Message-ID</em>, <em>In-Reply-To</em> und <em>References</em>.
	Im Header von Bettinas Mail findet sich folgende Zeile:
</p>
<pre>Message-Id: &lt;20070903140901.3f06844f.twister@stop1984.com&gt;</pre>
<p>
	Wie diese Message-ID jetzt genau aufgebaut ist, ist erstmal unerheblich und wird <a href='#message-id'>in einem eigenen Abschnitt</a> beleuchtet.
	Wichtig ist nur, dass in Celias Antwort unter anderem folgende Zeilen im Header stehen:
</p>
<pre>Message-ID: &lt;46DC5CE1.1050004@sonnenkinder.org&gt;
References: &lt;20070903140901.3f06844f.twister@stop1984.com&gt;
In-Reply-To: &lt;20070903140901.3f06844f.twister@stop1984.com&gt;</pre>
<p>
	Hier sieht man, das sowohl in <em>References</em> als auch in <em>In-Reply-To</em> die Message-ID von Bettinas Mail auftaucht, während Celias Antwort selbst eine komplett andere Message-ID trägt.
	Durch den Verweis auf Bettinas Message-ID kann nun ein kluges Mailprogramm diese Mail in einer Baumansicht unterhalb von Bettinas Mail einsortieren.
	Den Unterschied zwischen <em>References</em> und <em>In-Reply-To</em> sieht man, wenn man noch eine Ebene tiefer geht, zum Beispiel zu der Mail von michel.
	Dort steht:
</p>
<pre>Message-Id: &lt;BB568E72-F900-442A-8041-29B715B72F57@kinra.de&gt;
In-Reply-To: &lt;46DC5CE1.1050004@sonnenkinder.org&gt;
References: &lt;20070903140901.3f06844f.twister@stop1984.com&gt; &lt;46DC5CE1.1050004@sonnenkinder.org&gt;</pre>
<p>
	Auch seine Mail hat eine komplett neue Message-ID und bezieht sich bei <em>In-Reply-To</em> auf Celias Mail.
	Hier wird aber der Sinn von <em>References</em> deutlich:
	Dort finden sich nämlich <em>alle</em> "Elternmails".
	So könnte ein Mailprogramm selbst dann, wenn die Mail von Celia aus irgendwelchen Gründen nicht empfangen oder gelöscht oder ignoriert wurde, trotzdem noch erkennen, dass sie zum von Bettina eröffneten Thread gehört.
</p>
<p>
	Und woher weiß jetzt dein Mailprogramm, wenn du eine neue Mail verfasst, auf welche Mail du antwortest (wenn überhaupt)?
	Ganz einfach:
	Wenn du bei einer beliebigen Mail auf "antworten" klickst, wird deren Message-ID automatisch als <em>In-Reply-To</em> übernommen und ein passendes <em>References</em> generiert.
	Bei vielen Programmen bekommst du das nicht angezeigt und kannst es erst recht nicht ändern, sodass selbst dann, wenn du das (automatisch eingefügte) Zitat entfernst und den Betreff komplett abänderst, deine Mail immer noch eine Antwort auf die Mail, bei der du "antworten" geklickt hast, darstellt.
	Sie wird dann auch unterhalb dieser Mail angezeigt, obwohl du einen komplett neuen Thread erstellen wolltest.
	Das nennt man <em>"Threads hijacken"</em> (bzw. "kapern") und wird nicht gern gesehen, da es den Lesefluss stört, Arbeit für den Leser bedeutet (der die Threads auseinanderpfriemeln muss) und auch zu Problemen mit Ignorier- und Beobachtungsfunktionen führen kann (siehe übernächster Absatz).
</p>
<p>
	Ebenfalls häufig beobachtet wird das Gegenteil, nämlich das <em>Sprengen</em> oder <em>Auseinanderreißen</em> von Threads.
	Das passiert entweder dann, wenn du nicht auf "antworten" klickst, um eine Mail zu beantworten, sondern auf "neue Mail" (was, zugegebenermaßen, kaum jemand tut, weil es zusätzliche Arbeit bedeutet), oder wenn dein Mailprogramm schlicht das Setzen von <em>In-Reply-To</em> und/oder <em>References</em> nicht unterstützt.
	In diesem Fall bleibt dir nichts anderes übrig, als deine Mailsoftware zu ändern, oder du wirst jedem tierisch auf den Sack gehen.
	<a href='#warum'>Die Folgen davon</a> kennst du ja.
	(Ich habe eine kleine <a href='#clients'>Liste guter und schlechter Clients</a> zusammengestellt.)
	Übrigens gibt es noch einen dritten Grund:
	Wenn die Person, auf die du dich beziehst, <a href='#message-id'>keine Message-ID</a> setzt, fällt das ganze System auseinander.
	Dafür kannst du nichts, du solltest auf solche arme Seelen schlicht und ergreifend nicht antworten und ihnen einen Hinweis als private Mail schicken.
</p>
<p>
	Die Frage, was dir persönlich es bringt, auf die Baumstrukturen anderer zu achten, ist übrigens auch wieder mit dem üblichen Totschlagargument "du willst gelesen werden" beantwortet.
	Denn erstens erwartet dich <a href='#warum'>der Zorn der alten Hasen</a>, und zweitens haben einige Mailprogramme auch Funktionen zum Ignorieren oder Beobachten einzelner Threads.
	Wenn du in einem Thread, den jemand in seinem Mailer auf "ignorieren" gesetzt hat, einen neuen aufmachst, wird derjenige davon nichts mitbekommen.
	Du wirst also potentiell von weniger Leuten gelesen.
	Und wenn du einen für bestimmte Leser "unwichtigen" Thread in einem aufmachst, den sie "beobachten", werden sie um so stinkiger auf dich sein.
</p>

<h2 id='quote'>Was sollte ich zitieren und wie?</h2>
<p>
	Das haben andere Leute bereits sehr gut beantwortet, wenn auch für das <a href='http://de.wikipedia.org/wiki/Usenet'>Usenet</a> und nicht für Mailinglisten.
	Bis ich die Zeit finde, hier einen eigenen Abschnitt darüber zu schreiben, lies bitte <a href='http://www.afaik.de/usenet/faq/zitieren/'>Wie zitiere ich im Usenet?</a>
</p>

<h2 id='betreff'>Wie hat die Betreffzeile auszusehen?</h2>
<p>
	Die Betreffzeile (das <em>Subject</em>) ist das Aushängeschild deiner Mail.
	Sie entscheidet, ob die Mail von einem potentiellen Leser überhaupt geöffnet wird oder nicht.
	Deshalb solltest du eine aussagekräftige Betreffzeile verwenden, die den Inhalt deiner Mail beschreibt, auch wenn du damit eine mögliche <a href='http://de.wikipedia.org/wiki/Pointe'>Pointe</a> vorwegnimmst.
	Schreib also statt <em>Hehehe, voll lustig</em> lieber <em>Video mit Schäuble-Versprechern</em> und lass die Leute selbst entscheiden, ob es lustig ist.
	Auch solltest du keine Betreffzeilen verwenden, die für den Empfänger sowieso klar sind:
	So ist z.B. der Betreff <em>An alle Abonnenten der CCC-Debate</em> totaler Schwachsinn, wenn du ihn in einer Mail an die Liste benutzt, denn allein die Tatsache, dass du deine Mail dorthin schickst, sagt ja bereits aus, das sie für alle Abonnenten gedacht ist.
</p>
<p>
	Ein bisschen strukturierter mal ein paar Regeln für Antworten:
</p>
<ul>
	<li>Wenn du auf eine Mail antwortest, dann benutze in der Betreffzeile den Anfang "<tt>Re: </tt>" und dann den Betreff der Mail, auf die du dich beziehst, also z.B. beim Antworten auf die Mail <em>Eure Lieblingsdistribution</em> sollte dein Betreff <em>Re: Eure Lieblingsdistribution</em> heißen.</li>
	<li>Wenn du auf eine Mail antwortest, der bereits ein <em>Re:</em> vorangestellt ist, schreib nicht noch eins davor. Nur <strong>ein</strong> <em>Re:</em>, nicht mehr. Gute Mailsoftware erkennt das automatisch und fügt beim Antworten kein weiteres ein.</li>
	<li>Das Prefix heißt <strong>Re:</strong>, sonst nichts. Das deutsche <em>Aw:</em> (oder <em>AW:</em>) ist verpönt, selbst auf Listen, auf denen ausschließlich deutsch gesprochen wird. Der Grund dafür hängt mit dem vorherigen Punkt zusammen: Um ein zweites <em>Re:</em> zu verhindern, muss eine Mailsoftware erkennen, dass bereits ein Antwortpräfix vorhanden ist. Jetzt stell dir den Aufwand vor, das für alle Antwortpräfixe aller Sprachen der Welt zu programmieren.</li>
	<li>Schnickschnack wie <em>Re[3]:</em> (mit der Bedeutung "dritte Antwort") oder Ähnliches verlängert den Betreff unnötig und bringt keine Mehrinformation. Toll wenn deine Software das kann. Schalt es trotzdem ab.</li>
	<li>Wenn der Betreff deines Threads gerade geändert wurde (siehe nächster Absatz), die Mail auf die du antwortest also ein Suffix <em>(was: ...)</em> enthält, entferne dieses Suffix, sonst wird es unübersichtlich; der Themenwechsel ist jetzt ja angekündigt. Gute Mailsoftware macht das von alleine.</li>
</ul>
<p>
	Es gibt einige wenige Gründe, den <em>Betreff in einem Thread zu ändern</em>:
</p>
<ul>
	<li>Wenn das Thema inzwischen abgedriftet ist, ist es gut, wenn du den Betreff änderst. Füge zusätzlich den alten Betreff in runden Klammern und mit dem Präfix <em>was:</em> (englisch für "war"; auch hier gilt, dass du <em>kein</em> deutsches "war:" benutzen sollst) ein. Entferne dabei auch das eventuell vorhandene <em>Re:</em>. So kannst du beispielsweise auf eine Mail mit Betreff <em>Re: Stoiberwitze</em> eine Antwort verfassen, die mit <em>Respekt vor Politikern (was: Stoiberwitze)</em> betitelt ist, wenn du darüber weiterdiskutieren willst. Benutze runde Klammern, keine eckigen oder sonstwas, damit gute Mailsoftware beim Antworten auf <em>deine</em> Mail das <em>(was: ...)</em> automatisch entfernen kann.</li>
	<li>Wenn sich jemand nicht an die Regeln gehalten hat: Eine Mail mit Betreff <em>Re: AW: Re[4]: Die Milka-Kuh (was: Eutergroessen)</em> darfst (und sollst!) du mit dem Betreff <em>Re: Die Milka-Kuh</em> beantworten.</li>
</ul>
<p>
	Ein Hinweis noch:
	Umlaute und Sonderzeichen im Betreff einer Mail verursachen manchmal technische Probleme.
	Es gibt auch keine einhellige Meinung, ob sie überhaupt erlaubt sein sollten oder nicht.
	Um zusätzliche Sympathiepunkte bei denjenigen zu sammeln, die eventuell mit diesen technischen Problemen zu kämpfen haben, solltest du einfach keine Umlaute und Sonderzeichen im Betreff verwenden.
</p>

<h2 id='stil'>Sind Rechtschreibung, Grammatik, Zeichensetzung und so denn sooo wichtig?</h2>
<p>
	Das kommt darauf an, ob du gelesen werden willst oder nicht.
	schau dir diesen txet an hättest du inh gelesen wenn er net in verstndlcihem deutsch wär oder so weil schlieslich is das ja also ne mailingliste ja net da um sich was von der sele zu schreiben sondern weil du ja willst das dich anere lesen, ne?!!!??!
</p>
<p>
	Das was du zu sagen hast ist in den meisten Fällen nicht so wichtig, als dass es den zusätzlichen Aufwand, deinen Text erstmal zu "entschlüsseln", rechtfertigen würde.
	Insbesondere dann nicht, wenn du eine Frage stellst!
	Erwarte nicht, dass dir jemand irgendwie hilft, wenn er einen eilig hingerotzten Text zu lesen bekommt.
	Du wirst nur verspottet oder ignoriert werden.
	(Bei Fragen solltest du übrigens vorher <a href='http://www.lugbz.org/documents/smart-questions_de.html'>Wie man Fragen richtig stellt</a> durchlesen.)
	Also, halt dich an folgende Regeln:
</p>
<ul>
	<li>Setze Punkte, Fragezeichen, Ausrufezeichen und Kommas dort, wo sie hingehören.</li>
	<li>Insbesondere für Ausrufezeichen und Fragezeichen gilt: Setze nur eines, denn spätestens ab drei hintereinander wird's lachhaft!!!!!!!!!!!!!!</li>
	<li>Benutze Groß- und Kleinschreibung.</li>
	<li>Fang an den richtigen Stellen einen neuen Absatz an.</li>
	<li>"Ich hab's eilig" ist so ziemlich die schlechteste Entschuldigung, die du benutzen kannst, denn wenn du dir nicht die Zeit nimmst, irgendetwas brauchbar zu formulieren, warum sollten sich dann hunderte Leute die Zeit nehmen, es zu lesen?</li>
	<li>Wenn du es schlicht und ergreifend nicht besser <em>kannst</em> (Legasthenie o.Ä.), dann streng dich trotzdem an. Den Unterschied zwischen "ich kann nicht" und "ich will nicht" sieht man.</li>
</ul>
<p>
	Und nochwas:
	Von den "alten Hasen" kommen teilweise ziemlich dreiste Aussagen.
	Gerade unter Hackern sind Sätze wie "Du willst dir XY nochmal durchlesen", "Komm wieder wenn du weißt wovon du redest" und ähnliche herablassende Unfreundlichkeiten ganz normal, und meistens haben diese Leute auch noch Recht mit dem, was sie sagen.
	Lass dich davon nicht provozieren oder fertigmachen, aber vor allem:
	Antworte nicht im selben Ton, wenn du es dir nicht erlauben kannst.
	Wenn du ein arrogantes Großmaul bist, das außer Dummschwätzen nichts kann, wird spätestens auf einer Liste wie der Debate dieses Verhalten nicht mehr funktionieren.
	Die Leute werden dir Kontra geben.
	Sie werden im Recht sein.
	Und sie werden auf klägliche Versuche, Ahnungslosigkeit durch Ego zu kaschieren, nicht mal reagieren.
</p>
<p>
	Wenn du stattdessen mit Respekt an die Leute herangehst, wird es dir um einiges leichter fallen, Fuß zu fassen.
	Lass dich nicht entmutigen, und nimm's nicht so schwer, wenn du auf der Liste zurechtgewiesen wirst.
</p>

<h2 id='format'>Gibt es "gestalterische" Vorgaben?</h2>
<p>
	In der Tat.
	Und die lauten: So wenig "Gestaltung" wie möglich, aber so viel wie nötig.
</p>
<p>
	Absolut verpönt sind HTML-Mails, also solche mit verschiedenen Farben, eingebetteten Bildern, Hintergrundtapeten, verschiedenen Schriftarten und Gott weiß was.
	Das liegt nicht ausschließlich daran, dass viele Listenteilnehmer Mail-Benutzer der "alten Schule" sind, die solchen Schickschnack schlicht für unnötig halten:
	HTML-Mails brauchen wesentlich mehr Platz (was gerade bei der Verteilung an tausende Menschen deutlich ins Gewicht fällt), können nicht in allen Mailprogrammen korrekt angezeigt werden, werden manchmal eher als Spam eingestuft oder aus Sicherheitsgründen gleich ganz geblockt.
	Informationen, wie du bei deinem Mail-Client HTML-Mails abschaltest, findest du in dessen Hilfesystem oder bei Google mit Stichwörtern wie <em>[Mailclientname] HTML-Mail deaktivieren</em>.
</p>
<p>
	Wenn du trotzdem deinen Text mit Hervorhebungen versehen willst, kannst du das auch ganz ohne HTML:
	<tt>Zum Beispiel mit _Unterstrichen_ oder *Sternchen* um die zu betonenden Wörter herum.</tt>
</p>
<p>
	Oh, und noch etwas:
	Keine Anhänge.
	Nicht mal ein kleines Funbildchen.
	Mindestens die Hälfte der Leute wird es nicht interessieren, egal wie toll du es findest.
	Und diese Leute ärgern sich zurecht darüber, dass du ihren Posteingang zumüllst und die Auslieferung von Listenmails durch zusätzlichen Traffic verlangsamst, den auch noch der CCC für dich zahlt.
	Wenn du irgendwelche Dateien mit anderen teilen willst, lad sie irgendwo hoch.
</p>

<h2 id='topic'>Was ist on-topic, was off-topic? Gibt es Ausnahmen?</h2>
<p>
	Für die Debate nimmt sich <a href='http://fdik.org/debate-faq#topic3'>Volker's FAQ</a> dem Thema an.
	Bei Gelegenheit werde ich den Bereich hier auch nochmal erweitern.
</p>

<h2 id='keinekopie'>Warum nur die Liste (und nicht auch mein Vorposter) in die Empfänger?</h2>
<p>
	Auf der Debate dürfen nur Leute posten, die die Liste auch abonniert haben.
	Von daher kannst du davon ausgehen, dass wenn du deine Antwort an die Liste schreibst, auch die Person, auf die du antwortest, sie erhält.
	Es besteht also kein Grund, sie an beide zu schicken, denn der Vorposter bekommt deine Mail dann doppelt oder sogar noch öfter, je nach Konfiguration der beteiligten Mailserver und Filter.
</p>
<p>
	Faulheit ist übrigens keine Entschuldigung:
	Nur weil deine Mailsoftware beide in die Empfänger setzt, wenn du auf "allen antworten" klickst, heißt das nicht, dass du das nicht manuell verändern solltest.
	Andere unter den Problemen deines Mailers leiden zu lassen spricht nicht gerade für dich.
</p>

<h2 id='listspunkt'>debate@lists.ccc.de oder debate@ccc.de &ndash; was nun?</h2>
<p>
	Die Adresse ohne <tt>lists.</tt> ist eine Weiterleitung auf die mit.
	Meiner persönlichen Meinung nach sorgt das für mehr Verwirrung als es Nutzen bringt, deshalb empfehle ich jedem, an die Adresse <em>mit</em> <tt>lists.</tt> zu schreiben.
	Zumal die Weiterleitung manchmal offenbar Mailschleifen verursacht und außerdem zuweilen dazu führt, dass Leute an <em>beide</em> Adressen antworten.
</p>

<h2 id='filter'>Wie sortiere ich die Debate-Mails am besten in einen eigenen Ordner in meinem Mailer?</h2>
<p>
	Im <a href='#header'>Header</a> jeder Debate-Mail steht folgender Text:
</p>
<pre>List-Id: CCC Diskussionsliste &lt;debate.lists.ccc.de&gt;</pre>
<p>
	Empfehlenswert wäre also ein Filter, der aussagt <em>Wenn der Header <tt>List-Id</tt> den Text <tt>&lt;debate.lists.ccc.de&gt;</tt> enthält, dann sortiere nach XY</em>.
	Wie du das deinem Mailprogramm beibringst, ist deine Sache.
</p>
<p>
	Einfaches Filtern nach <em>Empfänger ist <tt>debate@lists.ccc.de</tt></em> funktioniert übrigens nicht brauchbar, da manche Leute auch an <a href='#listspunkt'>ohne <tt>lists.</tt></a> schreiben oder das <em>Cc</em>- oder sogar <em>Bcc</em>-Feld benutzen.
</p>

<h2 id='clients'>Welche Mailsoftware sollte ich benutzen, welche nicht?</h2>
<p>
	Für die Benutzung auf einer Mailingliste ist wichtig, dass sich die Software halbwegs an die auf dieser Seite genannten Konventionen hält.
	Es ist unmöglich, alle Mailclients da draußen und ihre Schwachstellen zu kennen, von daher würde ich mich über Ergänzungen und Hinweise freuen.
</p>
<p>
	Oberste Priorität ist der korrekte Umgang mit <a href='#thread'>Threads</a>.
	Bekannte Threadzerstörer sind einige beliebte Webmailer (meines Wissens nach vor allem web.de), aber auch ein paar Versionen von Microsoft Outlook <em>(kennt jemand Details?)</em> sowie Blackberries.
	Vorbildlich hingegen verhält sich <a href="http://www.mutt.org/">Mutt</a>, das sogar die Möglichkeit bietet, zerstörte Threads wieder manuell zu korrigieren, indem es <em>References</em> und <em>In-Reply-To</em> umbiegt.
	Aber auch <a href="http://www.mozilla-europe.org/de/products/thunderbird/">Thunderbird</a> ist einigermaßen brauchbar, beherrscht aber einfaches Antworten an eine Mailingliste (ohne manuell die Empfänger ändern zu müssen) offenbar nur nach Installation eines Plugins.
</p>
<p>
	Dieser Abschnitt wird weiter ausgebaut, sobald mir jemand weitere Informationen zukommen lässt.
</p>

<h2 id='header'>Was ist eigentlich ein Header?</h2>
<p>
	Unter Header versteht man die Kopfdaten einer Mail, in der Informationen über den Inhalt stehen, zum Beispiel <em>von wem</em>, <em>an wen</em>, <em>Datum</em>, <em>Betreff</em> und viele weitere Informationen.
	Der Header besteht aus mehreren Header-Zeilen, die alle in der Form
</p>
<pre>Header-Name: Header-Wert</pre>
<p>
	aufgebaut sind.
</p>

<h2 id='message-id'>Was ist eine Message-ID, warum braucht man sie, wie muss sie aufgebaut sein?</h2>
<p>
	Eine Message-ID identifiziert deine Mail auf maschinenlesbare Weise.
	Sie muss weltweit eindeutig sein.
	Damit das gewährleistet ist, besteht sie aus zwei Teilen, getrennt von einem <tt>@</tt>, wie eine e-Mail-Adresse.
	Der Teil hinter dem <tt>@</tt> muss ein <em>voll qualifizierter Domainname</em> (FQDN) sein, um auszuschließen, dass es zweimal unabhängig voneinander den selben Domainnamen gibt.
	<em>neo</em> ist als kein FQDN, und du bist sicher nicht der einzige Matrix-Fan auf der Welt.
	<em>neo.scytale.name</em> hingegen gehört zu einer registrierten Domain und ist von daher in Ordnung.
	Deshalb sind auch <em>localhost.localdomain</em> oder Konstrukte wie <em>bilbo.daheim.local</em> nicht brauchbar für Message-IDs.
	Du verringerst zwar vielleicht die Wahrscheinlichkeit, dass jemand anderer die selbe Message-ID benutzt, aber ohne registrierte Domain ist sie immer noch viel zu hoch.
</p>
<p>
	Der Teil vor dem <tt>@</tt> muss nur innerhalb der Domain eindeutig sein und besteht meist aus einem Zeitstempel, einer Prozess-ID, einer internen ID der Mail, einer Zufallszahl, beliebigen Kombinationen daraus oder irgendwelchem anderen Unfug, der halbwegs brauchbar einmalig sein soll.
</p>
<p>
	Laut Standard <em>sollte</em> jede Mail eine Message-ID haben.
	Das Wort <em>sollte</em> bedeutet hier "wenn du einen guten Grund hast, keine zu haben, und dir der Konsequenzen bewusst bist, kannst du sie weglassen".
	Auf Deutsch heißt das dann: "Es ist keine gute Idee, sie wegzulassen, weil es massive Mengen Ärger bedeuten kann".
	Unter anderem gibt es ohne Message-ID keine Möglichkeit mehr, deine Mail in <em>In-Reply-To</em> zu referenzieren, und alle Antworten auf deine Mail sprengen automatisch die Threads.
	Das ist extrem unschön, und ich kann jedem nur empfehlen, auf Mails ohne Message-ID nicht zu antworten.
</p>

<h2 id='history'>Versionsgeschichte</h2>
<dl>
<dt>9. September 2007</dt>
	<dd>Erste Veröffentlichung.</dd>
<dt>25. September 2007</dt>
	<dd>An das neue Design von <?php echo(sn()); ?> angepasst. Bild unter <a href='#thread'>Threads</a> verkleinert. Versionsgeschichte erstellt. <a href='#clients'>Clientempfehlungen</a> und <a href='#format'>Formatierungshinweise</a> auf Vorschlag von Hauke hinzugefügt.</dd>
<dt>19. Dezember 2007</dt>
	<dd>ReplyToList-Plugin für Thunderbird verlinkt.</dd>
<dt>11. Juni 2009</dt>
	<dd>Unter Creative Commons gestellt.</dd>
</dl>
<p style='text-align:center; font-size:80%;'><a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/de/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc/3.0/de/88x31.png" /></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/" href="http://purl.org/dc/dcmitype/Text" property="dc:title" rel="dc:type">Benutzen einer offenen Mailingliste</span> von <a xmlns:cc="http://creativecommons.org/ns#" href="http://scytale.name/" property="cc:attributionName" rel="cc:attributionURL">Tim Weber</a> steht unter einer <a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/de/">Creative Commons Namensnennung-Keine kommerzielle Nutzung 3.0 Deutschland Lizenz</a>.<br />Beruht auf einem Inhalt unter <a xmlns:dc="http://purl.org/dc/elements/1.1/" href="http://scytale.name/files/doc/list-faq/" rel="dc:source">scytale.name</a>.</p>
<?php ftr(); ?>
