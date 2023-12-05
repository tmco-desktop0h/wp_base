<?php if(have_rows('link_wrap','option')): ?>
<ul>
	<?php while(have_rows('link_wrap','option')): the_row();
	$instagram_url = get_sub_field('instagram_url');
	$facebook_url = get_sub_field('facebook_url');
	$twitter_url = get_sub_field('twitter_url');
	$line_url = get_sub_field('line_url'); ?>
    
    <?php if (!empty(twitter_url)) : ?>
	<li>
		<a href="<?php echo $twitter_url;?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-twitter.svg" alt="twitter" width="30" height="30" decoding="async" loading="lazy">
		</a>
	</li>
    <?php endif; ?>
    
	<?php if (!empty($instagram_url)) : ?>
	<li>
		<a href="<?php echo $instagram_url;?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-Instagram.svg" alt="instagram" width="30" height="30" decoding="async" loading="lazy">
		</a>
	</li>
	<?php endif; ?>
    
	<?php if (!empty($facebook_url)) : ?>
	<li>
		<a href="<?php echo $facebook_url;?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-Facebook.svg" alt="facebook" width="30" height="30" decoding="async" loading="lazy">
		</a>
	</li>
	<?php endif; ?>
    
    <?php if (!empty($line_url)) : ?>
	<li>
		<a href="<?php echo $line_url;?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-line.svg" alt="line" width="30" height="30" decoding="async" loading="lazy">
		</a>
	</li>
	<?php endif; 
	endwhile; 
	?>
</ul>
<?php endif; ?>