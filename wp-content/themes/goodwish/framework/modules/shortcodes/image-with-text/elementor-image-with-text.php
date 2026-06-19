<?php
class ElementorImageWithText extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_image_with_text'; 
	}

	public function get_title() {
		return esc_html__( 'Image With Text', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-image-with-text';
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
			'item_image',
			[
				'label'     => esc_html__( 'Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'image_with_text_text',
			[
				'label'     => esc_html__( 'Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'image_with_text_link',
			[
				'label'     => esc_html__( 'Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'image_with_text_text_tag',
			[
				'label'     => esc_html__( 'Text Tag', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'p' => esc_html__( 'p', 'goodwish'),
					'h2' => esc_html__( 'h2', 'goodwish'),
					'h3' => esc_html__( 'h3', 'goodwish'),
					'h4' => esc_html__( 'h4', 'goodwish'),
					'h5' => esc_html__( 'h5', 'goodwish'),
					'h6' => esc_html__( 'h6', 'goodwish')
				),
				'default' => 'p'
			]
		);
		$this->add_control(
			'image_with_text_text_align',
			[
				'label'     => esc_html__( 'Text Align', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'left' => esc_html__( 'Left', 'goodwish'),
					'center' => esc_html__( 'Center', 'goodwish'),
					'right' => esc_html__( 'Right', 'goodwish'),
				),
				'default' => 'center'
			]
		);

		$this->add_control(
			'double_buttons',
			[
				'label'     => esc_html__( 'Enable double custom link functionality', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default'   => 'no',
				'label_block' => true
			]
		);

		$this->add_control(
			'double_button_one_link',
			[
				'label'     => esc_html__( 'First Button Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'double_buttons' => 'yes'
				],
			]
		);

		$this->add_control(
			'double_button_one_label',
			[
				'label'     => esc_html__( 'First Button Link Label', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'double_buttons' => 'yes'
				],
			]
		);

		$this->add_control(
			'double_button_two_link',
			[
				'label'     => esc_html__( 'Second Button Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'double_buttons' => 'yes'
				],
			]
		);

		$this->add_control(
			'double_button_two_label',
			[
				'label'     => esc_html__( 'Second Button Link Label', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'double_buttons' => 'yes'
				],
			]
		);

		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if ( ! empty( $params['item_image'] ) ) {
			$params['item_image'] = $params['item_image']['id'];
		}
		$params['holder_classes']     = $this->getHolderClasses( $params );

        $html = goodwish_edge_get_shortcode_module_template_part('templates/image-with-text-template', 'image-with-text', '', $params);

        echo $html;

	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = $params['double_buttons'] === 'yes' ? 'edgtf-has-double-buttons' : '';
		$holderClasses[] = 'edgtf-text-align-'.$params['image_with_text_text_align'];

		return implode( ' ', $holderClasses );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorImageWithText() );