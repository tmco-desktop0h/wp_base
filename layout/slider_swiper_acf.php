<div id="mainSliderSwiper">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if( have_rows('mainslider_row','option') ):?>

            <?php while( have_rows('mainslider_row','option') ): the_row();
                //画像パラメータ取得
                $img_obj = get_sub_field('mainslider_img');
                $img_url = $img_obj['url'];
                $img_size = 'medium_large';
                $img_width = $img_obj['sizes'][ $img_size . '-width' ];
                $img_height = $img_obj['sizes'][ $img_size . '-height' ];

                $mainslider_img_alt = get_sub_field('mainslider_img_alt');
            ?>

                <div class="swiper-slide">
                    <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr($mainslider_img_alt);?>">
                </div>

            <?php endwhile; endif;?>

        </div>
    </div>
</div>