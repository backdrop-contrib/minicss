<?php
/**
 * @file
 * Theme settings file
 */

function minicss_form_system_theme_settings_alter(&$form, $form_state) {
  $form['minicss'] = array(
    '#type' => 'vertical_tabs',
    '#weight' => -10,
  );
  
  $form['sticky'] = array(
    '#type' => 'fieldset',
    '#title' => t('Header and Footer'),
    '#group' => 'minicss',
  );
  $form['sticky']['sticky_header'] = array(
    '#prefix' => '<p>' . t("You can make your site's header and / or footer sticky by selecting options below") . '</p>',
    '#type' => 'checkbox',
    '#title' => t('Sticky header'),
    '#default_value' => theme_get_setting('sticky_header', 'minicss'),
  );
  $form['sticky']['sticky_footer'] = array(
    '#type' => 'checkbox',
    '#title' => t('Sticky footer'),
    '#default_value' => theme_get_setting('sticky_footer', 'minicss'),
  );

  $form['main_menu'] = array(
    '#type' => 'fieldset',
    '#title' => t('Main navigation menu'),
    '#group' => 'minicss',
  );
  $menus = menu_get_menus($all = TRUE);
  $form['main_menu']['top_right'] = array(
    '#type' => 'select',
    '#title' => t('Main navigation menu'),
    '#default_value' => theme_get_setting('top_right', 'minicss'),
    '#description' => t('Select which one of menus should be used as main navigation (opens by top right "hamburger" icon)'),
    '#options' => $menus,
  );
  
  $form['flavors'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color schemes'),
    '#group' => 'minicss',
  );
  $form['flavors']['flavor'] = array(
    '#type' => 'select',
    '#default_value' => theme_get_setting('flavor', 'minicss'),
    '#options' => array(
      'default' => t('Default'),
      'dark' => t('Dark'),
      'nord' => t('Nord'),
    ),
    '#suffix' => '<p><b>mini.css </b>' . t('comes with a few prebuild flavors out of the box, so you can get started without having to finetune every little aspect of your CSS framework') . '</p>',
  );
  
  $form['debug'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme debug'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'minicss',
  );
  $form['debug']['enable'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable debug output'),
    '#default_value' => config_get('system.core', 'theme_debug'),
    '#element_validate' => array('_theme_debug_settings'),
    '#description' => t('Output theme debugging information to source code of page - do not forget to disable this on a live site!'),
  );
}

function _theme_debug_settings($element) {
  config_set('system.core', 'theme_debug', $element['#value']);
}
