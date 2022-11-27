<?php


    $INCfiles = glob(__dir__.'/*.php');

    foreach( $INCfiles as $file ){

        require_once $file;

    }