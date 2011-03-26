<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Team' => 'team'))?></h2>
      <div class="section">
        <?php
        echo $this->render('Chuck_Hagenbuch');
        echo $this->render('Jan_Schneider');
        echo $this->render('Michael_Slusarz');
        echo $this->render('Michael_Rubinsky');
        echo $this->render('Ben_Klang');
        echo $this->render('Matt_Selsky');
        echo $this->render('Gunnar_Wrobel');?>
        <br />
        <h2>Retired Developers</h2>
        <?php
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