<?php

//die("images = $images");
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"><div class="node-inner">

  	<?php if($images): ?>
    <div class='images'>
      <?php print $images; ?>
    </div>
    <?php endif;//images ?>
    <h2 class="title">
    	<a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
    <div class="content">
    	<?php print $content; ?>
    </div>
	<div class='jump_menu'>
    	<?php echo $jump_menu; ?>
    </div>
    <a href='<?php print $node_url; ?>' class='see-all'>
    
    </a>

</div></div>