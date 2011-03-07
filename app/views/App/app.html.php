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
         <h3><a href="#">Latest News</a></h3>
         <div></div>
         <h3><a href="#">Stable Releases</a></h3>
         <div></div>
         <h3><a href="#">Open Bugs</a></h3>
         <div>
           <?php foreach ($this->open_feed_bug as $item):?>
             <?php echo $this->renderPartial('feedListItem', array('locals' => array('entry' => $item))); ?>
           <?php endforeach;?>
         </div>
         <h3><a href="#">Open Enhancements</a></h3>
         <div>
           <?php foreach ($this->open_feed_enhancement as $item):?>
             <?php echo $this->renderPartial('feedListItem', array('locals' => array('entry' => $item))); ?>
           <?php endforeach;?></div>
       </div>
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("#accordion").accordion({ autoHeight: false });
  });

</script>