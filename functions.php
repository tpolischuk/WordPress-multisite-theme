<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );

// ====================================================================================================================
// Table of Contents
// ====================================================================================================================
// Genesis Structure
// Head
// Scripts
// Header
// Navigation
// Search Forms
// Banner
// Images
// Widgets
// Post
// Author
// Comment Form
// ACF
// Footer
// Collections Blog
// Getting Co Authors to work with Multisite
// Deprecate?

// ====================================================================================================================
// Genesis Structure
// ====================================================================================================================
//* Remove Genesis Layout Settings
remove_theme_support( 'genesis-inpost-layouts' );
//* Remove Genesis menu link
remove_theme_support( 'genesis-admin-menu' );
//* Remove Genesis SEO Settings menu link
remove_theme_support( 'genesis-seo-settings-menu' );
 //* Unregister sidebar/content layout setting
genesis_unregister_layout( 'sidebar-content' );
//* Unregister content/sidebar/sidebar layout setting
genesis_unregister_layout( 'content-sidebar-sidebar' );
//* Unregister sidebar/sidebar/content layout setting
genesis_unregister_layout( 'sidebar-sidebar-content' );
//* Unregister sidebar/content/sidebar layout setting
genesis_unregister_layout( 'sidebar-content-sidebar' );
//* Unregister full-width content layout setting
genesis_unregister_layout( 'full-width-content' );

// Wrap whole site with mp-pusher
function plos_genesis_before() {
    $gtm_containers = '
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TP26BH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
    new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
    \'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,\'script\',\'dataLayer\',\'GTM-TP26BH\');</script>

    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MQQMGF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
    new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
    \'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,\'script\',\'dataLayer\',\'GTM-MQQMGF\');</script>
    <!-- End Google Tag Manager -->
    ';
    echo $gtm_containers;
    echo '<div class="container">';
    echo '<div class="mp-pusher" id="mp-pusher"><div class="close-btn"><i class="fa fa-1x fa-pull-left fa-border fa-times"></i></div>';
  	include 'inc/dynamic-global-navigation-menu-stage-MultiLevelPushMenu.php';
  	echo '<div class="scroller">';
};
function plos_genesis_before_footer() {
	echo '</div>'; // .container
}
function container_genesis_after() {
    echo '</div>'; // .mp-pusher
    echo '</div>'; // .scroller
};
add_action('genesis_before_footer', 'plos_genesis_before_footer');
add_action('genesis_before', 'plos_genesis_before');
add_action('genesis_after', 'container_genesis_after');

// ====================================================================================================================
// Head
// ====================================================================================================================

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

// Everyone Hates IE!
/** Conditional html element classes */
remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'child_do_doctype' );
function child_do_doctype() {
    ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
    <?php
}

//* Add multisite-landing class to the head if the page template is multisite-landing.php
add_filter( 'body_class', 'sp_body_class' );
function sp_body_class( $classes ) {

	if ( is_page_template( 'multisite-landing/multisite-landing.php' ) || is_page_template( 'multisite-landing/dynamic-multisite-landing.php' ) )
		$classes[] = 'multisite-landing';
		return $classes;

}

// ====================================================================================================================
// Scripts
// ====================================================================================================================

// Add css file
add_action( 'wp_enqueue_scripts', 'custom_load_custom_style_sheet' );
function custom_load_custom_style_sheet() {
	wp_enqueue_style( 'custom-stylesheet', CHILD_URL . '/assets/css/plos-collections.css', array(), PARENT_THEME_VERSION );
	wp_enqueue_script( 'fontdeck.js', CHILD_URL . '/lib/fontdeck.js', array(), '1.0.0', false );
	wp_enqueue_script( 'jquery.dotdotdot.js', CHILD_URL . '/assets/js/vendor/jquery.dotdotdot.js', array(), '0.1.0', true );
	wp_enqueue_script( 'modernizr.custom.js', CHILD_URL . '/lib/MultiLevelPushMenu/js/modernizr.custom.js', array(), '0.1.0', true );
	wp_enqueue_script( 'classie.js', CHILD_URL . '/lib/MultiLevelPushMenu/js/classie.js', array(), '0.1.0', true );
	wp_enqueue_script( 'mlpushmenu.js', CHILD_URL . '/lib/MultiLevelPushMenu/js/mlpushmenu.js', array(), '0.1.0', true );
	//Load PLoS Collections.js Last so everything loads first
	wp_enqueue_script( 'plos-collections.js', CHILD_URL . '/assets/js/plos-collections.js', array(), '0.1.0', true );
	// Conditionally load BS Tabs on FAQ Page
	if(is_archive('faq')) {
		wp_enqueue_script( 'booosttrap-on-faq-only', CHILD_URL . '/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js', array(), '0.1.0', true );
	}
}

