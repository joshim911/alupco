<?php


add_action( 'wp_ajax_make_confirm_order', function (){

    global $wpdb; $id = $_REQUEST['order_id']; $error = []; $succss =[];

    $result = $wpdb->get_row( "select * from make_order where order_id = '$id'" );

    if ( $result ) {

        $items = json_decode( $result->data );


            foreach( $items as $item ){ 


                    // get previous quantity from stock-manage table
                $StockItem = $wpdb->get_row(" select * from stock_manage where alupco_code = '$item->item_code' ");


                if ($StockItem) {

                $total_stockQTY = (int) $StockItem->total_quantity;

                $updateTotalQty = $total_stockQTY - $item->item_qty;
        
            
           $wpdb->update('stock_manage', array( 'total_quantity' => $updateTotalQty , 'partial_quantity' => $updateTotalQty ), array( 'alupco_code' => $item->item_code ) );
   
            $wpdb->update('make_order', array( 'order_status' => 1 ), array( 'order_id' => $id ) );

                
                $salesHisotryMade = array(
                    'order_id' => $item->order_id,
                    'alupco_code' => $item->item_code,
                    'item_quantity' => $item->item_qty,
                    'item_description' => $StockItem->item_description,
                    'item_unit'  =>  $StockItem->unit,
                    'stock_quantity' => $updateTotalQty,
                );


                // echo var_dump( $salesHisotryMade ); 

            if( $wpdb->insert( 'sales_history', $salesHisotryMade ) ){
                array_push($succss, $item->item_code . "-> item realsed");
            }else{
                array_push($error, $item->item_code . "-> Order hisotry did not made, maybe something went wrong.");
            }


        }else{
            array_push($error, $item->item_code . "-> no data found from stock manage");
        }

        }

        if( count( $succss ) > 0 ){
            wp_send_json_success( $succss );
        }

        if( count( $error ) > 0 ){
            wp_send_json_error( $error );
        }
    }

});