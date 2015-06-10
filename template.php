<?php

/**
 * @file
 * template.php
 */
/**
 * Add navbar classes to menu tree
 */
function fleming_menu_tree($variables) {
   return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';
}

/**
 * Overrides theme_menu_link().
 */
function fleming_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      // Generate as standard dropdown.
      $element['#title'] .= ' <span class="caret"></span>';
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
      $element['#localized_options']['attributes']['data-target'] = '#';
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  // Add number class to parent items
  static $item_id = 0;
  if ($element['#original_link']['depth'] == 1 && $element['#original_link']['menu_name'] == variable_get('menu_main_links_source', 'main-menu')) {
    $element['#attributes']['class'][] = 'menu-item-' . (++$item_id);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Add group classes to parents menublock
 */
function fleming_menu_tree__menu_block__2($variables) {
   return '<ul class="list-group">' . $variables['tree'] . '</ul>';
}

/**
 * Overrides theme_menu_link().
 */
function fleming_menu_link__menu_block__2(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  $element['#attributes']['class'][] = 'list-group-item';
  
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}







// Add img-circle class to Video Thumbnails

function fleming_preprocess_image(&$variables) {
    if(isset($variables['style_name'])) {
        if($variables['style_name'] == 'gallery_cover_small') {
            $variables['attributes']['class'][] = "img-circle";
            if(isset($variables['attributes']['title']) {
                $variables['attributes']['alt'] = $variables['attributes']['title'];
            }
        }
    }
}
