<?php
class ElementorIconListItem extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_icon_list_item'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Icon List Item', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-icon-list-item';
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
			'icon_size',
			[
				'label'     => esc_html__( 'Icon Size (px)', 'goodwish' ),
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
			'title',
			[
				'label'     => esc_html__( 'Title', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'title_size',
			[
				'label'     => esc_html__( 'Title size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
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

		$this->end_controls_section();

		$this->start_controls_section(
			'design_options',
			[
				'label' => esc_html__( 'Design Options', 'goodwish' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		
		//Extract params for use in method
		extract($params);
		$iconPackName = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconClasses = '';
		
		//generate icon holder classes
		$iconClasses .= 'edgtf-icon-list-item-icon ';
		$iconClasses .= $params['icon_pack'];
		
		$params['icon_classes'] = $iconClasses;
		$params['icon'] = $params[$iconPackName];		
		$params['icon_attributes']['style'] =  $this->getIconStyle($params);		
		$params['title_style'] =  $this->getTitleStyle($params);

		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/icon-list-item-template', 'icon-list-item', '', $params);
		echo $html;
	}

	private function getIconStyle($params){
		
		$iconStylesArray = array();
		if(!empty($params['icon_color'])) {
			$iconStylesArray[] = 'color:' . $params['icon_color'];
		}

		if (!empty($params['icon_size'])) {
			$iconStylesArray[] = 'font-size:' .goodwish_edge_filter_px( $params['icon_size']) . 'px';
		}
		
		return implode(';', $iconStylesArray);
	}

	private function getTitleStyle($params){
		$titleStylesArray = array();
		if(!empty($params['title_color'])) {
			$titleStylesArray[] = 'color:' . $params['title_color'];
		}

		if (!empty($params['title_size'])) {
			$titleStylesArray[] = 'font-size:' .goodwish_edge_filter_px( $params['title_size']) . 'px';
		}

		if (!empty($params['font_weight'])) {
			$titleStylesArray[] = 'font-weight:' .goodwish_edge_filter_px( $params['font_weight']);
		}
		
		 return implode(';', $titleStylesArray);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorIconListItem() );