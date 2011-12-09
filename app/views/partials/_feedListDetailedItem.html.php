<li>
  <a href="<?php echo ($entry->link() == '' ? 'http://www.horde.org' : $entry->link()) ?>"><?php echo $entry->title() ?></a>
  <div class="description"><?php echo Horde_String::truncate(strip_tags($entry->description()), 180) ?></div>
</li>
