<?php
/**
 * Enqueue styles for child theme
 */
function humphreychildtheme_enqueue_styles() {
    // Enqueue the child theme's stylesheet
    wp_enqueue_style('astra-child', get_stylesheet_directory_uri() . '/css/style.css', array());
}
add_action('wp_enqueue_scripts', 'humphreychildtheme_enqueue_styles');

// Handle Alumni Registration form submission
function handle_alumni_registration() {
    if (isset($_POST['your-subject']) && wp_verify_nonce($_POST['alumni_register_nonce'], 'alumni_register_action')) {
        $user_data = array(
            'user_login'    => sanitize_user($_POST['first-name'] . '.' . $_POST['last-name']),
            'user_email'    => sanitize_email($_POST['your-email']),
            'user_pass'     => wp_generate_password(),
            'role'          => 'alumni',
            'first_name'    => sanitize_text_field($_POST['first-name']),
            'last_name'     => sanitize_text_field($_POST['last-name']),
            'middle_name'   => sanitize_text_field($_POST['middle-name']),
            'date_of_birth' => sanitize_text_field($_POST['date-of-birth']),
            'marital_status'=> sanitize_text_field($_POST['marital-status']),
            'start_date'    => sanitize_text_field($_POST['start-date']),
            'end_date'      => sanitize_text_field($_POST['end-date']),
            'house'         => sanitize_text_field($_POST['house-of-residence']),
            'profession'    => sanitize_text_field($_POST['profession']),
            'phone'         => sanitize_text_field($_POST['telephone-number']),
            'expectations'  => sanitize_textarea_field($_POST['expectations']),
            'is_parent'     => isset($_POST['is-parent']) ? 1 : 0,
            'receive_communication' => isset($_POST['receive-communication']) ? 1 : 0,
        );

        $user_id = wp_insert_user($user_data);

        if (!is_wp_error($user_id)) {
            
            wp_redirect(home_url('/alumni-registration-success'));
            exit;
        } else {
            
            $error_message = $user_id->get_error_message();
            echo '<div class="error">' . $error_message . '</div>';
        }
    }
}
add_action('init', 'handle_alumni_registration');