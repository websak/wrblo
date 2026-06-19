<?php
class ElementorTestimonials extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_testimonials'; 
	}

	public function get_title() {
		return esc_html__( 'Testimonials', 'goodwish-core' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-testimonials';
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
				'label'     => esc_html__( 'Type', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'simple' => esc_html__( 'Simple', 'goodwish-core'), 
					'carousel' => esc_html__( 'Carousel', 'goodwish-core')
				),
				'default' => 'simple'
			]
		);

		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'Category', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Category Slug (leave empty for all)', 'goodwish-core' )
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of Testimonials', 'goodwish-core' )
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'show_title',
			[
				'label'     => esc_html__( 'Show Title', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'show_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'show_image',
			[
				'label'     => esc_html__( 'Show Author Image', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'simple' )
				]
			]
		);

		$this->add_control(
			'show_author',
			[
				'label'     => esc_html__( 'Show Author', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'author_color',
			[
				'label'     => esc_html__( 'Author Color', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'show_author' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'show_position',
			[
				'label'     => esc_html__( 'Show Author Job Position', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes',
				'condition' => [
					'show_author' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'animation_speed',
			[
				'label'     => esc_html__( 'Animation speed', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Speed of slide animation in miliseconds', 'goodwish-core' )
			]
		);

		$this->add_control(
			'arrows_navigation',
			[
				'label'     => esc_html__( 'Show Arrows navigation', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'dots_navigation',
			[
				'label'     => esc_html__( 'Show Dots navigation', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'goodwish-core'), 
					'no' => esc_html__( 'No', 'goodwish-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'dots_skin',
			[
				'label'     => esc_html__( 'Dots Skin', 'goodwish-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'edgtf-light-dots' => esc_html__( 'Light', 'goodwish-core'), 
					'edgtf-dark-dots' => esc_html__( 'Dark', 'goodwish-core')
				),
				'default' => 'edgtf-light-dots',
				'condition' => [
					'dots_navigation' => array( 'yes' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		
		$data_attr = $this->getDataParams($params);
		$query_args = $this->getQueryParams($params);
	    $params['author_color'] = ($params['author_color'] !== '')?'color:'.$params['author_color']:'';
	    $params['text_color'] = ($params['text_color'] !== '')?'color:'.$params['text_color']:'';
        $params['title_color'] = ($params['title_color'] !== '')?'color:'.$params['title_color']:'';

	    $classes = 'edgtf-slick-slider-navigation-style edgtf-testimonials edgtf-testimonials-type-'. $params['type'] .' '.$params['dots_skin'];


		$html = '';
        $html .= '<div class="edgtf-testimonials-holder clearfix">';
        $html .= '<div class="'.$classes.'" ' . $data_attr . '>';

        query_posts($query_args);
        if (have_posts()) :
            while (have_posts()) : the_post();
                $author = get_post_meta(get_the_ID(), 'edgtf_testimonial_author', true);
                $text = get_post_meta(get_the_ID(), 'edgtf_testimonial_text', true);
                $title = get_post_meta(get_the_ID(), 'edgtf_testimonial_title', true);
                $job = get_post_meta(get_the_ID(), 'edgtf_testimonial_author_position', true);

				$params['author'] = $author;
				$params['text'] = $text;
				$params['title'] = $title;
				$params['job'] = $job;
				$params['current_id'] = get_the_ID();				
					$html .= edgt_core_get_shortcode_module_template_part('testimonials', $params['type'] . '-testimonials-template', '', $params);

            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'edge-cpt');
        endif;

        wp_reset_query();
        $html .= '</div>';
		$html .= '</div>';
		
        echo $html;
	}

	private function getDataParams($params){
		$data_attr = '';
		
		if(!empty($params['animation_speed'])){
			$data_attr .= ' data-animation-speed ="' . $params['animation_speed'] . '"';
		}

		if(!empty($params['arrows_navigation']) && $params['arrows_navigation'] == 'no'){
			$data_attr .= ' data-arrows-navigation ="false"';
		}

		if(!empty($params['dots_navigation']) && $params['dots_navigation'] == 'no'){
			$data_attr .= ' data-dots-navigation ="false"';
		}
		
		return $data_attr;
	}

	private function getQueryParams($params){
		
		$args = array(
            'post_type' => 'testimonials',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $params['number']
        );

        if ($params['category'] != '') {
            $args['testimonials_category'] = $params['category'];
        }
		return $args;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorTestimonials() );