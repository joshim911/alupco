<?php

add_action( 'wp_ajax_make_order', function( $request = false ){

    global $wpdb; $message = array();

    if( ! empty($_REQUEST['order_id']) ){
      $dcnote = $_REQUEST['order_id'];
    }else{
        array_push( $message, 'order id is empty' );
    }

    if( ! empty($_REQUEST['wharehouse']) ){
      $wh_house = $_REQUEST['wharehouse'];
    }else{
        array_push( $message, 'WH/House name is empty' );
    }
    
    if( ! empty($_REQUEST['alp_code']) ){
      $alp_code = $_REQUEST['alp_code'];
    }else{
        array_push( $message, 'WH/House name is empty' );
    }

    if( ! empty($_REQUEST['item_qty']) ){
        $qty = $_REQUEST['item_qty'];
      }else{
          array_push( $message, 'Order quantity is empty' );
      }
    
    if( count( $message ) == 0 ){

    }

    $data = (object) [
        'order_id' => $dcnote,
        'company_name' => $wh_house,
        'item_code'  => $alp_code,
        'item_qty' => $qty
    ];
    

    $getOrder = $wpdb->get_results( "select * from make_order where order_id='$dcnote' " );

    if( $getOrder ){

      
      // array_push( $getOrder,  $data  );

      return wp_send_json_error( $getOrder[0]->data );
    
      // submit_order ( $wpdb, $getOrder, $dcnote, $wh_house, $alp_code, $qty );

    }else{

      submit_order ( $wpdb, [$data], $dcnote, $wh_house, $alp_code, $qty );
      echo wp_send_json_error("no order exists");

    }
       

} );


function submit_order ( $db, $data = array(), $id, $company, $code, $qty ){

    if( $db->insert( 'make_order', [
        'data' => json_encode($data),
        'order_id' => $id
      
    ] ) ) {

      echo wp_send_json_success( "order made" ); 

    }else{

      echo wp_send_json_error("order did make");

    }
}