// ====================================================================================================================
// Header
// ====================================================================================================================

// Custom Logo
add_filter( 'genesis_seo_title', 'plos_filter_genesis_seo_site_title', 10, 2 );

function plos_filter_genesis_seo_site_title(){
	$plos_blogs_logo_link = get_field('plos_blogs_logo_link', 'option');
	$plos_blogs_logo_image = get_field('plos_blogs_logo_image', 'option');
	?>
	<h1 id="title" itemscope="itemscope" itemtype="http://schema.org/Organization">
		<a class="logo" title="<?php echo $plos_blogs_logo_image['title']; ?>" href="<?php echo $plos_blogs_logo_link; ?>" itemprop="url">
			<img alt="<?php echo $plos_blogs_logo_image['alt']; ?>" title="<?php echo $plos_blogs_logo_image['title']; ?>" src="<?php echo $plos_blogs_logo_image['url']; ?>" itemprop="logo">
		</a>
	</h1>
	<?php

}

// Add date to description text
//* Modify the header URL - HTML5 Version
add_filter( 'genesis_seo_description', 'child_header_description', 10, 3 );
function child_header_description() {
   echo '<p id="description">';
   echo '<span class="bloginfo">';
   echo bloginfo('description');
   echo '</span>';
   echo '</p>';
}

// Add Header
remove_action('genesis_header', 'genesis_do_header');
remove_action('genesis_header', 'genesis_header_markup_open', 5);
remove_action('genesis_header', 'genesis_header_markup_close', 15);
function custom_header() {
	include 'inc/plos-header.php';
}
add_action('genesis_header', 'custom_header');

// ====================================================================================================================
// Navigation
// ====================================================================================================================

// Custom Navigation Menus
remove_theme_support ( 'genesis-menus' );
add_theme_support ( 'genesis-menus' , array (
	// 'primary' => 'Mobile Hamburger Menu' ,
	'local_nav' => 'Local Nav' ,
	'utility_nav' => 'Utility Nav' ,
	'global_nav' => 'Global Nav' ,
	'footer_left' => 'Footer Left',
	'footer_middle' => 'Footer Middle',
	'footer_right' => 'Footer Right'
) );

// ====================================================================================================================
// Search Forms
// ====================================================================================================================

//* Customize search form input box text
add_filter( 'genesis_search_text', 'plos_search_text' );
function plos_search_text( $text ) {
	return esc_attr( 'Search This Blog' );
}
function theme_menu_extras( $menu, $args ) {

	//* Change 'primary' to 'secondary' to add extras to the secondary navigation menu
	if ( 'local_nav' !== $args->theme_location )
		return $menu;

	ob_start();
	get_search_form();
	$search = ob_get_clean();
	$menu  .= '<li class="right search">' . $search . '</li>';

	return $menu;

}

// Add global search to global_desktop_menu
add_filter( 'wp_nav_menu_items', 'genesis_search_header_nav_menu', 10, 2 );
function genesis_search_header_nav_menu( $menu, stdClass $args ){
  if ( 'utility_nav' != $args->theme_location )
    return $menu;

        if( genesis_get_option( 'nav_extras' ) )
          return $menu;


		$menu .= '<li class="right menu-item">
					<form class="search-form" role="search" method="get" id="header_searchform" action="/">
						<div>
							<input type="text" value="" name="s" id="s" placeholder="Search PLOS Blogs"/>
							<input type="submit" id="searchsubmit" value="Search"/>
						</div>
					</form>
				</li>';

    return $menu;
}

