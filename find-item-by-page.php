<?php
global $items;

?>
 <main class="container">
 	<h2>Search Items</h2>
	<div class="form-group">
		<select id="where_house">
			<option value="" default>Select Wh/House</option>
			<option value="company-12">Wh/House 12</option>
			<option value="company-13">Wh/House 13</option>
		</select>
		<select id="item_name">
			<option value="" default>Select Item by name</option>
			<option value="gesket">Gesket</option>
			<option value="13">Scrow</option>
		</select>
	</div>
	<div class="form-group my-3">
	  <label for="gi_alupco_code"><b>Alupco Code:</b></label>
	  <input type="text" name="" id="gi_alupco_code" class="form-control" placeholder="" aria-describedby="helpId">
	</div>
	<div class="form-group">
		<input type="button" id="gi_submit" class="btn btn-primary" value="Submit"/>
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
