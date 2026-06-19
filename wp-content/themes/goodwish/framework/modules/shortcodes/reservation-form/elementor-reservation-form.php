<?php
class ElementorReservationForm extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_reservation_form'; 
	}

	public function get_title() {
		return esc_html__( 'Reservation Form', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-reservation-form';
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
			'open_table_id',
			[
				'label'     => esc_html__( 'OpenTable ID', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();



		if($params['open_table_id'] === '') {
			$params['open_table_id'] = goodwish_edge_options()->getOptionValue('open_table_id');
		}

		echo goodwish_edge_get_shortcode_module_template_part('templates/reservation-form-template', 'reservation-form', '', $params);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorReservationForm() );