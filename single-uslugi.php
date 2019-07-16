<?php $bg = get_the_post_thumbnail_url();?>
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
        $departments = query_posts('post_type=departments');
        ?>
        <?php foreach ($departments as $department):?>
            <div class="title title--white">Специалисты <?php echo $department->post_title?></div>
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
            </div>
        </div>
            <div class="items">
                <?php
                $employees = get_employee($department->ID);
                ?>

                <?php foreach ($employees as $employee):?>
                    <a class="item" href="<?php echo get_permalink($employee->ID)?>">
                        <div class="avatar"><?php echo get_the_post_thumbnail($employee->ID)?></div>
                        <div class="name"><?php echo $employee->post_title?></div>
                        <div class="position"><?php echo get_post_meta($employee->ID, 'employee_position', true)?></div>
                    </a>
                <?php endforeach;?>
            </div>
        <?php endforeach;?>
    </section>
    <?php get_template_part('parts/user/services'); ?>
    <?php get_template_part('parts/user/post-list'); ?>
<?php get_footer(); ?>
