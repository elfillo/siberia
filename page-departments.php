<?php $bg = get_the_post_thumbnail_url();?>
<?php get_header(); ?>
    <div class="banner" style="background: url('<?php echo $bg?>')">
        Подробнее о реабилитации в Иркутске
    </div>
    <section class="filials">
        <div class="title">Выберите реабилитационный центр в Иркутске “Здоровая Сибирь”</div>
        <div class="items">
            <?php $departments = query_posts('post_type=departments'); ?>
            <?php foreach ($departments as $department):?>
                <div class="filial">
                    <div class="img">
<!--                        <img src="--><?php //echo get_template_directory_uri() ?><!--/img/filial.png" alt="filial">-->
                        <?php echo get_the_post_thumbnail($department->ID)?>
                    </div>
                    <div class="title"><?php echo $department->post_title?></div>
                    <p><?php echo $department->post_excerpt?></p>
                    <div class="button">
                        <a href="<?php echo get_post_permalink($department->ID)?>" class="btn">ПОДРОБНЕЕ</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </section>
<?php get_footer(); ?>
