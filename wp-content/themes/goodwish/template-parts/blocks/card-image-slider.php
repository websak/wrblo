<?php

$id = 'card-image-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'card-image-slider';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$card = get_field("card");
//var_dump($card);
?>


<section class="<?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>">
      <div class="owl-carousel" id="<?php echo $card['id'];?>">
      <?php foreach($card['image_slider'] as $gallery):?>        
        <div class="image-container" style="background-image: url('"><img src="<?php echo $gallery['image']['url'];?>"></div>        
      <?php endforeach;?>
      </div> 
</section>

<script>
jQuery(document).ready(function(){
  jQuery('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:9000,
    nav: true,
    dots: true,
    responsive:{
        0:{
            items:1,
            nav: false,
        },
        600:{
            items:1,
            nav: false,
        },
        1000:{
            items:1,
        }
    }
})
});
</script>