<?php
if (!defined('ABSPATH'))
{
	exit; // Prevent direct access
}
//!!! 10.8.7
function tooltips_free_language_menu_addon()
{
	add_submenu_page('edit.php?post_type=tooltips', __('Languages', 'wordpress-tooltips'), __('Languages', 'wordpress-tooltips'), "manage_options", 'tooltipsFreeLanguageMenu', 'tooltipsFreeLanguageMenu');
}

add_action('admin_menu', 'tooltips_free_language_menu_addon');

// Function for displaying the language setting panel
function tooltips_free_language_setting_panel($title = '', $content = '')
{

	$allowed_html = array(
		'a' => array(
			'href' => array(),
			'target' => array(),
		),
		'i' => array(),
		'p' => array(),
		'br' => array(),
		'table' => array(),
		'tr' => array(),
		'td' => array(
			'width' => array(),
			'style' => array(),
		),
		'input' => array(
			'type' => array(),
			'id' => array(),
			'name' => array(),
			'value' => array(),
			'required' => array(),
			'placeholder' => array(),
			'class' => array(),
		),
		'button' => array(
			'type' => array(),
			'id' => array(),
			'name' => array(),
			'class' => array(),
			'value' => array(),
		),
		'form' => array( 
			'method' => array(),
			'action' => array(),
			'name' => array(),
			'class' => array(),
		),
	);

	?>
	<div class="wrap tooltipsaddonclass">
		<div id="dashboard-widgets-wrap">
			<div id="dashboard-widgets" class="metabox-holder">
				<div id="post-body">
					<div id="dashboard-widgets-main-content">
						<div class="postbox-container" style="width: 90%;">
							<div class="postbox">					
								<h3 class='hndle' style='padding: 10px 0px; border-bottom: 0px solid #eee !important;'>
								<span>
									<?php echo wp_kses_post($title); ?> 
								</span>
								</h3>
							
								<div class="inside postbox" style='padding-top:10px; padding-left: 10px;'>
									<?php echo wp_kses($content, $allowed_html); ?> 
									<?php // echo $content; ?> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both"></div>
	<?php	
}

function tooltips_free_language_setting_panel_head($title)
{
	?>
	<div style='padding-top:20px; font-size:22px;'><?php echo wp_kses_post($title); ?> </div>
	<div style='clear:both'></div>
<?php 
}

function tooltipsFreeLanguageMenu()
{
	global $wpdb, $table_prefix;

	if (isset($_POST['glossaryLanguageCustomNavALLSubmit'])) {
		check_admin_referer('tooltipslanguagenonce');
		
		// Sanitize the input properly
		$glossaryLanguageCustomNavALL = sanitize_textarea_field($_POST['glossaryLanguageCustomNavALL']);
		update_option('glossaryLanguageCustomNavALL', $glossaryLanguageCustomNavALL);
		tooltipsMessage('Glossary language has been changed');
	}

	if (isset($_POST['tooltipLanguageReadMeSubmit'])) {
		check_admin_referer('tooltipslanguagenonce');
		$tooltipLanguageReadMe = sanitize_text_field($_POST['tooltipLanguageReadMe']);
		update_option('tooltipLanguageReadMe', $tooltipLanguageReadMe);
		tooltipsMessage('Language of "Read More" has been changed');
	}

	$tooltipLanguageReadMe = get_option('tooltipLanguageReadMe', 'Read More'); 
	$glossaryLanguageCustomNavALL = get_option('glossaryLanguageCustomNavALL', 'ALL'); 

	$languageselectboxURL = esc_url(get_option('siteurl') . '/wp-admin/edit.php?post_type=tooltips&page=glossarysettingsfree'); 

	$title = "Custom Language of Tooltip and Glossary <p><i style='color:gray;'>(please select '<a href='" . esc_url($languageselectboxURL) . "' target='_blank'>custom my language</a>' option in <a href='" . esc_url($languageselectboxURL) . "' target='_blank'>language selectbox</a> first )</i></p>"; 
	tooltips_free_language_setting_panel_head($title);

	$title = 'Custom Glossary to Your Own Language -- word "ALL" on Navigation Bar:';
	$content = '';

	$content .= '<form class="formTooltips" name="formTooltips" action="" method="POST">';
	$content .= wp_nonce_field('tooltipslanguagenonce', '_wpnonce', true, false); 

	$content .= '<table id="tableTooltips" width="100%">';
	$content .= '<tr>';
	$content .= '<td width="40%" >';
	$content .= 'Custom the word "ALL" on Nav Bar: ';
	$content .= '</td>';
	$content .= '<td width="30%" >';
	$content .= '<input type="text" id="glossaryLanguageCustomNavALL" name="glossaryLanguageCustomNavALL" value="' . esc_attr($glossaryLanguageCustomNavALL) . '" required placeholder="for example:ALL">'; 
	$content .= '</td>';
	$content .= '<td width="30%" >';
	$content .= '<input type="submit" class="button-primary" id="glossaryLanguageCustomNavALLSubmit" name="glossaryLanguageCustomNavALLSubmit" value=" Submit ">';
	$content .= '</td>';
	$content .= '</tr>';
	$content .= '</table>';
	$content .= '</form>';

	tooltips_free_language_setting_panel($title, $content);

	$title = 'Custom "Read More" in the excerpt paragraph -- this "Read More" will only appear when users decide to use the excerpt as the content in glossary';
	$content = '';

	$tooltipLanguageReadMe = get_option('tooltipLanguageReadMe', 'Read More'); 

	$content .= '<form class="formTooltips" name="formTooltips" action="" method="POST">';
	$content .= wp_nonce_field('tooltipslanguagenonce', '_wpnonce', true, false); 
	$content .= '<table id="tableTooltips" width="100%">';
	$content .= '<tr style="text-align:left;">';
	$content .= '<td width="40%" style="text-align:left;">';
	$content .= 'Custom "Read More" in Tooltips Excerpt: ';
	$content .= '</td>';
	$content .= '<td width="30%" style="text-align:left;">';
	$content .= '<input type="text" style="width:300px;" id="tooltipLanguageReadMe" name="tooltipLanguageReadMe" value="' . esc_attr($tooltipLanguageReadMe) . '" required placeholder="More Details">'; 
	$content .= '</td>';
	$content .= '<td width="30%" style="text-align:left;">';
	$content .= '<input type="submit" class="button-primary" id="tooltipLanguageReadMeSubmit" name="tooltipLanguageReadMeSubmit" value=" Submit ">';
	$content .= '</td>';
	$content .= '</tr>';
	$content .= '</table>';
	$content .= '</form>';

	tooltips_free_language_setting_panel($title, $content);	
}
?>
