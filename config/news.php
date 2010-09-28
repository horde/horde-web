<?php

$horde_news = array(
    'accounts' => array(
        'name' => 'Accounts',
        'news' => array(
            '**NODATE**' => 'Accounts has been deprecated and won\'t be maintained any further. Its functionality has been implemented as a portal block in Horde, and the grouping is no longer necessary with the new application menu system in Horde 3.',
        ),
        'releases' => array(
        )
    ),
    'ansel' => array(
        'name' => 'Ansel',
        'news' => array(
            '2009-11-06' => 'Ansel H3 (1.1) has been released, which includes geotagging and Google Maps support.',
            '2009-03-25' => 'The first stable version of Ansel H3 (1.0) has been released.',
            '2009-01-20' => 'The first release candidate of Ansel has been released. This is the first official release since development of Ansel had begun over 5 years ago.'
         ),
         'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Ansel H3 (1.1.2)', '2010/000566'),
                array('2010-04-28', 'Ansel H3 (1.1.1)', '2010/000547'),
                array('2009-11-06', 'Ansel H3 (1.1)', '2009/000528'),
                array('2009-03-25', 'Ansel H3 (1.0)', '2009/000496')),
            'dev' => array(
                array('2009-01-20', 'Ansel H3 (1.0-RC1)', '2009/000475'),
            )
         )
    ),
    'chora' => array(
        'name' => 'Chora',
        'news' => array(
            '2006-03-15' => 'Chora\'s log view has been completely revamped. Take a look at <a href="http://cvs.horde.org/">http://cvs.horde.org/</a> to see how Chora 2.1 will look like.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-04-28', 'Chora H3 (2.1.1)', '2010/000548'),
                array('2009-03-19', 'Chora H3 (2.1)', '2009/000490'),
                array('2007-03-19', 'Chora H3 (2.0.2)', '2007/000326'),
                array('2005-10-13', 'Chora H3 (2.0.1)', '2005/000220'),
                array('2004-12-23', 'Chora H3 (2.0)', '2004/000144'),
            ),
            'dev' => array(
                array('2005-08-29', 'Chora H3 (2.0.1-RC1)', '2006/000212'),
                array('2004-12-06', 'Chora H3 (2.0-RC3)', '2004/000136'),
                array('2004-11-25', 'Chora H3 (2.0-RC2)', '2004/000126'),
            ),
        )
    ),

    'dimp' => array(
        'name' => 'DIMP',
        'news' => array(
            '2009-12-15' => 'There won\'t be any DIMP version 2.0 anymore. DIMP has been integrated completely into the upcoming IMP 5.',
            '2008-09-26' => 'DIMP H3 (1.1) has been released.',
            '2008-06-10' => 'The ability to drag and drop folders has been re-added for DIMP H3 (1.1). This feature existed earlier but had been removed for the final 1.0 release because it wasn\'t stable enough at that time.',
            '2008-05-25' => 'DIMP H3 (1.0) has been released after more than two years of development. Read the <a href="http://lists.horde.org/archives/announce/2008/000410.html">release announcement</a> for details.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'DIMP H3 (1.1.5)', '2010/000561'),
                array('2009-12-15', 'DIMP H3 (1.1.4)', '2009/000531'),
                array('2009-09-14', 'DIMP H3 (1.1.3)', '2009/000518'),
                array('2009-04-13', 'DIMP H3 (1.1.2)', '2009/000499'),
                array('2008-12-20', 'DIMP H3 (1.1.1)', '2008/000474'),
                array('2008-09-26', 'DIMP H3 (1.1)', '2008/000449'),
                array('2008-05-25', 'DIMP H3 (1.0)', '2008/000410'),
            ),
            'dev' => array(
                array('2008-09-11', 'DIMP H3 (1.1-RC2)', '2008/000441'),
                array('2008-07-31', 'DIMP H3 (1.0.1-RC1)', '2008/000425'),
                array('2008-05-10', 'DIMP H3 (1.0-RC4)', '2008/000397'),
                array('2008-03-13', 'DIMP H3 (1.0-RC3)', '2008/000387'),
                array('2008-01-22', 'DIMP H3 (1.0-RC2)', '2008/000372'),
            ),
        )
    ),

    'forwards' => array(
        'name' => 'Forwards',
        'news' => array(
            '2006-03-13' => 'Forwards H3 (3.0) has been released after several years of development with new drivers, translations and support for PHP 5. Read the <a href="http://lists.horde.org/archives/announce/2006/000269.html">release announcement</a> for details.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-04-28', 'Forwards H3 (3.2.1)', '2010/000549'),
                array('2009-11-06', 'Forwards H3 (3.2)', '2009/000527'),
                array('2009-03-19', 'Forwards H3 (3.1)', '2009/000491'),
                array('2007-03-15', 'Forwards H3 (3.0.1)', '2007/000319'),
                array('2006-03-13', 'Forwards H3 (3.0)', '2006/000269'),
            ),
            'dev' => array(
                array('2006-02-17', 'Forwards H3 (3.0-RC1)', '2006/000258'),
            ),
        )
    ),

    'gollem' => array(
        'name' => 'Gollem',
        'news' => array(
            '2006-03-20' => 'The ability to edit text and even HTML files has been added to Gollem in CVS. For text files, a simple textarea is used to edit the content, for HTML files Horde\'s WYSIWYG editor is loaded. This feature will be released with Gollem 1.1.'
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Gollem H3 (1.1.2)', '2010/000565'),
                array('2009-11-06', 'Gollem H3 (1.1.1)', '2009/000524'),
                array('2009-03-19', 'Gollem H3 (1.1)', '2009/000495'),
                array('2008-10-09', 'Gollem H3 (1.0.4)', '2008/000458'),
                array('2007-03-19', 'Gollem H3 (1.0.3)', '2007/000328'),
            ),
        )
    ),

    'groupware' => array(
        'name' => 'Horde Groupware',
        'news' => array(
            '2008-09-26' => 'Horde Groupware 1.2 has been released',
            '2008-09-10' => 'Horde Groupware 1.0.7 and 1.1.3 have been released with security fixes for XSS vulnerabilities.',
            '2008-08-15' => 'Horde Groupware has finally an upgrade option added to the setup script. It makes upgrading from older Horde Groupware versions as easy as the initial installation. Version 1.1.2 is the first one that ships with the upgrade functionality.',
            '2008-06-13' => 'Horde Groupware 1.0.6 and 1.1.1 have been released with minor security fixes. Horde Groupware 1.1.1 also includes a number of bugfixes from 1.1.',
            '2008-05-25' => 'The final release of Horde Groupware 1.1 with lots of new features is available.',
            '2008-03-08' => 'Horde Groupware 1.0.5 has been released. This is a security release that closes a file inclusion vulnerability through abuse of the theme preference.  All users are encouraged to upgrade to this version.',
            '2008-02-15' => 'Horde Groupware 1.0.4 has been released. This is a security release that fixes unchecked access to contacts in the same address book SQL table, if the unique key of another user\'s contact can be guessed.  All users are encouraged to upgrade to this version.',
            '2007-11-29' => 'The first release candidate for Horde Groupware 1.1 with lots of new features is available.',
            '2007-01-14' => 'The final release of Horde Groupware 1.0 is available.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Horde Groupware 1.2.7', '2010/000567'),
                array('2010-04-29', 'Horde Groupware 1.2.6', '2010/000554'),
                array('2009-12-15', 'Horde Groupware 1.2.5', '2009/000538'),
                array('2009-09-14', 'Horde Groupware 1.2.4', '2009/000520'),
                array('2009-09-14', 'Horde Groupware 1.1.6', '2009/000510'),
                array('2009-05-01', 'Horde Groupware 1.2.3', '2009/000505'),
                array('2009-01-28', 'Horde Groupware 1.2.2', '2009/000488'),
                array('2009-01-28', 'Horde Groupware 1.1.5', '2009/000486'),
                array('2008-12-10', 'Horde Groupware 1.2.1', '2008/000471'),
                array('2008-12-10', 'Horde Groupware 1.1.4', '2008/000466'),
                array('2008-09-26', 'Horde Groupware 1.2', '2008/000456'),
                array('2008-09-10', 'Horde Groupware 1.1.3', '2008/000432'),
                array('2008-09-10', 'Horde Groupware 1.0.7', '2008/000430'),
                array('2008-08-15', 'Horde Groupware 1.1.2', '2008/000426'),
                array('2008-06-13', 'Horde Groupware 1.1.1', '2008/000419'),
                array('2008-06-13', 'Horde Groupware 1.0.6', '2008/000417'),
                array('2008-05-25', 'Horde Groupware 1.1', '2008/000412'),
                array('2008-03-08', 'Horde Groupware 1.0.5', '2008/000383'),
                array('2008-02-15', 'Horde Groupware 1.0.4', '2008/000380'),
                array('2008-01-09', 'Horde Groupware 1.0.3', '2008/000365'),
                array('2007-10-01', 'Horde Groupware 1.0.2', '2007/000344'),
                array('2007-03-16', 'Horde Groupware 1.0.1', '2007/000324'),
                array('2007-01-14', 'Horde Groupware 1.0', '2007/000308'),
            ),
            'dev' => array(
                array('2009-04-18', 'Horde Groupware 1.2.3-RC1', '2009/000502'),
                array('2008-09-12', 'Horde Groupware 1.2-RC1', '2008/000444'),
                array('2008-05-10', 'Horde Groupware 1.1-RC3', '2008/000400'),
                array('2008-02-06', 'Horde Groupware 1.1-RC2', '2008/000376'),
                array('2007-11-29', 'Horde Groupware 1.1-RC1', '2007/000356'),
            ),
        )
    ),

    'horde' => array(
        'name' => 'Horde',
        'news' => array(
            '2008-09-26' => 'The final release of The Horde Application Framework 3.3 is available.',
            '2008-07-17' => 'A Basque translation, contributed by Euskal Herriko Unibertsitatea has been added for Horde and several applications.',
            '2008-07-03' => 'The ability to remove user data from all the different applications and backends has been finished. This already worked partially for some time but hadn\'t been finished until now. This feature is triggered when deleting users through the Horde interface, but can also be run for individual users at any point.',
            '2008-06-13' => 'Horde 3.2.1 and 3.1.8 have been released with minor security fixes. Horde 3.2.1 also includes a number of bugfixes from 3.2.',
            '2008-05-25' => 'The final release of The Horde Application Framework 3.2 is available.',
            '2008-03-07' => 'Horde 3.1.7 has been released with a security fix (please see the <a href="http://lists.horde.org/archives/announce/2008/000382.html">release announcement</a> for details. Horde 3.2.x is not vulnerable.',
            '2007-02-23' => 'A new alarm and notification framework has been added for Horde 3.2. Users can now decide how they want to be notified about alarms, e.g. for upcoming events or due tasks. Alarms are shown on every page of the interface or sent by mail, administrators can create global alarms, etc.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Horde 3.3.9', '2010/000557'),
                array('2010-04-28', 'Horde 3.3.8', '2010/000553'),
                array('2010-04-27', 'Horde 3.3.7', '2010/000541'),
                array('2009-12-15', 'Horde 3.3.6', '2009/000529'),
                array('2009-09-14', 'Horde 3.3.5', '2009/000512'),
                array('2009-09-14', 'Horde 3.2.5', '2009/000509'),
                array('2009-05-01', 'Horde 3.3.4', '2009/000504'),
                array('2009-01-27', 'Horde 3.3.3', '2009/000482'),
                array('2009-01-27', 'Horde 3.2.4', '2009/000483'),
                array('2008-12-10', 'Horde 3.3.2', '2008/000468'),
                array('2008-12-10', 'Horde 3.3.1', '2008/000464'),
                array('2008-12-10', 'Horde 3.2.3', '2008/000462'),
                array('2008-09-26', 'Horde 3.3', '2008/000447'),
                array('2008-09-10', 'Horde 3.2.2', '2008/000429'),
                array('2008-09-10', 'Horde 3.1.9', '2008/000428'),
                array('2008-05-25', 'Horde 3.2', '2008/000411'),
                array('2008-06-13', 'Horde 3.1.8', '2008/000415'),
                array('2008-03-07', 'Horde 3.1.7', '2008/000382'),
                array('2008-01-09', 'Horde 3.1.6', '2008/000360'),
                array('2007-09-29', 'Horde 3.1.5', '2007/000338'),
                array('2007-03-14', 'Horde 3.1.4', '2007/000315'),
            ),
            'dev' => array(
                array('2009-04-13', 'Horde 3.3.4-RC1', '2009/000498'),
                array('2008-09-11', 'Horde 3.3-RC1', '2008/000440'),
                array('2008-05-10', 'Horde 3.2-RC4', '2008/000394'),
                array('2008-03-13', 'Horde 3.2-RC3', '2008/000385'),
                array('2008-01-22', 'Horde 3.2-RC2', '2008/000374'),
            ),
        )
    ),

    'hermes' => array(
        'name' => 'Hermes',
        'news' => array(
            '2008-09-26' => 'The first stable release, Hermes H3 (1.0) has finally been released.',
            '2008-06-30' => 'The first release candidate, Hermes H3 (1.0-RC1) has been released.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-04-28', 'Hermes H3 (1.0.1)', '2010/000550'),
                array('2008-09-26', 'Hermes H3 (1.0)', '2008/000454'),
            ),
            'dev' => array(
                array('2008-09-11', 'Hermes H3 (1.0-RC2)', '2008/000439'),
                array('2008-06-30', 'Hermes H3 (1.0-RC1)', '2008/000422'),
            ),
        )
    ),

    'imp' => array(
        'name' => 'IMP',
        'news' => array(
            '2009-12-15' => 'The development of IMP 5.0 has reached bug fixing mode. There will probably still be added a few more features before the final release, but most work is going into fixing bugs and finishing Horde 4, the groundwork of IMP 5.',
            '2008-09-26' => 'The final release of the IMP Webmail Client H3 (4.3) is available',
            '2008-07-10' => 'A feature to attach personal contact information to outgoing messages has been added and will be available with IMP H3 (4.3).',
            '2008-06-30' => 'The folder list generation has been much improved and sped up. These changes should also fix some namespace issues that some people have seen with Courier and Dovecot servers.',
            '2008-06-27' => 'A mailto: handler for Firefox 3 has been added for IMP H3 (4.3). This handler can be installed similar to a Firefox extension and makes the browser opening IMP\'s compose window when clicking a linked email address in any webpage.',
            '2008-05-25' => 'The final release of the IMP Webmail Client H3 (4.2) is available.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'IMP H3 (4.3.8)', '2010/000558'),
                array('2010-04-27', 'IMP H3 (4.3.7)', '2010/000542'),
                array('2009-12-15', 'IMP H3 (4.3.6)', '2009/000530'),
                array('2009-09-14', 'IMP H3 (4.3.5)', '2009/000517'),
                array('2009-04-13', 'IMP H3 (4.3.4)', '2009/000500'),
                array('2009-01-27', 'IMP H3 (4.3.3)', '2009/000485'),
                array('2009-01-27', 'IMP H3 (4.2.2)', '2009/000484'),
                array('2008-12-10', 'IMP H3 (4.3.2)', '2008/000469'),
                array('2008-12-10', 'IMP H3 (4.3.1)', '2008/000463'),
                array('2008-12-10', 'IMP H3 (4.2.1)', '2008/000460'),
                array('2008-09-26', 'IMP H3 (4.3)', '2008/000448'),
                array('2008-05-25', 'IMP H3 (4.2)', '2008/000407'),
                array('2008-01-09', 'IMP H3 (4.1.6)', '2008/000358'),
                array('2007-09-29', 'IMP H3 (4.1.5)', '2007/000339'),
                array('2007-03-14', 'IMP H3 (4.1.4)', '2007/000316'),
            ),
            'dev' => array(
                array('2008-09-11', 'IMP H3 (4.3-RC2)', '2008/000442'),
                array('2008-07-31', 'IMP H3 (4.2.1-RC1)', '2008/000423'),
                array('2008-05-10', 'IMP H3 (4.2-RC4)', '2008/000399'),
                array('2008-03-13', 'IMP H3 (4.2-RC3)', '2008/000386'),
                array('2008-01-22', 'IMP H3 (4.2-RC2)', '2008/000373'),
                array('2007-02-27', 'IMP H3 (4.1.4-RC1)', '2007/000312'),
            ),
        )
    ),

    'ingo' => array(
        'name' => 'Ingo',
        'news' => array(
            '2008-09-11' => 'The final release of Ingo H3 (1.2.1) is available.',
            '2008-05-25' => 'The final release of Ingo H3 (1.2) is available.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Ingo H3 (1.2.5)', '2010/000560'),
                array('2010-04-27', 'Ingo H3 (1.2.4)', '2010/000544'),
                array('2009-12-15', 'Ingo H3 (1.2.3)', '2009/000534'),
                array('2009-09-14', 'Ingo H3 (1.2.2)', '2009/000516'),
                array('2008-09-11', 'Ingo H3 (1.2.1)', '2008/000443'),
                array('2008-05-25', 'Ingo H3 (1.2)', '2008/000408'),
                array('2008-01-09', 'Ingo H3 (1.1.5)', '2008/000359'),
                array('2007-09-29', 'Ingo H3 (1.1.4)', '2007/000341'),
                array('2007-03-16', 'Ingo H3 (1.1.3)', '2007/000323'),
            ),
            'dev' => array(
                array('2008-05-10', 'Ingo H3 (1.2-RC3)', '2008/000393'),
                array('2008-01-22', 'Ingo H3 (1.2-RC2)', '2008/000370'),
            ),
        )
    ),

    'jeta' => array(
        'name' => 'Jeta',
        'news' => array(
            '2007-01-28' => 'The initial stable version of Jeta H3 (1.0) has been released.',
            '2006-11-23' => 'The second release candidate of Jeta H3 (1.0-RC2) has been released.',
            '2006-08-05' => 'The first release candidate of Jeta H3 (1.0-RC1) has been released.',
        ),
        'releases' => array(
            'stable' => array(
                array('2007-01-28', 'Jeta H3 (1.0)', '2007/000310'),
            ),
            'dev' => array(
                array('2006-11-23', 'Jeta H3 (1.0-RC2)', '2006/000305'),
                array('2006-08-05', 'Jeta H3 (1.0-RC1)', '2006/000290'),
            ),
        )
    ),

    'klutz' => array(
        'name' => 'Klutz',
        'news' => array(
            '2009-03-19' => 'The first stable version of Klutz H3 (1.0) has been released.',
            '2008-10-20' => 'The first release candidate of Klutz has been released. This is the first official release since development of Klutz had begun several years ago.',
        ),
        'releases' => array(
            'stable' => array(
                array('2009-03-19', 'Klutz H3 (1.0)', '2009/000494')
            ),
            'dev' => array(
                array('2008-12-20', 'Klutz H3 (1.0-RC1)', '2008/000473'),
            ),
        )
    ),

    'kronolith' => array(
        'name' => 'Kronolith',
        'news' => array(
            '2009-11-28' => 'The Ajax frontend for the upcoming Kronolith version 3.0 is more or less feature complete. If you want to contribute testing, development or bug fixing, check it out from the Horde Git repository.',
            '2008-10-22' => 'Starting with version 3.0, Kronolith is now able to store all events in UTC time. This allows sharing of events across different timezones.',
            '2008-09-26' => 'The Kronolith Calendar Application H3 (2.3) has been released.',
            '2008-07-17' => 'A maintenance task to delete old events from the calendar has been added for Kronolith H3 (2.3).',
            '2008-04-27' => 'The Kronolith Calendar Application H3 (2.1.8) has been released with a minor security fix.',
            '2006-03-20' => 'A private flag has been added to Kronolith in CVS. This allows to hide details on events even if they have been added to a shared calendar. This flag is also sychronized with other calendar systems. It has been sponsored by the German <a href="http://www.debeka.de">Debeka Group</a> and will be part of Kronolith 2.2.',
            '2006-03-06' => 'The Kronolith Calendar Application H3 (2.1) has been released with many new features and improvements, e.g. a year view, email notifications abut changed events, iCal/Sunbird support, improved accessibility and Kolab support, and many more. Read the <a href="http://lists.horde.org/archives/announce/2006/000266.html">release announcement</a> for details.',
            '2006-02-15' => 'Delegation support has been added in CVS. Users can now delegate events to other users if they got appropriate permissions from them before. The events will also be moved to the other user\'s calendar and the organizer of meeting requests will be updated too. This feature is sponsored by the German <a href="http://www.debeka.de">Debeka Group</a> and will be part of Kronolith 2.2.',
            '2006-02-13' => 'Tobias K�nig from the <a href="http://www.kde.org">KDE</a> team is currently working on fixing all <a href="http://www.kolab.org">Kolab</a> related bugs in Horde and already smashed a few in Kronolith. The fixes will be released with Kronolith 2.1-RC3.'
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Kronolith H3 (2.3.5)', '2010/000562'),
                array('2010-04-27', 'Kronolith H3 (2.3.4)', '2010/000546'),
                array('2009-12-15', 'Kronolith H3 (2.3.3)', '2009/000536'),
                array('2009-09-14', 'Kronolith H3 (2.3.2)', '2009/000513'),
                array('2009-03-30', 'Kronolith H3 (2.3.1)', '2009/000497'),
                array('2008-09-26', 'Kronolith H3 (2.3)', '2008/000452'),
                array('2008-05-25', 'Kronolith H3 (2.2)', '2008/000404'),
                array('2008-04-27', 'Kronolith H3 (2.1.8)', '2008/000390'),
                array('2008-01-09', 'Kronolith H3 (2.1.7)', '2007/000361'),
                array('2007-09-29', 'Kronolith H3 (2.1.6)', '2007/000343'),
                array('2007-03-15', 'Kronolith H3 (2.1.5)', '2007/000322'),
            ),
            'dev' => array(
                array('2008-09-11', 'Kronolith H3 (2.3-RC1)', '2008/000437'),
                array('2008-05-10', 'Kronolith H3 (2.2-RC3)', '2008/000390'),
                array('2008-01-22', 'Kronolith H3 (2.2-RC2)', '2008/000371'),
            ),
        )
    ),

    'mimp' => array(
        'name' => 'MIMP',
        'news' => array(
            '2009-12-15' => 'There won\'t be any DIMP version 2.0 anymore. DIMP has been integrated completely into the upcoming IMP 5.',
            '2008-09-26' => 'The final release of MIMP H3 (1.1.1) is available',
            '2008-05-25' => 'The final release of MIMP H3 (1.1) is available.',
        ),
        'releases' => array(
            'stable' => array(
                array('2009-12-15', 'MIMP H3 (1.1.3)', '2009/000532'),
                array('2009-09-14', 'MIMP H3 (1.1.2)', '2009/000519'),
                array('2008-09-26', 'MIMP H3 (1.1.1)', '2008/000450'),
                array('2008-05-25', 'MIMP H3 (1.1)', '2008/000409'),
                array('2007-09-29', 'MIMP H3 (1.0.2)', '2007/000342'),
                array('2007-03-19', 'MIMP H3 (1.0.1)', '2007/000327'),
            ),
            'dev' => array(
                array('2008-07-31', 'MIMP H3 (1.1.1-RC1)', '2008/000424'),
                array('2008-05-10', 'MIMP H3 (1.1-RC3)', '2008/000398'),
                array('2008-03-13', 'MIMP H3 (1.1-RC2)', '2008/000388'),
                array('2007-11-27', 'MIMP H3 (1.1-RC1)', '2007/000350'),
            ),
        )
    ),

    'mnemo' => array(
        'name' => 'Mnemo',
        'news' => array(
            '2008-05-25' => 'The final release of Mnemo H3 (2.2) is available.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Mnemo H3 (2.2.4)', '2010/000564'),
                array('2009-12-15', 'Mnemo H3 (2.2.3)', '2009/000537'),
                array('2009-09-14', 'Mnemo H3 (2.2.2)', '2009/000515'),
                array('2008-09-11', 'Mnemo H3 (2.2.1)', '2008/000434'),
                array('2008-05-25', 'Mnemo H3 (2.2)', '2008/000406'),
                array('2008-01-09', 'Mnemo H3 (2.1.2)', '2008/000364'),
            ),
            'dev' => array(
                array('2008-05-10', 'Mnemo H3 (2.2-RC3)', '2008/000391'),
                array('2008-01-22', 'Mnemo H3 (2.2-RC2)', '2008/000369'),
            ),
        )
    ),

    'nag' => array(
        'name' => 'Nag',
        'news' => array(
            '2009-12-15' => 'The upcoming Nag version 3.0 will be integrated into the Ajax frontend of the Kronolith 3.0 calendar application. You can still use it seperately, but if installed, you can manage your tasks completely through Kronolith\'s Ajax interface.',
            '2008-09-26' => 'The final release of Nag H3 (2.3) is available.',
            '2008-07-02' => 'Assignees can be assigned to tasks now. Support for that has been in the database table for a long time, but the functionality and interfaces have been added for Nag H3 (2.3) right now.',
            '2008-05-25' => 'The final release of Nag H3 (2.2) is available.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Nag H3 (2.3.6)', '2010/000563'),
                array('2010-04-27', 'Nag H3 (2.3.5)', '2010/000545'),
                array('2009-12-15', 'Nag H3 (2.3.4)', '2009/000535'),
                array('2009-09-14', 'Nag H3 (2.3.3)', '2009/000514'),
                array('2009-04-16', 'Nag H3 (2.3.2)', '2009/000501'),
                array('2008-10-15', 'Nag H3 (2.3.1)', '2008/000459'),
                array('2008-09-26', 'Nag H3 (2.3)', '2008/000453'),
                array('2008-05-25', 'Nag H3 (2.2)', '2008/000405'),
                array('2008-01-09', 'Nag H3 (2.1.4)', '2008/000363'),
                array('2007-03-15', 'Nag H3 (2.1.3)', '2007/000318'),
            ),
            'dev' => array(
                array('2008-09-11', 'Nag H3 (2.3-RC1)', '2008/000436'),
                array('2008-05-10', 'Nag H3 (2.2-RC3)', '2008/000396'),
                array('2008-01-22', 'Nag H3 (2.2-RC2)', '2008/000368'),
            ),
        )
    ),

    'passwd' => array(
        'name' => 'Passwd',
        'news' => array(
        ),
        'releases' => array(
            'stable' => array(
                array('2010-04-28', 'Passwd H3 (3.1.3)', '2010/000551'),
                array('2009-11-06', 'Passwd H3 (3.1.2)', '2009/000523'),
                array('2009-07-05', 'Passwd H3 (3.1.1)', '2009/000508'),
                array('2009-03-19', 'Passwd H3 (3.1)', '2009/000492'),
                array('2007-03-15', 'Passwd H3 (3.0.1)', '2007/000321'),
                array('2005-10-09', 'Passwd H3 (3.0)', '2005/000219'),
            ),
            'dev' => array(
                array('2007-02-27', 'Passwd H3 (3.0.1-RC1)', '2007/000313'),
                array('2005-09-14', 'Passwd H3 (3.0-RC1)', '2005/000217'),
                array('2005-08-22', 'Passwd H3 (3.0-BETA)', '2005/000211'),
            ),
        )
    ),

    'turba' => array(
        'name' => 'Turba',
        'news' => array(
            '2008-09-26' => 'Turba H3 (2.3) has been released.',
            '2008-08-11' => 'Support for photos and logos has been added and will be available with Turba H3 (2.3).',
            '2008-06-13' => 'Turba H3 (2.2.1) has been released with a minor security fix.',
            '2008-02-15' => 'The Turba Contact Manager versions H3 (2.2-RC3) and H3 (2.1.7) have been released. These are security releases that fix unchecked access to contacts in the same SQL table, if the unique key of another user\'s contact can be guessed.  All users are encouraged to upgrade to this version.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Turba H3 (2.3.5)', '2010/000559'),
                array('2010-04-27', 'Turba H3 (2.3.4)', '2010/000543'),
                array('2009-12-15', 'Turba H3 (2.3.3)', '2009/000533'),
                array('2009-09-14', 'Turba H3 (2.3.2)', '2009/000521'),
                array('2008-12-10', 'Turba H3 (2.3.1)', '2008/000470'),
                array('2008-12-10', 'Turba H3 (2.2.2)', '2008/000461'),
                array('2008-09-26', 'Turba H3 (2.3)', '2008/000451'),
                array('2008-06-13', 'Turba H3 (2.2.1)', '2008/000414'),
                array('2008-05-25', 'Turba H3 (2.2)', '2008/000403'),
                array('2008-02-15', 'Turba H3 (2.1.7)', '2008/000378'),
                array('2008-01-09', 'Turba H3 (2.1.6)', '2008/000361'),
                array('2007-09-29', 'Turba H3 (2.1.5)', '2007/000340'),
                array('2007-03-15', 'Turba H3 (2.1.4)', '2007/000317'),
            ),
            'dev' => array(
                array('2008-09-11', 'Turba H3 (2.3-RC1)', '2008/000438'),
                array('2008-05-10', 'Turba H3 (2.2-RC4)', '2008/000392'),
                array('2008-02-15', 'Turba H3 (2.2-RC3)', '2008/000379'),
                array('2008-01-22', 'Turba H3 (2.2-RC2)', '2008/000367'),
            ),
        )
    ),

    'vacation' => array(
        'name' => 'Vacation',
        'news' => array(
        ),
        'releases' => array(
            'stable' => array(
                array('2010-04-28', 'Vacation H3 (3.2.1)', '2010/000552'),
                array('2009-11-06', 'Vacation H3 (3.2)', '2009/00026'),
                array('2009-03-19', 'Vacation H3 (3.1)', '2009/000493'),
                array('2007-03-15', 'Vacation H3 (3.0.1)', '2007/000320'),
                array('2006-05-05', 'Vacation H3 (3.0)', '2006/000281'),
            ),
            'dev' => array(
                array('2007-02-27', 'Vacation H3 (3.0.1-RC1)', '2007/000314'),
                array('2006-02-17', 'Vacation H3 (3.0-RC1)', '2006/000259'),
            ),
        )
    ),

    'webmail' => array(
        'name' => 'Horde Groupware Webmail Edition',
        'news' => array(
            '2008-09-26' => 'Horde Groupware Webmail Edition 1.2 has been released.',
            '2008-09-10' => 'Horde Groupware Webmail Edition 1.0.8 and 1.1.3 have been released with security fixes for XSS vulnerabilities.',
            '2008-08-15' => 'Horde Groupware Webmail Edition has finally an upgrade option added to the setup script. It makes upgrading from older Horde Groupware Webmail Edition versions as easy as the initial installation. Version 1.1.2 is the first one that ships with the upgrade functionality.',
            '2008-06-13' => 'Horde Groupware Webmail Edition 1.0.6 and 1.1.1 have been released with minor security fixes. Horde Groupware Webmail Edition 1.1.1 also includes a number of bugfixes from 1.1.',
            '2008-05-25' => 'The final release for Horde Groupware Webmail Edition 1.1 is available.',
            '2008-03-08' => 'Horde Groupware Webmail Edition 1.0.6 has been released. This is a security release that closes a file inclusion vulnerability through abuse of the theme preference.  All users are encouraged to upgrade to this version.',
            '2008-02-15' => 'Horde Groupware Webmail Edition 1.0.5 has been released. This is a security release that fixes unchecked access to contacts in the same address book SQL table, if the unique key of another user\'s contact can be guessed.  All users are encouraged to upgrade to this version.',
            '2007-11-29' => 'The first release candidate for Horde Groupware Webmail Edition 1.1 including new AJAX and mobile webmail clients is available.',
            '2007-01-14' => 'The final release of Horde Groupware Webmail Edition 1.0 is available.',
        ),
        'releases' => array(
            'stable' => array(
                array('2010-09-28', 'Horde Groupware Webmail Edition 1.2.7', '2010/000568'),
                array('2010-04-29', 'Horde Groupware Webmail Edition 1.2.6', '2010/000555'),
                array('2009-12-15', 'Horde Groupware Webmail Edition 1.2.5', '2009/000539'),
                array('2009-09-14', 'Horde Groupware Webmail Edition 1.2.4', '2009/000522'),
                array('2009-09-14', 'Horde Groupware Webmail Edition 1.1.6', '2009/000511'),
                array('2009-05-01', 'Horde Groupware Webmail Edition 1.2.3', '2009/000506'),
                array('2009-01-28', 'Horde Groupware Webmail Edition 1.2.2', '2009/000489'),
                array('2009-01-28', 'Horde Groupware Webmail Edition 1.1.5', '2009/000487'),
                array('2008-12-10', 'Horde Groupware Webmail Edition 1.2.1', '2008/000472'),
                array('2008-12-10', 'Horde Groupware Webmail Edition 1.1.4', '2008/000467'),
                array('2008-09-26', 'Horde Groupware Webmail Edition 1.2', '2008/000457'),
                array('2008-09-10', 'Horde Groupware Webmail Edition 1.1.3', '2008/000433'),
                array('2008-09-10', 'Horde Groupware Webmail Edition 1.0.8', '2008/000431'),
                array('2008-08-15', 'Horde Groupware Webmail Edition 1.1.2', '2008/000427'),
                array('2008-06-13', 'Horde Groupware Webmail Edition 1.1.1', '2008/000420'),
                array('2008-06-13', 'Horde Groupware Webmail Edition 1.0.7', '2008/000418'),
                array('2008-05-25', 'Horde Groupware Webmail Edition 1.1', '2008/000413'),
                array('2008-03-08', 'Horde Groupware Webmail Edition 1.0.6', '2008/000384'),
                array('2008-02-15', 'Horde Groupware Webmail Edition 1.0.5', '2008/000381'),
                array('2008-01-09', 'Horde Groupware Webmail Edition 1.0.4', '2008/000366'),
                array('2007-10-02', 'Horde Groupware Webmail Edition 1.0.3', '2007/000346'),
                array('2007-10-01', 'Horde Groupware Webmail Edition 1.0.2', '2007/000345'),
                array('2007-03-16', 'Horde Groupware Webmail Edition 1.0.1', '2007/000325'),
                array('2007-01-14', 'Horde Groupware Webmail Edition 1.0', '2007/000309'),
            ),
            'dev' => array(
                array('2009-04-18', 'Horde Groupware Webmail Edition 1.2.3-RC1', '2009/000503'),
                array('2008-09-12', 'Horde Groupware Webmail Edition 1.2-RC1', '2008/000445'),
                array('2008-05-11', 'Horde Groupware Webmail Edition 1.1-RC4', '2008/000401'),
                array('2008-03-13', 'Horde Groupware Webmail Edition 1.1-RC3', '2008/000389'),
                array('2008-02-06', 'Horde Groupware Webmail Edition 1.1-RC2', '2008/000377'),
                array('2007-11-29', 'Horde Groupware Webmail Edition 1.1-RC1', '2007/000357'),
            ),
        )
    ),

    'whups' => array(
        'name' => 'Whups',
        'news' => array(
            '2008-09-26' => 'The first stable release, Whups H3 (1.0) has finally been released.',
            '2008-06-24' => 'After seven years of development, the first release candidate, Whups H3 (1.0-RC1) has been released.',
        ),
        'releases' => array(
            'stable' => array(
                array('2009-11-06', 'Whups H3 (1.0.1)', '2009/000525'),
                array('2008-09-26', 'Whups H3 (1.0)', '2008/000455'),
            ),
            'dev' => array(
                array('2008-09-15', 'Whups H3 (1.0-RC2)', '2008/000446'),
                array('2008-06-24', 'Whups H3 (1.0-RC1)', '2008/000421'),
            ),
        )
    ),
);
