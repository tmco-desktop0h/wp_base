<div class="tab-wrap type1">
    <div class="tab-area under20">
        <div class="tab-btn show">ALL</div>
        <div class="tab-btn">メディア</div>
    </div>
    <div class="tab-contents show">
    <?php
        $wp_query = new WP_Query();
        $param = array(
            'posts_per_page' => 4,
            'post_type' => 'post',
            'category_name' => 'news',
            'post_status' => 'publish',
            'order' => 'DESC',
            'orderby' => 'date'
        );
        $wp_query->query($param);

        if($wp_query->have_posts()):

    ?>

    <?php get_template_part( 'inc/news-post' ); ?>
    <?php else: ?>
            <p>記事はありません。</p>
    <?php endif; wp_reset_query();?>
    </div>
    
    <div class="tab-contents">
    <?php
        $wp_query = new WP_Query();
        $param = array(
            'posts_per_page' => 4,
            'post_type' => 'post',
            'category_name' => 'media',
            'post_status' => 'publish',
            'order' => 'DESC',
            'orderby' => 'date'
        );
        $wp_query->query($param);

        if($wp_query->have_posts()):

    ?>

    <?php get_template_part( 'inc/news-post' ); ?>
    <?php else: ?>
            <p>記事はありません。</p>
    <?php endif; wp_reset_query();?>
    </div>
</div>