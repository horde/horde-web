<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <?php echo $this->renderPartial('appbreadcrumb') ?>
        <?php echo $this->render('communitynav') ?>
        <div class="section">
          <div class="sectionintro">
            <p>This is a list of the major released <strong>Horde 4</strong>
            applications developed by the horde team. There is a more complete
            list of everything available from our source repository
            <a href="<?php echo $this->urlWriter->urlFor('development') ?>">
            in the development section</a> of the site.</p>

            <p>We also have an extensive list of projects that are currently
            either planned or underway in our
            wiki: <a href="http://wiki.horde.org/Projects">http://wiki.horde.org/Projects</a>. These
            projects are very open to new ideas, new blood, and anyone is
            welcome to add to the list, provided they have at least some code
            or the beginnings of a specification.</p>

            <p>Can't find your favorite application listed for Horde 4? Not all
            of our applications have been ported to Horde 4 yet. Please check
            our <a href="<?php echo $this->urlWriter->urlFor('app', array('app'
            => 'h3')) ?>">Horde 3 Apps</a> page.</p>

            <p>Are you confused about all the different application versions
            and do you want to know which versions are compatible with each
            other?  Take a look at our <a href="<?php echo
            $this->urlWriter->urlFor('development', array('action' =>
            'versions')) ?>">version list</a>.</p>

            <p>Still didn't find what you were looking for?
            <a href="<?php echo $this->urlWriter->urlFor('services'); ?>">Horde
            developers and consultants</a> are available to develop custom
            applications and modules.</p>
          </div>

          <h3>Obtaining Packages</h3>
          <p>Horde 4 and all Horde 4 applications now utilize a PEAR based
          installation method. You can install all Horde 4 applications and
          libraries by following the directions in the <a href="<?php echo
          $this->urlWriter->urlFor(array('controller' => 'app', 'app' =>
          'horde', 'action' => 'docs', 'file' => 'INSTALL'))
          ?>">documentation</a>.  You may also download the PEAR tarball from
          our <a href="http://pear.horde.org/">PEAR server</a> directly.</p>

          <h2><span>&nbsp;</span>Horde Application Framework</h2>
          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'horde')) ?>">The Horde Application Framework</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'horde') ?></h3>
          <p>The Horde Framework is the glue that all Horde applications have in
          common. It is many things, including some coding standards, common
          code, and inter-application communication. The shared code provides
          common ways of handling things like preferences, permissions, browser
          detection, user help, and more.</p>

          <h2><span>&nbsp;</span>Horde Email Platform</h2>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'webmail')) ?>">Horde Groupware Webmail Edition</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'webmail') ?></h3>
          <p>Horde Groupware Webmail Edition is a free, enterprise ready,
          browser based communication suite. Users can read, send and organize
          email messages and manage and share calendars, contacts, tasks and
          notes with the standards compliant components from the Horde
          Project. Horde Groupware Webmail Edition bundles the separately
          available applications IMP, Ingo, Kronolith, Turba, Nag and Mnemo.
          </p>

          <h3 id="imp"><a href="<?php echo $this->urlWriter->urlFor('app',
          array('app' => 'imp')) ?>">IMP</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'imp') ?></h3>
          <p>IMP provides webmail access to any IMAP or POP3 mailbox, and
          handles internet standard MIME attachments, user defined filters,
          preferences, and more. IMP was the first Horde application, and in
          some respects Horde grew out of it.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'ingo')) ?>">Ingo</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'ingo') ?></h3>
          <p>Ingo is an email filter rules manager.  It can generate Sieve,
          procmail and IMAP scripts and upload them to or execute them on the
          server (using a timsieved or VFS FTP driver, or the PHP IMAP
          extension, respectively).</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'sork')) ?>">Sork</a></h3>
          <p>Sork is a collection of four other Horde modules:
          <a href="<?php echo $this->urlWriter->urlFor('app', array('app' =>
          'forwards')) ?>">Forwards</a>,
          <a href="<?php echo $this->urlWriter->urlFor('app', array('app' =>
          'passwd')) ?>/">Passwd</a>,
          <a href="<?php echo $this->urlWriter->urlFor('app', array('app' =>
          'vacation')) ?>/">Vacation</a>.  Together they perform various
          account management functions such as changing passwords, setting up
          e-mail forwards, and setting up e-mail vacation notices (auto
          responder messages).</p>

          <h2><span>&nbsp;</span>Horde Groupware Suite</h2>
          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'webmail')) ?>">Horde Groupware Webmail Edition</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'webmail') ?></h3>
          <p>Horde Groupware Webmail Edition is a free, enterprise ready,
          browser based communication suite. Users can read, send and organize
          email messages and manage and share calendars, contacts, tasks and
          notes with the standards compliant components from the Horde
          Project. Horde Groupware Webmail Edition bundles the separately
          available applications IMP, Ingo, Kronolith, Turba, Nag and Mnemo.
          </p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'groupware')) ?>">Horde Groupware</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'groupware') ?></h3>
          <p>Horde Groupware is a free, enterprise ready, browser based
          collaboration suite. Users can manage and share calendars, contacts,
          tasks and notes with the standards compliant components from the
          Horde Project. Horde Groupware bundles the separately available
          applications Kronolith, Turba, Nag and Mnemo.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'gollem')) ?>">Gollem</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'gollem') ?></h3>
          <p>Gollem is a web-based File Manager, providing the ability to fully
          manage a hierarchical file system stored in a variety of backends
          such as a SQL database, as part of a real filesystem, or on FTP,
          Samba or SSH servers.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'kronolith')) ?>">Kronolith</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'kronolith') ?></h3>
          <p>The Kronolith calendar provides a robust web-based calendar for any
          number of users or groups, with the ability to show any number of
          calendars in a single overlaid view. Users can create any number of
          calendars and grant read, edit, or full permissions to any user,
          group, or any combination thereof.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'mnemo')) ?>">Mnemo</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'mnemo') ?></h3>
          <p>Mnemo is a note manager. It has the same sharing features as
          Kronolith and Nag, allowing workgroups to have a common notepad as
          well as private notes for individuals.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'nag')) ?>">Nag</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'nag') ?></h3>
          <p>Nag is a multiuser task list manager. Users can create any number
          of &quot;task lists&quot;, which can be shared with individual users,
          groups, or any combination. Any number of task lists can be viewed in
          a single list. Tasks have due dates, completion times, and can be
          imported and exported in multiple formats.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'turba')) ?>">Turba</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'turba') ?></h3>
          <p>Turba is the Horde address book / contact management program. It
          provides a generic frontend to searching and managing LDAP, SQL, IMSP,
          and several other contact sources.</p>

          <h2><span>&nbsp;</span>Horde Developer Tools</h2>

          <h3>Chora</h3>
          <p><a href="<?php echo $this->urlWriter->urlFor('app', array('app' =>
          'chora')) ?>">Chora</a>, the Horde repository viewer is still being
          developed for a Horde 4 release. Can't wait? Chora is available for
          Horde 3, or you can use the bleeding edge development code.</p>

 <!--     <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'chora')) ?>">Chora</a></h3>
          <p>Chora is the Horde repository viewer, and it provides an advanced web-based
          view of any CVS, RCS, or Subversion repository. It includes annotation
          support, visual branch viewing capability, and human-readable diffs. It powers
          <a href="http://cvs.horde.org/">http://cvs.horde.org/</a> and hundreds of
          other web cvs interface sites.</p>
