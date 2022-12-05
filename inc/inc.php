<?php


    $INCfiles = glob(__dir__.'/*.php');

    foreach( $INCfiles as $file ){

        require_once $file;

    }
#

    add_filter("login_redirect", function(){
        return home_url();
    });