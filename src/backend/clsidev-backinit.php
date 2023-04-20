<?php
namespace ClSidDev\backend;

class backinit{

    private static $bkmenu = null;

    public function __construct($config){

        self::$bkmenu = new adminmenu($config);
        self::$bkmenu ->backendMenuStart();
    
    }
}
