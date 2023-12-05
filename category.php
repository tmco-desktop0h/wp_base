<?php get_header();
//投稿カテゴリー一覧
	$cat_obj   = get_current_term();
	$cat_name      = $cat_obj->name;
	$cat_id        = $cat_obj->term_id;
	$cat_slug      = $cat_obj->slug;
	$cat_parent_id = $cat_obj->parent;
	
	if($cat_parent_id == 0 ){
		$my_name          = single_cat_title("", false);
		$cat_parent_slug  = $cat_slug;
	}else{
		$cat_parent_name  = get_category($cat_parent_id)->name;
		$cat_parent_slug  = get_category($cat_parent_id)->slug;
	};
    //ACFでタクソノミー関連を設定してる場合
	$acf_get_tax = 'category_'.$cat_id;
?>
<div id="<?php echo $cat_slug; ?>CatList" class="catListPage">
	<div id="mainCnt">
   
       	<div class="container">
        	<section id="cnts">
             <?php if (have_posts()) : ?>
				<div class="pageTitlebox">
					<p class="pageTitle en">News</p>
					<span class="jp"><?php single_term_title(); ?></span>
				</div>
				<!--パンくず-->
					<?php if(is_plugin_active( 'tmco-breadcrumbs/index.php' )){    
                        get_gi_breadcrumbs();
                    };?>
				<!--パンくず-->
                <div class="postListWrap">
                    <?php while (have_posts()) : the_post();?>

					<div class="postListBox">
						<time><?php the_time('Y.m.d');?></time>
						<div class="permaLinkWrap">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</div>
					</div>

                    <?php endwhile;?>
                </div>
				
				<?php wp_pagenavi();?>
				
				<?php if($cat_parent_name):?>
					<div class="btnWrap">
						<a href="<?php echo get_category_link( $cat_parent_id ); ?>" class="btn btnCenter arrow"><?php echo $cat_parent_name;?>一覧へ</a>
					</div>
				<?php endif;?>
 			<?php else:?>
				<p class="coming">記事がありません。</p>						

            <?php endif; wp_reset_query();?>
        	</section>
        </div>
    </div>
</div>
<?php get_footer();?>
