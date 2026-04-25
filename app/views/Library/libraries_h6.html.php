<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <?php echo $this->renderPartial('appbreadcrumb') ?>
        <?php echo $this->render('developmentnav') ?>
        <div class="section">
          <div class="sectionintro">
            <p>This is a list of <strong>Horde 6</strong> PHP libraries
            developed by the Horde team.
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
            'imp')) ?>">IMP</a> and for all packages available on
            <a href="https://packagist.org/packages/horde/">Packagist</a>.
            This allows you to embed functionality based on such libraries
            seamlessly into your own PHP application context.</p>

            <p>Can't find a library listed for Horde 6? Not all libraries
            have been ported yet. Please check our
            <a href="<?php echo $this->urlWriter->urlFor('libraries_h5') ?>">Horde 5
            Libraries</a> page.</p>

            <p>One of the strong advantages of the Horde PHP libraries is the
            fact that the code has been driven by the needs of the Horde
            applications. As these are being used by millions of
            users daily this means speedy code and maximal compatibility with
            systems not always adhering to standards (e.g. Outlook).</p>
          </div>

          <h3>Obtaining Libraries</h3>
          <p>All Horde libraries are available on
          <a href="https://packagist.org/packages/horde/">Packagist</a>
          and are installed via Composer.</p>

          <p>You can require any Horde library in your project with</p>

          <pre class="brush:bash">composer require horde/library_name</pre>

          <p>The <tt>Horde_Date</tt> library could be installed like this for
          example:</p>

          <pre class="brush:bash">composer require horde/date</pre>
          <?php echo $this->render('librariesList');?>
        </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('librariesListMenu');?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
