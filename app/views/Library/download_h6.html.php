<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <?php echo $this->renderPartial('appbreadcrumb') ?>
      <?php echo $this->render('libnav') ?>
      <div class="section">

          <h3>Installing the <?php echo $this->libraryName ?> library</h3>

          <p>The <?php echo $this->libraryName ?> library is installed via
          Composer from
          <a href="<?php echo $this->libraryDetails->download ?>">Packagist</a>.</p>

          <p>Require it in your project with</p>

          <pre class="brush:bash">composer require horde/<?php echo strtolower(str_replace('Horde_', '', $this->libraryName)) ?></pre>

          <h3>Current Release</h3>
          <ul>
            <li>
              <a href="<?php echo $this->libraryDetails->download; ?>">
                <?php echo $this->libraryName ?>-<?php echo $this->libraryDetails->version ?>
              </a>
            </li>
          </ul>
          <p>
            [Released: <?php echo (string)$this->libraryDetails->releaseDate ?>]
          </p>

          <h3>Obtaining Old Versions</h3>

          <p>Old versions can be obtained from
          <a href="<?php echo $this->libraryDetails->download ?>">Packagist</a>
          or our legacy <a href="http://pear.horde.org">PEAR server</a>.</p>
      </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('librariesListMenu');?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
