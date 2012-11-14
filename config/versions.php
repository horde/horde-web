<?php
/**
 * @TODO: Use a database for this, and write command line tools to automatically
 *        update this during release.
 *
 */
$horde_three_apps = array(
    'horde' => array(
        'name' => 'Horde',
        'ver' => '3.3.13',
        'date' => 'February 7 2012',
    ),
    'groupware' => array(
        'name' => 'Horde Groupware',
        'ver' => '1.2.11',
        'date' => 'February 10 2012',
        // Define 'dir' if it is not the same as the array key
        'dir' => 'horde-groupware'
    ),
    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'ver' => '1.2.11',
        'date' => 'February 10 2012',
        'dir' => 'horde-webmail'
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H3 (4.3.11)',
        'date' => 'February 10 2012',
    ),
    'dimp' => array(
        'name' => 'DIMP',
        'ver' => 'H3 (1.1.8)',
        'date' => 'February 10 2012',
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
        'ver' => '5.0.1',
        'date' => 'November 7 2012',
        'pear' => true
    ),
    'groupware' => array(
        'name' => 'Horde Groupware',
        'ver' => '5.0.1',
        'date' => 'November 7 2012',
        'pear' => true,
    ),
    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'ver' => '5.0.1',
        'date' => 'November 7 2012',
        'pear' => true,
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H5 (6.0.1)',
        'date' => 'November 7 2012',
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
        'ver' => 'H5 (4.0.0)',
        'date' => 'October 30 2012',
        'pear' => true
    ),
    'ingo' => array(
        'name' => 'Ingo',
        'ver' => 'H5 (3.0.1)',
        'date' => 'November 7 2012',
        'pear' => true
    ),
    'kronolith' => array(
        'name' => 'Kronolith',
        'ver' => 'H5 (4.0.1)',
        'date' => 'November 7 2012',
        'pear' => true
    ),
    'nag' => array(
        'name' => 'Nag',
        'ver' => 'H5 (4.0.0)',
        'date' => 'October 30 2012',
        'pear' => true
    ),
    'mnemo' => array(
        'name' => 'Mnemo',
        'ver' => 'H5 (4.0.0)',
        'date' => 'October 30 2012',
        'pear' => true
    ),
    'chora' => array(
        'name' => 'Chora',
        'ver' => 'H3 (2.1.1)',
        'date' => 'April 28 2010'
    ),
    'gollem' => array(
        'name' => 'Gollem',
        'ver' => 'H4 (2.0.2)',
        'date' => 'April 11 2012',
        'pear' => true
    ),
    'passwd' => array(
        'name' => 'Passwd',
        'ver' => 'H4 (4.0.1)',
        'date' => 'February 28 2012',
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
        'ver' => 'H4 (2.0.2)',
        'date' => 'February 28 2012',
        'pear' => true
    ),
    'wicked' => array(
        'name' => 'Wicked',
        'ver' => 'H4 (1.0.2)',
        'date' => 'September 6 2012',
        'pear' => true,
    ),
    'hermes' => array(
        'name' => 'Hermes',
        'ver' => 'H3 (1.0.1)',
        'date' => 'April 28 2010'
    ),
    'ansel' => array(
        'name' => 'Ansel',
        'ver' => 'H4 (2.0.2)',
        'date' => 'September 24 2012',
        'pear' => true,
    ),
    'klutz' => array(
        'name' => 'Klutz',
        'ver' => 'H3 (1.0)',
        'date' => 'March 19 2009'
    ),
    'content' => array(
        'name' => 'Content',
        'ver' => 'H5 (2.0.0)',
        'date' => 'October 30 2012',
        'pear' => true,
    ),
    'timeobjects' => array(
        'name' => 'Timeobjects',
        'ver' => 'H5 (2.0.0)',
        'date' => 'October 30 2012',
        'pear' => true,
    ),
);

$horde_apps_dev = array(
    'groupware' => array(
        'name' => 'Horde Groupware',
        'ver' => '5.0.0RC1',
        'date' => 'October 29 2012',
        'pear' => true,
    ),
    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'ver' => '5.0.0RC1',
        'date' => 'October 29 2012',
        'pear' => true,
    ),
    'horde' => array(
        'name' => 'Horde',
        'ver' => '5.0.0RC1',
        'date' => 'October 26 2012',
        'pear' => true,
    ),
    'imp' => array(
        'name' => 'IMP',
        'ver' => 'H5 (6.0.0RC2)',
        'date' => 'October 29 2012',
        'pear' => true,
    ),
    'turba' => array(
        'name' => 'Turba',
        'ver' => 'H5 (4.0.0RC1)',
        'date' => 'October 26 2012',
        'pear' => true,
    ),
    'ingo' => array(
        'name' => 'Ingo',
        'ver' => 'H5 (3.0.0RC1)',
        'date' => 'October 26 2012',
        'pear' => true,
    ),
    'kronolith' => array(
        'name' => 'Kronolith',
        'ver' => 'H5 (4.0.0RC1)',
        'date' => 'October 26 2012',
        'pear' => true,
    ),
    'nag' => array(
        'name' => 'Nag',
        'ver' => 'H5 (4.0.0RC1)',
        'date' => 'October 26 2012',
        'pear' => true,
    ),
    'mnemo' => array(
        'name' => 'Mnemo',
        'ver' => 'H5 (4.0.0RC1)',
        'date' => 'October 26 2012',
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
    'sesha' => array(
        'name' => 'Sesha',
        'ver' => 'H5 (1.0.0beta1)',
        'date' => 'August 08 2012',
        'pear' => true,
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
