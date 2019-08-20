<?php 	
	the_posts_pagination( array(
		'prev_text'          => __( '<< PREV', 'genesis_plos' ),
		'next_text'          => __( 'Next >>', 'genesis_plos' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'genesis_plos' ) . ' </span>',
	) );
?>