<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('CVS' => 'cvs'))?></h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">
        <div class="sectionintro">
          <p>Horde now uses Git for all new development, however Horde 3 code
          continues to live in the CVS repository. All NEW development should be
          done against Git code, with CVS code only being used for bug and
          security fixes.</p>

          <p>You can use the Horde CVS repository as an anonymous user, or as a
          developer.</p>

          <p>You will need a CVS client, if you don't already have one. CVS
          should be installed with most modern Linux distributions, easily
          available on *BSD systems, and there are clients for Win32, MacOS, and
          GUI clients for the Unices. A number of them are available at <a
          href="http://web.horde.ws/nongnu.org/cvs/">http://www.nongnu.org/cvs/</a>.</p>

          <p>These command lines should be the bare-bones needed to get you
          started with Horde and CVS; this is not a CVS tutorial, however. The
          standard CVS documentation is available <a
          href="http://web.horde.ws/nongnu.org/cvs/">here</a>, and
          there are many HOWTOs available on the web.</p>
          </div>

          <h3><span>&nbsp;</span>The CVS Repository</h3>

          <p>All of the code in our repository is split into a set
          of <a href="<?php echo $this->urlWriter->urlFor('development',
          array('action' => 'cvsmodules')) ?>">modules</a>.  However, sometimes
          there are multiple branches available of a module.  A CVS branch is a
          mechanism for keeping multiple versions of a module; for instance, a
          stable branch and a development branch.</p>

          <p>Our branches and release engineering can seem a little convoluted
          at first, but follows some pretty simple rules. When you check
          something out of CVS, by default, you get the HEAD branch. HEAD is
          always the latest development code. It may be undocumented, it may be
          broken, it may cause tofu to turn purple. You never know.</p>

          <p>The branches that hold release versions of applications - code that is
          documented, tested, and recommended for production use - are named
          FRAMEWORK_3, where _3 means that this includes Horde 3.x and any applications
          that are compatible to Horde 3. So, the release branch for IMP 4.x and Horde
          3.x is both FRAMEWORK_3. Note that this doesn't give you a way to distinguish
          between IMP 4.0 and IMP 4.1 - they live in the same CVS branch, because one
          supercedes the other. However, we do tag releases, so you can check out IMP
          4.0 with the IMP_4_0 tag.</p>

          <p>There are some old branches available that hold old release versions of
          applications, named RELENG_*, where * is the major version of the application
          in question. So, the release branch for IMP 3.x is RELENG_3. The release
          branch for Horde 2.x is RELENG_2. Note that this doesn't give you a way to
          distinguish between IMP 3.0 and IMP 3.1 - they live in the same CVS branch,
          because one supercedes the other. However, we do tag releases, so you can
          check out IMP 3.0 with the IMP_3_0 tag.</p>

         <h2><span>&nbsp;</span>Anonymous CVS</h2>

        <p>Anonymous CVS access is available using pserver. To log in to the
        server, use the following commands:</p>

        <p>sh, ksh, bash, zsh:
        <blockquote>
            <pre class="brush:bash">
            export CVSROOT=:pserver:cvsread@anoncvs.horde.org:/repository
            </pre>
        </blockquote>
        </p>
        <p>csh, tcsh:
        <blockquote>
          <pre class="brush:shell">
          setenv CVSROOT :pserver:cvsread@anoncvs.horde.org:/repository
          </pre>
        </blockquote>
        </p>

        <p>then for all:
        <blockquote>
         <pre class="brush:bash">
         # password: horde
         cvs login
         </pre>
        </blockquote>
        </p>

        <p>In order to reduce the load on our anonymous CVS server, and to
        promote fairness amongst users who retrieve our source code via
        anonymous CVS, each client host is limited to a maximum of four
        connections a minute. The server supports a maximum of eight anonymous
        CVS connections simultaneously.</p>

        <h2><span>&nbsp;</span>Developer CVS</h2>

        <p>Access to the live CVS tree is only available over SSH. You must
        set the CVS_RSH variable to ssh, or the location of the ssh binary on
        your machine. You will probably want to create an SSH key and use that
        with your account to avoid having to enter your password on every
        checkout/update/commit. You will also have to set the CVSROOT
        environment variable. For sh shells, here is the syntax:</p>

        <p>sh, ksh, bash, zsh:
        <blockquote>
          <pre class="brush:bash">
          export CVSROOT=username@cvs.horde.org:/repository
          </pre>
        </blockquote>
        </p>
        <p>csh, tcsh:
        <blockquote>
         <pre class="brush:shell">
         setenv CVSROOT username@cvs.horde.org:/repository
         </pre>
        </blockquote>
        </p>

        <p>... where username is your cvs.horde.org account name.</p>


        <h3>Checking code out</h3>

        <p>Once you have performed the steps above, and you are sure the
        CVSROOT environment variable is set correctly, you can check out a
        module from CVS with this command:</p>

        <pre class="brush:shell">
        cvs co [ -r &lt;TAG&gt; ] &lt;MODULE&gt;
        </pre>

        <p>where -r &lt;TAG&gt; is optional, and specifies a tag or branch to
        check out (see <a href="index.php">the general CVS info</a> for what
        the branches mean), and &lt;MODULE&gt; is one of the <a
        href="<?php echo $this->urlWriter->urlFor('development',
          array('action' => 'cvsmodules')) ?>">available modules</a>. The modules list also says
        what tags are available for each module.</p>

        <p>This will create a <tt>&lt;MODULE&gt;</tt> directory in your
        current directory. It may take a bit of time, especially if your
        network connection is slow or the module is an espeicially large
        one. But once it is done, you will have an up to date copy of the
        master CVS source for that module. You can then at any time cd into
        this directory and type:</p>

        <pre class="brush:shell">
        cvs update -Pd
        </pre>

        <p>to update your source tree to be in sync with the master tree. (The
        -P means to prune empty directories,
        and -d makes sure that you get new directories which have been added
        to the repository since your last update/checkout).</p>

      </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('toc'); ?>
      <?php echo $this->render('sponsors'); ?>
    </div>
    <div class="clear"></div>
  </div>
</div>
