<?php

namespace Kanzu\Tech;

class Scripts
{
    private $version;

    public function __construct()
    {
        $this->version = '0.6.3';
    }

    public function register_scripts()
    {
        $this->enqueue_styles();
        $this->enqueue_scripts();
        $this->localise_data();
    }

    public function enqueue_styles()
    {
        wp_enqueue_style('Main styles file', KC_TECH_URL . '/assets/styles.css', array(), 0.1, 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('tech-script-js', KC_TECH_URL . '/assets/scripts.js');
    }
    public function localise_data()
    {
        wp_localize_script('tech-script-js', 'kanzuTechThat', ['ajaxUrl' => admin_url('admin-ajax.php')]);
    }
}
