<h2>Released Applications</h2>
<ul class="sidebar">
<?php foreach ($this->stable as $app):?>
 <li><a href="<?php echo $this->urlWriter->urlFor(array_merge($this->appListController, array('app' => $app['application']))) ?>"><?php echo $app['name']?></a></li>
<?php endforeach;?>
</ul>