<?php

/**
 * @file
 * template.php
 */
function mytheme_menu_tree($variables) {
   return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';
}


/*
function mytheme_menu_link($variables) {
 $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  static $item_id = 0;
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);  
  $num_top_level_children = count(menu_tree_page_data('main-menu'));
  if($item_id < $num_top_level_children) {
  return '<li id="custom-menu-item-id-' . (++$item_id) . '"' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
  }
  else {
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
  }
}
*/
