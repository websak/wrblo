<?php
/*
Template Name: Team Page
*/
?>

<?php get_header(); ?>
<?php goodwish_edge_get_title(); ?>

<div class="edgtf-container">

  <div class="edgtf-container-inner">
	  <?php if( have_rows('team') ): ?>
        <div class="team_wrapper">
          <?php while( have_rows('team') ): the_row(); $department = get_sub_field('department'); $department_intro = get_sub_field('department_intro_text'); $team_index = get_row_index(); ?>
              <div class="intro <?php echo get_row_index(); ?>">
                <h2><?php echo $department;?></h2>
                <p><?php echo $department_intro;?></p>
              </div>
              <?php if( have_rows('staff') ): ?>
                <ul>
                  <?php while( have_rows('staff') ): the_row(); $name = get_sub_field('name'); $image = get_sub_field('image'); $position = get_sub_field('position'); $has_biography = get_sub_field('has_biography'); $link = get_sub_field('page_link'); ?>
                    <li>
                      <?php if($has_biography) : ?>
                        <a href="<?php echo $link;?>"><img src="<?php echo $image['url'];?>"></a>
                        <h4><?php echo $name;?></h4>
                        <p><?php echo $position;?></p>
                      <?php else : ?>
                        <img src="<?php echo $image['url'];?>">
                        <h4><?php echo $name;?></h4>
                        <p><?php echo $position;?></p>
                      <?php endif;?>
                    </li>
                  <?php endwhile; ?>
                </ul>
              <?php endif;?>
          <?php endwhile; ?>
        </div>
      <?php endif;?>
  </div>
</div>



<?php get_footer(); ?>