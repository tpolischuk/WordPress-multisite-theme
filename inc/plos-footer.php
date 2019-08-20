	<div class="footer-container">
		<div class="row">
			<div class="one-third">
				<a class="logo" href="/">
					<img src="<?php echo site_url(); ?>/wp-content/themes/genesis-plos/images/plos_logo.png">
				</a>
				<?php include 'static-footer-left-navigation-menu-stage.php'; ?>
				<div class="genesis-nav-menu footer-menu footer-utilities right">
					<ul>
						<li class="rss-feed-icon">
							<?php
							$rssfeedurl =  $_SERVER["REQUEST_URI"] . 'feed';
							?>
							<?php
							if (is_single() || is_page() ) {
							?>
							<a href="<?php echo site_url(); ?>/feed">
								<i class="fa fa-rss"></i>
							</a>
							<?php
							} else {
							?>
							<a href="<?php echo $rssfeedurl; ?>">
								<i class="fa fa-rss"></i>
							</a>
							<?php
							};
							?>
						</li>
						<li class="btn btn-sm">
							<a href="<?php echo site_url() ?>/wp-login.php">Login</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="one-third">
				<?php include 'static-footer-middle-navigation-menu.php'; ?>
			</div>
			<div class="one-third">
				<?php include 'static-footer-right-navigation-menu.php'; ?>
			</div>
		</div>

	</div>