-->

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'whups')) ?>">Whups</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'whups') ?></h3>
          <p>The <b>W</b>eb <b>H</b>orde <b>U</b>ser <b>P</b>roblem
          <b>S</b>olver, besides being a contrived acronym, is a ticket-tracking
          system integrated with the rest of Horde. It
          runs <a href="http://bugs.horde.org/">http://bugs.horde.org/</a>.</p>

          <h2><span>&nbsp;</span>Horde Business Tools</h2>

          <h3>Hermes</h3>
          <p>The Horde Team is hard at work preparing
          <a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'hermes')) ?>">
          Hermes</a>, the Horde time-tracking application, for a Horde 4
          release. New features and a new dynamic view are in the works. Can't
          wait? Try our bleeding edge development code, or use Hermes for Horde
          3.</p>

<!--          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'hermes')) ?>">Hermes</a></h3>
          <p>Hermes is a Horde time-tracking application. It ties into address books (to
          retrieve clients) and task lists, bug trackers etc. (to retrieve cost
          objects). It comes with a stop watch, search and reporting capabilities, a
          MacOSX Dashboard widget and an invoice interface.</p>
-->
          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'sesha')) ?>">Sesha</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'sesha') ?></h3>
          <p>Sesha is the Horde Inventory Manager. It is an application
          designed to track a multitude of items. It can organize stockable
          items into multiple categories, each with unique properties.</p>

          <h2><span>&nbsp;</span>Horde Web Content/Media Management Tools</h2>
          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'ansel')) ?>">Ansel</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'ansel') ?></h3>
          <p>Ansel is a full featured photo management application integrated
          with the rest of Horde. Features include multiple gallery styles,
          geotagging, face detection, full user control over gallery
          permissions, multiple image upload options and integration points
          with a number of other Horde applications.</p>

<!--          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'klutz')) ?>">Klutz</a></h3>
          <p>Klutz is a comic strip aggregator and viewer. It lets you browse comic strips
          by date or by strip. Features include automatic updating of comics, and various
          methods for obtaining the strips.</p>
 -->

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app'
          => 'wicked')) ?>">Wicked</a> <?php echo
          HordeWeb_Utils::downloadIcon($this, 'wicked') ?></h3>
          <p>Wicked is a Wiki for the Horde framework supporting several wiki
          markup dialects. Wicked is also powering the
          official <a href="http://wiki.horde.org">Horde Wiki</a>.</p>
        </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('toc'); ?>
      <?php echo $this->render('releasedAppsList');?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
