<?php

?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> spotlight"><div class="node-inner">


 	<div id="spotlight">
    	<h3 class='title'><?php print $title; ?></h3>

    	<?php print $node->content['body']['#value']; ?>
    </div>
</div></div> <!-- /node-inner, /node -->
