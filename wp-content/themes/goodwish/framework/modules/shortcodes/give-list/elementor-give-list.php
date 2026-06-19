<?php
class ElementorCauseList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_cause_list'; 
	}

	public function get_title() {
		return esc_html__( 'Cause List', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-give-list';
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
					'standard' => esc_html__( 'Standard', 'goodwish'), 
					'minimal' => esc_html__( 'Minimal', 'goodwish')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'item_background_color',
			[
				'label'     => esc_html__( 'Item Background Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'standard' )
				]
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
					'portrait' => esc_html__( 'Portrait', 'goodwish'), 
					'square' => esc_html__( 'Square', 'goodwish')
				),
				'default' => 'original'
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

		$this->add_control(
			'button_text',
			[
				'label'     => esc_html__( 'Button Text', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default text is &quot;Donate&quot;', 'goodwish' ),
				'condition' => [
					'type' => array( 'standard' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'query_and_layout_options',
			[
				'label' => esc_html__( 'Query and Layout Options', 'goodwish' ),
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
			'number',
			[
				'label'     => esc_html__( 'Number of Give Forms Per Page', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( '(enter -1 to show all)', 'goodwish' )
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

		$this->add_control(
			'columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is Three', 'goodwish' ),
				'options' => array(
					'1' => esc_html__( 'One', 'goodwish'), 
					'2' => esc_html__( 'Two', 'goodwish'), 
					'3' => esc_html__( 'Three', 'goodwish'), 
					'4' => esc_html__( 'Four', 'goodwish'), 
					'5' => esc_html__( 'Five', 'goodwish')
				),
				'default' => '3',
				'condition' => [
					'type' => array( 'standard' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $query_args = $this->getQueryArgs($params);

        $give_forms = new \WP_Query($query_args);

        $single_params =  array();

        $template = '';
        if ($params['type'] == 'minimal'){
        	$template = '-minimal';
        }

        $html = '';
       

        $html  .= '<div class="edgtf-give-forms-list edgtf-columns-' . $params['columns'] .' edgtf-gfl-'.$params['type'].'">';
        $html  .= '<div class="edgtf-give-forms-list-inner">';

        if ( $give_forms->have_posts() ) :

            while ( $give_forms->have_posts() ) : $give_forms->the_post();

        		$id = get_the_ID();
        		$single_params['id'] = $id;
        		$single_params['title_tag'] = $params['title_tag'];
        		$single_params['thumb_image_size'] = $this->generateImageSize($params);
        		$single_params['button_params'] = $this->getButtonParams($params, $id);
        		$single_params['categories'] = $this->getGiveFormCats($id);
                $single_params['cause_standard_style'] = $this->getItemStandardStyle($params);

                $html .= goodwish_edge_get_shortcode_module_template_part('templates/give-list'.$template.'-template','give-list','',$single_params);

            endwhile; // end of the loop.

        endif;

        wp_reset_postdata();

        $html .= '</div>';
        $html .= '</div>';

        echo $html;
	}

    private function getQueryArgs($params){

        $query_array = array(
            'post_type'           => 'give_forms',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby'             => $params['orderby'],
            'order'               => $params['order'],
			'posts_per_page'      => $params['number']
        );

        if($params['category'] != ''){
            $query_array['give_forms_category'] = $params['category'];
        }

	
		$paged = '';
		if(empty($params['next_page'])) {
			$paged = goodwish_edge_paged();
		}

		if(!empty($params['next_page'])){
			$query_array['paged'] = $params['next_page'];

		}else{
			$query_array['paged'] = $paged;
		}

        return $query_array;
    }

	private function generateImageSize($params){
		$thumb_image_size = '';
		$image_size = $params['image_size'];
		
		switch ($image_size) {
			case 'landscape':
        		$thumb_image_size = 'goodwish_edge_landscape';
				break;
			case 'portrait':
        		$thumb_image_size = 'goodwish_edge_portrait';
				break;
			case 'square':
        		$thumb_image_size = 'goodwish_edge_square';
				break;			
			default:
        		$thumb_image_size = 'original';
				break;
		}

		return $thumb_image_size;
	}

	private function getButtonParams($params, $id){
		$button_params = array();

		if ($params['button_text'] !== ''){
			$button_params['text'] = $params['button_text'];
		} else {
			$button_params['text'] = esc_html__('Donate','goodwish');
		}

		$button_params['link'] = get_the_permalink($id);


		return $button_params;
	}

    public function getItemStandardStyle($params){
        $style = array();

        if ($params['item_background_color'] !== ''){
            $style[] = 'background-color: '.$params['item_background_color'];
        }

        return implode('; ', $style);
    }

    private function getGiveFormCats($id){
        $terms = get_the_terms( $id, 'give_forms_category');
        $cats_html = array();

        if (is_array($terms) && count($terms)) {
	        foreach($terms as $term){
	        	$link = get_term_link($term->term_id);
	        	$cats_html[] = '<a href="'.$link.'" target="_blank">'.$term->slug.'</a>';
	        }
	    }

        return implode('/', $cats_html);
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorCauseList() );