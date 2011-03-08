<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <?php echo $this->renderPartial('appbreadcrumb') ?>
        <span class="appMenu"><?php echo $this->render('appnav') ?></span>
        <div class="apptext">
          <?php echo $this->render($this->appname) ?>
        </div
	</div>
     <div class="rightcol" style="background: none;">
       <div id="accordion">
         <h2>Latest News</h3>
         <div></div>
         <h2>Stable Releases</h3>
         <div></div>
       </div>
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>