<?php
require_once 'functions.inc';
$page_title = 'The Horde Project';
if (!empty($subsite_title)) {
    $page_title = $subsite_title;
}
if (isset($app)) {
    $app = basename($app);
    $toolbar_mode = $app;
    if (!isset($content_file)) {
        $application_title = null;
        if (!empty($subsite_title)) {
            $application_title = $subsite_title;
            $subsite_title = null;
        }
        $content_file = $fs_base . '/templates/application.inc';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo isset($page_charset) ? $page_charset : 'iso-8859-1' ?>" />
  <title><?php echo $page_title ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/horde.css" />
  <link rel="SHORTCUT ICON" type="image/x-icon" href="<?php echo $base_url ?>/graphics/logos/favicon.ico" />
  <link rel="alternate" type="application/atom+xml" href="<?php echo $base_url ?>/atom.php" />
  <script type="text/javascript" src="<?php echo $base_url ?>/js/prototype.js"></script>
  <script type="text/javascript" src="<?php echo $base_url ?>/js/rico.js"></script>
</head>

<body>

<div id="headerWrapper">
 <div id="header">
  <h1>horde</h1>
  <h2>Create. Communicate. Collaborate.</h2>
  <img src="<?php echo $base_url ?>/graphics/logos/horde-halfgear.png" alt="Horde gear logo" />
 </div>
</div>

<table cellspacing="0"><tr>
  <td valign="top">
   <div class="side" id="side">
    <?php print_toolbar() ?>
   </div>
  </td>

  <td id="mainarea" width="100%" valign="top">
<?php
if (!empty($subsite_title)) {
    echo '<h1 class="pagetitle">', $subsite_title, '</h1>';
}
if (!empty($content_text)) {
    echo $content_text;
} else {
    include $content_file;
}
?>
  </td>
</tr></table>

<!-- Legal blurb -->
<div id="footer">Copyright 1999-2009 The Horde Project.
Unless otherwise expressly noted, the contents of these pages are licensed
under the <a href="http://creativecommons.org/licenses/by-sa/2.5/">Creative
Commons - Attribution / Share Alike</a> license.</div>

<script type="text/javascript">
Rico.loadModule('Corner');
Rico.onLoad(function() {
    var elts = [ 'side', 'header', 'footer' ].concat([ '.box', '.note', '.hint', '.alert', '.warning', '.boxRight', '.important' ].collect(function(e) {
        return $('mainarea').select(e);
    }).flatten());
    elts.each(function(e) {
        Rico.Corner.round(e, { color: 'fromElement', bgColor: 'fromParent' });
    });
});
</script>

</body>
</html>
