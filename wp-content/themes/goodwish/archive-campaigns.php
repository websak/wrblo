<?php get_header(); ?>


<div class="edgtf-content" >
  <div class="edgtf-content-inner">
    <div
      class="edgtf-title edgtf-standard-type edgtf-content-left-alignment edgtf-title-medium-text-size edgtf-animation-no edgtf-title-without-border"
      style="height:166px;" data-height="166">
      <div class="edgtf-title-image"></div>
      <div class="edgtf-title-holder" style="height:166px;">
        <div class="edgtf-container clearfix">
          <div class="edgtf-container-inner">
            <div class="edgtf-title-subtitle-holder" style="">
              <div class="edgtf-title-subtitle-holder-inner">
                <h1><span>Campaigns</span></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $args = array('post_type'  => 'campaigns', 'post_status'    => 'publish', 'orderby' => 'publish_date', 'order' => 'ASC') ;?>
<?php $the_query = new WP_Query( $args ); ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php while( have_rows('overview') ): the_row(); $overview = get_field("overview"); ?>
			<section class="scroll-animated fade-in campaign <?php echo $overview["background_colour"];?>" id="campaign">
					<div class="container">
							<div class="row">
									<div class="col">
										<!-- <img src="<?//php echo $overview["campaign_image"]; ?>"> -->
										<?php echo $overview["campaign_video"]; ?>
										<?php if($overview['video_credit']):?><?php echo $overview['video_credit'];?><?php endif;?>
									</div>
									<div class="col">
										<div class="body">
											<h3><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h3>										
											<?php echo $overview["campaign_description"];?>
											<a href="<?php the_permalink();?>" class="btn">Read More</a>
										</div>
									</div>
							</div>
					</div>
			</section>
		<?php endwhile; ?>
	<?php endwhile;?>


  <?php get_footer(); ?>