<?php
class ElementorEventList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_event_list'; 
	}

	public function get_title() {
		return esc_html__( 'Event List', 'goodwish-core' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-event-list';
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
				'label'     => esc_html__( 'Event List Template', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'goodwish-core'), 
					'calendar' => esc_html__( 'Calendar', 'goodwish-core'), 
					'carousel' => esc_html__( 'Carousel', 'goodwish-core'), 
					'full-width' => esc_html__( 'Full Width', 'goodwish-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'padding_top_bottom',
			[
				'label'     => esc_html__( 'Padding Top/Bottom', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter top and bottom padding in px or %', 'goodwish-core' ),
				'condition' => [
					'type' => array( 'full-width' )
				]
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => esc_html__( 'Background Color', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'calendar' )
				]
			]
		);

		$this->add_control(
			'item_background_color',
			[
				'label'     => esc_html__( 'Item Background Color', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => array( 'standard', 'carousel' )
				]
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'original' => esc_html__( 'Original', 'goodwish-core'), 
					'landscape' => esc_html__( 'Landscape', 'goodwish-core'), 
					'square' => esc_html__( 'Square', 'goodwish-core')
				),
				'default' => 'original',
				'condition' => [
					'type' => array( 'standard', 'carousel' )
				]
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
				'default' => '',
				'condition' => [
					'type' => array( 'calendar', 'standard', 'carousel' )
				]
			]
		);

		$this->add_control(
			'title_size',
			[
				'label'     => esc_html__( 'Title Size (px)', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default title size is 120px', 'goodwish-core' ),
				'condition' => [
					'type' => array( 'full-width' )
				]
			]
		);

		$this->add_control(
			'parallax',
			[
				'label'     => esc_html__( 'Parallax on Background Image', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'full-width' )
				]
			]
		);

		$this->add_control(
			'appear_fx',
			[
				'label'     => esc_html__( 'Appear Effect on Event Content', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'full-width' )
				]
			]
		);

		$this->add_control(
			'show_more',
			[
				'label'     => esc_html__( 'Show More', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'none' => esc_html__( 'None', 'goodwish-core'), 
					'load_more' => esc_html__( 'Load More Button', 'goodwish-core'), 
					'infinite_scroll' => esc_html__( 'Infinite Scroll', 'goodwish-core')
				),
				'default' => 'none'
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
					'start-date' => esc_html__( 'Start Date', 'goodwish-core'), 
					'date' => esc_html__( 'Date', 'goodwish-core'), 
					'title' => esc_html__( 'Title', 'goodwish-core'), 
					'menu_order' => esc_html__( 'Menu Order', 'goodwish-core')
				),
				'default' => 'start-date'
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
				'label'     => esc_html__( 'One-Category Event List', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number of Events Per Page', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( '(enter -1 to show all)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'event_status',
			[
				'label'     => esc_html__( 'Show Event by Status', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'all' => esc_html__( 'All', 'goodwish-core'), 
					'upcoming' => esc_html__( 'Current and Upcoming', 'goodwish-core'), 
					'past' => esc_html__( 'Past', 'goodwish-core')
				),
				'default' => 'all'
			]
		);

		$this->add_control(
			'columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is Three', 'goodwish-core' ),
				'options' => array(
					'' => esc_html__( 'Default', 'goodwish-core'), 
					'1' => esc_html__( 'One', 'goodwish-core'), 
					'2' => esc_html__( 'Two', 'goodwish-core'), 
					'3' => esc_html__( 'Three', 'goodwish-core'), 
					'4' => esc_html__( 'Four', 'goodwish-core'), 
					'5' => esc_html__( 'Five', 'goodwish-core')
				),
				'default' => '3',
				'condition' => [
					'type' => array( 'calendar', 'standard' )
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


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $query_array = $this->getQueryArray($params);
        $query_results = new \WP_Query($query_array);
        $params['query_results'] = $query_results;

        $default_date = true; //for full_width template
        if (($params['type'] == 'calendar') || ($params['type'] == 'standard') || ($params['type'] == 'carousel')){
            $default_date = false;
        }

        $params['default_date'] = $default_date;

        $data_atts = $this->getDataAtts($params);
        $data_atts .= 'data-max-num-pages = '.$query_results->max_num_pages;

        $classes = $this->getEventClasses($params);
        $events_style = $this->getEventsStyle($params);

		$single_data = array();

        $single_data['item_style'] = $this->getItemStyle($params);
        $single_data['title_data'] = $this->getTitleData($params);
        $single_data['title_tag'] = $this->getTitleTag($params);
        $single_data['thumb_image_size'] = $this->generateImageSize($params);
        $single_data['events_standard_style'] = $this->getItemStandardStyle($params);

        $html = '';

        $html .= '<div class="edgtf-event-list-holder '.esc_attr($classes).'" '.$data_atts.'>';
        $html .= '<div class="edgtf-event-list-holder-inner" '.goodwish_edge_get_inline_style($events_style).'>';

        if($query_results->have_posts()):
            $i = 1;
            while ( $query_results->have_posts() ) : $query_results->the_post();

                $params['id'] = get_the_ID();
                $single_data = array_merge($single_data, $this->getSingleData($params,$i));

                $html .= edgt_core_get_shortcode_module_template_part('events',$params['type'], '', $single_data);

                $i++;

            endwhile;
        else:

            $html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.','edge-cpt') .'</p>';

        endif;
        $html .= '</div>'; // close edgtf-event-list-holder-inner
        if($params['show_more'] !== 'none'){
            $html .= edgt_core_get_shortcode_module_template_part('events','load-more-template', '', $params);
        }
        wp_reset_postdata();
        $html .= '</div>'; // close edgtf-event-list-holder
        echo $html;
	}

    public function getQueryArray($params){

        $query_array = array();
        $tax_query = array();
        $meta_query = array();
        $order_by = $params['order_by'];

        if ($params['order_by'] == 'start-date'){
            $order_by = 'meta_value';
        }

        $query_array = array(
            'post_type' => 'edge-event',
            'orderby' => $order_by,
            'order' => $params['order'],
            'posts_per_page' => $params['number']
        );

        if ($params['order_by'] == 'start-date'){
            $query_array['meta_key'] = 'edgtf_event_start_date'; //here because has to be added to query
        }

        //display date by event status, ex. end date larger then todays date or if it doesn't exist compare start date
        switch ($params['event_status']) {
            case 'upcoming':
                $meta_query = array(
                    'relation' => 'OR',
                    array(
                        'key' => 'edgtf_event_end_date',
                        'value' => date("Y-m-d"),
                        'compare' => '>='
                    ),
                    array(
                        'relation' => 'AND',
                        array(
                            'key' => 'edgtf_event_end_date',
                            'compare' => 'NOT EXISTS'
                        ),
                        array(
                            'key' => 'edgtf_event_start_date',
                            'value' => date("Y-m-d"),
                            'compare' => '>='
                        ),
                    )
                );
                break;
            case 'past':
                $meta_query = array(
                    'relation' => 'OR',
                    array(
                        'key' => 'edgtf_event_end_date',
                        'value' => date("Y-m-d"),
                        'compare' => '<'
                    ),
                    array(
                        'relation' => 'AND',
                        array(
                            'key' => 'edgtf_event_end_date',
                            'compare' => 'NOT EXISTS'
                        ),
                        array(
                            'key' => 'edgtf_event_start_date',
                            'value' => date("Y-m-d"),
                            'compare' => '<'
                        ),
                    )
                );
                break;
        }

        if (is_array($meta_query) && count($meta_query)){
            $query_array['meta_query'][] = $meta_query;
        }

        if(!empty($params['category'])){
            $tax_query['taxonomy'] = 'edge-event-category';
            $tax_query['field'] = 'slug';
            $tax_query['terms'] = $params['category'];
        }

        if (is_array($tax_query) && count($tax_query)){
            $query_array['tax_query'][] = $tax_query;
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

    public function getEventClasses($params){
        $classes = array();

        switch ($params['type']) {
            case 'full-width':
                $classes[] = 'edgtf-event-list-full-width';
                break;
            case 'calendar':
                $classes[] = 'edgtf-event-list-calendar';
                break;
            case 'standard':
                $classes[] = 'edgtf-event-list-standard';
                break;
            case 'carousel':
                $classes[] = 'edgtf-event-list-carousel';
                break;
            default:
                $classes[] = 'edgtf-event-list-standard';
                break;
        }

        switch ($params['show_more']) {
            case 'load_more':
                $classes[] = 'edgtf-event-list-show-more';
                $classes[] = 'edgtf-event-list-load-button';
                break;
            case 'infinite_scroll':
                $classes[] = 'edgtf-event-list-show-more';
                $classes[] = 'edgtf-event-list-infinite-scroll';
                break;
        }

        if (!empty($params['columns'])) {
            $classes[] = 'edgtf-event-list-col-'.$params['columns'];
        }

        if ($params['parallax'] == 'yes'){
            $classes[] = 'edgtf-event-list-parallax';
        }

        if ($params['appear_fx'] == 'yes'){
            $classes[] = 'edgtf-event-list-appear-fx';
        }

        return implode(' ',$classes);

    }

    public function getEventsStyle($params){
        $style = array();

        if ($params['background_color'] !== ''){
            $style[] = 'background-color: '.$params['background_color'];
        }

        return implode('; ', $style);
    }

    public function getItemStandardStyle($params){
        $style = array();

        if ($params['item_background_color'] !== ''){
            $style[] = 'background-color: '.$params['item_background_color'];
        }

        return implode('; ', $style);
    }

    public function getItemStyle($params){
        $item_style = array();

        if (!empty($params['padding_top_bottom'])){
            $item_style[] = 'padding: '.$params['padding_top_bottom'].' 0';
        }

        return implode('; ', $item_style);
    }

    public function getTitleTag($params){
        $title_tag = 'h2';

        if (!empty($params['title_tag'])){ //!empty because of possible null value from load more
            $title_tag = $params['title_tag'];
        }
        elseif ($params['type'] == 'calendar' || $params['type'] == 'standard' || $params['type'] == 'carousel') {
            $title_tag = 'h3';
        }

        return $title_tag;
    }

    public function getTitleData($params){
        $title_data = array();

        if ($params['title_size'] !== ''){
            $title_data[] = 'data-font-size='.goodwish_edge_filter_px($params['title_size']).'';
        }
        else{
            $title_data[] = 'data-font-size=120';
        }

        return implode(' ', $title_data);
    }

    public function getSingleData($params,$number){
        $single_data = array();
        $even = false;
        $id = $params['id'];
        $default_date = $params['default_date'];
        $date = '';
        $categories = '';

        if ($number%2 == 0){
            $even = true;
        }

        if (function_exists('goodwish_edge_event_get_start_date')){
            $date = goodwish_edge_event_get_start_date($id,$default_date);
        }

        if (function_exists('goodwish_edge_event_get_categories')){
            $categories = goodwish_edge_event_get_categories($id);
        }

        $button_params = array();

        if ($even){
            $single_data['class'] = 'edgtf-el-item-even';
            $button_params['type'] = 'solid';
        }
        else{
            $single_data['class'] = 'edgtf-el-item-odd';
            $button_params['type'] = 'solid-white';
        }

        $button_params['link'] = get_permalink($id);
        $button_params['text'] = esc_html__('More Info','edge-cpt');

        $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size
        $large_image = $featured_image_array[0];

        $location = get_post_meta($id,'edgtf_event_location',true);
        $start_time = get_post_meta($id,'edgtf_event_start_time',true);
        $end_time = get_post_meta($id,'edgtf_event_end_time',true);

        $single_data['date'] = ($date !== '') ? $date : '';
        $single_data['categories'] = ($categories !== '') ? $categories : '';
        $single_data['location'] = ($location !== '') ? $location : '';
        $single_data['start_time'] = ($start_time !== '') ? $start_time : '';
        $single_data['end_time'] = ($end_time !== '') ? $end_time : '';
        $single_data['button_params'] = $button_params;
        $single_data['image_background'] = ($large_image !== '') ? 'background-image: url('.esc_url($large_image).')' : '';

        return $single_data;
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
        if(!empty($params['order_by'])){
            $data_attr['data-order-by'] = $params['order_by'];
        }
        if(!empty($params['order'])){
            $data_attr['data-order'] = $params['order'];
        }
        if(!empty($params['event_status'])){
            $data_attr['data-event-status'] = $params['event_status'];
        }
        if(!empty($params['number'])){
            $data_attr['data-number'] = $params['number'];
        }
        if(!empty($params['image_size'])){
            $data_attr['data-image-size'] = $params['image_size'];
        }
        if(!empty($params['category'])){
            $data_attr['data-category'] = $params['category'];
        }
        if(!empty($params['selected_projects'])){
            $data_attr['data-selected-projects'] = $params['selected_projects'];
        }
        if(!empty($params['show_more'])){
            $data_attr['data-show-more'] = $params['show_more'];
        }
        if(!empty($params['title_tag'])){
            $data_attr['data-title-tag'] = $params['title_tag'];
        }
        if(!empty($params['padding_top_bottom'])){
            $data_attr['data-padding-top-bottom'] = $params['padding_top_bottom'];
        }
        if(!empty($params['title_size'])){
            $data_attr['data-title-size'] = $params['title_size'];
        }
        if(!empty($params['parallax'])){
            $data_attr['data-parallax'] = $params['parallax'];
        }
        if(!empty($params['appear_fx'])){
            $data_attr['data-appear-fx'] = $params['appear_fx'];
        }

        foreach($data_attr as $key => $value) {
            if($key !== '') {
                $data_return_string .= $key . '= "' . esc_attr( $value ) . '" ';
            }
        }
        return $data_return_string;
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEventList() );