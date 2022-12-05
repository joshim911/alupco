<nav>
  <ul class="sidebar-menu">
    <li id="active_search_item" >Search Item</li>
    <?php 
      if( is_user_logged_in() ){
        ?>
      <li id="active_make_order" >Make Order</li>
      <li id="active_selling_history" >Selling History</li>
      <li id="active_pending_orders" >Pending Orders</li>
      <hr class="dropdown-divider">
      <li id="active_add_item" >Add Stock Item</li>
      <li id="active_edit_item" >Edit Stock Item</li>
      <li id="active_stock_inventory" >Stock inventory</li>
        <?php
      }else{
        echo "<li>Please login your account for accessing the management features, thank you!</li>";
        echo '</br><a href="'.home_url('/').'wp-admin'.'" class="mx-4"><b>Click to Login</b></a>';
      }
    ?>
    
      
  </ul>
</nav>