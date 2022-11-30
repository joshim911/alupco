<?php


add_action( 'wp_ajax_make_confirm_order', function (){

    global $wpdb; $id = $_REQUEST['order_id'];

    $result = $wpdb->get_row( "select * from make_order where order_id = '$id'" );

    if ( $result ) {

        $item = json_decode( $result->data );
        $code = $item[0]->item_code; $qty = $item[0]->item_qty;

        // get previous quantity from stock-manage table
        $total_qty = $wpdb->get_var(" select total_quantity from stock_manage where alupco_code = '$code' ");

        if ($total_qty) {

            $updateTotalQty = $total_qty - $qty;
        
            // update the partial quantity
           $updated = $wpdb->update('stock_manage', array( 'total_quantity' => $updateTotalQty ), array( 'alupco_code' => $code ) );

          if ($updated = false ){
            
             $wpdb->update('make_order', array( 'order_status' => 1 ), array( 'order_id' => $id ) );

             return wp_send_json_success("order has been confirmed");

          }else{
            return wp_send_json_error( "Stock did not update" );
          }
            
        }else{
            return wp_send_json_error( "did not confirm the pending order" );
        }
       
    }else{
        return wp_send_json_error("no data found");
    }

});