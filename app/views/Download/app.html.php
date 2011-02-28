<div class="content">
  <div class="main">
    <div class="mainareasplit">
        <h2><span></span>Download <?php echo ucfirst($this->appname)?></h2>
        <div class="horderelease">
            <h3>Current Stable Release</h3>
            <ul>
            <?php foreach ($this->stableapp as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>

            <h3>Current Development Release</h3>
            <ul>
            <?php foreach ($this->devapp as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>

            <?php if (!empty($this->deprapp)): ?>
            <h3>Deprecated Release</h3>

            <ul>
            <?php foreach ($this->deprapp as $val): ?>
                <li><?php echo $val ?></li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <h3>Obtaining Current Development Versions</h3>

            <p>The current development version of
            <?php echo htmlspecialchars($this->app_info['name'])?> is available via
            <a href="../../source/snapshots.php">nightly snapshots</a> and our
            <a href="../../source/git.php">git repository</a>.</p>

            <p>The H3 development version of
            <?php echo htmlspecialchars($this->app_info['name']) ?> is available via
            <a href="../../source/snapshots.php">nightly snapshots</a> and
            <a href="../../source/cvs.php">CVS</a>.</p>

            <?php if (count($this->app_info) > 1): ?>
            <h3>Obtaining Old Versions</h3>

            <p>Old versions can be obtained from one of our <a href="../../mirrors/">FTP Mirrors</a>.</p>
            <?php endif; ?>
        </div>
	</div>
    <div class="rightcol" style="background: none;">
        <?php echo $this->render('releasedAppsList');?>
    </div>
    <div class="clear"></div>
  </div>
</div>