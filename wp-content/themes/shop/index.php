<?php get_header(); ?>
<!-- content -->
<div class="wrapper">
   <!-- slider -->
   <div class="slideshow-container relative">
      <div class="mySlides fade ">
         <img src="http://localhost/shop/wp-content/uploads/2023/05/bg.png" style="width:100%">
      </div>
      <div class="mySlides fade">
         <img
            src="http://localhost/shop/wp-content/uploads/2023/05/bedroom-interior-design-vector-banner-copy-space-modern-cozy-room-double-bed-bedside-table-floor-lamp-decor-accessories-193201639.jpg"
            style="width:100%">
      </div>
      <div class="mySlides fade">
         <img src="http://localhost/shop/wp-content/uploads/2023/05/bg.png" style="width:100%">
      </div>
      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>
      <div class="over-lay">
      </div>
      <div class="box-text-slider">
         <p>Beautiful & Elegant</p>
         <h1>Premium Bedroom</h1>
         <h5>Discount 50% On Products & Free Shipping.</h5>
         <a href="" class="btn-shop-now">Shop Now</a>
      </div>
      <div style="text-align:center" class="dot-slider">
         <span class="dot" onclick="currentSlide(1)"></span>
         <span class="dot" onclick="currentSlide(2)"></span>
         <span class="dot" onclick="currentSlide(3)"></span>
      </div>
   </div>
   <!-- slider end  -->
   <div class="container">
      <!-- section categories -->
      <section class="categories">
         <h2 class="st-categories-title"> Top Categories </h2>
         <p class="st-categories-des"> Our products are designed for everyone, environmentally friendly. </p>
         <div class="list-items-categories">
            <?php
            // Lấy danh sách các danh mục sản phẩm
            $product_categories = get_categories(
               array(
                  'taxonomy' => 'product_cat',
                  'hide_empty' => false,
               )
            );
            ?>
            <div class="grid-6 list-items-cate">
               <?php
               // Lặp qua danh sách các danh mục sản phẩm và hiển thị tên và hình ảnh
               foreach ($product_categories as $category) {
                  $category_id = $category->term_id;
                  $category_name = $category->name;
                  $category_image = get_term_meta($category_id, 'thumbnail_id', true);
                  $category_image_url = wp_get_attachment_url($category_image);
                  ?>
                  <!-- Hiển thị tên và hình ảnh của danh mục -->
                  <div class="items">
                     <div class="item-cate">
                        <img src="<?php echo $category_image_url; ?>" alt="<?php echo $category_name; ?>" />
                        <h4>
                           <?php echo $category_name; ?>
                        </h4>
                     </div>
                  </div>
                  <?php
               }
               ?>
            </div>
         </div>
      </section>
      <!-- section categories end -->
      <!-- section top trending -->
      <section class="top-trending">
         <h2 class="st-top-trending-title"> Top Categories </h2>
         <p class="st-top-trending-des"> Our products are designed for everyone, environmentally friendly.
         </p>
         <div class="list-product-top-trending">
            <?php
            // Lấy danh sách sản phẩm với số lượng tối đa là 10 sản phẩm
            $args = array(
               'post_type' => 'product',
               'posts_per_page' => 8,
            );

            $products = new WP_Query($args);
            ?>
            <div class="grid-4">
               <?php
               if ($products->have_posts()) {
                  while ($products->have_posts()) {
                     $products->the_post();
                     $product_id = get_the_ID();
                     $product_name = get_the_title();
                     $product_link = get_permalink();
                     $rating = get_post_meta($product_id, 'rating', true);
                     $regular_price = get_post_meta($product_id, '_regular_price', true);
                     $sale_price = get_post_meta($product_id, '_sale_price', true);
                     $product_image_url = get_the_post_thumbnail_url($product_id, 'medium');

                     ?>
                     <div class="items">
                        <div class="pro-box relative">
                           <a href="<?php echo $product_link ?>">
                              <img src="<?php echo $product_image_url ?>" alt="<?php echo $product_name ?>" class="img-fluid">
                           </a>
                           <div class="pro-content ">
                              <a href="<?php echo $product_link ?>" class="pro-name"><?php echo $product_name ?></a>
                              <div class="pro-star">
                                 <?php
                                 $stars = '<div class="rating-stars">';
                                 for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                       $stars .= '<span class="star filled">&#9733;</span>';
                                    } else {
                                       $stars .= '<span class="star">&#9733;</span>';
                                    }
                                 }
                                 $stars .= '</div>';

                                 // Hiển thị chuỗi HTML của số sao đánh giá của sản phẩm
                                 echo $stars;
                                 ?>
                              </div>
                              <div class="pro-price">
                                 <?php
                                 if (isset($sale_price) && $sale_price != '') {
                                    echo '<span class="regular-price">' . wc_price($regular_price) . '</span>';
                                    echo '<span class="sale-price">' . wc_price($sale_price) . '</span>';
                                 } else {
                                    echo '<span class="color-black1">' . wc_price($regular_price) . '</span>';
                                 }
                                 ?>
                              </div>

                           </div>
                           <?php
                           $sale_price = get_post_meta($product_id, '_sale_price', true);
                           if (!empty($sale_price)) {
                              ?>
                              <div class="box-percent">
                                 <div class="precent-number">
                                    <?php
                                    echo '<span class="sale-percentage">' . calculate_sale_percentage($product_id) . '</span>';
                                    ?>
                                 </div>
                                 <div class="percent">
                                    Pre-Order
                                 </div>
                              </div>
                              <?php
                           } else {
                              echo "";
                           }
                           ?>
                        </div>
                     </div>
                     <?php
                  }
                  wp_reset_postdata();
               }
               ?>
            </div>
         </div>
         <div class="box-btn-load-more">
            <a href="" class="btn-load-more">Load more</a>
         </div>
      </section>
      <!-- section top trending end -->
   </div>
