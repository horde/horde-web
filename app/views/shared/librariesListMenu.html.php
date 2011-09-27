<h2>Released Libraries</h2>
<ul class="sidebar">
<?php foreach ($this->libraries as $name):?>
     <li><a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'library', 'library' => $name, 'action' => 'library')) ?>"><?php echo str_replace('Horde_', '', $name) ?></a></li>
<?php endforeach;?>
</ul>