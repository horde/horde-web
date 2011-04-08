<p>Passwd is the Horde password changing application. While it has been
released and is in production use at many sites, it is also under heavy
development in an effort to expand and improve the module.</p>

<p>Right now, Passwd provides fairly complete support for changing passwords
via Poppassd, LDAP, Unix expect scripts, the Unix smbpasswd command for
SMB/CIFS passwords, Kolab, ADSI, Pine, Serv-U FTP, VMailMgr, vpopmail, and SQL
passwords.</p>

<p>Passwd is part of a suite of account management modules for Horde consisting
of <?php echo $this->linkTo('Accounts', array('controller' => 'app', 'action'
=> 'app', 'app' => 'accounts')) ?>, <?php echo $this->linkTo('Forwards',
array('controller' => 'app', 'action' => 'app', 'app' => 'forwards')) ?>,
Passwd, and <?php echo $this->linkTo('Vacation', array('controller' => 'app',
'action' => 'app', 'app' => 'vacation')) ?>.</p>

<p>Collectively these modules now comprise what is known as <em>Sork</em>.
There is a mailing list available for these modules.  See <a
href="http://lists.horde.org/mailman/listinfo/sork/">http://lists.horde.org/mailman/listinfo/sork/</a>
for information or to subscribe.</p>
