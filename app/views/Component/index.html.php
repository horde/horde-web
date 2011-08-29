<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <?php echo $this->renderPartial('appbreadcrumb') ?>
        <?php echo $this->render('developmentnav') ?>
        <div class="section">
          <div class="sectionintro">
            <p>This is a list of PHP libraries developed by the
            horde team. 
            Additional libraries not yet released are available in our source
            repository
            <a href="<?php echo $this->urlWriter->urlFor('development') ?>">
            in the development section</a> of the site.</p>

            <p>All of the libraries are fully independent of the Horde
            applications. Utilities such as our date handling library, the
            iCalendar module, or the natural language parsing of dates can
            be used without installing <a href="<?php echo
            $this->urlWriter->urlFor(array('controller' => 'app', 'app' =>
            'kronolith')) ?>">Kronolith</a>. The same holds true
            for the IMAP and MIME libraries powering our webmailer
            <a href="<?php echo
            $this->urlWriter->urlFor(array('controller' => 'app', 'app' =>
            'imp')) ?>">Imp</a> and for all released modules on our
            <a href="http://pear.horde.org/">PEAR server</a>. This allows
            you to embed functionality based on such libraries seamlessly
            into your own PHP application context.</p>

            <p>One of the strong advantages of the Horde PHP libraries is the
            fact that the code has been driven by the needs of the Horde
            applications. As these are being used by millions of
            users daily this means speedy code and maximal compatibility with
            system not always adhering to standards (e.g. Outlook).</p>
          </div>

          <h3>Obtaining Libraries</h3>
          <p>You can download the libraries from our <a href="http://pear.horde.org/">
          PEAR server</a> directly but the default way of install the Horde
          PHP libraries is the installation on the command line via PEAR.<p>

          <p>For this to work you will need to register the Horde PEAR channel
          by running</p>

          <pre class="brush:bash">pear channel-discover pear.horde.org</pre>

          <p>After that you will be able to install the libraries with</p>

          <pre class="brush:bash">pear install horde/HORDE_LIBRARY_NAME</pre>

          <p>The <tt>Horde_Date</tt> library could be installed like this for
          example:</p>

          <pre class="brush:bash">pear install horde/horde_date</pre>
          <?php //echo $this->render('componentsList');?>
        </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('toc'); ?>
      <?php echo $this->render('componentsListMenu');?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
