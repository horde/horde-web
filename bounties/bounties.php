<?php
/* Copy'n'paste skeleton
    'app_bounty' => array(
        'state'   => 'unsponsored',
        'app'     => 'App',
        'task'    => 'Short.',
        'desc'    => 'Long.',
        'bug'     => ,
        'prize'   => ),
*/

$bounties = array(
/** Chora **/
    'chora_monitor' => array(
        'state'   => 'sponsored',
        'app'     => 'Chora',
        'task'    => 'Add a monitor script to Chora',
        'desc'    => 'Using commit hooks, Chora should be able to track when files change, allowing
                      caching a lot of data to help performance, and also generating interesting features
                      like activity timelines, stats, etc.',
        'bug'     => 2112,
        'prize'   => 200,
        'sponsor' => 'Top Floor Technologies',
        'link'    => 'www.topfloortech.com'),

/** Gollem **/
    'gollem_uploadapi' => array(
        'state'   => 'sponsored',
        'app'     => 'Gollem',
        'task'    => 'Add a file upload API to Gollem',
        'desc'    => 'There should be two variations here: one a straight API method that
                      takes a file (filename or data - should be able
                      to take either even if needs seperate methods
                      for this), its path, and the source to upload
                      the file to. Second, a converse to the
                      selectlist method that returns a pop-up or
                      embeddable browser that lets you browse to the
                      place you want to upload the file to, then hit
                      go.',
        'bug'     => 1020,
        'prize'   => 75,
        'sponsor' => 'Canadian Web Hosting',
        'link'    => 'www.canadianwebhosting.com/'),

/** IMP **/
    'imp_maintenance' => array(
        'state'   => 'sponsored',
        'app'     => 'IMP',
        'task'    => 'Allow finer grained customization of maintenance tasks.',
        'desc'    => 'Extend maintenance configuration to allow a freely
                      selectable matrix of task and frequency. Existing tasks
                      should be extended to be applied on user selectable
                      objects.',
        'bug'     => '56',
        'prize'   => '100',
        'sponsor' => 'AIO Network Solutions, Inc.',
        'logo'    => 'aio.jpg',
        'link'    => 'www.aiosolutions.com'),

    'imp_attachmentlink' => array(
        'state'   => 'sponsored',
        'app'     => 'IMP',
        'task'    => 'Add attachments through compose link',
        'desc'    => 'Refactor the Gollem API so that files can be retrieved and passed to IMP through a simple link.',
        'bug'     => '8018',
        'prize'   => '100',
        'sponsor' => 'Gesundehitsbezirk Brixen',
        ),

/** Trean **/
    'trean_firefox_addon' => array(
        'state'   => 'sponsored',
        'app'     => 'Trean',
        'task'    => 'Create a Firefox Add-on for using your Trean bookmarks directly from the browser.',
        'desc'    => 'It should be possible to drop Trean in as Firefox\'s bookmarks storage,
                      allowing users to use Horde as a central bookmark repository.',
        'bug'     => 2565,
        'prize'   => 100,
        'sponsor' => 'J. E. Higgins Lumber Co.'),

    'trean_feed' => array(
        'state'   => 'completed',
        'app'     => 'Trean',
        'task'    => 'Serve RSS or Atom feeds from Trean.',
        'desc'    => 'Generate feeds for each bookmarks folder, along with potentially
                      a feed for all of a user\'s bookmarks. Feeds should be cached;
                      extra credit for both RSS and Atom. Atom is preferred if only one
                      format is done, and again, extra points for supporting Atom publishing
                      protocol for adding/updating/deleting bookmarks via Atom.',
        'bug'     => 1927,
        'prize'   => 50,
        'sponsor' => 'Simplicato',
        'link'    => 'www.simplicato.com',
        'logo'    => 'simplicato.gif'),

/** Turba **/
    'turba_ldif' => array(
        'state'   => 'completed',
        'app'     => 'Turba',
        'task'    => 'Support LDIF import and export in Turba.',
        'desc'    => 'LDIF support would allow better integration with LDAP tools and other contact
                      managers that produce LDIF exports - it\'s more reliable than CSV. Import support
                      would be probably a bit more useful, but export is also important; we don\'t aim
                      for data lock-in in any way.',
        'bug'     => 2506,
        'prize'   => 100,
        'sponsor' => 'J. E. Higgins Lumber Co.'),
);

/* Sort everything by app. */
uasort($bounties, create_function('$a, $b', 'return strcmp($a["app"], $b["app"]);'));
