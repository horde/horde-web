<!DOCTYPE html>
<html>
<head>
<title><?php echo $this->page_title?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="keywords" content="groupware,webmail,web,application,framework,php,consulting,support,development,library">
<link rel="SHORTCUT ICON" type="image/x-icon" href="<?php echo $GLOBALS['host_base'] ?>/images/favicon.ico">
<link href="https://plus.google.com/105569801098474752113" rel="publisher">
<!-- Google Analytics -->
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-22320801-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<?php $GLOBALS['injector']->getInstance('Horde_PageOutput')->includeStylesheetFiles(array('nobase' => true, 'nohorde' => true), true) ?>
</head>
<body>
  <div class="area">
    <div class="inside">
      <?php echo $this->render('banner') ?>
      <?php echo $this->contentForLayout ?>
      <?php echo $this->render('footer', array('locals' => array('quote' => $this->quote))) ?>
    </div>
  </div>
<?php
$GLOBALS['injector']->getInstance('Horde_PageOutput')->addScriptFile(
    new HordeWeb_Script_File('slides.min.jquery.js')
);
$GLOBALS['injector']->getInstance('Horde_PageOutput')->addInlineScript(
    '$(function(){
        $("#slides").slides({
            preload: true,
            play: 5000,
            pause: 2500,
            hoverPause: true,
            effect: "fade"
        });
    });'
);
$GLOBALS['injector']->getInstance('Horde_PageOutput')->includeScriptFiles(true);
$GLOBALS['injector']->getInstance('Horde_PageOutput')->outputInlineScript();
?>
</body>
</html>
