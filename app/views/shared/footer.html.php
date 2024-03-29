<div class="footer">
  <div class="section">
    <div class="add-nav">
      <h3>Site Navigation</h3>
      <ul>
        <li><a href="<?php echo $this->urlWriter->urlFor('home')?>" title="Home">Home</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('community')?>" title="Community">Community</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('development')?>" title="Development">Development</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('services')?>" title="Services">Services</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('apps')?>" title="Applications">Applications</a></li>
        <li><a href="http://wiki.horde.org" title="Wiki">Wiki</a></li>
        <li><a href="http://demo.horde.org" title="Demo">Demo</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('support')?>" title="Support">Support</a></li>
        <li><a href="http://status.horde.org" title="System Status">Status</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('contact')?>" title="Contact Us">Contact Us</a></li>
      </ul>
    </div>
    <div class="follow-us">
      <h3>Follow us</h3>
      <ul>
        <li><a href="http://www.twitter.com/hordeproject" class="twitter">Twitter</a></li>
        <li><a href="http://www.facebook.com/hordeproject" class="facebook">Facebook</a></li>
        <li><a href="http://github.com/horde" class="github">GitHub</a></li>
        <li><a href="https://www.ohloh.net/p/horde" class="ohloh">Ohloh</a></li>
      </ul>
    </div>
    <?php echo $this->render('contact'); ?>
    <?php echo $this->render('quotes', array('locals' => array('quote' => $this->quote))); ?>
    <div class="clear"></div>
  </div>
</div>
