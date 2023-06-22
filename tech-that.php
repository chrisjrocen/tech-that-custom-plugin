<?php

/**
 * Plugin Name:       Tech That
 * Plugin URI:        
 * Description:       Tech that
 * Version:           1.0.0
 * Author:            
 */

namespace Kanzu\Tech;

// defined('ABSPATH') || exit;

class Tech_That
{
    private static $_instance = null;
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function register_includes()
    {
        require_once(KC_TECH_DIR . '/includes/class-manage-tasks.php');
        require_once(KC_TECH_DIR . '/includes/class-scripts.php');
        require_once(KC_TECH_DIR . '/includes/class-hook-registry.php');
    }

    function define_constants()
    {
        define('KC_TECH_DIR', __DIR__);
        define('KC_TECH_FILE', __FILE__);
        define('KC_TECH_URL', plugin_dir_url(__FILE__));
    }

    public function __construct()
    {

        //Define Constants
        $this->define_constants();

        //Register Includes
        $this->register_includes();
    }
}
// Instantiate Plugin Class
Tech_That::instance();
