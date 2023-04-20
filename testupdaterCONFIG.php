<?php

namespace ClSidDev;

class CONFIG{

    public static $plname = null;
    public static $plprfx = null;
    public static $plvers = null; 
    public static $pldesc = null;
   
    public function __construct(){

        $class = get_class_methods(__CLASS__);
        foreach ($class as $meths) {
            if($meths!=='__construct'){              
                $this->$meths();
            }          
        }

    }  
    
    private function plugin_name(){

        if(self::$plname===null)
            self::$plname = 'Client Side Dev';

    }

    private function plugin_prefix(){

        if(self::$plprfx===null)
            self::$plprfx = 'clsidev'; 

    }
    
    private function plugin_version(){

        if(self::$plvers===null)
            self::$plvers = '1.0.0'; 

    }
    
    private function plugin_description(){

        if(self::$pldesc===null)
            self::$pldesc = 'Plugin made for testing WPWOO licencing system from the client side'; 

    } 
}
