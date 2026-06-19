<?php
class ElementorPieChartDoughnut extends \Elementor\Widget_Base {

	private $chartFields = 10;

	public function get_name() {
		return 'edgtf_pie_chart_doughnut'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Pie Chart (Doughnut)', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-pie-chart-doughnut';
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
			'width',
			[
				'label'     => esc_html__( 'Width', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'height',
			[
				'label'     => esc_html__( 'Height', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_1',
			[
				'label'     => esc_html__( 'Chart Value 1', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_1',
			[
				'label'     => esc_html__( 'Chart Color 1', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_1',
			[
				'label'     => esc_html__( 'Chart Legend 1', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_2',
			[
				'label'     => esc_html__( 'Chart Value 2', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_2',
			[
				'label'     => esc_html__( 'Chart Color 2', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_2',
			[
				'label'     => esc_html__( 'Chart Legend 2', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_3',
			[
				'label'     => esc_html__( 'Chart Value 3', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_3',
			[
				'label'     => esc_html__( 'Chart Color 3', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_3',
			[
				'label'     => esc_html__( 'Chart Legend 3', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_4',
			[
				'label'     => esc_html__( 'Chart Value 4', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_4',
			[
				'label'     => esc_html__( 'Chart Color 4', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_4',
			[
				'label'     => esc_html__( 'Chart Legend 4', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_5',
			[
				'label'     => esc_html__( 'Chart Value 5', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_5',
			[
				'label'     => esc_html__( 'Chart Color 5', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_5',
			[
				'label'     => esc_html__( 'Chart Legend 5', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_6',
			[
				'label'     => esc_html__( 'Chart Value 6', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_6',
			[
				'label'     => esc_html__( 'Chart Color 6', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_6',
			[
				'label'     => esc_html__( 'Chart Legend 6', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_7',
			[
				'label'     => esc_html__( 'Chart Value 7', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_7',
			[
				'label'     => esc_html__( 'Chart Color 7', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_7',
			[
				'label'     => esc_html__( 'Chart Legend 7', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_8',
			[
				'label'     => esc_html__( 'Chart Value 8', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_8',
			[
				'label'     => esc_html__( 'Chart Color 8', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_8',
			[
				'label'     => esc_html__( 'Chart Legend 8', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_9',
			[
				'label'     => esc_html__( 'Chart Value 9', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_9',
			[
				'label'     => esc_html__( 'Chart Color 9', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_9',
			[
				'label'     => esc_html__( 'Chart Legend 9', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_value_10',
			[
				'label'     => esc_html__( 'Chart Value 10', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'chart_color_10',
			[
				'label'     => esc_html__( 'Chart Color 10', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_legend_10',
			[
				'label'     => esc_html__( 'Chart Legend 10', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		$params['id'] = mt_rand(1000, 9999);
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['legend_data'] = $this->getPieChartLegendData($params);

		$html = goodwish_edge_get_shortcode_module_template_part('templates/pie-chart-doughnut', 'pie-chart-doughnut', '', $params);

		echo $html;

	}

	private function getPieChartData($params) {

		$pieChartData = array();

		for ( $i = 1; $i <= $this->chartFields; $i++ ) {

			if ( isset($params['chart_value_' . $i]) && $params['chart_value_' . $i] !== '' ) {
				$pieChartData['data-value-' . $i] = $params['chart_value_' . $i];
			}
			if ( isset($params['chart_color_' . $i]) && $params['chart_color_' . $i] !== '' ) {
				$pieChartData['data-color-' . $i] = $params['chart_color_' . $i];
			}
			if ( isset($params['chart_legend_' . $i]) && $params['chart_legend_' . $i] !== '' ) {
				$pieChartData['data-legend-' . $i] = $params['chart_legend_' . $i];
			}

		}

		return $pieChartData;

	}

	private function getPieChartLegendData($params) {

		$legendData = array();
		$legendItem = array();

		for ( $i = 1; $i <= $this->chartFields; $i++ ) {

			if ( isset($params['chart_color_' . $i]) && $params['chart_color_' . $i] !== '' ) {
				$legendItem['color'] = 'background-color: '. $params['chart_color_' . $i];
			}
			if ( isset($params['chart_legend_' . $i]) && $params['chart_legend_' . $i] !== '' ) {
				$legendItem['legend'] = $params['chart_legend_' . $i];
			}

			if (!empty($legendItem)) {
				$legendData[] = $legendItem;
				unset($legendItem);
			}

		}

		return $legendData;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorPieChartDoughnut() );