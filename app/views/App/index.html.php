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

            <p>We also have an extensive list of projects that are currently either planned
            or underway in our wiki: <a
            href="http://wiki.horde.org/Projects">http://wiki.horde.org/Projects</a>. These
            projects are very open to new ideas, new blood, and anyone is welcome to add to
            the list, provided they have at least some code or the beginnings of a
            specification.</p>

            <p>Can't find your favorite application listed for Horde 4? Not all
            of our applications have been ported to Horde 4 yet. Please check
            our <a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'h3'))?>">Horde 3 Apps</a> page.</p>
            <p>Still didn't find what you were looking for?
            <a href="<?php echo $this->urlWriter->urlFor('services'); ?>">Horde
            developers and consultants</a> are available to develop custom
            applications and modules.</p>
          </div>

          <h3>Obtaining Packages</h3>
          <p>Horde 4 and all Horde 4 applications now utilize a PEAR based
          installation method. You can install all Horde 4 applications and
          libraries by following the directions in the <a href="<?php echo
          $this->urlWriter->urlFor(array('controller' => 'app', 'app' => 'horde',
          'action' => 'docs', 'file' => 'INSTALL')) ?>">documentation</a>.  You may
          also download the PEAR tarball from
          our <a href="http://pear.horde.org/">PEAR server</a> directly.</p>

          <h2><span>&nbsp;</span>Horde Application Framework</h2>
          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'horde')) ?>">
          The Horde Application Framework</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'horde')) ?>)
          </span></h3>
          <p>The Horde Framework is the glue that all Horde applications have in
          common. It is many things, including some coding standards, common
          code, and inter-application communication. The shared code provides
          common ways of handling things like preferences, permissions, browser
          detection, user help, and more.</p>

          <h2><span>&nbsp;</span>Horde Email Platform</h2>

          <h3><a
          href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'webmail')) ?>">
          Horde Groupware Webmail Edition</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'webmail')) ?>)
          </span></h3>
          <p>Horde Groupware Webmail Edition is a free, enterprise ready, browser based
          communication suite. Users can read, send and organize email messages and
          manage and share calendars, contacts, tasks and notes with the standards
          compliant components from the Horde Project. Horde Groupware Webmail Edition
          bundles the separately available applications IMP, Ingo, Kronolith, Turba, Nag
          and Mnemo.
          </p>

          <h3 id="imp"><a
          href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'imp')) ?>">
          IMP</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'imp')) ?>)
          </span></h3>
          <p>IMP provides webmail access to any IMAP or POP3
          mailbox, and handles internet standard MIME attachments, user defined
          filters, preferences, and more. IMP was the first Horde application, and in
          some respects Horde grew out of it.</p>

          <h3><a
          href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'ingo')) ?>">
          Ingo</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'ingo')) ?>)
          </span></h3>
          <p>Ingo is an email filter rules manager.  It can generate Sieve, procmail and
          IMAP scripts and upload them to or execute them on the server (using a
          timsieved or VFS FTP driver, or the PHP IMAP extension, respectively).</p>

<!--      <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'sork')) ?>">Sork</a></h3>
          <p>Sork is a collection of four other Horde modules:
          <a href="forwards/">forwards</a>,
          <a href="passwd/">passwd</a>,
          <a href="vacation/">vacation</a>.
          Together they perform
          various account management functions such as changing passwords, setting up
          e-mail forwards, and setting up e-mail vacation notices (auto responder
          messages).</p>
 -->
          <h2><span>&nbsp;</span>Horde Groupware Suite</h2>
          <h3><a
          href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'webmail')) ?>">
          Horde Groupware Webmail Edition</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'webmail')) ?>)
          </span></h3>
          <p>Horde Groupware Webmail Edition is a free, enterprise ready, browser based
          communication suite. Users can read, send and organize email messages and
          manage and share calendars, contacts, tasks and notes with the standards
          compliant components from the Horde Project. Horde Groupware Webmail Edition
          bundles the separately available applications IMP, Ingo, Kronolith, Turba, Nag
          and Mnemo.
          </p>

          <h3>Horde Groupware</h3>
          <p>Looking for the Horde Groupware bundle? This meta-package is
          still being put together for Horde 4. Can't wait? Consider
          installing the Horde Groupware Webmail Edition, or install the
          separate applications individually.</p>

          <h3>Gollem</h3>
          <p>The Horde Team is still working hard at getting Gollem ready for
          a Horde 4 release. Can't wait? Gollem is available for
          <a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'gollem')) ?>">Horde 3</a>.</p>

<!--      <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'gollem')) ?>">Gollem</a></h3>
          <p>Gollem is a web-based File Manager, providing the ability to
          fully manage a hierarchical file system stored in a variety of backends such as
          a SQL database, as part of a real filesystem, or on an FTP server.</p>
