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
   
    $data = array(
        'alupco_group_code' => $_REQUEST['edit_aluco_group_code'],
        'supplier_code' => $_REQUEST['edit_supplier_code'],
        'item_name' => $_REQUEST['edit_item_name'],
        'supplier_group_code' => $_REQUEST['edit_supplier_group_code'],
        'total_quantity'  => $_REQUEST['edit_quantity'],
        'partial_quantity'  => $_REQUEST['edit_quantity'],
        'unit' => $_REQUEST['edit_quantity_type'],
        'company_name' => $_REQUEST['edit_company'],
        'item_location' => $_REQUEST['edit_location'],
        'item_color' => $_REQUEST['edit_color'],
        'item_net_weight_in_kg' => $_REQUEST['edit_net_weight'],
        'item_gross_weight_in_kg' => $_REQUEST['edit_gross_weight'],
        'per_box_quantity' => (int) $_REQUEST['add_per_boxx_quantity'],
        'number_of_role_or_box' => $_REQUEST['edit_role_box'],
        'quantity_of_role_or_box'=> $_REQUEST['edit_quantity_role_box'],
        'item_submittion_status'  => $_REQUEST['status']
    );

    // wp_send_json_error( $data );
    
   $wpdb->update( 'stock_manage',
   $data,
   [ "alupco_code" => $alupCode ]);

    return wp_send_json_success("updated");


    return wp_send_json_error($param);
    
  

}