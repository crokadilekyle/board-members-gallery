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
    $response = [];

    $query_args = [
        'post_type'     => 'twd_board_member',
        'post_status'   => 'publish',
        'order'         => 'asc'
    ];

    $board_members = new WP_Query($query_args);
    if($board_members->have_posts()):
        while($board_members->have_posts()) : $board_members->the_post();
            $response['results'][] = [
                'id'    => get_the_ID(),
                'name'  => get_the_title()
            ];            
        endwhile;
        wp_reset_postdata();
    else :
        $response['error'] = 'Sorry, no results were returned.';
    endif;

    return rest_ensure_response($response);
}

function get_members_permission() {
    return true;
}