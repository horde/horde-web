<?php

function _sortNews($a, $b)
{
    return strcmp($b['modified'], $a['modified']);
}

function _makeid($string)
{
    $id = preg_replace('/[\W]/', '-', $string);
    $id = preg_replace('/-+/', '-', $id);
    return trim($id, '-');
}

include 'config/defaults.php';
include 'config/news.php';

$self_url = $base_url . '/atom.php';
$updated = '';
$entries = array();
foreach ($horde_news as $app => $app_info) {
    if (!isset($app_info['news'])) {
        continue;
    }
    foreach ($app_info['news'] as $date => $news) {
        if ($date > $updated) {
            $updated = $date;
        }
        $entries[] = array('app' => $app,
                           'id' => $base_url . '/' . $app . '/news/' . $date,
                           'name' => $app_info['name'],
                           'modified' => $date,
                           'title' => $app_info['name'] . ': '
                               . (strlen($news) > 75 ? (substr($news, 0, 70) . '...') : $news),
                           'content' => $news);
    }
    foreach ($app_info['releases'] as $state => $releases) {
        foreach ($releases as $release) {
            $news = $state == 'stable' ? 'Stable release: ' : 'Development release: ';
            $news .= $release[1];
            $entries[] = array('app' => $app,
                               'id' => $base_url . '/' . $app . '/releases/' . _makeid($release[1]),
                               'name' => $app_info['name'],
                               'modified' => $release[0],
                               'link' => 'http://lists.horde.org/archives/announce/' . $release[2] . '.html',
                               'title' => $news,
                               'content' => $news);
        }
    }
}
usort($entries, '_sortNews');

header('Content-Type: text/xml');
echo '<?xml version="1.0"?>';

?>

<feed xmlns="http://www.w3.org/2005/Atom">
  <id><?php echo htmlspecialchars($self_url) ?></id>
  <title>Horde News</title>
  <subtitle>News about the Horde Project and Horde software from the website http://www.horde.org/</subtitle>
  <link rel="self" href="<?php echo htmlspecialchars($self_url) ?>"/>
  <icon><?php echo htmlspecialchars($base_url) ?>/graphics/logos/favicon.ico</icon>
  <updated><?php echo htmlspecialchars($updated) ?>T00:00:00Z</updated>

<?php for ($i = 0, $max = min(count($entries), 20); $i < $max; ++$i): ?>
  <entry>
    <id><?php echo htmlspecialchars($entries[$i]['id']) ?></id>
    <title><?php echo htmlspecialchars($entries[$i]['title']) ?></title>
    <content><?php echo htmlspecialchars($entries[$i]['content']) ?></content>
    <author><name>The Horde Project</name></author>
    <updated><?php echo htmlspecialchars($entries[$i]['modified']) ?>T00:00:00Z</updated>
<?php if (isset($entries[$i]['link'])): ?>
       <link rel="alternate" type="text/html" href="<?php echo htmlspecialchars($entries[$i]['link']) ?>"/>
<?php endif; ?>
  </entry>
<?php endfor; ?>

</feed>
