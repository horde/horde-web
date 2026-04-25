<h2><span>&nbsp;</span>Horde Libraries</h2>
<?php
$era = $this->era ?? 'h6';
$info = HordeWeb_Utils::getLibraries()->listDescriptions($era);
foreach ($info as $name => $description):?>
<h3><a href="<?php echo $this->urlWriter->urlFor('library', ['library' => $name]) ?>"><?php echo str_replace('Horde_', '', $name) ?></a></h3>
<p>
  <?php echo $description; ?>
</p>
<?php endforeach;?>
