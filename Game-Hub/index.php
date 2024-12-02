<?php
include "./shared/common.php";
include "./shared/DBconnection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- FAVICON -->
   <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

   <!-- REMIXICONS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
   <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">


   <!-- SWIPER CSS -->
   <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

   <!-- CSS -->
   <link rel="stylesheet" href="assets/css/style.css">

   <title>game hub</title>
</head>

<body>
   <!-- HEADER -->
   <header class="header" id="header">
      <nav class="nav container">
         <a href="#" class="nav__logo">
            <i class="ri-game-3-line"></i> E-Games
         </a>

         <div class="nav__menu">
            <ul class="nav__list">
               <li class="nav__item">
                  <a href="#home" class="nav__link active-link">
                     <i class="ri-home-line"></i>
                     <span>Home</span>
                  </a>
               </li>

               <li class="nav__item">
                  <a href="#featured" class="nav__link">
                     <i class="ri-book-3-line"></i>
                     <span>Featured</span>
                  </a>
               </li>

               <li class="nav__item">
                  <a href="#discount" class="nav__link">
                     <i class="ri-price-tag-3-line"></i>
                     <span>Discount</span>
                  </a>
               </li>

               <li class="nav__item">
                  <a href="#new" class="nav__link">
                     <i class="ri-bookmark-line"></i>
                     <span>New Games</span>
                  </a>
               </li>

               <li class="nav__item">
                  <a href="#testimonial" class="nav__link">
                     <i class="ri-message-3-line"></i>
                     <span>Testimonial</span>
                  </a>
               </li>
            </ul>
         </div>

         <div class="nav__actions">
            <!-- Search button -->
            <i class="ri-search-line search-button" id="search-button"></i>

            <!-- Login button -->
            <i class="ri-user-line login-button" id="login-button"></i>

            <!-- Theme button -->
            <i class="ri-moon-line change-theme" id="theme-button"></i>

            <!--cart-->
            <i class="ri-shopping-cart-line cart-button" id="cart-button"></i>
         </div>
      </nav>
   </header>

   <!-- SEARCH -->
   <div class="search" id="search-content">
      <form action="" class="search__form">
         <i class="ri-search-line search__icon"></i>
         <input type="search" placeholder="What are you looking for?" class="search__input">
      </form>

      <i class="ri-close-line search__close" id="search-close"></i>
   </div>

   <!-- LOGIN -->
   <div class="login grid" id="login-content">
      <?php include("./components/loginForm.php"); ?> 

      <!-- REGISTER -->
     <?php include("./components/registerForm.php"); ?>
      <div class="login__form grid"
         <?php
         if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == "") {
            echo "style='display: none;'";
         }
         ?>>
         <i class="ri-user-line" style="width: 60px; height: 60px; display: flex; justify-content: center; align-items: center; background: var(--first-color); border-radius: 50%; color: var(--border-color); font-size: 30px; margin: 0 auto;"></i>
         <div>
            <h3 class="SignUp__title" style="margin: 0;">
               <?php
               if (isset($_SESSION["logged"]) && $_SESSION["logged"] != "") {

                  $stmt = $connection->prepare("SELECT userName FROM users WHERE userEmail = ?");
                  $stmt->bind_param("s", $_SESSION['logged']);
                  $stmt->execute();
                  $result = $stmt->get_result();

                  if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                        echo $row["userName"];
                     }
                  } else {
                     echo "N/A";
                  }
                  // Close connection
                  $connection->close();
               } else {
                  echo "N/A";
               }

               ?>
            </h3>
            <h4 style="color: var(--text-color); margin: 0;">
               <?php
               echo ($_SESSION["logged"] != "" ? $_SESSION["logged"] : "N/A");
               ?></h4>
            <br />
            <a href="./editProfile.php" style="color: var(--first-color);">Edit Profile</a>
         </div>
         <a href="./actions/logout.php" style="width: 110px; margin: 0 auto;" onClick="return logoutConfirmation();">
            <button style="padding: 10px 20px; background: var(--text-color); color: var(--border-color); font-weight: bold; border-radius: 8px; cursor: pointer;">Log out</button>
         </a>
      </div>
      <i class="ri-close-line login__close" id="login-close"></i>
   </div>




   <!-- cart -->





   <!-- MAIN -->
   <main class="main">
      <!--HOME-->
      <section class="home section" id="home">
         <div class="home__container container grid">
            <div class="home__data">
               <h1 class="home__title">
                  Browse & <br>
                  Select E-Games
               </h1>

               <p class="home__description">
               Explore the best e-games from top creators! 
               Enjoy a wide variety of titles across all genres and get a 50% discount. 
               Don't miss out—level up your gaming experience today!
               </p>

               <a href="./About us.php" class="button">Explore Now</a>
            </div>

            <div class="home__images">
               <div class="home__swiper swiper">
                  <div class="swiper-wrapper">
                     <article class="home__article swiper-slide">
                        <img src="assets/img/gamecharactor5.png" alt="image" class="home__img">
                     </article>

                     <article class="home__article swiper-slide">
                        <img src="assets/img/gamecharactor7.png" alt="image" class="home__img">
                     </article>

                     <article class="home__article swiper-slide">
                        <img src="assets/img/gamecharactor3.png" alt="image" class="home__img">
                     </article>

                     <article class="home__article swiper-slide">
                        <img src="assets/img/gamecharactor4.png" alt="image" class="home__img">
                     </article>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- SERVICES -->
      <section class="services section">
         <div class="services__container container grid">
            <article class="services__card">
               <i class="ri-truck-line"></i>
               <h3 class="services__title">Free Shipping</h3>
               <p class="services__description">Order More Than $100</p>
            </article>

            <article class="services__card">
               <i class="ri-lock-2-line"></i>
               <h3 class="services__title">Secure Payment</h3>
               <p class="services__description">100% Secure Payment</p>
            </article>

            <article class="services__card">
               <i class="ri-customer-service-2-line"></i>
               <h3 class="services__title">24/7 Support</h3>
               <p class="services__description">Call us anytime</p>
            </article>
         </div>
      </section>

      <!-- FEATURED -->
      <section class="featured section" id="featured">
         <h2 class="section__title">
            Featured Games
         </h2>

         <div class="featured__container container">
            <div class="featured__swiper swiper">
               <div class="swiper-wrapper">
                  <article class="featured__card swiper-slide">
                     <img src="assets/img/Roblox.jpeg" alt="Roblox_Games" class="featured__img">

                     <h2 class="featured__title">Roblox</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/Fortnite.jpeg" alt="Fortnite_Games" class="featured__img">

                     <h2 class="featured__title">Fortnite</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/Counter-Strike 2 & GO.jpeg" alt="Counter-Strike 2 & GO_Games" class="featured__img">

                     <h2 class="featured__title">Counter-Strike 2 & GO</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/Call of Duty.jpg" alt="Call of Duty_Games" class="featured__img">

                     <h2 class="featured__title">Call of Duty</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/League of Legends.jpeg" alt="League of Legends_Games" class="featured__img">

                     <h2 class="featured__title">League of Legends</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/Diablo.png" alt="Diablo_Games" class="featured__img">

                     <h2 class="featured__title">Diablo</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/Grand Theft Auto V.png" alt="Grand Theft Auto V_Games" class="featured__img">

                     <h2 class="featured__title">Grand Theft Auto V</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/p3.png" alt="p3_Games" class="featured__img">

                     <h2 class="featured__title">P3 </h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/League of Legends.jpeg" alt="League of Legends_Games" class="featured__img">

                     <h2 class="featured__title">League of Legends</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>

                  <article class="featured__card swiper-slide">
                     <img src="assets/img/It Takes Two.png" alt="It Takes Two_Games" class="featured__img">

                     <h2 class="featured__title">It Takes Two</h2>
                     <div class="featured__prices">
                        <span class="featured__discount">$11.99</span>
                        <span class="featured__price">$19.99</span>
                     </div>

                     <button class="button">Add To Cart</button>

                     <div class="featured__actions">
                        <button><i class="ri-search-line"></i></button>
                        <button><i class="ri-heart-3-line"></i></button>
                        <button><i class="ri-eye-line"></i></button>
                     </div>
                  </article>
               </div>

               <div class="swiper-button-prev">
                  <i class="ri-arrow-left-s-line"></i>
               </div>

               <div class="swiper-button-next">
                  <i class="ri-arrow-right-s-line"></i>
               </div>
            </div>
         </div>
      </section>

      <!-- DISCOUNT -->
      <section class="discount section" id="discount">
         <div class="discount__container container grid">
            <div class="discount__data">
               <h2 class="discount__title section__title">
                  Up To 50% Discount
               </h2>

               <p class="discount__description">
               Get ready for unbeatable savings! 
               Take advantage of our special discount 
               days and level up your gaming experience. 
               The more you purchase, the bigger the 
               discounts—exclusive offers await you, 
               so don’t miss out! Grab your favorite games 
               now and enjoy huge savings!
               </p>

               <a href="#" class="button">Shop Now</a>
            </div>

            <div class="discount__images">
               <img src="assets/img/gamecharactor3.png" alt="game" class="discount__img-1">
               <img src="assets/img/gamecharactor5.png" alt="game" class="discount__img-2">
            </div>
         </div>
      </section>

      <!-- NEW GAMES -->
      <section class="new section" id="new">
         <h2 class="section__title">
            New Games
         </h2>

         <div class="new__container container">
            <div class="new__swiper swiper">
               <div class="swiper-wrapper">
                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/The Sims 4.png" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">The Sims 4</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/Rust.png" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Rust</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/League of Legends.jpeg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">League of Legends</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/Dead By Daylight.png" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Dead By Daylight</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/Dale and Dawson.png" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Dale and Dawson</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/Valorant.jpeg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Valorant</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/11.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Dead</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/22.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Heart of the Dragon</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/33.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Damakoo</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/44.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Evil Fire</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>
               </div>
            </div>

            <div class="new__swiper swiper">
               <div class="swiper-wrapper">
                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/55.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Among Us</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/66.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Silvester</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/77.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Heal of the Heaven</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/88.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Kngfuu</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/99.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Miikutudo</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/10.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Gun Dragon</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/11.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Goldfinch</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/22.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Sea virul</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/33.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">The Parphiya</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>

                  <a href="#" class="new__card swiper-slide">
                     <img src="assets/img/33.jpg" alt="image" class="new__img">

                     <div>
                        <h2 class="new__title">Dragon Knight</h2>
                        <div class="new__prices">
                           <span class="new__discount">$7.99</span>
                           <span class="new__price">$14.99</span>
                        </div>

                        <div class="new__stars">
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-fill"></i>
                           <i class="ri-star-half-fill"></i>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </section>

      <!-- JOIN -->
      <section class="join section">
         <div class="join__container">
            <img src="assets/img/join1.jpg" alt="image" class="join__bg">

            <div class="join__data container grid">
               <h2 class="join__title section__title">
                  Subscribe To Receive <br>
                  The Latest Updates
               </h2>

               <form action="" class="join__form">
                  <input type="email" placeholder="Enter email" class="join__input">
                  <button type="submit" class="join__button button">Subscribe</button>
               </form>
            </div>
         </div>
      </section>

      <!-- TESTIMONIAL -->
      <section class="testimonial section" id="testimonial">
         <h2 class="section__title">
            Customer Opinions
         </h2>

         <div class="testimonial__container container">
            <div class="testimonial__swiper swiper">
               <div class="swiper-wrapper">
                  <article class="testimonial__card swiper-slide">
                     <img src="assets/img/test1.png" alt="img" class="testimonial__img">

                     <h2 class="testimonial__title">Amashi Bandara</h2>
                     <p class="testimonial__description">
                     My go-to site for all things gaming! Easy to browse, 
                     fast checkout, and unbeatable prices.
                     </p>

                     <div class="testimonial__stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                     </div>
                  </article>

                  <article class="testimonial__card swiper-slide">
                     <img src="assets/img/test4.png" alt="img" class="testimonial__img">

                     <h2 class="testimonial__title">Amanda Gunasinghe</h2>
                     <p class="testimonial__description">
                     An awesome selection of games with seamless purchasing. 
                     Plus, the discounts are incredible—perfect for gamers on a budget!
                     </p>

                     <div class="testimonial__stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                     </div>
                  </article>

                  <article class="testimonial__card swiper-slide">
                     <img src="assets/img/test2.png" alt="img" class="testimonial__img">

                     <h2 class="testimonial__title">Ishini Rathnayake</h2>
                     <p class="testimonial__description">
                     A fantastic gaming hub! The site is user-friendly, 
                     and I love the great deals on all the latest games.
                     </p>

                     <div class="testimonial__stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                     </div>
                  </article>

                  <article class="testimonial__card swiper-slide">
                     <img src="assets/img/test_4.jpeg" alt="img" class="testimonial__img">

                     <h2 class="testimonial__title">Imasha Mahaarchchi</h2>
                     <p class="testimonial__description">
                        The best place to find amazing games! 
                        The purchase process is quick and easy, 
                        and the discounts are unbeatable.
                     </p>

                     <div class="testimonial__stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                     </div>
                  </article>
               </div>
            </div>
         </div>
      </section>
   </main>

   <!-- FOOTER -->
   <footer class="footer">
      <div class="footer__container container grid">
         <div>
            <a href="#" class="footer__logo">
               <i class="ri-game-3-line"></i> E-Game
            </a>

            <p class="footer__description">
            Embark on an exciting adventure, <br>
            conquer challenges, <br>
            and unlock treasures. <br>
            The journey awaits! 
            </p>
         </div>

         <div class="footer__data grid">
            <div>
               <h3 class="footer__title">About</h3>

               <ul class="footer__links">
                  <li>
                     <a href="#" class="footer__link">Awards</a>
                  </li>

                  <li>
                     <a href="#" class="footer__link">FAQs</a>
                  </li>

                  <li>
                     <a href="#" class="footer__link">Privacy policy</a>
                  </li>

                  <li>
                     <a href="#" class="footer__link">Terms of services</a>
                  </li>
               </ul>
            </div>

            <div>
               <h3 class="footer__title">Company</h3>

               <ul class="footer__links">
                  <li>
                     <a href="#" class="footer__link">Blogs</a>
                  </li>

                  <li>
                     <a href="#" class="footer__link">Community</a>
                  </li>

                  <li>
                     <a href="#" class="footer__link">Our team</a>
                  </li>

                  <li>
                     <a href="#" class="footer__link">Help center</a>
                  </li>
               </ul>
            </div>

            <div>
               <h3 class="footer__title">Contact</h3>

               <ul class="footer__links">
                  <li>
                     <address class="footer__info">
                        No.56 <br>
                        Game Hub Complex <br>
                        Colombo, SriLanka
                     </address>
                  </li>

                  <li>
                     <address class="footer__info">
                        e.gamehub@email.com <br>
                        0112454545
                     </address>
                  </li>
               </ul>
            </div>

            <div>
               <h3 class="footer__title">Social</h3>

               <div class="footer__social">
                  <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                     <i class="ri-facebook-circle-line"></i>
                  </a>

                  <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                     <i class="ri-instagram-line"></i>
                  </a>

                  <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                     <i class="ri-twitter-x-line"></i>
                  </a>
               </div>
            </div>
         </div>
      </div>

      <span class="footer__copy">
         &#169; All Rights Reserved By Ishini Rathnayake
      </span>
   </footer>

   <!-- SCROLL UP -->
   <a href="#" class="scrollup" id="scroll-up">
      <i class="ri-arrow-up-line"></i>
   </a>

   <!-- SCROLLREVEAL -->
   <script src="assets/js/scrollreveal.min.js"></script>

   <!-- SWIPER JS -->
   <script src="assets/js/swiper-bundle.min.js"></script>

   <!-- MAIN JS -->
   <script src="assets/js/main.js"></script>

   <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
   <script src="./assets/js/validations.js" async defer></script>
   <script>
      const authChange = (to) => {
         if (to == "register") {
            document.getElementById("registerForm").removeAttribute('style');
            document.getElementById("loginForm").setAttribute('style', 'display: none;');
         } else {
            document.getElementById("loginForm").removeAttribute('style');
            document.getElementById("registerForm").setAttribute('style', 'display: none;');
         }
      }
   </script>
</body>

</html>