jQuery("#add_item_selection").change( function(){

    let value = this.value;

    if (value == 'sheet') {
        jQuery("#add_item_by_from").addClass("d-none");
        jQuery("#add_item_sheet").removeClass("d-none");
    }else{
        jQuery("#add_item_by_from").removeClass("d-none");
        jQuery("#add_item_sheet").addClass("d-none");
    }
    
} );

// jQuery("#submit_stock_sheet").click( function(){

//     var props = jQuery('#upload_stock_sheet').prop('files');
// 			var	file=props[0];
// 			console.log(file.name);
// 			console.log(file.size);
// 			console.log(file.type);
// } );
