<?php 
/* Template Name: HLC Template */
get_header(); ?>

<div class="hybrid-banner" style="background-image:url('/wp-content/uploads/2024/01/View-2-Walkways_1894x460.png');">
     
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>