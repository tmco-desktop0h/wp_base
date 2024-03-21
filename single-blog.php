<?php get_header(); 
    $post = get_post_type_object($post_type);
	$terms = get_the_terms($post->ID,'blog_cat');
	
    foreach ( $terms as $term ) {
        
        $cat_id = $term->term_id; //タームID
        $cat_name = $term->name; //ターム名
        $cat_slug = $term->slug; //タームスラッグ
        $cat_description = $term->category_description; //説明文
        $cat_parent_id = $term->parent; //親ターム・タクソノミー
        $post_cat_id = 'category_'.$cat_id;
        
        // 投稿タイプ（カスタム投稿タイプ）の情報を取得
        $post_type = get_post_type($post);
        $post_type_info = get_post_type_object($post_type);
    }
?>

<div class="pageTitlebox">
    <div class="container">
        <p class="en roboto"><?php echo $post_type; ?></p>
        <span class="pageTitle"><?php echo $post->labels->name; ?></span>
    </div>
</div>
<div id="singlePage" class="postPage">
    <div id="mainCnt">
        <section id="cnts">
            <div class="container">
            <?php if( have_posts() ): while ( have_posts() ) : the_post();?>
                <div class="schedule-post postBox">
                    <div class="post-column2Grid">
                        <div class="content">
                            <div class="singlePost-labelWrap">
                                <?php
                                $terms = get_the_terms($post->ID, 'staff_cat');
                                if ($terms && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<a href="' . esc_url(get_term_link($term)) . '" class="category-label"><span>' . esc_html($term->name) . '</span></a>';
                                    }
                                }
                                ?>
                                <time><?php the_time('Y.m.d');?></time>
                            </div>
                            <h2 class="titleh2 mb0"><?php the_field('staff-singlePost-title'); ?></h2>
                        </div>
                        <div class="content">
                            <!--アイキャッチ画像-->
                            <div class="thumbnail br8">
                            <?php if( has_post_thumbnail()):?>
                                <?php the_post_thumbnail('medium_large');?>
                            <?php else:?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="<?php the_title();?>" decoding="async" loading="lazy">
                            <?php endif;?>
                            </div>
                            <!--アイキャッチ画像 終-->
                        </div>
                    </div>
                </div>
            <?php endwhile; endif;?>
            </div>
            
            <div class="btnWrap">
                <a href="<?php echo esc_html(get_post_type_archive_link( $post_type )); ?>" class="btn arrow btnCenter">一覧を見る</a>
            </div>
        </section>
    </div>
</div>
<?php get_footer();?>

