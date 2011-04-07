<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Apache' => 'apache')) ?></h2>
      <div class="section">
       <em>Original:</em>  <a href="http://www.opensource.org/licenses/apachepl.html">http://www.opensource.org/licenses/apachepl.html</a><br /><pre>
        <?php echo htmlentities(implode('', $this->license)) ?>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>
