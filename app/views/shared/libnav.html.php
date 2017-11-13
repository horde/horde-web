<ul class="appnav">
  <li><a href="<?php echo $this->urlWriter->urlFor('library', array('action' => 'library', 'library' => $this->libraryName))?>">About</a></li>
  <li><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'library', 'action' => 'download', 'library' => $this->libraryName))?>">Download</a></li>
  <?php if (!empty($this->libraryDetails->hasDocuments)): ?>
    <li><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'library', 'action' => 'docs', 'library' => $this->libraryName))?>">Documentation</a></li>
  <?php endif; ?>
  <li><a href="http://dev.horde.org/api/master/lib/<?php echo $this->shortLibraryName ?>/">API documentation</a></li>
  <li><a href="https://github.com/horde/<?php echo $this->shortLibraryName ?>/">Source Code</a></li>
</ul>

