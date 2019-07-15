<?php
  $post = $wp_query->post;
 
  if (in_category('category_name')) { //slug  категории
      include(TEMPLATEPATH.'/single-category_name.php');
  } else {
      include(TEMPLATEPATH.'/single-default.php');
  }
?>