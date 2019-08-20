<?php
	if (is_author() == 0) {
		if (function_exists('plos_posted_coauthors_ids')) {
			$co_author_ids = plos_posted_coauthors_ids();
			$co_authors_index = 0;
		}
		foreach($co_author_ids as $co_author_id)
		{
			$is_first = false;
			$is_last = false;
			$avatar = get_avatar( get_the_author_meta( 'user_email', $co_author_id ), 100 );
			$user_email = get_the_author_meta( 'user_email', $co_author_id );
			$first_name = get_the_author_meta( 'first_name', $co_author_id );
			$facebook = get_the_author_meta( 'facebook', $co_author_id );
			$twitter = get_the_author_meta( 'twitter', $co_author_id );
			$googleplus = get_the_author_meta( 'googleplus', $co_author_id );
			$user_url = get_the_author_meta( 'user_url', $co_author_id );
			$linkedin = get_the_author_meta( 'linkedin', $co_author_id );
			$bio = get_the_author_meta('description', $co_author_id);
			$author_title = get_author_posts_url( $co_author_id );
			$author_first_name = get_the_author_meta('first_name', $co_author_id);
			$author_last_name = get_the_author_meta('last_name', $co_author_id);
			if ($co_authors_index == 0) {
				$is_first = true;
			}
			if ($co_authors_index + 1 == sizeof($co_author_ids)) {
				$is_last = true;
			}
			$co_authors_index++;
	?>

			<div id="authorarea" class="author-area
			<?php
			 if ($is_first == true && $is_last == false) {echo 'first';}
			 if ($is_last == true && $is_first == false) {echo 'last';}
			if ($is_last == true && $is_first == true) {echo 'only';}
			?>">
				<div class="author-info">
					<?php if ($avatar) { ?>
						<div class="author-image">
							<?php echo $avatar ?>
						</div>
					<?php } ?>

					<div class="author-header">
						<h3><a href="<?php echo $author_title; ?>"><?php echo $author_first_name .' '. $author_last_name; ?></a></h3>
						<ul class="author-links">
							<?php if ($facebook) { ?>
								<li>
									<a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>
								</li>
							<?php } ?>

							<?php if ($twitter) { ?>
								<li>
									<a href="https://twitter.com/<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
								</li>
							<?php } ?>

							<?php if ($googleplus) { ?>
								<li>
									<a href="<?php echo $googleplus; ?>"><i class="fa fa-google-plus"></i></a>
								</li>
							<?php } ?>

							<?php if ($user_url) { ?>
								<li>
									<a href="<?php echo $user_url; ?>"><i class="fa fa-globe"></i></a>
								</li>
							<?php } ?>

							<?php if ($linkedin) { ?>
								<li>
									<a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a>
								</li>
							<?php } ?>

							<?php if ($user_email) { ?>
								<li>
									<a href="mailto:<?php echo $user_email ?>?Subject=Hello%20<?php echo $first_name ?>"><i class="fa fa-envelope"></i></a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="author-entry-content">
						<p><?php echo $bio; ?></p>
					</div>
				</div>
			</div>
	<?php	}
	} else {

			$avatar = get_avatar( get_the_author_meta( 'user_email' ), 100 );
			$user_email = get_the_author_meta( 'user_email' );
			$first_name = get_the_author_meta( 'first_name' );
			$facebook = get_the_author_meta( 'facebook' );
			$twitter = get_the_author_meta( 'twitter' );
			$googleplus = get_the_author_meta( 'googleplus' );
			$user_url = get_the_author_meta( 'user_url' );
			$linkedin = get_the_author_meta( 'linkedin' );
			$bio = get_the_author_meta('description');
			$author_title = get_author_posts_url();
			$author_first_name = get_the_author_meta('first_name');
			$author_last_name = get_the_author_meta('last_name');
			$co_authors_index++;
	?>

			<div id="authorarea" class="author-area only">
				<div class="author-info">
					<?php if ($avatar) { ?>
						<div class="author-image">
							<?php echo $avatar ?>
						</div>
					<?php } ?>

					<div class="author-header">
						<h3><?php echo $author_first_name .' '. $author_last_name; ?></h3>
						<ul class="author-links">
							<?php if ($facebook) { ?>
								<li>
									<a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>
								</li>
							<?php } ?>

							<?php if ($twitter) { ?>
								<li>
									<a href="https://twitter.com/<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
								</li>
							<?php } ?>

							<?php if ($googleplus) { ?>
								<li>
									<a href="<?php echo $googleplus; ?>"><i class="fa fa-google-plus"></i></a>
								</li>
							<?php } ?>

							<?php if ($user_url) { ?>
								<li>
									<a href="<?php echo $user_url; ?>"><i class="fa fa-globe"></i></a>
								</li>
							<?php } ?>

							<?php if ($linkedin) { ?>
								<li>
									<a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a>
								</li>
							<?php } ?>

							<?php if ($user_email) { ?>
								<li>
									<a href="mailto:<?php echo $user_email ?>?Subject=Hello%20<?php echo $first_name ?>"><i class="fa fa-envelope"></i></a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="author-entry-content">
						<p><?php echo $bio; ?></p>
					</div>
				</div>
			</div>

	<?php } ?>