</div>
<div class="wrapper">
   <!-- section banner -->
   <section class="banner relative">
      <img src="http://localhost/shop/wp-content/uploads/2023/05/bg-16.png" alt="banner" class="img-fluid ">
      <div class="container">
         <div class="box-text-banner">
            <h5>LIMITED EDITION</h5>
            <h2>Unique Style</h2>
            <p>The watch is carefully designed with quality materials, such as the domed sapphire crystal, and the
               meticulous level of detail - from the dial to the delicate gold hour markers.
            </p>
            <a href="" class="btn-banner">Discover Now</a>
         </div>
      </div>

   </section>
   <!-- section banner end -->
   <div class="container">
      <!-- section service -->
      <section class="service">
         <div class="list-service">
            <?php
            // Lấy danh sách dịch vụ
            $args = array(
               'post_type' => 'dich-vu',
               'posts_per_page' => -1,
            );

            $services = new WP_Query($args);
            ?>
            <div class="grid-3">
               <?php
               if ($services->have_posts()) {
                  while ($services->have_posts()) {
                     $services->the_post();
                     $title = get_the_title();
                     $content = get_the_content();
                     $service_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                     ?>
                     <div class="items">
                        <div class="box-services">
                           <img src="<?php echo $service_thumbnail ?>" alt="icon dịch vụ">
                           <h4 class="title">
                              <?php echo $title ?>
                           </h4>
                           <p class="content">
                              <?php echo $content ?>
                           </p>
                        </div>
                     </div>
                     <?php
                  }
                  wp_reset_postdata();
               }
               ?>
            </div>
         </div>
      </section>
      <!-- section service ennd -->
      <section class="follow-us">
         <h2 class="st-follow-us-title"> Follow Us</h2>
         <p class="st-follow-us-des"> Inspire and let yourself be inspired, from one unique fashion to another.
         </p>
         <div class="list-items-ig">
            <?php
            // Lấy danh sách instagram
            $args = array(
               'post_type' => 'instagram',
               'orderby' => 'ID',
               'posts_per_page' => -1,
            );

            $ig = new WP_Query($args);
            ?>
            <div class="grid-6">
               <?php
               if ($ig->have_posts()) {
                  while ($ig->have_posts()) {
                     $ig->the_post();
                     $ig_link = get_post_meta(get_the_ID(), 'link', true);
                     $ig_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                     ?>
                     <div class="items">
                        <div class="item-ig relative">
                           <a href="<?php echo $ig_link ?>">
                              <img src="<?php echo $ig_thumbnail ?>" alt="ảnh instagram" class="img-fluid">
                           </a>
                           <div class="icon-ig">
                              <img src="http://localhost/shop/wp-content/uploads/2023/05/icon-4.png">
                           </div>
                        </div>
                     </div>
                     <?php
                  }
                  wp_reset_postdata();
               }
               ?>
            </div>
         </div>
      </section>
   </div>
</div>
<!-- content end -->
<?php get_footer(); ?>