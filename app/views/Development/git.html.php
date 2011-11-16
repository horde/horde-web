<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Git' => 'git'))?></h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">
        <div class="sectionintro">
          <p>All new development work should be done against current git code.
          The master branch is considered the mainline, authoritative branch
          that will eventually become the next release.</p>

            <p>You can use the Horde Git repository as an anonymous user or as a
            developer.</p>

            <p>You will need a Git client, if you don't already have one.
            Information on Git can be found at <a href="http://git-scm.com/">
            http://git-scm.com/</a>.</p>

            <p>These command lines should be the bare-bones needed to get you
            started with Horde and Git; this is not a Git tutorial, however. The
            standard Git documentation is available <a
            href="http://www.kernel.org/pub/software/scm/git/docs/">here</a>.
            Additional tips and useful links can be found at <a
            href="http://www.gitready.com/">git ready</a> and
            <a href="http://andyjeffries.co.uk/articles/25-tips-for-intermediate-git-users">
            25 Tips for Intermediate Git Users</a>.</p>
        </div>

        <h3>Available Repositories</h3>
        <ul>
            <li><tt><a href="http://git.horde.org/?rt=horde-git">horde</a></tt> - Horde application code</li>
            <li><tt><a href="http://git.horde.org/?rt=horde-support">horde-support</a></tt> - Support code</li>
            <li><tt><a href="http://git.horde.org/?rt=horde-web">horde-web</a></tt> - Website source code</li>
        </ul>
        <br />

        <h2><span>&nbsp;</span>Anonymous Git</h2>
        <p>Anonymous Git access is available via GitHub using the
        <tt>git://</tt> protocol.</p>

        <p>To clone a repository, use the following command:</p>

        <pre class="brush:bash">git clone --depth 1 git://github.com/horde/[REPO]</pre>

        <p>where <tt>REPO</tt> is one of the available repositories listed
        above. The <tt>--depth 1</tt> option creates a <i>shallow</i> clone
        rather than downloading the whole repository; this saves significant
        storage space on your local machine and requires less network bandwidth
        during the initial transfer. The disadvantage is that the full
        repository history will not be available on your local machine, you
        cannot clone or fetch from it, nor push from nor into it (none of these
        activities are generally useful for anonymous repositories anyway). If
        you do want the full repository, simply omit <tt>--depth 1</tt>.</p>

        <p>To update the repository, enter the repository directory and use this
        command:</p>

        <pre class="brush:bash">git pull</pre>

        <h3>Making Development Repos Web-Accessible</h3>

        <p>Make sure you have cloned the <tt>horde</tt> repo. Once initialized,
        creating a web-accessible development installation can be done simply by
        running the <tt>install_dev</tt> PHP script located at
        <tt>horde-git/framework/bin</tt>. To properly run this script, a local
        copy of install_dev.conf must be created on your system, with the
        variables inside that file edited as necessary to apply to your system.
        </p>

        <p>For example:</p>

        <pre class="brush:bash">
        cd /path/to/horde-git/framework/bin
        cp install_dev.conf.dist install_dev.conf
        vi install_dev.conf (replace vi with your favorite editing tool)
        php ./install_dev
        </pre>

        <p>Running that script will symlink the entire horde package into the
        web-accessible directory you specified in <tt>install_dev.conf</tt>, symlink all
        other Horde applications within that directory, and will properly set up the
        necessary include/horde path definitions. Note that all edits should take place
        within the repository, as the web-accessible directory will be deleted every
        time the <tt>install_dev</tt> script is run.</p>

        <p>Full directory paths will be needed in
        <tt>horde-git/horde/config/registry.php</tt> due to the symlinks. The easiest
        way to setup full paths is to set the <tt>$app_fileroot</tt> parameter in
        this file.</p>

        <p>You can now follow the procedures in the normal INSTALL document to
        complete the configuration and database creation.</p>

        <p>If, after you have configured Horde, you wish you can manually run
        the database migrations, you can run these as so:</p>

        <pre class="brush:bash">horde/bin/horde-db-migrate {application_name} [up|down]</pre>

        <p>If installing the framework libraries directly via PEAR, you will
        need to define your horde application directory (i.e. the filesystem directory where
        the Horde application is installed and accessible to a browser) in your PEAR
        config.  This can only be done if the horde/Role package has previously been
        installed on your system.  This can done via:</p>

        <pre class="brush:bash">
        cd /path/to/framework
        pear install Role/package.xml
        pear run-scripts horde/Role
        </pre>

        <h3 id="patch">Creating Patches</h3>

        <p>To submit patches, first make the changes in your local repository. You will
        need to <a href="#createcommit">commit these changes locally</a>.  After
        committing, use the following command:</p>

        <pre class="brush:bash">git format-patch -M -B origin</pre>

        <p>This command creates a separate patch file for each commit that exists
        locally on your machine but does not exist in the master Horde branch (origin).
        These patch files will be located in your local directory.</p>

        <h2><span>&nbsp;</span>Developer Git</h2>

        <p>Access to the live Git repository is only available over SSH. You will want
        to create an SSH key and use that with your account on dev.horde.org to avoid
        having to enter your password on every pull/push.</p>

        <p>You will also need to create an account on GitHub as the master repo will
        be <a href="http://lists.horde.org/archives/dev/Week-of-Mon-20100830/025224.html">mirrored to GitHub every time a commit is pushed</a>.
        The following needs to be done:</p>

        <ol>
            <li>Create a GitHub account.</li>
            <li><a href="http://help.github.com/linux-key-setup/">Setup your SSH public key</a>. This SSH key must exist in your github.com account.</li>
            <li><a href="http://lists.horde.org/archives/dev/Week-of-Mon-20100830/025226.html">Make sure the github host key is stored in your git.horde.org account</a>.</li>
            <li>Join the Horde organization on GitHub (send e-mail to core@lists.horde.org).</li>
        </ol>


        <h3>Cloning repository</h3>

        <p>To clone a repository, use this command:</p>

        <pre class="brush:bash">git clone ssh://dev.horde.org/horde/git/[REPO]</pre>

        <p>where <tt>REPO</tt> is one of the available repositories listed above.</p>

        <p>This will create a <tt>REPO</tt> directory in your current directory.
        Once completed, an up to date copy of the master Git repository will be
        available on your system. You must use the SSH protocol rather than the git
        protocol because the Horde Git repository only supports pushing commits
        through SSH. (Since Git will automatically use the protocol used to clone the
        repository for all future push/pull operations, it is easiest to set your
        local repository up correctly from the beginning.)</p>


        <h3>Updating repository</h3>

        <p>To update your local repository, <span style="color:red">you MUST rebase
        the changes on top of your local repo copy. Failure to do so will result in
        useless, annoying commit merge messages both added to the master repository and
        sent in the commit e-mails.</span></p>

        <p>To update/rebase the changes, you can use the following command:</p>

        <pre class="brush:bash">git pull --rebase</pre>

        <p>Better still, to prevent an unnecessary merge, you can configure
        <tt><a href="http://www.kernel.org/pub/software/scm/git/docs/git-pull.html">git
        pull</a></tt> to always rebase when pulling for a particular repo by using the
        following command:</p>

        <pre class="brush:bash">git config branch.[reponame].rebase true</pre>

        <p>One disadvantage of <tt>git pull</tt> is that (as of Git v1.6.1.1) it does
        not indicate which files are updated. To see a list of files that are updated,
        you should run these two commands instead:</p>

        <pre class="brush:bash">
        git fetch
        git rebase -v origin
        </pre>

        <p>A helpful alias for <pre class="brush:bash">.gitconfig</pre> to update your local repository
        while seeing changed files and avoiding conflicts is:</p>

        <pre class="brush:bash">
        [alias]
            get = !git fetch &amp;&amp;
                ( git rebase -v origin/master || ( git stash &amp;&amp;
                    ( git rebase -v origin/master || echo "WARNING: Run 'git stash pop' manually!" ) &amp;&amp;
                git stash pop ) )
        </pre>

        <p>For more information on rebasing, and the commands needed if conflicts are
        detected during the rebase/merge, see:
        <a href="http://www.kernel.org/pub/software/scm/git/docs/user-manual.html#using-git-rebase">http://www.kernel.org/pub/software/scm/git/docs/user-manual.html#using-git-rebase</a>
        and <a href="http://jbowes.dangerouslyinc.com/2007/01/26/git-rebase-keeping-your-branches-current/">http://jbowes.dangerouslyinc.com/2007/01/26/git-rebase-keeping-your-branches-current/</a>.</p>


        <h3 id="createcommit">Creating commits</h3>

        <p>First, you should make sure your contact information is correct. The
        easiest way to do so is to issue the following commands:</p>

        <pre class="brush:bash">
        git config user.name "FirstName LastName"
        git config user.email "user@example.com"
        </pre>

        <p>Go ahead and hack away. When finished, commit the files to your local
        repo. There are several ways to do this. To add specific files to a commit,
        use the following commands:</p>

        <pre class="brush:bash">
        git add filename [filename2] [filename3...]
        git commit
        </pre>

        <p><tt><a
        href="http://www.kernel.org/pub/software/scm/git/docs/git-add.html">git
        add</a></tt> has many powerful tools to indicate what files or portions of
        a file you want to commit: the <tt>-i</tt> option (interactive mode), and
        <tt>-p</tt> option (patch mode) are good examples. Read the man page for
        further information on these options (and others).</p>

        <p>You can also list the files to be committed on the command line to
        commit:</p>

        <pre class="brush:bash">git commit [filename1] [filename2] ... [filenameX]</pre>

        <p>If you want to commit all modified files, you can use the following
        shortcut command:</p>

        <pre class="brush:bash">git commit -a</pre>

        <p>If you want to commit all modified files, and want a shortcut to also
        specify the commit message on the command line, use the following command:</p>

        <pre class="brush:bash">git commit -a -m "[commit message]"</pre>

        <h3>Pushing commits</h3>

        <p>Once you finish with your local commits and want to push them to the
        master repository, use the following command:</p>

        <pre class="brush:bash">git push</pre>

        <p>When pushing, it is most likely the desired action to ONLY push changes to
        branches that are currently being tracked on the master server. This is the
        default git behavior, but the following config verifies that the setting is
        configured properly:

        <pre class="brush:bash">git config push.default matching</pre>

        <h3>Stashing</h3>

        <p>Say you are working in a git tree and have previously made some local
        commits. You then started working on other code and modified several other
        files. However, you then decide you want to push the previously made commits
        to the central repository (e.g. those commits fix a critical bug). However, git
        will not let you push your commits because your tree is not clean.</p>

        <p>In the absence of originally using a branch to do the newer hacking, you
        can easily create a temporary branch, move the work-in-progress to the
        temporary branch, push your commits to the server, and then re-apply your
        work-in-progress to the current branch. Git has a wonderful built-in
        command that will do all this work for you:
        <tt><a href="http://www.kernel.org/pub/software/scm/git/docs/git-stash.html">stash</a></tt>.
        To stash all work-in-progress on the current tree, use:</p>

        <pre class="brush:bash">git stash</pre>

        <p>When you need to pull the changes back, use:</p>

        <pre class="brush:bash">git stash apply</pre>

        <p>Stash has many more features that won't be explained here - check the
        documentation (e.g. working with multiple stashes, popping a stash).</p>

        <h3>Combining commits</h3>

        <p>It may often happen that you have many local commits that you want to push
        to the central repository. It may often be that many of these changes are
        similar (i.e. nits/doc cleanup/whitespace) or that some of the commits fixed
        things caused by a previous local, non-pushed, commit. In this case, it may
        be better to clean up the commit list to make the ultimate project history
        and commit notification e-mails look nicer. Git provides an easy way to
        manipulate your local commits:</p>

        <pre class="brush:bash">
        # origin means edit all commits applied on top of the last pull
        # from the central repository.
        git rebase -i origin
        </pre>

        <p>Use the 'squash' option to combine multiple commits. Instructions on the
        edit screen explain the various other features.</p>

        <h3>Creating/Managing remote branches</h3>

        <p>It may be useful to share work on a local branch with other developers.
        For example, a large change that might not yet be ready for primetime, but
        could benefit for some eyeballs, might be useful to share on a branch rather
        than the master repo. To create a branch on the master Horde repository, use
        the following command:</p>

        <pre class="brush:bash">git push origin [localbranch]</pre>

        <p>After you push your new topic branch, you can do the following to have your
        existing topic branch track the remote branch you just created (this is not
        done automatically) [this requires Git 1.7.0+]:</p>

        <pre class="brush:bash">git branch --set-upstream [local branch name] origin/[remote branch name]</pre>

        <p>Now all users can track this branch by issuing this command:</p>

        <pre class="brush:bash">git checkout -t origin/[remote branch name]</pre>

        <p>You should keep the topic branch up to date with the main branch during
        development so that your topic branch only contains the changes related to the
        work being done in the branch:</p>

        <pre class="brush:bash">
        git checkout [topic]
        git merge master
        # resolve conflicts
        git pull --rebase
        git push
        </pre>

        <p>During a long-lived branch, you will find yourself having to resolve the same
        conflicts over and over again. The git tool <em>git-rerere</em> is designed to
        help alleviate this issue. Once it is enabled, it will
        <strong>automatically</strong> take note of each conflict, and it's eventual
        resolution. Next time git comes across the exact same conflict, it will
        know on it's own how to resolve it. To use this feature you must explicitly
        enable it:</p>
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
