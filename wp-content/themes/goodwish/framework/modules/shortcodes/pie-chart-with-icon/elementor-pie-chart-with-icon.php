<?php
class ElementorPieChartWithIcon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_pie_chart_with_icon'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Pie Chart With Icon', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-pie-chart-with-icon';
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
			'percent',
			[
				'label'     => esc_html__( 'Percentage', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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

		goodwish_edge_icon_collections()->getElementorParamsArray( $this, '', '' );
		$this->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'size',
			[
				'label'     => esc_html__( 'Size(px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'margin_below_chart',
			[
				'label'     => esc_html__( 'Margin below chart (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'active_color',
			[
				'label'     => esc_html__( 'Active Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'inactive_color',
			[
				'label'     => esc_html__( 'Inactive Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
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
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_pack' => array( 'font_awesome', 'font_elegant', 'ico_moon', 'ion_icons', 'linea_icons', 'linear_icons', 'simple_line_icons', 'dripicons' )
				]
			]
		);

		$this->add_control(
			'icon_custom_size',
			[
				'label'     => esc_html__( 'Icon Size (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_pack' => array( 'font_awesome', 'font_elegant', 'ico_moon', 'ion_icons', 'linea_icons', 'linear_icons', 'simple_line_icons', 'dripicons' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['title_tag'] = $this->getValidTitleTag($params);
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['pie_chart_style'] = $this->getPieChartStyle($params);
		$params['title_pie_chart_style'] = $this->getTitlePieChartStyle($params);
		$params['icon'] = $this->getPieChartIcon($params);

		$html = goodwish_edge_get_shortcode_module_template_part('templates/pie-chart-with-icon', 'pie-chart-with-icon', '', $params);

		echo $html;

	}

	private function getValidTitleTag($params) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

	}

	private function getIconStyles($params) {

		$iconStyles = array();

		if ($params['icon_color'] !== '') {
			$iconStyles[] = 'color: ' . $params['icon_color'];
		}

		if ($params['icon_custom_size'] !== '') {
			$iconStyles[] = 'font-size: ' . $params['icon_custom_size'] . 'px';
		}

		return implode(';', $iconStyles);

	}

	private function getPieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['margin_below_chart'] !== '') {
			$pieChartStyle[] = 'margin-top: ' . $params['margin_below_chart'] . 'px';
		}

		return $pieChartStyle;

	}

	private function getTitlePieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['title_color'] !== '') {
			$pieChartStyle[] = 'color: ' . $params['title_color'];
		}

		return $pieChartStyle;

	}

	private function getPieChartData($params) {

		$pieChartData = array();

		if( $params['size'] !== '' ) {
			$pieChartData['data-size'] = $params['size'];
		}
		if( $params['percent'] !== '' ) {
			$pieChartData['data-percent'] = $params['percent'];
		}
        if( $params['active_color'] !== '') {
            $pieChartData['data-bar-color'] = $params['active_color'];
        }
        if( $params['inactive_color'] !== '') {
            $pieChartData['data-track-color'] = $params['inactive_color'];
        }

		return $pieChartData;

	}

	private function getPieChartIcon($params) {

		$icon = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconStyles = array();
		$iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);

		$pie_chart_icon = goodwish_edge_icon_collections()->renderIcon( $params[$icon], $params['icon_pack'], $iconStyles );

		return $pie_chart_icon;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorPieChartWithIcon() );