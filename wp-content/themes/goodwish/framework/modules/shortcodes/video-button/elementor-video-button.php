<?php
class ElementorVideoButton extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_video_button'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Video Button', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-video-button';
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
			'video_link',
			[
				'label'     => esc_html__( 'Video Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'button_size',
			[
				'label'     => esc_html__( 'Play Button Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'video_link!' => ''
				]
			]
		);

		$this->add_control(
			'preview_image',
			[
				'label'     => esc_html__( 'Preview Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
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
			'button_color',
			[
				'label'     => esc_html__( 'Button Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h2' => esc_html__( 'h2', 'goodwish'), 
					'h3' => esc_html__( 'h3', 'goodwish'), 
					'h4' => esc_html__( 'h4', 'goodwish'), 
					'h5' => esc_html__( 'h5', 'goodwish'), 
					'h6' => esc_html__( 'h6', 'goodwish')
				),
				'default' => 'h6',
				'condition' => [
					'title!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if(!empty($params['preview_image'])){
			$params['preview_image'] = $params['preview_image']['id'];
		}

		$params['button_style'] = $this->getButtonStyle($params);
        $params['button_border_style'] = $this->getButtonBorderStyle($params);

		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/video-button-template', 'video-button', '', $params);

		echo $html;

	}

	private function getButtonStyle($params) {
		$button_style = array();

		if ($params['button_size'] !== '') {
			$button_size = strstr($params['button_size'], 'px') ? $params['button_size'] : $params['button_size'].'px';
			$button_style[] = 'font-size: '. intval($button_size)*0.8 .'px';
		}
		if ($params['button_color'] !== ''){
			$button_style[] = 'color: '. $params['button_color'];
		}

		return implode(';', $button_style);
	}

    private function getButtonBorderStyle($params) {
        $button_border_style = array();

        if ($params['button_color'] !== ''){
            $button_border_style[] = 'border-color: '. $params['button_color'];
        }

        return implode(';', $button_border_style);
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorVideoButton() );