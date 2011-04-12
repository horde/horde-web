<p>Turba is the Horde contact management application. It is a production level
address book, and makes heavy use of the Horde framework to provide integration
with <?php echo $this->linkTo('IMP', array('controller' => 'app', 'action' =>
'app', 'app' => 'imp')) ?> and other Horde applications.</p>

<p>Turba is a complete basic contact management application. SQL, LDAP, IMSP,
Kolab, and Horde Preferences backends are available and are well tested. You
can define the fields in your address books in a very flexible way, just by
changing the config files. You can import/export from/to Pine, Mulberry, CSV,
TSV, and vCard contacts. You can create distribution lists from your
addressbooks, which are handled transparently by IMP and other Horde
applications. You can share address books with other users. And there are
Horde API functions to add and search for contacts.</p>

<p>Additional backends are easy to add - all you need to do is to implement a
Turba_Driver subclass that implements a few simple methods and talks to your
storage method of choice.</p>

<p>If you are interested in helping develop Turba, or just want to ask
questions and keep an eye on its progress, be sure to join our <?php echo
$this->linkTo('mailing list', array('controller' => 'community', 'action' =>
'mail')) ?>!</p>
