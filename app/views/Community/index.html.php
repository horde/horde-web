<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span>Community</h2>
      <?php echo $this->render('communitynav');?>
      <div class="section">
        <div class="sectionintro">
          <p>The Horde Project is about creating high quality Open Source <a
          href="<?php echo $this->urlWriter->urlFor('apps') ?>">applications</a>
          and <a
          href="<?php echo $this->urlWriter->urlFor('libraries') ?>">libraries</a>,
          based on PHP and the Horde Framework. We strive to be the most
          flexible web based groupware solution on the planet.</p>
        </div>
        <h3>The Project</h3>
        <p>The Horde Project is an open source project with a very active and
        robust community. The applications and libraries are developed by the
        <a href="<?php echo $this->urlWriter->urlFor('team') ?>">Core Team</a>
        members, with countless contributions from the community.</p>

        <p>The guiding principles of the Horde Project are to create solid
        standards-based applications using intelligent object oriented design
        that, wherever possible, are designed to run on a wide range of
        platforms and backends.</p>

        <p>There is great emphasis on making Horde as friendly to non-English
        speakers as possible. The Horde Framework currently supports many
        localization features such as unicode and right-to-left text. Generous
        users have also contributed
        <a href="<?php echo $this->urlWriter->urlFor("localization")?>">many
        translations</a> for the framework and applications.</p>

        <p>Currently Horde Project boasts many enterprise-ready
        <a href="<?php echo $this->urlWriter->urlFor('apps') ?>">applications</a>,
        that are deployed in countless demanding
        <a href="http://wiki.horde.org/display.php?page=Deployments">
        environments</a>, and numerous exciting applications still in
        development.</p>

        <h3>The Code</h3>

        <p>The <a href="<?php echo $this->urlWriter->urlFor('development') ?>">
        development</a> of the <a
        href="<?php echo $this->urlWriter->urlFor('libraries') ?>">framework libraries</a>
        and <a href="<?php echo $this->urlWriter->urlFor('apps') ?>">applications</a>
        is a community process, with contributions both from individual developers and
        corporations. The
        <a href="<?php echo $this->urlWriter->urlFor('team') ?>">Core Team</a>
        members are the people who are actively involved with designing and
        coding the framework and applications.</p>

        <p>The applications are under various Open Source licenses, mostly under
        the <a href="../licenses/gpl.php">GNU Public License</a>.
        The Horde Framework libraries are mostly released under the <a
        href="../licenses/lgpl.php">LGPL</a> and the
        <a href="../licenses/bsd.php">BSD License</a>.</p>

        <p>The Horde applications are written in <a href="https://php.net/">PHP</a>,
        a scripting language explicitly designed to be embedded in web pages. PHP can
        be embedded directly into the web server, with plugins for not just <a
        href="https://apache.org/">Apache</a> but also <a
        href="https://iis.net/">IIS</a>, <a
        href="https://wwws.sun.com/software/products/web_srvr/home_web_srvr.html">Sun Web
        Server</a>, and <a
        href="https://redmine.lighttpd.net/projects/show/lighttpd/">Lighttpd</a>
        etc.</p>

        <p>Horde modules should run on any platform that can run PHP
        (including as a cgi), assuming any required support modules
        (IMAP, for instance) are present. The latest version of Horde, Horde 5
        requires the use of PHP 5.3 or above.</p>
      </div>
    </div>
     <div class="rightcol" style="background: none;">
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
