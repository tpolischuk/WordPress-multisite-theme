<?php
// Creating the widget
class topics_recent_post_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'topics-recent_post_widget',

// Widget name will appear in UI
__('PLOS Categories Recent Post Widget', 'topics_recent_post_widget_domain'),

// Widget description
array( 'description' => __( 'Widget to display recent posts from each category', 'topics_recent_post_widget_domain' ), )
);
} // end function __construct()

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
// echo __( 'Hello, World!', 'topics_recent_post_widget_domain' );


// Begin Custom Code

	$categories = get_categories();
    foreach ( $categories as $category ) {
			$recent_topics_args = array(
				'category__not_in' => array(1),
			    'cat' => $category->term_id,
			    'post_type' => 'post',
			    'posts_per_page' => '1'
			);
			$query = new WP_Query( $recent_topics_args );

			if ( $query->have_posts() ) {
	 			while ( $query->have_posts() ) {
	 				$query->the_post();
					$do_not_duplicate[] = get_the_ID();
	 			};
			} else {};
			wp_reset_postdata();
    }

	//If we are on the Collections blog, don't repeat posts.
	if (get_current_blog_id() == 84) {
		$args1 = array(
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => '3',
			'post__not_in'=> $do_not_duplicate,
			'category__not_in' =>  '1',
		);
	} else {
		$args1 = array(
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => '3',
			'category__not_in' =>  '1',
		);
	}

	$query = new WP_Query( $args1 );

	//print_r($query );
	echo '<ul class="wpp-list">';
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$short_title = the_title("","",false);
			$short_title_2 = substr($short_title,0,25);
?>
		<li>
			<a class="alignleft no-thumb" href="<?php the_permalink(); ?>">
				<?php include 'featured-image/100x100.php';  ?>
			</a>

			<a class="wpp-post-title" href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
			<p class="post-stats">
				<span class="wpp-date" title="<?php the_time('F j, Y'); ?>"><?php the_time('F j, Y'); ?></span>
			</p>
		</li> <!-- id="post-<?php the_ID(); ?>" -->
<?php
		} // end while ( $query->have_posts() )
		wp_reset_query();
	} // if ( $query->have_posts() )
	echo "</ul>";
// End Custom Code
echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'topics_recent_post_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
} // Class topics_recent_post_widget ends here

// Register and load the widget
function topics_recent_post_load_widget() {
	register_widget( 'topics_recent_post_widget' );
}
add_action( 'widgets_init', 'topics_recent_post_load_widget' );

?>
