<?php
class ElementorMasonryGallery extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_masonry_gallery'; 
	}

	public function get_title() {
		return esc_html__( 'Masonry Gallery', 'goodwish-core' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-masonry-gallery';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'goodwish-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'Category', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Category Slug (leave empty for all)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of Masonry Gallery Items', 'goodwish-core' )
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'goodwish-core'), 
					'ASC' => esc_html__( 'ASC', 'goodwish-core')
				),
				'default' => 'DESC'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $html = '';

        /* Query for items */
		$query_args = array(
			'post_type' => 'masonry-gallery',
			'orderby' => 'date',
			'order' => $params['order'],
			'posts_per_page' => $params['number']
		);

        if ($params['category'] != "") {
            $query_args['masonry-gallery-category'] = $params['category'];
        }
        $query = new \WP_Query( $query_args );
		

        $html .= '<div class="edgtf-masonry-gallery-holder">';
       	$html .= '<div class="edgtf-masonry-gallery-grid-sizer"></div>';

        if ($query->have_posts()) :
            while ( $query->have_posts() ) : $query->the_post();

				if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true) !== '') {
					$type = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true);
				} else {
					$type = 'standard';
				}

                if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_text', true) !== '') {
                    $params['item_text'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_text', true);
                } else {
                	$params['item_text'] = '';
                }
				if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_subtitle', true) !== '') {
                    $params['item_subtitle'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_subtitle', true);
                } else {
                	$params['item_subtitle'] = '';
                }
                if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_link', true) !== '') {
					$params['item_link'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_link', true);
                } else {
                	$params['item_link'] = '';
                }
                if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_link_target', true) !== '') {
					$params['item_link_target'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_link_target', true);
                } else {
                	$params['item_link_target'] = '';
                }
				if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_enable_hover', true) !== '') {
					$params['enable_hover'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_enable_hover', true);
                } else {
                	$params['enable_hover'] = '';
                }
                if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_text_alignment', true) !== '') {
					$params['text_alignment_class'] = 'edgtf-masonry-gallery-item-content-'.get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_text_alignment', true);
                } else {
                	$params['text_alignment_class'] = '';
                }

				$params['current_id'] = get_the_ID();
				$params['item_classes']  = $this->getItemClasses();
				$params['item_thumb_size']  = $this->getImageSize();
				$params['background_image_url'] = $this->getBackgroundImage($params);


				$html .= edgt_core_get_shortcode_module_template_part('masonry-gallery', 'masonry-gallery-'. $type . '-template', '', $params);

            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'edge-cpt');
        endif;
		wp_reset_postdata();
        $html .= '</div>';

        echo $html;
	}

	private function getItemClasses(){
		$classes = array('edgtf-masonry-gallery-item');

		if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_size', true) !== '') {
			$classes[] = 'edgtf-mg-' . get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_size', true);
		}

		if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true) !== '') {
			$classes[] = 'edgtf-mg-' . get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true);
		}

        if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true) == 'standard') {
            if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_enable_hover', true) == 'yes') {
                $classes[] = 'edgtf-mg-standard-hover-text';
            } 
        }

		return implode(' ', $classes);
	}

	private function getImageSize(){
		$thumb_size = 'goodwish_edge_square';

		$masonry_size = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_size',true);

		switch($masonry_size):
			default :
				$thumb_size = 'goodwish_edge_square';
				break;
			case 'rectangle-landscape' :
				$thumb_size = 'goodwish_edge_large_width';
				break;
			case 'rectangle-portrait' :
				$thumb_size = 'goodwish_edge_large_height';
				break;
			case 'square-big' :
				$thumb_size = 'goodwish_edge_large_width_height';
				break;
		endswitch;


		return $thumb_size;
	}

	public function getBackgroundImage($params){

		$id = $params['current_id'];
		$masonry_image_url = wp_get_attachment_url(get_post_thumbnail_id($id),$params['item_thumb_size']);

		return $masonry_image_url;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorMasonryGallery() );