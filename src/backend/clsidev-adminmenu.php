<?php
namespace ClSidDev\backend;

class adminmenu{
    
    private static $config = null;    

    public function __construct(object $config){

        if(self::$config===null)
            self::$config = $config;      

    }

    public function backendMenuStart(){
        
        add_action('admin_menu',[$this,'clsidev_admin_menu']); // admin dashboard menu
     //   add_action('admin_init',[$this,'include_wpwooAjax']); // include AJAX JQuery file

    //    self::$pltab = new getpltab();
    //    new removenotices(self::$plpage->getUrlPage());
    //    hooks
      //  add_action('admin_enqueue_scripts',[$this,'wpwoolicsys_back_scripts']); // include Javascript file
    //    add_action('admin_init',[$this,'smartlink_back_styles']); // include CSS main file for backend

    }

    public function wpwoolicsys_back_scripts() {
        
        // call javascript files        
		if(self::$plpar->getUrlPar('page')=='wpwoolicsys_admin'
            &&self::$plpar->getUrlPar('tab')=='wpwoo_lic_sys_listing'){
			//wp_enqueue_script('wpwoolicsys_admin',self::$config::$pluurl.'scripts/js/wpwoolicsys_admin.js');
			//wp_enqueue_script('wpwoolicsys_admin');           
		}
        
	}

    public function clsidev_admin_menu(){

        // add plugin menu to WP dashboard
		add_menu_page(
		        __( 'Client Side DEV', 'clsidev' ),
		        __( 'Client side DEV','clsidev' ),
		        'manage_options','clsidev_admin',
		        array($this,'clsidev_admin_callback'),		
		   			);		

	}

    public function clsidev_admin_callback(){

        echo '<div class="wrapper">';        
        echo '<h1 class ="wp-heading-inline">'.self::$config::$plname.' ! </h1>';
        echo '<h3 style="font-weight:300">'. self::$config::$pldesc.'</h3>';     
	          echo '<p>'. self::$config::$plvers.'</p>';  
        echo "</div>";
      
    }    
}
