<?php
  $post = $wp_query->post;
 
    if (is_singular('employee')) {
      include(TEMPLATEPATH.'/single-info.php');
    } else {
      include(TEMPLATEPATH.'/single-default.php');
    }
    if (is_singular('departments')) {
        include(TEMPLATEPATH.'/single-departments.php');
    } else {
        include(TEMPLATEPATH.'/single-default.php');
    }
?>