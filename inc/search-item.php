<?php

add_action( 'wp_ajax_nopriv_get_items', 'searchItem');

  add_action( 'wp_ajax_get_items', 'searchItem');

  function searchItem( $request ){
    global $wpdb;

    if( ! empty($_REQUEST['alp_code']) ){
      $alpcode = $_REQUEST['alp_code'];
      $query = "select * from stock_manage where alupco_code='{$alpcode}'";
    }

    if( ! empty($_REQUEST['company']) ){
      $wh_house = $_REQUEST['company'];
      $query = "select * from stock_manage where company_name='{$wh_house}'";
    }
    
    if( ! empty($_REQUEST['item_name']) && ! empty($_REQUEST['company'])){
      $itemName = $_REQUEST['item_name']; $wh_house = $_REQUEST['company'];
      $query = "select * from stock_manage where ( item_name ='{$itemName}' and company_name='{$wh_house}' )";
    }
    
    if( ! empty($_REQUEST['alp_code']) && ! empty($_REQUEST['company'])){
      $alpcode = $_REQUEST['alp_code']; $wh_house = $_REQUEST['company'];
      $query = "select * from stock_manage where ( alupco_code='{$alpcode}' and company_name='{$wh_house}' )";
    }

    $result = $wpdb->get_results($query);
    
    if( $result ){
     echo wp_send_json_success($result); 
    }else{
      echo wp_send_json_error("Data not found");
    }
  }


  add_action("wp_ajax_make_inventory", function(){

    global $wpdb; $alpcode = $_REQUEST['alp_code'];

    if( isset( $_REQUEST['inventory'] )  && ! empty($_REQUEST['alp_code']) ){
      
      if( ! empty($_REQUEST['total_quantity']) ){
        $qty = (int) $_REQUEST['total_quantity'];
      }else{
        wp_send_json_error( "Total Quantity has empty value" );
      }

      $result = $wpdb->get_row("select * from stock_manage where alupco_code='{$alpcode}'");
  
      $wpdb->update( 'stock_manage', [ 'total_quantity' => $qty, 'partial_quantity' => $qty ], [ 'alupco_code' => $alpcode ] );

      $wpdb->insert( "stock_inventory", array(
        "item_code" => $alpcode,
        "item_description" => $result->item_description,
        "inventory_quantity"=> $qty,
        "old_quantity" => $result->total_quantity,
        "unit" => $result->unit,

      ) );

      $newResult = $wpdb->get_row("select * from stock_manage where alupco_code = '{$alpcode}'");

      if( $newResult ){
        wp_send_json_success($newResult);
      }

    }else{
      
      $query = $wpdb->get_row(" select * from stock_manage where alupco_code = '$alpcode' ");

      if( $query ){
        wp_send_json_success( $query );
      }else{
        wp_send_json_error("Did not fount item for -> $alpcode");
      }
    }

    

  });