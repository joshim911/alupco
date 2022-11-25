<?php

if (empty($message)){
    $message = ' ';
}

function insert(){
    global $wpdb,$message;
    $data = array();

    if( ! empty( $_REQUEST['add_aluco_code'] ) ){
        $data['alupco_code'] = $_REQUEST['add_aluco_code'];
    }else{
        return wp_send_json_error( "Alupco code field is empty, and it is required" );
    }

    if( ! empty( $_REQUEST['add_aluco_group_code'] ) ){
        $data['alupco_group_code'] = $_REQUEST['add_aluco_group_code'];
    }

    if( ! empty( $_REQUEST['add_supplier_code'] ) ){
        $data['supplier_code'] = $_REQUEST['add_supplier_code'];
    }

    if( ! empty( $_REQUEST['add_item_name'] ) ){
        $data['item_name'] = $_REQUEST['add_item_name'];
    }

    if( ! empty( $_REQUEST['add_supplier_group_code'] ) ){
        $data['supplier_group_code'] = $_REQUEST['add_supplier_group_code'];
    }

    if( ! empty( $_REQUEST['add_quantity_type'] ) ){
        $data['unit'] = $_REQUEST['add_quantity_type'];
    }

    if( ! empty( $_REQUEST['add_quantity'] ) ){
        $data['quantity'] = $_REQUEST['add_quantity'];
    }
    
    if( ! empty( $_REQUEST['add_company'] ) ){
        $data['wh/house'] = $_REQUEST['add_company'];
    }else{
       return wp_send_json_error( "Company name Type field is empty, and it is required." );
        
    }
    
    if( ! empty( $_REQUEST['add_location'] ) ){
        $data['item_location'] = $_REQUEST['add_location'];
    }
 
    if( ! empty( $_REQUEST['add_color'] ) ){
        $data['item_color'] = $_REQUEST['add_color'];
    }
 
    if( ! empty( $_REQUEST['add_net_weight'] ) ){
        $data['item_net_weight_in_kg'] = $_REQUEST['add_net_weight'];
    }
     
    if( ! empty( $_REQUEST['add_gross_weight'] ) ){
        $data['item_gross_weight_in_kg'] = $_REQUEST['add_gross_weight'];
    }

    if( ! empty( $_REQUEST['add_role_box'] ) ){
        $data['number_of_role/box'] = $_REQUEST['add_role_box'];
    }
    
    if( ! empty( $_REQUEST['add_quantity_role_box'] ) ){
        $data['quantity_of_role/box'] = $_REQUEST['add_quantity_role_box'];
    }

$check = $_REQUEST['add_aluco_code'];
    $get = $wpdb->get_results( "select * from products_activities where alupco_code='$check'" );
    if( ! $get ){
         if( $wpdb->insert( 'products_activities', $data ) ){
            wp_send_json_success("Submitted!");
        }else{
            wp_send_json_error( "Not submitted, please try again." );
        }

    }else{
        wp_send_json_error( "This item already exists." );
    }
   
}
if( isset($_REQUEST['item_add_submit']) ){
    insert();            
}


add_filter( 'gsp_get_results', function(){
    global $wpdb;
    $result = $wpdb->get_results(" select * from  products_activities");
    
    if( $result ){
        return $result;
    }else{
        return "somethings went wrong";
    }
    
} );