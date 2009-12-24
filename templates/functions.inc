<?php

function mailto($user, $text)
{
    global $base_url;

    echo "<a href=\"$base_url/mailto.php/$user\">$text</a>";
}

function app_link($name, $text = null)
{
    if (substr($name, 0, 2) == '**') {
        echo $name;
        return;
    }

    if (is_null($text)) {
        $text = $name;
    }

    global $base_url;

    $dir = strtolower($name);
    echo "<a href=\"$base_url/$dir/\">$text</a>";
}

function app_download_link($key, $elt, $graphic = false)
{
    $text = $elt['name'] . ' ' . $elt['ver'];
    if ($graphic) {
        $text = '<img class="download" src="' . $GLOBALS['base_url'] . '/graphics/download.png" alt="' . $text . '" />';
    }

    return '<a href="' . app_download_url($key, $elt) . '">' . $text . '</a> (' . $elt['date'] . ')';
}

function app_download_url($key, $elt)
{
    $dir = isset($elt['dir']) ? $elt['dir'] : $key;
    return rtrim($GLOBALS['ftp_base'], ' /') .
        '/' .
        rtrim($dir, ' /') .
        '/' .
        (isset($elt['file']) ? $elt['file'] : $dir . '-latest.tar.gz');
}

function app_patches_url($key, $elt)
{
    return rtrim($GLOBALS['ftp_base'], ' /') .
        '/' .
        rtrim(isset($elt['dir']) ? $elt['dir'] : $key, ' /') .
        '/patches/';
}

function toolbar_item($url, $text, $active = false, $subitems = false)
{
    $class = $active ? ' class="active"' : '';
    echo '<li><a' . $class . ' href="' . $url . '">' . $text . '</a>';
    if ($subitems) {
        echo "\n<ul>\n";
    } else {
        echo "</li>\n";
    }
}

