<?php

function twinwebdev_board_members_instructions_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <div class="twinwebdev-board-members-instructions">
            <p>Create a Boad Members Gallery by using shortcode: <br>
            <code>[board-members-gallery]</code></br>
            This will create a gallery using the Featured Image and title of all published Board Members.</p>
            <p>Featured Image size should be 345px wide by 440px high.
        </div>
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