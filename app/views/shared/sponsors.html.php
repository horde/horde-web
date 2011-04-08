                        <div class="adsbox">
                            <h2>Sponsors</h2>
                            <?php echo $this->render('informer'); ?><br />
                            <ul class="ads">
                                <li><a href=""><img src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" /></a></li>
                                <li><a href=""><img src="<?php echo $GLOBALS['host_base'] ?>/images/easyDNS.gif" /></a></li>
                                <li><a href=""><img src="<?php echo $GLOBALS['host_base'] ?>/images/hub.gif" height="31"/></a></li>
                                <li><a href=""><img src="<?php echo $GLOBALS['host_base'] ?>/images/verendus.jpg" height="31"/></a></li>
                            </ul>
                            <div class="clear"></div>
                            <div class="thanks"><?php echo $this->linkTo('Thanks', array('controller' => 'home', 'action' => 'thanks')); ?></div>
                        </div>
