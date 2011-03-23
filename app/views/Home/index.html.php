            <?php echo $this->render('slides') ?>
			<div class="content">
				<ul class="teasers">
					<li>
						<div class="teaser">
							<div class="img">
								<a href="<?php echo $this->urlWriter->urlFor('community');?>"><img src="images/teaser_community.jpg" alt="Community" /></a>
							</div>
							<div class="text">
								<h2><a href="<?php echo $this->urlWriter->urlFor('community');?>">Community</a></h2>
								<p>Learn about The Horde Project, the
                                community surronding it, and why it is the
                                most flexible groupware solution on the planet.
                                </p>
							</div>
						</div>
					</li>
					<li class="middle">
						<div class="teaser">
							<div class="img">
								<a href="<?php echo $this->urlWriter->urlFor('development');?>"><img src="images/teaser_development.jpg" alt="Development" /></a>
							</div>
							<div class="text">
								<h2><a href="<?php echo $this->urlWriter->urlFor('development');?>">Development</a></h2>
								<p>Are you a developer? Learn more about the
                                Horde Framework, how it can help you with your
                                development goals, or see how to get involved
                                with contributing to the project.
							</div>
						</div>
					</li>
					<li>
						<div class="teaser">
							<div class="img">
								<a href="<?php echo $this->urlWriter->urlFor('services');?>"><img src="images/teaser_services.jpg" alt="Services" /></a>
							</div>
							<div class="text">
								<h2><a href="<?php echo $this->urlWriter->urlFor('services');?>">Services</a></h2>
								<p>Looking for professional level support or
                                custom development? See how Horde's team of
                                experienced, professional developers can help.
                                </p>
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