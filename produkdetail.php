<div class="container5">
	<div class="grid">
		<div class="dh12">
 <?php
  $sqlp = mysqli_query($kon, "select * from produk where idproduk='$_GET[idp]'");
  $rp = mysqli_fetch_array($sqlp);
  $sqlk = mysqli_query($kon, "select * from kategori where idkat='$rp[idkat]'");
  $rk = mysqli_fetch_array($sqlk);
  $hrg = number_format($rp['harga']);
	if($rp['stok']>0){
		$stok = "<font color='#00CC00'>Stok Tersedia</font>";
	}else{
		$stok = "<font color='#FF0000'>Stok Habis</font>";
	}
	if($rp['diskon']>0){
		$disk = ($rp['diskon'] * $rp['harga']) / 100;
		$hrgbaru = $rp['harga'] - $disk;
		$hrgbr = number_format($hrgbaru);
		$diskon = "<font color='#FF0000'> -$rp[diskon]% </font>";
		$hrglama = "<font style='text-decoration:line-through'><small>IDR $hrg</small></font>";
	}else{
		$hrgbr = "";
		$diskon = "";
		$hrglama = "<b>$hrg</b>";
	}
  	echo "<div class='dh12'>";
	echo "<div class='card'>";
	echo "<div class='isicard' style='text-align:center;'>";
    echo "<br>";
  	echo "<img src='fotoproduk/$rp[foto1]' border='1' width='140px'>
		  <img src='fotoproduk/$rp[foto2]' border='1' width='140px'>
			<hr>
			<big>$rp[nama]</big>
			<hr>
			<b>IDR $hrgbr</b> $diskon $hrglama
			<hr>
			<b>$stok</b>
			<hr>
			<b>Posisi Nonoton Konser : $rp[berat] </b>
			<hr>
			<b>Benefit yang Diperoleh </b> <br>$rp[spesifikasi]
			<hr>
			<b>Detail Tiket</b> <br>$rp[detail]
			<hr>
			<b>Isi Paket Tiket</b> <br>$rp[isikotak]
			<hr>
			<small><i>Dibuat pada $rp[tglproduk] WIB </i></small>";
	echo "</div>";
	echo "<div class='kakicard'>";
	echo "<br>
			<a href='?p=keranjang&idp=$rp[idproduk]&idag=$rag[idanggota]'><button type='button' class='btn btn-add'>Beli Sekarang</button></a>";
	echo "</div>";
	echo "</div><br>";
	echo "</div>";
  ?>
		</div>
	</div>
</div>