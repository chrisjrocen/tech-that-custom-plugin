<?php
/**
 * Plugin Name:       Tech That
 * Plugin URI:        
 * Description:       Tech that
 * Version:           1.0.0
 * Author:            
 */

 defined( 'ABSPATH' ) || exit;


//Enqueue styles and scripts
add_action('wp_enqueue_scripts', 'dummy_plugin_enqueue_scripts');
function dummy_plugin_enqueue_scripts()
{
	wp_enqueue_style('Main styles file', plugin_dir_url( __FILE__ ) . 'styles.css', array(), 0.1, 'all');
}



function kc_button( $content ) {
	$content .= '  <button class="button">Click me!</button>';
	return $content;
}
add_filter( 'the_content', 'kc_button' );




function kc_add_metabox() {
    add_meta_box('custom_metabox', 'Tech that metabox', 'render_kc_add_metabox', 'post', 'side', 'high');
}
add_action('add_meta_boxes', 'kc_add_metabox');

function render_kc_add_metabox($post) {
    // Retrieve any saved data for the button
    $button_text = get_post_meta($post->ID, 'custom_button_text', true);

    // Output the button field
    ?>
    <p>
        <input type="button" id="custom_button" name="custom_button" class="button" value="Click Me">
    </p>
    <?php
}

// Save the metabox data
function save_custom_metabox_data($post_id) {
    if (isset($_POST['custom_button_text'])) {
        $button_text = sanitize_text_field($_POST['custom_button_text']);
        update_post_meta($post_id, 'custom_button_text', $button_text);
    }
}
add_action('save_post', 'save_custom_metabox_data');
