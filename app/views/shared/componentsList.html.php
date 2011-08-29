<h2><span>&nbsp;</span>Horde Libraries</h2>
<?php foreach ($this->components as $name):?>
<h3><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'component', 'component' => $name, 'action' => 'component')) ?>"><?php echo str_replace('Horde_', '', $name) ?></a></h3>
<p>
<?php
  $info = HordeWeb_Utils::getComponents()->fetchComponent($name);
  echo $info['release']->getDescription();
?>
</p>
<?php endforeach;?>
