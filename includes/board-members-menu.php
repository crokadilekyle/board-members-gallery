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
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <div class="twinwebdev-board-members-instructions">
            <h2>Instructions</h2>
            <p>Go to the "Board Members" menu to add a new board member.  Enter a name and a role for each board member.  Set the featured image as the photo to be displayed for the member.  The photo should be 345px wide by 440px high.
            <p>To add a Boad Members Gallery to a page or post, use this shortcode: <br>
            <code>[board-members-gallery]</code></br>
            This will create a gallery using the Featured Image and title of all published Board Members.  The members will be displayed in the order they were created.</p>
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