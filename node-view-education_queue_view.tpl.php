<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/05/12 18:41:54 johnalbin Exp $

?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"><div class="node-inner">

  <?php print $picture; ?>
  
  <?php if($images && !empty($images) && $images != ''): ?>
    <div class='images'>
      <?php print $images; ?>
    </div>
  <?php endif;//images ?>
  
  <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>

  <div class="content">
    <?php if($node->field_front_page[0]['safe'] != "" && $node->field_front_page[0]['safe'] != "<br />" && $node->field_front_page[0]['safe'] != "<br />
"){
    	print $node->field_front_page[0]['safe'];
		//print $node->field_summary[0]['safe'];	
    } else{
    	print node_teaser($node->content['body']['#value'], NULL, 300);
    }
	 ?>
    <?php  ?>
  </div>
  <div class='node-info'>
   <?php echo $share_this ?>
   <a class='read-more' href='<?php print($node_url); ?>'>Learn more</a>
  </div>
  <div class='news-divider'></div>
</div></div> <!-- /node-inner, /node -->
