<?php

add_action('rest_api_init', 'twd_rest_routes');

function twd_rest_routes() {
    register_rest_route('/twdbmg/v1', '/members', [
        'methods'       =>  'GET',
        'callback'      =>  'get_members',
        'permission'    =>  'get_members_permission'
    ]);
}

function get_members() {
 
    global $wpdb;

    $response = $wpdb->get_results(
        "SELECT wp_posts.ID AS id, wp_posts.post_title AS name, wp_postmeta.meta_value AS role 
        FROM wp_posts
        LEFT OUTER JOIN wp_postmeta on wp_posts.ID = wp_postmeta.post_id 
            AND wp_postmeta.meta_key = 'twd_board_member_role'
        WHERE post_type = 'twd_board_member'");

    return rest_ensure_response($response);
}

function get_members_permission() {
    return true;
}