<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <h2><span>&nbsp;</span>Download <a href="<?php echo $this->urlWriter->urlFor('app', array('app' => $this->appname)) ?>"><?php echo htmlspecialchars($this->app_info['name']) ?></a></h2>
        <div class="section">

            <h3>Installing <?php echo htmlspecialchars($this->app_info['name']) ?></h3>

            <p>The recommended way to install <?php echo htmlspecialchars($this->app_info['name']) ?>
            is via <a href="https://getcomposer.org/">Composer</a> from
            <a href="https://packagist.org/packages/horde/">Packagist</a>.</p>

            <p>Please see the
            <a href="<?php echo $this->urlWriter->urlFor('app', array('app' => $this->appname, 'action' => 'docs')) ?>/INSTALL">installation
            documentation</a> for detailed instructions.</p>

            <h3>Obtaining Current Development Snapshots</h3>

            <p>The current development version of <?php echo
            htmlspecialchars($this->app_info['name']) ?> is available via
            <a href="<?php echo $this->urlWriter->urlFor('development',
            array('action' => 'git')) ?>">Git</a>.</p>

            <h3>Obtaining Old Versions</h3>

            <p>Old versions can be obtained from
            <a href="https://packagist.org/packages/horde/">Packagist</a>
            or our legacy <a href="https://pear.horde.org">PEAR server</a>.
            See also the <a href="<?php echo $this->urlWriter->urlFor('download_h5', array('app' => $this->appname)) ?>">Horde 5
            download page</a> for PEAR-based installation.</p>

            <?php if ($this->hasAdditional): echo $this->render('additional'); endif; ?>
        </div>
    </div>
    <div class="rightcol" style="background: none;">
        <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
