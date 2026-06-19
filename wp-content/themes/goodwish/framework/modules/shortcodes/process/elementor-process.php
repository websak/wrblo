<?php
class ElementorProcessHolder extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_process_holder'; 
	}

	public function get_title() {
		return esc_html__( 'Process', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-process';
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
			'number_of_items',
			[
				'label'     => esc_html__( 'Number of Process Items', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'three' => esc_html__( 'Three', 'goodwish'), 
					'four' => esc_html__( 'Four', 'goodwish'), 
					'five' => esc_html__( 'Five', 'goodwish')
				),
				'default' => 'three'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'image',
			[
				'label'     => esc_html__( 'Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$repeater->add_control(
			'highlighted',
			[
				'label'     => esc_html__( 'Highlight Item?', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'), 
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'process_item',
			[
				'label'     => esc_html__( 'Process Item', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'goodwish' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['holder_classes'] = array(
			'edgtf-process-holder',
			'edgtf-process-holder-items-'.$params['number_of_items']
		);
		?>

		<div <?php goodwish_edge_class_attribute($params['holder_classes']); ?>>
			<div class="edgtf-process-inner clearfix">
				<?php foreach ( $params['process_item'] as $pi ) {

					$pi['item_classes'] = array(
						'edgtf-process-item-holder'
					);

					if($pi['highlighted'] === 'yes') {
						$pi['item_classes'][] = 'edgtf-pi-highlighted';
					}
					$pi['number_holder_style'] = '';
					if($pi['image']['id'] != ''){
						$pi['number_holder_style'] = 'background-image: url(' . wp_get_attachment_url($pi['image']['id']) . ')';
					}

					echo goodwish_edge_get_shortcode_module_template_part('templates/process-item-template', 'process', '', $pi);
				} ?>
			</div>
		</div>

		<?php
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorProcessHolder() );