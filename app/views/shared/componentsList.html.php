<h2><span>&nbsp;</span>Horde Libraries</h2>
<?php
$info = HordeWeb_Utils::getComponents()->listDescriptions();
foreach ($info as $name => $description):?>
<h3><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'component', 'component' => $name, 'action' => 'component')) ?>"><?php echo str_replace('Horde_', '', $name) ?></a></h3>
<p>
  <?php echo $description; ?>
</p>
<?php endforeach;?>
