<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('LGPL' => 'lgpl'))?></h2>
      <div class="section">
     <em>Original:</em> <a href="http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html">http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html</a><br /><pre>
        <?php echo htmlentities(implode('', $this->license)) ?>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>
