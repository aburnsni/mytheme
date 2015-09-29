<?php

/**
 * @file
 * Default theme implementation to display a node.
 */
global $base_url;
?>
<?php if(user_access('edit any department_description content') || user_access('edit own department_description content')): ?>
     <ul class="tabs--primary nav nav-tabs">
        <li class="active"><a href="<?php print $base_url; ?>/taxonomy/term/<?php print $field_department['und'][0]['tid']; ?>" role="button">View<span class="element-invisible">(active tab)</span></a></li>
        <li class=""><a href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit" role="button">Edit</a></li>
    </ul>
<?php endif; ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
