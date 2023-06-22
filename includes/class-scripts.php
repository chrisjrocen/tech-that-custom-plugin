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
    }

    public function enqueue_styles()
    {
        wp_enqueue_style('Main styles file', KC_TECH_URL . 'styles.css', array(), 0.1, 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('tech-script', KC_TECH_DIR . '/assets/scripts.js');
    }
}
