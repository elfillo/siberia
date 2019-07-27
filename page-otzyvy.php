<?php get_header(); ?>
    <section class="textSection">
        <div class="title">С момента создания АНО “Здоровая Сибирь” мы смогли помочь многим людям, вот не большая часть людей которая согласилась написать об этом пару слов</div>
        <?php if (have_posts()): query_posts('category_name=reviews'); while (have_posts()): the_post(); ?>
            <div class="review_block">
                <div class="text"><?php the_content()?></div>
                <div class="name"><?php the_title()?></div>
            </div>
        <?php endwhile; endif;?>
<!--        <div class="review_form">-->
<!--            <textarea placeholder="Напишите свой отзыв о реаблитиационном центре в Иркутске “Здоровая Сибирь”"></textarea>-->
<!--            <input class="review_form--name" type="text" placeholder="Представьтесь для публикации">-->
<!--            <div class="bottom">-->
<!--                <div class="checkbox">-->
<!--                    <input type="checkbox" id="review_confirm">-->
<!--                    <label for="review_confirm">Я подтверждаю своё согласие на публикацию моего мнения</label>-->
<!--                </div>-->
<!--                <input class="review_form--submit" type="submit" value="оставить отзыв">-->
<!--            </div>-->
<!--        </div>-->
        <?php echo do_shortcode('[contact-form-7 id="87" title="Форма для отзывов"]')?>
    </section>
<?php get_footer(); ?>