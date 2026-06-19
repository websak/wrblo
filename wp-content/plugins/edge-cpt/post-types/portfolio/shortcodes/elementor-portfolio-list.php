<?php
class ElementorPortfolioList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_portfolio_list'; 
	}

	public function get_title() {
		return esc_html__( 'Portfolio List', 'goodwish-core' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-portfolio-list';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'goodwish-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Portfolio List Template', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'goodwish-core'), 
					'gallery' => esc_html__( 'Gallery', 'goodwish-core'), 
					'gallery-with-space' => esc_html__( 'Gallery With Space', 'goodwish-core'), 
					'masonry' => esc_html__( 'Masonry', 'goodwish-core'), 
					'masonry-with-space' => esc_html__( 'Masonry With Space', 'goodwish-core'), 
					'pinterest' => esc_html__( 'Pinterest', 'goodwish-core'), 
					'pinterest-with-space' => esc_html__( 'Pinterest With Space', 'goodwish-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h2' => esc_html__( 'h2', 'goodwish-core'), 
					'h3' => esc_html__( 'h3', 'goodwish-core'), 
					'h4' => esc_html__( 'h4', 'goodwish-core'), 
					'h5' => esc_html__( 'h5', 'goodwish-core'), 
					'h6' => esc_html__( 'h6', 'goodwish-core')
				),
				'default' => 'h4'
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Proportions', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'full' => esc_html__( 'Original', 'goodwish-core'), 
					'square' => esc_html__( 'Square', 'goodwish-core'), 
					'landscape' => esc_html__( 'Landscape', 'goodwish-core'), 
					'portrait' => esc_html__( 'Portrait', 'goodwish-core')
				),
				'default' => 'full',
				'condition' => [
					'type' => array( 'standard', 'gallery', 'gallery-with-space' )
				]
			]
		);

		$this->add_control(
			'show_load_more',
			[
				'label'     => esc_html__( 'Show Load More', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is Yes', 'goodwish-core' ),
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'animation_type',
			[
				'label'     => esc_html__( 'Animation Type', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'edgtf-standard' => esc_html__( 'Overlay', 'goodwish-core'), 
					'edgtf-light' => esc_html__( 'Overlay - Light', 'goodwish-core'), 
					'edgtf-dark' => esc_html__( 'Overlay - Dark', 'goodwish-core'), 
					'edgtf-follow' => esc_html__( 'Follow', 'goodwish-core')
				),
				'default' => 'edgtf-standard',
				'condition' => [
					'type' => array( 'masonry', 'masonry-with-space', 'gallery', 'gallery-with-space', 'pinterest', 'pinterest-with-space' )
				]
			]
		);

		$this->add_control(
			'appear_effect',
			[
				'label'     => esc_html__( 'Appear Effect', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'none' => esc_html__( 'None', 'goodwish-core'), 
					'fade-scale' => esc_html__( 'Fade In and Scale Up', 'goodwish-core')
				),
				'default' => 'none',
				'condition' => [
					'type' => array( 'masonry', 'masonry-with-space', 'pinterest', 'pinterest-with-space' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'query_and_layout_options',
			[
				'label' => esc_html__( 'Query and Layout Options', 'goodwish-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'order_by',
			[
				'label'     => esc_html__( 'Order By', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'menu_order' => esc_html__( 'Menu Order', 'goodwish-core'), 
					'title' => esc_html__( 'Title', 'goodwish-core'), 
					'date' => esc_html__( 'Date', 'goodwish-core')
				),
				'default' => 'date'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'goodwish-core'), 
					'DESC' => esc_html__( 'DESC', 'goodwish-core')
				),
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'One-Category Portfolio List', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number of Portfolios Per Page', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( '(enter -1 to show all)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is Three', 'goodwish-core' ),
				'options' => array(
					'' => esc_html__( '', 'goodwish-core'), 
					'1' => esc_html__( 'One', 'goodwish-core'), 
					'2' => esc_html__( 'Two', 'goodwish-core'), 
					'3' => esc_html__( 'Three', 'goodwish-core'), 
					'4' => esc_html__( 'Four', 'goodwish-core'), 
					'5' => esc_html__( 'Five', 'goodwish-core'), 
					'6' => esc_html__( 'Six', 'goodwish-core')
				),
				'default' => '3',
				'condition' => [
					'type' => array( 'standard', 'gallery', 'gallery-with-space' )
				]
			]
		);

		$this->add_control(
			'grid_size',
			[
				'label'     => esc_html__( 'Grid Size', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'This option is only for Full Width Page Template', 'goodwish-core' ),
				'options' => array(
					'' => esc_html__( 'Default', 'goodwish-core'), 
					'three' => esc_html__( '3 Columns Grid', 'goodwish-core'), 
					'four' => esc_html__( '4 Columns Grid', 'goodwish-core'), 
					'five' => esc_html__( '5 Columns Grid', 'goodwish-core')
				),
				'default' => 'three',
				'condition' => [
					'type' => array( 'pinterest', 'pinterest-with-space' )
				]
			]
		);

		$this->add_control(
			'selected_projects',
			[
				'label'     => esc_html__( 'Show Only Projects with Listed IDs', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'filter',
			[
				'label'     => esc_html__( 'Enable Category Filter', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is No', 'goodwish-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish-core'), 
					'yes' => esc_html__( 'Yes', 'goodwish-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'filter_order_by',
			[
				'label'     => esc_html__( 'Filter Order By', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is Name', 'goodwish-core' ),
				'options' => array(
					'name' => esc_html__( 'Name', 'goodwish-core'), 
					'count' => esc_html__( 'Count', 'goodwish-core'), 
					'id' => esc_html__( 'Id', 'goodwish-core'), 
					'slug' => esc_html__( 'Slug', 'goodwish-core')
				),
				'default' => 'name',
				'condition' => [
					'filter' => array( 'yes' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$query_array = $this->getQueryArray($params);
		$query_results = new \WP_Query($query_array);		
		$params['query_results'] = $query_results;
		
		$classes = $this->getPortfolioClasses($params);
		$data_atts = $this->getDataAtts($params);
		$data_atts .= 'data-max-num-pages = '.$query_results->max_num_pages;
		$params['masonry_filter'] = '';
		
		$html = '';
		
		if($params['filter'] == 'yes' && ($params['type'] == 'masonry' || $params['type'] =='masonry-with-space' || $params['type'] =='pinterest' || $params['type'] =='pinterest-with-space')){
			$params['filter_categories'] = $this->getFilterCategories($params);	
			$params['masonry_filter'] = 'edgtf-masonry-filter';
			$html .= edgt_core_get_shortcode_module_template_part('portfolio','portfolio-filter', '', $params);
		}
		
		$html .= '<div class = "edgtf-portfolio-list-holder-outer '.$classes.'" '.$data_atts. '>';
		
		if($params['filter'] == 'yes' && ($params['type'] == 'standard' || $params['type'] =='gallery' || $params['type'] =='gallery-with-space')){
			$params['filter_categories'] = $this->getFilterCategories($params);	
			$html .= edgt_core_get_shortcode_module_template_part('portfolio','portfolio-filter', '', $params);
		}
		
		$html .= '<div class = "edgtf-portfolio-list-holder clearfix" >';
		if($params['type'] == 'masonry' || $params['type'] =='masonry-with-space' || $params['type'] == 'pinterest' || $params['type'] == 'pinterest-with-space'){
			$html .= '<div class="edgtf-portfolio-list-masonry-grid-sizer"></div>';
			$html .= '<div class="edgtf-portfolio-list-masonry-grid-gutter"></div>';
		}
		
		if($query_results->have_posts()):			
			while ( $query_results->have_posts() ) : $query_results->the_post(); 
			
				$params['current_id'] = get_the_ID();
				$params['thumb_size'] = $this->getImageSize($params);
				$params['icon_html'] = $this->getPortfolioIconsHtml($params);
				$params['category_html'] = $this->getItemCategoriesHtml($params);
				$params['categories'] = $this->getItemCategories($params);
				$params['article_masonry_size'] = $this->getMasonrySize($params);
                $params['item_link'] = $this->getItemLink($params);
				
				$html .= edgt_core_get_shortcode_module_template_part('portfolio',$params['type'],'',$params);
				
			endwhile;
		else: 
			
			$html .= '<p>'. esc_html__( 'Sorry, no posts matched your criteria.', 'edge-cpt' ) .'</p>';
		
		endif;
	    if(($params['type'] =='gallery-with-space' || $params['type'] == 'standard') && empty($params['portfolio_slider'])){
		    for($i=0;$i<(int)$params['columns'];$i++){
		        $html .= "<div class='edgtf-portfolio-gap'></div>";
			    $html .= "\n";
		    }
	    }
		$html .= '</div>'; //close edgtf-portfolio-list-holder
		if($params['show_load_more'] == 'yes' && empty($params['portfolio_slider'])){
			$html .= edgt_core_get_shortcode_module_template_part('portfolio','load-more-template','',$params);
		}
		wp_reset_postdata();
		$html .= '</div>'; // close edgtf-portfolio-list-holder-outer
        echo $html;
	}

	public function getQueryArray($params){
		
		$query_array = array();
		
		$query_array = array(
			'post_type' => 'portfolio-item',
			'orderby' =>$params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number']
		);
		
		if(!empty($params['category'])){
			$query_array['portfolio-category'] = $params['category'];
		}
		
		$project_ids = null;
		if (!empty($params['selected_projects'])) {
			$project_ids = explode(',', $params['selected_projects']);
			$query_array['post__in'] = $project_ids;
		}
		
		$paged = '';
		if(empty($params['next_page'])) {
            if(get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif(get_query_var('page')) {
                $paged = get_query_var('page');
            }
        }
		
		if(!empty($params['next_page'])){
			$query_array['paged'] = $params['next_page'];
			
		}else{
			$query_array['paged'] = 1;
		}
		
		return $query_array;
	}

	public function getPortfolioIconsHtml($params){
		
		$html ='';
		//$id = $params['current_id'];
		//$slug_list_ = 'pretty_photo_gallery';
		
		//$featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full'); //original size
		//$large_image = $featured_image_array[0];
				
		//$html .= '<div class="edgtf-item-separator-holder">';
		
		//$html .= '<a class="edgtf-portfolio-lightbox" title="' . get_the_title($id) . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']"></a>';
		
		
		//if (function_exists('goodwish_edge_get_separator_html')) {
			//$html .= goodwish_edge_get_separator_html();
		//}
		
		//$html .= '<a class="edgtf-preview" title="Go to Project" href="' . $this->getItemLink($params) . '" data-type="portfolio_list"></a>';
		
		//$html .= '</div>';
		
		return $html;
        
	}

	public function getPortfolioClasses($params){
		$classes = array();
		$type = $params['type'];
		$columns = $params['columns'];
		$grid_size = $params['grid_size'];
		switch($type):
			case 'standard':
				$classes[] = 'edgtf-ptf-standard';
			break;
			case 'gallery':
				$classes[] = 'edgtf-ptf-gallery';
				$classes[] = $params['animation_type'];
			break;
			case 'gallery-with-space':
				$classes[] = 'edgtf-ptf-gallery-with-space';
				$classes[] = $params['animation_type'];
				break;
			case 'masonry':
				$classes[] = 'edgtf-ptf-masonry';
				$classes[] = $params['animation_type'];
				$classes[] = 'edgtf-appear-'.$params['appear_effect'];
			break;
			case 'masonry-with-space':
				$classes[] = 'edgtf-ptf-masonry-with-space';
				$classes[] = $params['animation_type'];
				$classes[] = 'edgtf-appear-'.$params['appear_effect'];
				break;
			case 'pinterest':
				$classes[] = 'edgtf-ptf-pinterest';
				$classes[] = $params['animation_type'];
				$classes[] = 'edgtf-appear-'.$params['appear_effect'];
			break;
			case 'pinterest-with-space':
				$classes[] = 'edgtf-ptf-pinterest-with-space';
				$classes[] = $params['animation_type'];
				$classes[] = 'edgtf-appear-'.$params['appear_effect'];
			break;
		endswitch;
		
		if(empty($params['portfolio_slider'])){ // portfolio slider mustn't have this classes
			
			if($type == 'standard' || $type == 'gallery' || $type == 'gallery-with-space' ){
				switch ($columns):
					case '1':
						$classes[] = 'edgtf-ptf-one-column';
					break;
					case '2':
						$classes[] = 'edgtf-ptf-two-columns';
					break;
					case '3':
						$classes[] = 'edgtf-ptf-three-columns';
					break;
					case '4':
						$classes[] = 'edgtf-ptf-four-columns';
					break;
					case '5':
						$classes[] = 'edgtf-ptf-five-columns';
					break;
					case '6':
						$classes[] = 'edgtf-ptf-six-columns';
					break;
				endswitch;
			}
			if($params['show_load_more']== 'yes'){ 
				$classes[] = 'edgtf-ptf-load-more';
			}
		}
		
		if($type == "pinterest" || $type=='pinterest-with-space'){
			switch ($grid_size):
				case 'three': 
					$classes[] = 'edgtf-ptf-pinterest-three-columns';
				break;
				case 'four': 
					$classes[] = 'edgtf-ptf-pinterest-four-columns';
				break;
				case 'five': 
					$classes[] = 'edgtf-ptf-pinterest-five-columns';
				break;
			endswitch;
		}
		if($params['filter'] == 'yes'){
			$classes[] = 'edgtf-ptf-has-filter';
			if($params['type'] == 'masonry' || $params['type'] == 'masonry-with-space' || $params['type'] == 'pinterest' || $params['type'] == 'pinterest-with-space'){
				if($params['filter'] == 'yes'){
					$classes[] = 'edgtf-ptf-masonry-filter';
				}
			}
		}
		
		if(!empty($params['portfolio_slider']) && $params['portfolio_slider'] == 'yes'){
			$classes[] = 'edgtf-portfolio-slider-holder';
		}
		
		return implode(' ',$classes);
        
	}

	public function getImageSize($params){
		
		$thumb_size = 'full';
		$type = $params['type'];
		
		if($type == 'standard' || $type == 'gallery' || $type == 'gallery-with-space'){
			if(!empty($params['image_size'])){
				$image_size = $params['image_size'];

				switch ($image_size) {
					case 'landscape':
						$thumb_size = 'goodwish_edge_landscape';
						break;
					case 'portrait':
						$thumb_size = 'goodwish_edge_portrait';
						break;
					case 'square':
						$thumb_size = 'goodwish_edge_square';
						break;
					case 'full':
						$thumb_size = 'full';
						break;
				}
			}
		}
		elseif($type == 'masonry' || $type == 'masonry-with-space'){
			
			$id = $params['current_id'];
			$masonry_size = get_post_meta($id, 'portfolio_masonry_dimenisions',true);
			
			switch($masonry_size):
				default :
					$thumb_size = 'goodwish_edge_square';
				break;
				case 'large_width' : 
					$thumb_size = 'goodwish_edge_large_width';
				break;
				case 'large_height' : 
					$thumb_size = 'goodwish_edge_large_height';
				break;
				case 'large_width_height' : 
					$thumb_size = 'goodwish_edge_large_width_height';
				break;
			endswitch;
		}
		
		
		return $thumb_size;
	}

	public function getItemCategories($params){
		$id = $params['current_id'];
		$category_return_array = array();
		
		$categories = wp_get_post_terms($id, 'portfolio-category');
		
		foreach($categories as $cat){
			$category_return_array[] = 'portfolio_category_'.$cat->term_id;
		}
		return implode(' ', $category_return_array);
	}

	public function getItemCategoriesHtml($params){
		$id = $params['current_id'];
		
		$categories = wp_get_post_terms($id, 'portfolio-category');
		$category_html = '<div class="edgtf-ptf-category-holder">';
		$k = 1;
		foreach ($categories as $cat) {
			$category_html .= '<span>'.$cat->name.'</span>';
			if (count($categories) != $k) {
				$category_html .= ' / ';
			}
			$k++;
		}
		$category_html .= '</div>'; 
		return $category_html;
	}

	public function getMasonrySize($params){
		$masonry_size_class = '';
		
		if($params['type'] == 'masonry' || $params['type'] == 'masonry-with-space'){
			
			$id = $params['current_id'];
			$masonry_size = get_post_meta($id, 'portfolio_masonry_dimenisions',true);
			switch($masonry_size):
				default :
					$masonry_size_class = 'edgtf-default-masonry-item';
				break;
				case 'large_width' : 
					$masonry_size_class = 'edgtf-large-width-masonry-item';
				break;
				case 'large_height' : 
					$masonry_size_class = 'edgtf-large-height-masonry-item';
				break;
				case 'large_width_height' : 
					$masonry_size_class = 'edgtf-large-width-height-masonry-item';
				break;
			endswitch;
		}
		
		return $masonry_size_class;
	}

	public function getFilterCategories($params){
		
		$cat_id = 0;

		if(!empty($params['category'])){	
			
			$top_category = get_term_by('slug', $params['category'], 'portfolio-category');
			if(isset($top_category->term_id)){
				$cat_id = $top_category->term_id;
			}
			
		}

		$order = $params['filter_order_by'] === 'count' ? 'DESC' : 'ASC';

        $args = array(
            'taxonomy' => 'portfolio-category',
            'child_of' => $cat_id,
            'orderby' => $params['filter_order_by'],
            'order'  => $order
        );

        $filter_categories = get_terms($args);

		
		return $filter_categories;
		
	}

	public function getDataAtts($params){
		
		$data_attr = array();
		$data_return_string = '';
		
		if(get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif(get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
		
		if(!empty($paged)) {
            $data_attr['data-next-page'] = $paged+1;
        }		
		if(!empty($params['type'])){
			$data_attr['data-type'] = $params['type'];
		}
		if(!empty($params['columns'])){
			$data_attr['data-columns'] = $params['columns'];
		}
		if(!empty($params['grid_size'])){
			$data_attr['data-grid-size'] = $params['grid_size'];
		}
		if(!empty($params['order_by'])){
			$data_attr['data-order-by'] = $params['order_by'];
		}
		if(!empty($params['order'])){
			$data_attr['data-order'] = $params['order'];
		}
		if(!empty($params['number'])){
			$data_attr['data-number'] = $params['number'];
		}
		if(!empty($params['image_size'])){
			$data_attr['data-image-size'] = $params['image_size'];
		}
		if(!empty($params['filter'])){
			$data_attr['data-filter'] = $params['filter'];
		}
		if(!empty($params['filter_order_by'])){
			$data_attr['data-filter-order-by'] = $params['filter_order_by'];
		}
		if(!empty($params['category'])){
			$data_attr['data-category'] = $params['category'];
		}
		if(!empty($params['selected_projects'])){
			$data_attr['data-selected-projects'] = $params['selected_projects'];
		}
		if(!empty($params['show_load_more'])){
			$data_attr['data-show-load-more'] = $params['show_load_more'];
		}
		if(!empty($params['title_tag'])){
			$data_attr['data-title-tag'] = $params['title_tag'];
		}
		if(!empty($params['portfolio_slider']) && $params['portfolio_slider']=='yes'){
			$data_attr['data-items'] = $params['portfolios_shown'];
		}

		foreach($data_attr as $key => $value) {
			if($key !== '') {
				$data_return_string .= $key.'= '.esc_attr($value).' ';
			}
		}
		return $data_return_string;
	}

    public function getItemLink($params){

        $id = $params['current_id'];
        $portfolio_link = get_permalink($id);
        if (get_post_meta($id, 'portfolio_external_link',true) !== ''){
            $portfolio_link = get_post_meta($id, 'portfolio_external_link',true);
        }

        return $portfolio_link;

    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorPortfolioList() );