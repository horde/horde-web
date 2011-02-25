<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <h2><span></span><?php echo ucfirst($this->appname)?></h2>
        <span class="appMenu"><?php echo $this->renderPartial('appnav') ?></span>
        <?php echo $this->renderPartial($this->appname) ?>
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