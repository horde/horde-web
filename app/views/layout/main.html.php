<!DOCTYPE html>
<html>
<head>
<title><?php echo $this->page_title?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="groupware,webmail,web,application,framework,php,consulting,support,development,library">
<link rel="SHORTCUT ICON" type="image/x-icon" href="<?php echo $GLOBALS['host_base'] ?>/images/favicon.ico">
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
<?php
$GLOBALS['injector']->getInstance('Horde_PageOutput')->addScriptFile(
    new HordeWeb_Script_File('toc.js')
);
$GLOBALS['injector']->getInstance('Horde_PageOutput')->includeScriptFiles(true);
$GLOBALS['injector']->getInstance('Horde_PageOutput')->outputInlineScript();
?>
</body>
</html>
