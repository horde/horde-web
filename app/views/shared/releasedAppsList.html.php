<h2>Released Applications</h2>
<ul class="download-list">
<?php foreach ($this->stable as $key => $app):?>
 <li><a href="<?php echo $this->urlWriter->urlFor(array_merge($this->appListController, array('app' => $key))) ?>"><?php echo $app['name']?></a></li>
<?php endforeach;?>
</ul>