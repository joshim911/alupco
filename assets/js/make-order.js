

//  order submittion
jQuery("#order_maker_submit").click( function (){
    let house = jQuery("#make_order_company_name" ).val();
    let orderID = jQuery("#order_making_id" ).val();
    let newOrderID = jQuery("#new_order_making_id" ).val();
    let itemCode = jQuery("#order_item_code" ).val();
    let itemQty = jQuery("#order_item_qty" ).val();
    let dcnote;
   
    if( orderID != '' ){
        dcnote = orderID;
    }else{
        dcnote = newOrderID;
    }

    if ( house == '' || dcnote == '' || itemCode == '' || itemQty == '' ) {
        return console.log("Please field the form in the right data");
    }


    jQuery.ajax({
        type: "GET",
        url: gspdata.admin_url,
        data: {
            'action': 'make_order',
            'nonce': gspdata.nonce,
            'order_id': dcnote,
            'wharehouse': house,
            'alp_code': itemCode,
            'item_qty': itemQty
        },
        success: function (response) {
            
            console.log( response );
        },
        error: function (xhr, ajaxOptions, Error) {
            
            alert( 'Make sure, you are logged in user' );
            
            console.log(xhr);
            console.log(ajaxOptions);
            console.log(Error);
        },
    });

} );

// show pending orders

function show_pending_orders(){

    jQuery.ajax({
        type: 'GET',
        url: gspdata.admin_url,
        data: {
            'action': 'show_pending_order',
            'nonce': gspdata.nonce,
        },
        success: function ( response ) {

            if (response.success) {
                render_pending_orders( response.data );
            } else {
                console.log(  response );                
            }

        },
        error: function ( xhr, otion, error ){
            console.log(xhr);
            console.log(otion);
            console.log(error);
        }


    });

}

show_pending_orders();

// render_pending_orders will take an array as a parameters
function render_pending_orders( data ){
    const section = jQuery("#render_pending_orders");
    
    console.log( data );

    for (let i = 0; i < data.length; i++) {

        const card = document.createElement('div');
        let code = document.createElement('p');
        let qty = document.createElement('p')
        card.setAttribute( 'class', 'card my-2 p-2' );

        let jsondata = JSON.parse( data[i].data );

        card.append("<p>" + jsondata[0].item_code + "</p>" );
        card.append( jsondata[0].item_qty );

        section.append( card );
        
         console.log( jsondata[0].order_id );
         console.log( jsondata[0].company_name );
         console.log( jsondata[0].item_code );
         console.log( jsondata[0].item_qty );
         console.log( "---- end ----" );
        
    }

    
}