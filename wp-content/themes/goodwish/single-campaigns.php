<?php get_header(); ?>

<style>
  .col .body {max-width: 345px; width: 100%;}  
  .owl-carousel .owl-nav button.owl-prev{left: 0;}
  .owl-carousel .owl-nav button.owl-next{right: -75px;}
  .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev {color: #262353 !important; top: 0; bottom: 0;}
  .objectives {padding: 30px 0;}
  .objectives .objective {padding-left: 55px}
  .objectives .objective p { font-family: 'Merriweather', 'sans-serif'; font-size: 18px;}
</style>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post();  $overview = get_field("overview");   ?>
<section class="scroll-animated fade-in single-campaign">
    <div class="banner" style="background-image:url('<?php echo $overview["banner"]; ?>')">
      <div class="container">
        <!-- <h1><?//php echo $overview["banner_title"]; ?></h1> -->
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1><?php echo get_the_title(); ?></h1>	
          <?php echo $overview["campaign_description"]; ?>
        </div>
        <div class="col">
          <!-- <p>Share: </p> -->
        </div>
      </div>
    </div>
</section>
<?php if( have_rows('projects') ): ?>
  <?php while( have_rows('projects') ): the_row(); 
  $background = get_sub_field('background_colour'); 
  $title = get_sub_field('title'); 
  $description = get_sub_field('description'); 
  $donating = get_sub_field('donate'); 
  $progress = get_sub_field('progress_page'); 
  //var_dump($donating);
  $progress_link = get_sub_field('progress_link'); 
  // $aims = get_sub_field('aims'); 
  // $total_amount_needed = get_sub_field('total_amount_needed');  
  // $total_amount_raised = get_sub_field('total_amount_raised');
  $project_video = get_sub_field('project_video'); 
  $project_image = get_sub_field('project_image'); 
  $objectives = get_sub_field('objectives');
 
  ?>
  <section class="scroll-animated fade-in project <?php echo $background;?>" id="project">
					<div class="container">
							<div class="row">
									<div class="col">
										<!-- <img src="<?//php echo $overview["campaign_image"]; ?>"> -->
										<?php echo $project_video; ?>
									</div>
									<div class="col">
										<div class="body">	
                      <h3><?php echo $title ?></h3>									
											<?php echo $description ?>
                      
                      <?php if(!empty($objectives)):?>
                        <div class="objectives owl-carousel">
							<?php foreach($objectives as $object): ?>
							<div class="objective">
								<p><?php echo $object["item"]; ?></p>
								<p class="cost">Cost: <strong><?php echo $object["cost"]; ?></strong></p>
							</div>
							<?php endforeach; ?>
              </div>
						<?php endif; ?>
            
                     <?php if($donating):?><p><a class="btn" href="<?php echo $donating ?>">Donate</a><?php endif;?><?php if($progress):?><a class="btn" href="<?php echo $progress ?>" style="right: 220px;">See Progress</a></p><?php endif;?>
                
                     
                    </div>
									</div>
							</div>
					</div>
			</section>
  <?php endwhile; ?>
<?php endif;?>
  <div id="donate">
    <?//php echo $overview["paypal_button"]; ?>
  </div>
  
<?php endwhile; ?>
<?php endif; ?>


<script>
  jQuery(document).ready(function(){
    // jQuery('.click_tab').click(function (e) {
    //   e.preventDefault();
    //   var target = jQuery(this).attr('href');
    //   jQuery('html, body').animate({
    //     scrollTop: jQuery(target).offset().top - 100
    //   }, 1000)
    //   if(jQuery(this).is('[class*="donate-"]')){
		// 	var btn = jQuery(this).attr('class');
		// 	var btnId = btn.split("-").pop() - 1;
		// 	jQuery('#item-options option')[btnId].selected = true;
		// }
    // });
  jQuery('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoHeight:true,
    responsiveClass:true,
    autoplay:false,
    autoplayTimeout:9000,
    nav: true,
    dots: false,
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


<?php get_footer(); ?>