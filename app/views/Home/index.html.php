			<div class="top">
				<a href="/" title="Horde" class="logo"><img src="images/logo.png" alt="Horde"/></a>
				<ul>
                    <!-- @TODO: Links, once we actually have pages!! -->
					<li><a href="" title="Home" class="home first">Home</a></li>
					<li><a href="" title="Download" class="download">Download</a></li>
					<li><a href="" title="Wiki" class="wiki">Wiki</a></li>
					<li><a href="" title="Support" class="support">Support</a></li>
					<li><a href="" title="Contact Us" class="contactus last">Contact Us</a></li>
				</ul>
			</div>
			<div class="slider" id="slides">
				<div class="slides_container">
					<div class="slide1 sliderview">
						<h2>Lorem Ipsum dolor sit amet</h2>
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                           sed diam nonumy eirmod tempor invidunt ut labore et
                           dolore magna aliquyam erat, sed diam voluptua. At
                           vero eos et accusam et justo duo dolores et ea rebum.
                           Stet clita kasd gubergren, no sea takimata sanctus
                           est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                           amet, consetetur sadipscing elitr, sed diam nonumy
                           eirmod tempor invidunt ut labore et dolore magna
                           aliquyam erat, sed diam voluptua. At vero eos et
                           accusam et justo duo dolores et ea rebum. Stet clita
                           kasd gubergren, no sea takimata sanctus est Lorem
                           ipsum dolor sit amet.</p>
					</div>
					<div class="slide1 sliderview">
						<h2>Lorem Ipsum dolor sit amet</h2>
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                           sed diam nonumy eirmod tempor invidunt ut labore et
                           dolore magna aliquyam erat, sed diam voluptua. At
                           vero eos et accusam et justo duo dolores et ea rebum.
                           Stet clita kasd gubergren, no sea takimata sanctus
                           est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                           amet, consetetur sadipscing elitr, sed diam nonumy
                           eirmod tempor invidunt ut labore et dolore magna
                           aliquyam erat, sed diam voluptua. At vero eos et
                           accusam et justo duo dolores et ea rebum. Stet clita
                           kasd gubergren, no sea takimata sanctus est Lorem
                           ipsum dolor sit amet.</p>					</div>
				</div>
			</div>
			<div class="content">
				<ul class="teasers">
					<li>
						<div class="teaser">
							<div class="img">
								<img src="images/teaser_community.jpg" alt="Community" />
							</div>
							<div class="text">
								<h2>Community</h2>
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
								<img src="images/teaser_development.jpg" alt="Community" />
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
								<img src="images/teaser_services.jpg" alt="Community" />
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
					<div class="mainarea">
						<h2><span></span>Latest News</h2>
						<div class="planethorde">
							<ul>
								<li><p class="title">The Horde4 package mill for Debian</p><p class="author">Gunnar Wrobbel</p></li>
								<li><p class="title">The Horde4 package mill for Debian</p><p class="author">Gunnar Wrobbel</p></li>
								<li><p class="title">The Horde4 package mill for Debian</p><p class="author">Gunnar Wrobbel</p></li>
							</ul>
						</div>
						<h2><span></span>Planet Horde</h2>
						<div class="planethorde">
							<ul>
                                <?php foreach ($this->planet as $entry):
                                      echo $this->renderPartial('feedListItem', array('locals' => array('entry' => $entry)));
                                      endforeach; 
                                ?>
							</ul>
						</div>
					</div>
					<div class="rightcol">
						<div class="adsbox">
							<h2>Sponsors</h2>
							<ul class="ads">
								<li><a href=""><img src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" /></a></li>
								<li><a href=""><img src="http://www.horde.org/graphics/logos/easyDNS.gif" /></a></li>
								<li><a href=""><img src="http://www.horde.org/graphics/logos/hub.org.gif" height="31"/></a></li>
								<li><a href=""><img src="http://www.horde.org/graphics/logos/verendus.jpg" height="31"/></a></li>
							</ul>
							<div class="clear"></div>
							<div id="b-webi-widget" class="featuredat">
								<div class="b-webi-header">
									Featured at:
								</div>
								<div class="b-webi-content">
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="IBM - United States.The IBM corporate home page, entry point to information about IBM products and services" href="http://informe.com/ibm.com/" provider-id="41727_414" class="b-webi-link">ibm.com</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">IBM - United States</div>
												<div class="b-webi-description">The IBM corporate home page, entry point to information about IBM products and services</div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="Web Site Optimization: Speed Up Your Site website optimization web speed optimize web site performance company.Website optimization speeds up slow web sites, increases website traffic, and improves conversion rates. Our web optimization services increase website performance, decrease bailout rates, and improv..." href="http://informe.com/websiteoptimization.com/" provider-id="41727_6026" class="b-webi-link">websiteoptimization.com</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">Web Site Optimization: Speed Up Your Site website optimization web speed optimize web site performance company</div>
												<div class="b-webi-description">Website optimization speeds up slow web sites, increases website traffic, and improves conversion rates. Our web optimization services increase website performance, decrease bailout rates, and improve...</div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="A qmail installation guide so advanced it takes 2 years to update - It's gotta be Qmailrocks.org.A qmail installation guide. Qmailrocks.org is a publicly available installation quide to Dan Bernstein" href="http://informe.com/qmailrocks.org/" provider-id="41727_87179" class="b-webi-link">qmailrocks.org</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">A qmail installation guide so advanced it takes 2 years to update - It's gotta be Qmailrocks.org</div>
												<div class="b-webi-description">A qmail installation guide. Qmailrocks.org is a publicly available installation quide to Dan Bernstein</div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="EGroupware - Online Groupware, CRM: Home.Egroupware is a web based software for team collaboration, central data management and CRM: email client, online calendar, contact and task management, project and file management, trouble ticket sys..." href="http://informe.com/egroupware.org/" provider-id="41727_42982" class="b-webi-link">egroupware.org</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">EGroupware - Online Groupware, CRM: Home</div>
												<div class="b-webi-description">Egroupware is a web based software for team collaboration, central data management and CRM: email client, online calendar, contact and task management, project and file management, trouble ticket syst...</div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="Rpmfind mirror." href="http://informe.com/rpmfind.net/" provider-id="41727_24399" class="b-webi-link">rpmfind.net</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">Rpmfind mirror</div>
												<div class="b-webi-description"></div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="Linux.com | The source for Linux information.Linux.com - For the community, by the community, Linux.com is the central source for Linux information, software, documentation, how-tos and answers across the server, desktop/netbook, mobile, and em..." href="http://informe.com/linux.com/" provider-id="41727_11154" class="b-webi-link">linux.com</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">Linux.com | The source for Linux information</div>
												<div class="b-webi-description">Linux.com - For the community, by the community, Linux.com is the central source for Linux information, software, documentation, how-tos and answers across the server, desktop/netbook, mobile, and emb...</div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="Web Hosting India Linux Windows Hosting Dedicated Servers VPS Hosting India.Top web hosting india delhi company offers cheap linux hosting, windows web hosting, reseller hosting, vps hosting, dedicated servers and domain registration all over india." href="http://informe.com/webcomindia.net/" provider-id="41727_108376" class="b-webi-link">webcomindia.net</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">Web Hosting India Linux Windows Hosting Dedicated Servers VPS Hosting India</div>
												<div class="b-webi-description">Top web hosting india delhi company offers cheap linux hosting, windows web hosting, reseller hosting, vps hosting, dedicated servers and domain registration all over india.</div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="php-homepage.de - Die deutschsprachige Ressource f�r PHP und MySQL- Startseite.PHP Homepage ist eine Homepage, bei der sich alles um die Scriptsprache PHP und die Datenbank MySQL dreht. Au�erdem die Heimat von MyGuestbook, einem G�stebuch f�r PHP und MySQL. Kostenlose bzw. O..." href="http://informe.com/php-homepage.de/" provider-id="41727_72283" class="b-webi-link">php-homepage.de</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">php-homepage.de - Die deutschsprachige Ressource f�r PHP und MySQL- Startseite</div>
												<div class="b-webi-description">PHP Homepage ist eine Homepage, bei der sich alles um die Scriptsprache PHP und die Datenbank MySQL dreht. Au�erdem die Heimat von MyGuestbook, einem G�stebuch f�r PHP und MySQL. Kostenlose bzw. Op...</div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="Home Page &mdash; Regione Emilia-Romagna - Ermes." href="http://informe.com/regione.emilia-romagna.it/" provider-id="41727_46114" class="b-webi-link">regione.emilia-romagna.it</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">Home Page &mdash; Regione Emilia-Romagna - Ermes</div>
												<div class="b-webi-description"></div>
															</div>
										</div>
												<div class="b-webi-item">
											<div class="b-webi-domain">
												<div class="b-webi-more">more</div>
												<div class="b-webi-hide">hide</div>
												<a alt="FoxyTunes - Control any media player while surfing the Web and more....FoxyTunes - Firefox, Web and Music" href="http://informe.com/foxytunes.com/" provider-id="41727_10921" class="b-webi-link">foxytunes.com</a>
											</div>
											<div class="b-webi-more-block">
												<div class="b-webi-title">FoxyTunes - Control any media player while surfing the Web and more...</div>
												<div class="b-webi-description">FoxyTunes - Firefox, Web and Music</div>
															</div>
										</div>
										
								</div>
								<div class="b-webi-footer">
									Powered by <a href="http://informe.com/"><b>informe.com</b></a>
								</div>
							</div>
						</div>					
					</div>
					<div class="clear"></div>
				</div>
                <!-- Start Footer -->
                <?php echo $this->renderPartial('footer');?>
                <!-- End Footer -->
			</div>