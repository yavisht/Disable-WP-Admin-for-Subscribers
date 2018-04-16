<?php

/*
Plugin Name:  Disable WP-Admin for Subscribers
Plugin URI:   https://au.linkedin.com/in/yavisht
Description:  Disable WP-Admin for Subscribers. Subscribers will be redirected to the homepage if they try to access wp-admin.
Version:      1
Author:       Yavisht Katgara
Author URI:   https://au.linkedin.com/in/yavisht
License:      MIT
License URI:  https://www.opensource.org/licenses/mit-license.php
*/


/**
 * Disable admin bar on the frontend of your website
 * for subscribers.
 */

function yk_disable_admin_bar() {
    if ( ! current_user_can('edit_posts') ) {
        add_filter('show_admin_bar', '__return_false');
    }
}

add_action( 'after_setup_theme', 'yk_disable_admin_bar' );


/**
 * Redirect back to homepage and not allow access to
 * WP admin for Subscribers.
 */

function yk_redirect_roles_to_homepage(){
    if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
        wp_redirect( site_url() );
        exit;      
    }
}

add_action( 'admin_init', 'yk_redirect_roles_to_homepage' );
