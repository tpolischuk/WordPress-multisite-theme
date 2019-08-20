<?php
/*
Switch to the main blog so that the menu works on sub blogs
*/
switch_to_blog(1);
?>
<nav id="mp-menu" class="mp-menu">
	<div class="mp-level">
		<h2>PLOS Blogs</h2>
		<ul>
			<li class="icon icon-arrow-left">
				<a href="#">Staff Blogs</a>
				<div class="mp-level">
					<a class="mp-back" href="#">back</a>
					<h2>Staff Blogs</h2>
					<ul>
						<?php
						wp_nav_menu( array(
    					'menu' => 'Staff Blogs'
						) );
						?>
					</ul>
				</div>
			</li>
			<li class="icon icon-arrow-left">
				<a href="#">Blogs by Topic</a>
				<div class="mp-level">
					<a class="mp-back" href="#">back</a>
					<h2>Blogs by Topic</h2>
					<ul>
						<li class="icon icon-arrow-left">
							<a href="http://#">Biology  &amp; Life Sciences</a>
							<div class="mp-level">
								<h2>Biology  &amp; Life Sciences</h2>
								<a class="mp-back" href="#">back</a>
								<ul>
									<?php
									wp_nav_menu( array(
										'menu' => 'Biology & Life Sciences'
									) );
									?>
								</ul>
							</div>
						</li>
						<li class="icon icon-arrow-left">
							<a href="#">Earth &amp; Environmental Sciences</a>
							<div class="mp-level">
								<a class="mp-back" href="#">back</a>
								<h2>Earth &amp; Environmental Sciences</h2>
								<ul>
									<?php
									wp_nav_menu( array(
										'menu' => 'Earth & Environmental Sciences'
									) );
									?>
								</ul>
							</div>
						</li>
						<li class="icon icon-arrow-left">
							<a href="#">Multi-disciplinary Sciences</a>
							<div class="mp-level">
								<a class="mp-back" href="#">back</a>
								<h2>Multi-disciplinary Sciences</h2>
								<ul>
									<?php
									wp_nav_menu( array(
										'menu' => 'Multi-Disciplinary Sciences'
									) );
									?>
								</ul>
							</div>
						</li>
						<li class="icon icon-arrow-left">
							<a href="#">Medicine &amp; Health</a>
							<div class="mp-level">
								<a class="mp-back" href="#">back</a>
								<h2>Medicine &amp; Health</h2>
								<ul>
									<?php
									wp_nav_menu( array(
										'menu' => 'Medicine & Health'
									) );
									?>
								</ul>
							</div>
						</li>
						<li class="icon icon-arrow-left">
							<a href="#">Research Analysis &amp; Scientific Policy</a>
							<div class="mp-level">
								<a class="mp-back" href="#">back</a>
								<h2>Research Analysis &amp; Scientific Policy</h2>
								<ul>
									<?php
									wp_nav_menu( array(
										'menu' => 'Research Analysis & Scientific Policy'
									) );
									?>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="<?php echo network_site_url(); ?>about/">About PLOS Blogs</a>
			</li>
			<li>
				<a href="<?php echo network_site_url(); ?>contact/">Contact</a>
			</li>
			<li>
				<form class="search-form" id="mobile-search-form" method="get" action="/">
					<input id="mobile-search-input" type="text" name="s" id="s" placeholder="Search PLOS Blogs" />
					<!-- Because Relevannsi doesn't let you implicitly include all blogs, we do a hacky loop to include all (100) blog IDs -->
					<input type="hidden" name="searchblogs" value=" <?php $count = 1; while ($count<=100) {echo $count . ','; $count++; }?> "/>
				</form>
			</li>
		</ul>
	</div>
</nav>
<?php
/*
Reset the WP query so we don't step on Multisite's toes
*/
wp_reset_query();
restore_current_blog();
?>
