<?php
/**
 * @TODO: Use a database for this, and write command line tools to automatically
 *        update this during release.
 *
 */
$horde_four_apps = array(
    'horde' => array(
        'name' => 'Horde',
        'ver' => '4.0.13',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'groupware' => array(
        'name' => 'Horde Groupware',
        'ver' => '4.0.5',
        'date' => 'December 13 2011',
        'pear' => true,
    ),
    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'ver' => '4.0.5',
        'date' => 'December 13 2011',
        'pear' => true,
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H4 (5.0.16)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'turba' => array(
        'name' => 'Turba',
        'ver' => 'H4 (3.0.10)',
        'date' => 'November 2 2011',
        'pear' => true
    ),
    'ingo' => array(
        'name' => 'Ingo',
        'ver' => 'H4 (2.0.7)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'kronolith' => array(
        'name' => 'Kronolith',
        'ver' => 'H4 (3.0.13)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'nag' => array(
        'name' => 'Nag',
        'ver' => 'H4 (3.0.7)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'mnemo' => array(
        'name' => 'Mnemo',
        'ver' => 'H4 (3.0.4)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'gollem' => array(
        'name' => 'Gollem',
        'ver' => 'H4 (2.0.1)',
        'date' => 'November 22 2011',
        'pear' => true
    ),
    'passwd' => array(
        'name' => 'Passwd',
        'ver' => 'H4 (4.0)',
        'date' => 'November 2 2011',
        'pear' => true,
    ),
    'whups' => array(
        'name' => 'Whups',
        'ver' => 'H4 (2.0.1)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'wicked' => array(
        'name' => 'Wicked',
        'ver' => 'H4 (1.0.1)',
        'date' => 'December 13 2011',
        'pear' => true,
    ),
    'ansel' => array(
        'name' => 'Ansel',
        'ver' => 'H4 (2.0)',
        'date' => 'November 2 2011',
        'pear' => true,
    ),
    'content' => array(
        'ver' => 'H4 (1.0.3)',
        'date' => 'October 14 2011',
        'pear' => true,
    ),
    'timeobjects' => array(
        'ver' => 'H4 (1.0.5)',
        'date' => 'December 13 2011',
        'pear' => true,
    ),
);

$horde_three_apps = array(
    'horde' => array(
        'name' => 'Horde',
        'ver' => '3.3.12',
        'date' => 'July 26 2011'
    ),
    'groupware' => array(
        'name' => 'Horde Groupware',
        'ver' => '1.2.10',
        'date' => 'July 26 2011',
        // Define 'dir' if it is not the same as the array key
        'dir' => 'horde-groupware'
    ),
    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'ver' => '1.2.10',
        'date' => 'July 26 2011',
        'dir' => 'horde-webmail'
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H3 (4.3.10)',
        'date' => 'July 26 2011'
    ),
    'dimp' => array(
        'name' => 'DIMP',
        'ver' => 'H3 (1.1.7)',
        'date' => 'July 26 2011'
    ),
    'mimp' => array(
        'name' => 'MIMP',
        'ver' => 'H3 (1.1.4)',
        'date' => 'July 26 2011'
    ),
    'turba' => array(
        'name' => 'Turba',
        'ver' => 'H3 (2.3.6)',
        'date' => 'July 26 2011'
    ),
    'ingo' => array(
        'name' => 'Ingo',
        'ver' => 'H3 (1.2.6)',
        'date' => 'July 26 2011',
    ),
    'kronolith' => array(
        'name' => 'Kronolith',
        'ver' => 'H3 (2.3.6)',
        'date' => 'July 26 2011',
    ),
    'nag' => array(
        'name' => 'Nag',
        'ver' => 'H3 (2.3.7)',
        'date' => 'July 26 2011',
    ),
    'mnemo' => array(
        'name' => 'Mnemo',
        'ver' => 'H3 (2.2.5)',
        'date' => 'July 26 2011',
    ),
    'chora' => array(
        'name' => 'Chora',
        'ver' => 'H3 (2.1.1)',
        'date' => 'April 28 2010'
    ),
    'gollem' => array(
        'name' => 'Gollem',
        'ver' => 'H3 (1.1.2)',
        'date' => 'September 28 2010'
    ),
    'passwd' => array(
        'name' => 'Passwd',
        'ver' => 'H3 (3.1.3)',
        'date' => 'April 28 2010'
    ),
    'forwards' => array(
        'name' => 'Forwards',
        'ver' => 'H3 (3.2.1)',
        'date' => 'April 28 2010'
    ),
    'vacation' => array(
        'name' => 'Vacation',
        'ver' => 'H3 (3.2.1)',
        'date' => 'April 28 2010'
    ),
    'jeta' => array(
        'name' => 'Jeta',
        'ver' => 'H3 (1.0)',
        'date' => 'January 28 2007'
    ),
    'whups' => array(
        'name' => 'Whups',
        'ver' => 'H3 (1.0.1)',
        'date' => 'November 6 2009'
    ),
    'hermes' => array(
        'name' => 'Hermes',
        'ver' => 'H3 (1.0.1)',
        'date' => 'April 28 2010'
    ),
    'ansel' => array(
        'name' => 'Ansel',
        'ver' => 'H3 (1.1.2)',
        'date' => 'September 28 2010'
    ),
    'klutz' => array(
        'name' => 'Klutz',
        'ver' => 'H3 (1.0)',
        'date' => 'March 19 2009'
    ),
);

