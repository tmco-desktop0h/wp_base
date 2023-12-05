<?php get_header(); 
	$cat = get_the_category();
	$cat = $cat[0];
	
	$cat_id = $cat->cat_ID;
	$cat_name = $cat->cat_name;
 	$cat_nicename = $cat->category_nicename;
	$cat_description = $cat->category_description;
	
	$cat_parent_id = $cat->category_parent;
	$cat_parent_name = get_category($cat_parent_id);
	$cat_parent_name = $cat_parent_name->name;

	$post_cat_id = 'category_'.$cat_id;
?>

	<div id="singlePage" class="postPage">
		<div id="mainCnt">			
			<div class="container">
				<section id="cnts">
				<?php if( have_posts() ): while ( have_posts() ) : the_post();?>
                    
					<div class="pageTitlebox">
						<p class="pageTitle en">News</p>
						<span class="jp"><?php the_title();?></span>
					</div>
					<!--パンくず-->
					<?php if(is_plugin_active( 'tmco-breadcrumbs/index.php' )){    
                        get_gi_breadcrumbs();
                    };?>
					<!--パンくず-->
					<time><?php the_time('Y.m.d');?></time>
					<div id="postCnt">
						
						<?php the_content();?>
						
					</div>
					<div class="btnWrap">
						<a href="<?php echo get_category_link( $cat_id ); ?>" class="btn arrow btnCenter"><?php echo $cat_name;?>一覧へ</a>
					</div>
				<?php endwhile; endif;?>
					
				</section>
			</div>
		</div>
	</div>
<?php get_footer();?>