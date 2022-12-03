<?php
global $items;

?>
 <main class="my-3">
 	<h4>Search Items</h4>

	<div class="form-group">
		<select id="company_src" class="form-control">
			<?php  
			do_action( 'get_wharehouse_name' );
			?>
		</select>
	</div>

	<div class="form-group my-3">
		<select id="item_name_src" class="form-control">
			<?php	
				do_action( 'get_items_name' );
			?>
		</select>
	</div>
	
	<div class="form-group">
	  	<label class="">Alupco Code:</label>
	  </div>
	<div class="input-group">
	  
	  <input type="text" name="" id="alupco_code_src" class="form-control" placeholder="Search Item by Alupco Code">
	  <input type="button" id="item_src_btn" class="btn btn-primary" value="Search"/>
	</div>

	<section id="show_items">
		
	</section>	
</main>

<?php
