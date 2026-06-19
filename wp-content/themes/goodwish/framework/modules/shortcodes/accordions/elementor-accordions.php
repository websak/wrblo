<?php
class ElementorAccordion extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_accordion'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Accordion', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-accordions';
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
			'el_class',
			[
				'label'     => esc_html__( 'Extra class name', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'goodwish' )
			]
		);

		$this->add_control(
			'style',
			[
				'label'     => esc_html__( 'Style', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'accordion' => esc_html__( 'Accordion', 'goodwish'),
					'toggle' => esc_html__( 'Toggle', 'goodwish')
				),
				'default' => 'accordion'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter accordion section title.', 'goodwish' )
			]
		);

		$repeater->add_control(
			'el_id',
			[
				'label'     => esc_html__( 'Section ID', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: <a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">link</a> (Must not have spaces)', 'goodwish' )
			]
		);

		$repeater->add_control(
			'text',
			[
				'label'       => esc_html__( 'Text', 'biagiotti-core' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'accordion_tab',
			[
				'label'     => esc_html__( 'Edge Accordion Tab', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'goodwish' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['acc_class'] = $this->getAccordionClasses($params);
		?>

        <div class="edgtf-accordion-holder clearfix <?php echo esc_attr($params['acc_class']);?> <?php echo esc_attr($params['el_class'])?>">
			<?php foreach ( $params['accordion_tab'] as $tab ) {

				$tab['content'] = $tab['text'];

				echo goodwish_edge_get_shortcode_module_template_part('templates/accordion-template','accordions', '', $tab);
			} ?>
		</div>
		<?php

	}

	private function getAccordionClasses($params){
		
		$acc_class = '';
		$style = $params['style'];
		switch($style) {
			case 'toggle':
				$acc_class .= 'edgtf-toggle edgtf-initial';
				break;
			default:
				$acc_class = 'edgtf-accordion edgtf-initial';
		}
		return $acc_class;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorAccordion() );