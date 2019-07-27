<?php
    $bg = get_the_post_thumbnail_url();
    $post_id = get_the_ID();
?>
<?php get_header(); ?>
    <div class="banner" style="background: url('<?php echo $bg?>')">
        Реабилитационный центр “Здоровая Сибирь”
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
    <section class="employee-list">
        <?php
        $employees =  get_employee(get_the_ID());
        ?>
            <div class="title title--white">Специалисты</div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($employees as $employee):?>
                    <div class="swiper-slide">
                        <a class="item" href="<?php echo get_permalink($employee->ID)?>">
                            <div class="avatar"><?php echo get_the_post_thumbnail($employee->ID)?></div>
                            <div class="name"><?php echo $employee->post_title?></div>
                            <div class="position"><?php echo get_post_meta($employee->ID, 'employee_position', true)?></div>
                        </a>
                    </div>
                <?php endforeach;?>
                <!-- Add Arrows -->
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <section class="textSection">
        <?php
            $program = get_post_meta($post_id, 'depart_program', true);
            echo $program;
        ?>
    </section>
    <?php get_template_part('parts/user/services'); ?>
    <?php get_template_part('parts/user/post-list'); ?>
<?php get_footer(); ?>