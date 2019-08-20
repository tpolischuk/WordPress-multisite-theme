<?php
  /* Here we dynamically populate the ID for the secion and the title bar with the
  content from dynamic-multisite-landing.php */
?>
<section id="<?php echo $homepage_section ?>" class="clearfix landing-excerpts">
  <header class="section-header">
    <h1><?php echo $homepage_section_title ?></h1>
  </header>

  <div class="post-excerpts">

<?php

/* The beginning of the nested ACF Repeater loop. It's kind of complicated, but not 
too bad when you start moving through */

if( get_field($homepage_section) )
{
  while( has_sub_field($homepage_section) )
  {
    $blog_rows_raw = get_sub_field('blog_row');

    $blog_rows_array = array();

    /* First, we grab the blog_rows and create a new array of arrays, because PHP loves
    arrays */

    foreach ($blog_rows_raw as $blog_row_raw) {
      array_push($blog_rows_array, $blog_row_raw);
    }

    /* Now, we need to dynamically generate the markup for the rows to automatically size
    the columns based on the number of items in the row */

    if (sizeof($blog_rows_array) === 2) {
      echo '<div class="row col-2">';
    }
    if (sizeof($blog_rows_array) === 3) {
      echo '<div class="row col-3">';
    }
    if (sizeof($blog_rows_array) === 4) {
      echo '<div class="row col-4">';
    }

    /*Let's loop through the ACF data, and include the correct template based on
    the number of items */

    foreach ($blog_rows_array as $blog_rows) {

      if (sizeof($blog_rows_array) === 2) {
        ?> <div class="row col-2"> <?php
          include 'sites/blog-post-excerpt-2col.php';
        ?></div><?php
      };

      if (sizeof($blog_rows_array) === 3) {
        ?> <div class="row col-3"> <?php
          include 'sites/blog-post-excerpt-3col.php';
        ?> </div> <?php
      };

      if (sizeof($blog_rows_array) === 4) {
        ?> <div class="row col-4"> <?php
          include 'sites/blog-post-excerpt-4col.php';
        ?> </div> <?php
      };
    } // End of the auto column loop
    ?></div> <?php
  }
}
?>

</div>

</section>
