<?php if (!isset($entry) && isset($locals['entry'])) { $entry = $locals['entry']; } ?>
<?php if ($entry instanceof Horde_Feed_Entry_Rss): ?>
<li><a href="<?php echo ($entry->link() == '' ? 'https://www.horde.org' : $entry->link()) ?>"><?php echo $entry->title() ?></a></li>
<?php endif; ?>