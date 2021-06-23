<?php

if ( ! defined( 'WPINC' ) ) {
    die;
}

// Add meta box and custom fields
function twinwebdev_board_members_meta_box(WP_Post $post) {
    add_meta_box('twinwebdev_board_members_meta', 'Board Member Details', function() {
        $field_name = 'twd_board_member_role';
        $field_value = get_post_meta(get_the_ID(), $field_name, true);
        wp_nonce_field('twd_board_member_nonce', 'twd_board_member_nonce');
        ?>
        
        <table class="form-table">
            <tr>
                <th> <label for="<?php echo $field_name; ?>">Board Member Role</label></th>
                <td>
                    <input id="<?php echo $field_name; ?>"
                           name="<?php echo $field_name; ?>"
                           type="text"
                           value="<?php echo esc_attr($field_value); ?>"
                           placeholder="E.g. President"
                    />
                </td>
            </tr>
        </table>
        <?php
    });
}

// Check for empty string allowing for a value of `0`
function empty_str( $str ) {
    return ! isset( $str ) || $str === "";
}

// Save and delete meta but not when restoring a revision
add_action('save_post', function($post_id){
    $post = get_post($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $field_name = 'twd_board_member_role';

    // Do not save meta for a revision or on autosave
    if ( $post->post_type != 'twd_board_member' || $is_revision )
        return;

    // Do not save meta if fields are not present,
    // like during a restore.
    if( !isset($_POST[$field_name]) )
        return;

    // Secure with nonce field check
    if( ! check_admin_referer('twd_board_member_nonce', 'twd_board_member_nonce') )
        return;

    // Clean up data
    $field_value = trim($_POST[$field_name]);

    // Do the saving and deleting
    if( ! empty_str( $field_value ) ) {
        update_post_meta($post_id, $field_name, $field_value);
    } elseif( empty_str( $field_value ) ) {
        delete_post_meta($post_id, $field_name);
    }
});

function twinwebdev_board_member_post_type() {
    
    register_post_type('twd_board_member',
        array(
            'labels'      => array(
                'name'          => __('Board Members', 'twinwebdev_board_members'),
                'singular_name' => __('Board Member', 'twinwebdev_board_members'),
                'add_new_item'  => __('Add New Board Member', 'twinwebdev_board_members'),
                'edit_item'     => __('Edit Board Member', 'twinwebdev_board_members'),
            ),
            'description' => __('Board Members', 'twinwebdev_board_members'),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => [
                'slug' => 'board_members'
            ],
            'menu_position' => 4,
            'menu_icon'     => 'dashicons-admin-users',
            'supports'      => ['title', 'thumbnail'],
            'register_meta_box_cb' => 'twinwebdev_board_members_meta_box',
        )
    );

}
add_action('init', 'twinwebdev_board_member_post_type');

// changes the title field placeholder when adding new board member
add_filter( 'enter_title_here', function( $title ) {
    $screen = get_current_screen();

    if  ( 'twd_board_member' == $screen->post_type ) {
        $title = 'Name of Board Member';
    }

    return $title;
} );