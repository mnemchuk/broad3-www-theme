<?php include dirname(__FILE__) . '/header.php' ?>
	<?php if ($navbar): ?>
        <div id="navbar"><div id="navbar-inner" class="clear-block region region-navbar">
          <a name="navigation" id="navigation"></a>
          <?php print $navbar; ?>
        </div></div>
      <?php endif; ?>
      <div class="breadcrumb-outer">
          <?php echo $breadcrumb ?>
      </div>
      <?php if ($left): ?>
        <div id="sidebar-left"><div id="sidebar-left-inner" class="region region-left">
          <?php print $left; ?>
        </div></div>
      <?php endif; ?>

      <?php if ($right): ?>
        <div id="sidebar-right"><div id="sidebar-right-inner" class="region region-right">
          <?php print $right; ?>
        </div></div>
      <?php endif; ?>
      <div id="content"><div id="content-inner">

        <?php if ($content_top): ?>
          <div id="content-top" class="region region-content_top">
            <?php print $content_top; ?>
          </div> 
        <?php endif; ?>

        <?php if ($title || $tabs || $help || $messages): ?>
          <div id="content-header">
		    <h1 class="title">
		 	   Scientific Publications
		    </h1>
		    <div class="biblio-advance-search">&lt; Back to <?php echo l('Publications', 'publications')?></div>
            <?php if ($title): ?>
              <h2 class="title"><?php print $title; ?></h2>
            <?php endif; ?>
            <?php if ($tabs): ?>
              <div class="tabs details"><?php print $tabs; ?></div>
            <?php endif; ?>
            <?php print $help; ?>
          </div>
        <?php endif; ?>

        <div id="content-area">
          <?php print $content; ?>
        </div>

        <?php if ($content_bottom): ?>
          <div id="content-bottom" class="region region-content_bottom">
            <?php print $content_bottom; ?>
          </div>
        <?php endif; ?>

      </div></div>      

<?php include dirname(__FILE__) . '/footer.php' ?>
