<?php
class ElementorSectionSubtitle extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_section_subtitle'; 
	}

	public function get_title() {
		return esc_html__( 'Section Subtitle', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-section-subtitle';
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
			'subtitle_text',
			[
				'label'     => esc_html__( 'Subtitle Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();



		$params['subtitle_style'] = array();
		if($params['text_align'] != '') {
			$params['subtitle_style'][] = 'text-align:' . $params['text_align'];
		}
		if($params['text_color'] != '') {
			$params['subtitle_style'][] = 'color:' . $params['text_color'];
		}
		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/section-subtitle-template', 'section-subtitle', '', $params);

		echo $html;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorSectionSubtitle() );