<?php

add_action( 'wp_ajax_show_pending_order', function () {

    global $wpdb;

    $results = $wpdb->get_results( "select * from make_order where order_status='0'" );

    if ( $results ) {
        
        return wp_send_json_success( $results );
        
    }else{
        return wp_send_json_error('no pending order exists');
    }


} );