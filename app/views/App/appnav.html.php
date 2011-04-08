<ul class="appnav">
  <li><a href="<?php echo $this->urlWriter->urlFor('app', array('action' => 'app', 'app' => $this->appname))?>">About</a></li>
  <?php if ($this->hasAuthors): ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('app', array('action' => 'authors', 'app' => $this->appname))?>">Authors</a></li>
  <?php endif; ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('app', array('action' => 'docs', 'app' => $this->appname))?>">Documentation</a></li>
  <li><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'download', 'action' => 'app', 'app' => $this->appname))?>">Download</a></li>
  <?php if ($this->hasScreenshots): ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('app', array('action' => 'screenshots', 'app' => $this->appname))?>">Screenshots</a></li>
  <?php endif; ?>
  <?php if ($this->hasRoadmap): ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('app', array('action' => 'roadmap', 'app' => $this->appname))?>">Roadmap</a></li>
  <?php endif;?>
  <li><a href="http://git.horde.org/h/chora/horde-git/-/browse/<?php echo $this->appname ?>/">Source Code</a></li>
</ul>

