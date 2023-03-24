<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>Pesan Online</span>
               <h3>es teh lemon</h3>
               <a href="menu.php" class="btn">lihat minuman</a>
            </div>
            <div class="image">
               <img src="images/teh-slider.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Pesan Online</span>
               <h3>es kopi susu</h3>
               <a href="menu.php" class="btn">lihat minuman</a>
            </div>
            <div class="image">
               <img src="images/kopi-slider.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Pesan Online</span>
               <h3>jus wortel</h3>
               <a href="menu.php" class="btn">lihat minuman</a>
            </div>
            <div class="image">
               <img src="images/jus-slider.png" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

   <h1 class="title">kategori minuman</h1>

   <div class="box-container">

      <a href="category.php?category=teh" class="box">
         <img src="images/teh.png" alt="">
         <h3>teh</h3>
      </a>

      <a href="category.php?category=kopi" class="box">
         <img src="images/kopi.png" alt="">
         <h3>kopi</h3>
      </a>

      <a href="category.php?category=cokelat" class="box">
         <img src="images/cokelat.png" alt="">
         <h3>cokelat</h3>
      </a>

      <a href="category.php?category=jus" class="box">
         <img src="images/jus.png" alt="">
         <h3>jus</h3>
      </a>

   </div>

</section>

<section class="products">

   <h1 class="title">minuman terbaru</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>Rp. </span><?= number_format($fetch_products['price'],0,',','.'); ?></div>
            <input type="number" name="qty" class="qty" min="1" max="9999" value="1" maxlength="4">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">belum ada produk yang ditambahkan!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">lihat semua</a>
   </div>

</section>


















<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>