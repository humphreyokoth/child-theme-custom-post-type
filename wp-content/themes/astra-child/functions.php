<?php

/**
 * Enqueue styles for child theme
 */
function humphreychildtheme_enqueue_styles()
{
    wp_enqueue_style('astra-child', get_stylesheet_directory_uri() . '/css/style.css', array());
}
add_action('wp_enqueue_scripts', 'humphreychildtheme_enqueue_styles');


function custom_wpforms_user_registration_complete($fields, $entry, $form_data, $entry_id)
{
    // Check if this is the registration form with ID 331
    if ($form_data['id'] === '331') {
        $user_data = array(
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'date_of_birth' => '',
            'marital_status' => '',
            'period_from' => '',
            'period_to' => '',
            'house_of_residence' => '',
            'profession' => '',
            'telephone_number' => '',
            'email' => '',
            'expectations' => '',
            'message' => '',
            'is_parent' => false,
            'receive_communication' => false,
            'user_pass' => wp_generate_password()
        );

        foreach ($fields as $field) {
            if ($field['name'] === 'Firstname') {
                $user_data['first_name'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Middle name') {
                $user_data['middle_name'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Last name') {
                $user_data['last_name'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Date of Birth') {
                $user_data['date_of_birth'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Marital status') {
                $user_data['marital_status'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Period At Smack From') {
                $user_data['period_from'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Period At Smack To') {
                $user_data['period_to'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'House of residence') {
                $user_data['house_of_residence'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Profession') {
                $user_data['profession'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Telephone') {
                $user_data['telephone_number'] = sanitize_text_field($field['value']);
            }
            if ($field['name'] === 'Email') {
                $user_data['email'] = sanitize_email($field['value']);
            }
            if ($field['name'] === 'Expectations of SMACKOBA') {
                $user_data['expectations'] = sanitize_textarea_field($field['value']);
            }
            if ($field['name'] === 'Your Message') {
                $user_data['message'] = sanitize_textarea_field($field['value']);
            }
            if ($field['name'] === 'Notifications') {
                $notifications = explode("\n", $field['value']);
                $user_data['is_parent'] = in_array('Parent at SMACK ?', $notifications);
                $user_data['receive_communication'] = in_array('Recieve communication ?', $notifications);
            }
        }

        // Check if email already exists
        if (email_exists($user_data['email'])) {
            wpforms()->process->add_error_log("Email already exists: {$user_data['email']}");
            return;
        }

        $user_data_for_insert = array(
            'user_login' => $user_data['email'],
            'user_email' => $user_data['email'],
            'user_pass' => $user_data['user_pass'],
            'first_name' => $user_data['first_name'],
            'last_name' => $user_data['last_name'],
        );

        error_log('User data: ' . print_r($user_data_for_insert, true));

        $user_id = wp_insert_user($user_data_for_insert);

        error_log('User ID: ' . print_r($user_id, true));



        // Update user meta data
        update_user_meta($user_id, 'middle_name', $user_data['middle_name']);
        update_user_meta($user_id, 'date_of_birth', $user_data['date_of_birth']);
        update_user_meta($user_id, 'marital_status', $user_data['marital_status']);
        update_user_meta($user_id, 'period_from', $user_data['period_from']);
        update_user_meta($user_id, 'period_to', $user_data['period_to']);
        update_user_meta($user_id, 'house_of_residence', $user_data['house_of_residence']);
        update_user_meta($user_id, 'profession', $user_data['profession']);
        update_user_meta($user_id, 'telephone_number', $user_data['telephone_number']);
        update_user_meta($user_id, 'expectations', $user_data['expectations']);
        update_user_meta($user_id, 'message', $user_data['message']);
        update_user_meta($user_id, 'is_parent', $user_data['is_parent']);
        update_user_meta($user_id, 'receive_communication', $user_data['receive_communication']);

        // Assign user role
        $user = new WP_User($user_id);
        $user->set_role('subscriber');

        // Send user notification email
        wp_new_user_notification($user_id, null, 'both');
        
        // Send custom notifications based on user preferences
        if ($user_data['is_parent']) {
            send_parent_notification($user_id);
        }
        if ($user_data['receive_communication']) {
            send_communication_opt_in_notification($user_id);
        }
    }
}
add_action('wpforms_process_complete', 'custom_wpforms_user_registration_complete', 10, 4);
// Function to send notification for parents
function send_parent_notification($user_id)
{
    $user = get_userdata($user_id);
    $subject = 'Welcome, SMACK Parent!';
    $message = "Dear {$user->first_name},\n\n" .
        "Thank you for registering as a parent at SMACK. " .
        "We appreciate your involvement in our community.\n\n" .
        "Best regards,\n" .
        "SMACK Team";
    wp_mail($user->user_email, $subject, $message);
}

// Function to send notification for users who opted in for communication
function send_communication_opt_in_notification($user_id)
{
    $user = get_userdata($user_id);
    $subject = 'Thank You for Subscribing to SMACKOBA Communications';
    $message = "Dear {$user->first_name},\n\n" .
        "Thank you for choosing to receive communications from SMACKOBA. " .
        "We'll keep you updated with the latest news and events.\n\n" .
        "Best regards,\n" .
        "SMACKOBA Team";
    wp_mail($user->user_email, $subject, $message);
}