// Add global search to mobile_hamburger_menu
add_filter( 'wp_nav_menu', 'theme_menu_extras_primary', 10, 2 );
function theme_menu_extras_primary( $menu, $args ) {

	//* Change 'primary' to 'secondary' to add extras to the secondary navigation menu
	if ( 'primary' !== $args->theme_location )
		return $menu;

	//* Uncomment this block to add a search form to the navigation menu

	ob_start();
	get_search_form();
	$search = ob_get_clean();
	$menu  .= '
	<div class="mobile-search-group">
		<div class="search mobile-search mobile-search-all-blogs">
			<form class="search-form" role="search" method="get" id="header_searchform" action="/">
				<div>
					<input placeholder="Search PLOS Blogs" type="text" value="" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="Search"/>
				</div>
			</form>
		</div>
	';
	ob_start();
	get_search_form();
	$search = ob_get_clean();
	$menu  .= '<div class="search mobile-search mobile-search-this-blog">' . $search . '</div></div>';


	//* Uncomment this block to add the date to the navigation menu

	// $menu .= '<li class="right date">' . date_i18n( get_option( 'date_format' ) ) . '</li>';

	return $menu;

}

/** Move Primary Nav Menu Above Header */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav' );

// Tertiary Menu
function genesis_do_local_nav() {
	wp_nav_menu( array(
		'theme_location' => 'local_nav',
		'container' => 'div',
		'container_class' => 'local-nav',
		'container_id' => 'local-nav',
		'menu_class'      => 'menu genesis-nav-menu'
	) );
}
add_action( 'genesis_inside_plos_banner', 'genesis_do_local_nav' );

// ====================================================================================================================
// Banner
// ====================================================================================================================

// Add PLOS Site Banner
function plos_after_header() {
	global $template;
	$template_file = basename((__FILE__).$template);

	if ( !is_page_template( 'multisite-landing/multisite-landing.php' ) && !is_page_template( 'multisite-landing/dynamic-multisite-landing.php' ) ) {
		include 'inc/plos-site-banner.php';
		include 'inc/plos-local-nav.php';
	}
}
add_action('genesis_after_header', 'plos_after_header');

// ====================================================================================================================
// Images
// ====================================================================================================================
// Old Sizes
// add_image_size('grid-thumbnail', 100, 100, TRUE);
// add_image_size('post-image', 600, 300, TRUE );
// add_image_size( 'Featured Image', 660, 320, true );
// add_image_size( 'medium', 100, 100, true );
// add_image_size( '70px_70px', 70,70, true );
// add_image_size( '550px_225px', 550,225, true );
// add_image_size( '300px_90px', 300,90, true );
// add_image_size( '215px_90px', 215,90, true );
// add_image_size( '463px_90px', 463,90, true );
// add_image_size( 'thumbnail', 60, 60, true );
// add_image_size( 'large', 330, 160, true );
// add_image_size( 'foobar', 200, 200, true );
//* Add new image sizes

add_image_size( '690x320', 690, 320, true );
add_image_size( '660x320', 660, 320, true );
add_image_size( '600x300', 600, 300, true );
add_image_size( '550x225', 550, 225, true );
add_image_size( '463x90', 463, 90, true );
add_image_size( '330x160', 330, 160, true );
add_image_size( '300x90', 300, 90, true );
add_image_size( '215x90', 215, 90, true );
add_image_size( '100x100', 100, 100, true );
add_image_size( '70x70', 70,70, true );
add_image_size( '60x60', 60, 60, true );

// ====================================================================================================================
// Widgets
// ====================================================================================================================

// Recent Post Widget
include 'inc/topics-recent-post.php';

// Add support for Blogs Homepage Widget
//* Register after post widget area
genesis_register_sidebar( array(
	'id'            => 'blogs-homepage-widget-area',
	'name'          => __( 'Blogs Homepage Widget Area', 'PLOS Multisite Genesis Theme' ),
	'description'   => __( 'This is a widget area for all blogs homepage', 'PLOS Multisite Genesis Theme' ),
) );

