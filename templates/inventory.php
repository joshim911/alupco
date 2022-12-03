<h4>Stock Inventory</h4>
<div class="form-group">
    <label class="">Alupco-Code</label>
</div>
<div class="input-group">
    <input type="text" class="form-control" id="inventory_item_code" placeholder="type the item code" />
    <input type="button" id="get_item_for_inventory" value="Click Me" class="btn btn-primary" />
</div>

<div id="inventory_qty_div" class="d-none">
    <div class="form-group mt-3">
        <label class="">Total Quantity</label>
    </div>
    <div class="input-group">
        <input type="text" class="form-control" id="inventory_item_total_qty" placeholder="type the item total quantity" />
        <input type="button" id="get_item_for_inventory" value="CLick to Update Stock" class="btn btn-success" onclick="make_inventory()"/>
    </div>
</div>

<div id="inventory_result" class="mt-2">

</div>