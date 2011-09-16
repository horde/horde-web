<ul class="appnav">
  <li><a href="<?php echo $this->urlWriter->urlFor('library', array('action' => 'library', 'library' => $this->libraryName))?>">About</a></li>
  <li><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'library', 'action' => 'download', 'library' => $this->libraryName))?>">Download</a></li>
  <li><a href="http://dev.horde.org/api/framework/<?php echo $this->shortLibraryName ?>/">API documentation</a></li>
  <li><a href="http://git.horde.org/horde-git/-/browse/framework/<?php echo $this->shortLibraryName ?>/">Source Code</a></li>
</ul>

