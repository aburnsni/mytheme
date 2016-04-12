<?php

/**
 * Implements hook_panels_layouts()
 */
function fleming_3col_4_4_4_panels_layouts() {
  $items['3col_4_4_4'] = array(
    'title' => t('3 column 4 4 4'),
    'category' => t('Custom Layouts'),
    'icon' => '3col_4_4_4.png',
    'theme' => '3col_4_4_4',
    //'css' => 'panel-cusom.css', // Optional CSS
    'regions' => array(
      'top' => t('Top'),
      'left' => t('Left'),
      'center' => t('Center'),
      'right' => t('Right'),
      'bottom' => t('Bottom'),
    ),
  );
  return $items;
}

