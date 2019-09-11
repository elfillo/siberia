<section class="post-list">
    <div class="title">Новостри некоммерческой организации “Здоровая Сибирь”</div>
    <?php if (have_posts()): query_posts('category_name=news'); while (have_posts()): the_post(); ?>
    <div class="post">
        <div class="image">
            <?php the_post_thumbnail()?>
        </div>
        <div class="text">
            <div class="title"><?php the_title()?></div>
            <div class="content"><?php the_excerpt()?></div>
            <div class="bottom">
                <div class="date"><?php the_date()?></div>
                <div class="button">
                    <div class="btn">ПОДРОБНЕЕ</div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; endif;?>
    <!--<div class="show-more">
        <div class="btn">ПОКАЗАТЬ БОЛЬШЕ</div>
    </div>
    <?php /*if (  $wp_query->max_num_pages > 1 ) : */?>
        <script>
            var ajaxurl = '<?php /*echo site_url() */?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php /*echo serialize($wp_query->query_vars); */?>';
            var current_page = <?php /*echo (get_query_var('paged')) ? get_query_var('paged') : 1; */?>;
            var max_pages = '<?php /*echo $wp_query->max_num_pages; */?>';
        </script>
        <div id="true_loadmore">Загрузить ещё</div>
    --><?php /*endif; */?>
</section>