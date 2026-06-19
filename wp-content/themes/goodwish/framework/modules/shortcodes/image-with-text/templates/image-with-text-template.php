<?php
/**
 * Image With Text shortcode template
 */
?>

<div class="edgtf-image-with-text <?php echo esc_attr($holder_classes); ?>">
	<div class="edgtf-image-with-text-image-inner">
		<?php if ($item_image !== '') { ?>
			<div class="edgtf-image-with-text-image">
				<?php echo wp_get_attachment_image($item_image,'full');?>
			</div>
			<div class="edgtf-image-with-text-image-overlay">
				<?php if(!empty($double_buttons) && $double_buttons == 'yes') { ?>
					<?php if( ! empty( $double_button_one_link ) ) { ?>
                        <a class="edgtf-iwt-double-link edgtf-iwt-first-link edgtf-btn edgtf-btn-medium edgtf-btn-outline" itemprop="url" href="<?php echo esc_url($double_button_one_link); ?>" target="_blank">
							<?php if( ! empty( $double_button_one_label ) ) { ?>
								<?php echo esc_html($double_button_one_label); ?>
							<?php } ?>
                        </a>
					<?php } ?>

					<?php if( ! empty( $double_button_two_link ) ) { ?>
                        <a class="edgtf-iwt-double-link edgtf-iwt-second-link edgtf-btn edgtf-btn-medium edgtf-btn-outline" itemprop="url" href="<?php echo esc_url($double_button_two_link); ?>" target="_blank">
							<?php if( ! empty( $double_button_two_label ) ) { ?>
								<?php echo esc_html($double_button_two_label); ?>
							<?php } ?>
                        </a>
					<?php } ?>
                <?php }else{ ?>
				    <?php if ($image_with_text_link !== '') { ?>
                        <a href="<?php echo esc_url($image_with_text_link);?>" target="_blank" class="edgtf-image-with-text-link"></a>
                    <?php } ?>
               <?php  } ?>
			</div>

		<?php } ?>
	</div>
	<div class="edgtf-image-with-text-info">
		<?php if ( $image_with_text_text !== '') { ?>

            <<?php echo esc_attr($image_with_text_text_tag); ?> class="edgtf-image-with-text-text">
                <?php if ($image_with_text_link !== '') { ?>
                    <a href="<?php echo esc_url($image_with_text_link);?>" target="_blank" class="edgtf-image-with-text-link">
                <?php } ?>
				<?php echo wp_kses_post($image_with_text_text) ?>
				<?php if ($image_with_text_link !== '') { ?>
                    </a>
                <?php } ?>
            </<?php echo esc_attr($image_with_text_text_tag); ?>>
		<?php } ?>
	</div>
</div>