<?php
/**
 * @file
 * Template for a 4 column panel layout.
 */
?>
<?php !empty($css_id) ? print '<div id="' . $css_id . '">' : ''; ?>
<?php if (!empty($content['top'])) : ?>
  <div class="row">
   <?php print $content['top']; ?>
  </div>
<?php endif; ?>
 <?php
    $panelcontent = array ($content['first'],$content['second'],$content['third'],$content['fourth']);
    $panelcontentfilled = array_values(array_filter($panelcontent));
  ?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <?php if (@$panelcontentfilled[0]):
        print $panelcontentfilled[0];
        endif; ?>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <?php if (@$panelcontentfilled[1]):
        print $panelcontentfilled[1];
        endif; ?>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <?php if (@$panelcontentfilled[2]):
        print $panelcontentfilled[2];
        endif; ?>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <?php if (@$panelcontentfilled[3]):
        print $panelcontentfilled[3];
        endif; ?>
    </div>
  </div>
<?php if (!empty($content['bottom'])) : ?>
  <div class="row">
    <?php print $content['bottom']; ?>
  </div>
<?php endif; ?>
<?php !empty($css_id) ? print '</div>' : ''; ?>
