<?php 

class Wedevs_Fm_Shortcode_Post{
    public function __construct(){
        add_action ('init', [$this, 'initialize_shortcode']);
    }


    public function initialize_shortcode(){
        add_shortcode('wedevs_shortcode', [$this, 'wedevs_shortcode']);
        add_shortcode('gallery', [$this, 'gallery_box_callback']);


        /**
         * css spacial link system
         */
        wp_register_style('wedevs-style', plugins_url('assets/css/firoz.css', __FILE__));
    }

    public function wedevs_shortcode($atts){

          /**
         * css spacial link system
         * if I want to indicate post or page use the shortcode than blow the link system 
         */
        wp_enqueue_style('wedevs-style');


        $atts = shortcode_atts(array(
            'title' => 'we are Plugin developer from wedevs',
            'id' => 'btn',
        ), $atts);
        ob_start();
        echo '<h1 >' . $atts['title'] . '</h1>';
        echo '<p>' . $atts['id'] . '</p>';
        $gallery=do_shortcode('[gallery]');
        echo $gallery;
        return ob_get_clean();
    }

    public function gallery_box_callback(){
        echo '<h3>Those who are good they are my friends</h3>';
    }
         
}
