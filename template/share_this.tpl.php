<?php
$base_path = path_to_theme('broad3');

?>
<div class="share-this-container">
    <a class="share-this-link" href="#">Share This</a>
    <div class="share-this-outer">
        <div class="share-this-inner">
            <input
                class="close-share-this"
                type="image"
                width="14"
                height="14"
                src="<?php echo url($base_path . '/img/popup-close.png') ?>"
            />
            <ul class="share-this-list">
                <?php	
              
               foreach($share_this_data as $item){
    /*echo '<li><div class="share-icon '.$item['iconClass'].'"></div>'.l($item['label'], $item['href'], array('attributes' => array('target' => '_blank'))) .'</li>';	
     */
		    echo '<li><a href="'.$item['href'].'" target="_blank"><img src="/'.$base_path.'/img/'.$item['iconClass'].'.png"/>'. $item['label'].'</a></li>';
		    $shareurl=urldecode($item['shareUrl']);

                }?>



<li>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	   var js, fjs = d.getElementsByTagName(s)[0];
	   if (d.getElementById(id)) return;
	   js = d.createElement(s); js.id = id;
	   js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	   fjs.parentNode.insertBefore(js, fjs);
	 }(document, 'script', 'facebook-jssdk'));</script>
	 <div class="fb-like" data-send="false" data-href="<?php echo $shareurl?>"  data-layout="button_count" data-width="100" data-show-faces="false" data-font="verdana" style="padding-bottom:3px;"></div>



</li>
<li><a href="https://twitter.com/share" class="twitter-share-button"  data-url="<?php echo $shareurl?>">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</li

<li>
<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-counter="right" data-url="<?php echo $shareurl?>"></script>
</li>
<li>
<!-- Place this tag where you want the +1 button to render -->

<div class="g-plusone" data-size="medium" data-href="<?php echo $shareurl?>"></div>

<!-- Place this render call where appropriate -->
<script type="text/javascript">
    (function() {
      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
      po.src = 'https://apis.google.com/js/plusone.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
</script>
</li>
            </ul>
        </div>
    </div>
</div>
