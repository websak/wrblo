<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//!!! 10.8.7

function tooltipsImportFree() {
    ?>
    <div class="wrap tooltipsaddonclass">
        <h2>
        <?php
            echo __("Import Tooltips", "wordpress-tooltips");
        ?>
        </h2>
        <table class="wp-list-table widefat fixed" style="margin-top:20px;">
        <tr><td>
            <form enctype="multipart/form-data" action="" method="POST">
                <h3><?php echo __("Import tooltips from csv:", "wordpress-tooltips"); ?></h3>
                <label for="Your CSV File"> <?php echo __("Your CSV File:", "wordpress-tooltips"); ?> </label>
                <?php 
                    wp_nonce_field('tooltipscsvuploadfilenonce');
                ?>
                <input name="tooltips_csv_upload_file" type="file" />
                <div style="margin-top:30px !important;margin-bottom:30px  !important;">
                    <input type="submit" value=" <?php echo __("Import", "wordpress-tooltips"); ?> " name="import" />
                </div>
            </form>
			<div>
			<hr />
				<h4>Please note:</h4>
				<div style="margin-bottom:10px;">
				<span style="color:#888;">#1</span> You can find sample.csv in the folder "tooltips-pro", we have make sample in this csv file, you can just follow our format to build your csv file 
				</div>
				<div style="margin-bottom:10px;">
				<span style="color:#888;">#2</span> In sample.csv, there are two fields, "tooltips term" and "tooltips content", tooltips term will be imported as title of tooltips, and "tooltips content" will be imported as content of tooltips.  
				</div>
				<div style="margin-bottom:10px;">
				<span style="color:#888;">#3</span> In sample.csv, we use comma "," to split fields, if you have comma (,) in your content field, it maybe caused the import failed, the solution is use double quotes (") to warp your content field, it looks like this:
				<span style='color:darkgreen'>"the world, need goods"</span> 
				</div>
				<div style="margin-bottom:10px;">
				<span style="color:#888;">#4</span> In general, #3 will works well, but in your tooltip content, maybe you have double quotes (") already, in this case, because there are a lot of double quotes ("), so import will failed again, in this case, the solution will looks like this:
				<span style='color:darkgreen'>"the world, \"need goods\""</span>, just add \ before your own ", it will works well
				</div>
				<div style="margin-bottom:10px;">
				<span style="color:#888;">#5</span> If you want to add mages in your tooltips, that is easy, just do it like this:
				<span style='color:darkgreen'>hi this is image import sample < img class="alignnone size-medium wp-image-259" src="http://yourdomain.com/wp-content/uploads/2018/07/yourimagenam.png" /></span> , just change class, image path, image name as your values. 
				</div>
				<div style="margin-bottom:10px;">
				<span style="color:#888;">#6</span> You can find all these samples in sample.csv in the folder "tooltips-pro"
				</div>				
				<div style="margin-bottom:10px;">
				<span style="color:#888;">#7</span>  
				You will find video tutorial "import tooltips from csv" and more documents at <a href='https://tooltips.org/?s=import'>How to Import Tooltips</a>
				</div>
				<?php //9.3.9 ?>
				<div style="margin-bottom:10px;">
				<span style="color:#888;">
				#8 If you cannot import tooltips , please check our detailed document at <a href='https://tooltips.org/how-to-solve-the-problem-of-spacial-characters-on-import-when-importing-wordpress-tooltip-term-wordpress-tooltips-pro-plus-27-3-8-tooltips-pro-19-4-6-tooltips-free-9-3-9-released/'>How to solve the problem of spacial characters on import when importing Tooltips for Wordpress term</a>
				</span>  
				</div>				
			</div>			
        </td></tr>
        </table>
    <?php
    global $wpdb;

    if (isset($_POST['import'])) {
        check_admin_referer('tooltipscsvuploadfilenonce'); // Validate nonce for CSRF protection
        
        // File Upload Security Check
        if (!current_user_can('upload_files')) {
            wp_die(__('Sorry, you are not allowed to upload files.'));
        }

        // File Validation
        if (isset($_FILES['tooltips_csv_upload_file'])) {
            $file = $_FILES['tooltips_csv_upload_file'];
            $file_type = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            // Validate CSV file extension and MIME type
            if ($file_type !== 'csv') {
                echo __("<h4 style='color:firebrick'>Sorry, We only support CSV files, please upload a valid CSV file.</h4>", "wordpress-tooltips");
                exit;
            }

            // Further MIME type check
            if ($file['type'] !== 'text/csv' && $file['type'] !== 'application/vnd.ms-excel') {
                echo __("<h4 style='color:firebrick'>Invalid file type. Please upload a CSV file.</h4>", "wordpress-tooltips");
                exit;
            }
        }

        // Open the uploaded CSV file
        $handle = fopen($file['tmp_name'], "r");
        delete_option('existed_tooltips_post');
        
        $existed_tooltips_post = get_option('existed_tooltips_post', []);
        $row = 0;

        while ($data = fgetcsv($handle, 1000, ',')) {
            $row++;
            if ($row == 1) continue; // Skip the header row

            // Ensure that there are enough columns
            if (count($data) < 2) {
                continue; // Skip invalid rows
            }

            $post_title = sanitize_text_field($data[0]); // Sanitize title
            $post_content = wp_kses(sanitize_text_field($data[1]), wp_kses_allowed_html('post')); // Sanitize and allow post content

            // Prepare new post data
            $new_post = [
                'post_title'   => $post_title,
                'post_content' => $post_content,
                'post_status'  => 'publish',
                'post_type'    => 'tooltips',
                'post_author'  => 1
            ];

            // Check for duplicate posts
            $sql = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_status = 'publish' AND post_type = 'tooltips' LIMIT 1", $post_title);
            $result = $wpdb->get_var($sql);
            
            if ($result) {
                continue; // Skip duplicate entries
            }

            // Insert new post
            $id = wp_insert_post($new_post);
            if ($id && !in_array($id, $existed_tooltips_post)) {
                $existed_tooltips_post[] = $id;
            }
        }

        fclose($handle);

        // Update the list of existing tooltips posts
        update_option('existed_tooltips_post', $existed_tooltips_post);

        // Success message with link to all tooltips
        $checkImportedTooltipsURL = get_option('siteurl') . '/wp-admin/edit.php?post_type=tooltips';
        echo '<br />';
        echo __("<h4 style='color:firebrick'>Tooltips imported, Please click <a href='$checkImportedTooltipsURL'>All Tooltips</a> to check the result, thanks</h4>", "wordpress-tooltips");
    }
}
?>
