<?php
require_once '../config/news.php';
require_once '../libs/Util.php';
if (!isset($slugs)) {
    $slugs = array($app);
}
foreach ($slugs as $slug) {
    $base_feed_url = Util::addParameter('http://bugs.horde.org/queue/rss.php',
                                        array('slug' => $slug));
    $open_feed_bug = Util::addParameter($base_feed_url,
                                        array('type_id' => 1));

    $open_feed_enhancement = Util::addParameter($base_feed_url,
                                                array('type_id' => 2));

    $resolved_feeds_bug[] = Util::addParameter($open_feed_bug, 'state',
                                               'resolved');
    $resolved_feeds_enhancement[] = Util::addParameter($open_feed_enhancement,
                                                       'state', 'resolved');
    $open_feeds_bug[] = $open_feed_bug;
    $open_feeds_enhancement[] = $open_feed_enhancement;
}
$resolved_bugs = getFeeds($resolved_feeds_bug);
$open_bugs = getFeeds($open_feeds_bug);
$open_enhancements = getFeeds($open_feeds_enhancement);
$resolved_enhancements = getFeeds($resolved_feeds_enhancement);
?>

<?php if (!empty($horde_news[$app]) || !empty($resolved_bugs) ||
          !empty($open_bugs) || !empty($open_enhancements) ||
          !empty($resolved_enhancements)): ?>

<div id="sidebarWrapper">
<div id="accordionContainer"><div id="accordionInnerContainer">
 <div id="accordion">
  <?php if (!empty($horde_news[$app]['news'])): $news = &$horde_news[$app]['news']; ?>
  <div id="newsPanel">
    <div id="newsTitle" class="tabShown accordionTitle">
     <h2>Latest News</h2>
    </div>
    <div id="newsContent" class="accordionContents">
     <ul>
     <?php $i = 0; foreach ($news as $date => $text): if (++$i > 5) { break; } ?>
      <li class="round"><?php echo (($date != '**NODATE**') ? $date . ': ' : '') . $text ?></li>
     <?php endforeach; ?>
     </ul>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!empty($horde_news[$app]['releases'])): $releases = &$horde_news[$app]['releases']; ?>
   <?php foreach (array('stable' => 'Stable', 'dev' => 'Development') as $key => $name): if (isset($releases[$key])): ?>
   <div id="<?php echo $key ?>Panel">
    <div id="<?php echo $key ?>Title" class="tabShown accordionTitle">
     <h2><?php echo $name ?> Releases</h2>
    </div>
    <div id="<?php echo $key ?>Content" class="accordionContents">
     <ul>
     <?php for ($i = 0, $c = count($releases[$key]); $i < 3 && $i < $c; ++$i): ?>
      <li class="round"><?php echo $releases[$key][$i][0] . ': ' . (isset($releases[$key][$i][2]) ? '<a href="http://lists.horde.org/archives/announce/' . $releases[$key][$i][2] . '.html">' : '') . $releases[$key][$i][1] . (isset($releases[$key][$i][2]) ? '</a>' : '') ?></li>
     <?php endfor; ?>
     </ul>
    </div>
   </div>
   <?php endif; endforeach; ?>
  <?php endif; ?>

  <?php if (file_exists("../$app/more.php")): include "../$app/more.php"; foreach ($more as $title => $items): ?>
  <div id="<?php echo urlencode($title) ?>Panel">
    <div id="<?php echo urlencode($title) ?>Title" class="tabShown accordionTitle">
     <h2><?php echo $title ?></h2>
    </div>
    <div id="<?php echo urlencode($title) ?>Content" class="accordionContents>
     <ul>
     <?php for ($i = 0, $c = count($items); $i < 3 && $i < $c; ++$i): ?>
      <li class="round"><?php echo $items[$i] ?></li>
     <?php endfor; ?>
     </ul>
    </div>
  </div>
  <?php endforeach; endif; ?>

   <div id="ticketsPanel">
    <div id="ticketsTitle" class="accordionTitle">
     <h2>Open Bugs</h2>
    </div>
    <div id="ticketsContent" class="accordionContents">
     <ul>
      <?php if (count($open_bugs)): ?>
      <?php foreach ($open_bugs as $story): ?>
       <li><a href="<?php echo htmlspecialchars($story['url']) ?>"><?php echo htmlspecialchars($story['title']) ?></a></li>
      <?php endforeach; ?>
      <?php else: ?>
       <li>No Open Bugs</li>
      <?php endif; ?>
     </ul>
    </div>
   </div>

  <?php if (count($resolved_bugs)): ?>
   <div id="closedTicketsPanel">
    <div id="closedTicketsTitle" class="accordionTitle">
     <h2>Resolved Bugs</h2>
    </div>
    <div id="closedTicketsContent" class="accordionContents">
     <ul>
      <?php foreach ($resolved_bugs as $story): ?>
      <li><a href="<?php echo htmlspecialchars($story['url']) ?>"><?php echo htmlspecialchars($story['title']) ?></a></li>
      <?php endforeach; ?>
     </ul>
    </div>
   </div>
  <?php endif; ?>

   <div id="ticketsPanel">
    <div id="ticketsTitle" class="accordionTitle">
     <h2>Open Requests</h2>
    </div>
    <div id="ticketsContent" class="accordionContents">
     <ul>
      <?php if (count($open_enhancements)): ?>
      <?php foreach ($open_enhancements as $story): ?>
       <li><a href="<?php echo htmlspecialchars($story['url']) ?>"><?php echo htmlspecialchars($story['title']) ?></a></li>
      <?php endforeach; ?>
      <?php else: ?>
       <li>No Open Requests</li>
      <?php endif; ?>
     </ul>
    </div>
   </div>

  <?php if (count($resolved_enhancements)): ?>
   <div id="ticketsPanel">
    <div id="ticketsTitle" class="accordionTitle">
     <h2>Resolved Requests</h2>
    </div>
    <div id="ticketsContent" class="accordionContents">
     <ul>
      <?php foreach ($resolved_enhancements as $story): ?>
       <li><a href="<?php echo htmlspecialchars($story['url']) ?>"><?php echo htmlspecialchars($story['title']) ?></a></li>
      <?php endforeach; ?>
     </ul>
    </div>
   </div>
  <?php endif; ?>

 </div>
</div></div></div>

<script type="text/javascript">
Rico.loadModule('Corner', 'Accordion');
Rico.onLoad(function() {
    Rico.Corner.round('accordionContainer', { color: 'fromElement', bgColor: 'fromParent' });
    new Rico.Accordion($('accordion').select('.accordionTitle'), $('accordion').select('.accordionContents'), {
        borderColor: '#9c9',
        panelHeight: 300,
        onHideTab: function(tab) {
            $(tab.titleBar).removeClassName('tabShown');
        },
        onShowTab: function(tab) {
            $(tab.titleBar).addClassName('tabShown');
        }
    });
});
</script>

<?php endif; ?>
<?php if (!empty($application_title)) echo '<h1 class="pagetitle">', $application_title, '</h1>'; ?>
<?php include "../$app/$app.html"; ?>
