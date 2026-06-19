<?php
if (!defined('ABSPATH'))
{
	exit;
}

//36.3.8 free 10.
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Tomas_Elementor_Tooltip_Widget extends Widget_Base {

    public function get_name() {
        return 'tomas_tooltip';
    }

    public function get_title() {
        return __('Tooltip', 'tomas-tooltip');
    }

    public function get_icon() {
        //return 'eicon-t-letter';
        return 'eicon-info-circle';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Tooltip Content', 'tomas-tooltip'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'keyword',
            [
                'label' => __('Trigger Text', 'tomas-tooltip'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Hover me',
                'placeholder' => 'Text shown on page',
            ]
        );

        $this->add_control(
            'tooltip_content',
            [
                'label' => __('Tooltip Content', 'tomas-tooltip'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'Tooltip content here',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        echo tomas_render_tooltip(
            $settings['keyword'],
            $settings['tooltip_content']
        );
    }
}


