<?php
class ElementorUnorderedList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_unordered_list'; 
	}

	public function get_title() {
		return esc_html__( 'Edge List - Unordered', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-unordered-list';
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
			'style',
			[
				'label'     => esc_html__( 'Style', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'square' => esc_html__( 'Square', 'goodwish'), 
					'circle' => esc_html__( 'Circle', 'goodwish')
				),
				'default' => 'square'
			]
		);

		$this->add_control(
			'animate',
			[
				'label'     => esc_html__( 'Animate List', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'), 
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'font_size',
			[
				'label'     => esc_html__( 'Font size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'font_weight',
			[
				'label'     => esc_html__( 'Font Weight', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'goodwish'), 
					'light' => esc_html__( 'Light', 'goodwish'), 
					'normal' => esc_html__( 'Normal', 'goodwish'), 
					'bold' => esc_html__( 'Bold', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'padding_left',
			[
				'label'     => esc_html__( 'Padding left (px)', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<ul><li>' . esc_html__( 'Lorem Ipsum', 'goodwish' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'goodwish' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'goodwish' ) . '</li></ul>'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		
		//Extract params for use in method
		extract($params);
		
		$list_item_classes = "";

        if ($params['style'] != '') {
			if($params['style'] == 'circle'){
				$list_item_classes .= ' edgtf-circle';
			}elseif ($params['style'] == 'square') {
				$list_item_classes .= ' edgtf-square';
			}
        }

		if ($params['animate'] == 'yes') {
			$list_item_classes .= ' edgtf-animate-list';
		}
		
		$list_style = '';
		if($params['padding_left'] != '') {
			$list_style .= 'padding-left: ' . $params['padding_left'] .'px;';
		}

		if(!empty($font_size)) {
			$list_style .= 'font-size: '.goodwish_edge_filter_px($font_size).'px';
		}

        $html = '<div class="edgtf-unordered-list '.$list_item_classes.'" '.  goodwish_edge_get_inline_style($list_style).'>'.$content.'</div>';
        echo $html;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorUnorderedList() );