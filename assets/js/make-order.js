
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
 
const orderMakerDetails = [];

jQuery("#order_maker_submit").click( function (){
    
    let fileds = document.getElementsByClassName( "order_maker_field" );
    let code = document.getElementsByClassName( "order-maker-code" );
    let qty = document.getElementsByClassName( "order-maker-qty" );

    for (let i = 0; i < fileds.length; i++) {
        const element = fileds[i];
        
    }

} );


function ordeMakerInfo ( code , qty ){
    orderMakerDetails.push({
        "code":code,
        "qty":qty
    });
}