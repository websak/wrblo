<?php
$id = 'form-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-form';
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
      <?php if(!is_null($card['title'])):?><h2><?php echo $card['title'];?></h2><?php endif;?>  
      <?php echo do_shortcode($card['form']);?>
		</div>
	</div>
</section>