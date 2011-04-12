<?php
/**
 * @TODO: Use a database for this, and write command line tools to automatically
 *        update this during release.
 *
 */
$horde_four_apps = array(
    'horde' => array(
        'name' => 'Horde',
        'ver' => '4.0',
        'date' => 'April 5 2011',
        'pear' => true
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H4 (5.0)',
        'date' => 'April 5 2011',
        'pear' => true
    ),
    'turba' => array(
        'name' => 'Turba',
        'ver' => 'H4 (3.0)',
        'date' => 'April 5 2011',
        'pear' => true
    ),
    'ingo' => array(
        'name' => 'Ingo',
        'ver' => 'H4 (2.0)',
        'date' => 'April 5 2011',
        'pear' => true
    ),
    'kronolith' => array(
        'name' => 'Kronolith',
        'ver' => 'H4 (3.0)',
        'date' => 'April 5 2011',
        'pear' => true
    ),
    'nag' => array(
        'name' => 'Nag',
        'ver' => 'H4 (3.0)',
        'date' => 'April 5 2011',
        'pear' => true
    ),
    'mnemo' => array(
        'name' => 'Mnemo',
        'ver' => 'H4 (3.0)',
        'date' => 'April 5 2011',
        'pear' => true
    ),
);

$horde_apps_stable = array(
    'horde' => array(
        'name' => 'Horde',
        'ver' => '4.0',
        'date' => 'April 5 2011',
        'pear' => true,
    ),
    'groupware' => array(
        'name' => 'Horde Groupware',
        'ver' => '1.2.9',
        'date' => 'November 22 2010',
        // Define 'dir' if it is not the same as the array key
        'dir' => 'horde-groupware'
    ),
    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'ver' => '1.2.9',
        'date' => 'November 22 2010',
        'dir' => 'horde-webmail'
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H4 (5.0)',
        'date' => 'April 5 2011',
        'pear' => true,
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
        'ver' => 'H4 (3.0)',
        'date' => 'April 5 2011',
        'pear' => true,
    ),
    'ingo' => array(
        'name' => 'Ingo',
        'ver' => 'H4 (2.0)',
        'date' => 'April 5 2011',
        'pear' => true,
    ),
    'kronolith' => array(
        'name' => 'Kronolith',
        'ver' => 'H4 (3.0)',
        'date' => 'April 5 2011',
        'pear' => true,
    ),
    'nag' => array(
        'name' => 'Nag',
        'ver' => 'H4 (3.0)',
        'date' => 'April 5 2011',
        'pear' => true,
    ),
    'mnemo' => array(
        'name' => 'Mnemo',
        'ver' => 'H4 (3.0)',
        'date' => 'April 5 2011',
        'pear' => true,
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
        'ver' => '1.2.3-RC1',
        'date' => 'April 18 2009',
        'dir' => 'horde-webmail',
        'file' => 'horde-webmail-1.2.3-rc1.tar.gz'
    ),
    'horde' => array(
        'name' => 'Horde',
        'ver' => '4.0-RC2',
        'date' => 'March 29 2011',
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H4 (5.0-RC2)',
        'date' => 'March 29 2011',
    ),
    'turba' => array(
        'name' => 'Turba H4',
        'ver' => 'H4 (3.0-RC2)',
        'date' => 'March 29 2011',
    ),
    'ingo' => array(
        'name' => 'Ingo H4',
        'ver' => 'H4 (2.0-RC2)',
        'date' => 'March 29 2011',
    ),
    'kronolith' => array(
        'name' => 'Kronolith H4',
        'ver' => 'H4 (3.0-RC2)',
        'date' => 'March 29 2011',
    ),
    'nag' => array(
        'name' => 'Nag H4',
        'ver' => 'H4 (3.0-RC2)',
        'date' => 'March 29 2011',
    ),
    'mnemo' => array(
        'name' => 'Mnemo H4',
        'ver' => 'H4 (3.0-RC2)',
        'date' => 'March 29 2011',
    ),
    'whups' => array(
        'name' => 'Whups',
        'ver' => 'H3 (1.0-RC2)',
        'date' => 'September 15 2008',
        'file' => 'whups-h3-1.0-rc2.tar.gz'
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
        'ver' => 'H3 (1.0-RC1)',
        'date' => 'January 20 2009',
        'file' => 'ansel-h3-1.0-rc1.tar.gz'
    ),
);
