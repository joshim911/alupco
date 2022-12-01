<?php


add_action( 'wp_ajax_make_confirm_order', function (){

    global $wpdb; $id = $_REQUEST['order_id'];

    $result = $wpdb->get_row( "select * from make_order where order_id = '$id'" );

    if ( $result ) {

        $item = json_decode( $result->data );
        $code = $item[0]->item_code; $qty = $item[0]->item_qty;

        // get previous quantity from stock-manage table
        $item = $wpdb->get_row(" select * from stock_manage where alupco_code = '$code' ");

        if ($item) {

            $total_previous_qty = (int) $item->total_quantity;

            $updateTotalQty = $total_previous_qty - $qty;
        
            // echo var_dump($item);
            // echo var_dump($total_previous_qty);
            // echo var_dump($updateTotalQty); exit; 
            // update the partial quantity
            
           $wpdb->update('stock_manage', array( 'total_quantity' => $updateTotalQty , 'partial_quantity' => $updateTotalQty ), array( 'alupco_code' => $code ) );
   
            $wpdb->update('make_order', array( 'order_status' => 1 ), array( 'order_id' => $id ) );

            $salesHisotryMade = array(
                'order_id' => $id,
                'alupco_code' => $code,
                'item_description' => $item->item_description,
                'item_unit'  =>  $item->unit,
                'item_quantity' => $qty,
                'stock_quantity' => $updateTotalQty,
            );

            if( $wpdb->insert( 'sales_history', $salesHisotryMade ) ){
                return wp_send_json_success("Order has been released");
            }else{
                return wp_send_json_error("Order hisotry did not made, maybe something went wrong.");
            }


        }else{
            return wp_send_json_error("no data found");
        }
    }

});