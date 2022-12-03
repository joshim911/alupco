
<h2>Edit Item</h2>
<div class="form-group">
    <label>Search Item by code:</label>
    <input type="text" class="form-control" id="search_edit_item" />
</div>

<div class="form-group my-2">
    <input type="submit" value="Search Item" id="search_edit_item_submit" class="btn btn-primary"  />
</div>


<div id="edit_form" class="d-none">
    <!-- Active fields -->
    <section class="d-md-flex edit_item"  id="edit_item_form">
        <!-- Item Name -->
        <label>Item Name:</label>
        <input type="checkbox" id="active_edit_item_name" />
        <!-- Alupco Group Code -->
        <label>Alupco Group Code:</label>
        <input type="checkbox" id="active_edit_alupco_group_code" />
        <!-- Supplier Group Code -->
        <label>Supplier Group Code:</label>
        <input type="checkbox" id="active_edit_supplier_group_code" />
        <!-- Color -->
         <label>Item Color:</label>
        <input type="checkbox" id="active_edit_color" />
    </section>

    
    <section class="d-md-flex edit_item">
    <!-- Weigth -->
    <label>Item Net Weight:</label>
    <input type="checkbox" id="active_edit_net_weight" />
    <!-- Weigth -->
    <label>Item Gross Weight:</label>
    <input type="checkbox" id="active_edit_gross_weight" />
    <!-- How Many Role or Box -->
    <label>How Many Role/Box:</label>
    <input type="checkbox" id="active_edit_role_box" />
    <!-- Role or Box Quantity-->
    <label>Role/Box Quantity:</label>
    <input type="checkbox" id="active_edit_role_box_quantity" />
</section>

                    <!-- edit new item form -->
<form method="GET">
    <!-- Item Name -->
    <div class="form-group d-none" id="edit_item_name_box">
        <label class="form-group">Item Name:</label>
        <input type="text" class="form-control" id="edit_item_name" name="edit_item_name"/>
    </div>
    <!-- Alupco Code -->
    <div class="form-group">
        <label class="form-group">Alupco Code:</label>
        <input type="text" class="form-control" id="edit_aluco_code" name="edit_aluco_code"/>
    </div>
    <!-- Alupco Group code -->
    <div class="form-group d-none" id="edit_alupco_group_code_box">
        <label class="form-group">Alupco Group Code:</label>
        <input type="text" class="form-control" id="edit_aluco_group_code" name="edit_aluco_group_code"/>
    </div>
    <!-- Supplier Code -->
    <div class="form-group">
        <label class="form-group">Supplier Code:</label>
        <input type="text" class="form-control" id="edit_supplier_code" name="edit_supplier_code"/>
    </div>
    <!-- Supplier Group code -->
    <div class="form-group d-none" id="edit_supplier_group_code_box">
        <label class="form-group">Supplier Group  Code:</label>
        <input type="text" class="form-control" id="edit_supplier_group_code" name="edit_supplier_group_code"/>
    </div>              
    <!-- Quantity Type -->
    <div class="form-group" id="_box">
        <label class="form-group">Quantity Type:</label>
        <input type="text" class="form-control" id="edit_quantity_type" />
    </div>
    <!-- Quantity -->
    <div class="form-group" id="_box">
        <label class="form-group">Quantity of per box:</label>
        <input type="number" class="form-control" id="edit_per_box_quantity" name="edit_per_box_quantity"/>
    </div>
    <!-- Company Name -->
    <div class="form-group">
        <label class="form-group">Company Name:</label>
        <input type="text" class="form-control" id="edit_company" name="edit_company"/>
    </div>
    <!-- Location -->
    <div class="form-group" id="_box">
        <label class="form-group">Location:</label>
        <input type="text" class="form-control" id="edit_location" name="edit_location"/>
    </div>
    <!-- Item Color -->
    <div class="form-group d-none" id="edit_color_box">
        <label class="form-group">Color:</label>
        <input type="text" class="form-control" id="edit_color" name="edit_color"/>
    </div>
    <!-- Box Net Weight -->
    <div class="form-group d-none" id="edit_net_weight_box">
        <label class="form-group">Net Weight in KG:</label>
        <input type="number" class="form-control" id="edit_net_weight" name="edit_net_weight"/>
    </div>
    <!-- Box Gross Weight -->
    <div class="form-group d-none" id="edit_gross_weight_box">
        <label class="form-group">Gross Weight in KG:</label>
        <input type="number" class="form-control" id="edit_gross_weight" name="edit_gross_weight"/>
    </div>
    <!-- Role/Small Box -->
    <div class="form-group d-none" id="edit_role_box_box">
        <label class="form-group">How many boxes or roles in per box:</label>
        <input type="number" class="form-control" id="edit_role_box" name="edit_role_box"/>
    </div>
    <!-- Quantity of small box or role -->
    <div class="form-group d-none" id="edit_quantity_role_box_box">
        <label class="form-group">Quantity of small box or role in per box:</label>
        <input type="number" class="form-control" id="edit_quantity_role_box" name="edit_quantity_role_box"/>
    </div>
    <div class="form-group">
        <input type="button" class="form-control btn btn-primary" id="update_item" value="Save Item" name="update_item" />
    </div>  
</form>
</div>

