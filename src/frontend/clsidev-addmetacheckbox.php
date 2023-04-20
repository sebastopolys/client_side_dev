<?php
namespace ClSidDev\frontend;

class addmetacheckbox{

    public function __construct(){
        add_filter( 'product_type_options', [$this,'add_charge_product_option'] );
        add_action( 'woocommerce_process_product_meta_simple', [$this,'save_charge_option_fields' ] );
        add_action( 'woocommerce_process_product_meta_variable', [$this,'save_charge_option_fields']  );

    }
    public function add_charge_product_option( $product_type_options ) {
        $product_type_options['charge'] = array(
            'id'            => '_charge',
            'wrapper_class' => 'show_if_simple show_if_variable',
            'label'         => __( 'Charge', 'woocommerce' ),
            'description'   => __( '', 'woocommerce' ),
            'default'       => 'no'
        );
    
        return $product_type_options;
    }

    public function save_charge_option_fields( $post_id ) {
        $is_charge = isset( $_POST['_charge'] ) ? 'yes' : 'no';
        update_post_meta( $post_id, '_charge', $is_charge );
    }
}