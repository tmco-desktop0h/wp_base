<div class="news-postListWrap">
    <?php while($wp_query->have_posts()) : $wp_query->the_post();?>

        <div class="postBox">
            <div class="time-cat_item">
                <time class="medium"><?php the_time('Y.m.d');?></time>
                <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        $category = $categories[0];
                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-name bold">' . esc_html($category->cat_name) . '</a>';
                    }
                ?>
            </div>
            <a href="<?php the_permalink();?>" class="permaLinkWrap">
                <p class="title medium"><?php the_title();?></p>
                <div class="thumbnail br4">
                <?php if( has_post_thumbnail()):?>
                    <?php the_post_thumbnail('medium_large');?>
                <?php else:?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="<?php the_title();?>">
                <?php endif;?>
                </div>
            </a>
        </div>
    <?php endwhile;?>
</div>