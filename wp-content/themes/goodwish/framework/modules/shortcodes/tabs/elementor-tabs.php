<?php
class ElementorTabs extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_tabs'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Tabs', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-tabs';
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
					'horizontal_tab' => esc_html__( 'Horizontal', 'goodwish'),
					'vertical_tab' => esc_html__( 'Vertical', 'goodwish')
				),
				'default' => 'horizontal_tab'
			]
		);

		$this->add_control(
			'title_layout',
			[
				'label'     => esc_html__( 'Title Layout', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'without_icon' => esc_html__( 'Without Icon', 'goodwish'),
					'with_icon' => esc_html__( 'With Icon', 'goodwish'),
					'only_icon' => esc_html__( 'Only Icon', 'goodwish')
				),
				'default' => 'without_icon'
			]
		);

		$repeater = new \Elementor\Repeater();

		goodwish_edge_icon_collections()->getElementorParamsArray( $repeater, '', '' );

		$repeater->add_control(
			'tab_title',
			[
				'label'     => esc_html__( 'Title', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'tab_text',
			[
				'label'       => esc_html__( 'Text', 'biagiotti-core' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label'     => esc_html__( 'Edge Tab', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'goodwish' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['tab_class'] = $this->getTabClass($params);
		$params['tab_title_layout'] = $this->getTabTitleLayoutClass($params);
		
		?>

		<div class="edgtf-tabs <?php echo esc_attr($params['tab_class']); ?> <?php echo esc_attr($params['tab_title_layout']); ?> clearfix">
			<ul class="edgtf-tabs-nav">

				<?php foreach ( $params['tabs'] as $tab ) { ?>
					<li>
						<?php if ( ! empty( $tab['tab_title'] ) ) { ?>
                            <a href="#tab-<?php echo sanitize_title($tab['tab_title'])?>">
							<?php if($params['tab_class'] === 'edgtf-vertical-tab' && ($params['tab_title_layout'] === 'edgtf-tab-with-icon' || $params['tab_title_layout'] === 'edgtf-tab-only-icon')) { ?>
								<span class="edgtf-icon-frame"></span>
							<?php } ?>

							<?php if($tab['tab_title'] !== '' && $params['tab_title_layout'] !== 'edgtf-tab-only-icon') { ?>
								<span class="edgtf-tab-text-after-icon">
                                <?php echo esc_attr($tab['tab_title'])?>
                                </span>
							<?php } ?>

							<?php if($params['tab_class'] !== 'edgtf-vertical-tab' && ($params['tab_title_layout'] === 'edgtf-tab-with-icon' || $params['tab_title_layout'] === 'edgtf-tab-only-icon')) { ?>
								<span class="edgtf-icon-frame"></span>
							<?php } ?>
                            </a>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>
			<?php foreach ( $params['tabs'] as $tab ) {

//				$default_atts = array(
//					'tab_title' => 'Tab',
//					'tab_id' => ''
//				);
//
//				$default_atts = array_merge($default_atts, goodwish_edge_icon_collections()->getShortcodeParams());
//				$tab = shortcode_atts($default_atts, $tab);

				$iconPackName = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($tab['icon_pack']);
				$tab['icon'] = $tab[$iconPackName];

				$rand_number = rand(0, 1000);
				$tab['tab_title'] = $tab['tab_title'].'-'.$rand_number;

				$tab['content'] = $tab['tab_text'];

				echo goodwish_edge_get_shortcode_module_template_part( 'templates//tab-content', 'tabs', '', $tab );
			} ?>
		</div>

		<?php
	}

	private function getTabClass($params){
		$tabStyle = $params['style'];
		$tabClass = '';
		
		switch ($tabStyle) {
			case 'vertical_tab':
				$tabClass = 'edgtf-vertical-tab';
				break;
			default :
				$tabClass = 'edgtf-horizontal-tab';
				break;
		}

		return $tabClass;
	}

	private function getTabTitleLayoutClass($params){
		$tabTitleLayout = $params['title_layout'];
		$tabIconClass = '';

		switch ($tabTitleLayout) {
			case 'with_icon':
				$tabIconClass = 'edgtf-tab-with-icon';
				break;
			case 'only_icon':
				$tabIconClass = 'edgtf-tab-only-icon';
				break;
			default :
				$tabIconClass = 'edgtf-tab-without-icon';
				break;
		}

		return $tabIconClass;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorTabs() );