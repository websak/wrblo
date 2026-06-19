<?php
class ElementorPieChart extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_pie_chart'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Pie Chart', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-pie-chart-basic';
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
			'type_of_central_text',
			[
				'label'     => esc_html__( 'Type of Central text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'percent' => esc_html__( 'Percent', 'goodwish'),
					'title' => esc_html__( 'Title', 'goodwish')
				),
				'default' => 'percent'
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
				'default' => 'h4'
			]
		);

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
			'percent_color',
			[
				'label'     => esc_html__( 'Percent Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
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


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['title_tag'] = $this->getValidTitleTag($params);
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['pie_chart_style'] = $this->getPieChartStyle($params);
        $params['title_pie_chart_style'] = $this->getTitlePieChartStyle($params);
        $params['percent_pie_chart_style'] = $this->getPercentPieChartStyle($params);

		$html = goodwish_edge_get_shortcode_module_template_part('templates/pie-chart-basic', 'pie-chart-basic', '', $params);

		echo $html;


	}

	private function getValidTitleTag($params) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

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

    private function getPercentPieChartStyle($params) {

        $pieChartStyle = array();

        if ($params['percent_color'] !== '') {
            $pieChartStyle[] = 'color: ' . $params['percent_color'];
        }

        return $pieChartStyle;

    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorPieChart() );