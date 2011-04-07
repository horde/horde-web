<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <?php echo $this->renderPartial('appbreadcrumb') ?>
        <span class="appMenu"><?php echo $this->render('appnav') ?></span>
        <div class="section">
          <?php echo $this->render($this->appname) ?>
        </div>
    </div>
     <div class="rightcol" style="background: none;">
       <div id="accordion">
         <h2>Latest News</h3>
         <ul class="sidebarNews">
            <?php $i = 0; ?>
            <?php foreach ($this->latestNews as $entry):
               if ($i++ >= 5) {
                   break;
               }
              echo $this->renderPartial('feedListItem', array('locals' => array('entry' => $entry)));
              endforeach;
            ?>
         </ul>
         <div></div>
       </div>
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>