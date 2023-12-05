<?php
    get_header();
    $post_obj = get_post($post->ID);
    $page_name = $post_obj->post_name;
    $page_id = $post_obj->ID;
 	
?>

	<div id="<?php echo esc_html($page_name);?>Page" class="postPage">
		<div id="mainCnt">			
			<div class="container">
				<section id="cnts">
				<?php if(have_posts()): while ( have_posts() ) : the_post();?>
                    <div class="pageTitlebox">
						<?php 
							 $slug = get_post( get_the_ID() )->post_name;
						?>
						<p class="pageTitle en"><?php echo rawurldecode($slug); ?></p>
						<span class="jp"><?php the_title();?></span>
					</div>
					<!--パンくず-->
					<?php if(is_plugin_active( 'tmco-breadcrumbs/index.php' )){    
                        get_gi_breadcrumbs();
                    };?>
					<!--パンくず-->
					<div id="postCnt">
						
						<?php the_content();?>
						
					</div>
				<?php endwhile; endif;?>
					
				</section>
			</div>
		</div>
	</div>
<?php get_footer();?>