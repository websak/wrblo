<?php
/*
Template Name: Campaign Progress Template
*/
?>

<?php get_header(); ?>

<?php goodwish_edge_get_title(); ?>

<style>
  .wc-label-radio, .wc-donation-title, .causes-dropdown, .row2 {display: none;}
  </style>

<div class="edgtf-container">
  <div class="edgtf-container-inner" id="project_progress">
  <?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="col">
    <h1><?php the_title();?></h1>
    <!-- <h2>Aims</h2> -->
    <?//php $aims = the_field('aims'); echo $aims; ?>
    <h2>Total needed</h2>
    <p><?php $total_needed = the_field('total_amount_needed'); echo $total_needed;?></p>
    <h2>Progress so far:</h2>
    <?php $progress = the_field('progress');?>
    <?php echo $progress?>
           <?php
        $previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
        ?>
    <p><a href="<?= $previous ?>" style="text-decoration: underline; font-size: 16px; margin-top: 30px; display: block;">Go Back</a></p>
  </div>  
<div class="col">
    <div style="margin: 0 20px; position: relative; right: -50px;">
    <?php $video = the_field('video'); echo $video;?>
  </div>
</div>  

<?php endwhile; ?>
<?php endif; ?>
  </div>
</div>



<?php get_footer(); ?>