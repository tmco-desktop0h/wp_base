<?php
	$cat_id = get_query_var('cat');
	$wp_query = new WP_Query();
	$param = array(
		'posts_per_page' => 6,
		'post_type' => 'blog',
		'post_status' => 'publish',
		'order' => 'DESC',
        'orderby' => 'date'
	);
	$wp_query->query($param);
	if($wp_query->have_posts()):
	$term = get_term('2','tax_news');
	$name = $term -> name;
?>

			<div class="postListWrap">
			<?php while($wp_query->have_posts()) : $wp_query->the_post();?>

				<div class="postBox">
					<div class="thumbnail">
					<?php if( has_post_thumbnail()):?>
                    
						<a href="<?php the_permalink();?>">
							<?php the_post_thumbnail('medium_large');?>
						</a>
					<?php else:?>

						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="">
						</a>
					<?php endif;?>

					</div>
					<div class="category_txtbox">
						<div class="category_wrap">
							<div class="category_wrap_time">
								<time><?php the_time('Y.m.d');?></time>
							</div>
							<div class="category_wrap_name">
								<?php $post_id = get_the_ID(); // カスタム投稿のIDを取得

									// カスタム投稿のカテゴリー情報を取得
									$categories = get_the_terms($post_id, 'blog_cat');

									if ($categories && !is_wp_error($categories)) {
										$category_names = array();
										foreach ($categories as $category) {
											$category_names[] = $category->name;
										}

										$category_names_str = implode(', ', $category_names); // カテゴリー名をコンマで結合
										echo $category_names_str;
									}
								?>
							</div>
						</div>
						<div class="permalinkWrap">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</div>
					</div>
                
				</div>
                
			<?php endwhile;?>

			</div>

			<?php endif; wp_reset_query();?>
