<?php

/**
 * Override or insert variables into the html template.
 */
function batter_preprocess_html(&$variables) {
  $variables['html_attributes_array'] = array();
  $variables['body_attributes_array'] = array();

  // HTML element attributes.
  $variables['html_attributes_array']['lang'] = $GLOBALS['language']->language;
  $variables['html_attributes_array']['dir'] = $GLOBALS['language']->direction ? 'rtl' : 'ltr';

  // Update RDF Namespacing
  if (module_exists('rdf')) {
    // Adds RDF namespace prefix bindings in the form of an RDFa 1.1 prefix
    // attribute inside the html element.
    $prefixes = array();
    foreach (rdf_get_namespaces() as $prefix => $uri) {
      $variables['html_attributes_array']['prefix'][] = $prefix . ': ' . $uri . "\n";
    }
  }
}

/**
 * Override or insert variables into the html template.
 */
function batter_process_html(&$variables) {
  // Flatten out html_attributes and body_attributes.
  $variables['html_attributes'] = drupal_attributes($variables['html_attributes_array']);
  $variables['body_attributes'] = drupal_attributes($variables['body_attributes_array']);
}

/**
 * Override or insert variables into the page template.
 */
function batter_preprocess_page(&$variables) {
  $variables['main_menu'] = array(
    '#theme_wrappers' => array('container'),
    '#attributes' => array(
      'id' => 'main-menu',
      'class' => 'navigation',
    ),
    'menu' => array(
      '#theme' => 'links__system_main_menu',
      '#links' => $variables['main_menu'],
      '#attributes' => array(
        'id' => 'main-menu-links',
        'class' => array('links', 'clearfix'),
      ),
      '#heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ),
  );

  $variables['copyright'] = array(
    '#markup' => '&copy; ' . date('Y') . '. diane michell cakes',
    '#theme_wrappers' => array('container'),
    '#attributes' => array(
      'id' => 'copyright',
    ),
  );
}

/**
 * Override or insert variables into the maintainance page template.
 */
function batter_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  batter_preprocess_html($variables);
}

/**
 * Override or insert variables into the maintainance page template.
 */
function batter_process_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  batter_process_html($variables);
}
