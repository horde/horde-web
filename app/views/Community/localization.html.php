<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span><?php echo HordeWeb_Utils::breadcrumbs($this->controller, array('Localization' => 'localization'))?></h2>
      <?php echo $this->render('communitynav');?>
      <div class="section">
        <div class="sectionintro">
          <p>These translations are currently available for at least some
          applications. You can find complete statistics about the state of the
          different translations <a href="http://dev.horde.org/i18n/">here</a>.
          </p>
        </div>

        <h3>Localization</h3>

        <p>These translations are currently available for at least some
        applications. You can find complete statistics about the state of the
        different translations <a href="http://dev.horde.org/i18n/">here</a>.</p>

        <ul>
        <li><?php HordeWeb_Utils::fimg('om') ?>Arabic (Oman)</li>
        <li><?php HordeWeb_Utils::fimg('sy') ?>Arabic (Syria)</li>
        <li><?php HordeWeb_Utils::fimg('es') ?>Basque</li>
        <li><?php HordeWeb_Utils::fimg('ba') ?>Bosnian</li>
        <li><?php HordeWeb_Utils::fimg('br') ?>Brazilian Portuguese</li>
        <li><?php HordeWeb_Utils::fimg('bg') ?>Bulgarian</li>
        <li><?php HordeWeb_Utils::fimg('es') ?>Catalan</li>
        <li><?php HordeWeb_Utils::fimg('cn') ?>Chinese (Simplified)</li>
        <li><?php HordeWeb_Utils::fimg('tw') ?>Chinese (Traditional)</li>
        <li><?php HordeWeb_Utils::fimg('cz') ?>Czech</li>
        <li><?php HordeWeb_Utils::fimg('dk') ?>Danish</li>
        <li><?php HordeWeb_Utils::fimg('nl') ?>Dutch</li>
        <li><?php HordeWeb_Utils::fimg('ee') ?>Estonian</li>
        <li><?php HordeWeb_Utils::fimg('fi') ?>Finnish</li>
        <li><?php HordeWeb_Utils::fimg('fr') ?>French</li>
        <li><?php HordeWeb_Utils::fimg('es') ?>Galician</li>
        <li><?php HordeWeb_Utils::fimg('de') ?>German</li>
        <li><?php HordeWeb_Utils::fimg('gr') ?>Greek</li>
        <li><?php HordeWeb_Utils::fimg('il') ?>Hebrew</li>
        <li><?php HordeWeb_Utils::fimg('hu') ?>Hungarian</li>
        <li><?php HordeWeb_Utils::fimg('is') ?>Icelandic</li>
        <li><?php HordeWeb_Utils::fimg('id') ?>Indonesian</li>
        <li><?php HordeWeb_Utils::fimg('it') ?>Italian</li>
        <li><?php HordeWeb_Utils::fimg('jp') ?>Japanese</li>
        <li><?php HordeWeb_Utils::fimg('kh') ?>Khmer</li>
        <li><?php HordeWeb_Utils::fimg('kr') ?>Korean</li>
        <li><?php HordeWeb_Utils::fimg('lv') ?>Latvian</li>
        <li><?php HordeWeb_Utils::fimg('lt') ?>Lithuanian</li>
        <li><?php HordeWeb_Utils::fimg('mk') ?>Macedonian</li>
        <li><?php HordeWeb_Utils::fimg('no') ?>Norwegian BokmÂl</li>
        <li><?php HordeWeb_Utils::fimg('no') ?>Norwegian Nynorsk</li>
        <li><?php HordeWeb_Utils::fimg('ir') ?>Persian (Western)</li>
        <li><?php HordeWeb_Utils::fimg('pl') ?>Polish</li>
        <li><?php HordeWeb_Utils::fimg('pt') ?>Portuguese</li>
        <li><?php HordeWeb_Utils::fimg('ro') ?>Romanian</li>
        <li><?php HordeWeb_Utils::fimg('ru') ?>Russian</li>
        <li><?php HordeWeb_Utils::fimg('sk') ?>Slovak</li>
        <li><?php HordeWeb_Utils::fimg('sl') ?>Slovenian</li>
        <li><?php HordeWeb_Utils::fimg('es') ?>Spanish</li>
        <li><?php HordeWeb_Utils::fimg('se') ?>Swedish</li>
        <li><?php HordeWeb_Utils::fimg('th') ?>Thai</li>
        <li><?php HordeWeb_Utils::fimg('tr') ?>Turkish</li>
        <li><?php HordeWeb_Utils::fimg('ua') ?>Ukrainian</li>
        </ul>
      </div>
    </div>
     <div class="rightcol" style="background: none;">
         <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>