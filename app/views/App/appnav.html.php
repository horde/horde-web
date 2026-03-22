<ul class="appnav">
  <li><a href="<?php echo $this->urlWriter->urlFor('app', ['app' => $this->appname])?>">About</a></li>
  <?php if ($this->hasAuthors): ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('app_action', ['app' => $this->appname, 'action' => 'authors'])?>">Authors</a></li>
  <?php endif; ?>
  <?php if ($this->hasDocs): ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('app_action', ['app' => $this->appname, 'action' => 'docs'])?>">Documentation</a></li>
  <?php endif; ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('download', ['app' => $this->appname])?>">Download</a></li>
  <?php if ($this->hasScreenshots): ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('app_action', ['app' => $this->appname, 'action' => 'screenshots'])?>">Screenshots</a></li>
  <?php endif; ?>
  <?php if ($this->hasRoadmap): ?>
  <li><a href="<?php echo $this->urlWriter->urlFor('app_action', ['app' => $this->appname, 'action' => 'roadmap'])?>">Roadmap</a></li>
  <?php endif;?>
  <li><a href="https://github.com/horde/<?php echo $this->appname ?>/">Source Code</a></li>
</ul>

