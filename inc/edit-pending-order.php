<?php


add_action( "wp_ajax_edit_pending_order", function ( $response ) {

    $rowID = $_REQUEST['row_id']; global $wpdb;

    $result = $wpdb->get_row( "select * from make_order where id = '$rowID'" );

    if ( $result ) {
        return wp_send_json_success( $result );
    }else{
        return wp_send_json_error( "did not found data for edit pending order, maybe something went wrong" );
    }

} );


// update the pending orders
add_action( "wp_ajax_update_pending_order_items", function ( $response ) {

    $rowID = $_REQUEST['row_id']; global $wpdb;

    $data = $_REQUEST['data']; $id = $_REQUEST['order_id'];

     $wpdb->update( 'make_order', array( 'data' => json_encode($data), "order_id" => $id ), array( "id" => $rowID )  );
    

} );