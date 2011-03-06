<div class="sectionintro">
<p>The <b>Horde Application Framework</b> is a general-purpose web application
framework in PHP, providing classes for dealing with preferences, compression,
browser detection, connection tracking, MIME handling, and more.</p>
</div>
<h3>Obtaining Horde</h3>

<p>The Horde Framework can be obtained from our
<a href="<?php echo $this->urlWriter->urlFor('download', array('app' => 'horde')) ?>">
Download Page</a>. There are also some
<a href="<?php echo $this->urlWriter->urlFor('themes') ?>">themes</a> that users
have created.</p>

<p>You can also see who is on the <a href="<?php echo $this->urlWriter->urlFor('team') ?>">
Core Team</a>.</p>

<h3>Documentation</h3>

<p>Documentation for the Horde Project can be found on our
<?php echo $this->linkTo('Documentation Page', array('controller' => 'app', 'action' => 'docs', 'app' => 'horde')) ?>.
</p>

<h3>Notes</h3>

<p>Horde makes heavy use of <a href="http://pear.php.net/">PEAR</a>, the
<b>P</b>HP <b>E</b>xtension and <b>A</b>pplication <b>R</b>epository. PEAR is
a set of reuseable PHP components providing things such as Logging, Database
abstraction, and much more. Horde's
<a href="<?php echo Horde::Url($this->urlWriter->urlFor('app', array('app' => 'horde', 'action' => 'docs')))->add('f', 'INSTALL.html') ?>">INSTALL
File</a> provides instructions on how to correctly configure your system for
use with PEAR.</p>
