<?php


function get_wharehouse_name (){

    global $wpdb;

    $wharehouses = $wpdb->get_results( "select * from get_company_name" );
    
   

    if(  $wharehouses ){
        ?>
        <option value=""><?php echo "Select the WH/House" ?></option>
        <?php

        foreach( $wharehouses as   $wharehouse ){
            ?>
            <option value="<?php echo $wharehouse->company_name ?>"><?php echo $wharehouse->company_name ?></option>
            <?php
        }

    }else{
        ?>
            <p class="text-danger">No wharehouse Name exists</p>
        <?php
    }

}


function get_items_name(){

    global $wpdb;

    $items = $wpdb->get_results( "select * from get_item_name" );
 
    if( $items ){
        ?>
        <div class="form-group">
            <select id="item_name_src">
            <option value="" default>Select Item by name</option>
        <?php
                foreach( $items as   $item ){
                    ?>
                    <option value="<?php echo $item->item_name ?>"><?php echo $item->item_name ?></option>
                    <?php
                }
        ?>
         </select>
        
        <?php
        }else{
            ?>
                <p class="text-danger">No Item Name exists</p>
            <?php
        }
    
        ?>
        
        </div>
    
        <?php
       
}