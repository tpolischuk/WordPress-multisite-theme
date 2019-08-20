<div class="wrap">
	<?php
		$plos_banner_banner = get_field('plos_banner_banner', 'option');
		$plos_banner_logo = get_field('plos_banner_logo', 'option');
		$plos_banner_text = get_field('plos_banner_text', 'option');
		$plos_banner_text_color = get_field('plos_banner_text_color', 'option');
		$blog_details = get_blog_details();
		$blogname = $blog_details->blogname;
	?>
	<?php
	if ( is_user_logged_in() ) {
	?>
		<span class="edit-post"><a class="post-edit-link" href="<?php echo site_url(); ?>/wp-admin/admin.php?page=acf-options#acf-group_55d248e918fb0">edit banner</a></span>
	<?php
		}
	?>
	<?php if ($plos_banner_banner) { ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img class="site-banner" src="<?php echo $plos_banner_banner['url']; ?>" />
		<?php if ($plos_banner_text) { ?>
			<h2 class="plos-banner-text <?php
			 if ($plos_banner_text_color) { echo $plos_banner_text_color; }
			 ?>"><?php echo $plos_banner_text; ?></h2>
		<?php } ?>
	</a>
  <?php } else { ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img class="site-banner" src="<?php echo get_stylesheet_directory_uri(); ?>/images/abstract-science-wallpaper.png" />
		<?php if ($plos_banner_text) { ?>
			<h2 class="plos-banner-text
			<?php
			 if ($plos_banner_text_color) { echo $plos_banner_text_color; }
			 ?>">
			<?php echo $plos_banner_text; ?></h2>
		<?php } else { ?>
			<h2 class="plos-banner-text <?php
			 if ($plos_banner_text_color) { echo $plos_banner_text_color; }
			 ?>"><?php echo $blogname; ?></h2>
		<?php } ?>
	</a>
	<?php } ?>

</div>
