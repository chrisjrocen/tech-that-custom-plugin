<?php

namespace Kanzu\Tech;


class Tech_Tasks
{
    function kc_add_metabox()
    {
        add_meta_box('custom_metabox', 'Tech that metabox', 'render_kc_add_metabox', 'post', 'side', 'high');
    }

    function render_kc_add_metabox($post)
    {
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
    function save_custom_metabox_data($post_id)
    {
        if (isset($_POST['custom_button_text'])) {
            $button_text = sanitize_text_field($_POST['custom_button_text']);
            update_post_meta($post_id, 'custom_button_text', $button_text);
        }
    }

    function kc_button($content)
    {
        $content .= '  <button class="button">Click me!</button>';
        return $content;
    }
}
