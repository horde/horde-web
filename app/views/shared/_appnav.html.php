<ul class="appnav">
    <li><a href="<?php echo $this->urlWriter->urlFor('apps', array('action' => 'index', 'app' => $this->appname))?>">About</a></li>
    <li><a href="<?php echo $this->urlWriter->urlFor('apps', array('action' => 'authors', 'app' => $this->appname))?>">Authors</a></li>
    <li><a href="<?php echo $this->urlWriter->urlFor('apps', array('action' => 'docs', 'app' => $this->appname))?>">Documentation</a></li>
    <li><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'download', 'action' => 'app', 'app' => $this->appname))?>">Download</a></li>
    <li><a href="<?php echo $this->urlWriter->urlFor('apps', array('action' => 'screenshot', 'app' => $this->appname))?>">Screenshots</a></li>
    <li><a href="<?php echo $this->urlWriter->urlFor('apps', array('action' => 'roadmap', 'app' => $this->appname))?>">Roadmap</a></li>
    <li><a href="http://git.horde.org/h/chora/horde-git/-/browse/<?php echo $this->appname?>/">Source Code</a></li>
</ul>

