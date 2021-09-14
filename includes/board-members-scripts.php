<?php

if ( ! defined( 'WPINC' ) ) {
    die;
}

function twinwebdev_board_members_frontend_scripts()
{
    wp_enqueue_script(
        'twinwebdev-board-members-frontend-scripts',
        TWDBOARDMEMBERS_URL . 'frontend/js/twinwebdev-board-members-front-end.js',
        [],
        1.0,
        true
    );
}
add_action('wp_enqueue_scripts', 'twinwebdev_board_members_frontend_scripts');

function twinwebdev_board_members_admin_scripts( $hook )
{
    if ( 'toplevel_page_twinwebdev_board_members' != $hook) {
        return;
    }

    wp_enqueue_script(
        'twinwebdev-board-members-admin-scripts',
        TWDBOARDMEMBERS_URL . 'build/index.js',
        ['wp-element'],
        1.0,
        true
    );
}
add_action('admin_enqueue_scripts', 'twinwebdev_board_members_admin_scripts');