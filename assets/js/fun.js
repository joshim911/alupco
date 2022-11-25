jQuery(document).ready( function(){

    // active add item section
jQuery("#active_item_name").change(function (e) { 

    if (this.checked) {
        if( jQuery("#add_item_name_box").hasClass("d-none") ){
            jQuery("#add_item_name_box").removeClass("d-none");
        }

        jQuery("#add_item_name_box").show(100);
    }else{
        jQuery("#add_item_name_box").hide(100);
    }
    
});
    
    // active_alupco_group_code on change
    jQuery("#active_alupco_group_code").change( function(){

        if( this.checked ){

            if( jQuery("#add_alupco_group_code_box").hasClass("d-none") ){
                jQuery("#add_alupco_group_code_box").removeClass("d-none");
            }

            jQuery("#add_alupco_group_code_box").show(100);

        }else{
            jQuery("#add_alupco_group_code_box").hide(100);
        }
    
    });


    // active_supplier_group_code on change
    jQuery("#active_supplier_group_code").change( function(){

        if( this.checked ){

            if( jQuery("#add_supplier_group_code_box").hasClass("d-none") ){
                jQuery("#add_supplier_group_code_box").removeClass("d-none");
            }

            jQuery("#add_supplier_group_code_box").show(100);

        }else{
            jQuery("#add_supplier_group_code_box").hide(100);
        }  
    });    
        

    // active_color on change
    jQuery("#active_color").change( function(){

        if( this.checked ){

            if( jQuery("#add_color_box").hasClass("d-none") ){
                jQuery("#add_color_box").removeClass("d-none");
            }

            jQuery("#add_color_box").show(100);

        }else{
            jQuery("#add_color_box").hide(100);
        }  
    });    

  // active_net_weight on change
  jQuery("#active_net_weight").change( function(){

    if( this.checked ){

        if( jQuery("#add_net_weight_box").hasClass("d-none") ){
            jQuery("#add_net_weight_box").removeClass("d-none");
        }

        jQuery("#add_net_weight_box").show(100);

    }else{
        jQuery("#add_net_weight_box").hide(100);
    }  
}); 

   // active_grosss_weight on change
   jQuery("#active_gross_weight").change( function(){

    if( this.checked ){

        if( jQuery("#add_gross_weight_box").hasClass("d-none") ){
            jQuery("#add_gross_weight_box").removeClass("d-none");
        }

        jQuery("#add_gross_weight_box").show(100);

    }else{
        jQuery("#add_gross_weight_box").hide(100);
    }  
});  


   // active_role_box on change
   jQuery("#active_role_box").change( function(){

    if( this.checked ){

        if( jQuery("#add_role_box_box").hasClass("d-none") ){
            jQuery("#add_role_box_box").removeClass("d-none");
        }

        jQuery("#add_role_box_box").show(100);

    }else{
        jQuery("#add_role_box_box").hide(100);
    }  
}); 

   // active_role_box_quantity on change
   jQuery("#active_role_box_quantity").change( function(){

    if( this.checked ){

        if( jQuery("#add_quantity_role_box_box").hasClass("d-none") ){
            jQuery("#add_quantity_role_box_box").removeClass("d-none");
        }

        jQuery("#add_quantity_role_box_box").show(100);

    }else{
        jQuery("#add_quantity_role_box_box").hide(100);
    }  
}); 


// Edit section start
    
    // active_alupco_group_code on change
    jQuery("#active_edit_item_name").change( function(){

        if( this.checked ){

            if( jQuery("#edit_item_name_box").hasClass("d-none") ){
                jQuery("#edit_item_name_box").removeClass("d-none");
            }

            jQuery("#edit_item_name_box").show(100);

        }else{
            jQuery("#edit_item_name_box").hide(100);
        }
    
    });

    // active_alupco_group_code on change
    jQuery("#active_edit_alupco_group_code").change( function(){

        if( this.checked ){

            if( jQuery("#edit_alupco_group_code_box").hasClass("d-none") ){
                jQuery("#edit_alupco_group_code_box").removeClass("d-none");
            }

            jQuery("#edit_alupco_group_code_box").show(100);

        }else{
            jQuery("#edit_alupco_group_code_box").hide(100);
        }
    
    });


    // active_supplier_group_code on change
    jQuery("#active_edit_supplier_group_code").change( function(){

        if( this.checked ){

            if( jQuery("#edit_supplier_group_code_box").hasClass("d-none") ){
                jQuery("#edit_supplier_group_code_box").removeClass("d-none");
            }

            jQuery("#edit_supplier_group_code_box").show(100);

        }else{
            jQuery("#edit_supplier_group_code_box").hide(100);
        }  
    });    
        

    // active_color on change
    jQuery("#active_edit_color").change( function(){

        if( this.checked ){

            if( jQuery("#edit_color_box").hasClass("d-none") ){
                jQuery("#edit_color_box").removeClass("d-none");
            }

            jQuery("#edit_color_box").show(100);

        }else{
            jQuery("#edit_color_box").hide(100);
        }  
    });    


   // active_net_weight on change
   jQuery("#active_edit_net_weight").change( function(){

    if( this.checked ){

        if( jQuery("#edit_net_weight_box").hasClass("d-none") ){
            jQuery("#edit_net_weight_box").removeClass("d-none");
        }

        jQuery("#edit_net_weight_box").show(100);

    }else{
        jQuery("#edit_net_weight_box").hide(100);
    }  
});

   // active_gross_weight on change
   jQuery("#active_edit_gross_weight").change( function(){

    if( this.checked ){

        if( jQuery("#edit_gross_weight_box").hasClass("d-none") ){
            jQuery("#edit_gross_weight_box").removeClass("d-none");
        }

        jQuery("#edit_gross_weight_box").show(100);

    }else{
        jQuery("#edit_gross_weight_box").hide(100);
    }  
});


   // active_role_box on change
   jQuery("#active_edit_role_box").change( function(){

    if( this.checked ){

        if( jQuery("#edit_role_box_box").hasClass("d-none") ){
            jQuery("#edit_role_box_box").removeClass("d-none");
        }

        jQuery("#edit_role_box_box").show(100);

    }else{
        jQuery("#edit_role_box_box").hide(100);
    }  
}); 

   // active_role_box_quantity on change
   jQuery("#active_edit_role_box_quantity").change( function(){

    if( this.checked ){

        if( jQuery("#edit_quantity_role_box_box").hasClass("d-none") ){
            jQuery("#edit_quantity_role_box_box").removeClass("d-none");
        }

        jQuery("#edit_quantity_role_box_box").show(100);

    }else{
        jQuery("#edit_quantity_role_box_box").hide(100);
    }  
}); 

// active add item section
jQuery("#active_add_item_form").click(function (e) { 
    if( jQuery("#add_item_section").hasClass("d-none") ){
        jQuery("#add_item_section").removeClass("d-none");
    }

    jQuery("#edit_item_section").hide();
    jQuery("#add_item_section").show(300);
    unset_inputs_visible();
    
});


// active edit item section
jQuery("#active_edit_item_form").click(function (e) { 

    if( jQuery("#edit_item_section").hasClass("d-none") ){
        jQuery("#edit_item_section").removeClass("d-none");
    }

    jQuery("#edit_item_section").show(300);
    jQuery("#add_item_section").hide();
    
    
});






// active delete item section
// jQuery("#active_add_item_form").click(function (e) { 
//     jQuery().show(100);
    
// });


//  end document ready
} );


