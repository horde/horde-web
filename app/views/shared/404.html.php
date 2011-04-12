<div class="content">
  <div class="main">
    <div class="mainareasplit">
      <h2><span></span>This is not the page you were looking for
      <small>[error 404]</small></h2>

      <p>This is one of those annoying Error 404 pages, which basically means
      that one of the following things has happened:</p>
      <ul>
        <li>You've followed a link from a site which is no longer working
        (maybe they typed the link wrong or maybe we moved the page from the
        place they originally linked to).</li>
        <li>You've slightly mis-typed the address.</li>
        <li>Some other bizarre scenario that involves a page or file disappearing
        that we couldn't think of.</li>
      </ul>
      <p>Basically, the page or file isn't here. Here are some of our more
      interesting links. Hopefully what you seek may be found there.</p>

      <p>Happy Hunting</p>

      <ul>
        <li><?php echo $this->linkTo('Community', array('controller' => 'community'))?>
        - Our community section. Here you will find information about the
        Horde Project and the people that make it what it is.</li>

        <li><?php echo $this->linkTo('Development', array('controller' => 'development'))?>
        - Our development section. Here you will find information about coding
        with our libraries or accessing our source code.</li>

        <li><?php echo $this->linkTo('Support', array('controller' => 'support'))?>
        - Here you will find various support options.</li>
      </ul>

    </div>
    <div class="clear"></div>
  </div>
</div>
