<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>pesanan</title>

   <!-- font awesome cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header awal -->
<?php include 'components/user_header.php'; ?>
<!-- header akhir -->

<div class="heading">
   <h3>pesanan</h3>
   <p><a href="home.php">home</a> / <span class="menu-active"> pesanan</span></p>
</div>

<section class="orders">

   <h1 class="title">pesanan anda</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">silahkan login untuk melihat pesanan anda</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Pesan pada : <span><?= $fetch_orders ['placed_on']; ?></span></p>
      <p>Nama : <span><?= $fetch_orders['name']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>No Telp : <span><?= $fetch_orders['number']; ?></span></p>
      <p>Alamat : <span><?= $fetch_orders['address']; ?></span></p>
      <p>Metode Pembayaran : <span><?= $fetch_orders['method']; ?></span></p>
      <p>Pesanan Anda : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>Total Harga : <span>Rp. <?= number_format($fetch_orders['total_price'],0,',','.'); ?></span></p>
      <p>Status Pembayaran : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">belum ada pesanan!</p>';
      }
      }
   ?>

   </div>

</section>

<!-- footer awal  -->
<?php include 'components/footer.php'; ?>
<!-- footer akhir -->

<!-- js -->
<script src="js/script.js"></script>

</body>
</html>