<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Documentation' => 'documentation'))?></h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">
        <div class="sectionintro">
          <p>The following modules are in
          the <a href="http://cvs.horde.org/">Horde CVS Repository</a>, with
          the listed production level code tags available. If no tags are
          listed, then there has not yet been a stable release of that
          module.</p>
        </div>

        <p><b>For the most current code you MUST use the <?php echo
        $this->linkTo('Git', array('controller' => 'development', 'action' =>
        'git'))?> repositories. CVS HEAD is no longer maintained and will NOT
        work. This page still has to be updated to reflect the current state of
        modules in Git</b></a>

        <script type="text/javascript" src="<?php echo $base_url
        ?>/js/stripe.js"></script>
        <table id="ModulesTable" class="striped" cellspacing="0">
        <thead>
         <tr>
          <th>Module</th>
          <th>Release</th>
          <th>Description</th>
          <th><a href="#tags">Tags</a></th>
          <th><a href="#status">Status</a></th>
         </tr>
        </thead>
        <tbody>
        <tr><?php echo $this->controller->cvs_and_ver('horde') ?> <td>The core
        Horde libraries and framework</td><td>FRAMEWORK_3, RELENG_2,
        STABLE_1_2</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('framework') ?> <td>Horde
        Framework
        libraries</td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('agora') ?> <td>Forum
        module</td><td>FRAMEWORK_3</td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('ansel') ?> <td>Photo
        Gallery
        application</td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('beatnik') ?> <td>DNS
        record management user interface</td><td></td><td>Development</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('chora') ?> <td>VCS
        (version control system) repository front-end</td><td>FRAMEWORK_3,
        RELENG_1</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('dimp') ?> <td>Dynamic
        IMP<br /><strong>DIMP has been merged into IMP in
        git.</strong></td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('forwards') ?> <td>E-Mail
        forwarding module</td><td>FRAMEWORK_3, RELENG_1,
        RELENG_2</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('genie') ?> <td>Wishlist
        application</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('gollem')
        ?> <td>Web-based File
        Manager</td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('goops') ?> <td>Meta
        search engine</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('hermes')
        ?> <td>Time-tracking/billing data
        system</td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('hordedoc') ?> <td>Horde
        documentation project</td><td></td><td></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('hordeweb') ?> <td>The
        horde.org website</td><td></td><td></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('imp') ?> <td>The IMP
        Webmail Client</td><td>FRAMEWORK_3, RELENG_3,
        STABLE_2_2</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('incubator')
        ?> <td>Projects that are in development -
        &quot;incubating&quot;</td><td></td><td>Alpha, Beta,
        Experimental</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('ingo') ?> <td>Mail
        filtering administration</td><td>FRAMEWORK_3,
        RELENG_1</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('jeta') ?> <td>Wrapper
        around the Java Telnet
        App</td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('jonah') ?> <td>RSS/News
        module</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('juno') ?> <td>Checkbook
        tracking module</td><td></td><td>Alpha</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('klutz') ?> <td>Comics
        module</td><td>FRAMEWORK_3,
        RELENG_1</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('kronolith')
        ?> <td>Calendar and scheduling</td><td>FRAMEWORK_3,
        RELENG_1</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('luxor') ?> <td>LXR
        Port</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('merk') ?> <td>Online
        shopping system</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('midas') ?> <td>Ad/banner
        serving and management</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('mimp') ?> <td>A mobile
        (no graphics/javascript) version of IMP<br /><strong>MIMP has been
        merged into IMP in
        git.</strong></td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('mnemo') ?> <td>A
        Memo/Notepad application</td><td>FRAMEWORK_3,
        RELENG_1</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('mottle') ?> <td>MOTD
        tool</td><td></td><td>Alpha</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('nag') ?> <td>Task
        Manager</td><td>FRAMEWORK_3,
        RELENG_1</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('nic') ?> <td>Basic
        network service monitoring</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('passwd') ?> <td>Password
        changing module</td><td>FRAMEWORK_3, RELENG_1,
        RELENG_2</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('presentations')
        ?> <td>Horde-related presentations</td><td></td><td></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('sam') ?> <td>A Spam
        Assassin module</td><td>FRAMEWORK_3</td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('scry') ?> <td>Polls
        application</td><td>FRAMEWORK_3</td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('sesha') ?> <td>Inventory
        manager</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('skeleton') ?> <td>A
        template for new Horde
        applications</td><td>FRAMEWORK_3</td><td></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('sork') ?> <td>Alias for
        accounts, forwards, passwd, and vacation</td><td></td><td></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('swoosh') ?> <td>SMS
        messenger</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('trean') ?> <td>Bookmarks
        manager</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('turba')
        ?> <td>Contacts/Addressbook system</td><td>FRAMEWORK_3,
        RELENG_1</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('ulaform') ?> <td>A form
        generation/processing tool</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('vacation') ?> <td>E-Mail
        vacation notice module</td><td>FRAMEWORK_3, RELENG_1,
        RELENG_2</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('vilma') ?> <td>Virtual
        email domain administrator</td><td></td><td>Alpha</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('volos') ?> <td>Guestbook
        application</td><td></td><td>Beta</td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('whups') ?> <td>A project
        management
        system</td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        <tr><?php echo $this->controller->cvs_and_ver('wicked') ?> <td>A
        Wiki</td><td>FRAMEWORK_3</td><td><strong>Production</strong></td></tr>
        </tbody>
        </table>

        <p>When checking out applications, you should probably check out
        <code>horde</code> first, then <code>cd&nbsp;horde</code>, and then
        check out any additional modules that you want. <code>hordeweb</code>,
        <code>hordedoc</code>, and <code>presentations</code> are the
        exceptions to this; the documentation and presentations can live
        wherever you like, and the website should probably live elsewhere in
        your web tree.</p>

        <h3 id="status">A note on
        stability</h3><p>The <a href="#t_HEAD">HEAD</a> branch of a module will
        almost always be development code, and may be unstable. The stability
        listed for each module is the general state of that module. However,
        just because that IMP and Horde are listed as Production quality
        software, doesn't mean that HEAD will always work, be documented,
        compile, or not cause frogs to dive-bomb you from tall trees. You've
        been warned. ;)</p>

        <h3 id="tags">A note on tags</h3>
        <p>
        The tags generally take one of three formats:
        </p>
        <ol>
        <li id="t_HEAD"><strong>HEAD</strong> -- This is always the current
        development branch, and may be unstable and undocumented.  Any code
        that has not yet been released will have only a HEAD branch.  All other
        branches will be branches off the HEAD branch.<strong>CVS HEAD is no
        longer maintained.</strong></li>
        <li>FRAMEWORK_* -- These branches are created for major stable
        releases.  Modules with a FRAMEWORK_* tag are compatible with each
        other. For example, IMP FRAMEWORK_3 is compatible with Horde
        FRAMEWORK_3.</li>
        <li>RELENG_* -- These are the <i>RELease ENGineering</i> branches.
        These branches are the code for the next releases.  Each RELENG branch
        is identified by a number which indicates the version of the software.
        So RELENG_1 corresponds to the 1.x releases, RELENG_2 to the 2.x
        releases, RELENG_3 to the 3.x releases, and so on. <strong>These tags
        are obsolete. Use the FRAMEWORK_* tags instead.</strong></li>
        </ol>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>
