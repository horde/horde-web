<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Team' => 'team'))?></h2>
      <?php echo $this->render('communitynav'); ?>
      <div class="section">
        <?php
        echo $this->render('Jan_Schneider');
        echo $this->render('Michael_Rubinsky');
        echo $this->render('Chuck_Hagenbuch');
        echo $this->render('Ralf_Lang');?>
        <br />
        <h2><span>&nbsp;</span>Retired Developers</h2>
        <?php
        echo $this->render('Michael_Slusarz');
        echo $this->render('Ben_Klang');
        echo $this->render('Gunnar_Wrobel');
        echo $this->render('Matt_Selsky');
        echo $this->render('Jon_Parise');
        echo $this->render('Eric_Rostetter');
        echo $this->render('Marcus_Ryan');
        echo $this->render('Anil_Madhavapeddy');
        echo $this->render('Rich_Lafferty');?>
      </div>
    </div>
    <div class="rightcol" style="background: none;">
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
