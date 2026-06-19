<?php
class ElementorEventInfo extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_event_info'; 
	}

	public function get_title() {
		return esc_html__( 'Event Single Info', 'goodwish-core' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-event-info';
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
			'event_id',
			[
				'label'     => esc_html__( 'Event ID', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'If event ID not set, current page ID will be taken', 'goodwish-core' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h2' => esc_html__( 'h2', 'goodwish-core'), 
					'h3' => esc_html__( 'h3', 'goodwish-core'), 
					'h4' => esc_html__( 'h4', 'goodwish-core'), 
					'h5' => esc_html__( 'h5', 'goodwish-core'), 
					'h6' => esc_html__( 'h6', 'goodwish-core')
				),
				'default' => 'h5',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'show_categories',
			[
				'label'     => esc_html__( 'Show Categories', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'show_location',
			[
				'label'     => esc_html__( 'Show Location', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'show_date',
			[
				'label'     => esc_html__( 'Show Date', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'date-duration' => esc_html__( 'Show Start Date and Duration', 'goodwish-core'), 
					'start-end-date' => esc_html__( 'Show Start and End Date', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'date-duration'
			]
		);

		$this->add_control(
			'show_additional',
			[
				'label'     => esc_html__( 'Show Aditional Info', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if ($params['event_id'] == ''){
			$params['event_id'] = get_the_ID();
		}

		$params['date_params'] = $this->getDateParams($params);
		$params['custom_field_html'] = $this->getCustomFieldHtml($params);

		$html = edgt_core_get_shortcode_module_template_part('events','event-info', '', $params);
		echo $html;
	}

	private function getDateParams($params){
		$date_params = array();

		if (function_exists('goodwish_edge_event_get_date_params')){
			$date_params = goodwish_edge_event_get_date_params($params['event_id']);

			if ($params['show_date'] == 'date-duration'){
				$date_params['second_title'] = esc_html__('Duration:','edge-cpt');
				$date_params['second_desc'] = $date_params['duration'];
			}
			elseif ($params['show_date'] == 'start-end-date') {
				$date_params['second_title'] = esc_html__('End Date:','edge-cpt');
				$date_params['second_desc'] = $date_params['end_date'];
			}
		}

		return $date_params;
	}

	public function getCustomFieldHtml($params){
		$html = '';

		if (function_exists('goodwish_edge_get_repeater_values')){
			$custom_fields = goodwish_edge_get_repeater_values($params['event_id'], array('edgtf_event_title','edgtf_event_description'));

			if(is_array($custom_fields) && count($custom_fields) && $params['show_additional'] == 'yes') {
				foreach($custom_fields as $custom_field) {
					$html .= '<div class="edgtf-esi-item">';
					if(!empty($custom_field['edgtf_event_title'])) {
						$html .= '<span class="edgtf-esi-title">'.esc_html($custom_field['edgtf_event_title']).':</span>';
					}
					if(!empty($custom_field['edgtf_event_description'])) {
						$html .= '<span class="edgtf-esi-desc">'.esc_html($custom_field['edgtf_event_description']).'</span>';
					}
					$html .= '</div>';
				}
			}
		}
		
		return $html;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEventInfo() );