<?php
class ElementorBlogList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_blog_list'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Blog List', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-blog-list';
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
			'type',
			[
				'label'     => esc_html__( 'Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'boxes' => esc_html__( 'Boxes', 'goodwish'), 
					'standard' => esc_html__( 'Standard', 'goodwish'), 
					'narrow' => esc_html__( 'Narrow', 'goodwish'), 
					'minimal' => esc_html__( 'Minimal', 'goodwish'), 
					'image_in_box' => esc_html__( 'Image in box', 'goodwish')
				),
				'default' => 'boxes'
			]
		);

		$this->add_control(
			'number_of_posts',
			[
				'label'     => esc_html__( 'Number of Posts', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( 'One', 'goodwish'), 
					'2' => esc_html__( 'Two', 'goodwish'), 
					'3' => esc_html__( 'Three', 'goodwish'), 
					'4' => esc_html__( 'Four', 'goodwish')
				),
				'default' => '1',
				'condition' => [
					'type' => array( 'boxes', 'standard' )
				]
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'     => esc_html__( 'Order By', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'title' => esc_html__( 'Title', 'goodwish'), 
					'date' => esc_html__( 'Date', 'goodwish')
				),
				'default' => 'title'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'goodwish'), 
					'DESC' => esc_html__( 'DESC', 'goodwish')
				),
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'Category Slug', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Leave empty for all or use comma for list', 'goodwish' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'original' => esc_html__( 'Original', 'goodwish'), 
					'landscape' => esc_html__( 'Landscape', 'goodwish'), 
					'square' => esc_html__( 'Square', 'goodwish')
				),
				'default' => 'original',
				'condition' => [
					'type' => array( 'boxes' )
				]
			]
		);

		$this->add_control(
			'text_length',
			[
				'label'     => esc_html__( 'Text length', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of characters', 'goodwish' )
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
				'default' => 'h3'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'design_options',
			[
				'label' => esc_html__( 'Design Options', 'goodwish' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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

		$this->add_control(
			'box_color',
			[
				'label'     => esc_html__( 'Box Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'boxes' )
				]
			]
		);

		$this->add_control(
			'disable_box_shadow',
			[
				'label'     => esc_html__( 'Disable Box Shadow', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'), 
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'boxes' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['holder_classes'] = $this->getBlogHolderClasses($params);

		$params['box_style'] = '';
		if(!empty($params['box_color'])){
			$params['box_style'] = 'background-color:'.$params['box_color'].';';
		}
		if($params['disable_box_shadow'] == 'yes'){
			$params['box_style'] .= 'box-shadow:none;';
		}
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	
     
		
        $thumbImageSize = $this->generateImageSize($params);
		$params['thumb_image_size'] = $thumbImageSize;

		$html ='';
        $html .= goodwish_edge_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		echo $html;
		
	}

	private function getBlogHolderClasses($params){
		$holderClasses = '';
		
		$columnNumber = $this->getColumnNumberClass($params);

		$skin = $this->getSkinClass($params);
		
		if(!empty($params['type'])){
			switch($params['type']){
				case 'image_in_box':
					$holderClasses = 'edgtf-image-in-box';
				break;
				case 'boxes' : 
					$holderClasses = 'edgtf-boxes';
				break;
				case 'standard' :
					$holderClasses = 'edgtf-standard';
					break;
				case 'masonry' : 
					$holderClasses = 'edgtf-masonry';
				break;
				case 'minimal' :
					$holderClasses = 'edgtf-minimal';
				break;
				case 'narrow' :
					$holderClasses = 'edgtf-narrow';
				break;
				default: 
					$holderClasses = 'edgtf-boxes';
			}
		}
		
		$holderClasses .= ' '.$columnNumber.' '.$skin;
		
		return $holderClasses;
		
	}

	private function getColumnNumberClass($params){
		
		$columnsNumber = '';
		$type = $params['type'];
		$columns = $params['number_of_columns'];
		
        if ($type == 'boxes' || $type == 'standard') {
            switch ($columns) {
                case 1:
                    $columnsNumber = 'edgtf-one-column';
                    break;
                case 2:
                    $columnsNumber = 'edgtf-two-columns';
                    break;
                case 3:
                    $columnsNumber = 'edgtf-three-columns';
                    break;
                case 4:
                    $columnsNumber = 'edgtf-four-columns';
                    break;
                default:
					$columnsNumber = 'edgtf-one-column';
                    break;
            }
        }
		return $columnsNumber;
	}

	private function getSkinClass($params){
		
		$skinClass = '';
		if ($params['skin'] == 'light') {
			$skinClass = 'edgtf-blog-list-holder-light-skin';
		}
		
		return $skinClass;
	}

	public function generateBlogQueryArray($params){
		
		$queryArray = array(
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);
		return $queryArray;
	}

	private function generateImageSize($params){
		$thumbImageSize = '';
		$imageSize = $params['image_size'];
		
		if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'goodwish_edge_landscape';
        } else if($imageSize === 'square'){
			$thumbImageSize .= 'goodwish_edge_square';
		} else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
		return $thumbImageSize;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorBlogList() );