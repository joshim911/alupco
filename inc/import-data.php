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
  // $totalStock = $row['H'] => item Total quantity

  global $wpdb; 

  foreach( $rows as $index => $row ){
    
    $itemCode = $row['A']; $itemDes = $row['B']; $unit = $row['C']; $qty = $row['D']; $company = $row['E'];
    $location = $row['F'];

    if( $index > 1 ){

        $item = array( 
          'alupco_code' => $itemCode,
          'item_description' => $itemDes,
          'unit' => $unit,
          'total_quantity' => $qty,
          'partial_quantity' => $qty,
          'company_name' => $company,
          'item_location' => $location,
          'item_submittion_status' => 1
        
        );

   
        if( ! $wpdb->get_row( "select * from stock_manage where alupco_code='$itemCode' " ) ){
          
          if( ! $wpdb->insert('stock_manage' , $item )  ) {

              echo "not submittedd" . "<br>";
          }

        }

    }
     
  }

}

        // array( 'alupco_code' => $row['A'] )