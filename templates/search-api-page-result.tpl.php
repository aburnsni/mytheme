<?php
/**
 * @file
 * Default theme implementation for displaying a single search result.
 */
?>
<li class="search-result">
  <h3 class="title">
   <?php print $url ? l($title, $url['path'], $url['options']) : check_plain($title); ?>
  </h3>
   <?php //print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
  <div class="search-snippet-info">
    <?php if ($snippet) : ?>
      <p class="search-snippet"><?php print $snippet; ?></p>
    <?php endif; ?>
    <?php if ($info) : ?>
      <p class="search-info"><?php print $info; ?></p>
    <?php endif; ?>
  </div>
</li>
