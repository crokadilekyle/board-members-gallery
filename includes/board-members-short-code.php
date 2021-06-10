<?php

add_shortcode('board-members-gallery', 'twinwebdev_board_members_shortcode');
function twinwebdev_board_members_shortcode( $atts = [], $content = null) {
    $gallery = '<div class="board-members-gallery">';

    $query_args = [
        'post_type'     => 'twd_board_member',
        'post_status'   => 'publish',
        'order'         => 'asc'
    ];

    $board_members = new WP_Query($query_args);


    if($board_members->have_posts()):
        while($board_members->have_posts()) : $board_members->the_post();
            $custom = get_post_custom( get_the_ID() );
            $gallery .= '<figure class="board-member">'.get_the_post_thumbnail(get_the_ID(), [345, 440]);
            $gallery .= '<figcaption>'.get_the_title().'<span class="member-role">'. get_post_meta( get_the_ID(), 'twd_board_member_role', true ) .'</span></figcaption></figure>';
            
        endwhile;
        wp_reset_postdata();
    else :
    _e( 'Sorry, no posts matched your criteria.' );
    endif;
    
    $gallery .= '</div>';
    
    return $gallery;
}