<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri().'/assets/css/bootstrap.css' ); ?>" />
     <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri().'/style.css' ); ?>" />
    <script>
        const $ = "jQuery";
    </script>
    <?php 
        wp_head();
    ?>
    <title>Alupco</title>
</head>
<body class="">
    <header class="bg-dark mb-2">
        <div class="container">
            <?php 
                require_once __DIR__ . '/template-parts/sidebar.php';
            ?>
        </div>
    
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="alert alert-primary" role="alert" id="alert"></div>
    </div>
            
    <div id="root" class="d-md-flex">
        
           
           
