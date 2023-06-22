<?php

namespace Kanzu\Tech;

class Hook_Registry
{

    public function __construct()
    {
        $this->register_hooks();
    }

    public function register_hooks()
    {
        $scripts = new Scripts();
        $tech_that = new Tech_Tasks();

        //Enqueue Styles and Scripts
        add_action('wp_enqueue_scripts', [$scripts, 'register_scripts']);

        add_action('add_meta_boxes', [$tech_that, 'kc_add_metabox']);

        add_action('save_post', [$tech_that, 'save_custom_metabox_data']);
        add_filter('the_content', [$tech_that, 'kc_button']);
    }
}
new Hook_Registry();
