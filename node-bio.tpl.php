<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"><div class="node-inner">

  <?php print $picture; ?>

  <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
    
  <?php endif; ?>
  <div class='node-info'>
        <?php echo $node->field_professional_title[0]['safe'] ?> 
  </div>
  <div class='node-image'><?php print theme('imagecache', 'board_profile_details', $field_photo[0]['filepath']); ?></div>
  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <div class="content">
    <?php print $node->field_research[0]['safe']; ?>
  </div>
  <div class="clear"></div>
  <div class='comment-share'>
  	<?php echo $share_this; ?>
    <div>&nbsp;</div>
  </div>
 

</div></div> <!-- /node-inner, /node -->
