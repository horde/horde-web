                <div class="footer">
                        <div class="section">
                            <div class="add-nav">
                                <h3>Site Navigation</h3>
                                <ul>
                                    <li><a href="<? echo $this->urlWriter->urlFor('home')?>" title="Home" class="home">Home</a></li>
                                    <li><a href="<? echo $this->urlWriter->urlFor('community')?>" title="Community" class="community">Community</a></li>
                                    <li><a href="<? echo $this->urlWriter->urlFor('development')?>" title="Development" class="home">Development</a></li>
                                    <li><a href="<? echo $this->urlWriter->urlFor('services')?>" title="Services" class="services">Services</a></li>
                                    <li><a href="<?php echo $this->urlWriter->urlFor('download')?>" title="Download" class="download">Download</a></li>
                                    <li><a href="http://wiki.horde.org" title="Wiki" class="wiki">Wiki</a></li>
                                    <li><a href="<?php echo $this->urlWriter->urlFor('support')?>" title="Support" class="support">Support</a></li>
                                    <li><a href="<?php echo $this->urlWriter->urlFor('contact')?>" title="Contact Us" class="contactus">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="follow-us">
                                <h3>Follow us</h3>
                                <ul>
                                    <li><a href="http://bit.ly/iggr7v" class="newsletter">Newsletter</a></li>
                                    <li><a href="http://www.twitter.com/hordeproject" class="twitter">Twitter</a></li>
                                    <li><a href="http://github.com/horde" class="github">GitHub</a></li>
                                    <li><a href="https://www.ohloh.net/p/horde" class="ohloh">Ohloh</a></li>
                                </ul>
                            </div>
                            <?php echo $this->render('contact'); ?>
                            <?php echo $this->render('quotes', array('locals' => array('quote' => $this->quote))); ?>
                            <div class="clear"></div>
                        </div>
                </div>
