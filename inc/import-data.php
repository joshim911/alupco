<?php

//   $file =  add_filter('wp_handle_upload_prefilter', function ($file) {
//  return $file;
// });


if(  isset( $_POST[ 'submit_stock_sheet' ] ) ){

    $filePath = $_FILES['add_stock_sheet']['tmp_name'];
   
    $xcel = \PhpOffice\PhpSpreadsheet\IOFactory::load( $filePath );
    $sheet = $xcel->getActiveSheet();
    $rows = $sheet->toArray(null,true,true,true);


    // $item = $row['A']; => item code 
    // $description = $row['B']  => item description
    // $unit = $row['C'] =>  item unit
    // $totalStock = $row['H'] => item Total quantity

    global $wpdb;

    foreach( $rows as $row ){
     
        $item = array( 
          'alupco_code' => $row['A'],
          'item_description' => $row['B'],
          'unit' => $row['C'],
          'total_quantity' => $row['H'],
          'wh/house' => 'company-13',
          'item_insert_status' => 1
        
        ); 
    
       if( ! $wpdb->insert( 'stock_manage' ,  $item ) ){
          echo "not submittedd" . "<br>";
       }
    }
}
