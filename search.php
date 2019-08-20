<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header(); ?>

        <section id="primary" class="site-content">
                <div id="content" role="main">

                <?php if ( have_posts() ) : ?>

                        <header class="page-header">
                                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        </header>

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                                <?php switch_to_blog($post->blog_id); ?>
                                <?php $check_blog_id = get_current_blog_id(); ?>
                                <?php if (($check_blog_id != 0) && ($check_blog_id != 1)) { ?>
                                <?php include 'inc/post-article-excerpt.php';  ?>
                                <?php } ?>
                                <?php restore_current_blog(); ?>
                        <?php endwhile; ?>

                        <?php include 'inc/pagination.php'; ?>

                <?php else : ?>

                        <article id="post-0" class="post no-results not-found">
                                <header class="entry-header">
                                        <h1 class="entry-title">No Results Found</h1>
                                </header>

                                <div class="entry-content">
                                        <p>Sorry, no results were found that matched your search.</p>
                                </div><!-- .entry-content -->
                        </article><!-- #post-0 -->

                <?php endif; ?>

                </div><!-- #content -->
        </section><!-- #primary -->
<?php get_footer(); ?>
