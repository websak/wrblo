<?php
/*
Template Name: Member Template
*/
?>

<style>
.vc_col-sm-1\/5 {
    width: 30% !important;
  }
  .vc_col-sm-4\/5 {
    width: 70% !important;
  }
  .cta {
    display: flex;
    justify-content: center;
    position: relative;
    left: -85px;
  }
  .btn {
    background: #c29f48;
    color: #fff;
    display: flex;
    text-align: right;
    padding: 10px 20px;
    margin-bottom: 30px;
  }
  .btn:hover {
    color: #000;
  }
  </style>

<?php get_header(); ?>

<?php goodwish_edge_get_title(); ?>

<div class="edgtf-container">
  <div class="edgtf-container-inner">
  <?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

  <?php the_content();?>
<?php endwhile; ?>
<?php endif; ?>
<p class="cta"><a href="/team" class="btn">Back to team page</a></p>
  </div>
</div>



<?php get_footer(); ?>