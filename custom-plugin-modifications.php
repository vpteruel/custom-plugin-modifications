<?php
/*
Plugin Name: Custom Plugin Modifications
Description: This plugin modifies functionality of the Gravity Forms and Flow.
Version: 1.0.0
Author: Vinicius Teruel
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// custom code

/*
Display the full date/timestamp on each note
*/

// add_filter( 'gravityflow_timeline_notes', 'jo_timeline_granular', 10, 2 );

// function jo_timeline_granular( $notes, $entry ) {
// 	foreach ( $notes as &$note ) {
// 		$magic = true;
// 		$note->value = $note->date_created . ' - ' . $note->value;
// 	}
// 	return $notes;
// }

/*
Sends the file uploaded in a 'File Upload' field as an  attachment to the assignee of an Approval step
*/
             
add_filter( 'gravityflow_notification', 'jo_gravityflow_notification', 10, 4 );

function jo_gravityflow_notification( $notification, $form, $entry, $step ) {
    
    if ( $step->get_type() == 'notification' ) {

        // attachments

        $fileupload_fields = GFCommon::get_fields_by_type( $form, array( 'fileupload' ) );

        if ( ! is_array( $fileupload_fields ) ) {
            return $notification;
        }

        $notification['attachments'] = rgar( $notification, 'attachments', array() );
        $upload_root = RGFormsModel::get_upload_root();

        foreach( $fileupload_fields as $field ) {

            $url = rgar( $entry, $field->id );

            if ( empty( $url ) ) {
                continue;
            } elseif ( $field->multipleFiles ) {
                $uploaded_files = json_decode( stripslashes( $url ), true );
                foreach ( $uploaded_files as $uploaded_file ) {
                    $attachment = preg_replace( '|^(.*?)/gravity_forms/|', $upload_root, $uploaded_file );
                    $notification['attachments'][] = $attachment;
                }
            } else {
                $attachment = preg_replace( '|^(.*?)/gravity_forms/|', $upload_root, $url );
                $notification['attachments'][] = $attachment;
            }
        }

        // Purchase Requisition Form
        if ( $form['id'] === 1 ) {

            $notification['disableAutoformat']  = '1';
            $notification['message_format']  = 'html';
            
            // Template variable
            $number_fields = GFCommon::get_fields_by_type( $form, array( 'number' ) );

            // https://codex.gravitykit.com/class_gravity_view___merge___tags.html#a3b71ab6eb3434b794090baf825b3338a
            $workflow_timeline = GFCommon::replace_variables( '{workflow_timeline} ', $form, $entry, false, true, true, 'html' );

            ob_start();

            include 'templates/purchase-requisition-form.php';

            $template_content = ob_get_clean();
            
            $notification['message'] = $template_content;
        }
    }

    gravity_flow()->log_debug( 'Attachment for entry_id ' . $entry['id'] . ' ' . var_export( $notification, true ) );

    return $notification;
}

// Define the log file path
define('CUSTOM_PLUGIN_MODIFICATIONS_LOG_FILE', plugin_dir_path(__FILE__) . 'debug.log');

function write_debug_log( $message ) {
    // Get the current timestamp
    $timestamp = date('Y-m-d H:i:s');
    
    // Format the log entry
    $log_entry = "[$timestamp] DEBUG: $message" . PHP_EOL;
    
    // Write the log entry to the file
    file_put_contents( CUSTOM_PLUGIN_MODIFICATIONS_LOG_FILE, $log_entry, FILE_APPEND );
}
