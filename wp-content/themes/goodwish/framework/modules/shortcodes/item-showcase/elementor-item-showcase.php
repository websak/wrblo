<?php
class ElementorItemShowcase extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_item_showcase'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Item Showcase', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-item-showcase';
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
			'image_top_offset',
			[
				'label'     => esc_html__( 'Image Top Offset', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater = new \Elementor\Repeater();

		goodwish_edge_icon_collections()->getElementorParamsArray( $repeater , "", "" );

		$repeater->add_control(
			'custom_icon',
			[
				'label'     => esc_html__( 'Custom Icon', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_control(
			'item_position',
			[
				'label'     => esc_html__( 'Item Position', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'left' => esc_html__( 'Left', 'goodwish'),
					'right' => esc_html__( 'Right', 'goodwish')
				),
				'default' => 'left'
			]
		);

		$repeater->add_control(
			'item_title',
			[
				'label'     => esc_html__( 'Item Title', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'item_text',
			[
				'label'     => esc_html__( 'Item Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'item_link',
			[
				'label'     => esc_html__( 'Item Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'item_title!' => ''
				]
			]
		);

		$repeater->add_control(
			'target',
			[
				'label'     => esc_html__( 'Item Link Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '_self',
				'condition' => [
					'item_link!' => ''
				]
			]
		);

		$repeater->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'item_showcase_list_item',
			[
				'label'     => esc_html__( 'Edge Item Showcase List Item', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'goodwish' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $item_showcase_classes = array();
        $item_showcase_classes[] = 'clearfix edgtf-item-showcase';
        $item_showcase_class = implode(' ', $item_showcase_classes);

        $item_image_style = '';
        $item_image_style .= 'margin-top:' . goodwish_edge_filter_px($params['image_top_offset']) . 'px;';

        ?>

        <div <?php echo goodwish_edge_get_class_attribute($item_showcase_class) ?> >
            <div class="edgtf-item-image" <?php echo goodwish_edge_get_inline_style($item_image_style); ?> >
                <?php if ($params['item_image'] != '') {
                    echo wp_get_attachment_image($params['item_image']['id'],'full');
                } ?>
            </div>
			<?php foreach ( $params['item_showcase_list_item'] as $item ) {

				$iconPackName = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($item['icon_pack']);
                $item['custom_icon'] = $item['custom_icon']['id'];
				$item['icon'] = $item[$iconPackName];
				$item['icon_attributes']['style'] =  $this->getIconStyle($item);
				$item['item_showcase_list_item_class'] = $this->getItemShowcaseListItemClass($item);

				echo goodwish_edge_get_shortcode_module_template_part('templates/item-showcase-list-item-template', 'item-showcase', '', $item);
			} ?>

        </div>
        <?php
	}

	private function getIconStyle($params){
		$iconStylesArray = array();
		if(!empty($params['icon_color'])) {
			$iconStylesArray[] = 'color:' . $params['icon_color'];
		}
		return implode(';', $iconStylesArray);
	}

	private function getItemShowcaseListItemClass($params) {
		$item_showcase_list_item_class = array();
		if ($params['item_position'] !== '') {
			$item_showcase_list_item_class[] = 'edgtf-item-'. $params['item_position'];
		}
		return implode(' ', $item_showcase_list_item_class);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorItemShowcase() );