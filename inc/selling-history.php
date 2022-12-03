<?php


add_action( "wp_ajax_selling_history", function () {

    global $wpdb; $order_id = $_REQUEST['order_id'];

    $result = $wpdb->get_results( "select * from sales_history where order_id = '$order_id'" );
if( $result ){
 return wp_send_json_success( $result );
}else{
    return wp_send_json_error( "did have any sales history" );
}

} );