

<section id="order_section">
<h3 class="text-center">Make Order!</h3>

<h5>Select the WH/House</h5>
   <div class="form-group mb-3">
    <select id="make_order_company_name" class="form-control">
        <?php
        do_action( 'get_wharehouse_name' );
        ?>
    </select>
   </div>
   
    <h5>Order ID</h5>
    <div class="form-group mb-2">
        <select id="order_making_id" class="form-control">
            <option value="" selected>Select order ID</option>
        </select>
    </div>

    <div class="form-gourp mb-2">
        <input type="text" id="new_order_making_id" class="form-control" placeholder="Type the order ID" />
    </div>

   <section id="order_maker_form">  
        <div class="order_maker_field card p-2 mb-2">
            <div class="form-group mb-2">
                <label for="formGroupExampleInput">Item Code</label>
                <input type="text" class="form-control order-maker-code" id="order_item_code" placeholder="Type Code">
            </div>
            <div class="form-group mb-2">
                <label for="formGroupExampleInput2">Item Quantity</label>
                <input type="number" class="form-control order-maker-qty" id="order_item_qty" placeholder="Type Quantity">
            </div>
        </div>
    </section>

    <section id="new_order_item_list">
        
    </section>
   

    <div class="form-group">
        <button class="btn btn-primary" id="order_maker_submit">Submit Order</button>
        <button class="btn btn-success mx-2" id="order_maker_field">Add Field</button>
    </div>


    <section id="show_pending_orders" class="my-3">
        <h3>All Pending Order</h3>
    </section>

</section>