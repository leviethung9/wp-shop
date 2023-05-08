<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- link cdn fontawesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- link css -->
   <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/core.css' ?>">
   <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/shop.css' ?>">
   <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/reponsive.css' ?>">
   <title>Trang chủ</title>
</head>

<body>
   <!-- code start -->
   <div class="container-fluid">
      <!-- header -->
      <div class="hd__top">
         <div class="hd__top--left">
            <div class="hd__top--phone">
               <a href="">+222-1800-2628</a>
               <a href="mailto:blueskytechcompany@gmail.com">blueskytechcompany@gmail.com</a>
            </div>
         </div>
         <div class="hd__top--center">
            <p class="slogan">Sign up for 10% off your first order: <a href="" class="signup--text">Sign Up</a> </p>
         </div>
         <div class="hd__top--right">
            <div class="hd__top--menu">
               <ul>
                  <li><a href="">Our Stores</a></li>
                  <li>
                     <a href="">English <i class="fa-solid fa-chevron-down"></i></a>
                     <ul class="hd__top--submenu">
                        <li><a href="">VietNamese</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="">United States (USD $) <i class="fa-solid fa-chevron-down"></i></a>
                     <ul class="hd__top--submenu">
                        <li><a href="">Việt Nam Đồng</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <div class="icon-show pc-none">
               <a href="" class="btn-hamber"><i class="fa-sharp fa-solid fa-bars"></i></a>
            </div>
         </div>
      </div>
      <div class="hd__main">
         <div class="hd__main--left">
            <div class="logo">
               <img src="http://localhost/shop/wp-content/uploads/2023/05/Logo.png" alt="">
            </div>
         </div>
         <div class="hd__main--center">
            <?php
            wp_nav_menu(
               array(
                  'theme_location' => 'main-menu',
                  'menu_class' => 'main-menu',
               )
            );
            ?>
         </div>
         <div class="hd__main--right">
            <div class="hd-icon">
               <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
               <a href=""><i class="fa-regular fa-user"></i></a>
               <a href=""><i class="fa-regular fa-clock"></i></a>
               <a href="" class="relative">
                  <i class="fa-regular fa-heart"></i>
                  <div class="total1">
                     5
                  </div>
               </a>
               <a href="" class="relative">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <div class="total2">
                     5
                  </div>
               </a>
            </div>

         </div>
      </div>
      <!--  hd tablet and mobile -->
      <div class="hd-tablet-mb">
         <div class="flex-left">
            <button class="openbtn" onclick="openNav()"> <i class="fa-solid fa-bars"></i></button>
            <div id="menu-mb">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
               <div class="main-menu-mb">
                  <?php
                  wp_nav_menu(
                     array(
                        'menu' => 'custom-menu',
                        'container_class' => 'custom-menu-class',
                        'menu_class' => 'custom-menu-ul',
                        'submenu_class' => 'custom-submenu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'walker' => new My_Walker_Nav_Menu(),
                     ));
                  ?>
               </div>
               <div class="top-menu-mb">
                  <ul>
                     <li><a href="">Our Stores</a></li>
                     <li>
                        <a href="">English <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="hd__top--submenu">
                           <li><a href="">VietNamese</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="">United States (USD $) <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="hd__top--submenu">
                           <li><a href="">Việt Nam Đồng</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <div class="hd-icon-mb">
                  <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                  <a href=""><i class="fa-regular fa-user"></i></a>
                  <a href=""><i class="fa-regular fa-clock"></i></a>
                  <a href="" class="relative">
                     <i class="fa-regular fa-heart"></i>
                     <div class="total1">
                        5
                     </div>
                  </a>
                  <a href="" class="relative">
                     <i class="fa-solid fa-cart-shopping"></i>
                     <div class="total2">
                        5
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <div class="flex-center">
            <a href=""><img src="http://localhost/shop/wp-content/uploads/2023/05/Logo.png" alt="ảnh logo"></a>
         </div>
         <div class="flex-right">
            <div class="hd-icon">
               <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
               <a href=""><i class="fa-regular fa-user"></i></a>
               <a href=""><i class="fa-regular fa-clock"></i></a>
               <a href="" class="relative">
                  <i class="fa-regular fa-heart"></i>
                  <div class="total1">
                     5
                  </div>
               </a>
               <a href="" class="relative">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <div class="total2">
                     5
                  </div>
               </a>
            </div>
            <a class="icon-search"><i class="fa-solid fa-magnifying-glass"></i></a>
         </div>

      </div>
      <!--  hd tablet and mobile -->
      <!-- header end -->