//* Unregister Genesis widgets
add_action( 'widgets_init', 'unregister_genesis_widgets', 20 );
function unregister_genesis_widgets() {
	// unregister_widget( 'Genesis_eNews_Updates' );
	unregister_widget( 'Genesis_Featured_Page' );
	unregister_widget( 'Genesis_Featured_Post' );
	unregister_widget( 'Genesis_Latest_Tweets_Widget' );
	unregister_widget( 'Genesis_Menu_Pages_Widget' );
	unregister_widget( 'Genesis_User_Profile_Widget' );
	unregister_widget( 'Genesis_Widget_Menu_Categories' );
}
//* Remove the header right widget area
unregister_sidebar( 'header-right' );

// Unregister a bunch of widgets
add_action( 'widgets_init', 'my_unregister_widgets' );

function my_unregister_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Widget_Pages');
	unregister_widget( 'WP_Widget_Calendar');
	unregister_widget( 'WP_Widget_Links');
	unregister_widget( 'WP_Widget_Meta');
	unregister_widget( 'WP_Widget_Search');
	unregister_widget( 'WP_Widget_Text');
	unregister_widget( 'WP_Widget_Categories');
	unregister_widget( 'WP_Widget_Recent_Posts');
	unregister_widget( 'WP_Widget_Recent_Comments');
	unregister_widget( 'WP_Widget_RSS');
	unregister_widget( 'WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
}

// register Featured_Collection_Widget widget
function register_featured_collection_widget() {
    register_widget( 'Repeater_Widget' );
    register_widget( 'Archive_Widget_Extra' );
    register_Widget( 'Exact_Target_Widget' );
}
add_action( 'widgets_init', 'register_featured_collection_widget' );

include 'inc/archive-widget-extra.php';
include 'inc/repeater-widget.php';
include 'inc/featured-collection-widget.php';
include 'inc/exact-target-widget.php';


// ====================================================================================================================
// Post
// ====================================================================================================================

//* Customize the post info function
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {
if ( !is_page() ) {
	$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
	return $post_info;
}}

/* Code to Display Featured Image on top of the post */
add_action( 'genesis_post_title_text', 'featured_post_image', 8 );
function featured_post_image() {
  if ( ! is_singular( 'post' ) )  return;
	the_post_thumbnail('post-image');
}


//* Modify the length of post excerpts
add_filter( 'excerpt_length', 'sp_excerpt_length' );
function sp_excerpt_length( $length ) {
	return 35; // pull first 35 words
}

//* Modify the Genesis content limit read more link
/** Customize Read More Text */
add_filter( 'excerpt_more', 'child_read_more_link' );
add_filter( 'get_the_content_more_link', 'child_read_more_link' );
add_filter( 'the_content_more_link', 'child_read_more_link' );
function child_read_more_link() {

// return '<a href="' . get_permalink() . '" rel="nofollow">CUSTOMIZE YOUR TEXT HERE</a>';
return '';
}

// Block h1 from being used in text editor
function wpa_45815($arr){
    $arr['block_formats'] = 'Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpa_45815');

// Add contextual help link for image cropping
// function plos_admin_enqueue($hook) {
//     if ( 'post.php' != $hook ) {
//         return;
//     }
//     wp_enqueue_script( 'plos-collections-admin.js', CHILD_URL . '/assets/js/plos-collections-admin.js', array(), '0.1.0', true );
// }
// add_action( 'admin_enqueue_scripts', 'plos_admin_enqueue' );


// Don't Display "Featured Image for Genesis" on post and faqs and any other post types.
if (has_post_thumbnail()) {
	# code...
}
add_filter( 'display_featured_image_genesis_skipped_posttypes', 'rgc_skip_post_types' );
function rgc_skip_post_types( $post_types ) {
    $post_types[] = 'post';
    $post_types[] = 'faq';

    return $post_types;
}

// ====================================================================================================================
// Author
// ====================================================================================================================

// remove category from the_archive_title();
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

// Add extra social links to author page
function extra_contact_info($contactmethods) {

  unset($contactmethods['aim']);

  unset($contactmethods['yim']);

  unset($contactmethods['jabber']);

  $contactmethods['facebook'] = 'Facebook';

  $contactmethods['twitter'] = 'Twitter';

  $contactmethods['linkedin'] = 'LinkedIn';

  $contactmethods['googleplus'] = 'Google+';

  return $contactmethods;

}

