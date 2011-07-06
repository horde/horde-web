<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $this->page_title?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="keywords" content="groupware,webmail,web,application,framework,php,consulting,support,development,library">
<link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['host_base'] ?>/css/horde.css" media="screen">
<link rel="SHORTCUT ICON" type="image/x-icon" href="<?php echo $GLOBALS['host_base'] ?>/images/favicon.ico" />
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
<?php if (strpos($_SERVER['SERVER_NAME'], 'horde.org') !== false): ?>
<script type="text/javascript" src="<?php if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') echo 'https://ssl'; else echo 'http://www' ?>.google-analytics.com/ga.js"></script>
<?php endif ?>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-22320801-1']);
_gaq.push(['_trackPageview']);

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
