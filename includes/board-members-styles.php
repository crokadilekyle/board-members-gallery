<?php

// Load css on the frontend
function twinwebdev_board_members_frontend_styles()
{

    wp_enqueue_style(
        'twinwebdev-board-members-frontend',
        TWDBOARDMEMBERS_URL . 'frontend/css/twinwebdev-board-members-front-end.css',
        [],
        time()
    );
}
add_action( 'wp_enqueue_scripts', 'twinwebdev_board_members_frontend_styles');

// Load css in Admin area
function twinwebdev_board_members_admin_styles()
{

    wp_enqueue_style(
        'twinwebdev-board-members-admin',
        TWDBOARDMEMBERS_URL . 'admin/css/twinwebdev-board-members-admin.css',
        [],
        time()
    );
}
add_action( 'admin_enqueue_scripts', 'twinwebdev_board_members_admin_styles');