<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <h2><span>&nbsp;</span>Support</h2>
        <div class="section">
         <div class="sectionintro">
           <p>The Horde Project provides two levels of support for our software
           - community based support and paid, professional support.</p>
           <p>Note that we can only address problems related to the Horde
           software itself. If you are having problems with any service
           <em>using</em> Horde software, for example your email account, please
           contact your <b>service provider</b> directly.</p>
         </div>
         <h2><span>&nbsp;</span>Support Options</h2>
         <p>For information on the various support channels, please use the
         links below.</p>

         <h3>Community</h3>
         <p>Just like the development of the Horde Project is a community and
         volunteer effort, so is the support. Horde has a very robust and
         friendly community comprised of developers, administrators and users
         that volunteer their time and many years of experience to provide
         support.</p>
         <p>Please see our
         <?php echo $this->linkTo('Community Support', array('controller' => 'community', 'action' => 'support'))?>
         page for more information.

         <h3>Professional Services</h3>
         <p>Horde, LLC provides professional support for Horde software. If you
         are in need of support beyond the scope or ability of the community you
         may hire a Horde, LLC consultant to meet your needs.</p>
         <p>Please see our
         <?php echo $this->linkTo('Professional Services', array('controller' => 'services'))?> page for more information.</p>

        </div>
    </div>
    <div class="rightcol" style="background: none;">
      <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
