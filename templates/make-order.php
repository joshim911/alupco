

<section class="container" id="order_maker_section">
<h4 class="text-center">Make Order!</h4>


   <div class="form-group mb-3">
   <label>Select the WH/House</label>
    <select id="make_order_company_name" class="form-control">
        <?php
        do_action( 'get_wharehouse_name' );
        ?>
    </select>
   </div>
   
    <div class="form-group mb-2">
        <label>Order ID</label>
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
        <!-- <button class="btn btn-success mx-2" id="test_order">Add Field</button> -->
    </div>
  </section>

<section id="show_pending_orders" class="my-3">
    <h3 id="pending_order_title">NO PENDING ORDER!</h3>
        <section id="render_pending_orders">
        
        </section>
</section>

<!-- edit pending order -->

<!-- Modal -->
<div class="modal fade" id="active_edit_order_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_pending_order_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="edit_pending_order_body">
        Loading...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_pending_order_items">Save changes</button>
      </div>
    </div>
  </div>
</div>