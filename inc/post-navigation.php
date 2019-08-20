<?php
	// Previous/next post navigation.
	the_post_navigation( array(
		'prev_text' => '<i class="fa fa-chevron-left"></i><span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'genesis-plos' ) . '</span> ',
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'genesis-plos' ) . '</span> <i class="fa fa-chevron-right"></i> '
	) );

?>