<?php
$id = 'content-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'content-block';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$card = get_field("card");

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	<div class="edgtf-container">
		<div class="edgtf-container-inner">
			<div class="row">
			<div class="col-2" style="width: 60%;">
        <div class="inner" style="padding-right: 80px;"> 
          <?php if(!is_null($card['title'])):?><h2><?php echo $card['title'];?></h2><?php endif;?>      
          <?php if(!is_null($card['content'])):?><?php echo $card['content'];?><?php endif;?>
					<?php if(!is_null($card['button_link'])):?><a href="<?php echo $card['button_link'];?>" class="btn" target="_blank"><?php echo $card['button_title'];?></a><?php endif;?>
        </div>
			</div>
			<div class="col-2" style="width: 40%;">
					<?php if($card['video'] === FALSE):?>
          <div class="image-container"><img src="<?php echo $card['image']['url'];?>"></div>
					
					<?php else :?>
						<?php echo $card['video_code'];?>
					<?php endif;?>
			</div>
					</div>
		</div>
	</div>
</section>