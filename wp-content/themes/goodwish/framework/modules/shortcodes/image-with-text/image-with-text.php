<?php
namespace GoodwishEdge\Modules\Shortcodes\ImageWithText;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ImageWithText
 */
class ImageWithText implements ShortcodeInterface  {
    private $base; 
    
    function __construct() {
        $this->base = 'edgtf_image_with_text';

        add_action('vc_before_init', array($this, 'vcMap'));
    }
    
    /**
        * Returns base for shortcode
        * @return string
     */
    public function getBase() {
        return $this->base;
    }   
    
    public function vcMap() {
                        
        vc_map( array(
            'name' => esc_html__('Image With Text', 'goodwish'),
            'base' => $this->base,
            'category' => esc_html__('by EDGE', 'goodwish'),
            'icon' => 'icon-wpb-image-with-text extended-custom-icon',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Image', 'goodwish'),
                    'param_name' => 'item_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Text', 'goodwish'),
                    'admin_label' => true,                    
                    'param_name' => 'image_with_text_text',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link', 'goodwish'),
                    'admin_label' => true,                    
                    'param_name' => 'image_with_text_link',
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Text Tag','goodwish'),
					'param_name' => 'image_with_text_text_tag',
					'value' => array(
						''   => '',
						'p'   => 'p',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
					),
					'description' => ''
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Text Align', 'goodwish'),
					'param_name'	=> 'image_with_text_text_align',
					'value'			=> array(
						''			=> '',
						esc_html__('Left', 'goodwish')		=> 'left',
						esc_html__('Center', 'goodwish')	=> 'center',
						esc_html__('Right', 'goodwish')	=> 'right'
					)
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'double_buttons',
					'heading'     => esc_html__( 'Enable double custom link functionality', 'goodwish' ),
					'value' => array(
						esc_html__('No','goodwish') => 'no',
						esc_html__('Yes','goodwish') => 'yes'
					),
					'save_always' => true
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'double_button_one_link',
					'heading'    => esc_html__( 'First Button Link', 'goodwish' ),
					'dependency' => array( 'element' => 'double_buttons', 'value' => 'yes' )
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'double_button_one_label',
					'heading'    => esc_html__( 'First Button Link Label', 'goodwish' ),
					'dependency' => array( 'element' => 'double_buttons', 'value' => 'yes' )
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'double_button_two_link',
					'heading'    => esc_html__( 'Second Button Link', 'goodwish' ),
					'dependency' => array( 'element' => 'double_buttons', 'value' => 'yes' )
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'double_button_two_label',
					'heading'    => esc_html__( 'Second Button Link Label', 'goodwish' ),
					'dependency' => array( 'element' => 'double_buttons', 'value' => 'yes' )
				)
            )
        ) );

    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @return string
     */

    public function render($atts, $content = null) {
        
        $args = array(
            'item_image'                    => '',
            'image_with_text_text'          => '',
            'image_with_text_link'          => '',
            'image_with_text_text_tag'      => 'p',
            'image_with_text_text_align'    => 'center',
			'double_buttons'      			=> 'no',
			'double_button_one_link' 		=> '',
			'double_button_one_label' 		=> '',
			'double_button_two_link' 		=> '',
			'double_button_two_label' 		=> '',
        );

        $params = shortcode_atts($args, $atts);

		$params['holder_classes']     = $this->getHolderClasses( $params );

        extract($params);

        $html = goodwish_edge_get_shortcode_module_template_part('templates/image-with-text-template', 'image-with-text', '', $params);

        return $html;

    }

	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = $params['double_buttons'] === 'yes' ? 'edgtf-has-double-buttons' : '';
		$holderClasses[] = 'edgtf-text-align-'.$params['image_with_text_text_align'];

		return implode( ' ', $holderClasses );
	}

  }
