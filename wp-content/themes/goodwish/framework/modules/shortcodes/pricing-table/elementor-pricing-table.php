<?php
class ElementorPricingTables extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_pricing_tables'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Pricing Tables', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-pricing-table';
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
			'columns',
			[
				'label'     => esc_html__( 'Columns', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'edgtf-two-columns' => esc_html__( 'Two', 'goodwish'),
					'edgtf-three-columns' => esc_html__( 'Three', 'goodwish'),
					'edgtf-four-columns' => esc_html__( 'Four', 'goodwish')
				),
				'default' => 'edgtf-two-columns'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'price',
			[
				'label'     => esc_html__( 'Price', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default value is 100', 'goodwish' )
			]
		);

		$repeater->add_control(
			'currency',
			[
				'label'     => esc_html__( 'Currency', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default mark is $', 'goodwish' )
			]
		);

		$repeater->add_control(
			'price_period',
			[
				'label'     => esc_html__( 'Price Period', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default label is &quot;/ month&quot;', 'goodwish' )
			]
		);

		$repeater->add_control(
			'show_button',
			[
				'label'     => esc_html__( 'Show Button', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish'),
					'no' => esc_html__( 'No', 'goodwish')
				),
				'default' => ''
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label'     => esc_html__( 'Button Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'show_button' => array( 'yes' )
				]
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'     => esc_html__( 'Button Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'show_button' => array( 'yes' )
				]
			]
		);

		$repeater->add_control(
			'active',
			[
				'label'     => esc_html__( 'Active', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no'
			]
		);

		$repeater->add_control(
			'active_text',
			[
				'label'     => esc_html__( 'Active text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Best choice', 'goodwish' ),
				'condition' => [
					'active' => array( 'yes' )
				]
			]
		);

		$repeater->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG
			]
		);

		$this->add_control(
			'pricing_table',
			[
				'label'     => esc_html__( 'Edge Pricing Table', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'goodwish' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		?>

		<div class="edgtf-pricing-tables clearfix <?php echo esc_html($params['columns']); ?>">

			<?php foreach ( $params['pricing_table'] as $pti ) {
				$pricing_table_clases		= 'edgtf-price-table';
				$pricing_table_button		= 'solid';

				if($pti['active'] == 'yes') {
					$pricing_table_clases .= ' edgtf-active';
					$pricing_table_button = 'solid';
				}

				$pti['pricing_table_classes'] = $pricing_table_clases;
				$pti['pricing_table_button'] = $pricing_table_button;
				$pti['content'] = preg_replace('#^<\/p>|<p>$#', '', $pti['content']);

				echo goodwish_edge_get_shortcode_module_template_part('templates/pricing-table-template','pricing-table', '', $pti);
			} ?>
		</div>

		<?php
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorPricingTables() );