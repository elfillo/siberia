<section class="post-list">
    <div class="title">Новостри некоммерческой организации “Здоровая Сибирь”</div>
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