<?php
	if(isset($images)  && isset($images[0]['filepath'])):
?>
<ul class='image-container'>
	<?php
		foreach($images as $image){
			echo '<li><div class="masked-sibling"></div>'.theme('imagecache', $preset, $image['filepath']). 
						((isset($image['data']['description']) && strlen($image['data']['description']) > 0) ? '<p>'.$image['data']['description'].'</p>' : '').
			     '</li>';		
		}	
	?>
</ul>
<?php
	endif;
?>