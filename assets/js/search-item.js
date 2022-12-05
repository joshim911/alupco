function get_items(){
    let code = jQuery("#alupco_code_src").val();
    let house = jQuery( "#company_src" ).val();
    let item_name = jQuery( "#item_name_src" ).val();
   
        jQuery.ajax({
            type: "GET",
            url: gspdata.admin_url,
            data: {
                'action': 'get_items',
                'nonce': gspdata.nonce,
                'company': house,
                'alp_code': code,
                'item_name': item_name
            },
            success: function (response) {

                hideLoading();
                jQuery("#show_items").html( ' ' );

               if( response.success ){
                showItem(response);
               }else{
                jQuery("#show_items").html( ' ' );
               }
               jQuery("#search-item-loading-icon").addClass('d-none');
            },
            error: function (xhr, ajaxOptions, Error) {
                jQuery("#show_items").html('');
                console.log(xhr);
                console.log(ajaxOptions);
                console.log(Error);
                jQuery("#search-item-loading-icon").addClass('d-none');
               
            },
        });

}

jQuery("#alupco_code_src").keyup( function () {
    
    let code = event.keyCode;
    
    if ( code == 13) {
        showLoading();
        get_items(); 
    }
} );

jQuery("#item_src_btn").click(function(){
    showLoading();
    get_items();
});

function showItem( data ){

   let showItems = jQuery("#show_items");
   

    let items = data.data;
    let parant; let text;


    for (let i = 0; i < items.length; i++) {

        parant = document.createElement("section");
        parant.setAttribute( "class", "my-3 p-2 border" );

        if ( items[i].item_name != null && items[i].item_name != ' ' ) {
            text = `<span class="title">Item Name: </span>`+items[i].item_name+`</br>`;
        }else{
            text = ' ';
        }

        // Alupco code
        if ( items[i].alupco_code != null && items[i].alupco_code != ' ' ) {
            text += `<span class="title">Alupco code: </span>`+items[i].alupco_code+`</br>`;
        }
        

        if( items[i].alupco_group_code != null && items[i].alupco_group_code != ' ' ){
            text += `<span class="title">Alupco group code: </span>`+items[i].alupco_group_code+`</br>`;
        }


        if ( items[i].total_quantity != null && items[i].total_quantity != ' ' ) {
            text += `<span class="title">Total Quantity: </span>`+items[i].total_quantity+`</br>`;
        }

        if ( items[i].unit != null && items[i].unit != ' ' ) {
            text += `<span class="title">Unit: </span>`+items[i].unit+`</br>`;
        }
        

        if ( items[i].per_box_quantity != null && items[i].per_box_quantity != ' ' ) {
            text += `<span class="title">Per Box Quantity: </span>`+items[i].per_box_quantity+`</br>`;
        }
        
        if ( items[i].number_of_role_or_box != null && items[i].number_of_role_or_box != ' ' ) {
            text += `<span class="title">Number of role or box: </span>`+items[i].number_of_role_or_box+`</br>`;
        }

        if (items[i].number_of_role_or_box != null && items[i].number_of_role_or_box != ' ') {
            text += `<span class="title">Quantity of role or box: </span>`+items[i].quantity_of_role_or_box+`</br>`;
        }

        if ( items[i].item_color != null && items[i].item_color != ' ' ) {
            text += `<span class="title">Color: </span>`+items[i].item_color+`</br>`;
        }

        if ( items[i].item_net_weight_in_kg != null && items[i].item_net_weight_in_kg != ' ' ) {
            text += `<span class="title">Net weight: </span>`+items[i].item_net_weight_in_kg+`</br>`;
        }

        if ( items[i].item_gross_weight_in_kg != null && items[i].item_gross_weight_in_kg != ' ' ) {
            text += `<span class="title">Gross Weight: </span>`+items[i].item_gross_weight_in_kg+`</br>`;
        }
        
        if (  items[i].company_name != null && items[i].company_name != ' ' ) {
            text += `<span class="title">WH/Hourse: </span>`+items[i].company_name+`</br>`;
        }
        
        if(  items[i].supplier_code != null && items[i].supplier_code != ' ' ){
            text += `<span class="title">Supplier code: </span>`+items[i].supplier_code+`</br>`;
        }

        if( items[i].supplier_group_code != null && items[i].supplier_group_code != ' ' ){
            text += `<span class="title">Supplier group code: </span>`+items[i].supplier_group_code+`</br>`;
        }

        if ( items[i].item_location != null && items[i].item_location != ' ' ) {
            text += `<span class="title">Item-Location: </span>`+items[i].item_location+`</br>`;
        }
        
        if ( items.length > 0 ) {
            parant.innerHTML = text;
            showItems.append(parant);
            parant = null;
        }
      
    }
   
}

jQuery("#inventory_item_total_qty").keyup( function(){

    let code = event.keyCode;

    if( code == 13 ){
        make_inventory();
    }

} );

function make_inventory(){

    let code = jQuery("#inventory_item_code").val();
    let qty = jQuery("#inventory_item_total_qty").val();
    jQuery("#inventory_result").html(" ");
    showLoading();

    jQuery.ajax({
        type:"POST",
        url:gspdata.admin_url,
        data:{
            "action":"make_inventory",
            "alp_code":code,
            "total_quantity":qty,
            "get_data": false,
            "inventory": true,

        },
        success:function( response ){

            if( response.success ){
                jQuery("#inventory_item_code").val( " " );
                let text = `<p> Item-Code: `+response.data.alupco_code+`</P>
                <p>New Total Quantity: `+response.data.total_quantity+`</p>
                `;
                jQuery("#inventory_result").html(text);
            }
            console.log(response);
            hideLoading();
        }
    });
}

jQuery("#get_item_for_inventory").click(function(){
    getItemForInventory();
});

jQuery("#inventory_item_code").keyup(function(){
    
    let code = event.keyCode;
    if( code == 13 ){
        getItemForInventory();
    }
   
});

function getItemForInventory(){

    let code = jQuery("#inventory_item_code").val();
    code = code.trim();
    showLoading();
    jQuery.ajax({
        type:"POST",
        url:gspdata.admin_url,
        data:{
            "action":"make_inventory",
            "alp_code":code
        },
        success:function( response ){

            if( response.success ){
                jQuery("#inventory_item_code").val( response.data.alupco_code );
                jQuery("#inventory_qty_div").removeClass("d-none");
            }else{
                jQuery("#inventory_qty_div").addClass("d-none");
                jQuery("#inventory_item_code").val( "not exists -> " +code );  
            }
            console.log(response);
            hideLoading();
        }
    });
}