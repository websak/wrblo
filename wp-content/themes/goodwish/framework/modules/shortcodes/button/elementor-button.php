<?php
class ElementorButton extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_button';
	}

	public function get_title() {
		return esc_html__( 'Edge Button', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-button';
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
			'size',
			[
				'label'     => esc_html__( 'Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'goodwish'),
					'small' => esc_html__( 'Small', 'goodwish'),
					'medium' => esc_html__( 'Medium', 'goodwish'),
					'large' => esc_html__( 'Large', 'goodwish'),
					'huge' => esc_html__( 'Extra Large', 'goodwish'),
					'huge-full-width' => esc_html__( 'Extra Large Full Width', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'goodwish'),
					'outline' => esc_html__( 'Outline', 'goodwish'),
					'outline-light' => esc_html__( 'Outline Light', 'goodwish'),
					'solid' => esc_html__( 'Solid', 'goodwish'),
					'solid-dark' => esc_html__( 'Solid Light', 'goodwish'),
					'transparent' => esc_html__( 'Transparent', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'target',
			[
				'label'     => esc_html__( 'Link Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '_self'
			]
		);

		$this->add_control(
			'custom_class',
			[
				'label'     => esc_html__( 'Custom CSS class', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		goodwish_edge_icon_collections()->getElementorParamsArray( $this, '', '' );
		$this->end_controls_section();

		$this->start_controls_section(
			'design_options',
			[
				'label' => esc_html__( 'Design Options', 'goodwish' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
			'hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => esc_html__( 'Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'solid', 'solid-dark', 'outline', 'outline-light', '' )
				]
			]
		);

		$this->add_control(
			'hover_background_color',
			[
				'label'     => esc_html__( 'Hover Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'solid', 'solid-dark', 'outline', 'outline-light', '' )
				]
			]
		);

		$this->add_control(
			'border_color',
			[
				'label'     => esc_html__( 'Border Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'solid', 'solid-dark', 'outline', 'outline-light', '' )
				]
			]
		);

		$this->add_control(
			'hover_border_color',
			[
				'label'     => esc_html__( 'Hover Border Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'solid', 'solid-dark', 'outline', 'outline-light', '' )
				]
			]
		);

		$this->add_control(
			'font_size',
			[
				'label'     => esc_html__( 'Font Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'font_weight',
			[
				'label'     => esc_html__( 'Font Weight', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
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
				'default' => ''
			]
		);

		$this->add_control(
			'margin',
			[
				'label'     => esc_html__( 'Margin', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Insert margin in format: 0px 0px 1px 0px', 'goodwish' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$params['html_type'] = 'anchor';
		$params['hover_animation'] = '';

        if($params['html_type'] !== 'input') {
			$params['icon']   = goodwish_edge_icon_collections()->getElementorIconFromIconPack($params);
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes']      = $this->getButtonClasses($params);
        $params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] :
        $params['button_styles']       = $this->getButtonStyles($params);
        $params['button_data']         = $this->getButtonDataAttr($params);

        echo goodwish_edge_get_shortcode_module_template_part('templates/'.$params['html_type'], 'button', $params['hover_animation'], $params);
	}

    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color'])) {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.goodwish_edge_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight'])) {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

    private function getButtonClasses($params) {
        $buttonClasses = array(
            'edgtf-btn',
            'edgtf-btn-'.$params['size'],
            'edgtf-btn-'.$params['type']
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'edgtf-btn-icon';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = $params['custom_class'];
        }

        return $buttonClasses;
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorButton() );