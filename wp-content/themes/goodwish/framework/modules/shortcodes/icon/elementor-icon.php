<?php
class ElementorIcon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_icon'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Icon', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-icon';
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
		goodwish_edge_icon_collections()->getElementorParamsArray( $this, '', '' );
		$this->add_control(
			'size',
			[
				'label'     => esc_html__( 'Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'edgtf-icon-tiny' => esc_html__( 'Tiny', 'goodwish'), 
					'edgtf-icon-small' => esc_html__( 'Small', 'goodwish'), 
					'edgtf-icon-medium' => esc_html__( 'Medium', 'goodwish'), 
					'edgtf-icon-large' => esc_html__( 'Large', 'goodwish'), 
					'edgtf-icon-huge' => esc_html__( 'Very Large', 'goodwish')
				),
				'default' => 'edgtf-icon-tiny'
			]
		);

		$this->add_control(
			'custom_size',
			[
				'label'     => esc_html__( 'Custom Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'normal' => esc_html__( 'Normal', 'goodwish'), 
					'circle' => esc_html__( 'Circle', 'goodwish'), 
					'square' => esc_html__( 'Square', 'goodwish')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'     => esc_html__( 'Border radius', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Please insert border radius(Rounded corners) in px. For example: 4 ', 'goodwish' ),
				'condition' => [
					'type' => array( 'square' )
				]
			]
		);

		$this->add_control(
			'shape_size',
			[
				'label'     => esc_html__( 'Shape Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type' => array( 'circle', 'square' )
				]
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'border_color',
			[
				'label'     => esc_html__( 'Border Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'circle', 'square' )
				]
			]
		);

		$this->add_control(
			'border_width',
			[
				'label'     => esc_html__( 'Border Width', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter just number. Omit pixels', 'goodwish' ),
				'condition' => [
					'type' => array( 'circle', 'square' )
				]
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => esc_html__( 'Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'circle', 'square' )
				]
			]
		);

		$this->add_control(
			'hover_icon_color',
			[
				'label'     => esc_html__( 'Hover Icon Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'hover_border_color',
			[
				'label'     => esc_html__( 'Hover Border Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'circle', 'square' )
				]
			]
		);

		$this->add_control(
			'hover_background_color',
			[
				'label'     => esc_html__( 'Hover Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'circle', 'square' )
				]
			]
		);

		$this->add_control(
			'margin',
			[
				'label'     => esc_html__( 'Margin', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Margin (top right bottom left)', 'goodwish' )
			]
		);

		$this->add_control(
			'icon_animation',
			[
				'label'     => esc_html__( 'Icon Animation', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'No', 'goodwish'), 
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'icon_animation_delay',
			[
				'label'     => esc_html__( 'Icon Animation Delay (ms)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_animation' => array( 'yes' )
				]
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
			'anchor_icon',
			[
				'label'     => esc_html__( 'Use Link as Anchor', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'description' => esc_html__( 'Check this box to use icon as anchor link (eg. #contact)', 'goodwish' ),
				'condition' => [
					'link!' => ''
				]
			]
		);

		$this->add_control(
			'target',
			[
				'label'     => esc_html__( 'Target', 'goodwish' ),
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


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $iconPackName = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        //generate icon holder classes
		$iconHolderClasses = array('edgtf-icon-shortcode', $params['type']);

        if($params['icon_animation'] == 'yes') {
            $iconHolderClasses[] = 'edgtf-icon-animation';
        }

        if($params['custom_size'] == '') {
            $iconHolderClasses[] = $params['size'];
        }

        //prepare params for template
        $params['icon']                  = $params[$iconPackName];
        $params['icon_holder_classes']   = $iconHolderClasses;
        $params['icon_holder_styles']    = $this->generateIconHolderStyles($params);
        $params['icon_holder_data']      = $this->generateIconHolderData($params);
        $params['icon_params']           = $this->generateIconParams($params);
        $params['icon_animation_holder'] = isset($params['icon_animation']) && $params['icon_animation'] == 'yes';
        $params['icon_animation_holder_styles'] = $this->generateIconAnimationHolderStyles($params);
		$params['link_class'] = $this->getLinkClass($params);

        $html = goodwish_edge_get_shortcode_module_template_part('templates/icon', 'icon', '', $params);

        echo $html;
	}

    private function generateIconParams($params) {
        $iconParams = array('icon_attributes' => array());

        $iconParams['icon_attributes']['style'] = $this->generateIconStyles($params);
        $iconParams['icon_attributes']['class'] = 'edgtf-icon-element';

        return $iconParams;
    }

    private function generateIconStyles($params) {
        $iconStyles = array();

        if(!empty($params['icon_color'])) {
            $iconStyles[] = 'color: '.$params['icon_color'];
        }

        if(($params['type'] !== 'normal' && !empty($params['shape_size'])) ||
           ($params['type'] == 'normal')
        ) {
            if(!empty($params['custom_size'])) {
                $iconStyles[] = 'font-size:'.goodwish_edge_filter_px($params['custom_size']).'px';
            }
        }

        return implode(';', $iconStyles);
    }

    private function generateIconHolderStyles($params) {
        $iconHolderStyles = array();

		if(isset($params['margin']) && $params['margin'] !== '') {
			$iconHolderStyles[] = 'margin: '.$params['margin'];
		}

        //generate styles attribute only if type isn't normal
        if(isset($params['type']) && $params['type'] !== 'normal') {

            $shapeSize = '';
            if(!empty($params['shape_size'])) {
                $shapeSize = $params['shape_size'];
            } elseif(!empty($params['custom_size'])) {
                $shapeSize = $params['custom_size'];
            }

            if(!empty($shapeSize)) {
                $iconHolderStyles[] = 'width: '.goodwish_edge_filter_px($shapeSize).'px';
                $iconHolderStyles[] = 'height: '.goodwish_edge_filter_px($shapeSize).'px';
                $iconHolderStyles[] = 'line-height: '.goodwish_edge_filter_px($shapeSize).'px';
            }

            if(!empty($params['background_color'])) {
                $iconHolderStyles[] = 'background-color: '.$params['background_color'];
            }

            if(!empty($params['border_color']) && (isset($params['border_width']) && $params['border_width'] !== '')) {
				$iconHolderStyles[] = 'border-style: solid';
				$iconHolderStyles[] = 'border-color: '.$params['border_color'];
				$iconHolderStyles[] = 'border-width: '.goodwish_edge_filter_px($params['border_width']).'px';
			} else if(isset($params['border_width']) && $params['border_width'] !== ''){
				$iconHolderStyles[] = 'border-style: solid';
				$iconHolderStyles[] = 'border-width: '.goodwish_edge_filter_px($params['border_width']).'px';
			} else if(!empty($params['border_color'])){
				$iconHolderStyles[] = 'border-color: '.$params['border_color'];
			}

            if($params['type'] == 'square') {
                if(isset($params['border_radius']) && $params['border_radius'] !== '') {
                    $iconHolderStyles[] = 'border-radius: '.goodwish_edge_filter_px($params['border_radius']).'px';
                }
            }
        }

        return $iconHolderStyles;
    }

    private function generateIconHolderData($params) {
        $iconHolderData = array();

        if(isset($params['type']) && $params['type'] !== 'normal') {
            if(!empty($params['hover_border_color'])) {
                $iconHolderData['data-hover-border-color'] = $params['hover_border_color'];
            }

            if(!empty($params['hover_background_color'])) {
                $iconHolderData['data-hover-background-color'] = $params['hover_background_color'];
            }
        }

        if((isset($params['icon_animation']) && $params['icon_animation'] == 'yes')
           && (isset($params['icon_animation_delay']) && $params['icon_animation_delay'] !== '')
        ) {
            $iconHolderData['data-animation-delay'] = $params['icon_animation_delay'];
        }

        if(!empty($params['hover_icon_color'])) {
            $iconHolderData['data-hover-color'] = $params['hover_icon_color'];
        }

        if(!empty($params['icon_color'])) {
            $iconHolderData['data-color'] = $params['icon_color'];
        }

        return $iconHolderData;
    }

    private function generateIconAnimationHolderStyles($params) {
        $styles = array();

        if((isset($params['icon_animation']) && $params['icon_animation'] == 'yes')
           && (isset($params['icon_animation_delay']) && $params['icon_animation_delay'] !== '')
        ) {
            $styles[] = 'transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-webkit-transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-moz-transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-ms-transition-delay: '.$params['icon_animation_delay'].'ms';
        }

        return $styles;
    }

	private function getLinkClass($params) {
		$class = array();

		if(isset($params['anchor_icon']) && $params['anchor_icon'] == 'yes') {
			$class[] = 'edgtf-anchor';
		}

		return implode(' ', $class);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorIcon() );