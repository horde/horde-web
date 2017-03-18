<!--
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
</p>
-->

<p>
 IMP is the Internet Messaging Program. It is written in <a
 href="http://www.php.net/">PHP</a> and provides webmail access to IMAP
 and POP3 accounts. It uses the best-of-class
 <a href="http://dev.horde.org/imap_client/">Horde/Imap_Client</a> library to
 provide fast, robust connections to the remote IMAP/POP3 server. IMP provides
 multiple view types to support all possible browsers (desktop vs. mobile vs.
 tablet vs. text only).
</p>

<p>
 IMP passes both the
 <a href="ftp://ftp.cac.washington.edu/imap/mime-examples/">MIME Torture
 Test</a> and the newer
 <a href="http://www.email-standards.org/acid-test/">E-Mail Acid Test</a>,
 ensuring that messages are displayed as intended by the original sender.
</p>

 <h3>Core features</h3>
 <p>
   <ul>
     <li>Dynamic (AJAX) view</li>
     <li>Mobile smartphone view</li>
     <li>Minimal (text-only) view</li>
     <li>HTML message composition with a cross-browser WYSIWYG editor</li>
     <li>Drag/drop attachment support into WYSIWYG editor</li>
     <li>HTML signatures</li>
     <li>High performance</li>
     <li>Robust IMAP support, utilizing advanced server features</li>
     <li>Flexible message search</li>
     <li>Address autocompletion</li>
     <li>Spell checking</li>
     <li>Sending of attachments via download link, instead of embedding in message</li>
     <li>Thread view</li>
     <li>Message previews in mailbox view</li>
     <li>Desktop like user interface and navigation (also via keyboard)</li>
     <li>IMAP folder support</li>
     <li>Management of shared IMAP folders (ACLs)</li>
     <li>Folder subscriptions</li>
     <li>Various identities</li>
     <li>Alias and "tied to" addresses in user identities</li>
     <li><?php echo $this->linkTo('Integration with e-mail filtering', array('controller' => 'app', 'action' => 'app', 'app' => 'ingo'))?></li>
     <li><?php echo $this->linkTo('Integration with addressbook', array('controller' => 'app', 'action' => 'app', 'app' => 'turba'))?></li>
     <li><?php echo $this->linkTo('Integration with calendar', array('controller' => 'app', 'action' => 'app', 'app' => 'kronolith'))?></li>
     <li>S/MIME and PGP based encryption and signatures</li>
     <li>Mailbox quotas</li>
     <li>Ability to forward multiple messages at once</li>
     <li>Download of attachments as ZIP archive</li>
     <li>Stripping of attachments from messages</li>
     <li>Preview of attachments in compose view</li>
     <li>Priority settings for composed messages</li>
     <li>Message flags</li>
     <li>Graphical emoticons and country flags in message view</li>
     <li>Available in many languages</li>
     <li>Full charset support</li>
   </ul>
 </p>

 <h3>Related Resources</h3>
 <p>
  <?php echo $this->linkTo('Turba contact manager', array('controller' => 'app', 'action' => 'app', 'app' => 'turba'))?><br />
  <?php echo $this->linkTo('Ingo filters manager', array('controller' => 'app', 'action' => 'app', 'app' => 'ingo'))?><br />
  <?php echo $this->linkTo('Kronolith calendar module', array('controller' => 'app', 'action' => 'app', 'app' => 'kronolith'))?><br />
  <?php echo $this->linkTo('Sork account management modules (Passwd, Vacation, Forwards)', array('controller' => 'app', 'action' => 'app', 'app' => 'sork'))?><br />
 </p>

