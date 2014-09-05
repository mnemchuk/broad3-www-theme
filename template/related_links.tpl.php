<div class="cms-related">
<?php if($title != ""){?><h3><?php echo $title; ?></h3><?php } ?>
<?php if($links[0]['url'] != ''){?>
<ul class='menu'>
<?php
	
	foreach($links as $link):
?>
	<li class='leaf'>
		<a href="<?php print url($link['url']);?>"> <?php print $link['title'];?></a>
    </li>
<?php
	endforeach;
?>
</ul>

<?php 
}
if($extra_info){
	print $extra_info;
}
?>
</div>