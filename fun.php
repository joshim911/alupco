<?php


function insert(){
    global $wpdb;
    $data = array();

    if( ! empty( $_REQUEST['add_aluco_code'] ) ){
        $data['alupco_code'] = $_REQUEST['add_aluco_code'];
    }else{
        return wp_send_json_error( "Alupco code field is empty, and it is required" );
    }

    if( ! empty( $_REQUEST['add_total_quantity'] ) ){
        $data['total_quantity'] = (int) $_REQUEST['add_total_quantity'];
    }else{
        return wp_send_json_error( "Itme quantity is empty, and it is required." );
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
    
    if( ! empty( $_REQUEST['add_company'] ) ){
        $data['per_box_quantity'] = $_REQUEST['add_company'];
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

    if( ! empty( $_REQUEST['add_per_boxx_quantity'] ) ){
        $data['per_box_quantity'] = (int) $_REQUEST['add_per_boxx_quantity'];
    }

    if( ! empty( $_REQUEST['add_role_box'] ) ){
        $data['number_of_role_or_box'] = $_REQUEST['add_role_box'];
    }
    
    if( ! empty( $_REQUEST['add_quantity_role_box'] ) ){
        $data['quantity_of_role_or_box'] = $_REQUEST['add_quantity_role_box'];
    }

$check = $_REQUEST['add_aluco_code'];

    $get = $wpdb->get_row( "select * from stock_manage where alupco_code='$check'" );

    $updatedQTY = (int) $data['total_quantity'] + (int) $get->total_quantity;
    $updatedQTY2 = (int) $data['total_quantity'] + (int) $get->partial_quantity;
    if( ! $get ){

         if( $wpdb->insert( 'stock_manage', $data ) ){
            wp_send_json_success("Submitted!");
        }else{
            wp_send_json_error( "Not submitted, please try again." );
        }

    }else{

       $updateStatus = $wpdb->update( 'stock_manage', 
        [ 'total_quantity' => $updatedQTY, 'partial_quantity' => $updatedQTY2 ],
        [ 'alupco_code' => $data['alupco_code'] ] );

        // if( $updateStatus == 0 ){
            wp_send_json_success("Stock updated!");
        // }else{
        //     wp_send_json_error("item did not update");
        // }
        
        
    }
   
}

if( isset($_REQUEST['item_add_submit']) ){

    insert();            
}
