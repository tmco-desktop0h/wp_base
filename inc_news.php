<?php
	$wp_query = new WP_Query();
	$param = array(
		'posts_per_page' => 5,
		'post_type' => 'post',
		'category_name' => 'news',
		'post_status' => 'publish',
		'order' => 'DESC',
        'orderby' => 'date'
	);
	$wp_query->query($param);

	if($wp_query->have_posts()):
	
?>

            <div class="postListWrap">
            <?php while($wp_query->have_posts()) : $wp_query->the_post();?>
	
                <div class="postBox">
					<div class="newsbox">
						<div class="newstime_box">
							<time><?php the_time('Y/m/d');?></time>
						</div>
						<div class="newscategory_box">
							<?php
								$cat = get_the_category();
								$cat = $cat[0];
							?>
							<p class="category-name"><?php echo $cat->cat_name; ?></p>
						</div>
					</div>
                    <div class="permaLinkWrap">
                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </div>
                </div>
                
            <?php endwhile;?>

            </div>

            <?php endif; wp_reset_query();?>
