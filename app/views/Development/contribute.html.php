<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Contribute' => 'contribute'))?></h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">

          <p class="exciter">There are several ways you can contributing to Horde. We are always looking
          for new poeple to help and not only in programming. There are plenty of
          important tasks that don't involve writing or maintaining code, such as
          documentation or localization.</p>

          <h3>Getting Started</h3>
          <p>As first steps you should:</p>
            <ol>
              <li><strong>Get the code.</strong><br />
                  <?php echo $this->linkTo('Clone the git repository.', array('controller' => 'development', 'action' => 'git'))?>
                  <strong>All</strong> new development is done out of our Git
                  repository. It is important to remember to always use git for
                  new features.
              </li>

              <li><strong>Find a bug to solve or a feature to implement.
                  </strong><br />Check the <a href="http://bugs.horde.org/">
                  Horde Ticket Tracker</a> for any outstanding bugs or track
                  down your own. It can be even missing documentation or
                  translations.<br />
                  If you decide to implement a new feature, it might be worth
                  discussing it in the
                  <?php echo $this->linkTo('lists', array('controller' => 'contact', 'action' => 'mail'))?>
                  first, to test water, get feedback from lead developers and see
                  if anybody is already working on it or if it fits at all into
                  the general direction of the project.
              </li>

              <li><strong>Create a patch.</strong><br />
                  See the instructions on the
                  <?php echo $this->linkTo('Git page', array('controller' => 'development', 'action' => 'git'))?>.
              </li>

              <li><strong>Attach your patch to a new enhancement request in the <a
                  href="http://bugs.horde.org/">Horde Ticket Tracker</a>.
                  </strong><br /> Be prepared to be met with a critical analysis
                  of your patch. In case your patch is refused, ask why and
                  either correct your patch or constructively argue your point.
                  In case you receive no feedback, try bumping the issue once
                  after a week. We make every effort to respond to all tickets,
                  but please be patient. If your patch does not cleanly fit into
                  Horde's main codebase, you may be asked to document it and
                  upload it to a new <a href="http://wiki.horde.org/">Wiki page
                  </a>.  That way it will be available in a central place to
                  others with the same need.</li>
            </ol>

            <h3>General points to remember</h3>
            <ul>
              <li>Respect the project coding standards, otherwise your patches
                  will not be commited. You can find the coding standards in
                  your horde directory under horde/docs/CODING_STANDARDS or
                  directly from
                  <a href="http://git.horde.org/co.php/horde/docs/CODING_STANDARDS?onb=master&rt=horde-git">
                  Git</a>.</li>
              <li>Work within the framework, that is use the available classes
                  and mechanisms (eg: preferences, permissions, forms, etc).</li>
              <li>Monitor the <a
                  href="http://lists.horde.org/mailman/listinfo/dev">development
                  </a> and
                  <a href="http://lists.horde.org/mailman/listinfo/commits">
                  commits</a> mailing lists and those of the applications you
                  work on.</li>
            </ul>

            <p>Lastly, remember that, although you work on the project on your
            own goodwill, this does not grant you any specific privileges. The
            lead developers make the final call. Sometimes, they may make
            decisions that you may not agree with. Obviously, you are entitled
            to voice your opinion and argue your point, but stay civil, do not
            drag it out and respect their decisions.</p>

            <p>That's pretty much it. One last thing: do not do it for an ego
            boost, do it for the love of coding. The unfortunate truth is that
            contributing to an OSS project will most likely never get you the
            kind of fame Linus Torvalds or RMS enjoy, nonetheless, as with any
            Open Source project, your contribution will be greatly appreciated
            by the community.</p>

            <strong>Welcome aboard!</strong>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>