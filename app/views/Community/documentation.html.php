<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Documentation' => 'documentation'))?></h2>
      <?php echo $this->render('communitynav'); ?>
      <div class="section">
        <?php echo $this->render('docs'); ?>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>
