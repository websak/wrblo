<?php
class ElementorCounter extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_counter'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Counter', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-counter';
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
			'type',
			[
				'label'     => esc_html__( 'Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'zero' => esc_html__( 'Zero Counter', 'goodwish'), 
					'random' => esc_html__( 'Random Counter', 'goodwish')
				),
				'default' => 'zero'
			]
		);

		$this->add_control(
			'position',
			[
				'label'     => esc_html__( 'Position', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'left' => esc_html__( 'Left', 'goodwish'), 
					'right' => esc_html__( 'Right', 'goodwish'), 
					'center' => esc_html__( 'Center', 'goodwish')
				),
				'default' => 'left'
			]
		);

		$this->add_control(
			'digit',
			[
				'label'     => esc_html__( 'Digit', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'text',
			[
				'label'     => esc_html__( 'Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'font_size',
			[
				'label'     => esc_html__( 'Digit Font Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'digit_color',
			[
				'label'     => esc_html__( 'Digit Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label'     => esc_html__( 'Title Hover Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'padding_bottom',
			[
				'label'     => esc_html__( 'Padding Bottom(px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['counter_holder_styles'] = $this->getCounterHolderStyle($params);
		$params['counter_styles'] = $this->getCounterStyle($params);
		$params['title_styles'] = $this->getTitleStyle($params);
		$params['title_data'] = $this->getTitleData($params);
		$params['text_styles'] = $this->getTextStyle($params);

		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/counter-template', 'counter', '', $params);

		echo $html;

	}

	private function getCounterHolderStyle($params) {
		$counterHolderStyle = array();

		if ($params['padding_bottom'] !== '') {

			$counterHolderStyle[] = 'padding-bottom: ' . $params['padding_bottom'] . 'px';

		}

		return implode(';', $counterHolderStyle);
	}

	private function getCounterStyle($params) {
		$counterStyle = array();

		if ($params['font_size'] !== '') {
			$counterStyle[] = 'font-size: ' . $params['font_size'] . 'px';
		}
		if ($params['digit_color'] !== '') {
			$counterStyle[] = 'color: ' . $params['digit_color'];
		}

		return implode(';', $counterStyle);
	}

	private function getTextStyle($params) {
		$text_style = array();

		if ($params['text_color'] !== '') {
			$text_style[] = 'color: ' . $params['text_color'];
		}

		return implode(';', $text_style);
	}

	private function getTitleData($params) {
		$title_data = array();

		if ($params['title_hover_color'] !== '') {
			$title_data['data-hover-color'] = $params['title_hover_color'];
		}

		return $title_data;
	}

	private function getTitleStyle($params) {
		$title_style = array();

		if ($params['title_color'] !== '') {
			$title_style[] = 'color: ' . $params['title_color'];
		}

		return implode(';', $title_style);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorCounter() );