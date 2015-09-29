<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <form action="/" method="post" id="<?php print $variables['block_html_id']; ?>" accept-charset="UTF-8">
    <div class="input-group">
      <label for="<?php print $variables['elements']['keys_1']['#id']; ?>" class="hidden">Search</label>
      <input 	placeholder="Search..." class="form-control form-text" type="text" value="" 
					id="<?php print $variables['elements']['keys_1']['#id']; ?>" 
					name="<?php print $variables['elements']['keys_1']['#name']; ?>" 
					size="<?php print $variables['elements']['keys_1']['#size']; ?>" 
					maxlength="<?php print $variables['elements']['keys_1']['#maxlength']; ?>" />
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default form-submit" id="edit-submit-1" name="op" >
          <?php print _bootstrap_icon('search'); ?>
        </button>
      </span>
    </div>
    <?php print $variables['elements']['base_1']['#children']; ?>
    <?php print $variables['elements']['id']['#children']; ?>
    <?php print $variables['elements']['form_build_id']['#children']; ?>
    <?php if (isset($variables['elements']['form_token'])): print $variables['elements']['form_token']['#children']; endif;?>
    <?php print $variables['elements']['form_id']['#children']; ?>
  </form>
</section>
