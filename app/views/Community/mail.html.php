<div class="content">
  <div class="main">
    <div class="mainareasplit">
     <h2><span>&nbsp;</span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Mailing Lists' => 'mail'))?></h2>
     <?php echo $this->render('communitynav'); ?>
     <div class="section">
        <!-- SiteSearch Google -->
        <table align="right" cellspacing="0" cellpadding="0" style="margin-left:10px"><tr><td>
          <div class="note">
            <form method="get" action="http://www.google.com/search">
             <input type="hidden" name="ie" value="UTF-8" />
             <input type="hidden" name="oe" value="UTF-8" />
             <input type="hidden" name="sitesearch" value="http://lists.horde.org" />
             <input type="hidden" name="domains" value="http://lists.horde.org" />
             <p>Search all mailing lists:<br />
             <a href="http://www.google.com/"><img src="//www.google.com/logos/Logo_25wht.gif" align="middle" alt="Google" /></a>
             <input type="text" name="q" size="20" maxlength="255" value="" />
             <input type="submit" name="btnG" value="Search" />
             </p>
            </form>
          </div>
        </td></tr></table>

<!-- SiteSearch Google -->
<p>These are the current Horde-related mailing lists. <b>You must be
subscribed to post to any of them.</b> To subscribe either send an empty email
to <i>listname</i>-subscribe@lists.horde.org (substituting the name of the
list for "<i>listname</i>"), or use the <a href="http://lists.horde.org/">web
interface</a> where you can fully manage your list subscriptions.</p>

<p>All of the Horde mailing lists are run using <a
href="http://web.horde.ws/list.org/">Mailman</a>. You can also view the <a
href="http://web.horde.ws/list.org/mailman-member/">Mailman Members' Documentation</a>
for some further information.</p>

 <h2><span>&nbsp;</span>Before posting a question, consider the following points:</h2>
 <p>
 <ul>
  <li><a href="http://wiki.horde.org/FAQ"><strong>Read the FAQ</a>
   first!</strong></li>
  <li>Take a look at the <a href="http://bugs.horde.org/">bugs database</a>,
   too.</li>
  <li><a href="http://web.horde.ws/catb.org/~esr/faqs/smart-questions.html">How To Ask
   Questions The Smart Way</a> and <a
   href="http://web.horde.ws/asktog.com/columns/047HowToWriteAReport.html">How To
   Deliver A Report Without Getting Lynched</a> are good reads.</li>
  <li>Try searching the archives for any similar topics.</li>
  <li>Help people help you - if you've searched the archives or read the FAQ
   or tried other solutions, say what you did that didn't work.</li>
  <li><strong>Always</strong> say what versions of Horde, any applications,
   Apache, PHP, etc. you're using.</li>
  <li><strong>Do</strong> include the entire error message, and if you're not
   getting an error message, look really hard for one before posting
   without.</li>
  <li>Don't paste a whole test.php or phpinfo() unless asked; it's usually
   just noise.</li>
 </ul></p>

 <?php foreach ($this->lists as $group => $group_lists): ?>
 <div class="box mail">
  <h2><span>&nbsp;</span><?php echo $group ?></h2>
  <table width="100%" cellspacing="2">
  <tr>
    <th>
      List
    </th><th>
      Traffic
    </th><th colspan="3">
      Archives
    </th><th>
      Description
    </th>
  </tr>
  <?php foreach ($group_lists as $list => $list_val): ?>
  <tr valign="top">
    <td>
      <a href="http://lists.horde.org/mailman/listinfo/<?php echo $list ?>"><?php echo $list ?>@lists.horde.org</a>
    </td><td align="center">
      <?php echo $list_val['traffic'] ?>
    </td><td>
      <?php if (!empty($list_val['marc'])): ?>
        [<a href="http://web.horde.ws/marc.info/?l=<?php echo $list_val['marc'] ?>&amp;r=1&amp;w=2">MARC</a>]
      <?php endif; ?>
    </td><td>
      <?php if (!empty($list_val['gmane'])): ?>
        [<a href="http://web.horde.ws/news.gmane.org/gmane.comp.horde.<?php echo $list_val['gmane'] ?>">Gmane</a>]
      <?php endif; ?>
    </td><td>
      <?php if (!empty($list_val['google'])): ?>
        [<a href="http://web.horde.ws/groups.google.com/group/mailing.www.<?php echo $list_val['google'] ?>">Google</a>]
      <?php endif; ?>
    </td><td>
      <?php if (!empty($list_val['desc'])) echo $list_val['desc'] ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
</div>
<?php endforeach; ?>

<a style="display:none" href="http://lists.horde.org/archives/">http://lists.horde.org/archives/</a>



      </div>
    </div>
     <div class="rightcol" style="background: none;">
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
