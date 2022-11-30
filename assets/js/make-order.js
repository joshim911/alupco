
class Show_pending_orders
{
    constructor(){

        this.fetch_data();
        this.data = {};
        this.rowID;
        this.orderID = 1;
        this.company;
        this.tableNo;
        
    }

    // render_pending_orders will take an array as a parameters
    render_pending_orders( data ){

        if( data.length == 1 ){
            jQuery("#pending_order_title").html( data.length + " PENDING ORDER PENDING");
        }else{
            jQuery("#pending_order_title").html( data.length + " PENDING ORDER'S");

        }

        if( data.length == null ){
            jQuery("#pending_order_title").html( "NO PENDING ORDER!");
        }

        
        const section = jQuery("#render_pending_orders");
        const card = document.createElement('div');
      
        var table = ''; var orderID; var company_name;
         
        var tbody ="";  var SL = 1;

        for( var i=0; i < data.length; i++ ){

            let data2 = JSON.parse(data[i].data);
        
            orderID = data2[0].order_id;
            company_name =data2[0].company_name;

            table  = `<div class="card my-4 p-3">
            <div class="d-flex justify-content-around">
            <p class="text-center">
                <b>Sales Quotaion: # </b><b class="text-primary">`+data2[0].order_id+`</b>
            </p>
            <p class"">
            <b class="mx-2">W/H-House: `+company_name+`</b>
            <b class="mx-2 text-success" onclick="confirm_order('`+ orderID +`')" >Confirm</b>
            <b class="mx-2 text-warning" onclick="edit_order('`+ data[i].id +`')" data-bs-toggle="modal" data-bs-target="#active_edit_order_modal">Edit</b>
            <b class="mx-2 text-danger" onclick="delete_order('`+ orderID +`')">Delete</b>
            </p>
            </div>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item-Code</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
            <tr>`;

            for( var ii=0; ii < data2.length; ii++ ){

                SL += 1;
                
                if ( this.orderID != data2[ii].order_id ) {
                    tbody = '';  SL = 1;
                }
                this.orderID = data2[ii].order_id;

            //   console.log(data2[ii]);
                tbody += this.render_elements ( SL, data2[ii].item_code, data2[ii].item_qty );

                
            }
            
            table = table + tbody + `</tbody></table></div>`;
            
            // card.innerHTML = table;

            section.append( card.innerHTML = table );
    
            // reassing order-id for checking 
            this.orderID= data2[0].order_id;
        }
        
    }



    
    // create childs element 
    render_elements ( SL, item_code, item_qty ){
 
        let table = `<tr>
                <td scope="row">`+SL+`</td>
                <td scope="row">`+item_code+`</td>
                <td scope="row">`+item_qty+`</td>
            </tr>`;
    
        return table;
    }


