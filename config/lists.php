<?php
$lists = array(
    'General Lists' => array(
        'announce' => array('desc'    => 'Horde-related announcements.',
                            'marc'    => 'horde-announce',
                            'gmane'   => 'announce',
                            'traffic' => 'low'),
        'horde'    => array('desc'    => 'For general discussion of the Horde Project, the Horde Core module,
                                          the Horde Groupware applications, new modules, or issues relevant
                                          to the Horde Project as a whole.',
                            'marc'    => 'horde',
                            'gmane'   => 'user',
                            'traffic' => 'medium'),
        'doc'      => array('desc'    => 'Discussions concerning documentation
                                          for the Horde Project.',
                            'marc'    => 'horde-doc',
                            'gmane'   => 'documentation',
                            'traffic' => 'low'),
        'i18n'     => array('desc'    => 'For internationalization and
                                          localization questions. If you are or
                                          want to become a translator of the
                                          Horde Project or for any problems
                                          with our applications in an
                                          international environment, this is
                                          the right place.',
                            'gmane'   => 'internationalization',
                            'traffic' => 'low'),
     ),
    'Application Lists' => array(
        'ansel'    => array('gmane'   => 'ansel',
                            'traffic' => 'low'),
        'chora'    => array('marc'    => 'chora',
                            'gmane'   => 'chora',
                            'traffic' => 'low'),
        'gollem'   => array('gmane'   => 'gollem',
                            'traffic' => 'low'),
        'imp'      => array('desc' => 'List for IMP, the Horde email client, as well as the mobile version MIMP and the AJAX version DIMP.',
                            'marc'    => 'imp',
                            'gmane'   => 'imp',
                            'google'  => 'horde-imp',
                            'traffic' => 'high'),
        'ingo'     => array('marc'    => 'ingo',
                            'gmane'   => 'ingo',
                            'traffic' => 'low'),
        'kronolith' => array('marc'    => 'kronolith',
                             'gmane'   => 'kronolith',
                             'traffic' => 'low'),
        'nag'      => array('gmane'   => 'nag',
                            'traffic' => 'low'),
        'sork'     => array('gmane'   => 'sork',
                            'traffic' => 'low'),
        'turba'    => array('marc'    => 'turba',
                            'gmane'   => 'turba',
                            'traffic' => 'low'),
     ),
    'Development Lists' => array(
        'dev'      => array('desc'    => 'General Horde development list. Horde
                                          developers discuss various design and
                                          implementation issues here.',
                            'marc'    => 'horde-dev',
                            'gmane'   => 'devel',
                            'google'  => 'horde-dev',
                            'traffic' => 'high'),
        'cvs'      => array('desc'    => 'Sign up to this list to receive an
                                          email every time someone commits a
                                          change to the Horde CVS tree.',
                            'marc'    => 'horde-cvs',
                            'gmane'   => 'cvs',
                            'google'  => 'horde-cvs',
                            'traffic' => 'high'),
        'commits'  => array('desc'    => 'Sign up to this list to receive an
                                          email every time someone commits a
                                          change to any of the Horde Git
                                          repositories.',
                            'traffic' => 'high'),
        'sync'     => array('desc'    => 'For general discussion and
                                          development of Horde syncing
                                          solutions, mainly the SyncML effort.',
                            'gmane'   => 'sync',
                            'traffic' => 'low'),
        'bugs'     => array('desc'    => 'An archive of all submissions/changes
                                          to the bug database (<a href="http://bugs.horde.org">http://bugs.horde.org</a>).
                                          This is <b>NOT</b> a discussion list;
                                          the purpose of it is to serve as an
                                          archive.',
                            'marc'    => 'horde-bugs',
                            'gmane'   => 'bugs',
                            'google'  => 'horde-bugs',
                            'traffic' => 'high'),
     ),
);
