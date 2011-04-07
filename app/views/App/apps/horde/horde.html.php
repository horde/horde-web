<p class="exciter">The <b>Horde Application Framework</b> is a general-purpose
web application framework written in PHP, providing classes for dealing with
preferences, compression, browser detection, connection tracking, MIME handling,
and more.</p>

<h3>Obtaining Horde</h3>

<p>The Horde Framework can be obtained from our
<a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'download', 'action' => 'app', 'app' => 'horde')) ?>">
Download Page</a>.</p>

<p>You can also see who is on the <a href="<?php echo $this->urlWriter->urlFor('team') ?>">
Core Team</a>.</p>

<h3>Documentation</h3>

<p>Documentation for the Horde Project can be found on our
<?php echo $this->linkTo('Documentation Page', array('controller' => 'app', 'action' => 'docs', 'app' => 'horde')) ?>.
</p>

<h3>Notes</h3>

<p>As of Horde 4.0, The Horde Framework libraries and all applications,
including the base Horde application (which provides core functionality), are
installable via <a href="http://pear.horde.org">PEAR</a>.  See
the <a href="http://pear.horde.org">PEAR</a> server page, or the Horde
application <a href="<?php echo $this->urlWriter->urlFor(array('controller' =>
'app', 'app' => 'horde', 'action' => 'docs', 'f' => 'INSTALL.html')) ?>">
INSTALL</a> file for more information.</p>
