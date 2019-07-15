<?php
$bg = get_the_post_thumbnail_url();
?>
<?php get_header(); ?>
    <div class="banner" style="background: url('<?php echo $bg?>')">
        Добро пожаловать на официальный сайт <br> реабилитационного центра “Здоровая Сибирь”
    </div>
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
    <?php get_template_part('parts/user/services'); ?>
    <?php get_template_part('parts/user/post-list'); ?>
<?php get_footer(); ?>
