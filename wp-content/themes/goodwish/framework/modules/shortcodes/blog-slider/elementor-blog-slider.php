<?php
class ElementorBlogSlider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_blog_slider';
	}

	public function get_title() {
		return esc_html__( 'Blog Slider', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-blog-slider';
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
			'slider_type',
			[
				'label'     => esc_html__( 'Slider Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'carousel' => esc_html__( 'Carousel', 'goodwish'),
					'slider' => esc_html__( 'Slider', 'goodwish')
				),
				'default' => 'carousel'
			]
		);

		$this->add_control(
			'number_of_posts',
			[
				'label'     => esc_html__( 'Number of Posts', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Leave empty for all posts', 'goodwish' )
			]
		);

		$this->add_control(
			'selected_posts',
			[
				'label'     => esc_html__( 'Selected Posts', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Selected Posts (leave empty for all, delimit by comma)', 'goodwish' )
			]
		);

		$this->add_control(
			'order_by',
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
				'label'     => esc_html__( 'Order', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'desc' => esc_html__( 'DESC', 'goodwish'),
					'asc' => esc_html__( 'ASC', 'goodwish')
				),
				'default' => 'DESC'
			]
		);

		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'Category Slug', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Leave empty for all or use comma for list', 'goodwish' )
			]
		);

		$this->add_control(
			'show_image',
			[
				'label'     => esc_html__( 'Show Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no',
				'condition' => [
					'slider_type' => array( 'carousel' )
				]
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'default' => esc_html__( 'Default', 'goodwish'),
					'square' => esc_html__( 'Square', 'goodwish')
				),
				'default' => 'full',
				'condition' => [
					'show_image' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'image_size_slider',
			[
				'label'     => esc_html__( 'Image Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'default' => esc_html__( 'Default', 'goodwish'),
					'square' => esc_html__( 'Square', 'goodwish'),
					'custom' => esc_html__( 'Custom', 'goodwish')
				),
				'default' => 'full',
				'condition' => [
					'slider_type' => array( 'slider' )
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'goodwish' ),
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
			'image_width',
			[
				'label'     => esc_html__( 'Image Width', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set custom image width', 'goodwish' ),
				'condition' => [
					'image_size_slider' => array( 'custom' )
				]
			]
		);

		$this->add_control(
			'image_height',
			[
				'label'     => esc_html__( 'Image Height', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set custom image height', 'goodwish' ),
				'condition' => [
					'image_size_slider' => array( 'custom' )
				]
			]
		);

		$this->add_control(
			'text_length',
			[
				'label'     => esc_html__( 'Text length', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of characters', 'goodwish' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'design_options',
			[
				'label' => esc_html__( 'Design Options', 'goodwish' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'box_color',
			[
				'label'     => esc_html__( 'Box Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['box_style'] = '';
		if(!empty($params['box_color'])){
			$params['box_style'] = 'background-color:'.$params['box_color'];
		}

		if ( $params['title_tag'] == '' ) {
			if ( $params['slider_type'] == 'slider' ) {
				$params['title_tag'] = 'h2';
			} else {
				$params['title_tag'] = 'h4';
			}
		}

		$args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $params['number_of_posts'],
			'orderby'			=> $params['order_by'],
			'order'				=> $params['order']
		);
		if($params['category'] != ''){
			$args['category_name'] = $params['category'];
		}

		$slider_class = 'edgtf-blog-slider-type-'.$params['slider_type'];
		$post_ids = null;

		if($params['selected_posts'] != ''){
			$post_ids = explode(',', $params['selected_posts']);
			$args['post__in'] = $post_ids;
		}

        if($params['slider_type'] == 'slider'){
           if($params['image_size_slider'] == 'custom' && $params['image_width'] != '' && $params['image_height'] != ''){
                $params['image_size_slider'] = 'custom';
            }elseif($params['image_size_slider'] == 'square') {
               $params['image_size_slider'] = 'goodwish_edge_square';
           }
        }elseif($params['image_size'] == 'square') {
            $params['image_size'] = 'goodwish_edge_square';
        }

		if($params['slider_type'] == 'carousel'){
			$params['classes'] = array('edgtf-blog-slide-info-holder');
			if($params['show_image'] == 'no')
				$params['classes'][] = 'edgtf-without-image';
		}

		$query = new \WP_Query($args);

		if ( $query->have_posts() ) {

			$html = '';

			$html .= '<div class="edgtf-blog-slider-outer">';


			$html .= '<div class="edgtf-blog-slider edgtf-slick-slider-navigation-style '. $slider_class .'" data-type="'.$params['slider_type'].'">';

			while ( $query->have_posts() ) {

				$query->the_post();

				//Get slide HTML from template
				$html .= goodwish_edge_get_shortcode_module_template_part('templates/blog-'.$params['slider_type'], 'blog-slider', '', $params);

			}

			$html .= '</div></div>';


		} else {

			$html = esc_html__('There is no posts!', 'goodwish');

		}

		wp_reset_postdata();

		echo $html;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorBlogSlider() );