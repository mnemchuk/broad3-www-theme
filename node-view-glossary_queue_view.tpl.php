<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> software-archive-node"><div class="node-inner">

    <h2 class="title">
    	<a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
    <div class="content">
    	<?php print $node->field_definition[0]['safe']; ?>
    </div>
	<div class="clear"></div>
</div></div> <!-- /node-inner, /node -->