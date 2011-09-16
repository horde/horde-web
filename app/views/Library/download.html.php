<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <?php echo $this->renderPartial('appbreadcrumb') ?>
      <?php echo $this->render('libnav') ?>
      <div class="section">

          <h3>Installing the <?php echo $this->libraryName ?> library</h3>

          <p>The default way of installing
          <?php echo $this->libraryName ?>
          is the installation on the command line via PEAR.</p>

          <p>For this to work you will need to register the Horde PEAR channel
          by running</p>

          <pre class="brush:bash">pear channel-discover pear.horde.org</pre>

          <p>After that you will be able to install the library with</p>

          <pre class="brush:bash">pear install horde/<?php echo strtolower($this->libraryName) ?></pre>

          <h3>Current Stable Release</h3>
          <ul>
            <li>
              <a href="<?php echo $this->libraryDetails['release']->getDownloadUri(); ?>">
                <?php echo $this->libraryName ?>-<?php echo $this->libraryDetails['release']->getVersion() ?>
              </a>
            </li>
          </ul>
          <p>
            [Released: <?php echo (string)$this->libraryDetails['release']->da ?>]
          </p>

          <h3>Obtaining Old Versions</h3>

          <p>Old versions can be obtained from our <a href="http://pear.horde.org">PEAR server</a>.</p>
      </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('librariesListMenu');?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
