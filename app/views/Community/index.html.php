<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <h2><span></span>Community</h2>
        <?php echo $this->render('communitynav');?>

        <div class="section">
         <div class="sectionintro">
            <p>The Horde Project is about creating high quality Open Source <a
            href="<?php echo $this->urlWriter->urlFor('apps') ?>">applications</a>, based on PHP and
            the Horde Framework.</p>
         </div>
        <p>The guiding principles of the Horde Project are to create solid
        standards-based applications using intelligent object oriented design that,
        wherever possible, are designed to run on a wide range of platforms and
        backends.<br />
        There is great emphasis on making Horde as friendly to non-English speakers as
        possible. The Horde Framework currently supports many localization features
        such as unicode and right-to-left text and generous users have contributed <a
        href="<?php echo $this->urlWriter->urlFor("localization")?>">many translations</a> for the
        framework and applications.</p>


        <p>Currently Horde Project boasts
        <a href="<?php echo $this->urlWriter->urlFor('apps') ?>">
        many applications</a>, some already enterprise-ready and deployed in
        demanding <a href="http://wiki.horde.org/display.php?page=Deployments">
        environments</a>, and some exciting new ones still in development.</p>

        <h3>The Code</h3>

        <p>The <a href="<?php echo $this->urlWriter->urlFor('development') ?>">development</a> of the
        framework and the applications is a community process, with contributions both
        from individual developers and corporations. The
        <a href="<?php echo $this->urlWriter->urlFor('team') ?>">Core Team</a>

        members are the people who are actively involved on the development in
        designing and coding the framework and applications.</p>

        <p>The applications are under various Open Source licenses, mostly under the
        <a href="../licenses/gpl.php">GNU Public License</a>. The Horde Framework
        itself, as of version 2.0, is released under the <a
        href="../licenses/lgpl.php">LGPL</a>.</p>

        <p>The Horde applications are written in <a href="http://www.php.net/">PHP</a>,
        a scripting language explicitly designed to be embedded in web pages. PHP can
        be embedded directly into the web server, with plugins for not just <a
        href="http://www.apache.org/">Apache</a> but also <a
        href="http://www.microsoft.com/iis/">IIS</a>, <a
        href="http://wwws.sun.com/software/products/web_srvr/home_web_srvr.html">Sun Web
        Server</a>, etc.</p>

        <p>PHP is currently at version 5, with many improvements including a new object
        model, improved XML and web services support. Horde modules should run on any
        platform that can run PHP (including as a cgi), assuming any required support
        modules (IMAP, for instance) are present.</p>
        </div>
	</div>
     <div class="rightcol" style="background: none;">
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>