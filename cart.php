<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
   $message[] = 'item keranjang dihapus!';
}

if(isset($_POST['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   // header('location:cart.php');
   $message[] = 'dihapus semua dari keranjang!';
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'jumlah keranjang diperbarui';
}

$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>keranjang</title>

   <!-- font awesome cdn  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header awal  -->
<?php include 'components/user_header.php'; ?>
<!-- header akhir -->

<div class="heading">
   <h3>keranjang belanja</h3>
   <p><a href="home.php">home</a> / <span class="menu-active"> keranjang</span></p>
</div>

<!-- keranjang awal -->
<section class="products">
   <h1 class="title">keranjang anda</h1>
   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-times" name="delete" onclick="return confirm('hapus item ini?');"></button>
         <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
         <div class="name"><?= $fetch_cart['name']; ?></div>
         <div class="flex">
            <div class="price"><span>Rp. </span><?= number_format($fetch_cart['price'],0,',','.'); ?></div>
            <input type="number" name="qty" class="qty" min="1" max="9999" value="<?= $fetch_cart['quantity']; ?>" maxlength="4">
            <button type="submit" class="fas fa-edit" name="update_qty"></button>
         </div>
         <div class="sub-total"> sub total : <span>Rp. <?= number_format($sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']),0,',','.'); ?></span> </div>
      </form>
      <?php
               $grand_total += $sub_total;
            }
         }else{
            echo '<p class="empty">keranjang anda kosong</p>';
         }
      ?>
   </div>

   <div class="cart-total">
      <p>total keranjang : <span>Rp. <?= number_format($grand_total,0,',','.'); ?></span></p>
      
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">lanjutkan ke pembayaran</a>
   </div>

   <div class="more-btn">
      <form action="" method="post">
         <button type="submit" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" name="delete_all" onclick="return confirm('hapus semua dari keranjang?');">hapus semua</button>
      </form>
      <a href="menu.php" class="btn">lanjut belanja</a>
   </div>
</section>
<!-- shopping cart section ends -->

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>