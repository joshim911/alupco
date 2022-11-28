<?php


add_action( 'wp_ajax_delete_pending_order', function(){

    global $wpdb;

    if( $wpdb->delete( 'make_order', array( 'order_id' => $_REQUEST['order_id'] ) ) ) {
        return wp_send_json_success('order deleted!');
    }else{
        return wp_send_json_error('order did not delete!');
    }



} );