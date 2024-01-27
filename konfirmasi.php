<div class="card">
<div class="kepalacard">Konfirmasi Pembayaran</div>
<div class="isicard" style="text-align:center">
<form method="get" action="" enctype="multipart/form-data">
	<div class="dh12">
	<input type="hidden" name="p" value="<?php echo "$_GET[p]"; ?>">
	<input type="hidden" name="idag" value="<?php echo "$_GET[idag]"; ?>">
	<input type="text" name="noorders"  placeholder="Masukkan No Order (Tanpa #)" value="<?php echo "$_GET[noorders]"; ?>">
	<br><input type="submit" value="Cari No. Order" />
	</div>
</form>

<?php
$sqlo = mysqli_query($kon, "select * from orders where noorders='$_GET[noorders]'");
$ro = mysqli_fetch_array($sqlo);
$sqlbyr = mysqli_query($kon, "select * from pembayaran where idorders='$ro[idorders]'");
$rbyr = mysqli_fetch_array($sqlbyr);
$rowbyr = mysqli_num_rows($sqlbyr);
$sqlag = mysqli_query($kon, "select * from anggota where idanggota='$ro[idanggota]'");
$rag = mysqli_fetch_array($sqlag);
$total = number_format($ro["total"]);
$jmltrs = number_format($rbyr["jumlahtransfer"]);
?>

<form id="form2" name="form2" method="post" action="" enctype="multipart/form-data">
	<input name="idorders" type="hidden" value="<?php echo "$ro[idorders]"; ?>">
	<input name="tglorders" type="text" value="<?php echo "Tanggal Order : $ro[tglorders] WIB"; ?>">
	<input name="nama" type="text" value="<?php echo "Atas Nama : $rag[nama]"; ?>">
	<input name="total" type="text" value="<?php echo "Sebesar : IDR $total"; ?>"><p>
	<h2>Dari Rekening</h2>
	<input name="namabankpengirim" type="text" placeholder="Nama Bank Pengirim" value="<?php echo "$rbyr[namabankpengirim]"; ?>">
	<input name="namapengirim" type="text" placeholder="Nama Pengirim" value="<?php echo "$rbyr[namapengirim]"; ?>">
	<input name="jumlahtransfer" type="text" placeholder="Jumlah Transfer" value="<?php echo "$jmltrs"; ?>">
	<input name="tgltransfer" type="date" placeholder="Tanggal Transfer ex : 0000-00-00" value="<?php echo "$rbyr[tgltransfer]"; ?>"><p>
	<h2>Ke Rekening</h2>
	<input name="namabankpenerima" type="text" placeholder="Nama Bank Penerima" value="<?php echo "$rbyr[namabankpenerima]"; ?>">
	<h2>Bukti Transfer</h2>
	<?php
	if($rowbyr > 0){
		echo "<div align='center'><a href='buktibayar/$rbyr[bukti]' target='_blank'><img src='buktibayar/$rbyr[bukti]' width='200px'></a></div>";
	}else{
		echo "<input name='bukti' type='file' placeholder='Nama Bank Penerima'>";
		echo "<input type='submit' name='konfirmasi' value='KONFIRMASI PEMBAYARAN'>";
	}
	?>
</form>

<?php
if($_POST["konfirmasi"]){
	$nmbukti  = $_FILES["bukti"]["name"];
	$lokbukti = $_FILES["bukti"]{"tmp_name"];
	if(!empty($lokbukti)){
		move_uploaded_file($lokbukti, "buktibayar/$nmbukti");
	}
	
	$sqlb = mysqli_query($kon, "insert into pembayaran (idorders, namabankpengirim, namapengirim, jumlahtransfer, tgltransfer, namabankpengirim, bukti) values ('$_POST[idorders]', '$_POST[namabankpengirim]', '$_POST[namapengirim]', '$_POST[jumlahtransfer]', '$_POST[tgltransfer]', '$_POST[namabankpenerima]', '$nmbukti')");
	
	if($sqlb){
		echo "Konfirmasi Pembayaran Berhasil";
	}else{
		echo "Konfirmasi Gagal";
	}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
</div>
</div>