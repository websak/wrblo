<?php
class ElementorListOrdered extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_list_ordered'; 
	}

	public function get_title() {
		return esc_html__( 'Edge List - Ordered', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-ordered-list';
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
			'content',
			[
				'label' => esc_html__( "Content", 'goodwish' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<ol><li>' . esc_html__( 'Lorem Ipsum', 'goodwish' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'goodwish' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'goodwish' ) . '</li></ol>'

			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$content = preg_replace('#^<\/p>|<p>$#', '', $params['content']);
		$html = '<div class= "edgtf-ordered-list" >' . $content . '</div>';
        echo $html;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorListOrdered() );