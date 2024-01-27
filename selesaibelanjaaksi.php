<div class="container5">
<div class="grid">
<div class="dh12">

<?php
//Membuat Nomor Order
$tgl = date("d");
$bln = date("m");
$thn = date("Y");
$jam = date("H");
$mnt = date("i");
$dtk = date("s");

//Menyimpan Data Order
mysqli_query($kon, "select into orders (noorders, idanggota, alamatkirim, tglorders, statusorders) values ('$thn$bln$tgl$jam$mnt$dtk', '$_POST[idag]', '$_POST[alamatkirim]', 'NOW()), 'Baru')");

//Mendapatkan ID Order
$idorders = mysqli_insert_id($kon);

//Memanggil Fungsi dan Menghitung Produk yang dipesan
$sqlc = mysqli_query($kon, "select * from cart where idanggota='$_POST[idag]'");
$rowc = mysqli_num_rows($sqlc);
$jml = $rowc;

//Menghapus data dari table cart
mysqli_query($kon, "delete from cart where idanggota='$_POST[idag]'");

//Menampilkan data dan order dari anggota
echo "<div class='kepalacard'>Terima Kasih</div>";
echo "<div class='isicard' style='text-align:left;'>";
echo "<p>NO. ORDER : <big><b>#$thn$bln$tgl$jam$mnt$dtk</b></big></p>";
echo "Nama <br> <big><b>$_POST[nama]</b></big><br>";
echo "Email <br> <big><b>$_POST[email]</b></big><br>";
echo "No. Handphone <br> <big><b>$_POST[nohp]</b></big><br>";
echo "Nama Event <br> <big><b>$_POST[namakat]</b></big><br>";
echo "Lokasi, Tanggal, Hari dan Jam event diadakan <br> <big><b>$_POST[ketkat]</b></big><br>";
echo "Akan Dikonfirmasi Paling Lambat pada <br> <big><b>$_POST[alamatkirim]</b></big><br>";
echo "</div>";
echo "</div>";

while($rc = mysqli_fetch_array($sqlc)){
	//Merubah Stok ditable produk
	$sqlp = mysqli_query($kon, "select * from produk where idproduk='$rc[idproduk]'");
	$rp = mysqli_fetch_array($sqlp);
	$stok = $rp["stok"];
	$jumlahbeli = $rc["jumlahbeli"];
	$stokakhir = $stok - $jumlahbeli;
	mysqli_query($kon, "update produk set stok='$stokakhir' where idproduk='$rc[idproduk]'");
	
	$no = $i + 1;
	$disk = ($rp["diskon"] * $rp["harga"]) / 100;
	$hrgbaru = $rp["harga"] - $disk;
	$subtotal = $jumlahbeli * $hrgbaru;
	$tot = $tot + $subtotal;
	$brt = $rp["berat"];
	$berat = $brt;
	$st = number_format($subtotal);
	$hrg = number_format($rp["harga"]);
	$hrgbr = number_format($hrgbaru);
	
	if($rp["diskon"] > 0){
		$diskon = "<font color='red'>-$rp[diskon]%</font>";
		$hrglama = "<font style='text-decoration:line-through'>IDR $hrg</font>";
	}else{
		$diskon = "";
		$hrglama = "";
	}
	
	if(!empty($rp["foto1"])){
		$foto1 = "fotoproduk/$rp[foto1]";
	}else{
		$foto1 = "fotoproduk/avatar.png";
	}
	
	echo "<div class='dh6'>";
	echo "<div class='card'>";
	echo "<div class='isicard'>";
	echo "<table width='100%' border='0' cellpadding='5' cellspacing='5'>";
	echo "<tr valign='top'>";
	echo "<td width='100px'>
			<img src='$foto1' width='100px'>
		  </td>";
	echo "<td>
			<big>$rp[nama]</big><p>
			$diskon $hrglama<br>
			<big>IDR $hrgbr * $jumlahbeli</big>
		  </td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "<div class='kepalacard'>";
	echo "Subtotal : IDR $st";
	echo "</div>";
	echo "</div>";
	echo "<br>";
	echo "</div>";
	
	//Simpan Data Detail Order
	mysqli_query($kon, "insert into ordersdetail (idorders, idproduk, idjasa, jumlahbeli, subtotal) values ('$idorders', '$rc[idproduk]', '$_POST[idjasa]', '$jumlahbeli', '$subtotal')");
}

$sqlj = mysqli_query($kon, "select * from jasakirim where idjasa='$_POST[idjasa]'");
$rj = mysqli_fetch_array($sqlj);
$tarif = $jumlahbeli * $rj["tarif"];
$trf = number_format($tarif);
$total = $tot + $tarif;
$t = number_format($total);

echo "<div class='dh12'>";
echo "<br>";
echo "<div class='kepalacard'>";
echo "Posisi Nonton Konser : $berat ";
echo "</div><br>";
echo "<div class='kepalacard'>";
echo "Paket Souvenir $rj[nama] : IDR $trf";
echo "</div><br>";
echo "<div class='kepalacard'>";
echo "Total : IDR $t";
echo "</div>";
echo "</div>";

//Update data total
mysqli_query($kon, "update orders set total='$total' where idorders='$idorders'");
?>

<br />
			NB :<br > Usahakan Mengisi Nama event dan keterangan sesuai dengan event yang kamu pilih jika tidak sesuai kamu tidak dibenarkan masuk kedalam lokasi event dan tiket hangus<p>
		  Silahkan Datang kelokasi untuk melalukan konfirmasi pembayaran digerbang masuk event sebelum jam yang kamu tetapkan untuk melakukan konfirmasi pembayaran, jika telat maka tiket kamu hangus<p>
		  Cetak faktur ini sebagai bukti booking tiket secara online, jika kamu lupa membawa atau mencetak faktur secara otomatis tiket kamu hangus, jika ingin tetap menonton kamu bisa melakukan pembelian secara online dan ofline, tergantung persediaan stok dan tentunya dengan harga yang berbeda. Saat dilokasi konfirmasi serahkan faktur kepada petugas untuk divalidasi, kemudian melakukan pembayaran sesuai yang tertera di faktur<p>
		  Setelah melakukan pembayaran kamu akan mendapatkan Wristband(tiket gelang), paket tiket, dan paket souvenir yang kamu pilih sebelumnya. Saat hari H usahakan datang minimal 1 jam sebelum event dimulai untuk mengantisipasi kerusuhan dan antrian masuk yang panjang
		  pastikan kamu membawa Wristband, dan tunjukan ke panitia kemudian kamu akan diarahkan ke tempat lokasi nonton sesuai paket tiket yang kamu pilih<p>

<div class="dh12">
	<div align="right"><a href="javascript:window.print()"><button type="button" class="btn btn-add">Cetak Faktur</button></a></div>
	</div>
	
</div>
</div>
</div>