<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <?php echo $this->renderPartial('appbreadcrumb') ?>
      <?php echo $this->render('compnav') ?>
      <div class="section">
          <div class="sectionintro">
            <?php echo $this->componentDetails['release']->getDescription() ?>
          </div>
      </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('componentsListMenu');?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
