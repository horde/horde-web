<?php if (!isset($entry) && isset($locals['entry'])) { $entry = $locals['entry']; } ?>
<?php if (is_object($entry) && method_exists($entry, 'link') && method_exists($entry, 'title')): ?>
<li><a href="<?php echo ($entry->link() == '' ? 'http://www.horde.org' : $entry->link()) ?>"><?php echo $entry->title() ?></a></li>
<?php endif; ?>