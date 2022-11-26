<?php
    
    
    get_header();
?>
    <main id="content" class="container-fluid mt-2">

        <?php
            
            // this is for QR-Code
            // require_once __DIR__ . '/template-parts/qrcode-header.php';

            require_once __DIR__ . '/template-parts/make-order.php';   

            require_once __DIR__ . '/page-insert-item.php';

            // require_once __DIR__ . '/page-edit-item.php';


            require_once __DIR__ . '/find-item-by-page.php';
        ?>

    </main>

<?php 
    
    get_footer();
