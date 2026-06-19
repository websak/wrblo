<?php
class ElementorShopMasonry extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_shop_masonry'; 
	}

	public function get_title() {
		return esc_html__( 'Shop Masonry', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-shop-masonry';
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
			'orderby',
			[
				'label'     => esc_html__( 'Order by', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'date' => esc_html__( 'Date', 'goodwish'),
					'title' => esc_html__( 'Title', 'goodwish')
				),
				'default' => 'date'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Sort order', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'DESC' => esc_html__( 'Descending', 'goodwish'),
					'ASC' => esc_html__( 'Ascending', 'goodwish')
				),
				'default' => 'DESC'
			]
		);

		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'Category', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Category Slug (leave empty for all)', 'goodwish' )
			]
		);

//		$this->add_control(
//			'filter',
//			[
//				'label'     => esc_html__( 'Show Category Filter', 'goodwish' ),
//				'type'      => \Elementor\Controls_Manager::SELECT,
//				'options' => array(
//					'no' => esc_html__( 'No', 'goodwish'),
//					'yes' => esc_html__( 'Yes', 'goodwish')
//				),
//				'default' => 'no'
//			]
//		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $query_args = $this->getQueryArgs($params);

        $products = new \WP_Query($query_args);
        $columns  = 4;

        $html = '';

        $html  .= '<div class="woocommerce edgtf-shop-masonry columns-' . $columns .'">';

//        if($params['filter'] == 'yes'){
//            $params['filter_categories'] = $this->getFilterCategories($params);
//            $html .= goodwish_edge_get_shortcode_module_template_part('templates/shop-filter','shop-masonry', '', $params);
//        }

        if ( $products->have_posts() ) :

            do_action( "woocommerce_shortcode_before_products_loop" );

            $html .= '<div class="products edgtf-shop-list-masonry">';
            $html .= '<div class="edgtf-shop-list-masonry-grid-sizer"></div>';

            while ( $products->have_posts() ) : $products->the_post();

                $id = get_the_ID();
                $params['image_size_class'] = $this->getMasonrySize($id);
                $params['thumb_size'] = $this->getImageSize($id);
                $params['cats'] = $this->getItemCats($id);
                $params['out_stock_class'] = $this->getMasonryOutStockClass();
                $params['on_sale_class'] = $this->getMasonryOnSaleClass();
                $html .= goodwish_edge_get_shortcode_module_template_part('templates/shop-masonry-template','shop-masonry','',$params);

            endwhile; // end of the loop.

            $html .= '</div>';

            do_action( "woocommerce_shortcode_after_products_loop" );

        endif;

        woocommerce_reset_loop();
        wp_reset_postdata();

        $html .= '</div>';

        echo $html;
	}

    private function getItemCats($id){
        $terms = get_the_terms( $id, 'product_cat');
        $cats = '';

        foreach($terms as $term){
            $cats .= 'product_cat-'.$term->term_id.' ';
        }

        return $cats;
    }

    private function getFilterCategories($params){

        $cat_id = 0;

        if(!empty($params['category'])){

            $top_category = get_term_by('slug', $params['category'], 'product_cat');
            if(isset($top_category->term_id)){
                $cat_id = $top_category->term_id;
            }

        }

        $args = array(
            'child_of' => $cat_id,
        );

        $filter_categories = get_terms('product_cat',$args);

        return $filter_categories;

    }

    private function getQueryArgs($params){

        $args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby'             => $params['orderby'],
            'order'               => $params['order'],
            'posts_per_page'      => -1,
            'meta_query'          => WC()->query->get_meta_query()
        );

        if($params['category'] != ''){
            $args['product_cat'] = $params['category'];
        }

        return $args;
    }

    private function getMasonrySize($id){
        $masonry_size_class = '';

        $masonry_size = get_post_meta($id, 'shop_masonry_dimensions',true);
        switch($masonry_size):
	        default:
	        case 'default' :
                $masonry_size_class = 'edgtf-default-masonry-item ';
                break;
            case 'large_width' :
                $masonry_size_class = 'edgtf-large-width-masonry-item ';
                break;
            case 'large_height' :
                $masonry_size_class = 'edgtf-large-height-masonry-item ';
                break;
            case 'large_width_height' :
                $masonry_size_class = 'edgtf-large-width-height-masonry-item ';
                break;
        endswitch;

        return $masonry_size_class;
    }

    private function getMasonryOutStockClass(){

        global $product;

        $masonry_out_stock_class = '';

        if (!$product->is_in_stock()) {
            $masonry_out_stock_class = "edgtf-out-of-stock";
        }

        return $masonry_out_stock_class;
    }

    private function getMasonryOnSaleClass(){

        global $product;

        $masonry_on_sale_class = '';

        if ( $product->is_on_sale() ) {
            $masonry_on_sale_class = "edgtf-on-sale";
        }

        return $masonry_on_sale_class;
    }

    private function getImageSize($id){

        $masonry_size = get_post_meta($id, 'shop_masonry_dimensions',true);

        switch($masonry_size):
	        default:
	        case 'default' :
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

        return $thumb_size;
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorShopMasonry() );