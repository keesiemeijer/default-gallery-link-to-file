<?php
/*
Plugin Name: Default gallery link to file.
Plugin URI:
Description: Sets the gallery "Link To" dropdown option in the media uploader to "Media File" by default.
Author: keesiemeijer
Version: 0.1
*/

class Default_Gallery_Link_To_File {

    /**
     * Class instance.
     *
     * @since 0.1
     * @see get_instance()
     * @var object
     */
    private static $instance = null;


    /**
     * Acces this plugin's working instance.
     *
     * @since 0.1
     *
     * @return object
     */
    public static function get_instance() {
        // create a new object if it doesn't exist.
        is_null( self::$instance ) && self::$instance = new self;
        return self::$instance;
    }


    /**
     * Sets up class properties on action hook wp_loaded.
     * wp_loaded is fired after custom post types and taxonomies are registered by themes and plugins.
     *
     * @since 0.1
     */
    public static function init() {
        add_action( 'wp_enqueue_media', array( self::get_instance(), 'wp_enqueue_media' ) );
    }



    /**
     * Enqueues the script.
     */
    public function wp_enqueue_media() {

        if ( ! isset( get_current_screen()->id ) || get_current_screen()->base != 'post' )
            return;

        wp_enqueue_script(
            'custom-gallery-settings',
            plugins_url( 'js/default-gallery-link-to-file.js', __FILE__ ),
            array( 'media-views' )
        );

    }


}


Default_Gallery_Link_To_File::init();
