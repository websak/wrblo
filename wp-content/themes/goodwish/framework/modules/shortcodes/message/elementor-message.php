<?php
class ElementorMessage extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_message'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Message', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-message';
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
			'type',
			[
				'label'     => esc_html__( 'Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'normal' => esc_html__( 'Normal', 'goodwish'),
					'with_icon' => esc_html__( 'With Icon', 'goodwish')
				),
				'default' => 'normal'
			]
		);

		goodwish_edge_icon_collections()->getElementorParamsArray( $this, array('type' => array('with_icon')), '' );

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'with_icon' )
				]
			]
		);

		$this->add_control(
			'icon_background_color',
			[
				'label'     => esc_html__( 'Icon Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'with_icon' )
				]
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => esc_html__( 'Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'border_color',
			[
				'label'     => esc_html__( 'Border Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'border_width',
			[
				'label'     => esc_html__( 'Border Width (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default value is 0', 'goodwish' )
			]
		);

		$this->add_control(
			'close_icon',
			[
				'label'     => esc_html__( 'Close Icon Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $params['content']= preg_replace('#^<\/p>|<p>$#', '', $params['content']); // delete p tag before and after content

		//Get HTML from template based on type of team
		$iconPackName = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$message_classes = '';
		
		if ($params['type'] == 'with_icon') {
			$message_classes .= ' edgtf-with-icon';
			$params['icon'] = $params[$iconPackName];
			$params['icon_attributes'] = $this->getIconStyle($params);
		}
		$params['message_classes'] = $message_classes;
		$params['message_styles'] = $this->getHolderStyle($params);
		$params['close_icon_style'] = $this->getCloseColorStyle($params);
		
		$html = goodwish_edge_get_shortcode_module_template_part('templates/message-holder-template', 'message', '', $params);
		
		echo $html;
	}

	private function getIconStyle($params){
		$iconStyles = array();

        if(!empty($params['icon_color'])) {
            $iconStyles[] = 'color: '.$params['icon_color'];
        }

        if(!empty($params['icon_background_color'])) {
            $iconStyles[] = 'background-color:'.$params['icon_background_color'].'';
        }

        return implode(';', $iconStyles);
	}

	private function getHolderStyle($params){
		$holderStyles = array();
		
		if(!empty($params['background_color'])) {
            $holderStyles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $holderStyles[] = 'border-color:'.$params['border_color'].'';
        }
		if(!empty($params['border_width'])) {
            $holderStyles[] = 'border-width:'.$params['border_width'].'px';
		}

        return implode(';', $holderStyles);
	}

	private function getCloseColorStyle($params) {
		$close_icon_style = array();

		if($params['close_icon'] != '') {
			$close_icon_style[] = 'color: '.$params['close_icon'];
		}

		return $close_icon_style;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorMessage() );