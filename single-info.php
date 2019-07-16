<?php get_header(); ?>
    <section class="employee-cart">
        <div class="avatar">
            <?php the_post_thumbnail()?>
        </div>
        <div class="about">
            <div class="text"><?php
                if ( have_posts() ){
                    while ( have_posts() ){ the_post();
                        echo the_content();
                    }
                } else {
                    echo wpautop( 'Постов для вывода не найдено.' );
                }

                ?></div>
            <div class="position">
                <?php $id = get_the_ID(); echo get_post_meta($id, 'employee_position', true)?>
                <?php the_title()?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
