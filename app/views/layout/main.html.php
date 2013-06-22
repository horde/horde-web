<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $this->page_title?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="keywords" content="groupware,webmail,web,application,framework,php,consulting,support,development,library">
<link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['host_base'] ?>/css/horde.css" media="screen">
<link rel="SHORTCUT ICON" type="image/x-icon" href="<?php echo $GLOBALS['host_base'] ?>/images/favicon.ico" />
<link href="https://plus.google.com/105569801098474752113" rel="publisher" />
<?php $GLOBALS['injector']->getInstance('Horde_PageOutput')->includeStylesheetFiles(array('nobase' => true, 'nohorde' => true), true) ?>
</head>
<body>
<div class="area">
  <div class="inside">
    <?php echo $this->render('banner'); ?>
    <div class="podest" id="podest"></div>
    <?php echo $this->contentForLayout ?>
    <?php echo $this->render('footer');?>
  </div>
</div>
<?php $GLOBALS['injector']->getInstance('Horde_PageOutput')->includeScriptFiles() ?>
<?php $GLOBALS['injector']->getInstance('Horde_PageOutput')->outputInlineScript() ?>
<?php if (strpos($_SERVER['SERVER_NAME'], 'horde.org') !== false): ?>
<script type="text/javascript" src="<?php if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') echo 'https://ssl'; else echo 'http://www' ?>.google-analytics.com/ga.js"></script>
<?php endif ?>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="<?php echo $GLOBALS['host_base'] ?>/js/informer.js"></script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-22320801-1']);
_gaq.push(['_trackPageview']);
</script>
<script type="text/javascript" src="<?php echo $GLOBALS['host_base'] ?>/js/toc.js"></script>
</body>
</html>
