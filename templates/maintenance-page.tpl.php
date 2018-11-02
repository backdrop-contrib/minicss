<?php
/**
 * @file
 * minicss theme implementation to display a single Backdrop page while offline.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 *
 * @ingroup themeable
 */
?>
<!DOCTYPE html>
<html<?php print backdrop_attributes($html_attributes); ?>>

<head>
  <?php print backdrop_get_html_head(); ?>
  <title><?php print $head_title; ?></title>
  <?php print backdrop_get_css(); ?>
  <?php print backdrop_get_js(); ?>
</head>
<body class="<?php print implode(' ', $classes); ?>">
  <div class="l-container">

    <header class="l-header row" role="banner">
      <div class="l-header-inner col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
        <div class="row">
          <?php if ($logo): ?>  
          <div class="col-sm-2 col-md-1">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="logo">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          </div>
          <div class="col-sm-9 col-md-10 site-details">
          <?php else: ?>  
          <div class="col-sm-11 col-md-11 site-details">
          <?php endif; ?>
          <?php if ($site_name || $site_slogan): ?>
            <?php if ($site_name): ?>
              <a class="site-name logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
              <span class="site-slogan"><?php print $site_slogan; ?></span>
            <?php endif; ?>
          <?php endif; ?>
          </div> 
          <div class="col-sm-1 col-md-1"> </div>    
        </div>     
      </div>
    </header>
    <div class="l-wrapper col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
      <div class="l-wrapper-inner container">
        <div class="l-middle row">    
          <main class="l-content col-md-9 col-sm-12" role="main">
            <?php if (!empty($title)): ?>
              <h1><?php print $title; ?></h1>
            <?php endif; ?>
            <?php if (!empty($messages)): print $messages; endif; ?>
            <?php print $content; ?>
          </main>

          <?php if ($sidebar): ?>
          <div class="l-sidebar l-sidebar-first col-md-3 col-sm-12">
            <?php print $sidebar ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
   
    <?php if (!empty($footer)): ?>
      <footer class="l-footer" role="footer">
        <div class="l-footer-inner container col-md-offset-1 col-lg-offset-1">
        <?php print $footer; ?>
        </div>
      </footer>
    <?php endif; ?>
  </div>
</body>
</html>
