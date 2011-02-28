<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <h2><span></span>Downloads</h2>
        <ul>
         <li><p><em><strong>Stable Releases</strong></em> - code that has been tested,
         documented, and possibly packaged in .rpm, .deb, or other
         formats. Releases can be obtained from a project's download page. See the
         <a href="<?php echo $this->urlWriter->urlFor('projects');?>">Horde Project List</a> for a list of stable, or
         soon-to-be released, applications.</p></li>

         <li><p><a href="http://snaps.horde.org/"><em><strong>Nightly
         Snapshots</strong></em></a> - tarballs of the bleeding-edge developer code, generated nightly for those without access to Git or CVS. We keep approximately 7 days worth of snapshots, organized by
         date.</p></li>

        <li><p><a href="../source/"><em><strong>Source Code</strong></em></a> - the latest code, from either the bleeding edge developer ("HEAD") releases or a stable branch, is always available using Git or CVS.</p></li>
       </ul>
	</div>
     <div class="rightcol" style="background: none;">
         <?php echo $this->render('releasedAppsList');?>
    </div>
    <div class="clear"></div>
  </div>
</div>