add_filter('user_contactmethods', 'extra_contact_info');

// ====================================================================================================================
// Comment Form
// ====================================================================================================================

//***Customize The Comment Form**/
add_filter( 'comment_form_defaults', 'plos_custom_comment_form' );
function plos_custom_comment_form($fields) {
    $fields['comment_notes_before'] = ''; //Removes Email Privacy Notice
    $fields['title_reply'] = __( 'Leave a Comment', 'genesis_plos_theme' ); //Changes The Form Headline
    $fields['label_submit'] = __( 'Post', 'genesis_plos_theme' ); //Changes The Submit Button Text
    $fields['comment_date'] = __( 'Postfoo', 'genesis_plos_theme' ); //Changes The Submit Button Text
    return $fields;
}

// ====================================================================================================================
// ACF
// ====================================================================================================================

// Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	// acf_add_options_sub_page('General');
	// acf_add_options_sub_page('Header');
	// acf_add_options_sub_page('Footer');
}

if( function_exists('acf_add_local_field_group') ):


//This is the field group for the PLOS Banner
//ACF is amazing.
acf_add_local_field_group(array (
	'key' => 'group_551db326acf90',
	'title' => 'PLOS Banner',
	'fields' => array (
		array (
			'key' => 'field_551db33192d4e',
			'label' => 'PLOS Banner Logo',
			'name' => 'plos_banner_logo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'post-image',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_5579d1bcdb9ed',
			'label' => 'PLOS Banner',
			'name' => 'plos_banner_banner',
			'type' => 'image',
			'instructions' => 'For best results use an image that is 960px wide and 100px tall.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_558320ebb859e',
			'label' => 'PLOS Banner Text',
			'name' => 'plos_banner_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_564bc45e11325',
			'label' => 'PLOS Banner Text Color',
			'name' => 'plos_banner_text_color',
			'type' => 'radio',
			'instructions' => 'Select the color of the banner text.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'White' => 'White',
				'Black' => 'Black',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'custom_fields',
		4 => 'discussion',
		5 => 'comments',
		6 => 'revisions',
		7 => 'slug',
		8 => 'author',
		9 => 'format',
		10 => 'page_attributes',
		11 => 'featured_image',
		12 => 'categories',
		13 => 'tags',
		14 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;

// ====================================================================================================================
// Footer
// ====================================================================================================================

//* Customize the credits. This is overrided by footer.php
remove_action( 'genesis_footer', 'genesis_do_footer' );

// Add PLOS Footer
function plos_footer() {
	include 'inc/plos-footer.php';
}
add_action('genesis_footer', 'plos_footer');


// ====================================================================================================================
// Collections Blog
// ====================================================================================================================
global $blog_id;

if ($blog_id == 84) { // collections blog is 81 on local
?>
<?php
	function unregister_taxonomy_collections(){
	    register_taxonomy('post_tag', array());
	}
	add_action('init', 'unregister_taxonomy_collections');

	// Remove menu
	function remove_menus(){
	    remove_menu_page('edit-tags.php?taxonomy=post_tag'); // Post tags
	}

	add_action( 'admin_menu', 'remove_menus' );
?>
<?php
} else {
	// do absolutely nothing.
}

/**
 * Integrated the coauthors plus plugin and have since added modifications
 * especially since the plugin developer is not providing multisite support
 */
// Disables guest authors feature, causing usage issues AND not multisite compatible

  add_filter('coauthors_guest_authors_enabled', '__return_false');



/**
 * Begin custom functions for displaying authors and coauthors (when enabled)
 * Formerly included extra wp_includes code, now just a couple functions
 */

// Begin supplementary functions

if (!( is_admin() or function_exists('is_plugin_active') )) { // load function in non-admin

    function is_plugin_active($plugin) {
        return in_array($plugin, (array) get_option('active_plugins', array())) || is_plugin_active_for_network($plugin);
    }

}

if (!( is_admin() or function_exists('is_plugin_active_for_network') )) { // load function in non-admin

    function is_plugin_active_for_network($plugin) {
        if (!is_multisite())
            return false;

        $plugins = get_site_option('active_sitewide_plugins');
        if (isset($plugins[$plugin]))
            return true;

        return false;
    }

}

// ====================================================================================================================
// Getting Co Authors to work with Multisite
// ====================================================================================================================

$plugin = 'co-authors-plus/co-authors-plus.php';
$is_active = !is_admin() ? ( file_exists(ABSPATH . 'wp-content/plugins/' . $plugin) and
        ( is_plugin_active($plugin) )) : 0;
if ($is_active == '1') :

    if (!function_exists('plos_posted_coauthors')) :

        /**
         * Prints HTML with meta information for the current post—date/time and author.
         */
        function plos_posted_coauthors() {
            $i = new CoAuthorsIterator();

            echo "<span class=\"meta-prep-author meta-prep\">";
            // print $i->count() == 1 ? 'Author: ' : 'Authors: '; // if singular/plural wanted
            // echo "By ";
            $i->iterate();
            echo '<span class="author vcard"><a class="url fn n" href="'
            . get_author_posts_url(get_the_author_meta('ID'))
            . '" title="'
            . sprintf(esc_attr__('View all posts by %s', 'plos'), get_the_author())
            . '">';
            the_author();
            echo "</a></span>";
            while ($i->iterate()) {
                print $i->is_last() ? ' and ' : ', ';
                echo '<span class="author vcard"><a class="url fn n" href="'
                . get_author_posts_url(get_the_author_meta('ID'))
                . '" title="'
                . sprintf(esc_attr__('View all posts by %s', 'plos'), get_the_author())
                . '">';
                the_author();
                echo "</a></span>";
            }

            // echo "<br />Posted: <span class=\"entry-date\">" . get_the_date() . "</span>";
            // echo "</span>"; // closes meta-prep-author meta-prep span
        }

    endif;

endif;

if (!function_exists('plos_posted_in')) :

    /**
     * Prints HTML with meta information for the current post (category, tags and permalink).
     *
     */
    function plos_posted_in() {
        // Retrieves tag list of current post, separated by commas.
        $tag_list = get_the_tag_list('', ', ');
        if ($tag_list) {
            $posted_in = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'plos');
        } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
            $posted_in = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'plos');
        } else {
            $posted_in = __('Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'plos');
        }
        printf(
                $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
        );
    }

endif;

function wp_get_multisites($user = 1, $get_unwanted = false, $echo_it = true, $list_it = true, $ident = false, $class = "") {
    //function to return a list of sites of all blogs on WP3 multisite. by yonatan reinberg/social ink - http://social-ink.net
    $output = '';
    $myid = '';
    if ($list_it) {
        $output .= '<ul>';
    }
    $allsites = get_blogs_of_user($user, $get_unwanted);
    foreach ($allsites AS $blog) {
        if ($ident) {
            $myid = 'bloglist_' . $blog->blogname;
        }
        if ($list_it) {
            $output .= '<li><a class="' . $class . '" id="' . $myid . '" href="' . $blog->path . '">' . $blog->blogname . '</a></li>';
        } else {
            $output .= '<a class="' . $class . '" id="' . $myid . '" href="' . $blog->path . '">' . $blog->blogname . '</a>';
        }
    }
    if ($list_it) {
        $output .= '</ul>';
    }
    if ($echo_it) {
        echo $output;
    } else {
        return $output;
    }
}

function plos_posted_coauthors_ids() {
    //Create an empty array to store the author ID's
    $coauthor_ids = array();
    $i = new CoAuthorsIterator();
    $i->iterate();

    //Throw the initial author into the array
    array_push($coauthor_ids, get_the_author_meta('ID'));
    while ($i->iterate()) {
        //Loop through the rest of the ids and add them to the array
        array_push($coauthor_ids, get_the_author_meta('ID'));
    }
    return $coauthor_ids;
}

// ====================================================================================================================
// Deprecate?
// ====================================================================================================================


// Add support for custom background
add_theme_support( 'custom-background' );

add_filter( 'wp_nav_menu_items', 'theme_menu_extras', 10, 2 );

//* Enable the superfish script
add_filter( 'genesis_superfish_enabled', '__return_true' );
