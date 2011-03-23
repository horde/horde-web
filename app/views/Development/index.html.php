<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span>Development</h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">
        <div class="sectionintro">
          <p>See how to get involved with Horde development. Whether you
          are developing an in-house custom application, or are interested in
          contributing to Horde find out how to get started, and where to find
          help.</p>
        </div>

          <h3>Contribute</h3>
          <p>Want to get involved? The Horde Project is open to anyone interested
          in contributing.
          <?php echo $this->linkTo('See how', array('controller' => 'development', 'action' => 'contribute'))?>
          to get started.

          <h3>Source Code</h3>
          <p>Horde code may be obtained from a variety of sources, depending on
          your needs. If you intend to contribute to the project, you should
          clone our Git repository. Weekly snapshots are also made available, and
          of course, there is also the release downloads. You may also browse
          our Git and older CVS code trees directly online.

          <h3>Versions</h3>
          <p>Being a mature project, there are quite a few older versions of our
          software. Horde 4 is the most recent version of the Application
          Framework. See how the different versions of the various pieces of
          Horde fit together.

      </div>
	</div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>