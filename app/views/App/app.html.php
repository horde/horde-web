<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <?php echo $this->renderPartial('appbreadcrumb') ?>
        <span class="appMenu"><?php echo $this->render('appnav') ?></span>
        <?php echo $this->render($this->appname) ?>
	</div>
     <div class="rightcol" style="background: none;">
         <h2>Latest News</h2>
         
         <h2>Stable Releases</h2>
         
         <h2>Open Bugs</h2>
         
         <h2>Open Enhancements</h2>
    </div>
    <div class="clear"></div>
  </div>
</div>