<?php
class ElementorImageGallery extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_image_gallery'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Image Gallery', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-image-gallery';
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
			'images',
			[
				'label'     => esc_html__( 'Images', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::GALLERY,
				'description' => esc_html__( 'Choose images from media library', 'goodwish' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use &quot;thumbnail&quot; size', 'goodwish' )
			]
		);

		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Gallery Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Select gallery type', 'goodwish' ),
				'options' => array(
					'slider' => esc_html__( 'Slider', 'goodwish'),
					'carousel' => esc_html__( 'Carousel', 'goodwish'),
					'image_grid' => esc_html__( 'Image Grid', 'goodwish'),
					'masonry' => esc_html__( 'Masonry', 'goodwish')
				),
				'default' => 'slider'
			]
		);

		$this->add_control(
			'image_shadow',
			[
				'label'     => esc_html__( 'Image Shadow', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'carousel' )
				]
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
				'default' => '5000',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);

		$this->add_control(
			'slide_animation',
			[
				'label'     => esc_html__( 'Slide Animation', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'slide' => esc_html__( 'Slide', 'goodwish'),
					'fade' => esc_html__( 'Fade', 'goodwish')
				),
				'default' => 'slide',
				'condition' => [
					'type' => array( 'slider' )
				]
			]
		);

		$this->add_control(
			'column_number',
			[
				'label'     => esc_html__( 'Column Number', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'2' => esc_html__( '2', 'goodwish'),
					'3' => esc_html__( '3', 'goodwish'),
					'4' => esc_html__( '4', 'goodwish'),
					'5' => esc_html__( '5', 'goodwish')
				),
				'default' => '2',
				'condition' => [
					'type' => array( 'image_grid' )
				]
			]
		);

		$this->add_control(
			'pretty_photo',
			[
				'label'     => esc_html__( 'Open PrettyPhoto on click', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'grayscale',
			[
				'label'     => esc_html__( 'Grayscale Images', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'image_grid' )
				]
			]
		);

		$this->add_control(
			'overlay',
			[
				'label'     => esc_html__( 'Image Overlay', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'image_grid' )
				]
			]
		);

		$this->add_control(
			'navigation',
			[
				'label'     => esc_html__( 'Show Navigation Arrows', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish'),
					'no' => esc_html__( 'No', 'goodwish')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);

		$this->add_control(
			'pagination',
			[
				'label'     => esc_html__( 'Show Pagination', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish'),
					'no' => esc_html__( 'No', 'goodwish')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		$params['slider_data'] = $this->getSliderData($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['images'] = $this->getGalleryImages($params);
		$params['slider_class'] = $this->getSliderClass($params);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		$params['columns'] = 'edgtf-gallery-columns-' . $params['column_number'];
		$params['gallery_classes'] = ($params['grayscale'] == 'yes') ? 'edgtf-grayscale' : '';


		if ($params['type'] == 'image_grid') {
			$template = 'gallery-grid';
			$params['gallery_classes'] .= ($params['overlay'] == 'yes') ? ' edgtf-overlay' : '';
		} elseif ($params['type'] == 'slider') {
			$template = 'gallery-slider';
		}elseif ($params['type'] == 'carousel') {
			$template = 'gallery-carousel';
		} elseif ($params['type'] == 'masonry') {
			$template = 'gallery-masonry';
		}

		$html = goodwish_edge_get_shortcode_module_template_part('templates/' . $template, 'image-gallery', '', $params);

		echo $html;

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
			$image['class'] = '';
			if ($params['type'] == 'masonry') {
		        $size = get_post_meta($id,'_ptf_single_masonry_image_size', true);
		        $size = ($size)?$size:'edgtf-default-masonry-item';
		        switch($size){
			        case 'edgtf-large-height-masonry-item' :
				        $img_size = 'goodwish_edge_large_height';
				        $image['class'] = 'edgtf-size-portrait';
				        break;
			        case 'edgtf-large-width-masonry-item' :
				        $img_size = 'goodwish_edge_large_width';
				        $image['class'] = 'edgtf-size-landscape';
				        break;
			        case 'edgtf-large-width-height-masonry-item' :
				        $img_size = 'goodwish_edge_large_width_height';
				        $image['class'] = 'edgtf-size-big-square';
				        break;
			        default:
				        $img_size = 'goodwish_edge_square';
				        $image['class'] = 'edgtf-size-square';
				        break;
		        }
			}
			else{
				$img_size = 'full';
			}
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['masonry_size'] = $img_size;
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);
			$image['link'] = get_post_meta($id,'_attachment_image_custom_link', true);
			$image['link_target'] = get_post_meta($id,'_attachment_image_link_target', true);

			if ($image['link_target'] == ''){
				$image['link_target'] = '_self';
			}

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	private function getImageSize($image_size) {

		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
					$matches[0][0],
					$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

	private function getSliderData($params) {

		$slider_data = array();

		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
		$slider_data['data-animation'] = ($params['slide_animation'] !== '') ? $params['slide_animation'] : '';
		$slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		return $slider_data;

	}

	private function getSliderClass($params) {

		$class = array();
		if($params['image_shadow'] == 'yes'){
			$class[] = 'shadow';
		}
		return implode(' ', $class);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorImageGallery() );