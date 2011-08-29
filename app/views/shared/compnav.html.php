<ul class="appnav">
  <li><a href="<?php echo $this->urlWriter->urlFor('component', array('action' => 'component', 'component' => $this->componentName))?>">About</a></li>
  <li><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'component', 'action' => 'download', 'component' => $this->componentName))?>">Download</a></li>
  <li><a href="http://dev.horde.org/api/framework/<?php echo $this->shortComponentName ?>/">API documentation</a></li>
  <li><a href="http://git.horde.org/h/chora/horde-git/-/browse/framework/<?php echo $this->shortComponentName ?>/">Source Code</a></li>
</ul>

