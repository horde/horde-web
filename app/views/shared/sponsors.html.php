<div class="logos"><?php echo $this->linkTo('Logos', array('controller' => 'home', 'action' => 'logos'));?></div>
<div class="thanks"><?php echo $this->linkTo('Thanks', array('controller' => 'home', 'action' => 'thanks')); ?></div>
<div class="adsbox">
  <h2>Featured At</h2>
  <?php echo $this->render('informer'); ?><br />
  <h2>Sponsors</h2>
  <ul class="ads">
    <li>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_xclick" />
      <input type="hidden" name="business" value="chuck@horde.org" />
      <input type="hidden" name="item_name" value="Support the Horde Project" />
      <input type="hidden" name="item_number" value="1" />
      <input type="hidden" name="no_shipping" value="1" />
      <input type="hidden" name="cn" value="Notes" />
      <input type="hidden" name="currency_code" value="USD" />
      <input type="hidden" name="tax" value="0" />
      <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" style="border:0" name="submit" alt="Donate to the Horde Project" />
      </form>
    </li>
    <li><a href="http://www.easydns.com/?V=55611cf92a7e0842"><img src="<?php echo $GLOBALS['host_base'] ?>/images/easyDNS.png" /></a></li>
    <li><a href="http://www.hub.org/?ri=765"><img src="<?php echo $GLOBALS['host_base'] ?>/images/hub.png" height="31"/></a></li>
    <li><a href="http://www.verendus.com"><img src="<?php echo $GLOBALS['host_base'] ?>/images/verendus.jpg" height="31"/></a></li>
  </ul>
  <div id="fb-root"></div>
  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
  <fb:like-box href="http://www.facebook.com/pages/Horde-LLC/192707224109487" width="260" show_faces="false" stream="false" header="true"></fb:like-box>
  <div class="clear"></div>
</div>
