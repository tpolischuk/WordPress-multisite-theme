<?php 
/**
 * Repeater widget class
 *
 * @since 2.8.0
 */
class Repeater_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'repeater-widget', 'description' => __('Repeater Widget.'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('text', __('Repeater'), $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Repeater widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $repeater_widget The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		echo $args['before_widget'];
		?>
		
		<?php
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = ! empty( $new_instance['filter'] );
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
	
<?php
	}
}


// Repeater Widget Prams

add_filter('dynamic_sidebar_params', 'my_dynamic_sidebar_params');

function my_dynamic_sidebar_params( $params ) {
	
	// get widget vars
	$widget_name = $params[0]['widget_name'];
	$widget_id = $params[0]['widget_id'];
	
	
	// bail early if this widget is not a Text widget
	if( $widget_name != 'Repeater' ) {
		
		return $params;
		
	}
	

	$repeater_widget_title = get_field('repeater_widget_title', 'widget_' . $widget_id);

	if( $repeater_widget_title ) { ?>

			<?php $params[0]['before_widget'] .= '<h4 class="widget-title widgettitle">' . $repeater_widget_title . '</h4>'; ?>

	<?php
	} 
	?>
	<?php
	if(get_field('block_or_inline', 'widget_' . $widget_id) == "block")
	{
	   $params[0]['before_widget'] .= '<ul class="block">';
	}
	?>
	<?php
	if(get_field('block_or_inline', 'widget_' . $widget_id) == "inline")
	{
	   $params[0]['before_widget'] .= '<ul class="inline">';
	}
	?>


	<?php if( have_rows('repeater_widget_image_repeater', 'widget_' . $widget_id) ): ?>

		<?php while( have_rows('repeater_widget_image_repeater', 'widget_' . $widget_id) ): the_row(); 

			// vars
			$image = get_sub_field('repeater_image', 'widget_' . $widget_id);
			// $content = get_sub_field('content');
			$link = get_sub_field('repeater_link', 'widget_' . $widget_id);

			?>
			
				<?php 
					$params[0]['after_widget'] = '<li><a href=" ' . $link . ' "><img src="' . $image['url'] . '"></a></li>' . $params[0]['after_widget'];		
				?>

		<?php endwhile; ?>

	<?php endif; ?>
	<?php
		echo '</ul>';
	// return
	return $params;

}