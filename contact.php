<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'sudah mengirim pesan!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'pesan berhasil terkirim!';

   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>kontak</title>

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
   <h3>kontak kami</h3>
   <p><a href="home.php">home</a> / <span class="menu-active"> kontak</span></p>
</div>

<!-- kontak awal -->

<section class="contact">

   <div class="row">

      <div class="image">
         <img src="images/service-ilustrasi.svg" alt="">
      </div>

      <form action="" method="post">
         <h3>beri tahu kami sesuatu!</h3>
         <input type="text" name="name" maxlength="50" class="box" placeholder="masukkan nama anda" required>
         <input type="number" name="number" min="0" max="9999999999999" class="box" placeholder="masukkan nomor telpon anda" required maxlength="13">
         <input type="email" name="email" maxlength="50" class="box" placeholder="masukkan email anda" required>
         <textarea name="msg" class="box" required placeholder="masukkan pesan anda" maxlength="500" cols="30" rows="10"></textarea>
         <input type="submit" value="kirim pesan" name="send" class="btn">
      </form>

   </div>

</section>
<!-- kontak akhir -->

<!-- footer awal  -->
<?php include 'components/footer.php'; ?>
<!-- footer akhir -->

<!-- js -->
<script src="js/script.js"></script>

</body>
</html>