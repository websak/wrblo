<?php
class ElementorBlockquote extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_blockquote'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Blockquote', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-blockquote';
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
			'text',
			[
				'label'     => esc_html__( 'Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'width',
			[
				'label'     => esc_html__( 'Width (%)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['blockquote_style'] = $this->getBlockquoteStyle($params);

		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/blockquote-template', 'blockquote', '', $params);

		echo $html;

	}

	private function getBlockquoteStyle($params) {
		$blockquote_style = array();

		if ($params['width'] !== '') {
			$width = strstr($params['width'], '%') ? $params['width'] : $params['width'].'%';
			$blockquote_style[] = 'width: '.$width;
		}

		return implode(';', $blockquote_style);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorBlockquote() );