<?php
/**
 * Department Menu template override
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
