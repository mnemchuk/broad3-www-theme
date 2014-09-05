<?php

/**
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_user().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
    <div class="node-inner">
        <?php global $base_url ?>
        <?php if($teaser): ?>
            <h2>
                <a href="<?php echo $node_url ?>"><?php echo $title ?></a>
            </h2>
        <?php endif ?>
        <div class="node-info">
            <a
                href="<?php echo $base_url . '/blog_roll/' . $node->name ?>"
            ><?php echo $full_name ?></a>,
            <span><?php echo $formatted_date ?></span> 
            <?php if ($terms): ?>
                <span class="separator">|</span>
                Filed under
                <?php echo $terms ?>
            <?php endif ?>
        </div>
        <div class="blog-entry-data clear-block">
               <?php if($teaser):?> 
					<?php if ($node->field_image): ?>
		                <?php echo $node->field_image[0]['view'] ?>
		            <?php endif ?>
				<?php else: ?>
					<?php if($node->field_image): ?>
					<div class='images node-image-container'>
				    	<ul class="image-container">
				    	<?php
						foreach($node->field_image as $image){
							if($image["data"]["description"] != "Header Graphic"){?>
								<li>
									<?php //print theme('imagecache', 'large', $image["filepath"], '', '');?>
									<?php echo $image["view"]?>
									<?php if($image["data"]["description"] != ""){?><p><?php print $image["data"]["description"];?></p><?php }?>
								</li>
							<?php }
						}
						?>
					   	</ul>
				    </div>
					<?php endif ?>
				<?php endif ?>
			
            <div><?php echo $content ?></div>
        </div>
        <div class="node-info clear-block">
            <div class="comment-share">
                <?php if ($show_share_this): ?>
                	<?php echo $share_this ?>
                <?php endif ?>
                <a
                    class="comments-link right"
                    href="<?php echo $node_url ?>#comments"
                ><?php echo $comment_count ?> Comments</a>
            </div>
            <?php if($teaser): ?>
                <a href="<?php echo $node_url ?>" class="read-more">Read More</a>
            <?php else: ?>
                <span>&nbsp;</span>
            <?php endif ?>
        </div>
    </div>
</div>
