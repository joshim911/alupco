<?php

//   $file =  add_filter('wp_handle_upload_prefilter', function ($file) {
//  return $file;
// });


if(  isset( $_POST[ 'submit_stock_sheet' ] ) ){
  
  submitStockSheet();

}


function submitStockSheet (){

  $filePath = $_FILES['add_stock_sheet']['tmp_name'];
   
  $xcel = \PhpOffice\PhpSpreadsheet\IOFactory::load( $filePath );
  $sheet = $xcel->getActiveSheet();
  $rows = $sheet->toArray(null,true,true,true);


  // $item = $row['A']; => item code 
  // $description = $row['B']  => item description
  // $unit = $row['C'] =>  item unit
  // $totalStock = $row['D'] => Total quantity
  // $totalStock = $row['E'] => Companry Name
  // $totalStock = $row['F'] => item Name
  // $totalStock = $row['G'] => Location
  // $totalStock = $row['H'] => Supplier code
  // $totalStock = $row['I'] => Per Box Quantity


  global $wpdb;  $message = []; $item = [];

  foreach( $rows as $index => $row ){
    
    $itemCode = $row['A'];  $unit = $row['C']; $qty = $row['D']; 
    

    if( $index > 1 ){

        $item['alupco_code'] = $itemCode;
        // $item['item_description'] = $itemDes;
        $item['unit'] = $unit;
        $item['total_quantity'] = $qty;
        $item['partial_quantity'] = $qty;
        // $item['company_name'] = $company;
        // $item['item_location'] = $location;
        $item['item_submittion_status'] = 0;

        if( ! empty( $row['B'] ) ){
          $item['item_description'] =  $row['B'];
        }else{
          $item['item_description'] =  null;
        }

        if( ! empty( $row['E'] ) ){
          $item['company_name'] =  $row['E'];
        }else{
          $item['company_name'] =  null;
        }

        if( ! empty( $row['F'] ) ){
          $item['item_name'] =  $row['F'];
        }else{
          $item['item_name'] =  null;
        }

        if( ! empty( $row['G'] ) ){
          $item['item_location'] =  $row['G'];
        }else{
          $item['item_location'] =  null;
        }

        if( ! empty( $row['H'] ) ){
          $item['supplier_code'] =  $row['H'];
        }else{
          $item['supplier_code'] =  null;
        }

        if( ! empty( $row['I'] ) ){
          $item['per_box_quantity'] =  $row['I'];
        }else{
          $item['per_box_quantity'] =  null;
        }
        
        if( ! $wpdb->get_row( "select * from stock_manage where alupco_code = '$itemCode' " ) ){
          
          if( ! $wpdb->insert('stock_manage' , $item )  ) {

            array_push( $message, "'$itemCode' This item not submittedd" );
          }

        }else{
          array_push( $message, "'$itemCode' This item already exists" );

        }

    }
     
  }

    wp_send_json_success($message);

}

        // array( 'alupco_code' => $row['A'] )