
let counter_order_field = 0;
let code = jQuery(".order-maker-code").val();
let qty = jQuery(".order-maker-qty").val();


jQuery("#order_maker_field").click( function () {
    counter_order_field += 1;
    let form = jQuery("#order_maker_form");

     
        form.append(`<section class="order_maker_field card p-2 mb-2" id="order-field-id-`+counter_order_field+`">
    <div class="form-group mb-2">
        <div class="d-flex justify-content-between">
        <label class="">Item Code</label>
        <label class="text-danger" onclick="remove_order_fields(`+counter_order_field+`)">Remove Field</label>
        </div>
        <input type="text" class="form-control order-maker-code" id="formGroupExampleInput" placeholder="Type Code">
    </div>
    <div class="form-group mb-2">
        <label for="formGroupExampleInput2">Item Quantity</label>
        <input type="text" class="form-control order-maker-qty" id="formGroupExampleInput2" placeholder="Type Quantity">
    </div>
</section>`);
    console.log(counter_order_field)
    
} );

function remove_order_fields ( field_no ){
    let parant = document.getElementById( "order_maker_form" );
    let child = document.getElementById( "order-field-id-" + field_no);
    parant.removeChild( child );
}

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
            
            console.log(  response );
        },
        error: function (xhr, ajaxOptions, Error) {
            
            console.log(xhr);
            console.log(ajaxOptions);
            console.log(Error);
        },
    });

} );


// let orderMakerDetails = new Object();
 
// if ( localStorage.getItem( 'order-info' ) != null ) {
//     orderMakerDetails = localStorage.getItem( 'order-info' );  
// }


// function ordeMakerInfo ( code , qty ){

//     let keyName; let lenNo;

//     if( code == '' || qty == '' ){

//         console.log("code or qty is null");
//         return;
//     }

//     if ( orderMakerDetails != null ) {
        
//         lenNo = Object.keys( orderMakerDetails ).length + 1 ;
//         keyName = 'length_'+lenNo;

//         setObj( keyName, code, qty )
        

//         console.log( "done obj" );

//     }else{

//         orderMakerDetails =  {
//             "length_1" : {
//                 "code":code,
//                 "qty":qty
//             }  
//         };

//         console.log( "not yet store any order" );
//     }

//     localStorage.setItem( 'order-info',  orderMakerDetails );

// }

// let localdata = localStorage.getItem( 'order-info' );
//  console.log( JSON.stringify(localdata) );

//  function setObj( keyName, code, qty ){

//     orderMakerDetails =  {
//         "key2" : {
//             "code":code,
//             "qty":qty
//         }  
//     };
//  }


// localStorage.removeItem('order-info');

// localStorage.removeItem('order-info2');
// localStorage.removeItem('order-info3');

// localStorage.removeItem('order-info4');

// localStorage.removeItem('order-info5');