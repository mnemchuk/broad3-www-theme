<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <style type="text/css" media="print">@import "<?php print base_path() . path_to_theme() ?>/css/print.css";</style>
  <?php print $scripts; ?>
  <script language="javascript">
  	DATA_SERVER = "<?php echo $base_path;?>";
	
  </script>
  <!--[if lt IE 7]>
  <script type="text/javascript" src="<?php echo url(drupal_get_path('theme', 'broad3') . '/js/belatedpng.js') ?>"></script>
  <script type="text/javascript">
    DD_belatedPNG.fix(".masked-sibling");
  </script>									 
  <![endif]-->
</head>
<body class="<?php print $body_classes; ?>">

  <div id="page"><div id="page-inner">

    <div id="header"><div id="header-inner" class="clear-block">
        <div id="header-inner-content">

      <?php if ($logo || $site_name || $site_slogan): ?>
        <div id="logo-title">

          <?php if ($logo): ?>
            <div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo-image" /></a></div>
          <?php endif; ?>

          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <?php print $site_name; ?>
                </a>
              </strong></div>
            <?php else: ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <?php print $site_name; ?>
                </a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>

        </div> <!-- /#logo-title -->
      <?php endif; ?>

    <div id="search-box">
        <?php echo $google_search ?>
    </div> <!-- /#search-box -->
      <div id="primary">
        <?php print theme('links', $primary_links); ?>
      </div>

      <div id="secondary">
        <?php print menu_tree('secondary-links') ?>
      </div>

      <?php if ($header): ?>
        <div id="header-blocks" class="region region-header">
          <?php print $header; ?>
        </div> <!-- /#header-blocks -->
      <?php endif; ?>

    </div><!-- /#header-inner-content -->
      <div id="secondary-tabs" class="clear-block">
          <?php echo generateNavigationTabs() ?> 
      </div>
    </div></div> <!-- /#header-inner, /#header -->
    <div id="main"><div id="main-inner" class="clear-block<?php if ($navbar) { print ' with-navbar'; } ?>">