$horde_apps_stable = array(
    // Define 'dir' if it is not the same as the array key
    'horde' => array(
        'name' => 'Horde',
        'ver' => '4.0.13',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'groupware' => array(
        'name' => 'Horde Groupware',
        'ver' => '4.0.5',
        'date' => 'December 13 2011',
        'pear' => true,
    ),
    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'ver' => '4.0.5',
        'date' => 'December 13 2011',
        'pear' => true,
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H4 (5.0.16)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'dimp' => array(
        'name' => 'DIMP',
        'ver' => 'H3 (1.1.6)',
        'date' => 'October 25 2010'
    ),
    'mimp' => array(
        'name' => 'MIMP',
        'ver' => 'H3 (1.1.3)',
        'date' => 'December 15 2009'
    ),
    'turba' => array(
        'name' => 'Turba',
        'ver' => 'H4 (3.0.10)',
        'date' => 'November 2 2011',
        'pear' => true
    ),
    'ingo' => array(
        'name' => 'Ingo',
        'ver' => 'H4 (2.0.7)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'kronolith' => array(
        'name' => 'Kronolith',
        'ver' => 'H4 (3.0.13)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'nag' => array(
        'name' => 'Nag',
        'ver' => 'H4 (3.0.7)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'mnemo' => array(
        'name' => 'Mnemo',
        'ver' => 'H4 (3.0.4)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'chora' => array(
        'name' => 'Chora',
        'ver' => 'H3 (2.1.1)',
        'date' => 'April 28 2010'
    ),
    'gollem' => array(
        'name' => 'Gollem',
        'ver' => 'H4 (2.0.1)',
        'date' => 'November 22 2011',
        'pear' => true
    ),
    'passwd' => array(
        'name' => 'Passwd',
        'ver' => 'H4 (4.0)',
        'date' => 'November 2 2011',
        'pear' => true,
    ),
    'forwards' => array(
        'name' => 'Forwards',
        'ver' => 'H3 (3.2.1)',
        'date' => 'April 28 2010'
    ),
    'vacation' => array(
        'name' => 'Vacation',
        'ver' => 'H3 (3.2.1)',
        'date' => 'April 28 2010'
    ),
    'jeta' => array(
        'name' => 'Jeta',
        'ver' => 'H3 (1.0)',
        'date' => 'January 28 2007'
    ),
    'whups' => array(
        'name' => 'Whups',
        'ver' => 'H4 (2.0.1)',
        'date' => 'December 13 2011',
        'pear' => true
    ),
    'wicked' => array(
        'name' => 'Wicked',
        'ver' => 'H4 (1.0.1)',
        'date' => 'December 13 2011',
        'pear' => true,
    ),
    'hermes' => array(
        'name' => 'Hermes',
        'ver' => 'H3 (1.0.1)',
        'date' => 'April 28 2010'
    ),
    'ansel' => array(
        'name' => 'Ansel',
        'ver' => 'H4 (2.0)',
        'date' => 'November 2 2011',
        'pear' => true,
    ),
    'klutz' => array(
        'name' => 'Klutz',
        'ver' => 'H3 (1.0)',
        'date' => 'March 19 2009'
    ),
    'content' => array(
        'ver' => 'H4 (1.0.3)',
        'date' => 'October 14 2011',
        'pear' => true,
    ),
    'timeobjects' => array(
        'ver' => 'H4 (1.0.5)',
        'date' => 'December 13 2011',
        'pear' => true,
    ),
);

$horde_apps_dev = array(
    'groupware' => array(
        'name' => 'Horde Groupware',
        'ver' => '1.2.3-RC1',
        'date' => 'April 18 2009',
        'dir' => 'horde-groupware',
        // Define file if it is not "app-latest.tar.gz"
        'file' => 'horde-groupware-1.2.3-rc1.tar.gz'
    ),
    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'ver' => '4.0-RC2',
        'date' => 'June 1 2011',
        'pear' => true,
    ),
    'horde' => array(
        'name' => 'Horde',
        'ver' => '4.0-RC2',
        'date' => 'March 29 2011',
        'pear' => true,
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H4 (5.0-RC2)',
        'date' => 'March 29 2011',
        'pear' => true,
    ),
    'turba' => array(
        'name' => 'Turba',
        'ver' => 'H4 (3.0-RC2)',
        'date' => 'March 29 2011',
        'pear' => true,
    ),
    'ingo' => array(
        'name' => 'Ingo',
        'ver' => 'H4 (2.0-RC2)',
        'date' => 'March 29 2011',
        'pear' => true,
    ),
    'kronolith' => array(
        'name' => 'Kronolith',
        'ver' => 'H4 (3.0-RC2)',
        'date' => 'March 29 2011',
        'pear' => true,
    ),
    'nag' => array(
        'name' => 'Nag',
        'ver' => 'H4 (3.0-RC2)',
        'date' => 'March 29 2011',
        'pear' => true,
        'pear' => true,
    ),
    'mnemo' => array(
        'name' => 'Mnemo',
        'ver' => 'H4 (3.0-RC2)',
        'date' => 'March 29 2011',
        'pear' => true,
    ),
    'gollem' => array(
        'name' => 'Gollem',
        'ver' => 'H4 (2.0-RC2)',
        'date' => 'October 18 2011',
        'pear' => true,
    ),
    'passwd' => array(
        'name' => 'Passwd',
        'ver' => 'H4 (4.0-RC1)',
        'date' => 'October 28 2011',
        'pear' => true,
    ),
    'whups' => array(
        'name' => 'Whups',
        'ver' => 'H4 (2.0-RC2)',
        'date' => 'October 18 2011',
        'pear' => true,
    ),
    'wicked' => array(
        'name' => 'Wicked',
        'ver' => 'H4 (1.0-RC1)',
        'date' => 'Oktober 11 2011',
        'pear' => true,
    ),
    'hermes' => array(
        'name' => 'Hermes',
        'ver' => 'H3 (1.0-RC2)',
        'date' => 'September 11 2008',
        'file' => 'hermes-h3-1.0-rc2.tar.gz'
    ),
    'klutz' => array(
        'name' => 'Klutz',
        'ver' => 'H3 (1.0-RC1)',
        'date' => 'December 20 2008',
        'file' => 'klutz-h3-1.0-rc1.tar.gz'
    ),
    'ansel' => array(
        'name' => 'Ansel',
        'ver' => 'H4 (2.0-RC2)',
        'date' => 'Oktober 28 2011',
        'pear' => true,
    ),
);
