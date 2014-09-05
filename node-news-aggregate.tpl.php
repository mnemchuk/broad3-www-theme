<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/05/12 18:41:54 johnalbin Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-type-news-aggregate"><div class="node-inner">

  <?php print $picture; ?>
  <?php if($images && !empty($images) && $images != ''): ?>
    <div class='images'>
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $images; ?></a>
    </div>
  <?php endif;//images ?>
  <div class="news-item-info">
      <?php if (!$page): ?>
        <h2 class="title">
          <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
        </h2>
      <?php endif; ?>
      <div class='formatted-date'>
      <?php
        print $formatted_date;
      ?> 
      </div>
      

      <div class="content">
        <?php if($node->field_front_page[0]['safe']){
        	print strip_tags($node->field_front_page[0]['safe'], "b,strong,i");
		}else{
			print broad3_truncateNicely($node->content['body']['#value'], 450);
        } ?>
      </div>

      <a class='read-more' href='<?php print($node_url); ?>'>Read Full Story</a>
  </div>
  <div style='clear:both;'></div>
</div></div> <!-- /node-inner, /node -->
