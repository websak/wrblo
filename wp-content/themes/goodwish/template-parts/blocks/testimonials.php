<?php
$id = 'testimonials-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'testimonials';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

?>


<section class="scroll-animated fade-in  <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

  <?php if( have_rows('testimonials') ): ?>
    <div class="owl-carousel">
      <?php while( have_rows('testimonials') ): the_row(); $author = get_sub_field('author'); $background_colour = get_sub_field('background_colour'); $image = get_sub_field('image'); $text = get_sub_field('text'); ?>
        <div class="slide" <?php if($background_colour == "") :?> style="background-color: grey;" <?php else : ?> style="background-color: <?php echo $background_colour;?>"  <?php endif;?>>
          <div class="inner">
            <div class="body">
              <div class="quote-mark">
                <p><img src="<?php echo get_template_directory_uri();?>/assets/img/quote-mark.png"></p>
              </div>
              <p><?php echo $text;?></p>
              <p class="author"><?php echo $author;?></p>
            </div>
          </div>
          
        </div>
      <?php endwhile; ?>
  </div>
  <?php endif;?>

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
            items:1
        },
        600:{
            items:3,
        },
        1000:{
            items:1,
        }
    }
})
});
</script>
