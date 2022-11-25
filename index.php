<?php
    
    
    get_header();
?>
    <main id="content" class="container-fluid mt-2">

        <?php
            require_once __DIR__ . '/page-insert-item.php';

            require_once __DIR__ . '/page-edit-item.php';


require_once __DIR__ . '/find-item-by-page.php';
        ?>

    </main>

<?php 
    
    get_footer();
