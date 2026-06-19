<?php
class ElementorTitleWithNumber extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_title_with_number'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Title With Number', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-title-with-number';
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
			'title',
			[
				'label'     => esc_html__( 'Title', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
				'default' => 'h2'
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['title_style'] = '';

		if($params['title_color'] != '') {
			$params['title_style'] = 'color:' . $params['title_color'];
		}

		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/title-with-number-template', 'title-with-number', '', $params);

		echo $html;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorTitleWithNumber() );