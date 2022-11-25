<?php

add_action( 'wp_ajax_update_item', 'update_item' );

function update_item( $param ){

    global $wpdb;
    if( ! $_REQUEST['edit_aluco_code'] ){
        return wp_send_json_error("alupco code not found");
    }
    if( $wpdb->update( 'products_activities', [ 
    'alupco_group_code' => $_REQUEST['edit_aluco_group_code'],
    'supplier_code' => $_REQUEST['edit_supplier_code'],
    'item_name' => $_REQUEST['edit_item_name'],
    'supplier_group_code' => $_REQUEST['edit_supplier_group_code'],
    'quantity'  => $_REQUEST['edit_quantity'],
    'quantity_type' => $_REQUEST['edit_quantity_type'],
    'company_name' => $_REQUEST['edit_company'],
    'item_location' => $_REQUEST['edit_location'],
    'item_color' => $_REQUEST['edit_color'],
    'item_net_weight_in_kg' => $_REQUEST['edit_net_weight'],
    'item_gross_weight_in_kg' => $_REQUEST['edit_gross_weight'],
    'number_of_role_or_box' => $_REQUEST['edit_role_box'],
    'quantity_of_role_or_box'=> $_REQUEST['edit_quantity_role_box'],
    'complated_items'  => $_REQUEST['status']
], 
[ "alupco_code" => $_REQUEST['edit_aluco_code'] ]
) ) {
    return wp_send_json_success("updated");
}else{
    return wp_send_json_error("update failded");
}

    return wp_send_json_error($param);
  }

