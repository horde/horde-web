            <?php echo $this->render('slides') ?>
			<div class="content">
				<ul class="teasers">
					<li>
						<div class="teaser">
							<div class="img">
								<img src="images/teaser_community.jpg" alt="Community" />
							</div>
							<div class="text">
								<h2><a href="<?php echo $this->urlWriter->urlFor('community');?>">Community</a></h2>
								<p>Lorem ipsum dolor sit amet, consetetur
                                   sadipscing elitr, sed diam nonumy eirmo
                                   tempor invidunt ut labore et dolore magna
                                   aliquyam erat, sed diam voluptua.</p>
							</div>
						</div>
					</li>
					<li class="middle">
						<div class="teaser">
							<div class="img">
								<img src="images/teaser_development.jpg" alt="Development" />
							</div>
							<div class="text">
								<h2>Development</h2>
								<p>Lorem ipsum dolor sit amet, consetetur
                                   sadipscing elitr, sed diam nonumy eirmod
                                   tempor invidunt ut labore et dolore magna
                                   aliquyam erat, sed diam voluptua.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="teaser">
							<div class="img">
								<img src="images/teaser_services.jpg" alt="Services" />
							</div>
							<div class="text">
								<h2>Services</h2>
								<p>Lorem ipsum dolor sit amet, consetetur
                                   sadipscing elitr, sed diam nonumy eirmod
                                   tempor invidunt ut labore et dolore magna
                                   aliquyam erat, sed diam voluptua.</p>
							</div>
						</div>
					</li>
				</ul>
				<div class="main">
					<div class="mainareasplit">
						<h2><span></span>Latest News</h2>
						<div class="planethorde">
							<ul>
                                <?php if (empty($this->hordefeed)):?>
                                    <li>The Horde newsfeed is temporarily unavailable.</li>
                                <?php endif; ?>
                                <?php $i = 0; ?>
                                <?php foreach ($this->hordefeed as $entry):
                                       if ($i++ >= $this->maxHordeItems) {
                                           break;
                                       }
                                      echo $this->renderPartial('feedListItem', array('locals' => array('entry' => $entry)));
                                      endforeach;
                                ?>
							</ul>
						</div>
						<h2><span></span>Planet Horde</h2>
						<div class="planethorde">
							<ul>
                                <?php if (empty($this->planet)):?>
                                    <li>The Planet Horde newsfeed is temporarily unavailable.</li>
                                <?php endif; ?>
                                <?php $i = 0; ?>
                                <?php foreach ($this->planet as $entry):
                                       if ($i++ >= $this->maxPlanetItems) {
                                           break;
                                       }
                                      echo $this->renderPartial('feedListItem', array('locals' => array('entry' => $entry)));
                                      endforeach;
                                ?>
							</ul>
						</div>
					</div>
					<div class="rightcol"><?php echo $this->render('sponsors'); ?></div>
					<div class="clear"></div>
				</div>
			</div>