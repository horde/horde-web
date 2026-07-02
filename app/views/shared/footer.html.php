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
        <li><a href="https://wiki.horde.org" title="Wiki">Wiki</a></li>
        <!-- demo.horde.org is currently not available -->
        <!-- <li><a href="https://demo.horde.org" title="Demo">Demo</a></li> -->
        <li><a href="<?php echo $this->urlWriter->urlFor('support')?>" title="Support">Support</a></li>
        <li><a href="https://status.horde.org" title="System Status">Status</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('contact')?>" title="Contact Us">Contact Us</a></li>
      </ul>
    </div>
    <div class="follow-us">
      <h3>Follow us</h3>
      <ul>
        <li><a href="https://www.x.com/hordeproject" class="twitter">X</a></li>
        <li><a href="https://www.facebook.com/hordeproject" class="facebook">Facebook</a></li>
        <li><a href="https://github.com/horde" class="github">GitHub</a></li>
        <li><a href="https://openhub.net/p/horde" class="ohloh">OpenHub</a></li>
        <li><a rel="me" href="https://floss.social/@horde" class="mastodon">Mastodon</a></li>
      </ul>
    </div>
    <?php echo $this->render('contact'); ?>
    <?php echo $this->render('quotes', array('locals' => array('quote' => $this->quote))); ?>
    <div class="clear"></div>
  </div>
</div>
