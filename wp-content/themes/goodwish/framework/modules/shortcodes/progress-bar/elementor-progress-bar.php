<?php
class ElementorProgressBar extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_progress_bar'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Progress Bar', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-progress-bar';
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
				'default' => 'h6'
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
			'percentage_type',
			[
				'label'     => esc_html__( 'Percentage Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'floating' => esc_html__( 'Floating', 'goodwish'), 
					'static' => esc_html__( 'Static', 'goodwish')
				),
				'default' => 'floating',
				'condition' => [
					'percent!' => ''
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
			'number_color',
			[
				'label'     => esc_html__( 'Number Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['content_style'] = '';
		$params['outer_style'] = '';
		$params['title_style'] = '';
		$params['number_style'] = '';

		$params['percentage_classes'] = $this->getPercentageClasses($params);

		if(!empty($params['active_color'])){
			$params['content_style'] = 'background-color:'.$params['active_color'];
		}
		if(!empty($params['inactive_color'])){
			$params['outer_style'] = 'background-color:'.$params['inactive_color'];
		}
		if(!empty($params['title_color'])){
			$params['title_style'] = 'color:'.$params['title_color'];
		}
		if(!empty($params['number_color'])){
			$params['number_style'] = 'color:'.$params['number_color'];
		}
        //init variables
		$html = goodwish_edge_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        echo $html;
		
	}

	private function getPercentageClasses($params){
		
		$percentClassesArray = array();
		
		if(!empty($params['percentage_type']) !=''){

			$percentClassesArray[]= 'edgtf-'.$params['percentage_type'];
		}
		return implode(' ', $percentClassesArray);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorProgressBar() );