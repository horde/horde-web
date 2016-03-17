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

      </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('librariesListMenu');?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
