<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <?php echo $this->renderPartial('appbreadcrumb') ?>
        <span class="appMenu"><?php echo $this->render('appnav') ?></span>
        <div class="section">
        <?php echo $this->render('approadmap') ?>
        </div>
	</div>
     <div class="rightcol" style="background: none;">
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>