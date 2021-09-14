<?php

if ( ! defined( 'WPINC' ) ) {
    die;
}



function twinwebdev_board_members_instructions_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <div id="app"></div>
    </div>
    <?php
}

function twinwebdev_board_members_page()
{
    add_menu_page(
        'Board Members',
        'Board Members',
        'manage_options',
        'twinwebdev_board_members',
        'twinwebdev_board_members_instructions_page_html'
    );
}
add_action('admin_menu', 'twinwebdev_board_members_page');