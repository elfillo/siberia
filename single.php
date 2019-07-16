<?php
  $post = $wp_query->post;
 
  if (is_singular('employee')) { //slug  категории
      include(TEMPLATEPATH.'/single-info.php');
  } else {
      include(TEMPLATEPATH.'/single-default.php');
  }
?>