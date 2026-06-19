<?php
class ElementorTeam extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_team'; 
	}

	public function get_title() {
		return esc_html__( 'Edge Team', 'goodwish' );
	}

	public function get_icon() {
		return 'goodwish-elementor-custom-icon goodwish-elementor-team';
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
			'team_type',
			[
				'label'     => esc_html__( 'Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'main-info-below-image' => esc_html__( 'Main Info Below Image', 'goodwish'),
					'main-info-on-hover' => esc_html__( 'Main Info on Hover', 'goodwish')
				),
				'default' => 'main-info-on-hover'
			]
		);

		$this->add_control(
			'team_image',
			[
				'label'     => esc_html__( 'Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'grayscale',
			[
				'label'     => esc_html__( 'Grayscale Image', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'goodwish'),
					'yes' => esc_html__( 'Yes', 'goodwish')
				),
				'default' => 'no',
				'condition' => [
					'team_type' => array( 'main-info-below-image' )
				]
			]
		);

		$this->add_control(
			'team_image_link',
			[
				'label'     => esc_html__( 'Team Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'team_image_link_target',
			[
				'label'     => esc_html__( 'Team Link Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '_self',
				'condition' => [
					'team_image_link!' => ''
				]
			]
		);

		$this->add_control(
			'team_name',
			[
				'label'     => esc_html__( 'Name', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'team_name_tag',
			[
				'label'     => esc_html__( 'Name Tag', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h2' => esc_html__( 'h2', 'goodwish'),
					'h3' => esc_html__( 'h3', 'goodwish'),
					'h4' => esc_html__( 'h4', 'goodwish'),
					'h5' => esc_html__( 'h5', 'goodwish'),
					'h6' => esc_html__( 'h6', 'goodwish')
				),
				'default' => 'h4',
				'condition' => [
					'team_name!' => ''
				]
			]
		);

		$this->add_control(
			'team_position',
			[
				'label'     => esc_html__( 'Position', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'team_description',
			[
				'label'     => esc_html__( 'Description', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'team_social_icon_pack',
			[
				'label'     => esc_html__( 'Social Icon Pack', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'font_awesome' => esc_html__( 'Font Awesome', 'goodwish'),
					'font_elegant' => esc_html__( 'Font Elegant', 'goodwish'),
					'ico_moon' => esc_html__( 'Ico Moon', 'goodwish'),
					'ion_icons' => esc_html__( 'Ion Icons', 'goodwish'),
					'linear_icons' => esc_html__( 'Linear Icons', 'goodwish'),
					'simple_line_icons' => esc_html__( 'Simple Line Icons', 'goodwish'),
					'dripicons' => esc_html__( 'Dripicons', 'goodwish')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'team_social_icon_type',
			[
				'label'     => esc_html__( 'Social Icons Type', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'normal' => esc_html__( 'Normal', 'goodwish'),
					'circle' => esc_html__( 'Circle', 'goodwish'),
					'square' => esc_html__( 'Square', 'goodwish')
				),
				'default' => 'normal_social',
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome', 'font_elegant', 'ico_moon', 'ion_icons', 'linea_icons', 'linear_icons', 'simple_line_icons', 'dripicons' )
				]
			]
		);

		$this->add_control(
			'team_social_fa_icon_1',
			[
				'label'     => esc_html__( 'Social Icon 1 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'fa-500px' => esc_html__( '500px', 'goodwish'),
					'fa-adn' => esc_html__( 'ADN', 'goodwish'),
					'fa-amazon' => esc_html__( 'Amazon', 'goodwish'),
					'fa-android' => esc_html__( 'Android', 'goodwish'),
					'fa-angellist' => esc_html__( 'Angellist', 'goodwish'),
					'fa-apple' => esc_html__( 'Apple', 'goodwish'),
					'fa-behance' => esc_html__( 'Behance', 'goodwish'),
					'fa-behance-square' => esc_html__( 'Behance Square', 'goodwish'),
					'fa-bitbucket' => esc_html__( 'Bitbucket', 'goodwish'),
					'fa-bitbucket-square' => esc_html__( 'Bitbucket Square', 'goodwish'),
					'fa-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'fa-btc' => esc_html__( 'BTC', 'goodwish'),
					'fa-css3' => esc_html__( 'CSS3', 'goodwish'),
					'fa-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'fa-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'fa-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'fa-flickr' => esc_html__( 'Flickr', 'goodwish'),
					'fa-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'fa-github' => esc_html__( 'GitHub', 'goodwish'),
					'fa-github-alt' => esc_html__( 'GitHub-Alt', 'goodwish'),
					'fa-git-square' => esc_html__( 'GitHub-Square', 'goodwish'),
					'fa-gittip' => esc_html__( 'Gittip', 'goodwish'),
					'fa-google-plus' => esc_html__( 'Google Plus', 'goodwish'),
					'fa-html5' => esc_html__( 'HTML5', 'goodwish'),
					'fa-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'fa-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'fa-linux' => esc_html__( 'Linux', 'goodwish'),
					'fa-envelope' => esc_html__( 'Mail', 'goodwish'),
					'fa-envelope-o' => esc_html__( 'Mail Alt', 'goodwish'),
					'fa-envelope-square' => esc_html__( 'Mail Square', 'goodwish'),
					'fa-maxcdn' => esc_html__( 'MaxCDN', 'goodwish'),
					'fa-paypal' => esc_html__( 'Paypal', 'goodwish'),
					'fa-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'fa-reddit-alien' => esc_html__( 'Reddit Alien', 'goodwish'),
					'fa-renren' => esc_html__( 'Renren', 'goodwish'),
					'fa-skype' => esc_html__( 'Skype', 'goodwish'),
					'fa-slack' => esc_html__( 'Slack', 'goodwish'),
					'fa-snapchat-ghost' => esc_html__( 'Snapchat Ghost', 'goodwish'),
					'fa-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'fa-stack-exchange' => esc_html__( 'StackExchange', 'goodwish'),
					'fa-stack-overflow' => esc_html__( 'StackOverflow', 'goodwish'),
					'fa-telegram' => esc_html__( 'Telegram', 'goodwish'),
					'fa-tripadvisor' => esc_html__( 'Trip Advisor', 'goodwish'),
					'fa-trello' => esc_html__( 'Trello', 'goodwish'),
					'fa-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'fa-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'fa-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'fa-vimeo-square' => esc_html__( 'Vimeo Square', 'goodwish'),
					'fa-vine' => esc_html__( 'Vine', 'goodwish'),
					'fa-vk' => esc_html__( 'VK', 'goodwish'),
					'fa-weixin' => esc_html__( 'Wechat', 'goodwish'),
					'fa-weibo' => esc_html__( 'Weibo', 'goodwish'),
					'fa-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'fa-wikipedia-w' => esc_html__( 'Wikipedia', 'goodwish'),
					'fa-windows' => esc_html__( 'Windows', 'goodwish'),
					'fa-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'fa-xing' => esc_html__( 'Xing', 'goodwish'),
					'fa-youtube' => esc_html__( 'YouTube', 'goodwish'),
					'fa-youtube-square' => esc_html__( 'YouTube Square', 'goodwish'),
					'fa-youtube-play' => esc_html__( 'YouTube Play', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome' )
				]
			]
		);

		$this->add_control(
			'team_social_fe_icon_1',
			[
				'label'     => esc_html__( 'Social Icon 1 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'social_blogger' => esc_html__( 'Blogger', 'goodwish'),
					'social_blogger_circle' => esc_html__( 'Blogger circle', 'goodwish'),
					'social_blogger_square' => esc_html__( 'Blogger square', 'goodwish'),
					'social_delicious' => esc_html__( 'Delicious', 'goodwish'),
					'social_delicious_circle' => esc_html__( 'Delicious circle', 'goodwish'),
					'social_delicious_square' => esc_html__( 'Delicious square', 'goodwish'),
					'social_deviantart' => esc_html__( 'Deviantart', 'goodwish'),
					'social_deviantart_circle' => esc_html__( 'Deviantart circle', 'goodwish'),
					'social_deviantart_square' => esc_html__( 'Deviantart square', 'goodwish'),
					'social_dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'social_dribbble_circle' => esc_html__( 'Dribbble circle', 'goodwish'),
					'social_dribbble_square' => esc_html__( 'Dribbble square', 'goodwish'),
					'social_facebook' => esc_html__( 'Facebook', 'goodwish'),
					'social_facebook_circle' => esc_html__( 'Facebook circle', 'goodwish'),
					'social_facebook_square' => esc_html__( 'Facebook square', 'goodwish'),
					'social_flickr' => esc_html__( 'Flickr', 'goodwish'),
					'social_flickr_circle' => esc_html__( 'Flickr circle', 'goodwish'),
					'social_flickr_square' => esc_html__( 'Flickr square', 'goodwish'),
					'social_googledrive' => esc_html__( 'Googledrive', 'goodwish'),
					'social_googledrive_alt2' => esc_html__( 'Googledrive alt2', 'goodwish'),
					'social_googledrive_square' => esc_html__( 'Googledrive square', 'goodwish'),
					'social_googleplus' => esc_html__( 'Googleplus', 'goodwish'),
					'social_googleplus_circle' => esc_html__( 'Googleplus circle', 'goodwish'),
					'social_googleplus_square' => esc_html__( 'Googleplus square', 'goodwish'),
					'social_instagram' => esc_html__( 'Instagram', 'goodwish'),
					'social_instagram_circle' => esc_html__( 'Instagram circle', 'goodwish'),
					'social_instagram_square' => esc_html__( 'Instagram square', 'goodwish'),
					'social_linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'social_linkedin_circle' => esc_html__( 'Linkedin circle', 'goodwish'),
					'social_linkedin_square' => esc_html__( 'Linkedin square', 'goodwish'),
					'social_myspace' => esc_html__( 'Myspace', 'goodwish'),
					'social_myspace_circle' => esc_html__( 'myspace circle', 'goodwish'),
					'social_myspace_square' => esc_html__( 'myspace square', 'goodwish'),
					'social_picassa' => esc_html__( 'Picassa', 'goodwish'),
					'social_picassa_circle' => esc_html__( 'Picassa circle', 'goodwish'),
					'social_picassa_square' => esc_html__( 'Picassa square', 'goodwish'),
					'social_pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'social_pinterest_circle' => esc_html__( 'Pinterest circle', 'goodwish'),
					'social_pinterest_square' => esc_html__( 'Pinterest square', 'goodwish'),
					'social_rss' => esc_html__( 'Rss', 'goodwish'),
					'social_rss_circle' => esc_html__( 'Rss circle', 'goodwish'),
					'social_rss_square' => esc_html__( 'Rss square', 'goodwish'),
					'social_share' => esc_html__( 'Share', 'goodwish'),
					'social_share_circle' => esc_html__( 'Share circle', 'goodwish'),
					'social_share_square' => esc_html__( 'Share square', 'goodwish'),
					'social_skype' => esc_html__( 'Skype', 'goodwish'),
					'social_skype_circle' => esc_html__( 'Skype circle', 'goodwish'),
					'social_skype_square' => esc_html__( 'Skype square', 'goodwish'),
					'social_spotify' => esc_html__( 'Spotify', 'goodwish'),
					'social_spotify_circle' => esc_html__( 'Spotify circle', 'goodwish'),
					'social_spotify_square' => esc_html__( 'Spotify square', 'goodwish'),
					'social_stumbleupon_circle' => esc_html__( 'Stumbleupon circle', 'goodwish'),
					'social_stumbleupon_square' => esc_html__( 'Stumbleupon square', 'goodwish'),
					'social_tumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'social_tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'social_tumblr_circle' => esc_html__( 'Tumblr circle', 'goodwish'),
					'social_tumblr_square' => esc_html__( 'Tumblr square', 'goodwish'),
					'social_twitter' => esc_html__( 'Twitter', 'goodwish'),
					'social_twitter_circle' => esc_html__( 'Twitter circle', 'goodwish'),
					'social_twitter_square' => esc_html__( 'Twitter square', 'goodwish'),
					'social_vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'social_vimeo_circle' => esc_html__( 'Vimeo circle', 'goodwish'),
					'social_vimeo_square' => esc_html__( 'Vimeo square', 'goodwish'),
					'social_wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'social_wordpress_circle' => esc_html__( 'WordPress circle', 'goodwish'),
					'social_wordpress_square' => esc_html__( 'WordPress square', 'goodwish'),
					'social_youtube' => esc_html__( 'Youtube', 'goodwish'),
					'social_youtube_circle' => esc_html__( 'Youtube circle', 'goodwish'),
					'social_youtube_square' => esc_html__( 'Youtube square', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_elegant' )
				]
			]
		);

		$this->add_control(
			'team_social_ico_moon_1',
			[
				'label'     => esc_html__( 'Social Icon 1 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icomoon-icon-mail' => esc_html__( 'icomoon-icon-mail', 'goodwish'),
					'icomoon-icon-mail2' => esc_html__( 'icomoon-icon-mail2', 'goodwish'),
					'icomoon-icon-mail3' => esc_html__( 'icomoon-icon-mail3', 'goodwish'),
					'icomoon-icon-mail4' => esc_html__( 'icomoon-icon-mail4', 'goodwish'),
					'icomoon-icon-google' => esc_html__( 'icomoon-icon-google', 'goodwish'),
					'icomoon-icon-google-plus' => esc_html__( 'icomoon-icon-google-plus', 'goodwish'),
					'icomoon-icon-google-plus2' => esc_html__( 'icomoon-icon-google-plus2', 'goodwish'),
					'icomoon-icon-google-plus3' => esc_html__( 'icomoon-icon-google-plus3', 'goodwish'),
					'icomoon-icon-google-drive' => esc_html__( 'icomoon-icon-google-drive', 'goodwish'),
					'icomoon-icon-facebook' => esc_html__( 'icomoon-icon-facebook', 'goodwish'),
					'icomoon-icon-facebook2' => esc_html__( 'icomoon-icon-facebook2', 'goodwish'),
					'icomoon-icon-facebook3' => esc_html__( 'icomoon-icon-facebook3', 'goodwish'),
					'icomoon-icon-ello' => esc_html__( 'icomoon-icon-ello', 'goodwish'),
					'icomoon-icon-instagram' => esc_html__( 'icomoon-icon-instagram', 'goodwish'),
					'icomoon-icon-twitter' => esc_html__( 'icomoon-icon-twitter', 'goodwish'),
					'icomoon-icon-twitter2' => esc_html__( 'icomoon-icon-twitter2', 'goodwish'),
					'icomoon-icon-twitter3' => esc_html__( 'icomoon-icon-twitter3', 'goodwish'),
					'icomoon-icon-feed2' => esc_html__( 'icomoon-icon-feed2', 'goodwish'),
					'icomoon-icon-feed3' => esc_html__( 'icomoon-icon-feed3', 'goodwish'),
					'icomoon-icon-feed4' => esc_html__( 'icomoon-icon-feed4', 'goodwish'),
					'icomoon-icon-youtube' => esc_html__( 'icomoon-icon-youtube', 'goodwish'),
					'icomoon-icon-youtube2' => esc_html__( 'icomoon-icon-youtube2', 'goodwish'),
					'icomoon-icon-youtube3' => esc_html__( 'icomoon-icon-youtube3', 'goodwish'),
					'icomoon-icon-youtube4' => esc_html__( 'icomoon-icon-youtube4', 'goodwish'),
					'icomoon-icon-twitch' => esc_html__( 'icomoon-icon-twitch', 'goodwish'),
					'icomoon-icon-vimeo' => esc_html__( 'icomoon-icon-vimeo', 'goodwish'),
					'icomoon-icon-vimeo2' => esc_html__( 'icomoon-icon-vimeo2', 'goodwish'),
					'icomoon-icon-vimeo3' => esc_html__( 'icomoon-icon-vimeo3', 'goodwish'),
					'icomoon-icon-lanyrd' => esc_html__( 'icomoon-icon-lanyrd', 'goodwish'),
					'icomoon-icon-flickr' => esc_html__( 'icomoon-icon-flickr', 'goodwish'),
					'icomoon-icon-flickr2' => esc_html__( 'icomoon-icon-flickr2', 'goodwish'),
					'icomoon-icon-flickr3' => esc_html__( 'icomoon-icon-flickr3', 'goodwish'),
					'icomoon-icon-flickr4' => esc_html__( 'icomoon-icon-flickr4', 'goodwish'),
					'icomoon-icon-picassa' => esc_html__( 'icomoon-icon-picassa', 'goodwish'),
					'icomoon-icon-picassa2' => esc_html__( 'icomoon-icon-picassa2', 'goodwish'),
					'icomoon-icon-dribbble' => esc_html__( 'icomoon-icon-dribbble', 'goodwish'),
					'icomoon-icon-dribbble2' => esc_html__( 'icomoon-icon-dribbble2', 'goodwish'),
					'icomoon-icon-dribbble3' => esc_html__( 'icomoon-icon-dribbble3', 'goodwish'),
					'icomoon-icon-forrst' => esc_html__( 'icomoon-icon-forrst', 'goodwish'),
					'icomoon-icon-forrst2' => esc_html__( 'icomoon-icon-forrst2', 'goodwish'),
					'icomoon-icon-deviantart' => esc_html__( 'icomoon-icon-deviantart', 'goodwish'),
					'icomoon-icon-deviantart2' => esc_html__( 'icomoon-icon-deviantart2', 'goodwish'),
					'icomoon-icon-steam' => esc_html__( 'icomoon-icon-steam', 'goodwish'),
					'icomoon-icon-steam2' => esc_html__( 'icomoon-icon-steam2', 'goodwish'),
					'icomoon-icon-dropbox' => esc_html__( 'icomoon-icon-dropbox', 'goodwish'),
					'icomoon-icon-onedrive' => esc_html__( 'icomoon-icon-onedrive', 'goodwish'),
					'icomoon-icon-github' => esc_html__( 'icomoon-icon-github', 'goodwish'),
					'icomoon-icon-github2' => esc_html__( 'icomoon-icon-github2', 'goodwish'),
					'icomoon-icon-github3' => esc_html__( 'icomoon-icon-github3', 'goodwish'),
					'icomoon-icon-github4' => esc_html__( 'icomoon-icon-github4', 'goodwish'),
					'icomoon-icon-github5' => esc_html__( 'icomoon-icon-github5', 'goodwish'),
					'icomoon-icon-wordpress' => esc_html__( 'icomoon-icon-wordpress', 'goodwish'),
					'icomoon-icon-wordpress2' => esc_html__( 'icomoon-icon-wordpress2', 'goodwish'),
					'icomoon-icon-joomla' => esc_html__( 'icomoon-icon-joomla', 'goodwish'),
					'icomoon-icon-blogger' => esc_html__( 'icomoon-icon-blogger', 'goodwish'),
					'icomoon-icon-blogger2' => esc_html__( 'icomoon-icon-blogger2', 'goodwish'),
					'icomoon-icon-tumblr' => esc_html__( 'icomoon-icon-tumblr', 'goodwish'),
					'icomoon-icon-tumblr2' => esc_html__( 'icomoon-icon-tumblr2', 'goodwish'),
					'icomoon-icon-yahoo' => esc_html__( 'icomoon-icon-yahoo', 'goodwish'),
					'icomoon-icon-tux' => esc_html__( 'icomoon-icon-tux', 'goodwish'),
					'icomoon-icon-apple' => esc_html__( 'icomoon-icon-apple', 'goodwish'),
					'icomoon-icon-finder' => esc_html__( 'icomoon-icon-finder', 'goodwish'),
					'icomoon-icon-android' => esc_html__( 'icomoon-icon-android', 'goodwish'),
					'icomoon-icon-windows' => esc_html__( 'icomoon-icon-windows', 'goodwish'),
					'icomoon-icon-windows8' => esc_html__( 'icomoon-icon-windows8', 'goodwish'),
					'icomoon-icon-soundcloud' => esc_html__( 'icomoon-icon-soundcloud', 'goodwish'),
					'icomoon-icon-soundcloud2' => esc_html__( 'icomoon-icon-soundcloud2', 'goodwish'),
					'icomoon-icon-skype' => esc_html__( 'icomoon-icon-skype', 'goodwish'),
					'icomoon-icon-reddit' => esc_html__( 'icomoon-icon-reddit', 'goodwish'),
					'icomoon-icon-linkedin' => esc_html__( 'icomoon-icon-linkedin', 'goodwish'),
					'icomoon-icon-linkedin2' => esc_html__( 'icomoon-icon-linkedin2', 'goodwish'),
					'icomoon-icon-lastfm' => esc_html__( 'icomoon-icon-lastfm', 'goodwish'),
					'icomoon-icon-lastfm2' => esc_html__( 'icomoon-icon-lastfm2', 'goodwish'),
					'icomoon-icon-delicious' => esc_html__( 'icomoon-icon-delicious', 'goodwish'),
					'icomoon-icon-stumbleupon' => esc_html__( 'icomoon-icon-stumbleupon', 'goodwish'),
					'icomoon-icon-stumbleupon2' => esc_html__( 'icomoon-icon-stumbleupon2', 'goodwish'),
					'icomoon-icon-stackoverflow' => esc_html__( 'icomoon-icon-stackoverflow', 'goodwish'),
					'icomoon-icon-pinterest' => esc_html__( 'icomoon-icon-pinterest', 'goodwish'),
					'icomoon-icon-pinterest2' => esc_html__( 'icomoon-icon-pinterest2', 'goodwish'),
					'icomoon-icon-xing' => esc_html__( 'icomoon-icon-xing', 'goodwish'),
					'icomoon-icon-xing2' => esc_html__( 'icomoon-icon-xing2', 'goodwish'),
					'icomoon-icon-flattr' => esc_html__( 'icomoon-icon-flattr', 'goodwish'),
					'icomoon-icon-foursquare' => esc_html__( 'icomoon-icon-foursquare', 'goodwish'),
					'icomoon-icon-paypal' => esc_html__( 'icomoon-icon-paypal', 'goodwish'),
					'icomoon-icon-paypal2' => esc_html__( 'icomoon-icon-paypal2', 'goodwish'),
					'icomoon-icon-paypal3' => esc_html__( 'icomoon-icon-paypal3', 'goodwish'),
					'icomoon-icon-yelp' => esc_html__( 'icomoon-icon-yelp', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ico_moon' )
				]
			]
		);

		$this->add_control(
			'team_social_ion_icon_1',
			[
				'label'     => esc_html__( 'Social Icon 1 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'ion-social-android' => esc_html__( 'Android', 'goodwish'),
					'ion-social-android-outline' => esc_html__( 'Android outline', 'goodwish'),
					'ion-social-angular' => esc_html__( 'Angular', 'goodwish'),
					'ion-social-angular-outline' => esc_html__( 'Angular outline', 'goodwish'),
					'ion-social-apple' => esc_html__( 'Apple', 'goodwish'),
					'ion-social-apple-outline' => esc_html__( 'Apple outline', 'goodwish'),
					'ion-social-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'ion-social-bitcoin-outline' => esc_html__( 'Bitcoin outline', 'goodwish'),
					'ion-social-buffer' => esc_html__( 'Buffer', 'goodwish'),
					'ion-social-buffer-outline' => esc_html__( 'Buffer outline', 'goodwish'),
					'ion-social-chrome' => esc_html__( 'Chrome', 'goodwish'),
					'ion-social-chrome-outline' => esc_html__( 'Chrome outline', 'goodwish'),
					'ion-social-codepen' => esc_html__( 'Codepen', 'goodwish'),
					'ion-social-codepen-outline' => esc_html__( 'Codepen outline', 'goodwish'),
					'ion-social-css3' => esc_html__( 'CSS3', 'goodwish'),
					'ion-social-css3-outline' => esc_html__( 'CSS3 outline', 'goodwish'),
					'ion-social-designernews' => esc_html__( 'Designernews', 'goodwish'),
					'ion-social-designernews-outline' => esc_html__( 'Designernews outline', 'goodwish'),
					'ion-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'ion-social-dribbble-outline' => esc_html__( 'Dribbble outline', 'goodwish'),
					'ion-social-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'ion-social-dropbox-outline' => esc_html__( 'Dropbox outline', 'goodwish'),
					'ion-social-euro' => esc_html__( 'Euro', 'goodwish'),
					'ion-social-euro-outline' => esc_html__( 'Euro outline', 'goodwish'),
					'ion-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'ion-social-facebook-outline' => esc_html__( 'Facebook outline', 'goodwish'),
					'ion-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'ion-social-foursquare-outline' => esc_html__( 'Foursquare outline', 'goodwish'),
					'ion-social-freebsd-devil' => esc_html__( 'Freebsd devil', 'goodwish'),
					'ion-social-github' => esc_html__( 'Github', 'goodwish'),
					'ion-social-github-outline' => esc_html__( 'Github outline', 'goodwish'),
					'ion-social-google' => esc_html__( 'Google', 'goodwish'),
					'ion-social-google-outline' => esc_html__( 'Google outline', 'goodwish'),
					'ion-social-googleplus' => esc_html__( 'Google plus', 'goodwish'),
					'ion-social-googleplus-outline' => esc_html__( 'Google plus outline', 'goodwish'),
					'ion-social-hackernews' => esc_html__( 'Hackernews', 'goodwish'),
					'ion-social-hackernews-outline' => esc_html__( 'Hackernews outline', 'goodwish'),
					'ion-social-html5' => esc_html__( 'HTML5', 'goodwish'),
					'ion-social-html5-outline' => esc_html__( 'HTML5 outline', 'goodwish'),
					'ion-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'ion-social-instagram-outline' => esc_html__( 'Instagram outline', 'goodwish'),
					'ion-social-javascript' => esc_html__( 'Java Script', 'goodwish'),
					'ion-social-javascript-outline' => esc_html__( 'Java Script outline', 'goodwish'),
					'ion-social-linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'ion-social-linkedin-outline' => esc_html__( 'Linkedin outline', 'goodwish'),
					'ion-social-markdown' => esc_html__( 'Markdown', 'goodwish'),
					'ion-social-nodejs' => esc_html__( 'Node.js', 'goodwish'),
					'ion-social-octocat' => esc_html__( 'Octocat', 'goodwish'),
					'ion-social-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'ion-social-pinterest-outline' => esc_html__( 'Pinterest outline', 'goodwish'),
					'ion-social-python' => esc_html__( 'Python', 'goodwish'),
					'ion-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'ion-social-reddit-outline' => esc_html__( 'Reddit outline', 'goodwish'),
					'ion-social-rss' => esc_html__( 'RSS', 'goodwish'),
					'ion-social-rss-outline' => esc_html__( 'RSS outline', 'goodwish'),
					'ion-social-sass' => esc_html__( 'sass', 'goodwish'),
					'ion-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'ion-social-skype-outline' => esc_html__( 'Skype outline', 'goodwish'),
					'ion-social-snapchat' => esc_html__( 'Snapchat', 'goodwish'),
					'ion-social-snapchat-outline' => esc_html__( 'Snapchat outline', 'goodwish'),
					'ion-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'ion-social-tumblr-outline' => esc_html__( 'Tumblr outline', 'goodwish'),
					'ion-social-tux' => esc_html__( 'Tux', 'goodwish'),
					'ion-social-twitch' => esc_html__( 'Twitch', 'goodwish'),
					'ion-social-twitch-outline' => esc_html__( 'Twitch outline', 'goodwish'),
					'ion-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'ion-social-twitter-outline' => esc_html__( 'Twitter outline', 'goodwish'),
					'ion-social-usd' => esc_html__( 'USD', 'goodwish'),
					'ion-social-usd-outline' => esc_html__( 'USD outline', 'goodwish'),
					'ion-social-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'ion-social-vimeo-outline' => esc_html__( 'Vimeo outline', 'goodwish'),
					'ion-social-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'ion-social-whatsapp-outline' => esc_html__( 'Whatsapp outline', 'goodwish'),
					'ion-social-windows' => esc_html__( 'Windows', 'goodwish'),
					'ion-social-windows-outline' => esc_html__( 'Windows outline', 'goodwish'),
					'ion-social-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'ion-social-wordpress-outline' => esc_html__( 'WordPress outline', 'goodwish'),
					'ion-social-yahoo' => esc_html__( 'Yahoo', 'goodwish'),
					'ion-social-yahoo-outline' => esc_html__( 'Yahoo outline', 'goodwish'),
					'ion-social-yen' => esc_html__( 'Yen', 'goodwish'),
					'ion-social-yen-outline' => esc_html__( 'Yen outline', 'goodwish'),
					'ion-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'ion-social-youtube-outline' => esc_html__( 'Youtube outline', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ion_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_simple_line_icons_1',
			[
				'label'     => esc_html__( 'Social Icon 1 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icon-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'icon-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'icon-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'icon-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'icon-social-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'icon-social-pintarest' => esc_html__( 'Pinterest', 'goodwish'),
					'icon-social-github' => esc_html__( 'Github', 'goodwish'),
					'icon-social-gplus' => esc_html__( 'Google Plus', 'goodwish'),
					'icon-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'icon-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'icon-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'icon-social-behance' => esc_html__( 'Behance', 'goodwish'),
					'icon-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'icon-social-soundcloud' => esc_html__( 'Soundcloud', 'goodwish'),
					'icon-social-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'icon-social-stumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'icon-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'icon-social-dropbox' => esc_html__( 'Dropbox', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'simple_line_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_1_link',
			[
				'label'     => esc_html__( 'Social Icon 1 Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome', 'font_elegant', 'ico_moon', 'ion_icons', 'linea_icons', 'linear_icons', 'simple_line_icons', 'dripicons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_1_target',
			[
				'label'     => esc_html__( 'Social Icon 1 Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_1_link!' => ''
				]
			]
		);

		$this->add_control(
			'team_social_fa_icon_2',
			[
				'label'     => esc_html__( 'Social Icon 2 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'fa-500px' => esc_html__( '500px', 'goodwish'),
					'fa-adn' => esc_html__( 'ADN', 'goodwish'),
					'fa-amazon' => esc_html__( 'Amazon', 'goodwish'),
					'fa-android' => esc_html__( 'Android', 'goodwish'),
					'fa-angellist' => esc_html__( 'Angellist', 'goodwish'),
					'fa-apple' => esc_html__( 'Apple', 'goodwish'),
					'fa-behance' => esc_html__( 'Behance', 'goodwish'),
					'fa-behance-square' => esc_html__( 'Behance Square', 'goodwish'),
					'fa-bitbucket' => esc_html__( 'Bitbucket', 'goodwish'),
					'fa-bitbucket-square' => esc_html__( 'Bitbucket Square', 'goodwish'),
					'fa-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'fa-btc' => esc_html__( 'BTC', 'goodwish'),
					'fa-css3' => esc_html__( 'CSS3', 'goodwish'),
					'fa-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'fa-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'fa-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'fa-flickr' => esc_html__( 'Flickr', 'goodwish'),
					'fa-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'fa-github' => esc_html__( 'GitHub', 'goodwish'),
					'fa-github-alt' => esc_html__( 'GitHub-Alt', 'goodwish'),
					'fa-git-square' => esc_html__( 'GitHub-Square', 'goodwish'),
					'fa-gittip' => esc_html__( 'Gittip', 'goodwish'),
					'fa-google-plus' => esc_html__( 'Google Plus', 'goodwish'),
					'fa-html5' => esc_html__( 'HTML5', 'goodwish'),
					'fa-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'fa-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'fa-linux' => esc_html__( 'Linux', 'goodwish'),
					'fa-envelope' => esc_html__( 'Mail', 'goodwish'),
					'fa-envelope-o' => esc_html__( 'Mail Alt', 'goodwish'),
					'fa-envelope-square' => esc_html__( 'Mail Square', 'goodwish'),
					'fa-maxcdn' => esc_html__( 'MaxCDN', 'goodwish'),
					'fa-paypal' => esc_html__( 'Paypal', 'goodwish'),
					'fa-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'fa-reddit-alien' => esc_html__( 'Reddit Alien', 'goodwish'),
					'fa-renren' => esc_html__( 'Renren', 'goodwish'),
					'fa-skype' => esc_html__( 'Skype', 'goodwish'),
					'fa-slack' => esc_html__( 'Slack', 'goodwish'),
					'fa-snapchat-ghost' => esc_html__( 'Snapchat Ghost', 'goodwish'),
					'fa-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'fa-stack-exchange' => esc_html__( 'StackExchange', 'goodwish'),
					'fa-stack-overflow' => esc_html__( 'StackOverflow', 'goodwish'),
					'fa-telegram' => esc_html__( 'Telegram', 'goodwish'),
					'fa-tripadvisor' => esc_html__( 'Trip Advisor', 'goodwish'),
					'fa-trello' => esc_html__( 'Trello', 'goodwish'),
					'fa-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'fa-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'fa-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'fa-vimeo-square' => esc_html__( 'Vimeo Square', 'goodwish'),
					'fa-vine' => esc_html__( 'Vine', 'goodwish'),
					'fa-vk' => esc_html__( 'VK', 'goodwish'),
					'fa-weixin' => esc_html__( 'Wechat', 'goodwish'),
					'fa-weibo' => esc_html__( 'Weibo', 'goodwish'),
					'fa-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'fa-wikipedia-w' => esc_html__( 'Wikipedia', 'goodwish'),
					'fa-windows' => esc_html__( 'Windows', 'goodwish'),
					'fa-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'fa-xing' => esc_html__( 'Xing', 'goodwish'),
					'fa-youtube' => esc_html__( 'YouTube', 'goodwish'),
					'fa-youtube-square' => esc_html__( 'YouTube Square', 'goodwish'),
					'fa-youtube-play' => esc_html__( 'YouTube Play', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome' )
				]
			]
		);

		$this->add_control(
			'team_social_fe_icon_2',
			[
				'label'     => esc_html__( 'Social Icon 2 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'social_blogger' => esc_html__( 'Blogger', 'goodwish'),
					'social_blogger_circle' => esc_html__( 'Blogger circle', 'goodwish'),
					'social_blogger_square' => esc_html__( 'Blogger square', 'goodwish'),
					'social_delicious' => esc_html__( 'Delicious', 'goodwish'),
					'social_delicious_circle' => esc_html__( 'Delicious circle', 'goodwish'),
					'social_delicious_square' => esc_html__( 'Delicious square', 'goodwish'),
					'social_deviantart' => esc_html__( 'Deviantart', 'goodwish'),
					'social_deviantart_circle' => esc_html__( 'Deviantart circle', 'goodwish'),
					'social_deviantart_square' => esc_html__( 'Deviantart square', 'goodwish'),
					'social_dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'social_dribbble_circle' => esc_html__( 'Dribbble circle', 'goodwish'),
					'social_dribbble_square' => esc_html__( 'Dribbble square', 'goodwish'),
					'social_facebook' => esc_html__( 'Facebook', 'goodwish'),
					'social_facebook_circle' => esc_html__( 'Facebook circle', 'goodwish'),
					'social_facebook_square' => esc_html__( 'Facebook square', 'goodwish'),
					'social_flickr' => esc_html__( 'Flickr', 'goodwish'),
					'social_flickr_circle' => esc_html__( 'Flickr circle', 'goodwish'),
					'social_flickr_square' => esc_html__( 'Flickr square', 'goodwish'),
					'social_googledrive' => esc_html__( 'Googledrive', 'goodwish'),
					'social_googledrive_alt2' => esc_html__( 'Googledrive alt2', 'goodwish'),
					'social_googledrive_square' => esc_html__( 'Googledrive square', 'goodwish'),
					'social_googleplus' => esc_html__( 'Googleplus', 'goodwish'),
					'social_googleplus_circle' => esc_html__( 'Googleplus circle', 'goodwish'),
					'social_googleplus_square' => esc_html__( 'Googleplus square', 'goodwish'),
					'social_instagram' => esc_html__( 'Instagram', 'goodwish'),
					'social_instagram_circle' => esc_html__( 'Instagram circle', 'goodwish'),
					'social_instagram_square' => esc_html__( 'Instagram square', 'goodwish'),
					'social_linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'social_linkedin_circle' => esc_html__( 'Linkedin circle', 'goodwish'),
					'social_linkedin_square' => esc_html__( 'Linkedin square', 'goodwish'),
					'social_myspace' => esc_html__( 'Myspace', 'goodwish'),
					'social_myspace_circle' => esc_html__( 'myspace circle', 'goodwish'),
					'social_myspace_square' => esc_html__( 'myspace square', 'goodwish'),
					'social_picassa' => esc_html__( 'Picassa', 'goodwish'),
					'social_picassa_circle' => esc_html__( 'Picassa circle', 'goodwish'),
					'social_picassa_square' => esc_html__( 'Picassa square', 'goodwish'),
					'social_pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'social_pinterest_circle' => esc_html__( 'Pinterest circle', 'goodwish'),
					'social_pinterest_square' => esc_html__( 'Pinterest square', 'goodwish'),
					'social_rss' => esc_html__( 'Rss', 'goodwish'),
					'social_rss_circle' => esc_html__( 'Rss circle', 'goodwish'),
					'social_rss_square' => esc_html__( 'Rss square', 'goodwish'),
					'social_share' => esc_html__( 'Share', 'goodwish'),
					'social_share_circle' => esc_html__( 'Share circle', 'goodwish'),
					'social_share_square' => esc_html__( 'Share square', 'goodwish'),
					'social_skype' => esc_html__( 'Skype', 'goodwish'),
					'social_skype_circle' => esc_html__( 'Skype circle', 'goodwish'),
					'social_skype_square' => esc_html__( 'Skype square', 'goodwish'),
					'social_spotify' => esc_html__( 'Spotify', 'goodwish'),
					'social_spotify_circle' => esc_html__( 'Spotify circle', 'goodwish'),
					'social_spotify_square' => esc_html__( 'Spotify square', 'goodwish'),
					'social_stumbleupon_circle' => esc_html__( 'Stumbleupon circle', 'goodwish'),
					'social_stumbleupon_square' => esc_html__( 'Stumbleupon square', 'goodwish'),
					'social_tumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'social_tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'social_tumblr_circle' => esc_html__( 'Tumblr circle', 'goodwish'),
					'social_tumblr_square' => esc_html__( 'Tumblr square', 'goodwish'),
					'social_twitter' => esc_html__( 'Twitter', 'goodwish'),
					'social_twitter_circle' => esc_html__( 'Twitter circle', 'goodwish'),
					'social_twitter_square' => esc_html__( 'Twitter square', 'goodwish'),
					'social_vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'social_vimeo_circle' => esc_html__( 'Vimeo circle', 'goodwish'),
					'social_vimeo_square' => esc_html__( 'Vimeo square', 'goodwish'),
					'social_wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'social_wordpress_circle' => esc_html__( 'WordPress circle', 'goodwish'),
					'social_wordpress_square' => esc_html__( 'WordPress square', 'goodwish'),
					'social_youtube' => esc_html__( 'Youtube', 'goodwish'),
					'social_youtube_circle' => esc_html__( 'Youtube circle', 'goodwish'),
					'social_youtube_square' => esc_html__( 'Youtube square', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_elegant' )
				]
			]
		);

		$this->add_control(
			'team_social_ico_moon_2',
			[
				'label'     => esc_html__( 'Social Icon 2 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icomoon-icon-mail' => esc_html__( 'icomoon-icon-mail', 'goodwish'),
					'icomoon-icon-mail2' => esc_html__( 'icomoon-icon-mail2', 'goodwish'),
					'icomoon-icon-mail3' => esc_html__( 'icomoon-icon-mail3', 'goodwish'),
					'icomoon-icon-mail4' => esc_html__( 'icomoon-icon-mail4', 'goodwish'),
					'icomoon-icon-google' => esc_html__( 'icomoon-icon-google', 'goodwish'),
					'icomoon-icon-google-plus' => esc_html__( 'icomoon-icon-google-plus', 'goodwish'),
					'icomoon-icon-google-plus2' => esc_html__( 'icomoon-icon-google-plus2', 'goodwish'),
					'icomoon-icon-google-plus3' => esc_html__( 'icomoon-icon-google-plus3', 'goodwish'),
					'icomoon-icon-google-drive' => esc_html__( 'icomoon-icon-google-drive', 'goodwish'),
					'icomoon-icon-facebook' => esc_html__( 'icomoon-icon-facebook', 'goodwish'),
					'icomoon-icon-facebook2' => esc_html__( 'icomoon-icon-facebook2', 'goodwish'),
					'icomoon-icon-facebook3' => esc_html__( 'icomoon-icon-facebook3', 'goodwish'),
					'icomoon-icon-ello' => esc_html__( 'icomoon-icon-ello', 'goodwish'),
					'icomoon-icon-instagram' => esc_html__( 'icomoon-icon-instagram', 'goodwish'),
					'icomoon-icon-twitter' => esc_html__( 'icomoon-icon-twitter', 'goodwish'),
					'icomoon-icon-twitter2' => esc_html__( 'icomoon-icon-twitter2', 'goodwish'),
					'icomoon-icon-twitter3' => esc_html__( 'icomoon-icon-twitter3', 'goodwish'),
					'icomoon-icon-feed2' => esc_html__( 'icomoon-icon-feed2', 'goodwish'),
					'icomoon-icon-feed3' => esc_html__( 'icomoon-icon-feed3', 'goodwish'),
					'icomoon-icon-feed4' => esc_html__( 'icomoon-icon-feed4', 'goodwish'),
					'icomoon-icon-youtube' => esc_html__( 'icomoon-icon-youtube', 'goodwish'),
					'icomoon-icon-youtube2' => esc_html__( 'icomoon-icon-youtube2', 'goodwish'),
					'icomoon-icon-youtube3' => esc_html__( 'icomoon-icon-youtube3', 'goodwish'),
					'icomoon-icon-youtube4' => esc_html__( 'icomoon-icon-youtube4', 'goodwish'),
					'icomoon-icon-twitch' => esc_html__( 'icomoon-icon-twitch', 'goodwish'),
					'icomoon-icon-vimeo' => esc_html__( 'icomoon-icon-vimeo', 'goodwish'),
					'icomoon-icon-vimeo2' => esc_html__( 'icomoon-icon-vimeo2', 'goodwish'),
					'icomoon-icon-vimeo3' => esc_html__( 'icomoon-icon-vimeo3', 'goodwish'),
					'icomoon-icon-lanyrd' => esc_html__( 'icomoon-icon-lanyrd', 'goodwish'),
					'icomoon-icon-flickr' => esc_html__( 'icomoon-icon-flickr', 'goodwish'),
					'icomoon-icon-flickr2' => esc_html__( 'icomoon-icon-flickr2', 'goodwish'),
					'icomoon-icon-flickr3' => esc_html__( 'icomoon-icon-flickr3', 'goodwish'),
					'icomoon-icon-flickr4' => esc_html__( 'icomoon-icon-flickr4', 'goodwish'),
					'icomoon-icon-picassa' => esc_html__( 'icomoon-icon-picassa', 'goodwish'),
					'icomoon-icon-picassa2' => esc_html__( 'icomoon-icon-picassa2', 'goodwish'),
					'icomoon-icon-dribbble' => esc_html__( 'icomoon-icon-dribbble', 'goodwish'),
					'icomoon-icon-dribbble2' => esc_html__( 'icomoon-icon-dribbble2', 'goodwish'),
					'icomoon-icon-dribbble3' => esc_html__( 'icomoon-icon-dribbble3', 'goodwish'),
					'icomoon-icon-forrst' => esc_html__( 'icomoon-icon-forrst', 'goodwish'),
					'icomoon-icon-forrst2' => esc_html__( 'icomoon-icon-forrst2', 'goodwish'),
					'icomoon-icon-deviantart' => esc_html__( 'icomoon-icon-deviantart', 'goodwish'),
					'icomoon-icon-deviantart2' => esc_html__( 'icomoon-icon-deviantart2', 'goodwish'),
					'icomoon-icon-steam' => esc_html__( 'icomoon-icon-steam', 'goodwish'),
					'icomoon-icon-steam2' => esc_html__( 'icomoon-icon-steam2', 'goodwish'),
					'icomoon-icon-dropbox' => esc_html__( 'icomoon-icon-dropbox', 'goodwish'),
					'icomoon-icon-onedrive' => esc_html__( 'icomoon-icon-onedrive', 'goodwish'),
					'icomoon-icon-github' => esc_html__( 'icomoon-icon-github', 'goodwish'),
					'icomoon-icon-github2' => esc_html__( 'icomoon-icon-github2', 'goodwish'),
					'icomoon-icon-github3' => esc_html__( 'icomoon-icon-github3', 'goodwish'),
					'icomoon-icon-github4' => esc_html__( 'icomoon-icon-github4', 'goodwish'),
					'icomoon-icon-github5' => esc_html__( 'icomoon-icon-github5', 'goodwish'),
					'icomoon-icon-wordpress' => esc_html__( 'icomoon-icon-wordpress', 'goodwish'),
					'icomoon-icon-wordpress2' => esc_html__( 'icomoon-icon-wordpress2', 'goodwish'),
					'icomoon-icon-joomla' => esc_html__( 'icomoon-icon-joomla', 'goodwish'),
					'icomoon-icon-blogger' => esc_html__( 'icomoon-icon-blogger', 'goodwish'),
					'icomoon-icon-blogger2' => esc_html__( 'icomoon-icon-blogger2', 'goodwish'),
					'icomoon-icon-tumblr' => esc_html__( 'icomoon-icon-tumblr', 'goodwish'),
					'icomoon-icon-tumblr2' => esc_html__( 'icomoon-icon-tumblr2', 'goodwish'),
					'icomoon-icon-yahoo' => esc_html__( 'icomoon-icon-yahoo', 'goodwish'),
					'icomoon-icon-tux' => esc_html__( 'icomoon-icon-tux', 'goodwish'),
					'icomoon-icon-apple' => esc_html__( 'icomoon-icon-apple', 'goodwish'),
					'icomoon-icon-finder' => esc_html__( 'icomoon-icon-finder', 'goodwish'),
					'icomoon-icon-android' => esc_html__( 'icomoon-icon-android', 'goodwish'),
					'icomoon-icon-windows' => esc_html__( 'icomoon-icon-windows', 'goodwish'),
					'icomoon-icon-windows8' => esc_html__( 'icomoon-icon-windows8', 'goodwish'),
					'icomoon-icon-soundcloud' => esc_html__( 'icomoon-icon-soundcloud', 'goodwish'),
					'icomoon-icon-soundcloud2' => esc_html__( 'icomoon-icon-soundcloud2', 'goodwish'),
					'icomoon-icon-skype' => esc_html__( 'icomoon-icon-skype', 'goodwish'),
					'icomoon-icon-reddit' => esc_html__( 'icomoon-icon-reddit', 'goodwish'),
					'icomoon-icon-linkedin' => esc_html__( 'icomoon-icon-linkedin', 'goodwish'),
					'icomoon-icon-linkedin2' => esc_html__( 'icomoon-icon-linkedin2', 'goodwish'),
					'icomoon-icon-lastfm' => esc_html__( 'icomoon-icon-lastfm', 'goodwish'),
					'icomoon-icon-lastfm2' => esc_html__( 'icomoon-icon-lastfm2', 'goodwish'),
					'icomoon-icon-delicious' => esc_html__( 'icomoon-icon-delicious', 'goodwish'),
					'icomoon-icon-stumbleupon' => esc_html__( 'icomoon-icon-stumbleupon', 'goodwish'),
					'icomoon-icon-stumbleupon2' => esc_html__( 'icomoon-icon-stumbleupon2', 'goodwish'),
					'icomoon-icon-stackoverflow' => esc_html__( 'icomoon-icon-stackoverflow', 'goodwish'),
					'icomoon-icon-pinterest' => esc_html__( 'icomoon-icon-pinterest', 'goodwish'),
					'icomoon-icon-pinterest2' => esc_html__( 'icomoon-icon-pinterest2', 'goodwish'),
					'icomoon-icon-xing' => esc_html__( 'icomoon-icon-xing', 'goodwish'),
					'icomoon-icon-xing2' => esc_html__( 'icomoon-icon-xing2', 'goodwish'),
					'icomoon-icon-flattr' => esc_html__( 'icomoon-icon-flattr', 'goodwish'),
					'icomoon-icon-foursquare' => esc_html__( 'icomoon-icon-foursquare', 'goodwish'),
					'icomoon-icon-paypal' => esc_html__( 'icomoon-icon-paypal', 'goodwish'),
					'icomoon-icon-paypal2' => esc_html__( 'icomoon-icon-paypal2', 'goodwish'),
					'icomoon-icon-paypal3' => esc_html__( 'icomoon-icon-paypal3', 'goodwish'),
					'icomoon-icon-yelp' => esc_html__( 'icomoon-icon-yelp', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ico_moon' )
				]
			]
		);

		$this->add_control(
			'team_social_ion_icon_2',
			[
				'label'     => esc_html__( 'Social Icon 2 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'ion-social-android' => esc_html__( 'Android', 'goodwish'),
					'ion-social-android-outline' => esc_html__( 'Android outline', 'goodwish'),
					'ion-social-angular' => esc_html__( 'Angular', 'goodwish'),
					'ion-social-angular-outline' => esc_html__( 'Angular outline', 'goodwish'),
					'ion-social-apple' => esc_html__( 'Apple', 'goodwish'),
					'ion-social-apple-outline' => esc_html__( 'Apple outline', 'goodwish'),
					'ion-social-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'ion-social-bitcoin-outline' => esc_html__( 'Bitcoin outline', 'goodwish'),
					'ion-social-buffer' => esc_html__( 'Buffer', 'goodwish'),
					'ion-social-buffer-outline' => esc_html__( 'Buffer outline', 'goodwish'),
					'ion-social-chrome' => esc_html__( 'Chrome', 'goodwish'),
					'ion-social-chrome-outline' => esc_html__( 'Chrome outline', 'goodwish'),
					'ion-social-codepen' => esc_html__( 'Codepen', 'goodwish'),
					'ion-social-codepen-outline' => esc_html__( 'Codepen outline', 'goodwish'),
					'ion-social-css3' => esc_html__( 'CSS3', 'goodwish'),
					'ion-social-css3-outline' => esc_html__( 'CSS3 outline', 'goodwish'),
					'ion-social-designernews' => esc_html__( 'Designernews', 'goodwish'),
					'ion-social-designernews-outline' => esc_html__( 'Designernews outline', 'goodwish'),
					'ion-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'ion-social-dribbble-outline' => esc_html__( 'Dribbble outline', 'goodwish'),
					'ion-social-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'ion-social-dropbox-outline' => esc_html__( 'Dropbox outline', 'goodwish'),
					'ion-social-euro' => esc_html__( 'Euro', 'goodwish'),
					'ion-social-euro-outline' => esc_html__( 'Euro outline', 'goodwish'),
					'ion-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'ion-social-facebook-outline' => esc_html__( 'Facebook outline', 'goodwish'),
					'ion-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'ion-social-foursquare-outline' => esc_html__( 'Foursquare outline', 'goodwish'),
					'ion-social-freebsd-devil' => esc_html__( 'Freebsd devil', 'goodwish'),
					'ion-social-github' => esc_html__( 'Github', 'goodwish'),
					'ion-social-github-outline' => esc_html__( 'Github outline', 'goodwish'),
					'ion-social-google' => esc_html__( 'Google', 'goodwish'),
					'ion-social-google-outline' => esc_html__( 'Google outline', 'goodwish'),
					'ion-social-googleplus' => esc_html__( 'Google plus', 'goodwish'),
					'ion-social-googleplus-outline' => esc_html__( 'Google plus outline', 'goodwish'),
					'ion-social-hackernews' => esc_html__( 'Hackernews', 'goodwish'),
					'ion-social-hackernews-outline' => esc_html__( 'Hackernews outline', 'goodwish'),
					'ion-social-html5' => esc_html__( 'HTML5', 'goodwish'),
					'ion-social-html5-outline' => esc_html__( 'HTML5 outline', 'goodwish'),
					'ion-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'ion-social-instagram-outline' => esc_html__( 'Instagram outline', 'goodwish'),
					'ion-social-javascript' => esc_html__( 'Java Script', 'goodwish'),
					'ion-social-javascript-outline' => esc_html__( 'Java Script outline', 'goodwish'),
					'ion-social-linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'ion-social-linkedin-outline' => esc_html__( 'Linkedin outline', 'goodwish'),
					'ion-social-markdown' => esc_html__( 'Markdown', 'goodwish'),
					'ion-social-nodejs' => esc_html__( 'Node.js', 'goodwish'),
					'ion-social-octocat' => esc_html__( 'Octocat', 'goodwish'),
					'ion-social-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'ion-social-pinterest-outline' => esc_html__( 'Pinterest outline', 'goodwish'),
					'ion-social-python' => esc_html__( 'Python', 'goodwish'),
					'ion-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'ion-social-reddit-outline' => esc_html__( 'Reddit outline', 'goodwish'),
					'ion-social-rss' => esc_html__( 'RSS', 'goodwish'),
					'ion-social-rss-outline' => esc_html__( 'RSS outline', 'goodwish'),
					'ion-social-sass' => esc_html__( 'sass', 'goodwish'),
					'ion-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'ion-social-skype-outline' => esc_html__( 'Skype outline', 'goodwish'),
					'ion-social-snapchat' => esc_html__( 'Snapchat', 'goodwish'),
					'ion-social-snapchat-outline' => esc_html__( 'Snapchat outline', 'goodwish'),
					'ion-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'ion-social-tumblr-outline' => esc_html__( 'Tumblr outline', 'goodwish'),
					'ion-social-tux' => esc_html__( 'Tux', 'goodwish'),
					'ion-social-twitch' => esc_html__( 'Twitch', 'goodwish'),
					'ion-social-twitch-outline' => esc_html__( 'Twitch outline', 'goodwish'),
					'ion-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'ion-social-twitter-outline' => esc_html__( 'Twitter outline', 'goodwish'),
					'ion-social-usd' => esc_html__( 'USD', 'goodwish'),
					'ion-social-usd-outline' => esc_html__( 'USD outline', 'goodwish'),
					'ion-social-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'ion-social-vimeo-outline' => esc_html__( 'Vimeo outline', 'goodwish'),
					'ion-social-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'ion-social-whatsapp-outline' => esc_html__( 'Whatsapp outline', 'goodwish'),
					'ion-social-windows' => esc_html__( 'Windows', 'goodwish'),
					'ion-social-windows-outline' => esc_html__( 'Windows outline', 'goodwish'),
					'ion-social-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'ion-social-wordpress-outline' => esc_html__( 'WordPress outline', 'goodwish'),
					'ion-social-yahoo' => esc_html__( 'Yahoo', 'goodwish'),
					'ion-social-yahoo-outline' => esc_html__( 'Yahoo outline', 'goodwish'),
					'ion-social-yen' => esc_html__( 'Yen', 'goodwish'),
					'ion-social-yen-outline' => esc_html__( 'Yen outline', 'goodwish'),
					'ion-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'ion-social-youtube-outline' => esc_html__( 'Youtube outline', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ion_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_simple_line_icons_2',
			[
				'label'     => esc_html__( 'Social Icon 2 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icon-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'icon-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'icon-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'icon-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'icon-social-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'icon-social-pintarest' => esc_html__( 'Pinterest', 'goodwish'),
					'icon-social-github' => esc_html__( 'Github', 'goodwish'),
					'icon-social-gplus' => esc_html__( 'Google Plus', 'goodwish'),
					'icon-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'icon-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'icon-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'icon-social-behance' => esc_html__( 'Behance', 'goodwish'),
					'icon-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'icon-social-soundcloud' => esc_html__( 'Soundcloud', 'goodwish'),
					'icon-social-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'icon-social-stumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'icon-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'icon-social-dropbox' => esc_html__( 'Dropbox', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'simple_line_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_2_link',
			[
				'label'     => esc_html__( 'Social Icon 2 Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome', 'font_elegant', 'ico_moon', 'ion_icons', 'linea_icons', 'linear_icons', 'simple_line_icons', 'dripicons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_2_target',
			[
				'label'     => esc_html__( 'Social Icon 2 Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_2_link!' => ''
				]
			]
		);

		$this->add_control(
			'team_social_fa_icon_3',
			[
				'label'     => esc_html__( 'Social Icon 3 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'fa-500px' => esc_html__( '500px', 'goodwish'),
					'fa-adn' => esc_html__( 'ADN', 'goodwish'),
					'fa-amazon' => esc_html__( 'Amazon', 'goodwish'),
					'fa-android' => esc_html__( 'Android', 'goodwish'),
					'fa-angellist' => esc_html__( 'Angellist', 'goodwish'),
					'fa-apple' => esc_html__( 'Apple', 'goodwish'),
					'fa-behance' => esc_html__( 'Behance', 'goodwish'),
					'fa-behance-square' => esc_html__( 'Behance Square', 'goodwish'),
					'fa-bitbucket' => esc_html__( 'Bitbucket', 'goodwish'),
					'fa-bitbucket-square' => esc_html__( 'Bitbucket Square', 'goodwish'),
					'fa-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'fa-btc' => esc_html__( 'BTC', 'goodwish'),
					'fa-css3' => esc_html__( 'CSS3', 'goodwish'),
					'fa-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'fa-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'fa-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'fa-flickr' => esc_html__( 'Flickr', 'goodwish'),
					'fa-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'fa-github' => esc_html__( 'GitHub', 'goodwish'),
					'fa-github-alt' => esc_html__( 'GitHub-Alt', 'goodwish'),
					'fa-git-square' => esc_html__( 'GitHub-Square', 'goodwish'),
					'fa-gittip' => esc_html__( 'Gittip', 'goodwish'),
					'fa-google-plus' => esc_html__( 'Google Plus', 'goodwish'),
					'fa-html5' => esc_html__( 'HTML5', 'goodwish'),
					'fa-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'fa-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'fa-linux' => esc_html__( 'Linux', 'goodwish'),
					'fa-envelope' => esc_html__( 'Mail', 'goodwish'),
					'fa-envelope-o' => esc_html__( 'Mail Alt', 'goodwish'),
					'fa-envelope-square' => esc_html__( 'Mail Square', 'goodwish'),
					'fa-maxcdn' => esc_html__( 'MaxCDN', 'goodwish'),
					'fa-paypal' => esc_html__( 'Paypal', 'goodwish'),
					'fa-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'fa-reddit-alien' => esc_html__( 'Reddit Alien', 'goodwish'),
					'fa-renren' => esc_html__( 'Renren', 'goodwish'),
					'fa-skype' => esc_html__( 'Skype', 'goodwish'),
					'fa-slack' => esc_html__( 'Slack', 'goodwish'),
					'fa-snapchat-ghost' => esc_html__( 'Snapchat Ghost', 'goodwish'),
					'fa-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'fa-stack-exchange' => esc_html__( 'StackExchange', 'goodwish'),
					'fa-stack-overflow' => esc_html__( 'StackOverflow', 'goodwish'),
					'fa-telegram' => esc_html__( 'Telegram', 'goodwish'),
					'fa-tripadvisor' => esc_html__( 'Trip Advisor', 'goodwish'),
					'fa-trello' => esc_html__( 'Trello', 'goodwish'),
					'fa-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'fa-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'fa-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'fa-vimeo-square' => esc_html__( 'Vimeo Square', 'goodwish'),
					'fa-vine' => esc_html__( 'Vine', 'goodwish'),
					'fa-vk' => esc_html__( 'VK', 'goodwish'),
					'fa-weixin' => esc_html__( 'Wechat', 'goodwish'),
					'fa-weibo' => esc_html__( 'Weibo', 'goodwish'),
					'fa-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'fa-wikipedia-w' => esc_html__( 'Wikipedia', 'goodwish'),
					'fa-windows' => esc_html__( 'Windows', 'goodwish'),
					'fa-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'fa-xing' => esc_html__( 'Xing', 'goodwish'),
					'fa-youtube' => esc_html__( 'YouTube', 'goodwish'),
					'fa-youtube-square' => esc_html__( 'YouTube Square', 'goodwish'),
					'fa-youtube-play' => esc_html__( 'YouTube Play', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome' )
				]
			]
		);

		$this->add_control(
			'team_social_fe_icon_3',
			[
				'label'     => esc_html__( 'Social Icon 3 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'social_blogger' => esc_html__( 'Blogger', 'goodwish'),
					'social_blogger_circle' => esc_html__( 'Blogger circle', 'goodwish'),
					'social_blogger_square' => esc_html__( 'Blogger square', 'goodwish'),
					'social_delicious' => esc_html__( 'Delicious', 'goodwish'),
					'social_delicious_circle' => esc_html__( 'Delicious circle', 'goodwish'),
					'social_delicious_square' => esc_html__( 'Delicious square', 'goodwish'),
					'social_deviantart' => esc_html__( 'Deviantart', 'goodwish'),
					'social_deviantart_circle' => esc_html__( 'Deviantart circle', 'goodwish'),
					'social_deviantart_square' => esc_html__( 'Deviantart square', 'goodwish'),
					'social_dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'social_dribbble_circle' => esc_html__( 'Dribbble circle', 'goodwish'),
					'social_dribbble_square' => esc_html__( 'Dribbble square', 'goodwish'),
					'social_facebook' => esc_html__( 'Facebook', 'goodwish'),
					'social_facebook_circle' => esc_html__( 'Facebook circle', 'goodwish'),
					'social_facebook_square' => esc_html__( 'Facebook square', 'goodwish'),
					'social_flickr' => esc_html__( 'Flickr', 'goodwish'),
					'social_flickr_circle' => esc_html__( 'Flickr circle', 'goodwish'),
					'social_flickr_square' => esc_html__( 'Flickr square', 'goodwish'),
					'social_googledrive' => esc_html__( 'Googledrive', 'goodwish'),
					'social_googledrive_alt2' => esc_html__( 'Googledrive alt2', 'goodwish'),
					'social_googledrive_square' => esc_html__( 'Googledrive square', 'goodwish'),
					'social_googleplus' => esc_html__( 'Googleplus', 'goodwish'),
					'social_googleplus_circle' => esc_html__( 'Googleplus circle', 'goodwish'),
					'social_googleplus_square' => esc_html__( 'Googleplus square', 'goodwish'),
					'social_instagram' => esc_html__( 'Instagram', 'goodwish'),
					'social_instagram_circle' => esc_html__( 'Instagram circle', 'goodwish'),
					'social_instagram_square' => esc_html__( 'Instagram square', 'goodwish'),
					'social_linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'social_linkedin_circle' => esc_html__( 'Linkedin circle', 'goodwish'),
					'social_linkedin_square' => esc_html__( 'Linkedin square', 'goodwish'),
					'social_myspace' => esc_html__( 'Myspace', 'goodwish'),
					'social_myspace_circle' => esc_html__( 'myspace circle', 'goodwish'),
					'social_myspace_square' => esc_html__( 'myspace square', 'goodwish'),
					'social_picassa' => esc_html__( 'Picassa', 'goodwish'),
					'social_picassa_circle' => esc_html__( 'Picassa circle', 'goodwish'),
					'social_picassa_square' => esc_html__( 'Picassa square', 'goodwish'),
					'social_pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'social_pinterest_circle' => esc_html__( 'Pinterest circle', 'goodwish'),
					'social_pinterest_square' => esc_html__( 'Pinterest square', 'goodwish'),
					'social_rss' => esc_html__( 'Rss', 'goodwish'),
					'social_rss_circle' => esc_html__( 'Rss circle', 'goodwish'),
					'social_rss_square' => esc_html__( 'Rss square', 'goodwish'),
					'social_share' => esc_html__( 'Share', 'goodwish'),
					'social_share_circle' => esc_html__( 'Share circle', 'goodwish'),
					'social_share_square' => esc_html__( 'Share square', 'goodwish'),
					'social_skype' => esc_html__( 'Skype', 'goodwish'),
					'social_skype_circle' => esc_html__( 'Skype circle', 'goodwish'),
					'social_skype_square' => esc_html__( 'Skype square', 'goodwish'),
					'social_spotify' => esc_html__( 'Spotify', 'goodwish'),
					'social_spotify_circle' => esc_html__( 'Spotify circle', 'goodwish'),
					'social_spotify_square' => esc_html__( 'Spotify square', 'goodwish'),
					'social_stumbleupon_circle' => esc_html__( 'Stumbleupon circle', 'goodwish'),
					'social_stumbleupon_square' => esc_html__( 'Stumbleupon square', 'goodwish'),
					'social_tumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'social_tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'social_tumblr_circle' => esc_html__( 'Tumblr circle', 'goodwish'),
					'social_tumblr_square' => esc_html__( 'Tumblr square', 'goodwish'),
					'social_twitter' => esc_html__( 'Twitter', 'goodwish'),
					'social_twitter_circle' => esc_html__( 'Twitter circle', 'goodwish'),
					'social_twitter_square' => esc_html__( 'Twitter square', 'goodwish'),
					'social_vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'social_vimeo_circle' => esc_html__( 'Vimeo circle', 'goodwish'),
					'social_vimeo_square' => esc_html__( 'Vimeo square', 'goodwish'),
					'social_wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'social_wordpress_circle' => esc_html__( 'WordPress circle', 'goodwish'),
					'social_wordpress_square' => esc_html__( 'WordPress square', 'goodwish'),
					'social_youtube' => esc_html__( 'Youtube', 'goodwish'),
					'social_youtube_circle' => esc_html__( 'Youtube circle', 'goodwish'),
					'social_youtube_square' => esc_html__( 'Youtube square', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_elegant' )
				]
			]
		);

		$this->add_control(
			'team_social_ico_moon_3',
			[
				'label'     => esc_html__( 'Social Icon 3 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icomoon-icon-mail' => esc_html__( 'icomoon-icon-mail', 'goodwish'),
					'icomoon-icon-mail2' => esc_html__( 'icomoon-icon-mail2', 'goodwish'),
					'icomoon-icon-mail3' => esc_html__( 'icomoon-icon-mail3', 'goodwish'),
					'icomoon-icon-mail4' => esc_html__( 'icomoon-icon-mail4', 'goodwish'),
					'icomoon-icon-google' => esc_html__( 'icomoon-icon-google', 'goodwish'),
					'icomoon-icon-google-plus' => esc_html__( 'icomoon-icon-google-plus', 'goodwish'),
					'icomoon-icon-google-plus2' => esc_html__( 'icomoon-icon-google-plus2', 'goodwish'),
					'icomoon-icon-google-plus3' => esc_html__( 'icomoon-icon-google-plus3', 'goodwish'),
					'icomoon-icon-google-drive' => esc_html__( 'icomoon-icon-google-drive', 'goodwish'),
					'icomoon-icon-facebook' => esc_html__( 'icomoon-icon-facebook', 'goodwish'),
					'icomoon-icon-facebook2' => esc_html__( 'icomoon-icon-facebook2', 'goodwish'),
					'icomoon-icon-facebook3' => esc_html__( 'icomoon-icon-facebook3', 'goodwish'),
					'icomoon-icon-ello' => esc_html__( 'icomoon-icon-ello', 'goodwish'),
					'icomoon-icon-instagram' => esc_html__( 'icomoon-icon-instagram', 'goodwish'),
					'icomoon-icon-twitter' => esc_html__( 'icomoon-icon-twitter', 'goodwish'),
					'icomoon-icon-twitter2' => esc_html__( 'icomoon-icon-twitter2', 'goodwish'),
					'icomoon-icon-twitter3' => esc_html__( 'icomoon-icon-twitter3', 'goodwish'),
					'icomoon-icon-feed2' => esc_html__( 'icomoon-icon-feed2', 'goodwish'),
					'icomoon-icon-feed3' => esc_html__( 'icomoon-icon-feed3', 'goodwish'),
					'icomoon-icon-feed4' => esc_html__( 'icomoon-icon-feed4', 'goodwish'),
					'icomoon-icon-youtube' => esc_html__( 'icomoon-icon-youtube', 'goodwish'),
					'icomoon-icon-youtube2' => esc_html__( 'icomoon-icon-youtube2', 'goodwish'),
					'icomoon-icon-youtube3' => esc_html__( 'icomoon-icon-youtube3', 'goodwish'),
					'icomoon-icon-youtube4' => esc_html__( 'icomoon-icon-youtube4', 'goodwish'),
					'icomoon-icon-twitch' => esc_html__( 'icomoon-icon-twitch', 'goodwish'),
					'icomoon-icon-vimeo' => esc_html__( 'icomoon-icon-vimeo', 'goodwish'),
					'icomoon-icon-vimeo2' => esc_html__( 'icomoon-icon-vimeo2', 'goodwish'),
					'icomoon-icon-vimeo3' => esc_html__( 'icomoon-icon-vimeo3', 'goodwish'),
					'icomoon-icon-lanyrd' => esc_html__( 'icomoon-icon-lanyrd', 'goodwish'),
					'icomoon-icon-flickr' => esc_html__( 'icomoon-icon-flickr', 'goodwish'),
					'icomoon-icon-flickr2' => esc_html__( 'icomoon-icon-flickr2', 'goodwish'),
					'icomoon-icon-flickr3' => esc_html__( 'icomoon-icon-flickr3', 'goodwish'),
					'icomoon-icon-flickr4' => esc_html__( 'icomoon-icon-flickr4', 'goodwish'),
					'icomoon-icon-picassa' => esc_html__( 'icomoon-icon-picassa', 'goodwish'),
					'icomoon-icon-picassa2' => esc_html__( 'icomoon-icon-picassa2', 'goodwish'),
					'icomoon-icon-dribbble' => esc_html__( 'icomoon-icon-dribbble', 'goodwish'),
					'icomoon-icon-dribbble2' => esc_html__( 'icomoon-icon-dribbble2', 'goodwish'),
					'icomoon-icon-dribbble3' => esc_html__( 'icomoon-icon-dribbble3', 'goodwish'),
					'icomoon-icon-forrst' => esc_html__( 'icomoon-icon-forrst', 'goodwish'),
					'icomoon-icon-forrst2' => esc_html__( 'icomoon-icon-forrst2', 'goodwish'),
					'icomoon-icon-deviantart' => esc_html__( 'icomoon-icon-deviantart', 'goodwish'),
					'icomoon-icon-deviantart2' => esc_html__( 'icomoon-icon-deviantart2', 'goodwish'),
					'icomoon-icon-steam' => esc_html__( 'icomoon-icon-steam', 'goodwish'),
					'icomoon-icon-steam2' => esc_html__( 'icomoon-icon-steam2', 'goodwish'),
					'icomoon-icon-dropbox' => esc_html__( 'icomoon-icon-dropbox', 'goodwish'),
					'icomoon-icon-onedrive' => esc_html__( 'icomoon-icon-onedrive', 'goodwish'),
					'icomoon-icon-github' => esc_html__( 'icomoon-icon-github', 'goodwish'),
					'icomoon-icon-github2' => esc_html__( 'icomoon-icon-github2', 'goodwish'),
					'icomoon-icon-github3' => esc_html__( 'icomoon-icon-github3', 'goodwish'),
					'icomoon-icon-github4' => esc_html__( 'icomoon-icon-github4', 'goodwish'),
					'icomoon-icon-github5' => esc_html__( 'icomoon-icon-github5', 'goodwish'),
					'icomoon-icon-wordpress' => esc_html__( 'icomoon-icon-wordpress', 'goodwish'),
					'icomoon-icon-wordpress2' => esc_html__( 'icomoon-icon-wordpress2', 'goodwish'),
					'icomoon-icon-joomla' => esc_html__( 'icomoon-icon-joomla', 'goodwish'),
					'icomoon-icon-blogger' => esc_html__( 'icomoon-icon-blogger', 'goodwish'),
					'icomoon-icon-blogger2' => esc_html__( 'icomoon-icon-blogger2', 'goodwish'),
					'icomoon-icon-tumblr' => esc_html__( 'icomoon-icon-tumblr', 'goodwish'),
					'icomoon-icon-tumblr2' => esc_html__( 'icomoon-icon-tumblr2', 'goodwish'),
					'icomoon-icon-yahoo' => esc_html__( 'icomoon-icon-yahoo', 'goodwish'),
					'icomoon-icon-tux' => esc_html__( 'icomoon-icon-tux', 'goodwish'),
					'icomoon-icon-apple' => esc_html__( 'icomoon-icon-apple', 'goodwish'),
					'icomoon-icon-finder' => esc_html__( 'icomoon-icon-finder', 'goodwish'),
					'icomoon-icon-android' => esc_html__( 'icomoon-icon-android', 'goodwish'),
					'icomoon-icon-windows' => esc_html__( 'icomoon-icon-windows', 'goodwish'),
					'icomoon-icon-windows8' => esc_html__( 'icomoon-icon-windows8', 'goodwish'),
					'icomoon-icon-soundcloud' => esc_html__( 'icomoon-icon-soundcloud', 'goodwish'),
					'icomoon-icon-soundcloud2' => esc_html__( 'icomoon-icon-soundcloud2', 'goodwish'),
					'icomoon-icon-skype' => esc_html__( 'icomoon-icon-skype', 'goodwish'),
					'icomoon-icon-reddit' => esc_html__( 'icomoon-icon-reddit', 'goodwish'),
					'icomoon-icon-linkedin' => esc_html__( 'icomoon-icon-linkedin', 'goodwish'),
					'icomoon-icon-linkedin2' => esc_html__( 'icomoon-icon-linkedin2', 'goodwish'),
					'icomoon-icon-lastfm' => esc_html__( 'icomoon-icon-lastfm', 'goodwish'),
					'icomoon-icon-lastfm2' => esc_html__( 'icomoon-icon-lastfm2', 'goodwish'),
					'icomoon-icon-delicious' => esc_html__( 'icomoon-icon-delicious', 'goodwish'),
					'icomoon-icon-stumbleupon' => esc_html__( 'icomoon-icon-stumbleupon', 'goodwish'),
					'icomoon-icon-stumbleupon2' => esc_html__( 'icomoon-icon-stumbleupon2', 'goodwish'),
					'icomoon-icon-stackoverflow' => esc_html__( 'icomoon-icon-stackoverflow', 'goodwish'),
					'icomoon-icon-pinterest' => esc_html__( 'icomoon-icon-pinterest', 'goodwish'),
					'icomoon-icon-pinterest2' => esc_html__( 'icomoon-icon-pinterest2', 'goodwish'),
					'icomoon-icon-xing' => esc_html__( 'icomoon-icon-xing', 'goodwish'),
					'icomoon-icon-xing2' => esc_html__( 'icomoon-icon-xing2', 'goodwish'),
					'icomoon-icon-flattr' => esc_html__( 'icomoon-icon-flattr', 'goodwish'),
					'icomoon-icon-foursquare' => esc_html__( 'icomoon-icon-foursquare', 'goodwish'),
					'icomoon-icon-paypal' => esc_html__( 'icomoon-icon-paypal', 'goodwish'),
					'icomoon-icon-paypal2' => esc_html__( 'icomoon-icon-paypal2', 'goodwish'),
					'icomoon-icon-paypal3' => esc_html__( 'icomoon-icon-paypal3', 'goodwish'),
					'icomoon-icon-yelp' => esc_html__( 'icomoon-icon-yelp', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ico_moon' )
				]
			]
		);

		$this->add_control(
			'team_social_ion_icon_3',
			[
				'label'     => esc_html__( 'Social Icon 3 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'ion-social-android' => esc_html__( 'Android', 'goodwish'),
					'ion-social-android-outline' => esc_html__( 'Android outline', 'goodwish'),
					'ion-social-angular' => esc_html__( 'Angular', 'goodwish'),
					'ion-social-angular-outline' => esc_html__( 'Angular outline', 'goodwish'),
					'ion-social-apple' => esc_html__( 'Apple', 'goodwish'),
					'ion-social-apple-outline' => esc_html__( 'Apple outline', 'goodwish'),
					'ion-social-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'ion-social-bitcoin-outline' => esc_html__( 'Bitcoin outline', 'goodwish'),
					'ion-social-buffer' => esc_html__( 'Buffer', 'goodwish'),
					'ion-social-buffer-outline' => esc_html__( 'Buffer outline', 'goodwish'),
					'ion-social-chrome' => esc_html__( 'Chrome', 'goodwish'),
					'ion-social-chrome-outline' => esc_html__( 'Chrome outline', 'goodwish'),
					'ion-social-codepen' => esc_html__( 'Codepen', 'goodwish'),
					'ion-social-codepen-outline' => esc_html__( 'Codepen outline', 'goodwish'),
					'ion-social-css3' => esc_html__( 'CSS3', 'goodwish'),
					'ion-social-css3-outline' => esc_html__( 'CSS3 outline', 'goodwish'),
					'ion-social-designernews' => esc_html__( 'Designernews', 'goodwish'),
					'ion-social-designernews-outline' => esc_html__( 'Designernews outline', 'goodwish'),
					'ion-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'ion-social-dribbble-outline' => esc_html__( 'Dribbble outline', 'goodwish'),
					'ion-social-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'ion-social-dropbox-outline' => esc_html__( 'Dropbox outline', 'goodwish'),
					'ion-social-euro' => esc_html__( 'Euro', 'goodwish'),
					'ion-social-euro-outline' => esc_html__( 'Euro outline', 'goodwish'),
					'ion-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'ion-social-facebook-outline' => esc_html__( 'Facebook outline', 'goodwish'),
					'ion-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'ion-social-foursquare-outline' => esc_html__( 'Foursquare outline', 'goodwish'),
					'ion-social-freebsd-devil' => esc_html__( 'Freebsd devil', 'goodwish'),
					'ion-social-github' => esc_html__( 'Github', 'goodwish'),
					'ion-social-github-outline' => esc_html__( 'Github outline', 'goodwish'),
					'ion-social-google' => esc_html__( 'Google', 'goodwish'),
					'ion-social-google-outline' => esc_html__( 'Google outline', 'goodwish'),
					'ion-social-googleplus' => esc_html__( 'Google plus', 'goodwish'),
					'ion-social-googleplus-outline' => esc_html__( 'Google plus outline', 'goodwish'),
					'ion-social-hackernews' => esc_html__( 'Hackernews', 'goodwish'),
					'ion-social-hackernews-outline' => esc_html__( 'Hackernews outline', 'goodwish'),
					'ion-social-html5' => esc_html__( 'HTML5', 'goodwish'),
					'ion-social-html5-outline' => esc_html__( 'HTML5 outline', 'goodwish'),
					'ion-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'ion-social-instagram-outline' => esc_html__( 'Instagram outline', 'goodwish'),
					'ion-social-javascript' => esc_html__( 'Java Script', 'goodwish'),
					'ion-social-javascript-outline' => esc_html__( 'Java Script outline', 'goodwish'),
					'ion-social-linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'ion-social-linkedin-outline' => esc_html__( 'Linkedin outline', 'goodwish'),
					'ion-social-markdown' => esc_html__( 'Markdown', 'goodwish'),
					'ion-social-nodejs' => esc_html__( 'Node.js', 'goodwish'),
					'ion-social-octocat' => esc_html__( 'Octocat', 'goodwish'),
					'ion-social-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'ion-social-pinterest-outline' => esc_html__( 'Pinterest outline', 'goodwish'),
					'ion-social-python' => esc_html__( 'Python', 'goodwish'),
					'ion-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'ion-social-reddit-outline' => esc_html__( 'Reddit outline', 'goodwish'),
					'ion-social-rss' => esc_html__( 'RSS', 'goodwish'),
					'ion-social-rss-outline' => esc_html__( 'RSS outline', 'goodwish'),
					'ion-social-sass' => esc_html__( 'sass', 'goodwish'),
					'ion-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'ion-social-skype-outline' => esc_html__( 'Skype outline', 'goodwish'),
					'ion-social-snapchat' => esc_html__( 'Snapchat', 'goodwish'),
					'ion-social-snapchat-outline' => esc_html__( 'Snapchat outline', 'goodwish'),
					'ion-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'ion-social-tumblr-outline' => esc_html__( 'Tumblr outline', 'goodwish'),
					'ion-social-tux' => esc_html__( 'Tux', 'goodwish'),
					'ion-social-twitch' => esc_html__( 'Twitch', 'goodwish'),
					'ion-social-twitch-outline' => esc_html__( 'Twitch outline', 'goodwish'),
					'ion-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'ion-social-twitter-outline' => esc_html__( 'Twitter outline', 'goodwish'),
					'ion-social-usd' => esc_html__( 'USD', 'goodwish'),
					'ion-social-usd-outline' => esc_html__( 'USD outline', 'goodwish'),
					'ion-social-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'ion-social-vimeo-outline' => esc_html__( 'Vimeo outline', 'goodwish'),
					'ion-social-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'ion-social-whatsapp-outline' => esc_html__( 'Whatsapp outline', 'goodwish'),
					'ion-social-windows' => esc_html__( 'Windows', 'goodwish'),
					'ion-social-windows-outline' => esc_html__( 'Windows outline', 'goodwish'),
					'ion-social-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'ion-social-wordpress-outline' => esc_html__( 'WordPress outline', 'goodwish'),
					'ion-social-yahoo' => esc_html__( 'Yahoo', 'goodwish'),
					'ion-social-yahoo-outline' => esc_html__( 'Yahoo outline', 'goodwish'),
					'ion-social-yen' => esc_html__( 'Yen', 'goodwish'),
					'ion-social-yen-outline' => esc_html__( 'Yen outline', 'goodwish'),
					'ion-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'ion-social-youtube-outline' => esc_html__( 'Youtube outline', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ion_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_simple_line_icons_3',
			[
				'label'     => esc_html__( 'Social Icon 3 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icon-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'icon-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'icon-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'icon-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'icon-social-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'icon-social-pintarest' => esc_html__( 'Pinterest', 'goodwish'),
					'icon-social-github' => esc_html__( 'Github', 'goodwish'),
					'icon-social-gplus' => esc_html__( 'Google Plus', 'goodwish'),
					'icon-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'icon-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'icon-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'icon-social-behance' => esc_html__( 'Behance', 'goodwish'),
					'icon-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'icon-social-soundcloud' => esc_html__( 'Soundcloud', 'goodwish'),
					'icon-social-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'icon-social-stumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'icon-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'icon-social-dropbox' => esc_html__( 'Dropbox', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'simple_line_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_3_link',
			[
				'label'     => esc_html__( 'Social Icon 3 Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome', 'font_elegant', 'ico_moon', 'ion_icons', 'linea_icons', 'linear_icons', 'simple_line_icons', 'dripicons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_3_target',
			[
				'label'     => esc_html__( 'Social Icon 3 Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_3_link!' => ''
				]
			]
		);

		$this->add_control(
			'team_social_fa_icon_4',
			[
				'label'     => esc_html__( 'Social Icon 4 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'fa-500px' => esc_html__( '500px', 'goodwish'),
					'fa-adn' => esc_html__( 'ADN', 'goodwish'),
					'fa-amazon' => esc_html__( 'Amazon', 'goodwish'),
					'fa-android' => esc_html__( 'Android', 'goodwish'),
					'fa-angellist' => esc_html__( 'Angellist', 'goodwish'),
					'fa-apple' => esc_html__( 'Apple', 'goodwish'),
					'fa-behance' => esc_html__( 'Behance', 'goodwish'),
					'fa-behance-square' => esc_html__( 'Behance Square', 'goodwish'),
					'fa-bitbucket' => esc_html__( 'Bitbucket', 'goodwish'),
					'fa-bitbucket-square' => esc_html__( 'Bitbucket Square', 'goodwish'),
					'fa-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'fa-btc' => esc_html__( 'BTC', 'goodwish'),
					'fa-css3' => esc_html__( 'CSS3', 'goodwish'),
					'fa-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'fa-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'fa-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'fa-flickr' => esc_html__( 'Flickr', 'goodwish'),
					'fa-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'fa-github' => esc_html__( 'GitHub', 'goodwish'),
					'fa-github-alt' => esc_html__( 'GitHub-Alt', 'goodwish'),
					'fa-git-square' => esc_html__( 'GitHub-Square', 'goodwish'),
					'fa-gittip' => esc_html__( 'Gittip', 'goodwish'),
					'fa-google-plus' => esc_html__( 'Google Plus', 'goodwish'),
					'fa-html5' => esc_html__( 'HTML5', 'goodwish'),
					'fa-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'fa-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'fa-linux' => esc_html__( 'Linux', 'goodwish'),
					'fa-envelope' => esc_html__( 'Mail', 'goodwish'),
					'fa-envelope-o' => esc_html__( 'Mail Alt', 'goodwish'),
					'fa-envelope-square' => esc_html__( 'Mail Square', 'goodwish'),
					'fa-maxcdn' => esc_html__( 'MaxCDN', 'goodwish'),
					'fa-paypal' => esc_html__( 'Paypal', 'goodwish'),
					'fa-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'fa-reddit-alien' => esc_html__( 'Reddit Alien', 'goodwish'),
					'fa-renren' => esc_html__( 'Renren', 'goodwish'),
					'fa-skype' => esc_html__( 'Skype', 'goodwish'),
					'fa-slack' => esc_html__( 'Slack', 'goodwish'),
					'fa-snapchat-ghost' => esc_html__( 'Snapchat Ghost', 'goodwish'),
					'fa-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'fa-stack-exchange' => esc_html__( 'StackExchange', 'goodwish'),
					'fa-stack-overflow' => esc_html__( 'StackOverflow', 'goodwish'),
					'fa-telegram' => esc_html__( 'Telegram', 'goodwish'),
					'fa-tripadvisor' => esc_html__( 'Trip Advisor', 'goodwish'),
					'fa-trello' => esc_html__( 'Trello', 'goodwish'),
					'fa-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'fa-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'fa-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'fa-vimeo-square' => esc_html__( 'Vimeo Square', 'goodwish'),
					'fa-vine' => esc_html__( 'Vine', 'goodwish'),
					'fa-vk' => esc_html__( 'VK', 'goodwish'),
					'fa-weixin' => esc_html__( 'Wechat', 'goodwish'),
					'fa-weibo' => esc_html__( 'Weibo', 'goodwish'),
					'fa-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'fa-wikipedia-w' => esc_html__( 'Wikipedia', 'goodwish'),
					'fa-windows' => esc_html__( 'Windows', 'goodwish'),
					'fa-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'fa-xing' => esc_html__( 'Xing', 'goodwish'),
					'fa-youtube' => esc_html__( 'YouTube', 'goodwish'),
					'fa-youtube-square' => esc_html__( 'YouTube Square', 'goodwish'),
					'fa-youtube-play' => esc_html__( 'YouTube Play', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome' )
				]
			]
		);

		$this->add_control(
			'team_social_fe_icon_4',
			[
				'label'     => esc_html__( 'Social Icon 4 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'social_blogger' => esc_html__( 'Blogger', 'goodwish'),
					'social_blogger_circle' => esc_html__( 'Blogger circle', 'goodwish'),
					'social_blogger_square' => esc_html__( 'Blogger square', 'goodwish'),
					'social_delicious' => esc_html__( 'Delicious', 'goodwish'),
					'social_delicious_circle' => esc_html__( 'Delicious circle', 'goodwish'),
					'social_delicious_square' => esc_html__( 'Delicious square', 'goodwish'),
					'social_deviantart' => esc_html__( 'Deviantart', 'goodwish'),
					'social_deviantart_circle' => esc_html__( 'Deviantart circle', 'goodwish'),
					'social_deviantart_square' => esc_html__( 'Deviantart square', 'goodwish'),
					'social_dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'social_dribbble_circle' => esc_html__( 'Dribbble circle', 'goodwish'),
					'social_dribbble_square' => esc_html__( 'Dribbble square', 'goodwish'),
					'social_facebook' => esc_html__( 'Facebook', 'goodwish'),
					'social_facebook_circle' => esc_html__( 'Facebook circle', 'goodwish'),
					'social_facebook_square' => esc_html__( 'Facebook square', 'goodwish'),
					'social_flickr' => esc_html__( 'Flickr', 'goodwish'),
					'social_flickr_circle' => esc_html__( 'Flickr circle', 'goodwish'),
					'social_flickr_square' => esc_html__( 'Flickr square', 'goodwish'),
					'social_googledrive' => esc_html__( 'Googledrive', 'goodwish'),
					'social_googledrive_alt2' => esc_html__( 'Googledrive alt2', 'goodwish'),
					'social_googledrive_square' => esc_html__( 'Googledrive square', 'goodwish'),
					'social_googleplus' => esc_html__( 'Googleplus', 'goodwish'),
					'social_googleplus_circle' => esc_html__( 'Googleplus circle', 'goodwish'),
					'social_googleplus_square' => esc_html__( 'Googleplus square', 'goodwish'),
					'social_instagram' => esc_html__( 'Instagram', 'goodwish'),
					'social_instagram_circle' => esc_html__( 'Instagram circle', 'goodwish'),
					'social_instagram_square' => esc_html__( 'Instagram square', 'goodwish'),
					'social_linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'social_linkedin_circle' => esc_html__( 'Linkedin circle', 'goodwish'),
					'social_linkedin_square' => esc_html__( 'Linkedin square', 'goodwish'),
					'social_myspace' => esc_html__( 'Myspace', 'goodwish'),
					'social_myspace_circle' => esc_html__( 'myspace circle', 'goodwish'),
					'social_myspace_square' => esc_html__( 'myspace square', 'goodwish'),
					'social_picassa' => esc_html__( 'Picassa', 'goodwish'),
					'social_picassa_circle' => esc_html__( 'Picassa circle', 'goodwish'),
					'social_picassa_square' => esc_html__( 'Picassa square', 'goodwish'),
					'social_pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'social_pinterest_circle' => esc_html__( 'Pinterest circle', 'goodwish'),
					'social_pinterest_square' => esc_html__( 'Pinterest square', 'goodwish'),
					'social_rss' => esc_html__( 'Rss', 'goodwish'),
					'social_rss_circle' => esc_html__( 'Rss circle', 'goodwish'),
					'social_rss_square' => esc_html__( 'Rss square', 'goodwish'),
					'social_share' => esc_html__( 'Share', 'goodwish'),
					'social_share_circle' => esc_html__( 'Share circle', 'goodwish'),
					'social_share_square' => esc_html__( 'Share square', 'goodwish'),
					'social_skype' => esc_html__( 'Skype', 'goodwish'),
					'social_skype_circle' => esc_html__( 'Skype circle', 'goodwish'),
					'social_skype_square' => esc_html__( 'Skype square', 'goodwish'),
					'social_spotify' => esc_html__( 'Spotify', 'goodwish'),
					'social_spotify_circle' => esc_html__( 'Spotify circle', 'goodwish'),
					'social_spotify_square' => esc_html__( 'Spotify square', 'goodwish'),
					'social_stumbleupon_circle' => esc_html__( 'Stumbleupon circle', 'goodwish'),
					'social_stumbleupon_square' => esc_html__( 'Stumbleupon square', 'goodwish'),
					'social_tumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'social_tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'social_tumblr_circle' => esc_html__( 'Tumblr circle', 'goodwish'),
					'social_tumblr_square' => esc_html__( 'Tumblr square', 'goodwish'),
					'social_twitter' => esc_html__( 'Twitter', 'goodwish'),
					'social_twitter_circle' => esc_html__( 'Twitter circle', 'goodwish'),
					'social_twitter_square' => esc_html__( 'Twitter square', 'goodwish'),
					'social_vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'social_vimeo_circle' => esc_html__( 'Vimeo circle', 'goodwish'),
					'social_vimeo_square' => esc_html__( 'Vimeo square', 'goodwish'),
					'social_wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'social_wordpress_circle' => esc_html__( 'WordPress circle', 'goodwish'),
					'social_wordpress_square' => esc_html__( 'WordPress square', 'goodwish'),
					'social_youtube' => esc_html__( 'Youtube', 'goodwish'),
					'social_youtube_circle' => esc_html__( 'Youtube circle', 'goodwish'),
					'social_youtube_square' => esc_html__( 'Youtube square', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_elegant' )
				]
			]
		);

		$this->add_control(
			'team_social_ico_moon_4',
			[
				'label'     => esc_html__( 'Social Icon 4 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icomoon-icon-mail' => esc_html__( 'icomoon-icon-mail', 'goodwish'),
					'icomoon-icon-mail2' => esc_html__( 'icomoon-icon-mail2', 'goodwish'),
					'icomoon-icon-mail3' => esc_html__( 'icomoon-icon-mail3', 'goodwish'),
					'icomoon-icon-mail4' => esc_html__( 'icomoon-icon-mail4', 'goodwish'),
					'icomoon-icon-google' => esc_html__( 'icomoon-icon-google', 'goodwish'),
					'icomoon-icon-google-plus' => esc_html__( 'icomoon-icon-google-plus', 'goodwish'),
					'icomoon-icon-google-plus2' => esc_html__( 'icomoon-icon-google-plus2', 'goodwish'),
					'icomoon-icon-google-plus3' => esc_html__( 'icomoon-icon-google-plus3', 'goodwish'),
					'icomoon-icon-google-drive' => esc_html__( 'icomoon-icon-google-drive', 'goodwish'),
					'icomoon-icon-facebook' => esc_html__( 'icomoon-icon-facebook', 'goodwish'),
					'icomoon-icon-facebook2' => esc_html__( 'icomoon-icon-facebook2', 'goodwish'),
					'icomoon-icon-facebook3' => esc_html__( 'icomoon-icon-facebook3', 'goodwish'),
					'icomoon-icon-ello' => esc_html__( 'icomoon-icon-ello', 'goodwish'),
					'icomoon-icon-instagram' => esc_html__( 'icomoon-icon-instagram', 'goodwish'),
					'icomoon-icon-twitter' => esc_html__( 'icomoon-icon-twitter', 'goodwish'),
					'icomoon-icon-twitter2' => esc_html__( 'icomoon-icon-twitter2', 'goodwish'),
					'icomoon-icon-twitter3' => esc_html__( 'icomoon-icon-twitter3', 'goodwish'),
					'icomoon-icon-feed2' => esc_html__( 'icomoon-icon-feed2', 'goodwish'),
					'icomoon-icon-feed3' => esc_html__( 'icomoon-icon-feed3', 'goodwish'),
					'icomoon-icon-feed4' => esc_html__( 'icomoon-icon-feed4', 'goodwish'),
					'icomoon-icon-youtube' => esc_html__( 'icomoon-icon-youtube', 'goodwish'),
					'icomoon-icon-youtube2' => esc_html__( 'icomoon-icon-youtube2', 'goodwish'),
					'icomoon-icon-youtube3' => esc_html__( 'icomoon-icon-youtube3', 'goodwish'),
					'icomoon-icon-youtube4' => esc_html__( 'icomoon-icon-youtube4', 'goodwish'),
					'icomoon-icon-twitch' => esc_html__( 'icomoon-icon-twitch', 'goodwish'),
					'icomoon-icon-vimeo' => esc_html__( 'icomoon-icon-vimeo', 'goodwish'),
					'icomoon-icon-vimeo2' => esc_html__( 'icomoon-icon-vimeo2', 'goodwish'),
					'icomoon-icon-vimeo3' => esc_html__( 'icomoon-icon-vimeo3', 'goodwish'),
					'icomoon-icon-lanyrd' => esc_html__( 'icomoon-icon-lanyrd', 'goodwish'),
					'icomoon-icon-flickr' => esc_html__( 'icomoon-icon-flickr', 'goodwish'),
					'icomoon-icon-flickr2' => esc_html__( 'icomoon-icon-flickr2', 'goodwish'),
					'icomoon-icon-flickr3' => esc_html__( 'icomoon-icon-flickr3', 'goodwish'),
					'icomoon-icon-flickr4' => esc_html__( 'icomoon-icon-flickr4', 'goodwish'),
					'icomoon-icon-picassa' => esc_html__( 'icomoon-icon-picassa', 'goodwish'),
					'icomoon-icon-picassa2' => esc_html__( 'icomoon-icon-picassa2', 'goodwish'),
					'icomoon-icon-dribbble' => esc_html__( 'icomoon-icon-dribbble', 'goodwish'),
					'icomoon-icon-dribbble2' => esc_html__( 'icomoon-icon-dribbble2', 'goodwish'),
					'icomoon-icon-dribbble3' => esc_html__( 'icomoon-icon-dribbble3', 'goodwish'),
					'icomoon-icon-forrst' => esc_html__( 'icomoon-icon-forrst', 'goodwish'),
					'icomoon-icon-forrst2' => esc_html__( 'icomoon-icon-forrst2', 'goodwish'),
					'icomoon-icon-deviantart' => esc_html__( 'icomoon-icon-deviantart', 'goodwish'),
					'icomoon-icon-deviantart2' => esc_html__( 'icomoon-icon-deviantart2', 'goodwish'),
					'icomoon-icon-steam' => esc_html__( 'icomoon-icon-steam', 'goodwish'),
					'icomoon-icon-steam2' => esc_html__( 'icomoon-icon-steam2', 'goodwish'),
					'icomoon-icon-dropbox' => esc_html__( 'icomoon-icon-dropbox', 'goodwish'),
					'icomoon-icon-onedrive' => esc_html__( 'icomoon-icon-onedrive', 'goodwish'),
					'icomoon-icon-github' => esc_html__( 'icomoon-icon-github', 'goodwish'),
					'icomoon-icon-github2' => esc_html__( 'icomoon-icon-github2', 'goodwish'),
					'icomoon-icon-github3' => esc_html__( 'icomoon-icon-github3', 'goodwish'),
					'icomoon-icon-github4' => esc_html__( 'icomoon-icon-github4', 'goodwish'),
					'icomoon-icon-github5' => esc_html__( 'icomoon-icon-github5', 'goodwish'),
					'icomoon-icon-wordpress' => esc_html__( 'icomoon-icon-wordpress', 'goodwish'),
					'icomoon-icon-wordpress2' => esc_html__( 'icomoon-icon-wordpress2', 'goodwish'),
					'icomoon-icon-joomla' => esc_html__( 'icomoon-icon-joomla', 'goodwish'),
					'icomoon-icon-blogger' => esc_html__( 'icomoon-icon-blogger', 'goodwish'),
					'icomoon-icon-blogger2' => esc_html__( 'icomoon-icon-blogger2', 'goodwish'),
					'icomoon-icon-tumblr' => esc_html__( 'icomoon-icon-tumblr', 'goodwish'),
					'icomoon-icon-tumblr2' => esc_html__( 'icomoon-icon-tumblr2', 'goodwish'),
					'icomoon-icon-yahoo' => esc_html__( 'icomoon-icon-yahoo', 'goodwish'),
					'icomoon-icon-tux' => esc_html__( 'icomoon-icon-tux', 'goodwish'),
					'icomoon-icon-apple' => esc_html__( 'icomoon-icon-apple', 'goodwish'),
					'icomoon-icon-finder' => esc_html__( 'icomoon-icon-finder', 'goodwish'),
					'icomoon-icon-android' => esc_html__( 'icomoon-icon-android', 'goodwish'),
					'icomoon-icon-windows' => esc_html__( 'icomoon-icon-windows', 'goodwish'),
					'icomoon-icon-windows8' => esc_html__( 'icomoon-icon-windows8', 'goodwish'),
					'icomoon-icon-soundcloud' => esc_html__( 'icomoon-icon-soundcloud', 'goodwish'),
					'icomoon-icon-soundcloud2' => esc_html__( 'icomoon-icon-soundcloud2', 'goodwish'),
					'icomoon-icon-skype' => esc_html__( 'icomoon-icon-skype', 'goodwish'),
					'icomoon-icon-reddit' => esc_html__( 'icomoon-icon-reddit', 'goodwish'),
					'icomoon-icon-linkedin' => esc_html__( 'icomoon-icon-linkedin', 'goodwish'),
					'icomoon-icon-linkedin2' => esc_html__( 'icomoon-icon-linkedin2', 'goodwish'),
					'icomoon-icon-lastfm' => esc_html__( 'icomoon-icon-lastfm', 'goodwish'),
					'icomoon-icon-lastfm2' => esc_html__( 'icomoon-icon-lastfm2', 'goodwish'),
					'icomoon-icon-delicious' => esc_html__( 'icomoon-icon-delicious', 'goodwish'),
					'icomoon-icon-stumbleupon' => esc_html__( 'icomoon-icon-stumbleupon', 'goodwish'),
					'icomoon-icon-stumbleupon2' => esc_html__( 'icomoon-icon-stumbleupon2', 'goodwish'),
					'icomoon-icon-stackoverflow' => esc_html__( 'icomoon-icon-stackoverflow', 'goodwish'),
					'icomoon-icon-pinterest' => esc_html__( 'icomoon-icon-pinterest', 'goodwish'),
					'icomoon-icon-pinterest2' => esc_html__( 'icomoon-icon-pinterest2', 'goodwish'),
					'icomoon-icon-xing' => esc_html__( 'icomoon-icon-xing', 'goodwish'),
					'icomoon-icon-xing2' => esc_html__( 'icomoon-icon-xing2', 'goodwish'),
					'icomoon-icon-flattr' => esc_html__( 'icomoon-icon-flattr', 'goodwish'),
					'icomoon-icon-foursquare' => esc_html__( 'icomoon-icon-foursquare', 'goodwish'),
					'icomoon-icon-paypal' => esc_html__( 'icomoon-icon-paypal', 'goodwish'),
					'icomoon-icon-paypal2' => esc_html__( 'icomoon-icon-paypal2', 'goodwish'),
					'icomoon-icon-paypal3' => esc_html__( 'icomoon-icon-paypal3', 'goodwish'),
					'icomoon-icon-yelp' => esc_html__( 'icomoon-icon-yelp', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ico_moon' )
				]
			]
		);

		$this->add_control(
			'team_social_ion_icon_4',
			[
				'label'     => esc_html__( 'Social Icon 4 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'ion-social-android' => esc_html__( 'Android', 'goodwish'),
					'ion-social-android-outline' => esc_html__( 'Android outline', 'goodwish'),
					'ion-social-angular' => esc_html__( 'Angular', 'goodwish'),
					'ion-social-angular-outline' => esc_html__( 'Angular outline', 'goodwish'),
					'ion-social-apple' => esc_html__( 'Apple', 'goodwish'),
					'ion-social-apple-outline' => esc_html__( 'Apple outline', 'goodwish'),
					'ion-social-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'ion-social-bitcoin-outline' => esc_html__( 'Bitcoin outline', 'goodwish'),
					'ion-social-buffer' => esc_html__( 'Buffer', 'goodwish'),
					'ion-social-buffer-outline' => esc_html__( 'Buffer outline', 'goodwish'),
					'ion-social-chrome' => esc_html__( 'Chrome', 'goodwish'),
					'ion-social-chrome-outline' => esc_html__( 'Chrome outline', 'goodwish'),
					'ion-social-codepen' => esc_html__( 'Codepen', 'goodwish'),
					'ion-social-codepen-outline' => esc_html__( 'Codepen outline', 'goodwish'),
					'ion-social-css3' => esc_html__( 'CSS3', 'goodwish'),
					'ion-social-css3-outline' => esc_html__( 'CSS3 outline', 'goodwish'),
					'ion-social-designernews' => esc_html__( 'Designernews', 'goodwish'),
					'ion-social-designernews-outline' => esc_html__( 'Designernews outline', 'goodwish'),
					'ion-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'ion-social-dribbble-outline' => esc_html__( 'Dribbble outline', 'goodwish'),
					'ion-social-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'ion-social-dropbox-outline' => esc_html__( 'Dropbox outline', 'goodwish'),
					'ion-social-euro' => esc_html__( 'Euro', 'goodwish'),
					'ion-social-euro-outline' => esc_html__( 'Euro outline', 'goodwish'),
					'ion-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'ion-social-facebook-outline' => esc_html__( 'Facebook outline', 'goodwish'),
					'ion-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'ion-social-foursquare-outline' => esc_html__( 'Foursquare outline', 'goodwish'),
					'ion-social-freebsd-devil' => esc_html__( 'Freebsd devil', 'goodwish'),
					'ion-social-github' => esc_html__( 'Github', 'goodwish'),
					'ion-social-github-outline' => esc_html__( 'Github outline', 'goodwish'),
					'ion-social-google' => esc_html__( 'Google', 'goodwish'),
					'ion-social-google-outline' => esc_html__( 'Google outline', 'goodwish'),
					'ion-social-googleplus' => esc_html__( 'Google plus', 'goodwish'),
					'ion-social-googleplus-outline' => esc_html__( 'Google plus outline', 'goodwish'),
					'ion-social-hackernews' => esc_html__( 'Hackernews', 'goodwish'),
					'ion-social-hackernews-outline' => esc_html__( 'Hackernews outline', 'goodwish'),
					'ion-social-html5' => esc_html__( 'HTML5', 'goodwish'),
					'ion-social-html5-outline' => esc_html__( 'HTML5 outline', 'goodwish'),
					'ion-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'ion-social-instagram-outline' => esc_html__( 'Instagram outline', 'goodwish'),
					'ion-social-javascript' => esc_html__( 'Java Script', 'goodwish'),
					'ion-social-javascript-outline' => esc_html__( 'Java Script outline', 'goodwish'),
					'ion-social-linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'ion-social-linkedin-outline' => esc_html__( 'Linkedin outline', 'goodwish'),
					'ion-social-markdown' => esc_html__( 'Markdown', 'goodwish'),
					'ion-social-nodejs' => esc_html__( 'Node.js', 'goodwish'),
					'ion-social-octocat' => esc_html__( 'Octocat', 'goodwish'),
					'ion-social-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'ion-social-pinterest-outline' => esc_html__( 'Pinterest outline', 'goodwish'),
					'ion-social-python' => esc_html__( 'Python', 'goodwish'),
					'ion-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'ion-social-reddit-outline' => esc_html__( 'Reddit outline', 'goodwish'),
					'ion-social-rss' => esc_html__( 'RSS', 'goodwish'),
					'ion-social-rss-outline' => esc_html__( 'RSS outline', 'goodwish'),
					'ion-social-sass' => esc_html__( 'sass', 'goodwish'),
					'ion-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'ion-social-skype-outline' => esc_html__( 'Skype outline', 'goodwish'),
					'ion-social-snapchat' => esc_html__( 'Snapchat', 'goodwish'),
					'ion-social-snapchat-outline' => esc_html__( 'Snapchat outline', 'goodwish'),
					'ion-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'ion-social-tumblr-outline' => esc_html__( 'Tumblr outline', 'goodwish'),
					'ion-social-tux' => esc_html__( 'Tux', 'goodwish'),
					'ion-social-twitch' => esc_html__( 'Twitch', 'goodwish'),
					'ion-social-twitch-outline' => esc_html__( 'Twitch outline', 'goodwish'),
					'ion-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'ion-social-twitter-outline' => esc_html__( 'Twitter outline', 'goodwish'),
					'ion-social-usd' => esc_html__( 'USD', 'goodwish'),
					'ion-social-usd-outline' => esc_html__( 'USD outline', 'goodwish'),
					'ion-social-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'ion-social-vimeo-outline' => esc_html__( 'Vimeo outline', 'goodwish'),
					'ion-social-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'ion-social-whatsapp-outline' => esc_html__( 'Whatsapp outline', 'goodwish'),
					'ion-social-windows' => esc_html__( 'Windows', 'goodwish'),
					'ion-social-windows-outline' => esc_html__( 'Windows outline', 'goodwish'),
					'ion-social-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'ion-social-wordpress-outline' => esc_html__( 'WordPress outline', 'goodwish'),
					'ion-social-yahoo' => esc_html__( 'Yahoo', 'goodwish'),
					'ion-social-yahoo-outline' => esc_html__( 'Yahoo outline', 'goodwish'),
					'ion-social-yen' => esc_html__( 'Yen', 'goodwish'),
					'ion-social-yen-outline' => esc_html__( 'Yen outline', 'goodwish'),
					'ion-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'ion-social-youtube-outline' => esc_html__( 'Youtube outline', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ion_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_simple_line_icons_4',
			[
				'label'     => esc_html__( 'Social Icon 4 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icon-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'icon-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'icon-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'icon-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'icon-social-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'icon-social-pintarest' => esc_html__( 'Pinterest', 'goodwish'),
					'icon-social-github' => esc_html__( 'Github', 'goodwish'),
					'icon-social-gplus' => esc_html__( 'Google Plus', 'goodwish'),
					'icon-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'icon-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'icon-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'icon-social-behance' => esc_html__( 'Behance', 'goodwish'),
					'icon-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'icon-social-soundcloud' => esc_html__( 'Soundcloud', 'goodwish'),
					'icon-social-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'icon-social-stumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'icon-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'icon-social-dropbox' => esc_html__( 'Dropbox', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'simple_line_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_4_link',
			[
				'label'     => esc_html__( 'Social Icon 4 Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome', 'font_elegant', 'ico_moon', 'ion_icons', 'linea_icons', 'linear_icons', 'simple_line_icons', 'dripicons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_4_target',
			[
				'label'     => esc_html__( 'Social Icon 4 Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_4_link!' => ''
				]
			]
		);

		$this->add_control(
			'team_social_fa_icon_5',
			[
				'label'     => esc_html__( 'Social Icon 5 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'fa-500px' => esc_html__( '500px', 'goodwish'),
					'fa-adn' => esc_html__( 'ADN', 'goodwish'),
					'fa-amazon' => esc_html__( 'Amazon', 'goodwish'),
					'fa-android' => esc_html__( 'Android', 'goodwish'),
					'fa-angellist' => esc_html__( 'Angellist', 'goodwish'),
					'fa-apple' => esc_html__( 'Apple', 'goodwish'),
					'fa-behance' => esc_html__( 'Behance', 'goodwish'),
					'fa-behance-square' => esc_html__( 'Behance Square', 'goodwish'),
					'fa-bitbucket' => esc_html__( 'Bitbucket', 'goodwish'),
					'fa-bitbucket-square' => esc_html__( 'Bitbucket Square', 'goodwish'),
					'fa-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'fa-btc' => esc_html__( 'BTC', 'goodwish'),
					'fa-css3' => esc_html__( 'CSS3', 'goodwish'),
					'fa-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'fa-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'fa-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'fa-flickr' => esc_html__( 'Flickr', 'goodwish'),
					'fa-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'fa-github' => esc_html__( 'GitHub', 'goodwish'),
					'fa-github-alt' => esc_html__( 'GitHub-Alt', 'goodwish'),
					'fa-git-square' => esc_html__( 'GitHub-Square', 'goodwish'),
					'fa-gittip' => esc_html__( 'Gittip', 'goodwish'),
					'fa-google-plus' => esc_html__( 'Google Plus', 'goodwish'),
					'fa-html5' => esc_html__( 'HTML5', 'goodwish'),
					'fa-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'fa-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'fa-linux' => esc_html__( 'Linux', 'goodwish'),
					'fa-envelope' => esc_html__( 'Mail', 'goodwish'),
					'fa-envelope-o' => esc_html__( 'Mail Alt', 'goodwish'),
					'fa-envelope-square' => esc_html__( 'Mail Square', 'goodwish'),
					'fa-maxcdn' => esc_html__( 'MaxCDN', 'goodwish'),
					'fa-paypal' => esc_html__( 'Paypal', 'goodwish'),
					'fa-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'fa-reddit-alien' => esc_html__( 'Reddit Alien', 'goodwish'),
					'fa-renren' => esc_html__( 'Renren', 'goodwish'),
					'fa-skype' => esc_html__( 'Skype', 'goodwish'),
					'fa-slack' => esc_html__( 'Slack', 'goodwish'),
					'fa-snapchat-ghost' => esc_html__( 'Snapchat Ghost', 'goodwish'),
					'fa-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'fa-stack-exchange' => esc_html__( 'StackExchange', 'goodwish'),
					'fa-stack-overflow' => esc_html__( 'StackOverflow', 'goodwish'),
					'fa-telegram' => esc_html__( 'Telegram', 'goodwish'),
					'fa-tripadvisor' => esc_html__( 'Trip Advisor', 'goodwish'),
					'fa-trello' => esc_html__( 'Trello', 'goodwish'),
					'fa-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'fa-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'fa-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'fa-vimeo-square' => esc_html__( 'Vimeo Square', 'goodwish'),
					'fa-vine' => esc_html__( 'Vine', 'goodwish'),
					'fa-vk' => esc_html__( 'VK', 'goodwish'),
					'fa-weixin' => esc_html__( 'Wechat', 'goodwish'),
					'fa-weibo' => esc_html__( 'Weibo', 'goodwish'),
					'fa-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'fa-wikipedia-w' => esc_html__( 'Wikipedia', 'goodwish'),
					'fa-windows' => esc_html__( 'Windows', 'goodwish'),
					'fa-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'fa-xing' => esc_html__( 'Xing', 'goodwish'),
					'fa-youtube' => esc_html__( 'YouTube', 'goodwish'),
					'fa-youtube-square' => esc_html__( 'YouTube Square', 'goodwish'),
					'fa-youtube-play' => esc_html__( 'YouTube Play', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome' )
				]
			]
		);

		$this->add_control(
			'team_social_fe_icon_5',
			[
				'label'     => esc_html__( 'Social Icon 5 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'social_blogger' => esc_html__( 'Blogger', 'goodwish'),
					'social_blogger_circle' => esc_html__( 'Blogger circle', 'goodwish'),
					'social_blogger_square' => esc_html__( 'Blogger square', 'goodwish'),
					'social_delicious' => esc_html__( 'Delicious', 'goodwish'),
					'social_delicious_circle' => esc_html__( 'Delicious circle', 'goodwish'),
					'social_delicious_square' => esc_html__( 'Delicious square', 'goodwish'),
					'social_deviantart' => esc_html__( 'Deviantart', 'goodwish'),
					'social_deviantart_circle' => esc_html__( 'Deviantart circle', 'goodwish'),
					'social_deviantart_square' => esc_html__( 'Deviantart square', 'goodwish'),
					'social_dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'social_dribbble_circle' => esc_html__( 'Dribbble circle', 'goodwish'),
					'social_dribbble_square' => esc_html__( 'Dribbble square', 'goodwish'),
					'social_facebook' => esc_html__( 'Facebook', 'goodwish'),
					'social_facebook_circle' => esc_html__( 'Facebook circle', 'goodwish'),
					'social_facebook_square' => esc_html__( 'Facebook square', 'goodwish'),
					'social_flickr' => esc_html__( 'Flickr', 'goodwish'),
					'social_flickr_circle' => esc_html__( 'Flickr circle', 'goodwish'),
					'social_flickr_square' => esc_html__( 'Flickr square', 'goodwish'),
					'social_googledrive' => esc_html__( 'Googledrive', 'goodwish'),
					'social_googledrive_alt2' => esc_html__( 'Googledrive alt2', 'goodwish'),
					'social_googledrive_square' => esc_html__( 'Googledrive square', 'goodwish'),
					'social_googleplus' => esc_html__( 'Googleplus', 'goodwish'),
					'social_googleplus_circle' => esc_html__( 'Googleplus circle', 'goodwish'),
					'social_googleplus_square' => esc_html__( 'Googleplus square', 'goodwish'),
					'social_instagram' => esc_html__( 'Instagram', 'goodwish'),
					'social_instagram_circle' => esc_html__( 'Instagram circle', 'goodwish'),
					'social_instagram_square' => esc_html__( 'Instagram square', 'goodwish'),
					'social_linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'social_linkedin_circle' => esc_html__( 'Linkedin circle', 'goodwish'),
					'social_linkedin_square' => esc_html__( 'Linkedin square', 'goodwish'),
					'social_myspace' => esc_html__( 'Myspace', 'goodwish'),
					'social_myspace_circle' => esc_html__( 'myspace circle', 'goodwish'),
					'social_myspace_square' => esc_html__( 'myspace square', 'goodwish'),
					'social_picassa' => esc_html__( 'Picassa', 'goodwish'),
					'social_picassa_circle' => esc_html__( 'Picassa circle', 'goodwish'),
					'social_picassa_square' => esc_html__( 'Picassa square', 'goodwish'),
					'social_pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'social_pinterest_circle' => esc_html__( 'Pinterest circle', 'goodwish'),
					'social_pinterest_square' => esc_html__( 'Pinterest square', 'goodwish'),
					'social_rss' => esc_html__( 'Rss', 'goodwish'),
					'social_rss_circle' => esc_html__( 'Rss circle', 'goodwish'),
					'social_rss_square' => esc_html__( 'Rss square', 'goodwish'),
					'social_share' => esc_html__( 'Share', 'goodwish'),
					'social_share_circle' => esc_html__( 'Share circle', 'goodwish'),
					'social_share_square' => esc_html__( 'Share square', 'goodwish'),
					'social_skype' => esc_html__( 'Skype', 'goodwish'),
					'social_skype_circle' => esc_html__( 'Skype circle', 'goodwish'),
					'social_skype_square' => esc_html__( 'Skype square', 'goodwish'),
					'social_spotify' => esc_html__( 'Spotify', 'goodwish'),
					'social_spotify_circle' => esc_html__( 'Spotify circle', 'goodwish'),
					'social_spotify_square' => esc_html__( 'Spotify square', 'goodwish'),
					'social_stumbleupon_circle' => esc_html__( 'Stumbleupon circle', 'goodwish'),
					'social_stumbleupon_square' => esc_html__( 'Stumbleupon square', 'goodwish'),
					'social_tumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'social_tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'social_tumblr_circle' => esc_html__( 'Tumblr circle', 'goodwish'),
					'social_tumblr_square' => esc_html__( 'Tumblr square', 'goodwish'),
					'social_twitter' => esc_html__( 'Twitter', 'goodwish'),
					'social_twitter_circle' => esc_html__( 'Twitter circle', 'goodwish'),
					'social_twitter_square' => esc_html__( 'Twitter square', 'goodwish'),
					'social_vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'social_vimeo_circle' => esc_html__( 'Vimeo circle', 'goodwish'),
					'social_vimeo_square' => esc_html__( 'Vimeo square', 'goodwish'),
					'social_wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'social_wordpress_circle' => esc_html__( 'WordPress circle', 'goodwish'),
					'social_wordpress_square' => esc_html__( 'WordPress square', 'goodwish'),
					'social_youtube' => esc_html__( 'Youtube', 'goodwish'),
					'social_youtube_circle' => esc_html__( 'Youtube circle', 'goodwish'),
					'social_youtube_square' => esc_html__( 'Youtube square', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'font_elegant' )
				]
			]
		);

		$this->add_control(
			'team_social_ico_moon_5',
			[
				'label'     => esc_html__( 'Social Icon 5 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icomoon-icon-mail' => esc_html__( 'icomoon-icon-mail', 'goodwish'),
					'icomoon-icon-mail2' => esc_html__( 'icomoon-icon-mail2', 'goodwish'),
					'icomoon-icon-mail3' => esc_html__( 'icomoon-icon-mail3', 'goodwish'),
					'icomoon-icon-mail4' => esc_html__( 'icomoon-icon-mail4', 'goodwish'),
					'icomoon-icon-google' => esc_html__( 'icomoon-icon-google', 'goodwish'),
					'icomoon-icon-google-plus' => esc_html__( 'icomoon-icon-google-plus', 'goodwish'),
					'icomoon-icon-google-plus2' => esc_html__( 'icomoon-icon-google-plus2', 'goodwish'),
					'icomoon-icon-google-plus3' => esc_html__( 'icomoon-icon-google-plus3', 'goodwish'),
					'icomoon-icon-google-drive' => esc_html__( 'icomoon-icon-google-drive', 'goodwish'),
					'icomoon-icon-facebook' => esc_html__( 'icomoon-icon-facebook', 'goodwish'),
					'icomoon-icon-facebook2' => esc_html__( 'icomoon-icon-facebook2', 'goodwish'),
					'icomoon-icon-facebook3' => esc_html__( 'icomoon-icon-facebook3', 'goodwish'),
					'icomoon-icon-ello' => esc_html__( 'icomoon-icon-ello', 'goodwish'),
					'icomoon-icon-instagram' => esc_html__( 'icomoon-icon-instagram', 'goodwish'),
					'icomoon-icon-twitter' => esc_html__( 'icomoon-icon-twitter', 'goodwish'),
					'icomoon-icon-twitter2' => esc_html__( 'icomoon-icon-twitter2', 'goodwish'),
					'icomoon-icon-twitter3' => esc_html__( 'icomoon-icon-twitter3', 'goodwish'),
					'icomoon-icon-feed2' => esc_html__( 'icomoon-icon-feed2', 'goodwish'),
					'icomoon-icon-feed3' => esc_html__( 'icomoon-icon-feed3', 'goodwish'),
					'icomoon-icon-feed4' => esc_html__( 'icomoon-icon-feed4', 'goodwish'),
					'icomoon-icon-youtube' => esc_html__( 'icomoon-icon-youtube', 'goodwish'),
					'icomoon-icon-youtube2' => esc_html__( 'icomoon-icon-youtube2', 'goodwish'),
					'icomoon-icon-youtube3' => esc_html__( 'icomoon-icon-youtube3', 'goodwish'),
					'icomoon-icon-youtube4' => esc_html__( 'icomoon-icon-youtube4', 'goodwish'),
					'icomoon-icon-twitch' => esc_html__( 'icomoon-icon-twitch', 'goodwish'),
					'icomoon-icon-vimeo' => esc_html__( 'icomoon-icon-vimeo', 'goodwish'),
					'icomoon-icon-vimeo2' => esc_html__( 'icomoon-icon-vimeo2', 'goodwish'),
					'icomoon-icon-vimeo3' => esc_html__( 'icomoon-icon-vimeo3', 'goodwish'),
					'icomoon-icon-lanyrd' => esc_html__( 'icomoon-icon-lanyrd', 'goodwish'),
					'icomoon-icon-flickr' => esc_html__( 'icomoon-icon-flickr', 'goodwish'),
					'icomoon-icon-flickr2' => esc_html__( 'icomoon-icon-flickr2', 'goodwish'),
					'icomoon-icon-flickr3' => esc_html__( 'icomoon-icon-flickr3', 'goodwish'),
					'icomoon-icon-flickr4' => esc_html__( 'icomoon-icon-flickr4', 'goodwish'),
					'icomoon-icon-picassa' => esc_html__( 'icomoon-icon-picassa', 'goodwish'),
					'icomoon-icon-picassa2' => esc_html__( 'icomoon-icon-picassa2', 'goodwish'),
					'icomoon-icon-dribbble' => esc_html__( 'icomoon-icon-dribbble', 'goodwish'),
					'icomoon-icon-dribbble2' => esc_html__( 'icomoon-icon-dribbble2', 'goodwish'),
					'icomoon-icon-dribbble3' => esc_html__( 'icomoon-icon-dribbble3', 'goodwish'),
					'icomoon-icon-forrst' => esc_html__( 'icomoon-icon-forrst', 'goodwish'),
					'icomoon-icon-forrst2' => esc_html__( 'icomoon-icon-forrst2', 'goodwish'),
					'icomoon-icon-deviantart' => esc_html__( 'icomoon-icon-deviantart', 'goodwish'),
					'icomoon-icon-deviantart2' => esc_html__( 'icomoon-icon-deviantart2', 'goodwish'),
					'icomoon-icon-steam' => esc_html__( 'icomoon-icon-steam', 'goodwish'),
					'icomoon-icon-steam2' => esc_html__( 'icomoon-icon-steam2', 'goodwish'),
					'icomoon-icon-dropbox' => esc_html__( 'icomoon-icon-dropbox', 'goodwish'),
					'icomoon-icon-onedrive' => esc_html__( 'icomoon-icon-onedrive', 'goodwish'),
					'icomoon-icon-github' => esc_html__( 'icomoon-icon-github', 'goodwish'),
					'icomoon-icon-github2' => esc_html__( 'icomoon-icon-github2', 'goodwish'),
					'icomoon-icon-github3' => esc_html__( 'icomoon-icon-github3', 'goodwish'),
					'icomoon-icon-github4' => esc_html__( 'icomoon-icon-github4', 'goodwish'),
					'icomoon-icon-github5' => esc_html__( 'icomoon-icon-github5', 'goodwish'),
					'icomoon-icon-wordpress' => esc_html__( 'icomoon-icon-wordpress', 'goodwish'),
					'icomoon-icon-wordpress2' => esc_html__( 'icomoon-icon-wordpress2', 'goodwish'),
					'icomoon-icon-joomla' => esc_html__( 'icomoon-icon-joomla', 'goodwish'),
					'icomoon-icon-blogger' => esc_html__( 'icomoon-icon-blogger', 'goodwish'),
					'icomoon-icon-blogger2' => esc_html__( 'icomoon-icon-blogger2', 'goodwish'),
					'icomoon-icon-tumblr' => esc_html__( 'icomoon-icon-tumblr', 'goodwish'),
					'icomoon-icon-tumblr2' => esc_html__( 'icomoon-icon-tumblr2', 'goodwish'),
					'icomoon-icon-yahoo' => esc_html__( 'icomoon-icon-yahoo', 'goodwish'),
					'icomoon-icon-tux' => esc_html__( 'icomoon-icon-tux', 'goodwish'),
					'icomoon-icon-apple' => esc_html__( 'icomoon-icon-apple', 'goodwish'),
					'icomoon-icon-finder' => esc_html__( 'icomoon-icon-finder', 'goodwish'),
					'icomoon-icon-android' => esc_html__( 'icomoon-icon-android', 'goodwish'),
					'icomoon-icon-windows' => esc_html__( 'icomoon-icon-windows', 'goodwish'),
					'icomoon-icon-windows8' => esc_html__( 'icomoon-icon-windows8', 'goodwish'),
					'icomoon-icon-soundcloud' => esc_html__( 'icomoon-icon-soundcloud', 'goodwish'),
					'icomoon-icon-soundcloud2' => esc_html__( 'icomoon-icon-soundcloud2', 'goodwish'),
					'icomoon-icon-skype' => esc_html__( 'icomoon-icon-skype', 'goodwish'),
					'icomoon-icon-reddit' => esc_html__( 'icomoon-icon-reddit', 'goodwish'),
					'icomoon-icon-linkedin' => esc_html__( 'icomoon-icon-linkedin', 'goodwish'),
					'icomoon-icon-linkedin2' => esc_html__( 'icomoon-icon-linkedin2', 'goodwish'),
					'icomoon-icon-lastfm' => esc_html__( 'icomoon-icon-lastfm', 'goodwish'),
					'icomoon-icon-lastfm2' => esc_html__( 'icomoon-icon-lastfm2', 'goodwish'),
					'icomoon-icon-delicious' => esc_html__( 'icomoon-icon-delicious', 'goodwish'),
					'icomoon-icon-stumbleupon' => esc_html__( 'icomoon-icon-stumbleupon', 'goodwish'),
					'icomoon-icon-stumbleupon2' => esc_html__( 'icomoon-icon-stumbleupon2', 'goodwish'),
					'icomoon-icon-stackoverflow' => esc_html__( 'icomoon-icon-stackoverflow', 'goodwish'),
					'icomoon-icon-pinterest' => esc_html__( 'icomoon-icon-pinterest', 'goodwish'),
					'icomoon-icon-pinterest2' => esc_html__( 'icomoon-icon-pinterest2', 'goodwish'),
					'icomoon-icon-xing' => esc_html__( 'icomoon-icon-xing', 'goodwish'),
					'icomoon-icon-xing2' => esc_html__( 'icomoon-icon-xing2', 'goodwish'),
					'icomoon-icon-flattr' => esc_html__( 'icomoon-icon-flattr', 'goodwish'),
					'icomoon-icon-foursquare' => esc_html__( 'icomoon-icon-foursquare', 'goodwish'),
					'icomoon-icon-paypal' => esc_html__( 'icomoon-icon-paypal', 'goodwish'),
					'icomoon-icon-paypal2' => esc_html__( 'icomoon-icon-paypal2', 'goodwish'),
					'icomoon-icon-paypal3' => esc_html__( 'icomoon-icon-paypal3', 'goodwish'),
					'icomoon-icon-yelp' => esc_html__( 'icomoon-icon-yelp', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ico_moon' )
				]
			]
		);

		$this->add_control(
			'team_social_ion_icon_5',
			[
				'label'     => esc_html__( 'Social Icon 5 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'ion-social-android' => esc_html__( 'Android', 'goodwish'),
					'ion-social-android-outline' => esc_html__( 'Android outline', 'goodwish'),
					'ion-social-angular' => esc_html__( 'Angular', 'goodwish'),
					'ion-social-angular-outline' => esc_html__( 'Angular outline', 'goodwish'),
					'ion-social-apple' => esc_html__( 'Apple', 'goodwish'),
					'ion-social-apple-outline' => esc_html__( 'Apple outline', 'goodwish'),
					'ion-social-bitcoin' => esc_html__( 'Bitcoin', 'goodwish'),
					'ion-social-bitcoin-outline' => esc_html__( 'Bitcoin outline', 'goodwish'),
					'ion-social-buffer' => esc_html__( 'Buffer', 'goodwish'),
					'ion-social-buffer-outline' => esc_html__( 'Buffer outline', 'goodwish'),
					'ion-social-chrome' => esc_html__( 'Chrome', 'goodwish'),
					'ion-social-chrome-outline' => esc_html__( 'Chrome outline', 'goodwish'),
					'ion-social-codepen' => esc_html__( 'Codepen', 'goodwish'),
					'ion-social-codepen-outline' => esc_html__( 'Codepen outline', 'goodwish'),
					'ion-social-css3' => esc_html__( 'CSS3', 'goodwish'),
					'ion-social-css3-outline' => esc_html__( 'CSS3 outline', 'goodwish'),
					'ion-social-designernews' => esc_html__( 'Designernews', 'goodwish'),
					'ion-social-designernews-outline' => esc_html__( 'Designernews outline', 'goodwish'),
					'ion-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'ion-social-dribbble-outline' => esc_html__( 'Dribbble outline', 'goodwish'),
					'ion-social-dropbox' => esc_html__( 'Dropbox', 'goodwish'),
					'ion-social-dropbox-outline' => esc_html__( 'Dropbox outline', 'goodwish'),
					'ion-social-euro' => esc_html__( 'Euro', 'goodwish'),
					'ion-social-euro-outline' => esc_html__( 'Euro outline', 'goodwish'),
					'ion-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'ion-social-facebook-outline' => esc_html__( 'Facebook outline', 'goodwish'),
					'ion-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'ion-social-foursquare-outline' => esc_html__( 'Foursquare outline', 'goodwish'),
					'ion-social-freebsd-devil' => esc_html__( 'Freebsd devil', 'goodwish'),
					'ion-social-github' => esc_html__( 'Github', 'goodwish'),
					'ion-social-github-outline' => esc_html__( 'Github outline', 'goodwish'),
					'ion-social-google' => esc_html__( 'Google', 'goodwish'),
					'ion-social-google-outline' => esc_html__( 'Google outline', 'goodwish'),
					'ion-social-googleplus' => esc_html__( 'Google plus', 'goodwish'),
					'ion-social-googleplus-outline' => esc_html__( 'Google plus outline', 'goodwish'),
					'ion-social-hackernews' => esc_html__( 'Hackernews', 'goodwish'),
					'ion-social-hackernews-outline' => esc_html__( 'Hackernews outline', 'goodwish'),
					'ion-social-html5' => esc_html__( 'HTML5', 'goodwish'),
					'ion-social-html5-outline' => esc_html__( 'HTML5 outline', 'goodwish'),
					'ion-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'ion-social-instagram-outline' => esc_html__( 'Instagram outline', 'goodwish'),
					'ion-social-javascript' => esc_html__( 'Java Script', 'goodwish'),
					'ion-social-javascript-outline' => esc_html__( 'Java Script outline', 'goodwish'),
					'ion-social-linkedin' => esc_html__( 'Linkedin', 'goodwish'),
					'ion-social-linkedin-outline' => esc_html__( 'Linkedin outline', 'goodwish'),
					'ion-social-markdown' => esc_html__( 'Markdown', 'goodwish'),
					'ion-social-nodejs' => esc_html__( 'Node.js', 'goodwish'),
					'ion-social-octocat' => esc_html__( 'Octocat', 'goodwish'),
					'ion-social-pinterest' => esc_html__( 'Pinterest', 'goodwish'),
					'ion-social-pinterest-outline' => esc_html__( 'Pinterest outline', 'goodwish'),
					'ion-social-python' => esc_html__( 'Python', 'goodwish'),
					'ion-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'ion-social-reddit-outline' => esc_html__( 'Reddit outline', 'goodwish'),
					'ion-social-rss' => esc_html__( 'RSS', 'goodwish'),
					'ion-social-rss-outline' => esc_html__( 'RSS outline', 'goodwish'),
					'ion-social-sass' => esc_html__( 'sass', 'goodwish'),
					'ion-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'ion-social-skype-outline' => esc_html__( 'Skype outline', 'goodwish'),
					'ion-social-snapchat' => esc_html__( 'Snapchat', 'goodwish'),
					'ion-social-snapchat-outline' => esc_html__( 'Snapchat outline', 'goodwish'),
					'ion-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'ion-social-tumblr-outline' => esc_html__( 'Tumblr outline', 'goodwish'),
					'ion-social-tux' => esc_html__( 'Tux', 'goodwish'),
					'ion-social-twitch' => esc_html__( 'Twitch', 'goodwish'),
					'ion-social-twitch-outline' => esc_html__( 'Twitch outline', 'goodwish'),
					'ion-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'ion-social-twitter-outline' => esc_html__( 'Twitter outline', 'goodwish'),
					'ion-social-usd' => esc_html__( 'USD', 'goodwish'),
					'ion-social-usd-outline' => esc_html__( 'USD outline', 'goodwish'),
					'ion-social-vimeo' => esc_html__( 'Vimeo', 'goodwish'),
					'ion-social-vimeo-outline' => esc_html__( 'Vimeo outline', 'goodwish'),
					'ion-social-whatsapp' => esc_html__( 'Whatsapp', 'goodwish'),
					'ion-social-whatsapp-outline' => esc_html__( 'Whatsapp outline', 'goodwish'),
					'ion-social-windows' => esc_html__( 'Windows', 'goodwish'),
					'ion-social-windows-outline' => esc_html__( 'Windows outline', 'goodwish'),
					'ion-social-wordpress' => esc_html__( 'WordPress', 'goodwish'),
					'ion-social-wordpress-outline' => esc_html__( 'WordPress outline', 'goodwish'),
					'ion-social-yahoo' => esc_html__( 'Yahoo', 'goodwish'),
					'ion-social-yahoo-outline' => esc_html__( 'Yahoo outline', 'goodwish'),
					'ion-social-yen' => esc_html__( 'Yen', 'goodwish'),
					'ion-social-yen-outline' => esc_html__( 'Yen outline', 'goodwish'),
					'ion-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'ion-social-youtube-outline' => esc_html__( 'Youtube outline', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'ion_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_simple_line_icons_5',
			[
				'label'     => esc_html__( 'Social Icon 5 ', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'icon-social-tumblr' => esc_html__( 'Tumblr', 'goodwish'),
					'icon-social-twitter' => esc_html__( 'Twitter', 'goodwish'),
					'icon-social-facebook' => esc_html__( 'Facebook', 'goodwish'),
					'icon-social-instagram' => esc_html__( 'Instagram', 'goodwish'),
					'icon-social-linkedin' => esc_html__( 'LinkedIn', 'goodwish'),
					'icon-social-pintarest' => esc_html__( 'Pinterest', 'goodwish'),
					'icon-social-github' => esc_html__( 'Github', 'goodwish'),
					'icon-social-gplus' => esc_html__( 'Google Plus', 'goodwish'),
					'icon-social-reddit' => esc_html__( 'Reddit', 'goodwish'),
					'icon-social-skype' => esc_html__( 'Skype', 'goodwish'),
					'icon-social-dribbble' => esc_html__( 'Dribbble', 'goodwish'),
					'icon-social-behance' => esc_html__( 'Behance', 'goodwish'),
					'icon-social-foursquare' => esc_html__( 'Foursquare', 'goodwish'),
					'icon-social-soundcloud' => esc_html__( 'Soundcloud', 'goodwish'),
					'icon-social-spotify' => esc_html__( 'Spotify', 'goodwish'),
					'icon-social-stumbleupon' => esc_html__( 'Stumbleupon', 'goodwish'),
					'icon-social-youtube' => esc_html__( 'Youtube', 'goodwish'),
					'icon-social-dropbox' => esc_html__( 'Dropbox', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_pack' => array( 'simple_line_icons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_5_link',
			[
				'label'     => esc_html__( 'Social Icon 5 Link', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'team_social_icon_pack' => array( 'font_awesome', 'font_elegant', 'ico_moon', 'ion_icons', 'linea_icons', 'linear_icons', 'simple_line_icons', 'dripicons' )
				]
			]
		);

		$this->add_control(
			'team_social_icon_5_target',
			[
				'label'     => esc_html__( 'Social Icon 5 Target', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'goodwish'),
					'_self' => esc_html__( 'Self', 'goodwish'),
					'_blank' => esc_html__( 'Blank', 'goodwish')
				),
				'default' => '',
				'condition' => [
					'team_social_icon_5_link!' => ''
				]
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
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'team_type' => array( 'main-info-below-image' )
				]
			]
		);

		$this->add_control(
			'position_color',
			[
				'label'     => esc_html__( 'Position Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'team_type' => array( 'main-info-below-image' )
				]
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'goodwish' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'team_type' => array( 'main-info-below-image' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if(!empty($params['team_image'])){
			$params['team_image'] = $params['team_image']['id'];
		}

		$params['number_of_social_icons'] = 5;
		$params['team_social_icons'] = $this->getTeamSocialIcons($params);
		$params['title_style'] = '';
		$params['position_style'] = '';
		$params['text_style'] = '';

		if(!empty($params['title_color'])){
			$params['title_style'] = 'color:'.$params['title_color'];
		}
		if(!empty($params['position_color'])){
			$params['position_style'] = 'color:'.$params['position_color'];
		}
		if(!empty($params['text_color'])){
			$params['text_style'] = 'color:'.$params['text_color'];
		}
		$params['team_classes'] = $this->getTeamClasses($params);

		//Get HTML from template based on type of team
		$html = goodwish_edge_get_shortcode_module_template_part('templates/' . $params['team_type'], 'team', '', $params);

		echo $html;

	}

	private function getTeamSocialIcons($params) {

		extract($params);
		$social_icons = array();

		if ($team_social_icon_pack !== '') {

			$icon_pack = goodwish_edge_icon_collections()->getIconCollection($team_social_icon_pack);
			$team_social_icon_type_label = 'team_social_' . $icon_pack->param;
			$team_social_icon_param_label = $icon_pack->param;

			for ( $i = 1; $i <= $number_of_social_icons; $i++ ) {

				$team_social_icon = ${$team_social_icon_type_label . '_' . $i};
				$team_social_link = ${'team_social_icon_' . $i . '_link'};
				$team_social_target = ${'team_social_icon_' . $i . '_target'};

				if ($team_social_icon !== '') {

					$team_icon_params = array();
					$team_icon_params['icon_pack'] = $team_social_icon_pack;
					$team_icon_params[$team_social_icon_param_label] =   $team_social_icon;
					$team_icon_params['link'] = ($team_social_link !== '') ? $team_social_link : '';
					$team_icon_params['target'] = ($team_social_target !== '') ? $team_social_target : '';
					$team_icon_params['type'] = ($team_social_icon_type !== '') ? $team_social_icon_type : '';

					$social_icons[] = goodwish_edge_execute_shortcode('edgtf_icon', $team_icon_params);
				}

			}

		}

		return $social_icons;

	}

	private function getTeamClasses($params) {

		$class = array($params['team_type']);
		if($params['grayscale'] == 'yes'){
			$class[] = 'edgtf-team-image-grayscale';
		}

		return implode(' ', $class);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorTeam() );