<?php
class ElementorPortfolioSlider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_portfolio_slider'; 
	}

	public function get_title() {
		return esc_html__( 'Portfolio Slider', 'goodwish-core' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-portfolio-slider';
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
			'type',
			[
				'label'     => esc_html__( 'Portfolio Slider Template', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'goodwish-core'), 
					'gallery' => esc_html__( 'Gallery', 'goodwish-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image size', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'goodwish-core'), 
					'full' => esc_html__( 'Original Size', 'goodwish-core'), 
					'square' => esc_html__( 'Square', 'goodwish-core'), 
					'landscape' => esc_html__( 'Landscape', 'goodwish-core'), 
					'portrait' => esc_html__( 'Portrait', 'goodwish-core')
				),
				'default' => 'full'
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'     => esc_html__( 'Order By', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish-core'), 
					'menu_order' => esc_html__( 'Menu Order', 'goodwish-core'), 
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
			'number',
			[
				'label'     => esc_html__( 'Number', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of portolios on page (-1 is all)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'portfolios_shown',
			[
				'label'     => esc_html__( 'Number of Portfolios Shown', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Number of portfolios that are showing at the same time in full width (on smaller screens is responsive so there will be less items shown)', 'goodwish-core' ),
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
			'category',
			[
				'label'     => esc_html__( 'Category', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Category Slug (leave empty for all)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'selected_projects',
			[
				'label'     => esc_html__( 'Selected Projects', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Selected Projects (leave empty for all, delimit by comma)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish-core'), 
					'h2' => esc_html__( 'h2', 'goodwish-core'), 
					'h3' => esc_html__( 'h3', 'goodwish-core'), 
					'h4' => esc_html__( 'h4', 'goodwish-core'), 
					'h5' => esc_html__( 'h5', 'goodwish-core'), 
					'h6' => esc_html__( 'h6', 'goodwish-core')
				),
				'default' => 'h4'
			]
		);

		$this->add_control(
			'animation_type',
			[
				'label'     => esc_html__( 'Animation Type', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'edgtf-light' => esc_html__( 'Light', 'goodwish-core'), 
					'edgtf-dark' => esc_html__( 'Dark', 'goodwish-core'), 
					'edgtf-follow' => esc_html__( 'Follow', 'goodwish-core')
				),
				'default' => 'edgtf-dark',
				'condition' => [
					'type' => array( 'masonry', 'gallery', 'gallery-with-space', 'pinterest', 'pinterest-with-space' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {
		$args = array(
			'type' => 'standard',
			'image_size' => 'full',
			'order_by' => 'date',
			'order' => 'ASC',
			'number' => '-1',
			'category' => '',
			'selected_projects' => '',
			'title_tag' => 'h4',
			'portfolios_shown' => '3',
			'portfolio_slider' => 'yes',
			'animation_type'   => 'edgtf-dark'
		);
		$params = array_merge($args, $this->get_settings_for_display());
		$html ='';
		$html .= goodwish_edge_execute_shortcode('edgtf_portfolio_list', $params);
        echo $html;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorPortfolioSlider() );