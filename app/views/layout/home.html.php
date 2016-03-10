<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $this->page_title?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="keywords" content="groupware,webmail,web,application,framework,php,consulting,support,development,library">
<link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['host_base'] ?>/css/horde.css" media="screen">
<link rel="SHORTCUT ICON" type="image/x-icon" href="<?php echo $GLOBALS['host_base'] ?>/images/favicon.ico" />
<link href="https://plus.google.com/105569801098474752113" rel="publisher" />
<!-- Google Analytics -->
<script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', 'UA-22320801-1', 'auto');
ga('send', 'pageview');
</script>
<script async src='//www.google-analytics.com/analytics.js'></script>
<!-- End Google Analytics -->
</head>
<body>
  <div class="area">
    <div class="inside">
      <?php echo $this->render('banner'); ?>
      <?php echo $this->contentForLayout ?>
      <?php echo $this->render('footer', array('locals' => array('quote' => $this->quote)));?>
    </div>
  </div>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="js/informer.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript">
$(function(){
    $('#slides').slides({
        preload: true,
        play: 5000,
        pause: 2500,
        hoverPause: true,
        effect: 'fade'
    });
});
</script>
</body>
</html>
