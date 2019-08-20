<?php 
// use widgets_init Action hook to execute custom function
add_action( 'widgets_init', 'fc_register_widgets' );

 //register our widget
function fc_register_widgets() {

    register_widget( 'fc_widget' );
    
}

//fcwidget class
class fc_widget extends WP_Widget {

    //process our new widget
    function fc_widget() {
        
        $widget_ops = array(
            'classname'   => 'fc_widget_class',
            'description' => 'A widget for featured collections that can be overwritten on per post basis.' 
		);
        $this->WP_Widget( 'fc_widget', 'Featured Collection Widget',  $widget_ops );
        
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


        // From Post/Page edit screen
		$fc_heading_text = get_field("fc_heading_text", $ID);
		$fc_sub_heading = get_field("fc_sub_heading", $ID);
		$fc_body_text = get_field("fc_body_text", $ID);
		$fc_bg_img = get_field("fc_bg_img", $ID);
		$fc_url = get_field("fc_url", $ID);  

		//from Widget Panel:
		$fc_heading_text_default = get_field('fc_heading_text', 'widget_' . $widget_id);
		$fc_sub_heading_default = get_field('fc_sub_heading', 'widget_' . $widget_id);
		$fc_body_text_default = get_field('fc_body_text', 'widget_' . $widget_id);
		$fc_bg_img_default = get_field('fc_bg_img', 'widget_' . $widget_id); 
		$fc_url_default = get_field('fc_url', 'widget_' . $widget_id); 

        echo $before_widget;
        // BEGIN DISPLAY ACF HERE
	?>
		<section id="featured-collection-banner-widget" class="widget featured-collection"> 
		  <a href="<?php if ($fc_url) {
		    echo $fc_url;
		  } else {
		    echo $fc_url_default;
		  }
		   ?>" class="plos_featured_collection">
		    <div class="fc-header">
		      <h2> 
		        <?php if ($fc_heading_text ) {
		          echo $fc_heading_text;
		        } else {
		          echo $fc_heading_text_default;
		        }
		        ?>
		      </h2>
		    </div>
		    <div class="bg-cover-img" style="background-image: url('<?php 
		    if ($fc_bg_img) {
		      echo $fc_bg_img;
		    } else {
		      echo $fc_bg_img_default;
		    }
		    ?>')">            
		      <div class="entry-content">
		        <h1>
		          <?php if ($fc_sub_heading ) {
		            echo $fc_sub_heading; 
		          } else {
		            echo $fc_sub_heading_default; 
		          }
		          ?>
		        </h1>
		        <p>
		          <?php if ($fc_body_text ) {
	            echo $fc_body_text; 
	          } else {
	            echo $fc_body_text_default; 
	          }
	          ?>
	        </p>
	      </div>
	    </div>
	  </a>
	</section>
	<?php

        // END DISPLAY ACF HERE
        echo $after_widget;
        
    }
}
// =====================================================================================================
// Params
// =====================================================================================================
