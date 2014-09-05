<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"><div class="node-inner">

 

  <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
    
  <?php endif; ?>


  
<?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>






<div class="content">


   <div class='bio'> <?php print $field_photo[0]["view"];?>
 </div>


   <?php print $node->content['body']['#value']; ?>
    <?php 
    if($node->field_rpapers[0]['value'] != "" && $node->field_rpapers[0]['value'] != "<br/>" && $node->field_rpapers[0]['value'] != "<br />"){
  
      print "<b>Select Publications</b>";

      print $node->content['field_rpapers']['#children']; 
    }
?>

  <?php 
  if ($node->field_updateddate[0]['value'] !=""){
    print "<span id='updateddate'>Last updated date: ";
    print $node->field_updateddate[0]['value'];
    print "</span>";
  }
 ?> 
  </div>



  <div class="clear"></div>
  <div class='comment-share'>
  	<?php echo $share_this; ?>
    <div>&nbsp;</div>
  </div>
 

</div></div> <!-- /node-inner, /node -->
