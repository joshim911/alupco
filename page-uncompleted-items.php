<?php

    require_once __DIR__ . '/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <section>
                <?php 
                    $data = apply_filters('uncomplated-items-list', $wpdb );
                ?>
                <div id="load-more-item" class="d-none text-center">
                    <button class="btn btn-success" onclick="load_more_item()">Load More...</button>
                </div>
             <?php
             if( $data){ 
             ?>   
                <table class="table" id="uncompleted_list">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">code</th>
      <th scope="col">name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="uncompleted-items">
    <?php 

        $ii = 1;
        for($i = 0; $i < count($data); $i++){
            if( $i == 0){

            }
            ?>
                 <tr id="item-<?php echo $data[$i]->id; ?>" class="items-row">
                    <th scope="row"><?php echo $ii; ?></th>
                    <td><?php echo $data[$i]->alupco_code; ?></td>
                    <td><?php echo $data[$i]->item_name; ?></td>
                    <td onclick="update_item_by_id(<?php echo $data[$i]->id; ?>)" class="text-danger update-item"><b>Update</b></td>
                </tr>         
            <?php $ii++;
        }

    ?>
   
  </tbody>
</table>

<?php  }else{
?>
<div>
    <h2 class="text-center">There is No uncompleted item</h2>
</div>
<?php }
 ?>
            </section>
        </div>
        <div class="col-12">
        <div id="edit_by_id" class="d-none">
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
                                <select class="form-control" id="edit_quantity_type" name="edit_quantity_type">
                                    <option value="pcs">PCS</option>
                                    <option value="mtr">MTR</option>
                                    <option value="set">SET</option>
                                </select> 
                            </div>
                            <!-- Quantity -->
                            <div class="form-group" id="_box">
                                <label class="form-group">Quantity of per box:</label>
                                <input type="number" class="form-control" id="edit_quantity" name="edit_quantity"/>
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
                                <label class="form-group">Net Weight in KG:</label>
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
                                <label>Status:</label>
                                <select id="item_status" class="w-100">
                                    <option value="0" default>Edit later</option>
                                    <option value="1">Complate</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="button" class="form-control btn btn-primary" id="update_item" value="Save Item" name="update_item" />
                            </div>  
                        </form>
                </div>
        </div>
    </div>
</div>



<?php

    require_once __DIR__ . '/footer.php';