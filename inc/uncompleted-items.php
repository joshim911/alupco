<?php

    add_filter( 'uncomplated-items-list', function( $wpdb ){
        
        $data = $wpdb->get_results( " select * from products_activities where complated_items='0' ");
       if( ! $data  ) : $data = null; endif;
        return $data;
    } );

    add_action( 'wp_ajax_update_item_by_id', function( $param ){
        global $wpdb;

        if( ! empty($_REQUEST['id']) ){
          $id = $_REQUEST['id'];
          $query = "select * from products_activities where id='{$id}'";
        }

        $result = $wpdb->get_results($query); 
        
        if( $result){
          return wp_send_json_success($result); 
        }else{
          return wp_send_json_error("Data not found");
        }

        return $param;
   
} );

add_action( 'wp_ajax_load_more_items', function($param){
    global $wpdb;

    $query = "select * from products_activities  where complated_items='0' ";

    $result = $wpdb->get_results($query); 
    
    if( $result){
      return wp_send_json_success($result); 
    }else{
      return wp_send_json_error("Data not found");
    }

    return $param;


} );