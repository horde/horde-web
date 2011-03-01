<ul class="communitynav">
    <li><?php echo $this->linkToUnlessCurrent('Contribute', array('controller' => 'development')) ?></li>
    <li><a href="http://git.horde.org">Browse Source</a></li>
    <li><?php echo $this->linkToUnlessCurrent('CVS', array('controller' => 'development', 'action' => 'cvs'))?></li>
    <li><?php echo $this->linkToUnlessCurrent('Git', array('controller' => 'development', 'action' => 'git'))?></li>
    <li><?php echo $this->linkToUnlessCurrent('Modules', array('controller' => 'development', 'action' => 'modules'))?></li>
    <li><?php echo $this->linkToUnlessCurrent('Versions', array('controller' => 'development', 'action' => 'versions'))?></li>
</ul>
