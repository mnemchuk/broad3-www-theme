<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/05/12 18:41:54 johnalbin Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> news-details"><div class="node-inner">

  <?php print $picture; ?>

  <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php if ($node->field_video_embed[0]['value'] != ""): ?>
  <div class="video-embed">
  	<embed src="http://www.broadinstitute.org/mediaplayers/jw/player.swf"
		width="512"
		height="317"
		bgcolor="undefined"
		allowscriptaccess="always"
		allowfullscreen="true"
		flashvars="file=<?php echo $node->field_video_embed[0]['value']?>.flv&streamer=rtmp://vstream.broadinstitute.org/simplevideostreaming&dock=false&image=<?php echo $node->field_video_embed[0]['value']?>.jpg"
	/>
  </div>
  <?php if ($node->field_video_caption[0]['value'] != ""): ?>
  <div class="video-caption">
  		<?php echo $node->field_video_caption[0]['value']?>
  </div>
  <?php endif; ?>
  <?php endif; ?>
  <div class='node-info'>
        By <?php echo $node->field_author[0]['safe'] ?>,
    	<span><?php echo $formatted_date; ?></span>   
  </div>
  <?php if($images): ?>
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
	<!--
    <div class='images'>
      <?php //print $images; ?>
    </div>
	-->
  <?php endif;//images ?>
  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <div class="content">
    <?php print $node->content['body']['#value']; ?>
    <?php 
		if($node->field_rpapers[0]['value'] != "" && $node->field_rpapers[0]['value'] != "<br/>" && $node->field_rpapers[0]['value'] != "<br />
"){
			echo $node->content['field_rpapers']['#children']; 
		}
	?>
  </div>
  <div class='comment-share'>
	<?php if ($show_share_this): ?>
		<?php echo $share_this ?>
	<?php endif ?>
    <div>&nbsp;</div>
  </div>
 

</div></div> <!-- /node-inner, /node -->
