<?php
class ElementorIconWithText extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_icon_with_text'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Icon With Text', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-icon-with-text';
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
			'custom_icon',
			[
				'label'     => esc_html__( 'Custom Icon', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'hover_custom_icon',
			[
				'label'     => esc_html__( 'Hover Custom Icon', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'custom_icon!' => ''
				]
			]
		);

		$this->add_control(
			'custom_icon_circle',
			[
				'label'     => esc_html__( 'Display Custom Icon in circle', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'), 
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no',
				'condition' => [
					'custom_icon!' => ''
				]
			]
		);

		$this->add_control(
			'icon_position',
			[
				'label'     => esc_html__( 'Icon Position', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Icon Position', 'goodwish' ),
				'options' => array(
					'top' => esc_html__( 'Top', 'goodwish'), 
					'left' => esc_html__( 'Left', 'goodwish'), 
					'left-from-title' => esc_html__( 'Left From Title', 'goodwish'), 
					'right' => esc_html__( 'Right', 'goodwish')
				),
				'default' => 'top'
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
			'text',
			[
				'label'     => esc_html__( 'Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
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
				'type'      => \Elementor\Controls_Manager::TEXT,
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
					'' => esc_html__( '', 'goodwish'), 
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

		$this->start_controls_section(
			'icon_settings',
			[
				'label' => esc_html__( 'Icon Settings', 'goodwish' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon_type',
			[
				'label'     => esc_html__( 'Icon Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'This attribute doesn&#039;t work when Icon Position is Top. In This case Icon Type is Normal', 'goodwish' ),
				'options' => array(
					'normal' => esc_html__( 'Normal', 'goodwish'), 
					'circle' => esc_html__( 'Circle', 'goodwish'), 
					'square' => esc_html__( 'Square', 'goodwish')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'     => esc_html__( 'Icon Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'This attribute doesn&#039;t work when Icon Position is Top', 'goodwish' ),
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
			'custom_icon_size',
			[
				'label'     => esc_html__( 'Custom Icon Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'icon_margin',
			[
				'label'     => esc_html__( 'Icon Margin', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Margin should be set in a top right bottom left format', 'goodwish' )
			]
		);

		$this->add_control(
			'shape_size',
			[
				'label'     => esc_html__( 'Shape Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'icon_hover_color',
			[
				'label'     => esc_html__( 'Icon Hover Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'icon_background_color',
			[
				'label'     => esc_html__( 'Icon Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'description' => esc_html__( 'Icon Background Color (only for square and circle icon type)', 'goodwish' ),
				'condition' => [
					'icon_type' => array( 'square', 'circle' )
				]
			]
		);

		$this->add_control(
			'icon_hover_background_color',
			[
				'label'     => esc_html__( 'Icon Hover Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'description' => esc_html__( 'Icon Hover Background Color (only for square and circle icon type)', 'goodwish' ),
				'condition' => [
					'icon_type' => array( 'square', 'circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_color',
			[
				'label'     => esc_html__( 'Icon Border Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'description' => esc_html__( 'Only for Square and Circle Icon type', 'goodwish' ),
				'condition' => [
					'icon_type' => array( 'square', 'circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_hover_color',
			[
				'label'     => esc_html__( 'Icon Border Hover Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'description' => esc_html__( 'Only for Square and Circle Icon type', 'goodwish' ),
				'condition' => [
					'icon_type' => array( 'square', 'circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_width',
			[
				'label'     => esc_html__( 'Border Width', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Only for Square and Circle Icon type', 'goodwish' ),
				'condition' => [
					'icon_type' => array( 'square', 'circle' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_settings',
			[
				'label' => esc_html__( 'Text Settings', 'goodwish' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
				'default' => 'h4',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_left_padding',
			[
				'label'     => esc_html__( 'Text Left Padding (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_position' => array( 'left' )
				]
			]
		);

		$this->add_control(
			'text_right_padding',
			[
				'label'     => esc_html__( 'Text Right Padding (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_position' => array( 'right' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if ( ! empty( $params['custom_icon'] ) ) {
			$params['custom_icon'] = $params['custom_icon']['id'];
		}

		if ( ! empty( $params['hover_custom_icon'] ) ) {
			$params['hover_custom_icon'] = $params['hover_custom_icon']['id'];
		}

        $params['icon_parameters']      = $this->getIconParameters($params);
        $params['holder_classes']       = $this->getHolderClasses($params);
        $params['title_styles']         = $this->getTitleStyles($params);
        $params['content_styles']       = $this->getContentStyles($params);
        $params['text_styles']          = $this->getTextStyles($params);
        $params['custom_icon_styles']   = $this->getCustomIconMargin($params);
        
        echo goodwish_edge_get_shortcode_module_template_part('templates/iwt', 'icon-with-text', $params['icon_position'], $params);
	}

    private function getIconParameters($params) {
        $params_array = array();

        if(empty($params['custom_icon'])) {
            $iconPackName = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $params_array['icon_pack']   = $params['icon_pack'];
            $params_array[$iconPackName] = $params[$iconPackName];

            if(!empty($params['icon_size'])) {
                $params_array['size'] = $params['icon_size'];
            }

            if(!empty($params['custom_icon_size'])) {
                $params_array['custom_size'] = $params['custom_icon_size'];
            }

            if(!empty($params['icon_type'])) {
                $params_array['type'] = $params['icon_type'];
            }

            $params_array['shape_size'] = $params['shape_size'];

            if(!empty($params['icon_border_color'])) {
                $params_array['border_color'] = $params['icon_border_color'];
            }

            if(!empty($params['icon_border_hover_color'])) {
                $params_array['hover_border_color'] = $params['icon_border_hover_color'];
            }

            if(!empty($params['icon_border_width'])) {
                $params_array['border_width'] = $params['icon_border_width'];
            }

            if(!empty($params['icon_background_color'])) {
                $params_array['background_color'] = $params['icon_background_color'];
            }

            if(!empty($params['icon_hover_background_color'])) {
                $params_array['hover_background_color'] = $params['icon_hover_background_color'];
            }

            $params_array['icon_color'] = $params['icon_color'];

            if(!empty($params['icon_hover_color'])) {
                $params_array['hover_icon_color'] = $params['icon_hover_color'];
            }

            $params_array['icon_animation']       = $params['icon_animation'];
            $params_array['icon_animation_delay'] = $params['icon_animation_delay'];
            $params_array['margin']               = $params['icon_margin'];
        }

        return $params_array;
    }

    private function getHolderClasses($params) {
        $classes = array('edgtf-iwt', 'clearfix');

        if(!empty($params['icon_position'])) {
            switch($params['icon_position']) {
                case 'top':
                    $classes[] = 'edgtf-iwt-icon-top';
                    break;
                case 'left':
                    $classes[] = 'edgtf-iwt-icon-left';
                    break;
                case 'right':
                    $classes[] = 'edgtf-iwt-icon-right';
                    break;
                case 'left-from-title':
                    $classes[] = 'edgtf-iwt-left-from-title';
                    break;
                default:
                    break;
            }
        }

        if(!empty($params['icon_size'])) {
            $classes[] = 'edgtf-iwt-'.str_replace('edgtf-', '', $params['icon_size']);
        }

        if($params['custom_icon_circle'] == 'yes') {
            $classes[] = 'edgtf-iwt-custom-icon-circle';
        }

        return $classes;
    }

    private function getTitleStyles($params) {
        $styles = array();

        if(!empty($params['title_color'])) {
            $styles[] = 'color: '.$params['title_color'];
        }

        return $styles;
    }

    private function getTextStyles($params) {
        $styles = array();

        if(!empty($params['text_color'])) {
            $styles[] = 'color: '.$params['text_color'];
        }

        return $styles;
    }

    private function getContentStyles($params) {
        $styles = array();

        if($params['icon_position'] == 'left' && !empty($params['text_left_padding'])) {
            $styles[] = 'padding-left: '.goodwish_edge_filter_px($params['text_left_padding']).'px';
        }

        if($params['icon_position'] == 'right' && !empty($params['text_right_padding'])) {
            $styles[] = 'padding-right: '.goodwish_edge_filter_px($params['text_right_padding']).'px';
        }

        return $styles;
    }

    private function getCustomIconMargin($params) {
        $styles = array();

        if(!empty($params['icon_margin'])) {
            $styles[] = 'margin: '.$params['icon_margin'];
        }

        return $styles;
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorIconWithText() );