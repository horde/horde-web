<p>Accounts is a very simple module which provides two functions:</p>

<ul>
<li>To display some user account information ("My Account" summary) including,
if possible, an "at a glance" summary of the current forwards and vacation
module status.</li>
<li>To provide a method for grouping some related modules (passwd, forwards,
and vacation) together in order to minimize the number of icons on the Horde
menu bar (so it will not exceed a reasonable screen width).</li>
</ul>

<p>Although Accounts can be used by itself, it is normally used along with:</p>

<ul>
<li><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'forwards')) ?>">Forwards</a></li>
<li><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'passwd')) ?>">Passwd</a></li>
<li><a href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'vacation')) ?>">Vacation</a></li>
</ul>

<p>Collectively these modules now comprise what is known as <em>Sork</em>.
There is a mailing list available for these modules.  See <a
href="http://lists.horde.org/mailman/listinfo/sork/">http://lists.horde.org/mailman/listinfo/sork/</a>
for information or to subscribe.</p>
