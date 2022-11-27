<?php
    
    
    get_header();
?>
    <main id="content" class="container-fluid mt-2">

        <?php
            

            /**
             * for making order as if it can store the data for making panding order
             */
            require_once __DIR__ . '/templates/make-order.php';   

            
            /**
             * Insert or Upload new Items using form or by uploading excell-sheet
             */
            // require_once __DIR__ . '/templates/insert-item.php';


            /**
             * Update or edit for stock-manage 
             */
            // require_once __DIR__ . '/templates/update-stock-manage.php';
           

            /**
             * Search Item by wharehouse or item-name or item-code
             * this section is complate
             */
            // require_once __DIR__ . '/templates/search-item.php';
        ?>

    </main>

<?php 
    
    get_footer();
