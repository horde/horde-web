<?php

require_once dirname(__FILE__) . '/app/lib/base.php';
$horde_apps_stable = HordeWeb_Utils::getStableApps();

header('Content-Type: text/xml');
echo '<?xml version="1.0"?>';

?>
<versions>
 <stable>
<?php foreach ($horde_apps_stable as $app => $info): ?>
  <application name="<?php echo $app ?>">
    <version><?php echo $info['ver'] ?></version>
    <url><?php echo htmlspecialchars(HordeWeb_Utils::app_download_url($app, $info)) ?></url>
  </application>
<?php endforeach; ?>
 </stable>
</versions>
