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
                      <p>Wondering <strong>what Horde is</strong>? Curious how
                      to use one of Horde's many more advanced features?  Learn
                      more about Horde and its <strong>powerful
                      applications</strong> with Frequently Asked Questions,
                      Screenshots and more.
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
                      <p>As the most flexible groupware platform in the world,
                      Horde makes an ideal place to create your
                      own <strong>custom applications</strong>. Learn more
                      about our feature-rich collection of
                      web <strong>development libraries</strong> and how to get
                      started.
                      </p>
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
                      <p>More than just software: Our team of trusted
                      <strong>professionals helps</strong> you
                      build <strong>large installations</strong> or custom
                      applications. Learn how our experience and technology
                      delivers the most flexible platform to realize your grand
                      ideas.
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
              <div class="main">
                <div class="mainareasplit">
                  <h2>Latest News</h2>
                  <div class="planethorde">
                    <ul>
                      <?php if (empty($this->hordefeed)):?>
                        <li>The Horde newsfeed is temporarily unavailable.</li>
                      <?php else: ?> <?php $i = 0; ?> <?php foreach
                      ($this->hordefeed as $entry): if ($i++ >=
                      $this->maxHordeItems) { break; } echo
                      $this->renderPartial('feedListItem', array('locals' =>
                      array('entry' => $entry))); endforeach;
                      endif;?>
                    </ul>
                  </div>
                  <h2>Planet Horde</h2>
                  <div class="planethorde">
                    <ul>
                      <?php if (empty($this->planet)):?>
                        <li>The Planet Horde newsfeed is temporarily
                      unavailable.</li>  <?php else: ?> <?php $i = 0; ?>
                      <?php foreach ($this->planet as $entry): if ($i++ >=
                      $this->maxPlanetItems) { break; } echo
                      $this->renderPartial('feedListDetailedItem', array('locals' =>
                      array('entry' => $entry))); endforeach; endif;?>
                    </ul>
                  </div>
                </div>
                <div class="rightcol"><?php echo $this->render('sponsors') ?></div>
                <div class="clear"></div>
              </div>
            </div>
