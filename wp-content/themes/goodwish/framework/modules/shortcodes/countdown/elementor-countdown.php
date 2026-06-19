<?php
class ElementorCountdown extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_countdown'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Countdown', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-countdown';
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
			'year',
			[
				'label'     => esc_html__( 'Year', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'), 
					'2015' => esc_html__( '2015', 'goodwish'), 
					'2016' => esc_html__( '2016', 'goodwish'), 
					'2017' => esc_html__( '2017', 'goodwish'), 
					'2018' => esc_html__( '2018', 'goodwish'), 
					'2019' => esc_html__( '2019', 'goodwish'), 
					'2020' => esc_html__( '2020', 'goodwish'),
					'2021' => esc_html__( '2021', 'goodwish'),
					'2022' => esc_html__( '2022', 'goodwish'),
					'2023' => esc_html__( '2023', 'goodwish'),
					'2024' => esc_html__( '2024', 'goodwish'),
					'2025' => esc_html__( '2025', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'month',
			[
				'label'     => esc_html__( 'Month', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'), 
					'1' => esc_html__( 'January', 'goodwish'), 
					'2' => esc_html__( 'February', 'goodwish'), 
					'3' => esc_html__( 'March', 'goodwish'), 
					'4' => esc_html__( 'April', 'goodwish'), 
					'5' => esc_html__( 'May', 'goodwish'), 
					'6' => esc_html__( 'June', 'goodwish'), 
					'7' => esc_html__( 'July', 'goodwish'), 
					'8' => esc_html__( 'August', 'goodwish'), 
					'9' => esc_html__( 'September', 'goodwish'), 
					'10' => esc_html__( 'October', 'goodwish'), 
					'11' => esc_html__( 'November', 'goodwish'), 
					'12' => esc_html__( 'December', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'day',
			[
				'label'     => esc_html__( 'Day', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'), 
					'1' => esc_html__( '1', 'goodwish'), 
					'2' => esc_html__( '2', 'goodwish'), 
					'3' => esc_html__( '3', 'goodwish'), 
					'4' => esc_html__( '4', 'goodwish'), 
					'5' => esc_html__( '5', 'goodwish'), 
					'6' => esc_html__( '6', 'goodwish'), 
					'7' => esc_html__( '7', 'goodwish'), 
					'8' => esc_html__( '8', 'goodwish'), 
					'9' => esc_html__( '9', 'goodwish'), 
					'10' => esc_html__( '10', 'goodwish'), 
					'11' => esc_html__( '11', 'goodwish'), 
					'12' => esc_html__( '12', 'goodwish'), 
					'13' => esc_html__( '13', 'goodwish'), 
					'14' => esc_html__( '14', 'goodwish'), 
					'15' => esc_html__( '15', 'goodwish'), 
					'16' => esc_html__( '16', 'goodwish'), 
					'17' => esc_html__( '17', 'goodwish'), 
					'18' => esc_html__( '18', 'goodwish'), 
					'19' => esc_html__( '19', 'goodwish'), 
					'20' => esc_html__( '20', 'goodwish'), 
					'21' => esc_html__( '21', 'goodwish'), 
					'22' => esc_html__( '22', 'goodwish'), 
					'23' => esc_html__( '23', 'goodwish'), 
					'24' => esc_html__( '24', 'goodwish'), 
					'25' => esc_html__( '25', 'goodwish'), 
					'26' => esc_html__( '26', 'goodwish'), 
					'27' => esc_html__( '27', 'goodwish'), 
					'28' => esc_html__( '28', 'goodwish'), 
					'29' => esc_html__( '29', 'goodwish'), 
					'30' => esc_html__( '30', 'goodwish'), 
					'31' => esc_html__( '31', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'hour',
			[
				'label'     => esc_html__( 'Hour', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'), 
					'0' => esc_html__( '0', 'goodwish'), 
					'1' => esc_html__( '1', 'goodwish'), 
					'2' => esc_html__( '2', 'goodwish'), 
					'3' => esc_html__( '3', 'goodwish'), 
					'4' => esc_html__( '4', 'goodwish'), 
					'5' => esc_html__( '5', 'goodwish'), 
					'6' => esc_html__( '6', 'goodwish'), 
					'7' => esc_html__( '7', 'goodwish'), 
					'8' => esc_html__( '8', 'goodwish'), 
					'9' => esc_html__( '9', 'goodwish'), 
					'10' => esc_html__( '10', 'goodwish'), 
					'11' => esc_html__( '11', 'goodwish'), 
					'12' => esc_html__( '12', 'goodwish'), 
					'13' => esc_html__( '13', 'goodwish'), 
					'14' => esc_html__( '14', 'goodwish'), 
					'15' => esc_html__( '15', 'goodwish'), 
					'16' => esc_html__( '16', 'goodwish'), 
					'17' => esc_html__( '17', 'goodwish'), 
					'18' => esc_html__( '18', 'goodwish'), 
					'19' => esc_html__( '19', 'goodwish'), 
					'20' => esc_html__( '20', 'goodwish'), 
					'21' => esc_html__( '21', 'goodwish'), 
					'22' => esc_html__( '22', 'goodwish'), 
					'23' => esc_html__( '23', 'goodwish'), 
					'24' => esc_html__( '24', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'minute',
			[
				'label'     => esc_html__( 'Minute', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'), 
					'0' => esc_html__( '0', 'goodwish'), 
					'1' => esc_html__( '1', 'goodwish'), 
					'2' => esc_html__( '2', 'goodwish'), 
					'3' => esc_html__( '3', 'goodwish'), 
					'4' => esc_html__( '4', 'goodwish'), 
					'5' => esc_html__( '5', 'goodwish'), 
					'6' => esc_html__( '6', 'goodwish'), 
					'7' => esc_html__( '7', 'goodwish'), 
					'8' => esc_html__( '8', 'goodwish'), 
					'9' => esc_html__( '9', 'goodwish'), 
					'10' => esc_html__( '10', 'goodwish'), 
					'11' => esc_html__( '11', 'goodwish'), 
					'12' => esc_html__( '12', 'goodwish'), 
					'13' => esc_html__( '13', 'goodwish'), 
					'14' => esc_html__( '14', 'goodwish'), 
					'15' => esc_html__( '15', 'goodwish'), 
					'16' => esc_html__( '16', 'goodwish'), 
					'17' => esc_html__( '17', 'goodwish'), 
					'18' => esc_html__( '18', 'goodwish'), 
					'19' => esc_html__( '19', 'goodwish'), 
					'20' => esc_html__( '20', 'goodwish'), 
					'21' => esc_html__( '21', 'goodwish'), 
					'22' => esc_html__( '22', 'goodwish'), 
					'23' => esc_html__( '23', 'goodwish'), 
					'24' => esc_html__( '24', 'goodwish'), 
					'25' => esc_html__( '25', 'goodwish'), 
					'26' => esc_html__( '26', 'goodwish'), 
					'27' => esc_html__( '27', 'goodwish'), 
					'28' => esc_html__( '28', 'goodwish'), 
					'29' => esc_html__( '29', 'goodwish'), 
					'30' => esc_html__( '30', 'goodwish'), 
					'31' => esc_html__( '31', 'goodwish'), 
					'32' => esc_html__( '32', 'goodwish'), 
					'33' => esc_html__( '33', 'goodwish'), 
					'34' => esc_html__( '34', 'goodwish'), 
					'35' => esc_html__( '35', 'goodwish'), 
					'36' => esc_html__( '36', 'goodwish'), 
					'37' => esc_html__( '37', 'goodwish'), 
					'38' => esc_html__( '38', 'goodwish'), 
					'39' => esc_html__( '39', 'goodwish'), 
					'40' => esc_html__( '40', 'goodwish'), 
					'41' => esc_html__( '41', 'goodwish'), 
					'42' => esc_html__( '42', 'goodwish'), 
					'43' => esc_html__( '43', 'goodwish'), 
					'44' => esc_html__( '44', 'goodwish'), 
					'45' => esc_html__( '45', 'goodwish'), 
					'46' => esc_html__( '46', 'goodwish'), 
					'47' => esc_html__( '47', 'goodwish'), 
					'48' => esc_html__( '48', 'goodwish'), 
					'49' => esc_html__( '49', 'goodwish'), 
					'50' => esc_html__( '50', 'goodwish'), 
					'51' => esc_html__( '51', 'goodwish'), 
					'52' => esc_html__( '52', 'goodwish'), 
					'53' => esc_html__( '53', 'goodwish'), 
					'54' => esc_html__( '54', 'goodwish'), 
					'55' => esc_html__( '55', 'goodwish'), 
					'56' => esc_html__( '56', 'goodwish'), 
					'57' => esc_html__( '57', 'goodwish'), 
					'58' => esc_html__( '58', 'goodwish'), 
					'59' => esc_html__( '59', 'goodwish'), 
					'60' => esc_html__( '60', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'month_label',
			[
				'label'     => esc_html__( 'Month Label', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'day_label',
			[
				'label'     => esc_html__( 'Day Label', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'hour_label',
			[
				'label'     => esc_html__( 'Hour Label', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'minute_label',
			[
				'label'     => esc_html__( 'Minute Label', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'second_label',
			[
				'label'     => esc_html__( 'Second Label', 'goodwish' ),
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
			'digit_font_size',
			[
				'label'     => esc_html__( 'Digit Font Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'label_font_size',
			[
				'label'     => esc_html__( 'Label Font Size (px)', 'goodwish' ),
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
			'label_color',
			[
				'label'     => esc_html__( 'Label Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['id'] = mt_rand(1000, 9999);

		$params['countdown_data'] = $this->getData($params);

		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/countdown-template', 'countdown', '', $params);

		echo $html;

	}

	private function getData($params) {
		$data = array();

		if($params['year'] !== '') {
			$data['data-year'] = $params['year'];
		}
		if($params['month'] !== '') {
			$data['data-month'] = $params['month'];
		}
		if($params['day'] !== '') {
			$data['data-day'] = $params['day'];
		}
		if($params['hour'] !== '') {
			$data['data-hour'] = $params['hour'];
		}
		if($params['minute'] !== '') {
			$data['data-minute'] = $params['minute'];
		}
		if($params['month_label'] !== '') {
			$data['data-month-label'] = $params['month_label'];
		}
		if($params['day_label'] !== '') {
			$data['data-day-label'] = $params['day_label'];
		}
		if($params['hour_label'] !== '') {
			$data['data-hour-label'] = $params['hour_label'];
		}
		if($params['minute_label'] !== '') {
			$data['data-minute-label'] = $params['minute_label'];
		}
		if($params['second_label'] !== '') {
			$data['data-second-label'] = $params['second_label'];
		}
		if($params['digit_color'] !== '') {
			$data['data-digit-color'] = $params['digit_color'];
		}
		if($params['label_color'] !== '') {
			$data['data-label-color'] = $params['label_color'];
		}
		if($params['digit_font_size'] !== '') {
			$data['data-digit-size'] = $params['digit_font_size'];
		}
		if($params['label_font_size'] !== '') {
			$data['data-label-size'] = $params['label_font_size'];
		}
		return $data;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorCountdown() );