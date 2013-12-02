<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Modules' => 'modules'))?></h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">
        <div class="sectionintro">
          <p>The following modules are in the Horde <?php echo
          $this->linkTo('Git', array('controller' => 'development', 'action' =>
          'git')) ?> Repository, with the listed production level available. If
          no version is listed, then there has not yet been a stable release of
          that module.</p>
        </div>

        <table id="ModulesTable" class="striped" cellspacing="0">
        <thead>
         <tr>
          <th>Module</th>
          <th>Release</th>
          <th>Description</th>
          <th><a href="#status">Status</a></th>
         </tr>
        </thead>
        <tbody>
        <tr>
         <?php echo $this->controller->git_and_ver('horde') ?>
         <td>The core Horde application</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('framework') ?>
         <td>Horde Framework libraries</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr>
         <?php echo $this->controller->git_and_ver('agora') ?>
         <td>Forum module</td>
         <td>Beta</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('ansel') ?>
         <td>Photo Gallery application</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('beatnik') ?>
         <td>DNS record management user interface</td>
         <td>Development</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('chora') ?>
         <td>VCS (version control system) repository front-end</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('gollem') ?>
         <td>Web-based File Manager</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
          <?php echo $this->controller->git_and_ver('hermes') ?>
          <td>Time-tracking/billing data system</td>
          <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('imp') ?>
         <td>The IMP Webmail Client</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('ingo') ?>
         <td>Mail filtering administration</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('jonah') ?>
         <td>RSS/News module</td>
         <td>Beta</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('klutz') ?>
         <td>Comics module</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('kronolith') ?>
         <td>Calendar and scheduling</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('luxor') ?>
         <td>LXR Port</td>
         <td>Beta</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('mnemo') ?>
         <td>A Memo/Notepad application</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('nag') ?>
         <td>Task Manager</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('passwd') ?>
         <td>Password changing module</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('sam') ?>
         <td>A Spam Assassin module</td>
         <td>Beta</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('sesha') ?>
         <td>Inventory manager</td>
         <td>Beta</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('skeleton') ?>
         <td>A template for new Horde applications</td>
         <td>&nbsp;</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('trean') ?>
         <td>Bookmarks manager</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('turba') ?>
         <td>Contacts/Addressbook system</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('ulaform') ?>
         <td>A form generation/processing tool</td>
         <td>Beta</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('vilma') ?>
         <td>Virtual email domain administrator</td>
         <td>Development</td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('whups') ?>
         <td>A project management system</td>
         <td><strong>Production</strong></td>
        </tr>
        <tr>
         <?php echo $this->controller->git_and_ver('wicked') ?>
         <td>A Wiki</td>
         <td><strong>Production</strong></td>
        </tr>
        </tbody>
        </table>

        <h3 id="status">A note on stability</h3>

        <p>The <a href="#t_develop">develop</a> branch of a module will almost
        always be development code, and may be unstable. The stability listed
        for each module is the general state of that module. However, just
        because that IMP and Horde are listed as Production quality software,
        doesn't mean that &quot;develop&quot; will always work, be documented,
        compile, or not cause frogs to dive-bomb you from tall trees. You've
        been warned. ;)</p>

        <h3 id="branches">A note on branches</h3>

        <p>The tags generally take one of these formats:</p>

        <ol>
         <li><strong>master</strong> -- This is always the current stable
         branch that contains bug fixes for the next release</li>
         <li id="t_develop"><strong>develop</strong> -- This is always the
         current development branch, and may be unstable and undocumented.</li>
         <li>FRAMEWORK_* -- These branches are created for major stable
         releases that have gone into security fix mode.  Modules within a
         FRAMEWORK_* branch are compatible with each other.</li>
        </ol>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>
