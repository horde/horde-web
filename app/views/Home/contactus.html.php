<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span>&nbsp;</span>Contact Info</h2>
      <div class="section">
        <div class="sectionintro">
        <p>The best way to get in touch with The Horde Project and it's
        community depends on your needs. We have the following options:</p>
        </div>

        <h3>Email/IRC</h3>
        <p> We have numerous
        <?php echo $this->linkTo('mailing lists', array('controller' => 'home', 'action' => 'mail')) ?>
        to help answer your questions, and are also availble on the #horde channel
        on freenode. See the
        <?php echo $this->linkTo('support', array('controller' => 'support', 'action' => 'index')) ?>
        page for more details on IRC.</p>

        <h3>Security Concerns</h3>
        <p>If you wish to contact us regarding a potential <strong>security</strong>
        concern. Please see our security reporting procedures at
        <a href="http://wiki.horde.org/SecurityManagement">http://wiki.horde.org/SecurityManagement</a>
        </p>
        
        <h3>Consulting Services</h3>
        <p>If you are looking to contact us about possible consulting servcies
        or other custom work, you may contact us at
        <a href="mailto:info@horde.org">info@horde.org</a>. You can also view
        our <?php echo $this->linkTo('Services', array('controller' => 'services', 'action' => 'index')) ?>
        page for more information.</p>

        <h3>Postal Mail</h3>
        <p>Horde, LLC<br />
        P.O. Box 79322<br />
        Atlanta, GA  30307<br />
        United States</p>

        <h3>Telephone</h3>
        <table>
          <tr>
            <td>USA:</td>
            <td>&nbsp;+1.404.475.4830</td>
            <td>&nbsp;(English)</td>
          </tr>
          <tr>
            <td>Germany:</td>
            <td>&nbsp;+49.521.4469.8995</td>
            <td>&nbsp;(English, German)</td>
          </tr>
        </table>
        </p>
      </div>
    </div>
     <div class="rightcol" style="background: none;">
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
