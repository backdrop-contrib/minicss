<?php
/**
 * @file
 * Display generic site information such as logo, site name, etc.
 *
 * Available variables:
 *
 * - $base_path: The base path of the Backdrop installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $front_page: The URL of the front page. Use this instead of $base_path, when
 *   linking to the front page. This includes the language domain or prefix.
 * - $site_name: The name of the site, empty when display has been disabled.
 * - $site_slogan: The site slogan, empty when display has been disabled.
 * - $tr_menu: Top right menu selected for the header, as an HTML string.
 */
?>
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

  <div class="col-sm-1 col-md-1">    
    <div class="drawer-box">
      <label for="drawer-control" class="button drawer-toggle persistent"></label>
      <input type="checkbox" id="drawer-control" class="drawer persistent">
      <div>
        <label for="drawer-control" class="drawer-close"></label>
        <nav class="main">
          <?php print $tr_menu; ?>
        </nav>  
      </div>
    </div>
  </div>    
</div>    
