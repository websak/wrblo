<?php
$id = 'content-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'fullwidth content-block';
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
			<div class="col-1">
        <div class="inner"> 
          <?php if(!is_null($card['title'])):?><h2><?php echo $card['title'];?></h2><?php endif;?>      
          <?php if(!is_null($card['content'])):?><?php echo $card['content'];?><?php endif;?>
        </div>
			</div>
      </div>
		</div>
	</div>
</section>