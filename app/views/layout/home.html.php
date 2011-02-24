<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?php echo $this->page_title?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="http://<?php echo $GLOBALS['host_base']?>/css/horde.css" media="screen" />
<script src="js/jquery-1.4.4.min.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script>
	$(function(){
		$('#slides').slides({
			preload: true,
			play: 5000,
			pause: 2500,
			hoverPause: true
		});
	});
</script>
</head>
<body>
	<div class="area">
        <div class="inside">
            <?php echo $this->renderPartial('banner'); ?>
            <?php echo $this->contentForLayout ?>
            <?php echo $this->renderPartial('footer', array('locals' => array('quote' => $this->quote)));?>
        </div>
    </div>
</body>
<!-- Don't include yet, it's based on prototypejs -->
<!--<script src="js/informer.js"></script>-->
</html>
