<?php 
session_start();

include '../components/connect2.php';



$awal	= $_GET['awal']; 


$akhir	= $_GET['akhir'];


	$tglAwal 	= isset($_GET['awal']) ? $_GET['awal'] : "01-".date('m-Y');
	$tglAkhir 	= isset($_POST['akhir']) ? $_GET['akhir'] : date('d-m-Y');
	$SqlPeriode = "where placed_on BETWEEN '$awal' AND '$akhir'";
?>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap4.min.css">
</head>
<body onload="print()">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmedit">

<?php if (!empty($tglAwal)){ ?>
<center><h2>DAFTAR LAPORAN TRANSAKSI PEMESANAN</h2> <hr> <br></h4>PERIODE PEMESANAN <b><?php echo ($awal); ?> s/d <?php echo ($akhir); ?></b>
<br /> 
</h4></center>
<?php } else { ?>
<center><h2>DAFTAR LAPORAN TRANSAKSI PEMESANAN
</h2></center>
<hr>
<?php } ?>




   <table class="table my-0">
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
								$jumlahbayar=0;	
								while ($myData = mysqli_fetch_array($myQry)) {		
										$nomor++;
										$jumlahbayar+=$myData['total_price'];	
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
								
								  <tr>
		<th align="center" ><strong></strong></th>
		<th  ><strong></strong></th>
		<th  ><strong></strong></th>
		<th  ><strong></strong></th>
		<th  ><strong></strong></th>
		<th  ><strong> Total Transaksi</strong></th>
	   
        <th style="background-color:whitesmoke;" align="right" ><strong>Rp. <?php echo number_format($jumlahbayar); ?>,-</strong></th>
		
		

  </tr>
                                
                            </table>
                       
                        
        


    
  

</form>
</body>

<script src="assets/js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

