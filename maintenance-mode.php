<?php
/*
Plugin Name: Maintenance Mode
Plugin URI: https://github.com/SimonasEvan/maintenance-mode
Description: Display a maintenance page for all visitors except admins.
Version: 1.0.1
Author: ProgPros
Author URI: https://progpros.com
*/

// Set Maintenance Mode
function set_maintenance_mode() {
    // Check if maintenance mode is enabled
    $maintenance_mode = get_option( 'maintenance_mode' );
    if ($maintenance_mode == 'enabled' && !current_user_can( 'manage_options' )) {
        // Display the maintenance page
        include( plugin_dir_path( __FILE__ ) . 'maintenance-page.php' );
        exit;
    }
}
add_action( 'template_redirect', 'set_maintenance_mode' );

// Add Settings Menu
function add_maintenance_mode_settings() {
    add_options_page( 'Maintenance Mode', 'Maintenance Mode', 'manage_options', 'maintenance-mode-settings', 'maintenance_mode_settings_page' );
}
add_action( 'admin_menu', 'add_maintenance_mode_settings' );

// Settings Page
function maintenance_mode_settings_page() {
    if (!current_user_can( 'manage_options' )) {
        wp_die( 'You do not have sufficient permissions to access this page.', 'maintenance-mode' );
    }
    // Check for form submission
    if ( isset( $_POST['maintenance_mode_submit'] ) ) {
        // Save settings
        if ( isset( $_POST['maintenance_mode_enabled'] ) ) {
            update_option( 'maintenance_mode', 'enabled' );
        } else {
            update_option( 'maintenance-mode', 'disabled' );
            update_option( 'maintenance_mode', 'disabled' );
        }
        // Display success message
        echo '<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>';
    }
    // Get current settings
    $maintenance_mode = get_option( 'maintenance_mode' );
?>
<div class="wrap">
    <h1><?php _e( 'Maintenance Mode Settings', 'maintenance-mode' ); ?></h1>
    <form method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><?php _e( 'Enable Maintenance Mode', 'maintenance-mode' ); ?></th>
                    <td>
                        <input type="checkbox" name="maintenance_mode_enabled" value="1" <?php if( $maintenance_mode == 'enabled' ) echo 'checked'; ?>>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="maintenance_mode_submit" class="button-primary" value="<?php _e( 'Save Settings', 'maintenance-mode' ); ?>">
        </p>
    </form>
</div>
<?php
}
?>