<?php
$id = 'content';
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = 'fullwidth content-block accordion';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$card = get_field("card");

?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>" style="background-color: <?php echo $card['background_colour'];?>">
	<div class="edgtf-container">
		<div class="edgtf-container-inner">
			<div class="row">
				<div class="col-1">
					<div class="inner"> 
						<?php if(!is_null($card['title'])):?><h2><?php echo $card['title'];?></h2><?php endif;?>      
						<?php if(!is_null($card['text'])):?><?php echo $card['text'];?><?php endif;?>
					</div>

					<?php if($card['accordion']):?>
					<div class="accordion">
						<?php foreach($card['accordion'] as $ac):?>
            <div class="accordion-item">
                <div class="accordion-header">
                    <h3 class="accordion-title"><?php echo $ac['title'];?></h3>
                    <svg class="accordion-icon" viewBox="0 0 24 24">
                        <path class="icon-chevron" d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                    </svg>
                </div>
                <div class="accordion-content">
                    <div class="accordion-text">
                        <?php echo $ac['text'];?>
                    </div>
                </div>
            </div>
						<?php endforeach;?>         
    </div>
		<?php endif;?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            
            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const accordionContent = this.nextElementSibling;
                    const isActive = this.classList.contains('active');
                    
                    // Toggle the clicked accordion
                    this.classList.toggle('active');
                    accordionContent.classList.toggle('active');
                    
                    // Add smooth animation by setting max-height
                    if (!isActive) {
                        accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
                    } else {
                        accordionContent.style.maxHeight = '0px';
                    }
                });
            });
        });
    </script>
				</div>
      </div>
		</div>
	</div>
</section>