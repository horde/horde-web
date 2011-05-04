<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span>Logos</h2>
      <div class="section">
        <h3>Standard Horde logo:</h3>
        <p><?php echo HordeWeb_Utils::logoImg('horde-color.gif') ?><br />
        (<a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-color.tif">TIFF</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-color.ai">Adobe Illustrator</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-layered.psd">Photoshop</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-color.svg">SVG</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-color.eps">EPS</a>)</p>

        <br />

        <h3>Horde 3 logos:</h3>
        <p><?php echo HordeWeb_Utils::logoImg('horde3-small.png') ?><br />
        (<a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde3.png">PNG</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde3.ai">Adobe Illustrator</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde3.svg">SVG</a>)</p>

        <br />

        <h3>Powered By logos:</h3>
        <table border="0">
        <tr>
         <td>GIF</td>
         <td>PNG</td>
        </tr>
        <tr>
         <td><?php echo HordeWeb_Utils::logoImg('horde-power1.gif') ?></td>
         <td><?php echo HordeWeb_Utils::logoImg('horde-power1.png') ?></td>
        </tr>
        <tr>
         <td><?php echo HordeWeb_Utils::logoImg('horde-power2.gif') ?></td>
         <td><?php echo HordeWeb_Utils::logoImg('horde-power2.png') ?></td>
        </tr>
        <tr>
         <td><?php echo HordeWeb_Utils::logoImg('horde-power3.gif') ?></td>
         <td><?php echo HordeWeb_Utils::logoImg('horde-power3.png') ?></td>
        </tr>
        <tr>
         <td><?php echo HordeWeb_Utils::logoImg('horde-badge.gif') ?></td>
         <td><?php echo HordeWeb_Utils::logoImg('horde-badge.png') ?></td>
        </tr>
        </table>

        <br />

        <h3>Black and White Horde logo:</h3>
        <p><?php HordeWeb_Utils::logoImg('horde-bw.gif') ?><br />
        (<a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-bw.tif">TIFF</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-bw.ai">Adobe Illustrator</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-bw.svg">SVG</a>,
         <a href="<?php echo $GLOBALS['host_base'] ?>/graphics/logos/horde-bw.eps">EPS</a>)</p>

        <br />

        <p>All Horde logos were created by Colin Viebrock.</p>
      </div>
    </div>
     <div class="rightcol" style="background: none;">
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
