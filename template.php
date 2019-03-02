<?php
/**
 * Implements hook_css_alter().
 */
function minicss_css_alter(&$css) {
  // Remove unwanted core css
  $exclude = array(
    'core/modules/system/css/system.css' => FALSE,
    'core/modules/system/css/system.theme.css' => FALSE,
    'core/misc/normalize.css' => FALSE,
    'core/modules/layout/css/grid-flexbox.css' => FALSE,
    'core/modules/system/css/menu-dropdown.theme.css' => FALSE,
    'core/modules/system/css/menu-toggle.theme.css' => FALSE,
    'core/misc/smartmenus/css/sm-core-css.css' => FALSE,
  );
  
  $css = array_diff_key($css, $exclude);
  
  // Add css files
  $subset = theme_get_setting('flavor', 'minicss');
  $flavor = backdrop_get_path('theme', 'minicss') . '/css/dist/mini-' . $subset . '.min.css';
  $css[$flavor] = array(
    'data' => $flavor,
    'type' => 'file',
    'every_page' => TRUE,
    'media' => 'all',
    'preprocess' => TRUE,
    'group' => CSS_DEFAULT,
    'browsers' => array('IE' => TRUE, '!IE' => TRUE),
    'weight' => -5,
  );
  
  $styles = backdrop_get_path('theme', 'minicss') . '/css/styles.css';
  $css[$styles] = array(
    'data' => $styles,
    'type' => 'file',
    'every_page' => TRUE,
    'media' => 'all',
    'preprocess' => TRUE,
    'group' => CSS_DEFAULT,
    'browsers' => array('IE' => TRUE, '!IE' => TRUE),
    'weight' => -3,
  );
  
  $custom = backdrop_get_path('theme', 'minicss') . '/css/custom.css';
  $css[$custom] = array(
    'data' => $custom,
    'type' => 'file',
    'every_page' => TRUE,
    'media' => 'all',
    'preprocess' => TRUE,
    'group' => CSS_DEFAULT,
    'browsers' => array('IE' => TRUE, '!IE' => TRUE),
    'weight' => -1,
  );
}

/**
 * Implements hook_js_alter().
 */
function minicss_js_alter(&$javascript) {
  // Remove unwanted core js
  $exclude = array(
    'core/modules/layout/js/grid-fallback.js' => FALSE,
    'core/modules/system/js/menus.js' => FALSE,
    'core/misc/smartmenus/jquery.smartmenus.combined.js' => FALSE,
  );
  
  $javascript = array_diff_key($javascript, $exclude);
}

/**
 * Returns HTML for a breadcrumb trail.
 *
 * @param $variables
 *   An associative array containing:
 *   - breadcrumb: An array containing the breadcrumb links.
 */

function minicss_breadcrumb($variables) {

  if (backdrop_is_front_page()) {
    return;
  }
  
  $breadcrumb = $variables['breadcrumb'];
  $output = '';
  if (!empty($breadcrumb)) {
    $output .= '<nav role="navigation" class="breadcrumb">';
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output .= '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<ol><li>' . implode('<span class="divider"> » </span></li><li>', $breadcrumb) . '</li></ol>';
    $output .= '</nav>';
  }
  return $output;
}

/**
 * Implements hook_preprocess_header().
 */
function minicss_preprocess_header(&$variables) {
  $selected = theme_get_setting('top_right', 'minicss');
  $menu = menu_tree($selected);
  $tr_menu = backdrop_render($menu);
  $variables['tr_menu'] = $tr_menu;
}

/**
 * Implements hook_form_alter().
 */
function minicss_form_alter(&$form, &$form_state, $form_id) {
  // force using class 'primary' for any primary action button
  $form['actions']['submit']['#attributes']['class'][] = 'primary';
}

/**
 * Implements hook_preprocess_layout().
 */
function minicss_preprocess_layout(&$variables) {
  $variables['sticky_header'] = theme_get_setting('sticky_header', 'minicss') ? ' sticky' : '';
  $variables['sticky_footer'] = theme_get_setting('sticky_footer', 'minicss') ? ' sticky' : '';
}