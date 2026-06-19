<?php
class ElementorBanner extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_banner'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Banner', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-banner';
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
			'image',
			[
				'label'     => esc_html__( 'Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label'     => esc_html__( 'Hover overlay Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
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
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1' => esc_html__( 'Heading 1', 'goodwish'), 
					'h2' => esc_html__( 'Heading 2', 'goodwish'), 
					'h3' => esc_html__( 'Heading 3', 'goodwish'), 
					'h4' => esc_html__( 'Heading 4', 'goodwish'), 
					'h5' => esc_html__( 'Heading 5', 'goodwish'), 
					'h6' => esc_html__( 'Heading 6', 'goodwish')
				),
				'default' => 'h3'
			]
		);

		$this->add_control(
			'title_font_size',
			[
				'label'     => esc_html__( 'Title Font Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'subtitle',
			[
				'label'     => esc_html__( 'Subtitle', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Subtitle Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'link',
			[
				'label'     => esc_html__( 'Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'     => esc_html__( 'Link Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'target',
			[
				'label'     => esc_html__( 'Link Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Self', 'goodwish'), 
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '_self',
				'condition' => [
					'link!' => ''
				]
			]
		);

		$this->add_control(
			'link_color',
			[
				'label'     => esc_html__( 'Link Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['image']= wp_get_attachment_url($params['image']['id']);
        $params['img_hover_style'] =  $this->getImageHoverStyle($params);
		$params['title_font_style'] =  $this->getTitleFontStyle($params);
		$params['subtitle_font_style'] =  $this->getSubtitleFontStyle($params);
		$params['link_style'] =  $this->getLinkStyle($params);

		$html = goodwish_edge_get_shortcode_module_template_part('templates/banner-template', 'banner', '', $params);

		echo $html;
	}

	private function getTitleFontStyle($params){
		$titleStylesArray = array();

		if(!empty($params['title_color'])) {
			$titleStylesArray[] = 'color:' . $params['title_color'];
		}

		if(!empty($params['title_font_size'])) {
			$titleStylesArray[] = 'font-size:' . $params['title_font_size'];
		}

		return implode(';', $titleStylesArray);
	}

	private function getSubtitleFontStyle($params){
		$subtitleStylesArray = array();
		
		if(!empty($params['subtitle_color'])) {
			$subtitleStylesArray[] = 'color:' . $params['subtitle_color'];
		}

		return implode(';', $subtitleStylesArray);
	}

	private function getLinkStyle($params){
		$linkStylesArray = array();
		
		if(!empty($params['link_color'])) {
			$linkStylesArray[] = 'color:' . $params['link_color'];
		}

		return implode(';', $linkStylesArray);
	}

    private function getImageHoverStyle($params){
        $imgHoverStylesArray = array();

        if(!empty($params['overlay_color'])) {
            $imgHoverStylesArray[] = 'background-color:' . $params['overlay_color'];
        }

        return implode(';', $imgHoverStylesArray);
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorBanner() );