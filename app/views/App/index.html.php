<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <?php echo $this->renderPartial('appbreadcrumb') ?>
        <?php echo $this->render('communitynav') ?>
        <div class="applications">
          <div class="sectionintro">
            <p>This is a list of the major released applications developed by
            the horde team. There is a more complete list of everything available
            from our source repository
            <a href="<?php echo $this->urlWriter->urlFor('development') ?>">
            in the development section</a> of the site.</p>

            <p>We also have an extensive list of projects that are currently either planned
            or underway in our wiki: <a
            href="http://wiki.horde.org/Projects">http://wiki.horde.org/Projects</a>. These
            projects are very open to new ideas, new blood, and anyone is welcome to add to
            the list, provided they have at least some code or the beginnings of a
            specification</p>

            <p>Still didn't find what you were looking for?
            <a href="<?php echo $this->urlWriter->urlFor('services'); ?>">Horde
            developers and consultants</a> are available to develop custom
            applications and modules.</p>

          </div>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'horde')) ?>">The Horde Application Framework</a> <small>[<a href="http://cvs.horde.org/horde/">CVS</a>]</small></h3>
            <p>The Horde Framework is the glue that all Horde applications have in
            common. It is many things, including some coding standards, common
            code, and inter-application communication. The shared code provides
            common ways of handling things like preferences, permissions, browser
            detection, user help, and more.</p>

            <h2><span></span>Horde Email Platform</h2>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'webmail')) ?>">Horde Groupware Webmail Edition</a></h3>

            <p>Horde Groupware Webmail Edition is a free, enterprise ready, browser based
            communication suite. Users can read, send and organize email messages and
            manage and share calendars, contacts, tasks and notes with the standards
            compliant components from the Horde Project. Horde Groupware Webmail Edition
            bundles the separately available applications IMP, Ingo, Kronolith, Turba, Nag
            and Mnemo.
            </p>

            <h3 id="imp"><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'imp')) ?>">IMP</a> <small>[<a href="http://cvs.horde.org/imp/">CVS</a>]</small></h3>
            <p>IMP provides webmail access to any IMAP or POP3
            mailbox, and handles internet standard MIME attachments, user defined
            filters, preferences, and more. IMP was the first Horde application, and in
            some respects Horde grew out of it.</p>

            <blockquote>
            <h4>Other IMP-related Projects</h4>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'dimp')) ?>">DIMP</a> <small>[<a href="http://cvs.horde.org/dimp/">CVS</a>]</small></h3>
            <p>DIMP is a alternate presentation view of <a href="#imp">IMP</a> using
            AJAX-ish technologies to create a more dynamic user experience (DIMP stands for Dynamic IMP).</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'mimp')) ?>">MIMP</a> <small>[<a href="http://cvs.horde.org/mimp/">CVS</a>]</small></h3>
            <p>MIMP is a stripped down version of <a href="#imp">IMP</a> for use on mobile
            phones, PDAs, and anything with a small screen or limited HTML support.</p>
            </blockquote>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'ingo')) ?>">Ingo</a> <small>[<a href="http://cvs.horde.org/ingo/">CVS</a>]</small></h3>
            <p>Ingo is an email filter rules manager.  It can generate Sieve, procmail and
            IMAP scripts and upload them to or execute them on the server (using a
            timsieved or VFS FTP driver, or the PHP IMAP extension, respectively).</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'sork')) ?>">Sork</a></h3>
            <p>Sork is a collection of four other Horde modules:
            <a href="accounts/">accounts</a>
            [<a href="http://cvs.horde.org/accounts/">CVS</a>],
            <a href="forwards/">forwards</a>
            [<a href="http://cvs.horde.org/forwards/">CVS</a>],
            <a href="passwd/">passwd</a>
            [<a href="http://cvs.horde.org/passwd/">CVS</a>], and
            <a href="vacation/">vacation</a>
            [<a href="http://cvs.horde.org/vacation/">CVS</a>].
            Together they perform
            various account management functions such as changing passwords, setting up
            e-mail forwards, and setting up e-mail vacation notices (auto responder
            messages).</p>

            <h2><span></span>Horde Groupware Suite</h2>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'groupware')) ?>">Horde Groupware</a></h3>

            <p>Horde Groupware is a free, enterprise ready, browser based collaboration
            suite. Users can manage and share calendars, contacts, tasks and notes with
            the standards compliant components from the Horde Project. Horde Groupware
            bundles the separately available applications Kronolith, Turba, Nag and
            Mnemo.</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'webmail')) ?>">Horde Groupware Webmail Edition</a></h3>

            <p>Horde Groupware Webmail Edition is a free, enterprise ready, browser based
            communication suite. Users can read, send and organize email messages and
            manage and share calendars, contacts, tasks and notes with the standards
            compliant components from the Horde Project. Horde Groupware Webmail Edition
            bundles the separately available applications IMP, Ingo, Kronolith, Turba, Nag
            and Mnemo.
            </p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'gollem')) ?>">Gollem</a> <small>[<a href="http://cvs.horde.org/gollem/">CVS</a>]</small></h3>
            <p>Gollem is a web-based File Manager, providing the ability to
            fully manage a hierarchical file system stored in a variety of backends such as
            a SQL database, as part of a real filesystem, or on an FTP server.</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'kronolith')) ?>">Kronolith</a> <small>[<a href="http://cvs.horde.org/kronolith/">CVS</a>]</small></h3>
            <p>The Kronolith calendar provides a robust web-based calendar for any
            number of users or groups, with the ability to show any number of
            calendars in a single overlaid view. Users can create any number of
            calendars and grant read, edit, or full permissions to any user,
            group, or any combination thereof.</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'mnemo')) ?>">Mnemo</a> <small>[<a href="http://cvs.horde.org/mnemo/">CVS</a>]</small></h3>
            <p>Mnemo is a note manager. It has the same sharing features as
            Kronolith and Nag, allowing workgroups to have a common notepad as
            well as private notes for individuals.</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'nag')) ?>">Nag</a> <small>[<a href="http://cvs.horde.org/nag/">CVS</a>]</small></h3>
            <p>Nag is a multiuser task list manager. Users can create any number
            of &quot;task lists&quot;, which can be shared with individual users,
            groups, or any combination. Any number of task lists can be viewed in
            a single list. Tasks have due dates, completion times, and can be
            imported and exported in multiple formats.</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'trean')) ?>">Trean</a> <small>[<a href="http://cvs.horde.org/trean/">CVS</a>]</small></h3>
            <p>Trean is a bookmarks manager for Horde, allowing you to store your
            bookmarks in one place and access them from any browser. Bookmarks can
            be grouped into categories which can be shared with arbitrary
            users.</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'turba')) ?>">Turba</a> <small>[<a href="http://cvs.horde.org/turba/">CVS</a>]</small></h3>
            <p>Turba is the Horde address book / contact management program. It
            provides a generic frontend to searching and managing LDAP, SQL, IMSP,
            and several other contact sources.</p>

            <h2><span></span>Horde Developer Tools</h2>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'chora')) ?>">Chora</a> <small>[<a href="http://cvs.horde.org/chora/">CVS</a>]</small></h3>
            <p>Chora is the Horde repository viewer, and it provides an advanced web-based
            view of any CVS, RCS, or Subversion repository. It includes annotation
            support, visual branch viewing capability, and human-readable diffs. It powers
            <a href="http://cvs.horde.org/">http://cvs.horde.org/</a> and hundreds of
            other web cvs interface sites.</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'whups')) ?>">Whups</a> <small>[<a href="http://cvs.horde.org/whups/">CVS</a>]</small></h3>
            <p>The <b>W</b>eb <b>H</b>orde <b>U</b>ser <b>P</b>roblem
            <b>S</b>olver, besides being a contrived acronym, is a ticket-tracking
            system integrated with the rest of Horde. It
            runs <a href="http://bugs.horde.org/">http://bugs.horde.org/</a>.</p>

            <h2><span></span>Horde Business Tools</h2>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'hermes')) ?>">Hermes</a> <small>[<a href="http://cvs.horde.org/hermes/">CVS</a>]</small></h3>
            <p>Hermes is a Horde time-tracking application. It ties into address books (to
            retrieve clients) and task lists, bug trackers etc. (to retrieve cost
            objects). It comes with a stop watch, search and reporting capabilities, a
            MacOSX Dashboard widget and an invoice interface.</p>

            <h2><span></span>Horde Web Content/Media Management Tools</h2>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'ansel')) ?>">Ansel</a> <small>[<a href="http://cvs.horde.org/ansel/">CVS</a>]</small></h3>
            <p>Ansel is a full featured photo management application integrated with the
            rest of Horde. Features include multiple gallery styles, geotagging, face
            detection, full user control over gallery permissions, multiple image upload
            options and integration points  with a  number of other Horde applications.</p>

            <h3><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'klutz')) ?>">Klutz</a> <small>[<a href="http://cvs.horde.org/klutz/">CVS</a>]</small></h3>
            <p>Klutz is a comic strip aggregator and viewer. It lets you browse comic strips
            by date or by strip. Features include automatic updating of comics, and various
            methods for obtaining the strips.</p>


        </div>
	</div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>