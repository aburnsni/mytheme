<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php // dpm($node); ?>
  <?php if ($teaser) { ?>
    <div class="flyer flyer-<?php print $node->nid; ?>">
      <a href="<?php print $node_url; ?>">
        <img src="<?php print image_style_url('flyer_thumbnail',$node->field_image['und'][0]['uri']); ?>">
        <div class="flyer-title">
          <header><h3><?php print $title; ?></h3></header>
        </div>
      </a>
      <?php
        if (drupal_valid_path('node/' . $node->nid . '/edit')) {
          print l('Edit', 'node/' . $node->nid . '/edit');
        }
      ?>
    </div>
  <?php } else { ?>
    <div class="content"<?php print $content_attributes; ?>>
      <div class="col-sm-4">
        <div class="flyer">
        <a class="colorbox-load" href="<?php print file_create_url($node->field_image['und'][0]['uri']); ?>"
          title="<?php print $title; ?>">
          <img src="<?php print image_style_url('large',$node->field_image['und'][0]['uri']); ?>">
        </a>
        </div>
      </div>
      <div class="col-sm-8">
        <?php if ($node->body): ?>
          <div><?php print render($node->body['und'][0]['value']); ?></div>
        <?php endif; ?>
        <?php if ($node->field_file): ?>
          <div><strong>Download:&nbsp;</strong>
            <a href="<?php print file_create_url($node->field_file['und'][0]['uri']); ?>">
              <?php
                if ($node->field_file['und'][0]['description']) {
                  print render($node->field_file['und'][0]['description']);
                } else {
                  print render($node->field_file['und'][0]['filename']);
                }
              ?>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php print render($content['links']); ?>
  <?php } ?>
</div>
