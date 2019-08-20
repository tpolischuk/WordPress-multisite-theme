<?php
/*
Switch to the main blog so that the menu works on sub blogs
*/
switch_to_blog(1);
?>
<div class="global-nav genesis-nav-menu mobile-hidden">
	<ul id="menu-global-nav" class="wrap menu genesis-nav-menu">
		<li id="menu-item-38019" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-38019">
			<p>Staff Blogs</p>
			<ul class="sub-menu">
				<?php
				wp_nav_menu( array(
					'menu'       => 'Staff Blogs',
					'container'  => '',
					'items_wrap' => '%3$s'
				) );
				?>
			</ul>
		</li>
		<li id="menu-item-38025" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-38025">
			<p>Blogs by Topic</p>
			<ul class="sub-menu">
				<li id="menu-item-38026" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-38026">
					<p>Biology  &amp; Life Sciences</p>
					<ul class="sub-menu">
						<?php
						wp_nav_menu( array(
							'menu'       => 'Biology & Life Sciences',
							'container'  => '',
							'items_wrap' => '%3$s'
						) );
						?>
					</ul>
				</li>
				<li id="menu-item-38027" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-38027">
					<p>Earth &amp; Environmental Sciences</p>
					<ul class="sub-menu">
						<?php
						wp_nav_menu( array(
							'menu'       => 'Earth & Environmental Sciences',
							'container'  => '',
							'items_wrap' => '%3$s'
						) );
						?>
					</ul>
				</li>
				<li id="menu-item-38087" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-38087">
					<p>Multi-disciplinary Sciences</p>
					<ul class="sub-menu">
						<?php
						wp_nav_menu( array(
							'menu'       => 'Multi-Disciplinary Sciences',
							'container'  => '',
							'items_wrap' => '%3$s'
						) );
						?>
					</ul>
				</li>
				<li id="menu-item-38095" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-38095">
					<p>Medicine &amp; Health</p>
					<ul class="sub-menu">
						<?php
						wp_nav_menu( array(
							'menu'       => 'Medicine & Health',
							'container'  => '',
							'items_wrap' => '%3$s'
						) );
						?>
					</ul>
				</li>
				<li id="menu-item-38101" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-38101">
					<p>Research Analysis &amp; Scientific Policy</p>
					<ul class="sub-menu">
						<?php
						wp_nav_menu( array(
							'menu'       => 'Research Analysis & Scientific Policy',
							'container'  => '',
							'items_wrap' => '%3$s'
						) );
						?>
					</ul>
				</li>
			</ul>
		</li>
		<li id="menu-item-38035" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38035">
			<a href="<?php echo network_site_url(); ?>about/">About PLOS Blogs</a>
		</li>
		<li id="menu-item-38077" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38077">
			<a href="<?php echo network_site_url(); ?>contact/">Contact</a>
		</li>
		<li class="right rss-feed-icon menu-item">
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
	</ul>
</div>

<!-- /mp-menu -->
<a href="#" id="trigger" class="menu-trigger">
	<i class="fa fa-navicon"></i>
</a>
<?php
/*
Reset the WP query so we don't step on Multisite's toes
*/
wp_reset_query();
restore_current_blog();
?>
