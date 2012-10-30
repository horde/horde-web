<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <h2><span>&nbsp;</span>Download <a href="<?php echo $this->urlWriter->urlFor('app', array('app' => $this->appname)) ?>"><?php echo $this->app_info['name'] ?></a></h2>
        <div class="section">
            <h3>Current Horde Stable Release</h3>
            <?php if ($this->h4app): ?>
            <ul>
            <?php foreach ($this->h4app as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>
            <p>Horde and all Horde applications now utilize a PEAR based
            installation method. You can install all Horde applications and
            libraries by following the directions in the <a href="<?php echo
            $this->urlWriter->urlFor('app', array('app' => $this->appname,
            'action' => 'docs')) ?>/INSTALL">documentation</a>.  You may
            also download the PEAR tarball from
            our <a href="http://pear.horde.org/">PEAR server</a> directly.</p>
            <?php else: ?>
            <p>No stable Horde release at this time.</p>
            <?php endif;?>

            <h3>Deprecated Horde 3 Stable Release</h3>
            <ul>
            <?php foreach ($this->stableapp as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>

            <?php if (count($this->devapp)): ?>
            <h3>Current Development Release</h3>
            <ul>
            <?php foreach ($this->devapp as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>

            <p>Horde and all Horde applications now utilize a PEAR based
            installation method. To upgrade to a development release, you need
            to attach the release's stability state to the application name,
            e.g.:</p>
            <pre>pear upgrade <?php echo $this->appname ?>-beta</pre>

            <?php endif; ?>

            <h3>Obtaining Current Development Snapshots</h3>

            <p>The current development version of
            <?php echo htmlspecialchars($this->app_info['name'])?> is available via
            <a href="<?php echo $this->urlWriter->urlFor('development')
            ?>#snapshots">nightly snapshots</a> and
            <a href="<?php echo $this->urlWriter->urlFor('development',
            array('action' => 'git')) ?>">Git</a>.<br />

            The old development version of <?php echo
            htmlspecialchars($this->app_info['name']) ?> is available via
            <a href="<?php echo $this->urlWriter->urlFor('development')
            ?>#snapshots">nightly snapshots</a> and
            <a href="<?php echo $this->urlWriter->urlFor('development',
            array('action' => 'cvs')) ?>">CVS</a>.</p>

            <?php if (count($this->app_info) > 1): ?>
            <h3>Obtaining Old Versions</h3>

            <p>Old versions can be obtained from our <a href="ftp://ftp.horde.org/pub/">FTP server</a>.</p>
            <?php endif; ?>
            <?php if ($this->hasAdditional): echo $this->render('additional'); endif; ?>
        </div>
    </div>
    <div class="rightcol" style="background: none;">
        <?php echo $this->render('sponsors');?>
    </div>
    <div class="clear"></div>
  </div>
</div>
