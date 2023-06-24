<?php

namespace Kanzu\Tech;


class Tech_Tasks
{
    function kc_add_metabox()
    {
        add_meta_box('custom_metabox', 'Tech that metabox', [$this, 'render_kc_add_metabox'], 'post', 'side', 'high');
    }

    function render_kc_add_metabox($post)
    {
        global $post;
        $user_id =  get_current_user_id();
            $user_clicks = get_user_meta($user_id, 'kc_admin_button_click_counts', true);
            $counts = $user_clicks ? $user_clicks : 0;
        // Retrieve any saved data for the button
        $button_text = get_post_meta($post->ID, 'custom_button_text', true);

        // Output the button field
?>
        <p>
            <input type="button" id="custom_button" name="custom_button" class="admin_button" value="Click Me">
            <label> <span id="admin_clicks"><?php $counts ?> </span> Click(s)</label>
        </p>
<?php
    }

    function handle_admin_button_clicks()
    {
        $user_id =  get_current_user_id();
        if (isset($_POST['current_admin_value'])) {
            $btn_count = sanitize_text_field($_POST['current_admin_value']);
            update_user_meta($user_id, 'kc_admin_button_click_counts', $btn_count);
        }
    }

    function kc_button($content)
    {
        global $post;
        if (is_user_logged_in()) {
            $user_id =  get_current_user_id();
            $user_clicks = get_user_meta($user_id, 'kc_button_click_counts', true);
            $counts = $user_clicks ? $user_clicks : 0;

            $content .= '  <button class="button" id="tech_btn">Click me!</button>';
            $content .= '  <label> <span id="display_clicks">' . $counts . ' </span> Click</label>';
        }

        return $content;
    }

    function handle_button_clicks()
    {
        $user_id =  get_current_user_id();
        if (isset($_POST['current_value'])) {
            $btn_count = sanitize_text_field($_POST['current_value']);
            update_user_meta($user_id, 'kc_button_click_counts', $btn_count);
        }
    }
}
