<?php


?>

<section id="add_item_section" class="d-none">
        <div class="container">
            <div class="row">
            
                    <h2>Add New Item</h2>

                    <div class="form-group my-3 ">
                        <h4>Add Item by submit form or Excell-Sheet</h4>
                        <select class="form-select" id="add_item_selection" aria-label="Default select example">
                            <option value="sheet">By Upload Excell-Sheet</option>
                            <option value="form">By Form</option>
                        </select>
                    </div>
                    
                    <form id="add_item_sheet" method="POST" class="" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="submit" class="input-group-text bg-primary" name="submit_stock_sheet" value="Upload" />
                            <input type="file" class="form-control" name="add_stock_sheet" id="upload_stock_sheet">
                        </div>
                    </form>

                    <section id="add_item_by_from" class="d-none">
                        <!-- Active fields -->
                        <section class="d-md-flex add_item">
                            <!-- Item Name -->
                            <label>Item Name:</label>
                            <input type="checkbox" id="active_item_name" />
                            <!-- Alupco Group Code -->
                            <label>Alupco Group Code:</label>
                            <input type="checkbox" id="active_alupco_group_code" />
                            <!-- Supplier Group Code -->
                            <label>Supplier Group Code:</label>
                            <input type="checkbox" id="active_supplier_group_code" />
                            <!-- Color -->
                            <label>Item Color:</label>
                            <input type="checkbox" id="active_color" />
                        </section>
                        <section class="d-md-flex add_item">
                            <!-- Weigth -->
                            <label>Item Net Weight:</label>
                            <input type="checkbox" id="active_net_weight" />
                            <!-- Weigth -->
                            <label>Item Gross Weight:</label>
                            <input type="checkbox" id="active_gross_weight" />
                            <!-- How Many Role or Box -->
                            <label>How Many Role/Box:</label>
                            <input type="checkbox" id="active_role_box" />
                            <!-- Role or Box Quantity-->
                            <label>Role/Box Quantity:</label>
                            <input type="checkbox" id="active_role_box_quantity" />
                        </section>

                        <!-- Add new item form -->
                        <form method="GET">
                                <!-- Item Name -->
                                <div class="form-group d-none" id="add_item_name_box">
                                <label class="form-group">Item Name:</label>
                                <input type="text" class="form-control" id="add_item_name" name="add_item_name"/>
                            </div>
                            <!-- Alupco Code -->
                            <div class="form-group">
                                <label class="form-group">Alupco Code: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="add_aluco_code" name="add_aluco_code"/>
                            </div>
                            <!-- Alupco Group code -->
                            <div class="form-group d-none" id="add_alupco_group_code_box">
                                <label class="form-group">Alupco Group Code:</label>
                                <input type="text" class="form-control" id="add_aluco_group_code" name="add_aluco_group_code"/>
                            </div>
                            <!-- Supplier Code -->
                            <div class="form-group">
                                <label class="form-group">Supplier Code:</label>
                                <input type="text" class="form-control" id="add_supplier_code" name="add_supplier_code"/>
                            </div>
                            <!-- Supplier Group code -->
                            <div class="form-group d-none" id="add_supplier_group_code_box">
                                <label class="form-group">Supplier Group  Code:</label>
                                <input type="text" class="form-control" id="add_supplier_group_code" name="add_supplier_group_code"/>
                            </div>              
                            <!-- Quantity Type -->
                            <div class="form-group" id="_box">
                                <label class="form-group">Quantity Type:</label>
                                <select class="form-control" id="add_quantity_type" name="add_quantity_type">
                                    <option value="pcs">PCS</option>
                                    <option value="mtr">MTR</option>
                                    <option value="set">SET</option>
                                </select> 
                            </div>
                            <!-- Quantity -->
                            <div class="form-group" id="_box">
                                <label class="form-group">Quantity of per box:</label>
                                <input type="number" class="form-control" id="add_quantity" name="add_quantity"/>
                            </div>
                            <!-- Company Name -->
                            <div class="form-group">
                                <label class="form-group">Company Name:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="add_company" name="add_company"/>
                            </div>
                            <!-- Location -->
                            <div class="form-group" id="_box">
                                <label class="form-group">Location:</label>
                                <input type="text" class="form-control" id="add_location" name="add_location"/>
                            </div>
                            <!-- Item Color -->
                            <div class="form-group d-none" id="add_color_box">
                                <label class="form-group">Color:</label>
                                <input type="text" class="form-control" id="add_color" name="add_color"/>
                            </div>
                            <!-- Box Net Weight -->
                            <div class="form-group d-none" id="add_net_weight_box">
                                <label class="form-group">Net Weight in KG:</label>
                                <input type="number" class="form-control" id="add_net_weight" name="add_net_weight"/>
                            </div>
                            <!-- Box Gross Weight -->
                            <div class="form-group d-none" id="add_gross_weight_box">
                                <label class="form-group">Net Weight in KG:</label>
                                <input type="number" class="form-control" id="add_gross_weight" name="add_gross_weight"/>
                            </div>
                            <!-- Role/Small Box -->
                            <div class="form-group d-none" id="add_role_box_box">
                                <label class="form-group">How many boxes or roles in per box:</label>
                                <input type="number" class="form-control" id="add_role_box" name="add_role_box"/>
                            </div>
                            <!-- Quantity of small box or role -->
                            <div class="form-group d-none" id="add_quantity_role_box_box">
                                <label class="form-group">Quantity of small box or role in per box:</label>
                                <input type="number" class="form-control" id="add_quantity_role_box" name="add_quantity_role_box"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" id="item_add_submit" value="Add Item" name="item_add_submit" />
                            </div>  
                        </form>
                    </section>
                <!-- </section> -->
                </div>
            </div>
        </div>
    </section>