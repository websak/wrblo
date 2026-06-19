<?php
class ElementorCustomFont extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_custom_font'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Custom Font', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-custom-font';
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
			'font_family',
			[
				'label'     => esc_html__( 'Font family', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'font_size',
			[
				'label'     => esc_html__( 'Font size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'line_height',
			[
				'label'     => esc_html__( 'Line height (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'font_style',
			[
				'label'     => esc_html__( 'Font Style', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'normal' => esc_html__( 'normal', 'goodwish'),
					'italic' => esc_html__( 'italic', 'goodwish')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'font_weight',
			[
				'label'     => esc_html__( 'Font weight', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'100' => esc_html__( '100', 'goodwish'),
					'200' => esc_html__( '200', 'goodwish'),
					'300' => esc_html__( '300', 'goodwish'),
					'400' => esc_html__( '400', 'goodwish'),
					'500' => esc_html__( '500', 'goodwish'),
					'600' => esc_html__( '600', 'goodwish'),
					'700' => esc_html__( '700', 'goodwish'),
					'800' => esc_html__( '800', 'goodwish'),
					'900' => esc_html__( '900', 'goodwish')
				),
				'default' => '100'
			]
		);

		$this->add_control(
			'letter_spacing',
			[
				'label'     => esc_html__( 'Letter Spacing (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label'     => esc_html__( 'Text transform', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'None' => esc_html__( 'none', 'goodwish'),
					'Capitalize' => esc_html__( 'capitalize', 'goodwish'),
					'Uppercase' => esc_html__( 'uppercase', 'goodwish'),
					'Lowercase' => esc_html__( 'lowercase', 'goodwish')
				),
				'default' => 'None'
			]
		);

		$this->add_control(
			'text_decoration',
			[
				'label'     => esc_html__( 'Text decoration', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'None', 'goodwish'),
					'underline' => esc_html__( 'Underline', 'goodwish'),
					'overline' => esc_html__( 'Overline', 'goodwish'),
					'line-through' => esc_html__( 'Line Through', 'goodwish')
				),
				'default' => ''
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
			'text_align',
			[
				'label'     => esc_html__( 'Text Align', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'left' => esc_html__( 'Left', 'goodwish'),
					'center' => esc_html__( 'Center', 'goodwish'),
					'right' => esc_html__( 'Right', 'goodwish'),
					'justify' => esc_html__( 'Justify', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'type_out_effect',
			[
				'label'     => esc_html__( 'Enable Type Out Effect', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Adds a type out effect at the end of the custom font content.', 'goodwish' ),
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'typed_ending_1',
			[
				'label'     => esc_html__( 'Typed ending number 1', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'condition' => [
					'type_out_effect' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'typed_ending_2',
			[
				'label'     => esc_html__( 'Typed ending number 2', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'condition' => [
					'typed_ending_1!' => ''
				]
			]
		);

		$this->add_control(
			'typed_ending_3',
			[
				'label'     => esc_html__( 'Typed ending number 3', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'condition' => [
					'typed_ending_2!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['custom_font_style'] = $this->getCustomFontStyle($params);
		$params['custom_font_data'] = $this->getCustomFontData($params);
		$params['content'] = preg_replace('#^<\/p>|<p>$#', '', $params['content']);
		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/custom-font-template', 'custom-font', '', $params);

		echo $html;

	}

	private function getCustomFontStyle($params) {
		$custom_font_style = array();

		if ($params['font_family'] !== '') {
			$custom_font_style[] = 'font-family: '.$params['font_family'];
		}

		if ($params['font_size'] !== '') {
			$font_size = strstr($params['font_size'], 'px') ? $params['font_size'] : $params['font_size'].'px';
			$custom_font_style[] = 'font-size: '.$font_size;
		}

		if ($params['line_height'] !== '') {
			$line_height = strstr($params['line_height'], 'px') ? $params['line_height'] : $params['line_height'].'px';
			$custom_font_style[] = 'line-height: '.$line_height;
		}

		if ($params['font_style'] !== '') {
			$custom_font_style[] = 'font-style: '.$params['font_style'];
		}

		if ($params['font_weight'] !== '') {
			$custom_font_style[] = 'font-weight: '.$params['font_weight'];
		}

		if ($params['letter_spacing'] !== '') {
			$letter_spacing = strstr($params['letter_spacing'], 'px') ? $params['letter_spacing'] : $params['letter_spacing'].'px';
			$custom_font_style[] = 'letter-spacing: '.$letter_spacing;
		}

		if ($params['text_transform'] !== '') {
			$custom_font_style[] = 'text-transform: '.$params['text_transform'];
		}

		if ($params['text_decoration'] !== '') {
			$custom_font_style[] = 'text-decoration: '.$params['text_decoration'];
		}

		if ($params['text_align'] !== '') {
			$custom_font_style[] = 'text-align: '.$params['text_align'];
		}

		if ($params['color'] !== '') {
			$custom_font_style[] = 'color: '.$params['color'];
		}

		return implode(';', $custom_font_style);
	}

	private function getCustomFontData($params) {
		$data_array = array();

		if ($params['font_size'] !== '') {
			$data_array[] = 'data-font-size= '.$params['font_size'];
		}

		if ($params['line_height'] !== '') {
			$data_array[] = 'data-line-height= '.$params['line_height'];
		}
		return implode(' ', $data_array);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorCustomFont() );