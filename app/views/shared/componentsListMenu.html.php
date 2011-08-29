<h2>Released Libraries</h2>
<ul class="sidebar">
<?php foreach ($this->components as $name):?>
     <li><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'component', 'component' => $name, 'action' => 'component')) ?>"><?php echo str_replace('Horde_', '', $name) ?></a></li>
<?php endforeach;?>
</ul>