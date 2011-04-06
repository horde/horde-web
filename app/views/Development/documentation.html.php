<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Documentation' => 'documentation'))?></h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">
         <p class="exciter">The following documentation is available regarding
         the Horde project:</p>

        <h3>Applications</h3>

        <p>The documentation that is being distributed with the various Horde
        applications are also available online. You can view the <?php echo
        $this->linkTo('Applications page', array('controller' => 'app')) ?> and
        select the application you are looking for.</p>

        <p>A <strong>flyer</strong> for <a href="<?php echo
        $this->urlWriter->urlFor('app', array('app' => 'groupware')) ?>/">Horde
        Groupware</a> and <a href="<?php echo $this->urlWriter->urlFor('app',
        array('app' => 'webmail')) ?>">Horde Groupware Webmail Edition</a>
        which summarizes the features and requirements is available as
        a <a href="<?php echo $GLOBALS['host_base']?>/papers/groupware.pdf">PDF
        file for download</a> (<a href="<?php echo
        $GLOBALS['host_base']?>/papers/groupware-cmyk.pdf">CMYK
        version</a>).</p>

        <h3>Wiki</h3>

        <p>The <a href="http://wiki.horde.org/">Horde Wiki</a> is a good place
        to visit for both developer and user generated documentation.</p>

        <h3>FAQ</h3>

        <p>The <a href="http://wiki.horde.org/FAQ">Horde FAQ</a> is part of the
        Horde Wiki and provides answers to some Frequently Asked Questions.</p>

        <h3>Library</h3>

        <p>The <a href="<?php echo $GLOBALS['host_base']?>/papers/">Horde
        Library</a> is a collection of papers, reports, and presentations given
        by Horde developers over the years.</p>

        <h3>API References</h3>

        <p>Horde's <a href="http://dev.horde.org/">API Reference</a> is
        automatically generated documentation on the Horde codebase.  This site
        also contains various other links of interest to those who wish to
        develop applications with Horde.</p>

        <h3>Licenses</h3>

        <p>The <a href="licenses/">Horde Licenses</a> page contains the various
        licenses used for Horde applications.</p>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>
