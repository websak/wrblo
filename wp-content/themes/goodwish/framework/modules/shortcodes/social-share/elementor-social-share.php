<?php
class ElementorSocialShare extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_social_share'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Social Share', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-social-share';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	public function getSocialNetworks() {
		$socialNetworks = array(
			'facebook',
			'twitter',
			'google_plus',
			'linkedin',
			'tumblr',
			'pinterest',
			'vk'
		);

		return $socialNetworks;
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
			'el_class',
			[
				'label'     => esc_html__( 'Extra class name', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'goodwish' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['type'] = 'list';
		$params['icon_type'] = 'normal';

		//Is social share enabled
		$params['enable_social_share'] = (goodwish_edge_options()->getOptionValue('enable_social_share') == 'yes') ? true : false;

		//Is social share enabled for post type
		$post_type = get_post_type();
		$params['enabled'] = (goodwish_edge_options()->getOptionValue('enable_social_share_on_'.$post_type) == 'yes') ? true : false;

		//Social Networks Data
		$params['networks'] = $this->getSocialNetworksParams($params);

		if ($params['enable_social_share'] && $params['enabled']) {
			echo goodwish_edge_get_shortcode_module_template_part('templates/' . $params['type'], 'social-share', '', $params);
		}

	}

	private function getSocialNetworksParams($params) {

		$networks = array();
		$icons_type = $params['icon_type'];

		foreach ($this->getSocialNetworks() as $net) {

			$html = '';
			if (goodwish_edge_options()->getOptionValue('enable_'.$net.'_share') == 'yes') {

				$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$params = array(
					'name' => $net
				);
				$params['link'] = $this->getSocialNetworkShareLink($net, $image);
				$params['icon'] = $this->getSocialNetworkIcon($net, $icons_type);
				$params['custom_icon'] = (goodwish_edge_options()->getOptionValue($net.'_icon')) ? goodwish_edge_options()->getOptionValue($net.'_icon') : '';
				$html = goodwish_edge_get_shortcode_module_template_part('templates/parts/network', 'social-share', '', $params);

			}

			$networks[$net] = $html;

		}

		return $networks;

	}

	private function getSocialNetworkShareLink($net, $image) {

		switch ($net) {
            case 'facebook':
                if(wp_is_mobile()) {
					$link = 'window.open(\'https://m.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '\');';
                } else {
					$link = 'window.open(\'https://www.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');';
                }
                break;
            case 'twitter':
                $count_char = (is_ssl()) ? 23 : 22;
                $twitter_via = (goodwish_edge_options()->getOptionValue('twitter_via') !== '') ? ' via ' . goodwish_edge_options()->getOptionValue('twitter_via') . ' ' : '';
				$link =  'window.open(\'https://twitter.com/intent/tweet?text=' . urlencode( goodwish_edge_the_excerpt_max_charlength( $count_char ) . $twitter_via ) . ' ' . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');';

                break;
			case 'google_plus':
				$link = 'popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'linkedin':
				$link = 'popUp=window.open(\'https://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'tumblr':
				$link = 'popUp=window.open(\'https://www.tumblr.com/share/link?url=' . urlencode(get_permalink()) . '&amp;name=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'pinterest':
				$link = 'popUp=window.open(\'https://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . urlencode(get_the_title()) . '&amp;media=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'vk':
				$link = 'popUp=window.open(\'https://vkontakte.ru/share.php?url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '&amp;image=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			default:
				$link = '';
		}

		return $link;

	}

	private function getSocialNetworkIcon($net, $type) {

		switch ($net) {
			case 'facebook':
				$icon = ( $type == 'circle' ) ? 'social_facebook_circle' : 'edgtf-icon-ico-moon icomoon-icon-facebook';
				break;
			case 'twitter':
				$icon = ( $type == 'circle' ) ? 'social_twitter_circle' : 'edgtf-icon-ico-moon icomoon-icon-twitter';
				break;
			case 'google_plus':
				$icon = ( $type == 'circle' ) ? 'social_googleplus_circle' : 'edgtf-icon-ico-moon icomoon-icon-google-plus';
				break;
			case 'linkedin':
				$icon = ( $type == 'circle' ) ? 'social_linkedin_circle' : 'edgtf-icon-ico-moon icomoon-icon-linkedin2';
				break;
			case 'tumblr':
				$icon = ( $type == 'circle' ) ? 'social_tumblr_circle' : 'edgtf-icon-ico-moon icomoon-icon-tumblr';
				break;
			case 'pinterest':
				$icon = ( $type == 'circle' ) ? 'social_pinterest_circle' : 'edgtf-icon-ico-moon icomoon-icon-pinterest';
				break;
			case 'vk':
				$icon = 'fa fa-vk';
				break;
			default:
				$icon = '';
		}

		return $icon;

	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorSocialShare() );