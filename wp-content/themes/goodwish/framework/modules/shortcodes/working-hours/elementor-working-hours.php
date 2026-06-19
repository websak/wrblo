<?php
class ElementorWorkingHours extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_working_hours'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Working Hours', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-working-hours';
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
			'enable_frame',
			[
				'label'     => esc_html__( 'Enable Frame', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Enabling this option will display dark frame around working hours', 'goodwish' ),
				'options' => array(
					'' => esc_html__( '', 'goodwish'), 
					'yes' => esc_html__( 'Yes', 'goodwish'), 
					'no' => esc_html__( 'No', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label'     => esc_html__( 'Background Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'show_footnote_text',
			[
				'label'     => esc_html__( 'Show Footnote Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'), 
					'yes' => esc_html__( 'Yes', 'goodwish'), 
					'no' => esc_html__( 'No', 'goodwish')
				),
				'default' => 'yes'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();



		$params['working_hours']  = $this->getWorkingHours();
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_styles']  = $this->getHolderStyles($params);
		$params['footnote']  = $this->getFootnote($params);

		echo goodwish_edge_get_shortcode_module_template_part('templates/working-hours-template', 'working-hours', '', $params);
	}

	private function getWorkingHours() {
		$workingHours = array();

		//monday
		if(goodwish_edge_options()->getOptionValue('wh_monday_from') !== '') {
			$workingHours['monday']['label'] = esc_html__('Monday', 'goodwish');
			$workingHours['monday']['from']  = goodwish_edge_options()->getOptionValue('wh_monday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_monday_to') !== '') {
			$workingHours['monday']['to'] = goodwish_edge_options()->getOptionValue('wh_monday_to');
		}

		$workingHours['monday']['closed'] = goodwish_edge_options()->getOptionValue('wh_monday_closed');
		$workingHours['monday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_monday_footnote');

		//tuesday
		if(goodwish_edge_options()->getOptionValue('wh_tuesday_from') !== '') {
			$workingHours['tuesday']['label'] = esc_html__('Tuesday', 'goodwish');
			$workingHours['tuesday']['from']  = goodwish_edge_options()->getOptionValue('wh_tuesday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_tuesday_to') !== '') {
			$workingHours['tuesday']['to'] = goodwish_edge_options()->getOptionValue('wh_tuesday_to');
		}

		$workingHours['tuesday']['closed'] = goodwish_edge_options()->getOptionValue('wh_tuesday_closed');
		$workingHours['tuesday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_tuesday_footnote');

		//wednesday
		if(goodwish_edge_options()->getOptionValue('wh_wednesday_from') !== '') {
			$workingHours['wednesday']['label'] = esc_html__('Wednesday', 'goodwish');
			$workingHours['wednesday']['from']  = goodwish_edge_options()->getOptionValue('wh_wednesday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_wednesday_to') !== '') {
			$workingHours['wednesday']['to'] = goodwish_edge_options()->getOptionValue('wh_wednesday_to');
		}

		$workingHours['wednesday']['closed'] = goodwish_edge_options()->getOptionValue('wh_wednesday_closed');
		$workingHours['wednesday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_wednesday_footnote');

		//thursday
		if(goodwish_edge_options()->getOptionValue('wh_thursday_from') !== '') {
			$workingHours['thursday']['label'] = esc_html__('Thursday', 'goodwish');
			$workingHours['thursday']['from']  = goodwish_edge_options()->getOptionValue('wh_thursday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_thursday_to') !== '') {
			$workingHours['thursday']['to'] = goodwish_edge_options()->getOptionValue('wh_thursday_to');
		}

		$workingHours['thursday']['closed'] = goodwish_edge_options()->getOptionValue('wh_thursday_closed');
		$workingHours['thursday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_thursdays_footnote');

		//friday
		if(goodwish_edge_options()->getOptionValue('wh_friday_from') !== '') {
			$workingHours['friday']['label'] = esc_html__('Friday', 'goodwish');
			$workingHours['friday']['from']  = goodwish_edge_options()->getOptionValue('wh_friday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_friday_to') !== '') {
			$workingHours['friday']['to'] = goodwish_edge_options()->getOptionValue('wh_friday_to');
		}

		$workingHours['friday']['closed'] = goodwish_edge_options()->getOptionValue('wh_friday_closed');
		$workingHours['friday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_friday_footnote');

		//saturday
		if(goodwish_edge_options()->getOptionValue('wh_saturday_from') !== '') {
			$workingHours['saturday']['label'] = esc_html__('Saturday', 'goodwish');
			$workingHours['saturday']['from']  = goodwish_edge_options()->getOptionValue('wh_saturday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_saturday_to') !== '') {
			$workingHours['saturday']['to'] = goodwish_edge_options()->getOptionValue('wh_saturday_to');
		}

		$workingHours['saturday']['closed'] = goodwish_edge_options()->getOptionValue('wh_saturday_closed');
		$workingHours['saturday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_saturday_footnote');

		//sunday
		if(goodwish_edge_options()->getOptionValue('wh_sunday_from') !== '') {
			$workingHours['sunday']['label'] = esc_html__('Sunday', 'goodwish');
			$workingHours['sunday']['from']  = goodwish_edge_options()->getOptionValue('wh_sunday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_sunday_to') !== '') {
			$workingHours['sunday']['to'] = goodwish_edge_options()->getOptionValue('wh_sunday_to');
		}

		$workingHours['sunday']['closed'] = goodwish_edge_options()->getOptionValue('wh_sunday_closed');
		$workingHours['sunday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_sunday_footnote');

		return $workingHours;
	}

	private function getFootnote() {
		$footnote = '';
		if(goodwish_edge_options()->getOptionValue('wh_footnote') !== '') {
			$footnote = goodwish_edge_options()->getOptionValue('wh_footnote');
		}

		return $footnote;
	}

	private function getHolderClasses($params) {
		$classes = array('edgtf-working-hours-holder');

		if(isset($params['enable_frame']) && $params['enable_frame'] === 'yes') {
			$classes[] = 'edgtf-wh-with-frame';
		}

		if(isset($params['bg_image']) && $params['bg_image'] !== '') {
			$classes[] = 'edgtf-wh-with-bg-image';
		}

		return $classes;
	}

	private function getHolderStyles($params) {
		$styles = array();

		if($params['bg_image']['id'] !== '') {
			$bg_url = wp_get_attachment_url($params['bg_image']['id']);

			if(!empty($bg_url)) {
				$styles[] = 'background-image: url('.$bg_url.')';
			}

		} else if($params['bg_color'] !== '') {
			$styles[] = 'background-color: '.$params['bg_color'];
		}

		return $styles;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorWorkingHours() );