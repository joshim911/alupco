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