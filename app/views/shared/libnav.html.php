<ul class="appnav">
  <li><a href="<?php echo $this->urlWriter->urlFor('library', ['library' => $this->libraryName])?>">About</a></li>
  <li><a href="<?php echo $this->urlWriter->urlFor('library_action', ['library' => $this->libraryName, 'action' => 'download'])?>">Download</a></li>
  <?php if (!empty($this->libraryDetails->hasDocuments)): ?>
    <li><a href="<?php echo $this->urlWriter->urlFor('library_action', ['library' => $this->libraryName, 'action' => 'docs'])?>">Documentation</a></li>
  <?php endif; ?>
  <li><a href="http://dev.horde.org/api/master/lib/<?php echo $this->shortLibraryName ?>/">API documentation</a></li>
  <li><a href="https://github.com/horde/<?php echo $this->shortLibraryName ?>/">Source Code</a></li>
</ul>

