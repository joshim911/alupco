<?php
global $items;

?>
 <main class="container my-3">
 	<h2>Search Items</h2>

	<div class="form-group">
		<select id="company_src" class="form-control"> 
			<?php  
			do_action( 'get_wharehouse_name' );
			?>
		</select>
	</div>
	<?php
		
		do_action( 'get_items_name' );
	?>
	
	<div class="form-group my-3">
	  <label for="alupco_code_src"><b>Alupco Code:</b></label>
	  <input type="text" name="" id="alupco_code_src" class="form-control" placeholder="Search Item by Alupco Code" aria-describedby="helpId">
	</div>
	<div class="form-group">
		<!-- item_src means search the item by code  -->
		<input type="button" id="item_src_btn" class="btn btn-primary" value="Submit"/> <b id="search-item-loading-icon" class="mx-3 d-none text-danger">Loading...</b>
	</div>
<?php 
	$result = apply_filters( 'gsp_get_results', [], array() ); 
	
?>
	<section id="show_items">
		<!-- <div id="item_name">
			<span class="title">Item Name:</span><span>Gesket</span>
		</div>
		<div id="alp_code">
			<span class="title">Alupco code:</span><span>AL 01-1-01-50-001</span>
		</div>
		<div id="total_quantity">
			<span class="title">Total Quantity:</span><span>10000 MTR</span>
		</div>
		<div id="alp_group_code">
			<span class="title">Alupco Group Code:</span><span>ss850</span>
		</div>
		<div id="sp_group_code">
			<span class="title">Supplier Group Code:</span><span>sp-group-code</span>
		</div>
		<div id="pending_order">
			<span class="title">Pending order:</span><span>1000 mtr</span>
		</div>
		<div id="in_stock">
			<span class="title">In-stock</span><span>9000 mtr</span>
		</div> -->
	</section>	
</main>

<?php
