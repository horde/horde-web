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
   vertical layout, <a href="http://wiki.horde.org/Project/HordeImapLib">entirely
   new IMAP library with broad RFC support and huge performance gains</a>, HTML
   signatures, more powerful search and filters, and much more. With IMP 5,
   the DIMP and MIMP applications are now entirely contained within IMP.
</p>

<p>
 All versions of IMP since 2.2 pass the
 <a href="ftp://ftp.cac.washington.edu/imap/mime-examples/">"MIME Torture Test"</a> that the University of Washington makes available.
</p>

 <h3>Core features</h3>
 <p>
   <ul>
     <li>Mobile smartphone view</li>
     <li>HTML message composition with a cross-browser WYSIWIG editor</li>
     <li>HTML signature</li>
     <li>Passes "MIME Torture Test" and "E-Mail Acid Test"</li>
     <li>High performance</li>
     <li>Perfect IMAP support</li>
     <li>Flexible message search</li>
     <li>Address autocompletion</li>
     <li>Spell checking</li>
     <li>Sending of attachments via download link</li>
     <li>Thread view</li>
     <li>Message previews in mailbox view</li>
     <li>Desktop like user interface and navigation (also via keyboard)</li>
     <li>IMAP folder support</li>
     <li>Management of shared IMAP folders</li>
     <li>Folder subscriptions</li>
     <li>Various identities</li>
     <li>Alias and "tied to" addresses in user identities</li>
     <li>Integration with e-mail filter</li>
     <li>Integration with adressbook</li>
     <li>Integration calendar</li>
     <li>S/MIME and PGP based encryption as well as signatures</li>
     <li>Mailbox quotas</li>
     <li>Ability to forward multiple messages at once</li>
     <li>Download of attachments as ZIP archive</li>
     <li>Stripping of attachments from messages</li>
     <li>Preview of attachments in compose view</li>
     <li>Priority settings for composed messages</li>
     <li>Message flags</li>
     <li>Graphical emoticons and country flags in message view</li>
     <li>Available in many languages</li>
     <li>Full charset support in folders, mailbox, message and compose views</li>
   </ul>
 </p>

 <h3>Related Resources</h3>
 <p>
  <?php echo $this->linkTo('Turba contact manager', array('controller' => 'app', 'action' => 'app', 'app' => 'turba'))?><br />
  <?php echo $this->linkTo('Ingo filters manager', array('controller' => 'app', 'action' => 'app', 'app' => 'ingo'))?><br />
  <?php echo $this->linkTo('Gollem file manager', array('controller' => 'app', 'action' => 'app', 'app' => 'gollem'))?><br />
  <?php echo $this->linkTo('Kronolith calendar module', array('controller' => 'app', 'action' => 'app', 'app' => 'kronolith'))?><br />
  <?php echo $this->linkTo('Sork account management modules (Passwd, Vacation, Forwards)', array('controller' => 'app', 'action' => 'app', 'app' => 'sork'))?><br />
 </p>

