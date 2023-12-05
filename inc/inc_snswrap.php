<?php if(have_rows('link_wrap','option')): ?>
<ul class="socials_networking">
	<?php while(have_rows('link_wrap','option')): the_row();
	$instagram_url = get_sub_field('instagram_url');
	$facebook_url = get_sub_field('facebook_url');
	$youtube_url = get_sub_field('youtube_url');
	$line_url = get_sub_field('line_url'); ?>
    
    <?php if (!empty($line_url)) : ?>
	<li>
		<a href="<?php echo $line_url;?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-twitter.svg" alt="line" width="21" height="20" decoding="async" loading="lazy">
		</a>
	</li>
    <?php endif; ?>
    
	<?php if (!empty($instagram_url)) : ?>
	<li>
		<a href="<?php echo $instagram_url;?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-Instagram.svg" alt="instagram" width="20" height="20" decoding="async" loading="lazy">
		</a>
	</li>
	<?php endif; ?>
    
	<?php if (!empty($facebook_url)) : ?>
	<li>
		<a href="<?php echo $facebook_url;?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-Facebook.svg" alt="facebook" width="20" height="28" decoding="async" loading="lazy">
		</a>
	</li>
	<?php endif; ?>
    
	<?php if (!empty($youtube_url)) : ?>
	<li>
		<a href="<?php echo $youtube_url;?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-youtube.svg" alt="youtube" width="20" height="16" decoding="async" loading="lazy">
		</a>
	</li>
	<?php endif; 
	endwhile; 
	?>
</ul>
<?php endif; ?>