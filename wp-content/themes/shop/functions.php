<?php

// ham tao menu
add_theme_support('menus');
// dang ky vi tri menu
function theme_register_nav_menus()
{
    register_nav_menus(
        array(
            'top-menu' => __('top menu', 'theme'),
            'main-menu' => __('main menu', 'theme'),
            'main-menu-mobile' => __('main menu mobile', 'theme')
        )
    );
}
add_action('init', 'theme_register_nav_menus');

require_once(get_template_directory() . '/My_Walker_Nav_Menu.php');

// code tao danh gia ao 5 sao cho cac san pham
// Lấy danh sách sản phẩm
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);

$products = new WP_Query($args);

// Vòng lặp qua các sản phẩm và tạo đánh giá mới
if ($products->have_posts()) {
    while ($products->have_posts()) {
        $products->the_post();
        $product_id = get_the_ID();
        $post_title = '5 Star Rating';
        $post_content = 'This product has a 5 star rating.';
        $post_status = 'publish';

        $new_rating = array(
            'post_title' => $post_title,
            'post_content' => $post_content,
            'post_status' => $post_status,
            'post_type' => 'product_review',
            'meta_input' => array(
                'product_id' => $product_id,
                'rating' => 5,
            ),
        );

        wp_insert_post($new_rating);
    }
}

wp_reset_postdata();
// ham tinh phan tram giam gia
function calculate_sale_percentage( $product_id ) {
    $regular_price = get_post_meta( $product_id, '_regular_price', true );
    $sale_price = get_post_meta( $product_id, '_sale_price', true );

    if ( $sale_price && $sale_price != '' && $regular_price && $regular_price != '' ) {
        $percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
        return $percentage . '%';
    } else {
        return '';
    }
}
?>