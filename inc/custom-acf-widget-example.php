<?php 
// use widgets_init Action hook to execute custom function
add_action( 'widgets_init', 'prowp_register_widgets' );

 //register our widget
function prowp_register_widgets() {

    register_widget( 'prowp_widget' );
    
}

//prowpwidget class
class prowp_widget extends WP_Widget {

    //process our new widget
    function prowp_widget() {
        
        $widget_ops = array(
            'classname'   => 'prowp_widget_class',
            'description' => 'Example widget that displays a user\'s bio.' 
		);
        $this->WP_Widget( 'prowp_widget', 'Bio Widget',  $widget_ops );
        
    }

     //build our widget settings form
    function form( $instance ) {

    }

    //save our widget settings
    function update( $new_instance, $old_instance ) {
        
        $instance = $old_instance;

        return $instance;
        
    }

    //display our widget
    function widget( $args, $instance ) {
        extract( $args );
		
		$url = explode('?', 'http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		$ID = url_to_postid($url[0]);


        // ACFs
        $pro_wp_title_default = get_field('pro_wp_title', 'widget_' . $widget_id);
        $pro_wp_title = get_field('pro_wp_title', $ID);

        echo $before_widget;
        // BEGIN DISPLAY ACF HERE
        if ($pro_wp_title) {
        	echo 'has $pro_wp_title';
        	echo '<br>';
        	echo 'you see: ';
        	echo $pro_wp_title;
        } else {
        	echo 'does not have $pro_wp_title';
        	echo '<br>';
        	echo 'you see: ';
        	echo $pro_wp_title_default;
        }

        // END DISPLAY ACF HERE
        echo $after_widget;
        
    }
}
// =====================================================================================================
// Params
// =====================================================================================================
