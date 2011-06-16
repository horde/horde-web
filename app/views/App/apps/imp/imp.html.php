<p>
 <!-- comment out for now, until sub naviagation works...need to update for 5
 anyway -->
 <!--<b>Versions (stable branch):</b>
 <a href="4.3/"><b>4.3</b></a> |
 <a href="4.2/">4.2</a> |
 <a href="4.1/">4.1</a> |
 <a href="4.0/">4.0</a>
 <br />
 <b>Old Versions:</b>
 <a href="3.2/">3.2</a> |
 <a href="3.1/">3.1</a> |
 <a href="3.0/">3.0</a> |
 <a href="2.2/">2.2</a>
</p>-->

<p>
 IMP is the Internet Messaging Program. It is written in <a
 href="http://www.php.net/">PHP</a> and provides webmail access to IMAP
 and POP3 accounts.
</p>

<p>IMP is currently at version 5 and requires Horde 4. It adds new features like
   a new mobile frontend for smartphones, much improved AJAX frontend with new
   vertical layout, entirely new IMAP library with broad RFC support and huge
   performance gains, HTML signatures, more powerful search and filters, and
   much more. With IMP 5, the DIMP and MIMP applications are now part of IMP.
</p>

<p>
 All versions of IMP since 2.2 pass the
 <a href="ftp://ftp.cac.washington.edu/imap/mime-examples/">"MIME Torture Test"</a> that the University of Washington makes available.
</p>

<p>
 Feel free to view (or add) documentation on IMP on the
 <a href="http://wiki.horde.org/ImpModule">IMP Wiki Page</a>.
</p>

 <h3>Related Resources</h3>
 <p>
  <?php echo $this->linkTo('Turba contact manager', array('controller' => 'app', 'action' => 'app', 'app' => 'turba'))?><br />
  <?php echo $this->linkTo('Ingo filters manager', array('controller' => 'app', 'action' => 'app', 'app' => 'ingo'))?><br />
  <?php echo $this->linkTo('Gollem file manager', array('controller' => 'app', 'action' => 'app', 'app' => 'gollem'))?><br />
  <?php echo $this->linkTo('Kronolith calendar module', array('controller' => 'app', 'action' => 'app', 'app' => 'kronolith'))?><br />
  <?php echo $this->linkTo('Sork account management modules (Passwd, Vacation, Forwards)', array('controller' => 'app', 'action' => 'app', 'app' => 'sork'))?><br />
 </p>

