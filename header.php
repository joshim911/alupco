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
           <div>
            <a href="<?php echo esc_url( bloginfo( 'url' ) ); ?>" class="site-title"><h4 class="_title"><?php echo esc_url( bloginfo( 'name' ) ); ?></h4></a>
           </div>
        </div>
    
    </header>
            
    <div id="root" class="d-lg-flex justify-content-around">
        
           
            
