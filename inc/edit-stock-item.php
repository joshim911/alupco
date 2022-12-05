<?php

add_action( 'wp_ajax_update_item', 'update_item' );

function update_item( $param ){

    global $wpdb; $alupCode = $_REQUEST['edit_aluco_code'];
    if( ! $alupCode ){
        return wp_send_json_error("alupco code not found");
    }

    $getItem = $wpdb->get_row( "select * from stock_manage where alupco_code = '$alupCode'" );

    if( ! $getItem ){
        wp_send_json_error("did not fount item for this code $alupCode");
    }

    if ( $_REQUEST['get_item'] == 1 && $_REQUEST['update_item'] == 0 ) {
        return wp_send_json_success( $getItem );
    }
   
    $data = []; 

    !empty( $_REQUEST['edit_aluco_group_code'] ) ?  $data['alupco_group_code'] = $_REQUEST['edit_aluco_group_code'] : '';

    !empty( $_REQUEST['edit_supplier_code'] ) ?  $data['supplier_code'] = $_REQUEST['edit_supplier_code'] : '';

    !empty( $_REQUEST['edit_item_name'] ) ?  $data['item_name'] = $_REQUEST['edit_item_name'] : '';

    !empty( $_REQUEST['edit_supplier_group_code'] ) ?  $data['supplier_group_code'] = $_REQUEST['edit_supplier_group_code'] : '';

    // !empty( $_REQUEST['edit_quantity'] ) ?  $data['partial_quantity'] = $_REQUEST['edit_quantity'] : '';

    !empty( $_REQUEST['edit_quantity_type'] ) ?  $data['unit'] = $_REQUEST['edit_quantity_type'] : '';

    !empty( $_REQUEST['edit_company'] ) ?  $data['company_name'] = $_REQUEST['edit_company'] : '';
    
    !empty( $_REQUEST['edit_location'] ) ?  $data['item_location'] = $_REQUEST['edit_location'] : '';

    !empty( $_REQUEST['edit_color'] ) ?  $data['item_color'] = $_REQUEST['edit_color'] : '';
    
    !empty( $_REQUEST['edit_net_weight'] ) ?  $data['item_net_weight_in_kg'] = $_REQUEST['edit_net_weight'] : '';
    
    !empty( $_REQUEST['edit_gross_weight'] ) ?  $data['item_gross_weight_in_kg'] = $_REQUEST['edit_gross_weight'] : '';
    
    !empty( $_REQUEST['edit_per_box_quantity'] ) ?  $data['per_box_quantity'] = (int) $_REQUEST['edit_per_box_quantity'] : '';
    
    !empty( $_REQUEST['edit_role_box'] ) ?  $data['number_of_role_or_box'] = $_REQUEST['edit_role_box'] : '';
    
    !empty( $_REQUEST['edit_quantity_role_box'] ) ?  $data['quantity_of_role_or_box'] = $_REQUEST['edit_quantity_role_box'] : '';
    
    !empty( $_REQUEST['edit_aluco_group_code'] ) ?  $data['item_submittion_status'] = $_REQUEST['edit_aluco_group_code'] : '';
    
    !empty( $_REQUEST['status'] ) ?  $data['alupco_group_code'] = $_REQUEST['status'] : '';
   

    // wp_send_json_error( $data );
    
   $wpdb->update( 'stock_manage',
   $data,
   [ "alupco_code" => $alupCode ]);

    return wp_send_json_success("updated");


    return wp_send_json_error($param);
    
  

}