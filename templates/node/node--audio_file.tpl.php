<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

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
      hide($content['field_audio']);
      hide($content['field_barcode']);
      print "<div class='col-xs-12 col-sm-8'>";
      if ($node->field_audio['und'][0]['description']) {
        print "<div class='lead'>".$node->field_audio['und'][0]['description']."</div>";
      }
      print render($content['field_audio']);
      print "</div>";
      print "<div class='col-xs-12 col-sm-4 text-center'>";
      print render($content['field_barcode']);
      print "</div>";
//print "<pre>";
//print_r ($node);
//print "</pre>";
//      print render($content);

    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
