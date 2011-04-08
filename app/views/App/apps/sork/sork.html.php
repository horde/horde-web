<p>Sork is comprised of four Horde modules: </p>

<ul>
    <li><?php echo $this->linkTo('Accounts', array('controller' => 'app', 'action' => 'app', 'app' => 'accounts')) ?> to manage the other modules.</li>
    <li><?php echo $this->linkTo('Forwards', array('controller' => 'app', 'action' => 'app', 'app' => 'forwards')) ?> to set e-mail forwards.</li>
    <li><?php echo $this->linkTo('Passwd', array('controller' => 'app', 'action' => 'app', 'app' => 'passwd')) ?> for changing passwords.</li>
    <li><?php echo $this->linkTo('Vacation', array('controller' => 'app', 'action' => 'app', 'app' => 'vacation')) ?> to set vacation notices.</li>
</ul>

<p>Collectively these modules now comprise what is known as <em>Sork</em>.
There is a mailing list available for these modules.  See <a
href="http://lists.horde.org/mailman/listinfo/sork/">http://lists.horde.org/mailman/listinfo/sork/</a>
for information or to subscribe.</p>
