<?php
class ElementorCarousel extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_carousel'; 
	}

	public function get_title() {
		return esc_html__( 'Carousel', 'goodwish-core' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-carousels';
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
			'carousel',
			[
				'label'     => esc_html__( 'Carousel Slider', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' 	=> edgt_core_get_carousel_slider_array(),
				'default' => ''
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish-core'), 
					'title' => esc_html__( 'Title', 'goodwish-core'), 
					'date' => esc_html__( 'Date', 'goodwish-core')
				),
				'default' => 'date'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish-core'), 
					'ASC' => esc_html__( 'ASC', 'goodwish-core'), 
					'DESC' => esc_html__( 'DESC', 'goodwish-core')
				),
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'number_of_items',
			[
				'label'     => esc_html__( 'Number of items showing', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'3' => esc_html__( '3', 'goodwish-core'), 
					'4' => esc_html__( '4', 'goodwish-core'), 
					'5' => esc_html__( '5', 'goodwish-core'), 
					'6' => esc_html__( '6', 'goodwish-core')
				),
				'default' => '3'
			]
		);

		$this->add_control(
			'image_animation',
			[
				'label'     => esc_html__( 'Image Animation', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'image-change' => esc_html__( 'Image Change', 'goodwish-core'), 
					'image-zoom' => esc_html__( 'Image Zoom', 'goodwish-core')
				),
				'default' => 'image-change'
			]
		);

		$this->add_control(
			'show_arrows_navigation',
			[
				'label'     => esc_html__( 'Show navigation?', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'show_dots_navigation',
			[
				'label'     => esc_html__( 'Show pagination?', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		$params['carousel_data_attributes'] = $this->getCarouselDataAttributes($params);

        $html = '';

        if ($params['carousel'] !== '') {

            $html .= '<div class="edgtf-carousel-holder clearfix">';
            $html .= '<div class="edgtf-carousel edgtf-slick-slider-navigation-style" ' .  goodwish_edge_get_inline_attrs($params['carousel_data_attributes']) . '>';

			$args = array(
				'post_type' => 'carousels',
				'carousels_category' => $params['carousel'],
				'orderby' => $params['orderby'],
				'order' => $params['order'],
				'posts_per_page' => '-1'
			);

            $query = new \WP_Query($args);

            if ($query->have_posts()) {
                while($query->have_posts()) {
                    $query->the_post();
                    $carousel_item = $this->getCarouselItemData(get_the_ID(), $params);
                    $html .= edgt_core_get_shortcode_module_template_part('carousels', 'carousel-template', '', $carousel_item);
                }
            }

            wp_reset_postdata();

            $html .= '</div>';
            $html .= '</div>';

        }

        echo $html;
	}

    private function getCarouselItemData($item_id, $params) {

        $carousel_item = array();

        if (($meta_temp = get_post_meta($item_id, 'edgtf_carousel_image', true)) !== '') {
            $carousel_item['image'] = $meta_temp;
        } else {
            $carousel_item['image'] = '';
        }

        if ($params['image_animation'] == 'image-change' && ($meta_temp = get_post_meta($item_id, 'edgtf_carousel_hover_image', true)) !== '') {
            $carousel_item['hover_image'] = $meta_temp;
            $carousel_item['hover_class'] = 'edgtf-has-hover-image';
        } else {
            $carousel_item['hover_image'] = '';
            $carousel_item['hover_class'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'edgtf_carousel_item_link', true)) != '') {
            $carousel_item['link'] = $meta_temp;
        } else {
            $carousel_item['link'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'edgtf_carousel_item_target', true)) != '') {
            $carousel_item['target'] = $meta_temp;
        } else {
            $carousel_item['target'] = '_self';
        }

        $carousel_item['title'] = get_the_title();

        $carousel_item['carousel_image_classes'] = $this->getCarouselImageClasses($params);

        return $carousel_item;

    }

	private function getCarouselImageClasses($params) {

		$carousel_image_classes = array();
		if($params['image_animation'] !== '') {
			$carousel_image_classes[] = 'edgtf-' . $params['image_animation'];
		}

		return implode(' ', $carousel_image_classes);

	}

	private function getCarouselDataAttributes($params) {

		$carousel_data = array();

		if ($params['number_of_items'] !== '') {
			$carousel_data['data-items'] = $params['number_of_items'];
		}
		if ($params['show_arrows_navigation'] !== '') {
			$carousel_data['data-arrows-navigation'] = $params['show_arrows_navigation'];
		}
		if ($params['show_dots_navigation'] !== '') {
			$carousel_data['data-dots-navigation'] = $params['show_dots_navigation'];
		}

		return $carousel_data;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorCarousel() );