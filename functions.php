<?php

global $wpdb;    
    add_action( 'wp_enqueue_scripts', function(){
        
       
         wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', array(), microtime(), 'all');

        // wp_enqueue_script('myjquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), microtime(), true);

        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap-5.js', array(), '3.0', true);
        wp_enqueue_script('fun', get_template_directory_uri() . '/assets/js/fun.js', array('jquery'), microtime(), true);
        
        wp_enqueue_script('get-item', get_template_directory_uri() . '/assets/js/search-item.js', array('jquery'), microtime(), true);
        wp_enqueue_script('editt-item', get_template_directory_uri() . '/assets/js/edit-item.js', array('jquery'), microtime(), true);
        wp_enqueue_script('newfun', get_template_directory_uri() . '/assets/js/newfun.js', array('jquery'), microtime(), true);

        wp_enqueue_script('make-order', get_template_directory_uri() . '/assets/js/make-order.js', array('jquery'), microtime(), true);
        
        //  QR-Code 
        // wp_enqueue_script('qrcode-reader-helper', get_template_directory_uri() . '/assets/js/qrcode-plugin/qrcode-reader-helper.js', array('myjquery'), microtime(), true);
        // wp_enqueue_script('qrcode-reader', get_template_directory_uri() . '/assets/js/qrcode-plugin/qrcode-reader.js', array('myjquery'), microtime(), true);


        wp_localize_script('fun', 'gspdata', array(
          'nonce'      => wp_create_nonce( 'nonce' ),
          'admin_url'  => admin_url("admin-ajax.php")
        ) );
    });



    require_once  __DIR__ . '/libs/vendor/autoload.php';

    require_once  __DIR__ . '/inc/inc.php';
    
    require_once  __DIR__ . '/inc/import-data.php';
    
    require_once __DIR__ . '/fun.php';





    require_once __DIR__ . '/inc/item-edit.php';
    require_once __DIR__ . '/inc/uncompleted-items.php';
    require_once __DIR__ . '/inc/get-item-and-wharehouse-name.php';
    require_once __DIR__ . '/inc/make-order.php';

    
    add_action( 'get_wharehouse_name', 'get_wharehouse_name' );
    add_action( 'get_items_name', 'get_items_name' );