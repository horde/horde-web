<ul class="communitynav">
  <li><a href="<?php echo $this->urlWriter->urlFor('community')?>">Community Home</a></li>
  <li><?php echo $this->linkTo('Applications', array('controller' => 'app'))?></li>
  <li><?php echo $this->linkTo('Localization', array('controller' => 'community', 'action' => 'localization'))?></li>
  <li><?php echo $this->linkTo('Community Support', array('controller' => 'community', 'action' => 'support'))?></li>
</ul>
