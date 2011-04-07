<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('GPL' => 'gpl')) ?></h2>
      <div class="section">
       <em>Original:</em> <a href="http://www.fsf.org/copyleft/gpl.html">http://www.fsf.org/copyleft/gpl.html</a><br /><pre>
        <?php echo htmlentities(implode('', $this->license)) ?>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>
