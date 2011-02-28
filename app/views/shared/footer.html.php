				<div class="footer">
					<div class="holder">
						<div class="section">
							<div class="add-nav">
								<h3>Site Navigation</h3>
								<ul>
									<li><a href="/" class="item-home">Home</a></li>
									<li><a href="/" class="item-download">Download</a></li>
									<li><a href="/" class="item-wiki">Wiki</a></li>
									<li><a href="/" class="item-support">Support</a></li>
									<li><a href="/" class="item-contactus">Contact Us</a></li>
								</ul>
							</div>
							<div class="follow-us">
								<h3>Follow us</h3>
								<ul>
									<li><a target="_blank" href="http://www.twitter.com/hordeproject" class="twitter">Twitter</a></li>
                                    <!-- Comment out, at least until we have facebook fan page ;) -->
									<!--<li><a target="_blank" href="http://www.facebook.com/pages/horde" class="facebook">Facebook</a></li>-->
								</ul>
							</div>
                            <?php echo $this->render('contact'); ?>
                            <?php echo $this->render('quotes', array('locals' => array('quote' => $quote))); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>