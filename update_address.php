<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['rtrw'] .', '.$_POST['blok'].', '.$_POST['desa'].', '.$_POST['kecamatan'] .', '. $_POST['kota'] .', '. $_POST['provinsi'] .', '. $_POST['negara'] .' - '. $_POST['kode_pos'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'alamat disimpan!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>perbarui alamat</title>

   <!-- font awesome cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>alamat anda</h3>
      <input type="text" class="box" placeholder="jl dan rt/rw" maxlength="50" name="rtrw">
      <input type="text" class="box" placeholder="blok" maxlength="50" name="blok">
      <input type="text" class="box" placeholder="desa / kelurahan" maxlength="50" name="desa">
      <input type="text" class="box" placeholder="kecamatan" maxlength="50" name="kecamatan">
      <input type="text" class="box" placeholder="kab / kota" maxlength="50" name="kota">
      <input type="text" class="box" placeholder="provinsi" maxlength="50" name="provinsi">
      <input type="text" class="box" placeholder="negara" maxlength="50" name="negara">
      <input type="number" class="box" placeholder="kode pos" max="999999" min="0" maxlength="6" name="kode_pos">
      <input type="submit" value="simpan alamat" name="submit" class="btn">
   </form>

</section>

<?php include 'components/footer.php' ?>

<!-- js -->
<script src="js/script.js"></script>

</body>
</html>