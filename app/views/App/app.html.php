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
      <?php if ($this->latestNews): ?>
      <div id="accordion">
        <h2>Latest News</h2>
        <ul class="sidebar">
          <?php foreach ($this->latestNews as $entry): ?>
          <?php echo $this->renderPartial('feedListItem', array('locals' => array('entry' => $entry))); ?>
          <?php endforeach; ?>
        </ul>
        <div></div>
      </div>
      <?php endif; ?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
