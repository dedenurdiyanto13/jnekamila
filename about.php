<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>tentang</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header awal  -->
<?php include 'components/user_header.php'; ?>
<!-- header akhir -->

<div class="heading">
   <h3>tentang kami</h3>
   <p><a href="home.php">home</a> / <span class="menu-active"> tentang</span></p>
</div>

<!-- tentang awal  -->
<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-ilustrasi.svg" alt="">
      </div>

      <div class="content">
         <h3>mengapa memilih kami?</h3>
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, neque debitis incidunt qui ipsum sed doloremque a molestiae in veritatis ullam similique sunt aliquam dolores dolore? Quasi atque debitis nobis!</p>
         <a href="menu.php" class="btn">minuman kami</a>
      </div>

   </div>

</section>
<!-- tentang akhir -->

<!-- langkah awal  -->
<section class="steps">

   <h1 class="title">langkah mudah</h1>
   <div class="box-container">
      <div class="box">
         <img src="images/langkah-1.png" alt="">
         <h3>pesan minuman</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, dolorem.</p>
      </div>

      <div class="box">
         <img src="images/langkah-2.png" alt="">
         <h3>minuman diantar</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, dolorem.</p>
      </div>

      <div class="box">
         <img src="images/langkah-3.png" alt="">
         <h3>selamat menikmati</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, dolorem.</p>
      </div>

   </div>

</section>
<!-- langkah akhir -->

<!-- ulasan awal  -->
<section class="reviews">
   <h1 class="title">Ulasan Pelanggan</h1>
   <div class="swiper reviews-slider">
      <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <img src="images/pic-1.jpg" alt="">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum
                  molestias ut earum nulla sint voluptatum labore nemo.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Priskila</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-2.jpg" alt="">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum
                  molestias ut earum nulla sint voluptatum labore nemo.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Dave</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-3.jpg" alt="">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum
                  molestias ut earum nulla sint voluptatum labore nemo.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Arunika</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-4.jpg" alt="">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum
                  molestias ut earum nulla sint voluptatum labore nemo.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Raul</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-5.jpg" alt="">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum
                  molestias ut earum nulla sint voluptatum labore nemo.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Tazkiya</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-6.jpg" alt="">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum
                  molestias ut earum nulla sint voluptatum labore nemo.</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Henry</h3>
            </div>

      </div>
      <div class="swiper-pagination"></div>
   </div>
</section>
<!-- ulasan akhir -->


<!-- footer awal -->
<?php include 'components/footer.php'; ?>
<!-- footer akhir -->

<!-- js -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
   var swiper = new Swiper(".reviews-slider", {
      loop:true,
      grabCursor: true,
      spaceBetween: 20,
      pagination: {
         el: ".swiper-pagination",
         clickable:true,
      },
      breakpoints: {
         0: {
         slidesPerView: 1,
         },
         700: {
         slidesPerView: 2,
         },
         1024: {
         slidesPerView: 3,
         },
      },
   });
</script>

</body>
</html>