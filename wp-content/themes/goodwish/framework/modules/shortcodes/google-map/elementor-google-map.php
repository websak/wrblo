<?php
class ElementorGoogleMap extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_google_map'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Google Map', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-google-map';
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
			'address1',
			[
				'label'     => esc_html__( 'Address 1', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'address2',
			[
				'label'     => esc_html__( 'Address 2', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'address1!' => ''
				]
			]
		);

		$this->add_control(
			'address3',
			[
				'label'     => esc_html__( 'Address 3', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'address2!' => ''
				]
			]
		);

		$this->add_control(
			'address4',
			[
				'label'     => esc_html__( 'Address 4', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'address3!' => ''
				]
			]
		);

		$this->add_control(
			'address5',
			[
				'label'     => esc_html__( 'Address 5', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'address4!' => ''
				]
			]
		);

		$this->add_control(
			'custom_map_style',
			[
				'label'     => esc_html__( 'Custom Map Style', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Enabling this option will allow Map editing', 'goodwish' ),
				'options' => array(
					'false' => esc_html__( 'No', 'goodwish'),
					'true' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'false'
			]
		);

		$this->add_control(
			'color_overlay',
			[
				'label'     => esc_html__( 'Color Overlay', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'description' => esc_html__( 'Choose a Map color overlay', 'goodwish' ),
				'condition' => [
					'custom_map_style' => array( 'true' )
				]
			]
		);

		$this->add_control(
			'saturation',
			[
				'label'     => esc_html__( 'Saturation', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Choose a level of saturation (-100 = least saturated, 100 = most saturated)', 'goodwish' ),
				'condition' => [
					'custom_map_style' => array( 'true' )
				]
			]
		);

		$this->add_control(
			'lightness',
			[
				'label'     => esc_html__( 'Lightness', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Choose a level of lightness (-100 = darkest, 100 = lightest)', 'goodwish' ),
				'condition' => [
					'custom_map_style' => array( 'true' )
				]
			]
		);

		$this->add_control(
			'pin',
			[
				'label'     => esc_html__( 'Pin', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select a pin image to be used on Google Map', 'goodwish' )
			]
		);

		$this->add_control(
			'zoom',
			[
				'label'     => esc_html__( 'Map Zoom', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter a zoom factor for Google Map (0 = whole worlds, 19 = individual buildings)', 'goodwish' )
			]
		);

		$this->add_control(
			'scroll_wheel',
			[
				'label'     => esc_html__( 'Zoom Map on Mouse Wheel', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Enabling this option will allow users to zoom in on Map using mouse wheel', 'goodwish' ),
				'options' => array(
					'false' => esc_html__( 'No', 'goodwish'),
					'true' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'false'
			]
		);

		$this->add_control(
			'map_height',
			[
				'label'     => esc_html__( 'Map Height', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$rand_id = mt_rand(100000,3000000);

		$params['map_data'] = $this->getMapDate($params, $rand_id);
		$params['map_id'] = 'edgtf-map-'.$rand_id;

		$html = goodwish_edge_get_shortcode_module_template_part('templates/google-map-template', 'google-map', '', $params);

		echo $html;
	}

	private function getMapDate($params, $id) {

		$map_data = array();

		$addresses_array = array();
		if ($params['address1'] != '') {
			array_push($addresses_array, esc_attr($params['address1']));
		}
		if ($params['address2'] != '') {
			array_push($addresses_array, esc_attr($params['address2']));
		}
		if ($params['address3'] != '') {
			array_push($addresses_array, esc_attr($params['address3']));
		}
		if ($params['address4'] != '') {
			array_push($addresses_array, esc_attr($params['address4']));
		}
		if ($params['address5'] != '') {
			array_push($addresses_array, esc_attr($params['address5']));
		}

		if ($params['pin']['id'] != "") {
			$map_pin = wp_get_attachment_image_src($params['pin']['id'], 'full', true);
			$map_pin = $map_pin[0];
		} else {
			$map_pin = get_template_directory_uri() . "/assets/img/pin.png";
		}

		$map_data[] = "data-addresses='[\"". implode('","', $addresses_array) . "\"]'";
		$map_data[] = 'data-custom-map-style='. $params['custom_map_style'];
		$map_data[] = 'data-color-overlay='. $params['color_overlay'];
		$map_data[] = 'data-saturation='. $params['saturation'];
		$map_data[] = 'data-lightness='. $params['lightness'];
		$map_data[] = 'data-zoom='. $params['zoom'];
		$map_data[] = 'data-pin='. $map_pin;
		$map_data[] = 'data-unique-id='. $id;
		$map_data[] = 'data-scroll-wheel='. $params['scroll_wheel'];
		$map_data[] = 'data-height='. $params['map_height'];

		return implode(' ', $map_data);

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorGoogleMap() );