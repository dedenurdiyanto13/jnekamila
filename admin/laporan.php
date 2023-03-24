<?php 


include '../components/connect2.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
};

// Mengenalkan variabel teks
$SqlPeriode = ""; 
$awalTgl	= ""; 
$akhirTgl	= ""; 
$tglAwal	= ""; 
$tglAkhir	= "";

if(isset($_POST['btnTampil'])) {
	$tglAwal 	= isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-".date('m-Y');
	$tglAkhir 	= isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
	$SqlPeriode = " where placed_on BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
}
else {
	$awalTgl 	= "01-".date('m-Y');
	$akhirTgl 	= date('d-m-Y'); 

	$SqlPeriode = " where placed_on BETWEEN '".$awalTgl."' AND '".$akhirTgl."'";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>pesanan</title>

   <!-- font awesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        

   <!-- css -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<!-- <header class="header">
   <section class="flex">
      <a href="dashboard.php" class="logo">Admin<span>Panel</span></a>
      <nav class="navbar">
         <a href="dashboard.php">home</a>
         <a href="products.php">minuman</a>
         <a href="placed_orders.php">pesanan</a>
         <a href="admin_accounts.php">admin</a>
         <a href="users_accounts.php">user</a>
         <a href="messages.php">pesan</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         
      </div>
   </section>
</header> -->

<section class="placed-orders">

    <h1 class="heading">Data Penjualan</h1>

    <div class="container">

        <div class="box">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form10" target="_self">					                  
                <label for="" class="pdf-label">Dari</label>
                <input name="txtTglAwal" type="date" class="pdf-date" value="<?php echo $awalTgl; ?>" size="10" /> 
                <label for="" class="pdf-label">Sampai</label>  
                <input name="txtTglAkhir" type="date" class="pdf-date" value="<?php echo $akhirTgl; ?>" size="10" />			
                <input name="btnTampil" class="pdf-btn" type="submit" value="Tampilkan" />
                <a href="laporanview.php?awal=<?php echo $tglAwal; ?>&&akhir=<?php echo $tglAkhir; ?>" target="_blank" class="pdf-print">Cetak PDF</a>
            </form>
            
            <div class="row">
                <div class="col-lg-3">
                    
                </div>
            </div> 
        </div>
    </div>

    <h4 class="heading2">Periode Tanggal <b><?php echo ($tglAwal); ?></b> s/d <b><?php echo ($tglAkhir); ?></b></h4>
    
    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table class="table dataTable my-0" id="dataTable1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pesan</th>
                    <th>Nama Minuman</th>
                    <th>Nama Agen</th>
                    <th>Metode Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>     
                <?php
                    $Sql 	= "SELECT * FROM orders $SqlPeriode";								
                    $myQry 	= mysqli_query($mysqli, $Sql)  or die ("Query  salah : ".mysqli_error());
                    $nomor  = 0; 
                    while ($myData = mysqli_fetch_array($myQry)) {		
                    $nomor++;
                ?>
                        
                <tr>						
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $myData['placed_on'];?></td>
                    <td><?php echo $myData['total_products'];?></td> 
                    <td><?php echo $myData['name'];?></td>										
                    <td><?php echo $myData['method'];?></td>
                    <td><?php echo $myData['payment_status'];?></td>
                    <td>Rp. <?php  echo  number_format($myData['total_price']);?></td> 
                </tr>
                
                <?php
                    } $nomor++;
                ?>
            </tbody>       
        </table>
    </div>

</section>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/theme.js"></script>

<script>
	$(document).ready(function() {
		$('#dataTable1').DataTable();
	});
</script>

</body>
</html>