-->
          <h3><a
          href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'kronolith')) ?>">
          Kronolith</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'kronolith')) ?>)
          </span></h3>
          <p>The Kronolith calendar provides a robust web-based calendar for any
          number of users or groups, with the ability to show any number of
          calendars in a single overlaid view. Users can create any number of
          calendars and grant read, edit, or full permissions to any user,
          group, or any combination thereof.</p>

          <h3><a
          href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'mnemo')) ?>">
          Mnemo</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'mnemo')) ?>)
          </span></h3>
          <p>Mnemo is a note manager. It has the same sharing features as
          Kronolith and Nag, allowing workgroups to have a common notepad as
          well as private notes for individuals.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'nag')) ?>">
          Nag</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'nag')) ?>)
          </span></h3>
          <p>Nag is a multiuser task list manager. Users can create any number
          of &quot;task lists&quot;, which can be shared with individual users,
          groups, or any combination. Any number of task lists can be viewed in
          a single list. Tasks have due dates, completion times, and can be
          imported and exported in multiple formats.</p>

          <h3><a
          href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'turba')) ?>">
          Turba</a><span class="downloadlink">
          (<?php echo $this->linkTo('download page', array('controller' => 'download', 'action' => 'app', 'app' => 'turba')) ?>)
          </span></h3>
          <p>Turba is the Horde address book / contact management program. It
          provides a generic frontend to searching and managing LDAP, SQL, IMSP,
          and several other contact sources.</p>

          <h2><span>&nbsp;</span>Horde Developer Tools</h2>

          <h3>Chora</h3>
          <p><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'chora')) ?>">
          Chora</a>, the Horde repository viewer is still being developed for
          a Horde 4 release. Can't wait? Chora is available for Horde 3, or
          you can use the bleeding edge development code.</p>

          <h3>Whups</h3>
          <p><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'whups')) ?>">
          Whups</a>, the Horde ticket tracking system, is still under
          development for Horde 4. You can see the current code in action
          on Horde's bug tracker. Can't wait to run it yourself? Consider
          using the bleeding edge development code from our Git repository, or
          use Horde 3.</p>

 <!--     <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'chora')) ?>">Chora</a></h3>
          <p>Chora is the Horde repository viewer, and it provides an advanced web-based
          view of any CVS, RCS, or Subversion repository. It includes annotation
          support, visual branch viewing capability, and human-readable diffs. It powers
          <a href="http://cvs.horde.org/">http://cvs.horde.org/</a> and hundreds of
          other web cvs interface sites.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'whups')) ?>">Whups</a></h3>
          <p>The <b>W</b>eb <b>H</b>orde <b>U</b>ser <b>P</b>roblem
          <b>S</b>olver, besides being a contrived acronym, is a ticket-tracking
          system integrated with the rest of Horde. It
          runs <a href="http://bugs.horde.org/">http://bugs.horde.org/</a>.</p>
-->
          <h2><span>&nbsp;</span>Horde Business Tools</h2>

          <h3>Hermes</h3>
          <p>The Horde Team is hard at work preparing
          <a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'hermes')) ?>">
          Hermes</a>, the Horde time-tracking application, for a Horde 4
          release. New features and a new dynamic view are in the works. Can't
          wait? Try our bleeding edge development code, or use Hermes for
          Horde 3.</p>

<!--          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'hermes')) ?>">Hermes</a></h3>
          <p>Hermes is a Horde time-tracking application. It ties into address books (to
          retrieve clients) and task lists, bug trackers etc. (to retrieve cost
          objects). It comes with a stop watch, search and reporting capabilities, a
          MacOSX Dashboard widget and an invoice interface.</p>
-->
          <h2><span>&nbsp;</span>Horde Web Content/Media Management Tools</h2>
          <h3>Ansel</h3>
          <p><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'ansel')) ?>">
          Ansel</a>, the Horde photo management application is getting the
          finishing touches applied to it for a Horde 4 release. Want to try
          it out? Consider using the latest development code from our Git
          repository, or use Ansel for Horde 3.</p>
<!--          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'ansel')) ?>">Ansel</a></h3>
          <p>Ansel is a full featured photo management application integrated with the
          rest of Horde. Features include multiple gallery styles, geotagging, face
          detection, full user control over gallery permissions, multiple image upload
          options and integration points  with a  number of other Horde applications.</p>

          <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'klutz')) ?>">Klutz</a></h3>
          <p>Klutz is a comic strip aggregator and viewer. It lets you browse comic strips
          by date or by strip. Features include automatic updating of comics, and various
          methods for obtaining the strips.</p>
 -->
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
