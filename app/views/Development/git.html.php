<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Git' => 'git'))?></h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">
        <div class="sectionintro">
          <p>All development work is done against
          our <a href="https://github.com/horde/">Git repositories on
          GitHub</a>.</p>

          <p>You can use the Horde Git repositories as an anonymous user or as
          a developer.</p>

          <p>You can checkout, fork, or install each Git module individually
          and independently from each other, using standard Git commands and
          tools. If you want to work with the whole Horde Framework or several
          Horde applications, it is suggested that you use
          the <a href="https://github.com/horde/git-tools">Horde Git
          Tools</a> though. The instructions below focus on these tools.</p>

          <p>You will need a Git client, if you don't already have one.
          Information on Git can be found
          at <a href="https://web-horde.org/w/git-scm.com/">http://git-scm.com/</a>.</p>

          <p>These command lines should be the bare-bones needed to get you
          started with Horde and Git; this is not a Git tutorial, however. The
          standard Git documentation is
          available <a href="https://web-horde.org/w/kernel.org/pub/software/scm/git/docs/">here</a>.
          Additional tips and useful links can be found
          at <a href="https://web-horde.org/w/gitready.com/">git ready</a> and
          <a href="https://web-horde.org/w/andyjeffries.co.uk/articles/25-tips-for-intermediate-git-users">
          25 Tips for Intermediate Git Users</a>.</p>
        </div>

        <h2><span>&nbsp;</span>Horde Git Tools</h2>

        <h3>Getting The Source Code</h3>

        <p>Use <a href="https://github.com/horde/git-tools/blob/master/README.md">these
        instructions</a> to install the Horde Git Tools. Make sure to configure
        the tools correctly for your needs, and read the documentation in the
        configuration file.</p>

        <p>To clone the repositories, use the following command:</p>

        <pre class="brush:bash">horde-git-tools git clone</pre>

        <p>To update the repositories, use this command:</p>

        <pre class="brush:bash">horde-git-tools git pull</pre>

        <h3>Making Development Repos Web-Accessible</h3>

        <p>To create a web-accessible development installation, use the
        following command:</p>

        <pre class="brush:bash">horde-git-tools dev install</pre>

        <p>Running that script will symlink the base horde package into the
        web-accessible directory you specified
        in <tt>git-tools/config/conf.php</tt>, symlink all other Horde
        applications within that directory, and will properly set up the
        necessary include/horde path definitions. Note that all edits should
        take place within the repository, as the web-accessible directory will
        be deleted every time the <tt>dev install</tt> script is run.</p>

        <p>Full directory paths will be needed in
        <tt>horde-git/horde/config/registry.php</tt> due to the symlinks. The
        easiest way to setup full paths is to set the <tt>$app_fileroot</tt>
        parameter in this file.</p>

        <p>Note that unlike a PEAR or Composer install,
        the <tt>Autoloader_Cache</tt> package will be enabled by default. If
        you attempt to use Horde or load the test.php page before all
        dependencies are installed, you will have to purge the autoloader
        cache.</p>

        <p>You can now follow the procedures in the normal <?php echo
        $this->linkTo('INSTALL', array('controller' => 'app', 'action' =>
        'docs/INSTALL', 'app' => 'horde'))?> document to complete the
        configuration and database creation.</p>

        <p>If, after you have configured Horde, you wish you can manually run
        the database migrations, you can run these from the checkout directory
        as so:</p>

        <pre class="brush:bash">./horde/bin/horde-db-migrate [application_name [up|down]]</pre>

        <p>If installing the framework libraries directly via PEAR, i.e. not
        with with the Horde Git Tools, you will need to define your horde
        application directory (i.e. the filesystem directory where the Horde
        application is installed and accessible to a browser) in your PEAR
        config.  This can be done with the horde/Role package previously
        installed on your system via:</p>

        <pre class="brush:bash">
        pear run-scripts horde/Horde_Role
        </pre>

        <h3 id="patch">Creating Patches</h3>

        <p>Please use
        the <a href="https://web-horde.org/w/help.github.com/articles/about-pull-requests/">Pull
        Request</a> feature on GitHub to submit patches.</p>

        <h2><span>&nbsp;</span>Developer Git</h2>

        <p>Write access to the Git repositories as a Horde developer is only
        available over SSH. You will want to create an SSH key, and you will
        also need to create an account on GitHub. The following needs to be
        done:</p>

        <ol>
            <li>Create a GitHub account.</li>
            <li><a href="https://web-horde.org/w/help.github.com/articles/connecting-to-github-with-ssh/">Setup
            your SSH public key</a>.</li>
            <li>Join the Horde organization on GitHub (send e-mail to
            <a href="mailto:core@horde.org">core@horde.org</a>).</li>
        </ol>

        <h3>Getting The Source Code</h3>

        <p>Follow the instruction above to install the Horde Git Tools, but
        create the configuration file from <tt>config/conf.php.dev.dist</tt>
        instead of <tt>config/conf.php.dist</tt>. Then continue with making
        the repositories web-accessible as described above.</p>

        <h3>Updating repositories</h3>

        <p>To update your local repositories, <span style="color:red">you MUST
        rebase the changes on top of your local repo copy</span> if using Git
        manually, i.e. without using the Horde Git
        Tools. <span style="color:red">Failure to do so will result in useless,
        annoying commit merge messages both added to the master repository and
        sent in the commit e-mails.</span></p>

        <p>To update/rebase the changes, you can use the following command that
        already rebases automatically, and adds a helpful Git <tt>get</tt>
        alias to update your local repositories while seeing changed files and
        avoiding conflicts.:</p>

        <pre class="brush:bash">horde-git-tools git pull</pre>

        <p>For more information on rebasing, and the commands needed if
        conflicts are detected during the rebase/merge, see:
        <a href="https://web-horde.org/w/kernel.org/pub/software/scm/git/docs/user-manual.html#using-git-rebase">http://www.kernel.org/pub/software/scm/git/docs/user-manual.html#using-git-rebase</a>
        and <a href="https://web-horde.org/w/jbowes.dangerouslyinc.com/2007/01/26/git-rebase-keeping-your-branches-current/">http://jbowes.dangerouslyinc.com/2007/01/26/git-rebase-keeping-your-branches-current/</a>.</p>

        <h3 id="createcommit">Creating commits</h3>

        <p>First, you should make sure your contact information is correct. The
        easiest way to do so is to issue the following commands:</p>

        <pre class="brush:bash">
        git config user.name "FirstName LastName"
        git config user.email "user@example.com"
        </pre>

        <p>Go ahead and hack away. When finished, commit the files to your
        local repo. There are several ways to do this. To add specific files to
        a commit, use the following commands:</p>

        <pre class="brush:bash">
        git add filename [filename2] [filename3...]
        git commit
        </pre>

        <p><tt><a href="https://web-horde.org/w/kernel.org/pub/software/scm/git/docs/git-add.html">git
        add</a></tt> has many powerful tools to indicate what files or portions
        of a file you want to commit: the <tt>-i</tt> option (interactive
        mode), and
        <tt>-p</tt> option (patch mode) are good examples. Read the man page for
        further information on these options (and others).</p>

        <p>You can also list the files to be committed on the command line to
        commit:</p>

        <pre class="brush:bash">git commit [filename1] [filename2] ... [filenameX]</pre>

        <p>If you want to commit all modified files, you can use the following
        shortcut command:</p>

        <pre class="brush:bash">git commit -a</pre>

        <p>If you want to commit all modified files, and want a shortcut to
        also specify the commit message on the command line, use the following
        command:</p>

        <pre class="brush:bash">git commit -a -m "[commit message]"</pre>

        <p>The Horde Git Tools allow to do Git commits on all or several
        repositories at once. Check its documentation for details.</p>

        <h3 id="createcommit">Committing with horde-components</h3>

        <p><a href="https://github.com/horde/components">horde-components</a>
        is a command line tool to help with all kind of developer tasks. To get
        the full help and all available actions, run:</p>

        <pre class="brush:bash">horde-components help</pre>

        <p>When using the <tt>changed --commit</tt> option to update the
        changelogs, two separate commits are created. The first one only
        contains the changes to <tt>changelog.yml</tt> (and any file added
        earlier to the commit with <tt>git add</tt>, which is the same across
        all branches. Thus you can easily <tt>cherry-pick</tt> this commit from
        a different branch. The second commit with the same commit message
        contains changes to the <tt>package.xml</tt> and <tt>CHANGES</tt> files
        that may differ between branches and should <strong>not</strong> be
        cherry-picked. To update those files in the other branch, just
        run <tt>horde-components changed</tt> without any further arguments
        again, after cherry-picking the changes to <tt>changelog.yml</tt>. Such
        a workflow may look like:</p>

        <pre class="brush:bash">
          $ git checkout master
          $ git add changed_file1 directory/changed_file2
          $ horde-components changed --commit "[xyz] Fix this bug."
          [   OK   ] Added new note to version 1.2.3 of /horde/Component/doc/changelog.yml.
          [   OK   ] Updated /horde/Component/package.xml.
          [   OK   ] Updated /horde/Component/doc/Horde/Yaml/CHANGES.
          [master 08c1c38] [xyz] Fix this bug.
           3 files changed, 4 insertions(+)
          [master 409eac9] [xyz] Fix this bug.
           2 files changed, 3 insertions(+)
          $ git checkout FRAMEWORK_5_2
          $ git cp 08c1c38
          [FRAMEWORK_5_2 cc95a99] [xyz] Fix this bug.
           Date: Mon Oct 30 21:54:24 2017 +0100
           3 file changed, 4 insertions(+)
          $ horde-components changed
          [   OK   ] Updated /horde/Component/package.xml.
          [   OK   ] Updated /horde/Component/doc/Horde/Yaml/CHANGES.
        </pre>

        <h3>Pushing commits</h3>

        <p>Once you finish with your local commits and want to push them to the
        master repository, use the following command:</p>

        <pre class="brush:bash">git push</pre>

        <p>When pushing, it is most likely the desired action to ONLY push
        changes to branches that are currently being tracked on the master
        server. This is the default git behavior, but the following config
        verifies that the setting is configured properly:

        <pre class="brush:bash">git config push.default matching</pre>

        <p>Again, using Horde Git Tools will help to push on several
        repositories at once.</p>

        <h3>Stashing</h3>

        <p>Say you are working in a git tree and have previously made some
        local commits. You then started working on other code and modified
        several other files. However, you then decide you want to push the
        previously made commits to the central repository (e.g. those commits
        fix a critical bug). However, git will not let you push your commits
        because your tree is not clean.</p>

        <p>In the absence of originally using a branch to do the newer hacking,
        you can easily create a temporary branch, move the work-in-progress to
        the temporary branch, push your commits to the server, and then
        re-apply your work-in-progress to the current branch. Git has a
        wonderful built-in command that will do all this work for you:
        <tt><a href="https://web-horde.org/w/kernel.org/pub/software/scm/git/docs/git-stash.html">stash</a></tt>.
        To stash all work-in-progress on the current tree, use:</p>

        <pre class="brush:bash">git stash</pre>

        <p>When you need to pull the changes back, use:</p>

        <pre class="brush:bash">git stash apply</pre>

        <p>Stash has many more features that won't be explained here - check
        the documentation (e.g. working with multiple stashes, popping a
        stash).</p>

        <h3>Combining commits</h3>

        <p>It may often happen that you have many local commits that you want
        to push to the central repository. It may often be that many of these
        changes are similar (i.e. nits/doc cleanup/whitespace) or that some of
        the commits fixed things caused by a previous local, non-pushed,
        commit. In this case, it may be better to clean up the commit list to
        make the ultimate project history and commit notification e-mails look
        nicer. Git provides an easy way to manipulate your local commits:</p>

        <pre class="brush:bash">
        # origin means edit all commits applied on top of the last pull
        # from the central repository.
        git rebase -i origin
        </pre>

        <p>Use the 'squash' option to combine multiple commits. Instructions on
        the edit screen explain the various other features.</p>

        <h3>Creating/Managing remote branches</h3>

        <p>It may be useful to share work on a local branch with other
        developers.  For example, a large change that might not yet be ready
        for primetime, but could benefit for some eyeballs, might be useful to
        share on a branch rather than the master repo. To create a branch on
        the master Horde repository, and have your existing topic branch track
        the remove branch, use the following command:</p>

        <pre class="brush:bash">git push -u origin [localbranch]</pre>

        <p>Now all users can track this branch by issuing this command:</p>

        <pre class="brush:bash">git checkout -t origin/[remote branch name]</pre>

        <p>You should keep the topic branch up to date with the main branch
        during development so that your topic branch only contains the changes
        related to the work being done in the branch:</p>

        <pre class="brush:bash">
        git checkout [topic]
        git merge master
        # resolve conflicts
        git pull --rebase
        git push
        </pre>

        <p>During a long-lived branch, you will find yourself having to resolve
        the same conflicts over and over again. The git
        tool <em>git-rerere</em> is designed to help alleviate this issue. Once
        it is enabled, it will <strong>automatically</strong> take note of each
        conflict, and it's eventual resolution. Next time git comes across the
        exact same conflict, it will know on it's own how to resolve it. To use
        this feature you must explicitly enable it:</p>
        <pre class="brush:bash">
            git config --global rerere.enabled 1
        </pre>

        <p>To delete the remote branch, issue this command:</p>

        <pre class="brush:bash">git push origin :[branchname]</pre>

        <p>To remove stale remote branches from your branch list, issue this
         command:</p>

        <pre class="brush:bash">git remote prune origin</pre>


      </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('toc'); ?>
      <?php echo $this->render('sponsors'); ?>
    </div>
    <div class="clear"></div>
  </div>
</div>
