<?php

/**
 * @file
 * template.php
 */

/**
 * Add navbar classes to menu tree
 */
function fleming_menu_tree__main_menu($variables) {
       return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';
}
function fleming_menu_link__main_menu(array $variables) {
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
 * Add group classes to departments submnenu
 */
function fleming_menu_tree__menu_block__1($variables) {
    return '<ul class="nav nav-pills nav-stacked">' . $variables['tree'] . '</ul>';
}
function fleming_menu_link__menu_block__1(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';

    if ($element['#below']) {
        // Add our own wrapper.
        unset($element['#below']['#theme_wrappers']);
        // Generate as standard dropdown.
        $element['#title'] .= ' <span class="glyphicon glyphicon-triangle-right"></span>';
        $element['#attributes']['class'][] = 'dropdown';
        $element['#localized_options']['html'] = TRUE;
    }
    // On primary navigation menu, class 'active' is not set on active menu item.
    // @see https://drupal.org/node/1896674
    if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
        $element['#attributes']['class'][] = 'active';
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . "</li>\n";
}

/**
 * Add group classes to parents menublock
 */
/*
function fleming_menu_tree__menu_block__2($variables) {
    return '<ul class="list-group">' . $variables['tree'] . '</ul>';
}
function fleming_menu_link__menu_block__2(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';
    $element['#attributes']['class'][] = 'list-group-item';

    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
*/
function fleming_menu_tree__menu_block__2($variables) {
    return '<div class="list-group">' . $variables['tree'] . '</div>';
}
function fleming_menu_link__menu_block__2(array $variables) {
    $element = $variables['element'];
    $element['#attributes']['class'][] = 'list-group-item';
    $output = l($element['#title'], $element['#href'], array('attributes' => $element['#attributes']));
    return $output . "\n";
}


/**
 * Add group classes to parents menublock
 */
function fleming_menu_tree__menu_block__3($variables) {
    return '<ul class="nav nav-pills nav-stacked">' . $variables['tree'] . '</ul>';
}
function fleming_menu_tree__user_menu($variables) {
    return '<ul class="nav nav-pills nav-stacked">' . $variables['tree'] . '</ul>';
}

/*function fleming_menu_link__menu_block__3(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';
    $element['#attributes']['class'][] = 'list-group-item';

    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
*/

// Add img-circle class to Video/Gallery Thumbnails and add Alt text to match Title
function fleming_preprocess_image(&$variables) {
    if(isset($variables['style_name'])) {
        if($variables['style_name'] == 'gallery_cover_small') {
            $variables['attributes']['class'][] = "img-circle";
        }
        if($variables['style_name'] == 'node_gallery_thumbnail') {
            $variables['attributes']['class'][] = "img-thumbnail";
        }
        if(isset($variables['attributes']['title'])) {
            $variables['attributes']['alt'] = $variables['attributes']['title'];
        }
    }
}

function fleming_preprocess_page(&$variables) {
    // Set column widths
    if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
        $variables['content_column_class'] = ' class="col-sm-6 col-sm-pull-3"';
        $variables['sidebar_first_column_class'] = ' class="col-sm-3 col-sm-push-6"';
        $variables['sidebar_second_column_class'] = ' class="col-sm-3"';
    }
    elseif (!empty($variables['page']['sidebar_first']) && empty($variables['page']['sidebar_second'])) {
        $variables['content_column_class'] = ' class="col-sm-9 col-sm-pull-3"';
        $variables['sidebar_first_column_class'] = ' class="col-sm-3 col-sm-push-9"';
        $variables['sidebar_second_column_class'] = ' class="col-sm-3"';
    }
    elseif (empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
        $variables['content_column_class'] = ' class="col-sm-9"';
        $variables['sidebar_first_column_class'] = ' class="col-sm-3"';
        $variables['sidebar_second_column_class'] = ' class="col-sm-3"';
    }
    else {
        $variables['content_column_class'] = ' class="col-sm-12"';
    }
}

function fleming_form_imce_upload_form_alter(&$form, &$form_state, $form_id) {
        if (isset($form['fset_upload']['thumbnails'])) {
            $options = $form['fset_upload']['thumbnails']['#options'];
            foreach ($options as $key => $value) {
                $default_value[$key] = $key;
            };
            $form['fset_upload']['thumbnails']['#default_value'] = $default_value;
            $form['fset_upload']['thumbnails']['#disabled'] = TRUE;
 //           $form['fset_upload']['thumbnails']['#attributes']['class'][] = 'hidden-form-item';
        }
}

function fleming_form_alter(&$form, &$form_state, $form_id) {
//  print '<pre>';
//    print_r($form);
//    print '</pre>';
//    $form['keys_1']['#attributes']['placeholder'] = "Search...";
}

/*
** Alter rendering of taxonomt terms
*/
/**
 * Implements theme_field__field_tags().
 */
function fleming_field__field_department(&$variables) {
  $output = '';

  // Render the label if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $index = 0;
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even') . (!$index ? ' first' : '');
    $output .= ($index ? '' : '') . '<button class="btn btn-primary btn-xs ' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</button>';
    $index++;
  }
  $output .= '</div>';

  // Render the top-level div.

  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}
