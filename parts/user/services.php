<?php
    $services = query_posts('post_type=services');
?>
<section class="services">
    <div class="title title--white">
        Услуги реабилитационного центра в Иркутске “Здоровая Сибирь”
    </div>
    <div class="items">
        <?php foreach ($services as $service):?>
            <div class="item">
                <div class="icon"><?php echo get_the_post_thumbnail($service->ID)?></div>
                <div class="text">
                    <span><?php echo $service->post_title?></span>
                    <span><?php echo $service->post_excerpt?></span>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section>