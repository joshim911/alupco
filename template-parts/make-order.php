

<section id="order_section">
<h3>Make Order!</h3>
   
   <section id="order_maker_form">  
        <div class="order_maker_field card p-2 mb-2">
            <div class="form-group mb-2">
                <label for="formGroupExampleInput">Item Code</label>
                <input type="text" class="form-control order-maker-code" id="formGroupExampleInput" placeholder="Type Code">
            </div>
            <div class="form-group mb-2">
                <label for="formGroupExampleInput2">Item Quantity</label>
                <input type="text" class="form-control order-maker-qty" id="formGroupExampleInput2" placeholder="Type Quantity">
            </div>
        </div>
    </section>   
    <!-- <section class="order_maker_field card p-2 mb-2">
    <div class="form-group mb-2">
        <div class="d-flex justify-content-between">
        <label class="">Item Code</label>
        <label class="text-danger" onclick="remove_order_fields(2)">Remove Field</label>
        </div>
        <input type="text" class="form-control order-maker-code" id="formGroupExampleInput" placeholder="Type Code">
    </div>
    <div class="form-group mb-2">
        <label for="formGroupExampleInput2">Item Quantity</label>
        <input type="text" class="form-control order-maker-qty" id="formGroupExampleInput2" placeholder="Type Quantity">
    </div>
</section> -->

    <div class="form-group">
        <button class="btn btn-primary" id="order_maker_submit">Submit Order</button>
        <button class="btn btn-success mx-2" id="order_maker_field">Add Field</button>
    </div>


    <section id="show_pending_orders" class="my-3">
        <h3>All Pending Order</h3>
    </section>

</section>