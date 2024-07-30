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

            ob_start();

            include 'templates/purchase-requisition-form.php';

            $template_content = ob_get_clean();
            
            $notification['message'] = $template_content;
        }
    }

    gravity_flow()->log_debug( 'Attachment for entry_id ' . $entry['id'] . ' ' . var_export( $notification, true ) );

    return $notification;
}
