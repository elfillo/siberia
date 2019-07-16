<?php $bg = get_the_post_thumbnail_url();?>
<?php get_header(); ?>
    <div class="banner" style="background: url('<?php echo $bg?>')">
        <?php  the_title()?>
    </div>
    <section class="employee-cart">
        <div class="avatar">
            <img src="<?php echo get_template_directory_uri() ?>/img/employee.png" alt="employee">
        </div>
        <div class="about">
            <div class="text">Мы создали реаблитационный центр в Иркутске “Здоровая Сибирь” по тому что так было надо и я думаю что Егор сделает это текст более воодушевляющим совместно с Андрей Николаевичем. А так я могу написать лишь о том, что каждый хочет как он может, и тут должно было еще где то 7 строчек текста, который нужно будет согласовывать на стадии дизайна, чтобы у нас было минимум корректировок при создании сайта, так как на стадии дизайна это гораздо проще правится</div>
            <div class="position">Руководитель АНО “Здоровая Сибирь”
                Иванов Иван Иванович</div>
        </div>
    </section>
    <section class="employee-list">
    <?php
        $departments = query_posts('post_type=departments');
    ?>
    <?php foreach ($departments as $department):?>
        <div class="title title--white">Специалисты <?php echo $department->post_title?></div>
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
    <section class="post-list">
        <div class="title">Полезная информация для родителей и родственников </div>
        <?php if (have_posts()): query_posts('category_name=news'); while (have_posts()): the_post(); ?>
            <div class="post">
                <div class="image">
                    <?php the_post_thumbnail()?>
                </div>
                <div class="text">
                    <div class="title"><?php the_title()?></div>
                    <div class="content"><?php the_content()?></div>
                    <div class="bottom">
                        <div class="date"><?php the_date()?></div>
                        <div class="button">
                            <div class="btn">ПОДРОБНЕЕ</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif;?>
        <div class="show-more">
            <div class="btn">ПОКАЗАТЬ БОЛЬШЕ</div>
        </div>
    </section>
<?php get_footer(); ?>
