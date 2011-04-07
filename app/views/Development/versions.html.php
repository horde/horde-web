<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Documentation' => 'documentation'))?></h2>
      <?php echo $this->render('developmentnav');?>
      <div class="section">
        <div class="sectionintro">
          <p>There are a number of different versions of Horde applications and
          the Horde Framework that have been made available at one time or
          another. Here we'll try and keep track of which versions of which
          applications work with each other and with which versions of
          Horde. We'll list versions of Horde, and then the application
          versions which work with them.</p>
        </div>

        <h3>Horde 4.x</h3>

        <ul>
        <li>IMP H4 (5.x)</li>
        <li>Turba H4 (3.x)</li>
        <li>Ingo H4 (2.x)</li>
        <li>Kronolith H4 (3.x)</li>
        <li>Nag H4 (3.x)</li>
        <li>Mnemo H4 (3.x)</li>
        </ul>

        <h3>Horde 3.x</h3>

        <ul>
        <li>IMP H3 (4.x)</li>
        <li>Turba H3 (2.x)</li>
        <li>Ingo H3 (1.x)</li>
        <li>Chora H3 (2.x)</li>
        <li>Kronolith H3 (2.x)</li>
        <li>Nag H3 (2.x)</li>
        <li>Mnemo H3 (2.x)</li>
        <li>Gollem H3 (1.x)</li>
        <li>MIMP H3 (1.x)</li>
        <li>Jeta H3 (1.x)</li>
        </ul>


        <h3>Horde 2.1.x / 2.2.x</h3>

        <ul>
        <li>IMP 3.x (all versions)</li>
        <li>Turba 1.x (all versions)</li>
        <li>Chora 1.x (all versions)</li>
        <li>Kronolith 1.x (all versions)</li>
        <li>Mnemo 1.x</li>
        <li>Nag 1.x</li>
        <li>Sork modules 2.x (all versions)</li>
        </ul>


        <h3>Horde 2.0</h3>

        <ul>
        <li>IMP 3.x (all versions)</li>
        <li>Turba 1.x (all versions)</li>
        <li>Chora 1.x (all versions)</li>
        <li>Sork modules 2.x (all versions)</li>
        </ul>


        <h3>Horde 1.2.x</h3>

        <ul>
        <li>IMP 2.2.x (matched versions - IMP 2.2.8 with Horde 1.2.8, etc.)</li>
        </ul>


        <h3>Horde 1.0.x</h3>

        <ul>
        <li>IMP 2.0.x (matched versions - IMP 2.0.2 with Horde 1.0.2, etc.)</li>
        </ul>
      </div>
    </div>
    <div class="rightcol" style="background: none;"><?php echo $this->render('sponsors'); ?></div>
    <div class="clear"></div>
  </div>
</div>
