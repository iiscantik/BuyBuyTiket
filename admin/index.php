<?php
  session_start();
  include "koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Halaman Administrator Buy Buy Tiket</title>
</head>

<body>
<?php
if(!empty($_SESSION["useradm"]) and !empty($_SESSION["passadm"])){
  $sqla = mysqli_query($kon, "select * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
  $ra = mysqli_fetch_array($sqla);
?>
<div class="grid">
  <div class="dh12">
	<div class="container1">
		<span style="font-size:20px;cursor:pointer; padding-right:15px;" onclick="openNav()">&#9776;</span> 
		<a href="<?php echo "?p=home"; ?>">Administrator Buy Buy Tiket</a>
	</div>
  </div>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <img src="../image/adminLogo.png" width="150px" />
  <p>Selamat Datang</p>
  <h3><?php echo "$ra[namalengkap]"; ?></h3>
  <hr><a href="<?php echo "?p=home"; ?>">Beranda</a> 
  <hr><a href="<?php echo "?p=kategori"; ?>">Event</a> 
  <hr><a href="<?php echo "?p=produk"; ?>">Tiket</a> 
  <hr><a href="<?php echo "?p=jasakirim"; ?>">Souvenir</a> 
  <hr><a href="<?php echo "?p=anggota"; ?>">Anggota</a> 
  <hr><a href="<?php echo "?p=penjualan"; ?>">Transaksi</a> 
  <hr><a href="<?php echo "?p=logout"; ?>">Logout</a>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<div class="grid">
  <div class="dh12">
	<div class="container2">
<?php
  if($_GET["p"] == "logout"){
	include "logout.php";
  }else if($_GET["p"] == "kategori"){
	include "kategori.php";
  }else if($_GET["p"] == "kategoriadd"){
	include "kategoriadd.php";
  }else if($_GET["p"] == "kategoriedit"){
	include "kategoriedit.php";
  }else if($_GET["p"] == "kategoridel"){
	include "kategoridel.php";
  }else if($_GET["p"] == "produk"){
  	include "produk.php";
  }else if($_GET["p"] == "produkadd"){
  	include "produkadd.php";
  }else if($_GET["p"] == "produkedit"){
  	include "produkedit.php";
  }else if($_GET["p"] == "produkdel"){
  	include "produkdel.php";
  }else if($_GET["p"] == "produkdetail"){
  	include "produkdetail.php";
  }else if($_GET["p"] == "jasakirim"){
  	include "jasakirim.php";
  }else if($_GET["p"] == "jasakirimadd"){
  	include "jasakirimadd.php";
  }else if($_GET["p"] == "jasakirimedit"){
  	include "jasakirimedit.php";
  }else if($_GET["p"] == "jasakirimdel"){
  	include "jasakirimdel.php";
  }else if($_GET["p"] == "anggota"){
  	include "anggota.php";
  }else if($_GET["p"] == "anggotadel"){
  	include "anggotadel.php";
  }else if($_GET["p"] == "orders"){
  	include "orders.php";
  }else if($_GET["p"] == "ordersdetail"){
  	include "ordersdetail.php";
  }else if($_GET["p"] == "ordersstatus"){
  	include "ordersstatus.php";
  }else if($_GET["p"] == "penjualan"){
  	include "penjualan.php";
  }else{
    include "home.php";
  }
?>
    </div>
  </div>
</div>
</div>
<div class="grid">
  <div class="dh12">
	<div class="container3">
	  Copyright &copy; Prapti Isnaini Handayani, 2023	
	</div>
  </div>
</div>
<?php
}else{
  include "login.php";
}
?>
</body>
</html>
