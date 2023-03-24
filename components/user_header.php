<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

   <a href="home.html" class="logo"><span class="logo-warna">jnek</span>amila</a>

      <nav class="navbar">
         <a href="home.php">home</a>
         <a href="about.php">tentang</a>
         <a href="menu.php">minuman</a>
         <a href="orders.php">pesanan</a>
         <a href="contact.php">kontak</a>
      </nav>

      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profil</a>
            <a href="components/user_logout.php" onclick="return confirm('keluar dari website ini?');" class="delete-btn">keluar</a>
         </div>
         <p class="account">
            <a href="login.php">masuk</a> |
            <a href="register.php">daftar</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">silahkan masuk!</p>
            <a href="login.php" class="btn">masuk</a>
         <?php
          }
         ?>
      </div>

   </section>

</header>

