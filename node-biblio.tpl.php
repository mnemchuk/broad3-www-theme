<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/05/12 18:41:54 johnalbin Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> biblio-details"><div class="node-inner">

  <div class="content">
    <?php print $node->content['body']['#value']; ?>
  </div>
  <div class='comment-share'>
	<?php echo $share_this ?>
    <div>&nbsp;</div>
  </div>
 

</div></div> <!-- /node-inner, /node -->
