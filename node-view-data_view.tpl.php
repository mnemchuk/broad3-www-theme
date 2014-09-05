<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"><div class="node-inner">

  <?php print $picture; ?>

  <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print url($node_url); ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>


</div></div> <!-- /node-inner, /node -->
