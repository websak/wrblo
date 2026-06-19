<?php
class ElementorProjectPresentation extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_project_presentation'; 
	}

	public function get_title() {
		return esc_html__( 'Project Presentation Slider', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-project-presentation';
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
			'image',
			[
				'label'     => esc_html__( 'Background Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Presentation Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'presentation-left' => esc_html__( 'Info Left', 'goodwish'),
					'presentation-right' => esc_html__( 'Info Right', 'goodwish')
				),
				'default' => 'presentation-left'
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
				'default' => 'h2'
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'     => esc_html__( 'Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
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

		$this->add_control(
			'button_text',
			[
				'label'     => esc_html__( 'Button Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'show_button' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'link',
			[
				'label'     => esc_html__( 'Button Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'show_button' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'link_target',
			[
				'label'     => esc_html__( 'Button Link Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '_self',
				'condition' => [
					'show_button' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'images',
			[
				'label'     => esc_html__( 'Slider Images', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::GALLERY,
				'description' => esc_html__( 'Choose images from media library', 'goodwish' )
			]
		);

		$this->add_control(
			'pagination',
			[
				'label'     => esc_html__( 'Show Slider Pagination', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish'),
					'no' => esc_html__( 'No', 'goodwish')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'     => esc_html__( 'Slide duration', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Auto rotate slides each X seconds', 'goodwish' ),
				'options' => array(
					'3' => esc_html__( '3', 'goodwish'),
					'5' => esc_html__( '5', 'goodwish'),
					'10' => esc_html__( '10', 'goodwish'),
					'disable' => esc_html__( 'Disable', 'goodwish')
				),
				'default' => '3'
			]
		);

		$this->add_control(
			'skin',
			[
				'label'     => esc_html__( 'Skin', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'dark' => esc_html__( 'Dark', 'goodwish'),
					'light' => esc_html__( 'Light', 'goodwish')
				),
				'default' => 'dark'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['images'] = $this->getGalleryImages($params);
		$params['project_classes'] = $this->getProjectClasses($params);
		$params['slider_data'] = $this->getSliderData($params);
		$params['text_style'] = $this->getTextStyle($params);

        //init variables
		$html = goodwish_edge_get_shortcode_module_template_part('templates/' . $params['type'], 'project-presentation', '', $params);
		
        echo $html;
		
	}

	private function getProjectClasses($params) {

		$class = array($params['type'], 'edgtf-project-presentation-'.$params['skin']);

		return implode(' ', $class);
	}

	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ( $params['images'] !== '' ) {
			foreach ( $params['images'] as $image ) {
				$image_ids[] = $image['id'];
			}
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	private function getSliderData($params) {

		$slider_data = array();

		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		return $slider_data;

	}

	private function getTextStyle($params) {
		$text_style = array();

		if ($params['image']['id'] !== ''){
			$text_style[]= 'background-image: url('.wp_get_attachment_url($params['image']['id']).')';
		}

		return implode(';', $text_style);

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorProjectPresentation() );