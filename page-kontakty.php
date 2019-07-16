<?php get_header(); ?>
    <section class="textSection">
        <?php
        if ( have_posts() ){
            while ( have_posts() ){ the_post();
                echo the_content();
            }
        } else {
            echo wpautop( 'Постов для вывода не найдено.' );
        }
        ?>
    </section>
<?php get_footer(); ?>
