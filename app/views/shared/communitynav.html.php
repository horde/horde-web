<ul class="communitynav">
    <li><a href="<?php echo $this->urlWriter->urlFor('community')?>">Community Home</a></li>
    <li><?php echo $this->linkToUnlessCurrent('Applications', array('controller' => 'community', 'action' => 'apps'))?></li>
    <li><?php echo $this->linkToUnlessCurrent('Community Support', array('controller' => 'community', 'action' => 'support'))?></li>
</ul>
