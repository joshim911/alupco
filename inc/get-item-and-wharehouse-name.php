<?php


function get_wharehouse_and_item_name (){

    global $wpdb;

    $items = $wpdb->get_results( "select * from get_item_name" );
    $wharehouses = $wpdb->get_results( "select * from get_wharehouse_name" );
    
    ?>
        <div class="form-group">
    <?php

    if(  $wharehouses ){
        ?>
        
		<select id="wh-house_src">
		<option value="" default>Select an WH/House</option>
    <?php

        foreach( $wharehouses as   $wharehouse ){
            ?>
            <option value="<?php echo $wharehouse->wharehouse_name ?>"><?php echo $wharehouse->wharehouse_name ?></option>
            <?php
        }

        ?>
        </select>
    <?php

    }else{
        ?>
            <p class="text-danger">No wharehouse Name exists</p>
        <?php
    }

    if( $items ){
    ?>
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