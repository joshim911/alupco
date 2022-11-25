jQuery("#search_edit_item_submit").click(function (e) { 

   let value = jQuery("#search_edit_item").val();
    console.log(value);

        jQuery.ajax({
            type: "GET",
            url: "https://alupco.writteninfo.com/wp-admin/admin-ajax.php",
            data: {
                'action': 'update_item',
                'nonce': gspdata.nonce,
                'id': index,
            },
            success: function (response) {
                jQuery("#show_items").html('');
                if( response.data[0].alupco_code ){
                    set_edit_ui(response);
                    set_inputs_visible();
                    
                    if (jQuery("#edit_form").hasClass("d-none") ) {
                        jQuery("#edit_form").removeClass("d-none");  
                    }
                    jQuery("#edit_form").show();
                }
                
            }
        });

});



function load_more_item(){
    location.reload();
}

function update_item_by_id( index ){

    
    jQuery.ajax({
        type: "GET",
        url: gspdata.admin_url,
        data: {
            'action':'update_item_by_id',
            'nonce':gspdata.nonce,
            'id':index
        },
        success: function (response) {
            jQuery("#show_items").html('');

                if (jQuery("#edit_form").hasClass("d-none") ) {
                    jQuery("#edit_form").removeClass("d-none");  
                }
                jQuery("#edit_form").show();
                jQuery("#item-"+index).remove();

                set_edit_ui(response);
                set_inputs_visible();
            
        }
    });

    if( jQuery("#edit_by_id").hasClass("d-none") ){
        jQuery("#edit_by_id").removeClass("d-none");
    }
   jQuery("#edit_by_id").show(100);
}

function set_inputs_visible(){
    jQuery("#active_edit_item_name").prop('checked',true);
    jQuery("#active_edit_alupco_group_code").prop('checked',true);
    jQuery("#active_edit_supplier_group_code").prop('checked',true);
    jQuery("#active_edit_color").prop('checked',true);
    jQuery("#active_edit_net_weight").prop('checked',true);
    jQuery("#active_edit_gross_weight").prop('checked',true);
    jQuery("#active_edit_role_box").prop('checked',true);
    jQuery("#active_edit_role_box_quantity").prop('checked',true);

    if( jQuery("#edit_item_name_box").hasClass("d-none") ){
        jQuery("#edit_item_name_box").removeClass("d-none");
    }
    jQuery("#edit_item_name_box").show(100);

    if(jQuery("#edit_alupco_group_code_box").hasClass("d-none") ){
        jQuery("#edit_alupco_group_code_box").removeClass("d-none");
    }
    jQuery("#edit_alupco_group_code_box").show(100);

    if( jQuery("#edit_supplier_group_code_box").hasClass("d-none") ){
        jQuery("#edit_supplier_group_code_box").removeClass("d-none");
    }
    jQuery("#edit_supplier_group_code_box").show(100);

    if( jQuery("#edit_color_box").hasClass("d-none") ){
        jQuery("#edit_color_box").removeClass("d-none");
    }
    jQuery("#edit_color_box").show(100);

    if( jQuery("#edit_net_weight_box").hasClass("d-none") ){
        jQuery("#edit_net_weight_box").removeClass("d-none");
    }
    jQuery("#edit_net_weight_box").show(100);

    if( jQuery("#edit_gross_weight_box").hasClass("d-none") ){
        jQuery("#edit_gross_weight_box").removeClass("d-none");
    }
    jQuery("#edit_gross_weight_box").show(100);

    if( jQuery("#edit_role_box_box").hasClass("d-none") ){
        jQuery("#edit_role_box_box").removeClass("d-none");
    }
    jQuery("#edit_role_box_box").show(100);

    if( jQuery("#edit_role_box_quantity_box").hasClass("d-none") ){
        jQuery("#edit_role_box_quantity_box").removeClass("d-none");
    }
    jQuery("#edit_role_box_quantity_box").show(100);

}


function unset_inputs_visible(){
    jQuery("#active_edit_item_name").prop('checked',false);
    jQuery("#active_edit_alupco_group_code").prop('checked',false);
    jQuery("#active_edit_supplier_group_code").prop('checked',false);
    jQuery("#active_edit_color").prop('checked',false);
    jQuery("#active_edit_net_weight").prop('checked',false);
    jQuery("#active_edit_gross_weight").prop('checked',false);
    jQuery("#active_edit_role_box").prop('checked',false);
    jQuery("#active_edit_role_box_quantity").prop('checked',false);

    jQuery("#edit_item_name_box").hide(100);
    jQuery("#edit_alupco_group_code_box").hide(100);
    jQuery("#edit_supplier_group_code_box").hide(100);
    jQuery("#edit_color_box").hide(100);
    jQuery("#edit_net_weight_box").hide(100);
    jQuery("#edit_gross_weight_box").hide(100);
    jQuery("#edit_role_box_box").hide(100);
    jQuery("#edit_role_box_quantity_box").hide(100);

    jQuery("#edit_form").hide(100);

}

