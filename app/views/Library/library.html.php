<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <?php echo $this->renderPartial('appbreadcrumb') ?>
      <?php echo $this->render('libnav') ?>
      <div class="section">
          <h3><?php echo $this->libraryDetails->summary ?></h3>

          <div class="sectionintro">
            <p>
            <?php echo $this->libraryDetails->description ?>
            </p>
          </div>

          <?php if (!empty($this->libraryDetails->hasCi)): ?>
          <h3>Status</h3>

          <p>
            The following indicates the status of the component
            within <a href="http://ci.horde.org">the Horde continuous
            integration server</a> (based on
            <a href="http://jenkins-ci.org">Jenkins</a>)
          </p>

          <div style="width: 450px; margin: 0 auto;">
            <script type="text/javascript" src="http://ci.horde.org/job/<?php echo $this->shortLibraryName ?>/jswidgets/health/?skipDescription=true"></script>
          </div>
          <?php endif; ?>
      </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('librariesListMenu');?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
