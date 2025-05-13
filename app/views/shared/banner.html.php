<div class="top">
    <a href="<?php echo $this->urlWriter->urlFor('home')?>" title="Horde" class="logo"><img src="<?php echo $GLOBALS['host_base']?>/images/logo.png" alt="Horde"/></a>
    <ul>
        <li id="home"><a href="<?php echo $this->urlWriter->urlFor('home')?>" title="Home" class="home first">Home</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('apps')?>" title="Applications" class="applications">Applications</a></li>
        <li><a href="https://wiki.horde.org" title="Wiki" class="wiki">Wiki</a></li>
        <!-- demo.horde.org is currently unavailable -->
        <!--<li><a href="http://demo.horde.org" title="Demo" class="demo">Demo</a></li>-->
        <li><a href="<?php echo $this->urlWriter->urlFor('support')?>" title="Support" class="support">Support</a></li>
        <li><a href="<?php echo $this->urlWriter->urlFor('contact')?>" title="Contact Us" class="contactus last">Contact</a></li>
    </ul>
</div>
