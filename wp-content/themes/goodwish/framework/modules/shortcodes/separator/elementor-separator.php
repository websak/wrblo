<?php
class ElementorSeparator extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_separator'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Separator', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-separator';
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
			'class_name',
			[
				'label'     => esc_html__( 'Extra class name', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'goodwish' )
			]
		);

		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'normal' => esc_html__( 'Normal', 'goodwish'), 
					'full-width' => esc_html__( 'Full Width', 'goodwish')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'position',
			[
				'label'     => esc_html__( 'Position', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'center' => esc_html__( 'Center', 'goodwish'), 
					'left' => esc_html__( 'Left', 'goodwish'), 
					'right' => esc_html__( 'Right', 'goodwish')
				),
				'default' => 'center',
				'condition' => [
					'type' => array( 'normal' )
				]
			]
		);

		$this->add_control(
			'color',
			[
				'label'     => esc_html__( 'Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'border_style',
			[
				'label'     => esc_html__( 'Border Style', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'goodwish'), 
					'dashed' => esc_html__( 'Dashed', 'goodwish'), 
					'solid' => esc_html__( 'Solid', 'goodwish'), 
					'dotted' => esc_html__( 'Dotted', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'width',
			[
				'label'     => esc_html__( 'Width', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type' => array( 'normal' )
				]
			]
		);

		$this->add_control(
			'thickness',
			[
				'label'     => esc_html__( 'Thickness (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'top_margin',
			[
				'label'     => esc_html__( 'Top Margin', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'bottom_margin',
			[
				'label'     => esc_html__( 'Bottom Margin', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		extract($params);
		$params['separator_class'] = $this->getSeparatorClass($params);
		$params['separator_style'] = $this->getSeparatorStyle($params);


		$html = goodwish_edge_get_shortcode_module_template_part('templates/separator-template', 'separator', '', $params);

		echo $html;
	}

	private function getSeparatorClass($params) {

		$separator_class = array();

		if ($params['class_name'] !== '') {
			$separator_class[] = $params['class_name'];
		}
		if ($params['position'] !== '') {
			$separator_class[] = 'edgtf-separator-'.$params['position'];
		}
		if ($params['type'] !== '') {
			$separator_class[] = 'edgtf-separator-'.$params['type'];
		}

		return implode(' ', $separator_class);

	}

	private function getSeparatorStyle($params) {

		$separator_style = array();

		if ($params['color'] !== '') {
			$separator_style[] = 'border-color: ' . $params['color'];
		}
		if ($params['border_style'] !== '') {
			$separator_style[] = 'border-style: ' . $params['border_style'];
		}
		if ($params['width'] !== '') {
			if(goodwish_edge_string_ends_with($params['width'], '%') || goodwish_edge_string_ends_with($params['width'], 'px')) {
				$separator_style[] = 'width: ' . $params['width'];
			}else{
				$separator_style[] = 'width: ' . $params['width'] . 'px';
			}
		}
		if ($params['thickness'] !== '') {
			$separator_style[] = 'border-bottom-width: ' . $params['thickness'] . 'px';
		}
		if ($params['top_margin'] !== '') {
			if(goodwish_edge_string_ends_with($params['top_margin'], '%') || goodwish_edge_string_ends_with($params['top_margin'], 'px')) {
				$separator_style[] = 'margin-top: ' . $params['top_margin'];
			}else{
				$separator_style[] = 'margin-top: ' . $params['top_margin'] . 'px';
			}
		}
		if ($params['bottom_margin'] !== '') {
			if(goodwish_edge_string_ends_with($params['bottom_margin'], '%') || goodwish_edge_string_ends_with($params['bottom_margin'], 'px')) {
				$separator_style[] = 'margin-bottom: ' . $params['bottom_margin'];
			}else{
				$separator_style[] = 'margin-bottom: ' . $params['bottom_margin'] . 'px';
			}
		}
		return implode(';', $separator_style);

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorSeparator() );