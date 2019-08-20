<?php
/*
Template Name: Dynamic Multisite Landing
*/
?>
<?php
// Add our custom loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'post_list_loop' );

function post_list_loop() {

	include 'inc/featured/featured.php';

	/* Instead of including all of the different blogs as static partial templates,
	we can redfine the section variables and dynamically generate the content based on
	the Advanced Custom Fields data */

	$homepage_section = "staff_blogs";
	$homepage_section_title = "Staff Blogs";
	include 'inc/dynamic-blog-section.php';

	$homepage_section = "biology_life_sciences";
	$homepage_section_title = "Biology Life Sciences";
	include 'inc/dynamic-blog-section.php';

	$homepage_section = "earth_and_environmental_sciences";
	$homepage_section_title = "Earth &amp; Environmental Sciences";
	include 'inc/dynamic-blog-section.php';

	$homepage_section = "multi-disciplinary_sciences";
	$homepage_section_title = "Multi-disciplinary Sciences";
	include 'inc/dynamic-blog-section.php';

	$homepage_section = "medicine_and_health";
	$homepage_section_title = "Medicine &amp; Health";
	include 'inc/dynamic-blog-section.php';

	$homepage_section = "research_analysis_and_scientific_policy";
	$homepage_section_title = "Research Analysis &amp; Scientific Policy";
	include 'inc/dynamic-blog-section.php';
}

remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
/** Add the welcome text section */
add_action( 'genesis_sidebar', 'add_blogs_homepage_widget_area' );
function add_blogs_homepage_widget_area() {
	unregister_sidebar( 'sidebar-alt' );
}
genesis();
?>

<pre class="hide-prod">multisite-landing.php Template Name: Multisite Landing </pre>
