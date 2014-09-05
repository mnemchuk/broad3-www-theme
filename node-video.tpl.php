<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/05/12 18:41:54 johnalbin Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> video-details"><div class="node-inner">

  <?php print $picture; ?>

  <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php if ($node->field_video_embed[0]['value'] != ""): ?>

 

<script type='text/javascript' src='/mediaplayers/jw/jwplayer.js'></script>

<div id='mediaplayer' class="video-embed"></div>

<script type="text/javascript">
    jwplayer('mediaplayer').setup({
	'flashplayer': '/mediaplayers/jw/player.swf',
	  'id': 'playerID',
	  'width': '635',
	  'height': '357',
	  'file': "<?php echo $node->field_video_embed[0]['value']?>",
	  'streamer':'rtmp://vstream.broadinstitute.org/simplevideostreaming',
	  'dock':'false',
	  'image':"/<?php echo $node->field_image[0]['filepath']?>",
	  'controlbar.position':'over',
	  'plugins': 'gapro',
	  'gapro.idstring':"video-node-<?php print $node->nid; ?>",
	  'gapro.trackstarts': true,
	  'gapro.trackseconds': true,
	  'gapro.accountid':'UA-17042794-1'
	  });
</script>



  <?php if ($node->field_video_caption[0]['value'] != ""): ?>
  <div class="video-caption">
  		<?php echo $node->field_video_caption[0]['value']?>
  </div>
  <?php endif; ?>
  <?php endif; ?>
 
  
  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <div class="content">
    <?php print $node->content['body']['#value']; 

  print $field_newsurls_rendered;

/*print $field_otherurls_rendered;*/

?>
 
  <?php if($node->field_otherurls && count($node->field_otherurls[0]['url'])>0 ):
    /*print "<pre>"; print_r($node->field_otherurls); print "</pre>";*/
    print "<div class='otherlinks'>Also available on &nbsp;";
    foreach ($node->field_otherurls as $otherurl){
      /*print "<pre>"; print_r($otherurl);print "</pre>"; */
      if (strtolower($otherurl['display_title'])=="youtube"):
	print "<a href='".$otherurl["display_url"]."' target='_blank'><img src='/".path_to_theme()."/img/youtube-16.png' /></a> ";
      elseif (strtolower($otherurl['display_title'])=="itunes"):
	print "<a href='".$otherurl["display_url"]."' target='_blank'><img src='/".path_to_theme()."/img/itunes-16.png' /></a> ";
      else:
	print "<a href='".$otherurl["display_url"]."' target='_blank' class='iconizeurl'>".$otherurl['display_title']."</a> ";
    
      endif;
     
       
	}
print "</div>";
    endif;  ?>

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