if (jQuery("#edit_form").hasClass("d-none") ) {
    jQuery("#edit_form").hide();
}


if ( jQuery("#add_alupco_group_code_box").hasClass("d-none") ) {
    jQuery("#add_alupco_group_code_box").hide();
}

if ( jQuery("#add_supplier_group_code_box").hasClass("d-none") ) {
    jQuery("#add_supplier_group_code_box").hide();
}

if ( jQuery("#add_color_box").hasClass("d-none") ) {
    jQuery("#add_color_box").hide();
}

if ( jQuery("#add_weight_box").hasClass("d-none") ) {
    jQuery("#add_weight_box").hide();
}

if ( jQuery("#add_role_box_box").hasClass("d-none") ) {
    jQuery("#add_role_box_box").hide();
}

if ( jQuery("#add_quantity_role_box_box").hasClass("d-none") ) {
    jQuery("#add_quantity_role_box_box").hide();
}

if ( jQuery("#add_item_section").hasClass("d-none") ) {
    jQuery("#add_item_section").hide();
}

if ( jQuery("#edit_item_section").hasClass("d-none") ) {
    jQuery("#edit_item_section").hide();
}

// item name
if ( jQuery("#add_item_name").hasClass("d-none") ) {
    jQuery("#add_item_name").hide();
}

setTimeout(function(){
    
    jQuery("#insert_alert").hide(100);
    
},5000);