function set_edit_ui( data = {} ){
    
    let item = data.data[0];
    if( jQuery("#edit_item_form").hasClass("d-none") ){
        jQuery("#edit_item_form").removeClass("d-none");
    }

    jQuery("#edit_item_form").show(100);

    if (item.item_name) {
       jQuery("#edit_item_name").val(item.item_name);
    }else{
        jQuery("#edit_item_name").val("");
    }

    if (item.alupco_code) {
        jQuery("#edit_aluco_code").val(item.alupco_code);
    }else{
        jQuery("#edit_aluco_code").val("");
    }
    
    if (item.alupco_group_code) {
        jQuery("#edit_aluco_group_code").val(item.alupco_group_code);
    }else{
        jQuery("#edit_aluco_group_code").val("");
    }

    if (item.company_name) {
        jQuery("#edit_company").val(item.company_name);
    }else{
        jQuery("#edit_company").val("");
    }

    if (item.item_color) {
        jQuery("#edit_color").val(item.item_color);
    }else{
        jQuery("#edit_color").val("");
    }

    if (item.item_location) {
        jQuery("#edit_location").val(item.item_location);
    }else{
        jQuery("#edit_location").val("");
    }
    
    if (item.item_net_weight_in_kg) {
        jQuery("#edit_net_weight").val(item.item_net_weight_in_kg);
    }else{
        jQuery("#edit_net_weight").val("");
    }

    if (item.item_gross_weight_in_kg) {
        jQuery("#edit_gross_weight").val(item.item_net_weight_in_kg);
    }else{
        jQuery("#edit_gross_weight").val("");
    }

    if (item.number_of_role_or_box) {
        jQuery("#edit_role_box").val(item.number_of_role_or_box);
    }else{
        jQuery("#edit_role_box").val("");
    }

    if (item.quantity) {
        jQuery("#edit_quantity").val(item.quantity);
    }else{
        jQuery("#edit_quantity").val("");
    }

    if (item.quantity_type) {
        jQuery("#edit_quantity_type").val(item.quantity_type);
    }else{
        jQuery("#edit_quantity_type").val("");
    }

    if (item.quantity_of_role_or_box) {
        jQuery("#edit_quantity_role_box").val(item.quantity_of_role_or_box);
    }else{
        jQuery("#edit_quantity_role_box").val("");
    }

  
    if (item.supplier_code) {
        jQuery("#edit_supplier_code").val(item.supplier_code);
    }else{
        jQuery("#edit_supplier_code").val("");
    }

    if (item.supplier_group_code) {
        jQuery("#edit_supplier_group_code").val(item.supplier_group_code);
    }else{
        jQuery("#edit_supplier_group_code").val("");
    }
   
}



// update item 
function update_item() {

    let name  = jQuery("#edit_item_name").val();
    let code = jQuery("#edit_aluco_code").val();
    let alp_gcode = jQuery("#edit_aluco_group_code").val();
    let sp_code = jQuery("#edit_supplier_code").val();
    let sp_gcode = jQuery("#edit_supplier_group_code").val();
    let unit_type = jQuery("#edit_quantity_type").val();
    let quantity = jQuery("#edit_quantity").val();
    let company = jQuery("#edit_company").val();
    let location = jQuery("#edit_location").val();
    let color = jQuery("#edit_color").val();
    let net_weight = jQuery("#edit_net_weight").val(); 
    let gross_weight = jQuery("#edit_gross_weight").val();
    let number_of_role = jQuery("#edit_role_box").val();
    let role_quantity = jQuery("#edit_quantity_role_box").val();
    let status = jQuery("#item_status").val();
    jQuery.ajax({
        type: "GET",
            url: "https://alupco.writteninfo.com/wp-admin/admin-ajax.php",
            data: {
                
                "action": 'update_item',
                "nonce": gspdata.nonce,
                "edit_aluco_code":code,
                "edit_aluco_group_code":alp_gcode,
                "edit_supplier_code":sp_code,
                "edit_supplier_group_code":sp_gcode,
                "edit_item_name":name,
                "edit_quantity_type":unit_type,
                "edit_quantity":quantity,
                "edit_company":company,
                "edit_location":location,
                "edit_color":color,
                "edit_net_weight":net_weight,
                "edit_gross_weight":gross_weight,
                "edit_role_box":number_of_role,
                "edit_quantity_role_box":role_quantity,
                'status': status
                
            },
            success: function (response) {
                console.log(response.data[0].alupco_code);
            }
    });

}

jQuery("#update_item").click( function(){
    update_item(); 
    
    if( jQuery("#uncompleted_list").length == 1 ){
        if( jQuery(".items-row").length == 0 ){
            jQuery("#uncompleted_list").hide(100);
            jQuery("#load-more-item").removeClass("d-none");
        }
    }
    
    jQuery("#item_status").val("0").change();
    jQuery("#edit_by_id").hide(100);
} );

jQuery("#edit_by_id").hide();