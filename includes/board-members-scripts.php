<?php

function twinwebdev_board_members_frontend_scripts()
{
    wp_enqueue_script(
        'twinwebdev-board-members-frontend-scripts',
        TWDBOARDMEMBERS_URL . 'frontend/js/twinwebdev-board-members-front-end.js',
        [],
        time(),
        true
    );
}
add_action('wp_enqueue_scripts', 'twinwebdev_board_members_frontend_scripts');