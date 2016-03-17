<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Support' => 'support'))?></h2>
      <?php echo $this->render('communitynav');?>
      <div class="section">
        <div class="sectionintro">
          <p>Just like the development of the Horde Project is a community and
          volunteer effort, so is the support. Effort is made to provide the
          right tools to efficiently help you with the resources available.
          Please use these tools fully and intelligently.</p>
          <p>If you require support that is unable to be obtained via the
          community channels, please check out our professional support
          options.</p>
        </div>
        <h2><span>&nbsp;</span>Resources</h2>
        <div class="warning"><p>Please be careful not to have unreasonable
        expectations: you cannot demand your questions to be answered, bugs to
        be fixed or features implemented. If you require service or delivery
        guarantees please consider hiring
        a <em>paid</em> <a href="consulting/">consultancy</a>.</p></div>

        <h3>FAQ</h3>
        <p>As a starting point, please read
        the <a href="http://wiki.horde.org/FAQ">Horde FAQ</a>. It is constantly
        updated from all the other sources with the most frequently asked
        questions and the responses.</p>

        <h3>Mailing Lists and IRC</h3>

        <p>You can address any support issues to one of the <a href="mail/">
        mailing lists</a>. You can also ask for help on IRC.</p>

        <p>There is a <tt>#horde</tt> channel on <tt>irc.freenode.net</tt>
        (<i>see</i> <a href="http://web.horde.org/freenode.net/">
        http://www.freenode.net/</a>), for discussion of Horde applications,
        the Horde Framework, random development questions, and anything else
        that seems relevant. Come join us!</p>

        <p>If you are coming to the channel for support, keep in mind that your
        audience is limited and most are there working on development; it's not
        a dedicated support channel.  Please be courteous, patient, and
        understanding. As always with IRC, ask your question and be patient for
        an answer. People are often busy or not even in front of the
        screen. Also, please take a look
        at <a href="http://web.horde.org/asktog.com/columns/047HowToWriteAReport.html">How
        to Deliver a Report Without Getting Lynched</a> or
        ESR's <a href="http://web.horde.org/catb.org/esr/faqs/smart-questions.html">How
        To Ask Questions The Smart Way</a>. It will help us help you.</p>

        <div class="hint"><p>Note: your best bet for help is the mailing
        lists. There are more people reading the mailing lists than the bug
        system email. The more people that see your message, the more likely
        you are to get help. Make sure to
        include <a href="http://web.horde.org/chiark.greenend.org.uk/~sgtatham/bugs.html">enough
        information</a> so that people can help you.</p></div>

        <h3>Bugs and Feature Requests</h3>

        <p>If you have a bug or a new feature request, please visit
        the <a href="http://bugs.horde.org/">Horde Bug Tracker</a>. Search
        first to see if anyone has already filed a similar bug, if not open a
        new bug yourself.  Remember to use clear language, to be specific and
        verbose in your description.  Please
        read <a href="http://web.horde.org/freecode.com/articles/how-to-report-bugs-effectively">this
        editorial</a> on writing good bug reports.</p>

        <div class="warning"><p>Please remember: bug reports and any feedback
        help us make Horde better over time (not necessarily tomorrow!) and are
        always welcome.<br /> Strong language complaints and moaning on mailing
        lists, home pages, news groups, and other places are not
        constructive. The first and only place to file a complaint or feature
        request is in the <a href="http://bugs.horde.org/">Horde Bug
        Tracker</a>. Do it anywhere else and it will not reach the precious few
        who are willing to do anything about it!</p></div>

        <h3>Security Reports</h3>

        <p>If you wish to report <b>security problems</b> please see the
        procedures
        at <a href="http://wiki.horde.org/SecurityManagement">http://wiki.horde.org/SecurityManagement</a>.</p>
      </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('toc'); ?>
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