function print_toolbar()
{
    global $base_url, $ftp_base, $toolbar_mode;

    echo '<ul>';

    toolbar_item($base_url . '/', 'Home');

    switch ($toolbar_mode) {
    case 'accounts':
        toolbar_item($base_url . '/accounts/', 'Accounts', true, true);
        toolbar_item($base_url . '/download/app/?app=accounts', 'Download');
        toolbar_item($base_url . '/accounts/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/accounts', 'Source Code');
        toolbar_item($base_url . '/accounts/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'ansel':
        toolbar_item($base_url . '/ansel/', 'Ansel', true, true);
        toolbar_item($base_url . '/ansel/authors/', 'Authors');
        toolbar_item($base_url . '/ansel/docs/', 'Documentation');
        toolbar_item($base_url . '/ansel/screenshots/', 'Screenshots');
        toolbar_item('http://git.horde.org/ansel/?rt=horde-hatchery', 'Source Code');

        echo "</ul></li>\n";
        break;

    case 'chora':
        toolbar_item($base_url . '/chora/', 'Chora', true, true);
        toolbar_item($base_url . '/chora/about/', 'About');
        toolbar_item($base_url . '/chora/authors/', 'Authors');
        toolbar_item('http://cvs.horde.org/', 'Demo');
        toolbar_item($base_url . '/chora/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=chora', 'Download');
        toolbar_item($base_url . '/chora/roadmap/', 'Roadmap');
        toolbar_item('http://cvs.horde.org/chora', 'Source Code');
        toolbar_item($base_url . '/chora/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'dimp':
        toolbar_item($base_url . '/dimp/', 'DIMP', true, true);
        toolbar_item($base_url . '/dimp/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=dimp', 'Download');
        toolbar_item('http://cvs.horde.org/dimp', 'Source Code');
        echo "</ul></li>\n";
        break;

    case 'forwards':
        toolbar_item($base_url . '/forwards/', 'Forwards', true, true);
        toolbar_item($base_url . '/forwards/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=forwards', 'Download');
        toolbar_item($base_url . '/forwards/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/forwards', 'Source Code');
        toolbar_item($base_url . '/forwards/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'gollem':
        toolbar_item($base_url . '/gollem/', 'Gollem', true, true);
        toolbar_item($base_url . '/gollem/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=gollem', 'Download');
        toolbar_item($base_url . '/gollem/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/gollem', 'Source Code');
        toolbar_item($base_url . '/gollem/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'groupware':
        toolbar_item($base_url . '/groupware/', 'Horde Groupware', true, true);
        toolbar_item($base_url . '/groupware/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=groupware', 'Download');
        toolbar_item($base_url . '/groupware/screenshots/', 'Screenshots');
        echo "</ul></li>\n";
        break;

    case 'hermes':
        toolbar_item($base_url . '/hermes/', 'Hermes', true, true);
        toolbar_item($base_url . '/hermes/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=hermes', 'Download');
        toolbar_item($base_url . '/hermes/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/hermes', 'Source Code');
        echo "</ul></li>\n";
        break;

    case 'horde':
        toolbar_item($base_url . '/horde/', 'Horde', true, true);
        toolbar_item($base_url . '/download/app/?app=horde', 'Download');
        toolbar_item($base_url . '/horde/docs/', 'Documentation');
        //toolbar_item($base_url . '/horde/screenshots/', 'Screenshots');
        toolbar_item($base_url . '/horde/roadmap/', 'Roadmap');
        toolbar_item('http://cvs.horde.org/horde', 'Source Code');
        toolbar_item($base_url . '/horde/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'imp':
        toolbar_item($base_url . '/imp/', 'IMP', true, true);
        toolbar_item($base_url . '/imp/about/', 'About');
        toolbar_item($base_url . '/imp/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=imp', 'Download');
        toolbar_item($base_url . '/imp/screenshots/', 'Screenshots');
        toolbar_item($base_url . '/imp/roadmap/', 'Roadmap');
        toolbar_item('http://cvs.horde.org/imp', 'Source Code');
        toolbar_item($base_url . '/imp/vote/', 'Vote');
        toolbar_item('http://wiki.horde.org/ImpModule', 'Wiki Page');
        echo "</ul></li>\n";
        break;

    case 'ingo':
        toolbar_item($base_url . '/ingo/', 'Ingo', true, true);
        toolbar_item($base_url . '/ingo/docs/', 'Documentation');
        toolbar_item($base_url . '/ingo/roadmap/', 'Roadmap');
        toolbar_item($base_url . '/download/app/?app=ingo', 'Download');
        toolbar_item($base_url . '/ingo/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/ingo', 'Source Code');
        toolbar_item($base_url . '/ingo/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'jeta':
        toolbar_item($base_url . '/jeta/', 'Jeta', true, true);
        toolbar_item($base_url . '/jeta/about/', 'About');
        toolbar_item($base_url . '/jeta/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=jeta', 'Download');
        toolbar_item('http://cvs.horde.org/jeta', 'Source Code');
        echo "</ul></li>\n";
        break;

    case 'kronolith':
        toolbar_item($base_url . '/kronolith/', 'Kronolith', true, true);
        toolbar_item($base_url . '/kronolith/case/', 'Case Studies');
        toolbar_item($base_url . '/kronolith/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=kronolith', 'Download');
        toolbar_item($base_url . '/kronolith/screenshots/', 'Screenshots');
        toolbar_item($base_url . '/kronolith/roadmap/', 'Roadmap');
        toolbar_item('http://cvs.horde.org/kronolith', 'Source Code');
        toolbar_item($base_url . '/kronolith/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'mimp':
        toolbar_item($base_url . '/mimp/', 'MIMP', true, true);
        toolbar_item($base_url . '/mimp/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=mimp', 'Download');
        toolbar_item($base_url . '/mimp/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/mimp', 'Source Code');
        toolbar_item($base_url . '/mimp/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'mnemo':
        toolbar_item($base_url . '/mnemo/', 'Mnemo', true, true);
        toolbar_item($base_url . '/mnemo/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=mnemo', 'Download');
        toolbar_item('http://cvs.horde.org/mnemo', 'Source Code');
        toolbar_item($base_url . '/mnemo/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'nag':
        toolbar_item($base_url . '/nag/', 'Nag', true, true);
        toolbar_item($base_url . '/nag/about/', 'About');
        toolbar_item($base_url . '/nag/authors/', 'Authors');
        toolbar_item($base_url . '/nag/contrib/', 'Contributions');
        toolbar_item($base_url . '/download/app/?app=nag', 'Download');
        toolbar_item($base_url . '/nag/docs/', 'Documentation');
        toolbar_item($base_url . '/nag/roadmap/', 'Roadmap');
        toolbar_item('http://cvs.horde.org/nag', 'Source Code');
        toolbar_item($base_url . '/nag/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'passwd':
        toolbar_item($base_url . '/passwd/', 'Passwd', true, true);
        toolbar_item($base_url . '/passwd/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=passwd', 'Download');
        toolbar_item($base_url . '/passwd/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/passwd', 'Source Code');
        toolbar_item($base_url . '/passwd/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'turba':
        toolbar_item($base_url . '/turba/', 'Turba', true, true);
        toolbar_item($base_url . '/turba/about/', 'About');
        toolbar_item($base_url . '/turba/authors/', 'Authors');
        //toolbar_item($base_url . '/turba/contrib/', 'Contributions');
        toolbar_item($base_url . '/download/app/?app=turba', 'Download');
        toolbar_item($base_url . '/turba/docs/', 'Documentation');
        //toolbar_item($base_url . '/turba/screenshots/', 'Screenshots');
        toolbar_item($base_url . '/turba/roadmap/', 'Roadmap');
        toolbar_item('http://cvs.horde.org/turba', 'Source Code');
        toolbar_item($base_url . '/turba/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'trean':
        toolbar_item($base_url . '/trean/', 'Trean', true, true);
        toolbar_item($base_url . '/trean/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/trean', 'Source Code');
        echo "</ul></li>\n";
        break;

    case 'vacation':
        toolbar_item($base_url . '/vacation/', 'Vacation', true, true);
        toolbar_item($base_url . '/vacation/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=vacation', 'Download');
        toolbar_item($base_url . '/vacation/screenshots/', 'Screenshots');
        toolbar_item('http://cvs.horde.org/vacation', 'Source Code');
        toolbar_item($base_url . '/vacation/vote/', 'Vote');
        echo "</ul></li>\n";
        break;

    case 'webmail':
        toolbar_item($base_url . '/webmail/', 'Horde Groupware<br />Webmail Edition', true, true);
        toolbar_item($base_url . '/webmail/docs/', 'Documentation');
        toolbar_item($base_url . '/download/app/?app=webmail', 'Download');
        toolbar_item($base_url . '/webmail/screenshots/', 'Screenshots');
        echo "</ul></li>\n";
        break;

    case 'whups':
        toolbar_item($base_url . '/whups/', 'Whups', true, true);
        //toolbar_item('http://bugs.horde.org/', 'Demo');
        toolbar_item($base_url . '/download/app/?app=whups', 'Download');
        toolbar_item($base_url . '/whups/docs/', 'Documentation');
        toolbar_item('http://cvs.horde.org/whups', 'Source Code');
        toolbar_item($base_url . '/whups/vote/', 'Vote');
        echo "</ul></li>\n";
        break;
    }

    toolbar_item($base_url . '/about/', 'About Horde', $toolbar_mode == 'about');
    toolbar_item($base_url . '/projects.php', 'Projects', $toolbar_mode == 'projects');
    toolbar_item($base_url . '/download/', 'Downloads', $toolbar_mode == 'download');

    toolbar_item('http://bugs.horde.org/', 'Bugs');
    toolbar_item('http://wiki.horde.org/', 'Wiki');

    if (substr($toolbar_mode, 0, 7) == 'support') {
        toolbar_item($base_url . '/support.php', 'Support', true, true);
        toolbar_item('http://wiki.horde.org/FAQ', 'FAQ', false);
        toolbar_item($base_url . '/irc.php', 'IRC', $toolbar_mode == 'support_irc');
        toolbar_item($base_url . '/mail/', 'Mailing Lists', $toolbar_mode == 'support_mail');
        echo "</ul></li>\n";
    } else {
        toolbar_item($base_url . '/support.php', 'Support', false);
    }

    if (substr($toolbar_mode, 0, 13) == 'documentation') {
        toolbar_item($base_url . '/documentation.php', 'Documentation', true, true);
        toolbar_item('http://dev.horde.org/', 'API References', false);
        toolbar_item('http://wiki.horde.org/FAQ', 'FAQ', false);
        toolbar_item($base_url . '/papers/', 'Library', $toolbar_mode == 'documentation_library');
        toolbar_item($base_url . '/licenses/', 'Licenses', $toolbar_mode == 'documentation_licenses');
        echo "</ul></li>\n";
    } else {
        toolbar_item($base_url . '/documentation.php', 'Documentation', false);
    }

    if (substr($toolbar_mode, 0, 6) == 'source') {
        toolbar_item($base_url . '/source/', 'Source Code', true, true);
        toolbar_item('http://cvs.horde.org/', 'Web Interface', false);
        toolbar_item($base_url . '/source/cvs.php', 'Using CVS (H3)', $toolbar_mode == 'source_cvs');
        toolbar_item($base_url . '/source/git.php', 'Using Git (H4)', $toolbar_mode == 'source_git');
        toolbar_item($base_url . '/source/modules.php', 'Modules', $toolbar_mode == 'source_modules');
        toolbar_item($base_url . '/source/versions.php', 'Versions', $toolbar_mode == 'source_versions');
        toolbar_item($base_url . '/source/snapshots.php', 'Snapshots', $toolbar_mode == 'source_snapshots');
        toolbar_item($base_url . '/source/contribute.php', 'Contribute', $toolbar_mode == 'source_contribute');
        echo "</ul></li>\n";
    } else {
        toolbar_item($base_url . '/source/', 'Source Code', false);
    }

    if (substr($toolbar_mode, 0, 10) == 'consulting') {
        toolbar_item($base_url . '/consulting/', 'Consulting', true);
    } else {
        toolbar_item($base_url . '/consulting/', 'Consulting', false);
    }

    toolbar_item('http://www.cafepress.com/hordeproject', 'Shop');

    toolbar_item($base_url . '/logos/', 'Logos', $toolbar_mode == 'logos');

    toolbar_item($base_url . '/thanks.php', 'Thanks', $toolbar_mode == 'thanks');
    toolbar_item($base_url . '/mirrors/', 'Mirrors', $toolbar_mode == 'mirrors');

    toolbar_item('http://www.cafepress.com/hordeproject', '<img src="' . $base_url . '/graphics/shop.gif" border="0" />');

    echo '</ul>';
?>

<div style="text-align:center">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="chuck@horde.org" />
<input type="hidden" name="item_name" value="Support the Horde Project" />
<input type="hidden" name="item_number" value="1" />
<input type="hidden" name="no_shipping" value="1" />
<input type="hidden" name="cn" value="Notes" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="tax" value="0" />
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" style="border:0" name="submit" alt="Donate to the Horde Project" />
</form>
<p><a href="http://www.easydns.com/?V=55611cf92a7e0842"><img src="<?php echo $base_url ?>/graphics/logos/easyDNS.gif" alt="easyDNS" width="88" height="31" /></a></p>
<p><a href="http://www.hub.org/?a_aid=horde&amp;a_bid=11110002"><img src="<?php echo $base_url ?>/graphics/logos/hub.org.gif" alt="hub.org" /></a></p>

<div style="margin: 8px; font-family:arial; font-size:10px"><a href="http://www.hostdepartment.com/" target="_blank">Project supported by Host Department Web Hosting</a></div>
</div>
<?php }

function getFeeds($feeds)
{
    global $fs_base;

    include_once $fs_base . '/libs/Horde/Cache.php';
    include_once $fs_base . '/libs/Jonah/FeedParser.php';
    include_once $fs_base . '/libs/Util.php';
    $cache = new Horde_Cache_File();

    $feed_stories = array();
    foreach ($feeds as $feed) {
        $my_stories = array();
        if ($data = $cache->get($feed, 3600)) {
            $my_stories = unserialize($data);
        } else {
            $parser = new Jonah_FeedParser('utf-8');
            $data = @file_get_contents($feed);
            $my_stories = array();
            if ($data) {
                $parser->parse($data);
                if (!empty($parser->structure['items'])) {
                    foreach ($parser->structure['items'] as $story) {
                        $my_stories[strtotime($story['pubdate'])] = array(
                            'url' => @$story['link'],
                            'title' => $story['title'],
                        );
                    }
                    $parser->cleanup();
                }
            }
            $cache->set($feed, serialize($my_stories));
        }
        $feed_stories += $my_stories;
    }
    krsort($feed_stories);
    return $feed_stories;
}
