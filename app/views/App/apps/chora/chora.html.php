<p>Chora is our tool for viewing code repositories that are managed using the
<a href="http://web.horde.to/nongnu.org/cvs/">CVS</a> or <a
href="http://web.horde.to/subversion.tigris.org/">Subversion</a> source control systems. It
aims to provide a high degree of integration with CVS, SVN and the other Horde
web-based tools.</p>

<p>Right now, Chora comes close to matching existing CVS-Web scripts feature
for feature, and provides a solid base for future development.  Some exciting
new features include a <em>visual branch viewing</em> tool, which
intelligently displays the branch history of a given file. Branches have
traditionally been a source of confusion when using CVS, and this feature aims
to make it a bit clearer and easier to use.</p>

<p>Other features include:</p>
<ul>
<li><b>Directory-based views</b>, with a summary of the most recent
activity.</li>
<li>View <b>full log history</b> on a single file, with the ability to stick to
a single branch.</li>
<li>Request arbritrary <b>differences between versions</b> and branches.  These
can be viewed in a variety of formats, ranging from raw diff output to
human-readable HTML.</li>
<li><b>Visual branch viewing</b> for a single file, which graphically
represents the history of the file with respect to branches from the main trunk
of development.</li>
<li><b>Annotation</b> (otherwise known as 'blame') support, which shows which
authors are responsible for which portions of a file's contents.</li>
</ul>

<p>Chora is designed from the ground-up with customisability in mind, since
Version Control Systems are used in a variety of different ways. Because of
this, all the repository manipulation logic is abstracted away in our
<em>VC</em> library module. The main PHP scripts are simple HTML rendering
scripts, while the complex repository logic is hidden away in the library.
This library can be used for a variety of other uses, such as searching for
commits, graph generation, change collation, etc (all features planned for
eventual inclusion into Chora).</p>

<p>If you are interested in helping develop this module, or just want to ask
questions and keep an eye on its progress, be sure to join our <?php echo
$this->linkTo('mailing list', array('controller' => 'community', 'action' =>
'mail')) ?>!</p>
