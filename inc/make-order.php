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

      // $newdata = json_decode($getOrder[1]->data);

      // $arrayData = [ $newdata[0] ];

      $newData = json_decode($getOrder[0]->data);

      array_push( $newData ,  $data );

     

      // echo var_dump( $jd ); exit;

      update_submittion_order( $wpdb, $newData, $dcnote );

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

function update_submittion_order( $wpdb, $data = [], $id ){
  $wpdb->update( 'make_order', 
  array(
    'data' => json_encode( $data )
  ),
  array(
    'order_id' => $id
  ) );
}