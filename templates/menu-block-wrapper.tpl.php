<?php
/**
 * @file
 * Default theme implementation to wrap menu blocks.
 *
 * Available variables:
 * - $content: The renderable array containing the menu.
 * - $classes: A string containing the CSS classes for the DIV tag. Includes:
 *   menu-block-DELTA, menu-name-NAME, parent-mlid-MLID, and menu-level-LEVEL.
 * - $classes_array: An array containing each of the CSS classes.
 *
 * The following variables are provided for contextual information.
 * - $delta: (string) The menu_block's block delta.
 * - $config: An array of the block's configuration settings. Includes
 *   menu_name, parent_mlid, title_link, admin_title, level, follow, depth,
 *   expanded, and sort.
 *
 * @see template_preprocess_menu_block_wrapper()
 */
?>
<div class="sidebar-nav">
  <div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="visible-xs navbar-brand">Department menu</span>
    </div>
    <div class="<?php print $classes; ?> navbar-collapse collapse sidebar-navbar-collapse">
      <?php print render($content); ?>
    </div>
  </div>
</div>
