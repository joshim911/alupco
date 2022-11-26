function get_items(){
    let code = jQuery("#alupco_code_src").val();
    let house = jQuery( "#wh-house_src" ).val();
    let item_name = jQuery( "#item_name_src" ).val();

    console.log(code);
    console.log(house);
    console.log(item_name);

        jQuery.ajax({
            type: "GET",
            url: gspdata.admin_url,
            data: {
                'action': 'get_items',
                'nonce': gspdata.nonce,
                'wharehouse': house,
                'alp_code': code,
                'item_name': item_name
            },
            success: function (response) {
                jQuery("#show_items").html('');
                showItem(response);
                console.log( typeof( response) );
            },
            error: function (xhr, ajaxOptions, Error) {
                jQuery("#show_items").html('');
                console.log(xhr);
                console.log(ajaxOptions);
                console.log(Error);
            },
        });

}

jQuery("#item_src_btn").click(function(){
    get_items();
    console.log("item search btn clicked");
});

function showItem( data = {} ){
    let items = data.data;
    let parant; let text;

    for (let i = 0; i < items.length; i++) {

        parant = document.createElement("section");
        parant.setAttribute( "class", "my-3 p-2 border" );

        if ( items[i].item_name ) {
            text = `<span class="title">Item Name: </span>`+items[i].item_name+`</br>`;
        }

        // Alupco code
        text += `<span class="title">Alupco code: </span>`+items[i].alupco_code+`</br>`;

        if( items[i].alupco_group_code ){
            text += `<span class="title">Alupco group code: </span>`+items[i].alupco_group_code+`</br>`;
        }


        if ( items[i].total_quantity ) {
            text += `<span class="title">Total Quantity: </span>`+items[i].total_quantity+`</br>`;
        }

        if ( items[i].quantity_type ) {
            text += `<span class="title">Unit Type: </span>`+items[i].quantity_type+`</br>`;
        }
        

        if ( items[i].item_location ) {
            text += `<span class="title">Item-Location: </span>`+items[i].item_location+`</br>`;
        }
        
        if ( items[i].number_of_role_or_box ) {
            text += `<span class="title">Number of role or box: </span>`+items[i].number_of_role_or_box+`</br>`;
        }

        if ( items[i].quantity_of_role_or_box ) {
            text += `<span class="title">Quantity of role or box: </span>`+items[i].quantity_of_role_or_box+`</br>`;
        }

        if ( items[i].item_color ) {
            text += `<span class="title">Color: </span>`+items[i].item_color+`</br>`;
        }

        if ( items[i].item_net_weight_in_kg ) {
            text += `<span class="title">Net weight: </span>`+items[i].item_net_weight_in_kg+`</br>`;
        }

        if ( items[i].item_gross_weight_in_kg ) {
            text += `<span class="title">Gross Weight: </span>`+items[i].item_gross_weight_in_kg+`</br>`;
        }
        
        if ( items[i].company_name ) {
            text += `<span class="title">WH/Hourse: </span>`+items[i].company_name+`</br>`;
        }
        
        if( items[i].supplier_code ){
            text += `<span class="title">Supplier code: </span>`+items[i].supplier_code+`</br>`;
        }

        if( items[i].supplier_group_code ){
            text += `<span class="title">Supplier group code: </span>`+items[i].supplier_group_code+`</br>`;
        }
        
        
        parant.innerHTML = text;
        jQuery("#show_items").append(parant);
        
        parant = null;
    }
    
     console.log(typeof(items))
    console.log( items  );
}