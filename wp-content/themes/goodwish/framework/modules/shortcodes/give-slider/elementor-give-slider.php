<?php
class ElementorCauseSlider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_cause_slider'; 
	}

	public function get_title() {
		return esc_html__( 'Cause Slider', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-give-slider';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'goodwish' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'slider_title',
			[
				'label'     => esc_html__( 'Slider Title', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'slider_subtitle',
			[
				'label'     => esc_html__( 'Slider Subtitle', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1' => esc_html__( 'h1', 'goodwish'), 
					'h2' => esc_html__( 'h2', 'goodwish'), 
					'h3' => esc_html__( 'h3', 'goodwish'), 
					'h4' => esc_html__( 'h4', 'goodwish'), 
					'h5' => esc_html__( 'h5', 'goodwish'), 
					'h6' => esc_html__( 'h6', 'goodwish')
				),
				'default' => 'h1'
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'original' => esc_html__( 'Original', 'goodwish'), 
					'landscape' => esc_html__( 'Landscape', 'goodwish')
				),
				'default' => 'original'
			]
		);

		$this->add_control(
			'item_title_tag',
			[
				'label'     => esc_html__( 'Give Item Title Tag', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h2' => esc_html__( 'h2', 'goodwish'), 
					'h3' => esc_html__( 'h3', 'goodwish'), 
					'h4' => esc_html__( 'h4', 'goodwish'), 
					'h5' => esc_html__( 'h5', 'goodwish'), 
					'h6' => esc_html__( 'h6', 'goodwish')
				),
				'default' => 'h3'
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'     => esc_html__( 'Button Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default text is &quot;Donate&quot;', 'goodwish' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'query_and_layout_options',
			[
				'label' => esc_html__( 'Query and Layout Options', 'goodwish' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order by', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'date' => esc_html__( 'Date', 'goodwish'), 
					'title' => esc_html__( 'Title', 'goodwish')
				),
				'default' => 'date'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Sort order', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'DESC' => esc_html__( 'Descending', 'goodwish'), 
					'ASC' => esc_html__( 'Ascending', 'goodwish')
				),
				'default' => 'DESC'
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number of Give Forms Per Page', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( '(enter -1 to show all)', 'goodwish' )
			]
		);

		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'Category', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Category Slug (leave empty for all)', 'goodwish' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $query_args = $this->getQueryArgs($params);

        $give_forms = new \WP_Query($query_args);

        $single_params = array();

        $html = '';
       

        $html .= '<div class="edgtf-give-forms-slider-outer edgtf-slick-slider-navigation-style">';

        $html .= goodwish_edge_get_shortcode_module_template_part('templates/give-slider-title-part','give-slider','',$params);

        $html .= '<div class="edgtf-give-forms-slider">';


        if ( $give_forms->have_posts() ) :

            while ( $give_forms->have_posts() ) : $give_forms->the_post();

        		$id = get_the_ID();
        		$single_params['id'] = $id;
        		$single_params['title_tag'] = $params['item_title_tag'];
        		$single_params['thumb_image_size'] = $this->generateImageSize($params);
        		$single_params['button_params'] = $this->getButtonParams($params, $id);

                $html .= goodwish_edge_get_shortcode_module_template_part('templates/give-slider-template','give-slider','',$single_params);

            endwhile; // end of the loop.

        endif;

        wp_reset_postdata();

        $html .= '</div>';
        $html .= '</div>';

        echo $html;
	}

    private function getQueryArgs($params){

        $query_array = array(
            'post_type'           => 'give_forms',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby'             => $params['orderby'],
            'order'               => $params['order'],
			'posts_per_page'      => $params['number']
        );

        if($params['category'] != ''){
            $query_array['give_forms_category'] = $params['category'];
        }

	
		$paged = '';
		if(empty($params['next_page'])) {
			$paged = goodwish_edge_paged();
		}

		if(!empty($params['next_page'])){
			$query_array['paged'] = $params['next_page'];

		}else{
			$query_array['paged'] = $paged;
		}

        return $query_array;
    }

	private function generateImageSize($params){
		$thumb_image_size = '';
		$image_size = $params['image_size'];
		
		switch ($image_size) {
			case 'landscape':
        		$thumb_image_size = 'goodwish_edge_large_width';
				break;		
			default:
        		$thumb_image_size = 'original';
				break;
		}

		return $thumb_image_size;
	}

	private function getButtonParams($params, $id){
		$button_params = array();

		$button_params['type'] = 'outline-light';

		if ($params['button_text'] !== ''){
			$button_params['text'] = $params['button_text'];
		} else {
			$button_params['text'] = esc_html__('Donate','goodwish');
		}

		$button_params['link'] = get_the_permalink($id);


		return $button_params;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorCauseSlider() );