    // AJAX CALLING 
    fetch_data(){

        jQuery.ajax({
            type: 'GET',
            url: gspdata.admin_url,
            data: {
                'action': 'show_pending_order',
                'nonce': gspdata.nonce,
            },
            success: function ( response ) {
    
                if (response.success) {
                    
                    ShowPendingOrders.render_pending_orders(  response.data );
                    
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
    

}

 const ShowPendingOrders = new Show_pending_orders();


function confirm_order( order_id ){
    console.log( "confirm order -> order_id "+order_id );
    jQuery("#order_maker_submit");
    jQuery.ajax({
        type:"GET",
        url: gspdata.admin_url,
        data: {
            "action":"make_confirm_order",
            "nonce": gspdata.nonce,
            "order_id":order_id
            
        },
        success: function (response){

            if ( response.success ) {

                jQuery("#render_pending_orders").html(' ');
                jQuery("#pending_order_title").html( "NO PENDING ORDER!");

                new Show_pending_orders();
            }

            console.log(response);
            
        },
        error: function( xhr, otion, error ){
            console.log(xhr);
            console.log(otion);
            console.log(error);
        }



    });
}

function edit_order( rowID ){

    ShowPendingOrders.rowID = rowID;

    jQuery.ajax({
        type:"GET",
        url:gspdata.admin_url,
        data:{
            "action":"edit_pending_order",
            "row_id":rowID
        },
        success:function ( response ) {
           
            render_edit_order_items( response );
        }
    });

}

function delete_order( order_id ){
    
    jQuery.ajax({
        type:'GET',
        url:gspdata.admin_url,
        data: {
            'action': 'delete_pending_order',
            'nonce': gspdata.nonce,
            'order_id': order_id,
        },
        success: function ( response ) {
            if (response.success) {
                jQuery("#render_pending_orders").html(' ');
                jQuery("#pending_order_title").html( "NO PENDING ORDER!");
                new Show_pending_orders();

            } else {
                alert("Something went wrong...");
            }
            console.log(response);
        },
        error: function ( xhr, option, error ) {
            
        }
    });
}



/**
 * Order Making
 */
jQuery("#order_maker_submit").click( function (){
    let house = jQuery("#make_order_company_name" ).val();
    let orderID = jQuery("#order_making_id" ).val();
    let newOrderID = jQuery("#new_order_making_id" ).val();
    let itemCode = document.getElementById("order_item_code" ).value;
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
            'order_id': dcnote.toUpperCase(),
            'wharehouse': house,
            'alp_code': itemCode.toUpperCase(),
            'item_qty': itemQty
        },
        success: function (response) {
            
            console.log( response );
            new Show_pending_orders();
        },
        error: function (xhr, ajaxOptions, Error) {
            
            alert( 'Make sure, you are logged in user' );
            
            console.log(xhr);
            console.log(ajaxOptions);
            console.log(Error);
        },
    });


} );



function render_edit_order_items ( ajax_data ) {

    console.log(ajax_data);
    
    let itemsBody = jQuery("#edit_pending_order_body");
    
    itemsBody.html( " " ); 
    let data = JSON.parse( ajax_data.data.data );
    let order_id = ajax_data.data.order_id;
    ShowPendingOrders.company = data[0].company_name;

    jQuery("#edit_pending_order_title").html("Sales Quotation or DC-Note: # "+order_id);

    itemsBody.append(`
    <div class="form-group mb-3">
            <label>Change Sales Quotation:</label>
            <input type="text" placeholder="Type Sales Quotation Here" id="order_id_pending_order" class="form-control" value="`+order_id+`" />
        </div>`);
let no = 1;
    for (let i = 0; i < data.length; i++) {
       
        itemsBody.append( `
        <div id="pending_order_editing_field-`+no+`" class="card my-3 p-2">
            <div class="form-group">
                <div class="d-flex justify-content-between">
                <label>#`+no+` Item-Code:</label>
                <label class="text-danger mx-2" onclick="delete_pending_order_editing_field(`+no+`)">X</label>
                </div>
                <input type="text" placeholder="type the item code" class="form-control peding-order-items-code" value="`+data[i].item_code+`" />
            </div>
            <div class="form-group mb-3">
                <label>Item-Code:</label>
                <input type="number" placeholder="type the item quantity" class="form-control peding-order-items-qty" value="`+data[i].item_qty+`" />
            </div>
        </div>
        `);

        no +=1;
    }

}


jQuery("#save_pending_order_items").click( function () {

    const items = [];

    let codes = document.getElementsByClassName("peding-order-items-code");
    let qty = document.getElementsByClassName("peding-order-items-qty");
    let id = document.getElementById("order_id_pending_order").value;
    id = id.toUpperCase();
    ShowPendingOrders.orderID = id;
    for (let i = 0; i < codes.length; i++) {
        console.log( codes[i].value ); 
        items.push( save_pending_order_items( 
            ShowPendingOrders.orderID, ShowPendingOrders.company,
             codes[i].value, qty[i].value 
             ) );
    }

    update_pending_order_items(items)

} );

function save_pending_order_items( order_id, company, code, qty ){
    return {
        "order_id": order_id,
        "company_name":company,
        "item_code":code,
        "item_qty":qty
    };
}

function update_pending_order_items(data){

    jQuery.ajax({
        type:"GET",
        url:gspdata.admin_url,
        data:{
            "action":"update_pending_order_items",
            "data": data,
            "order_id":ShowPendingOrders.orderID,
            "row_id":ShowPendingOrders.rowID
        },
        success: function ( response ){
            console.log(response);
            location.reload();
        }

    });

}

function delete_pending_order_editing_field(no){

    let child = document.getElementById("pending_order_editing_field-"+no);
    let parant = document.getElementById("edit_pending_order_body");

    parant.removeChild(child);

}