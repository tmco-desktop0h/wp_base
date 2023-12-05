<?php 
/*
style_row 繰り返しフィールド
    style_img　画像-配列
    style_img_alt テキスト
    style_caption キャプション
    style_link リンク-テキスト
*/
?>
<div id="sliderSwiper">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if( have_rows('style_row','option') ):?>

            <?php while( have_rows('style_row','option') ): the_row();
                //画像パラメータ取得
                $img_obj = get_sub_field('style_img');
                $img_url = $img_obj['url'];
                $img_size = 'medium_large';
                $img_width = $img_obj['sizes'][ $img_size . '-width' ];
                $img_height = $img_obj['sizes'][ $img_size . '-height' ];
                $img_alt = get_sub_field('style_img_alt');
                $img_caption = get_sub_field('style_caption');

                $style_link = get_sub_field('style_link');
            ?>

                <div class="swiper-slide">
                    <a href="<?php echo esc_url($style_link);?>"><img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr($img_alt);?>" class="lazyload"><span><?php echo $img_caption;?></span></a>
                </div>
            <?php endwhile; endif;?>

        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>