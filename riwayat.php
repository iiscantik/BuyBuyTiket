<p><div class="container5">
<div class="grid">
<div class="dh12">
<?php
$sqlo = mysqli_query($kon, "select * from orders where idanggota='$rag[idanggota]' order by tglorders desc");
$no = 1;
while($ro = mysqli_fetch_array($sqlo)){
	$sqlod = mysqli_query($kon, "select * from orders where idorders='$ro[idorders]'");
	$rod = mysqli_fetch_array($sqlod);
	$sqlag = mysqli_query($kon, "select * from anggota where idanggota='$rod[idanggota]'");
	$rag = mysqli_fetch_array($sqlag);
	
	echo "<div class='dh12'>";
	echo "<div class='card'>";
	echo "<div class='isicard'>";
	echo "<h1>#$ro[noorders] - <small>$ro[statusorders]</small></h1>";
	echo "Tgl Order : $ro[tglorders] WIB <br>";
	echo "<table border='0' cellpadding='3px'>";
	$sqlordt = mysqli_query($kon, "select * from ordersdetail where idorders='$ro[idorders]'");
	while($rordt = mysqli_fetch_array($sqlordt)){
		$sqlpr = mysqli_query($kon, "select * from produk where idproduk='$rordt[idproduk]'");
		$rpr = mysqli_fetch_array($sqlpr);
		$sqlj = mysqli_query($kon, "select * from jasakirim where idjasa='$rordt[idjasa]'");
		$rj = mysqli_fetch_array($sqlj);
		$hrg = number_format($rpr["harga"]);
		$disk = ($rpr["harga"] * $rpr["diskon"]) / 100;
		$hargabaru = $rpr["harga"] - $disk;
		$hrgbr = number_format($hargabaru);
		$brt = $rordt["jumlahbeli"] * $rpr["berat"];
		$berat = $berat + $brt;
		
		if($rpr["diskon"] > 0){
			$diskon = "<font color='red'> - $rpr[diskon]%</font>";
			$hargalama = "<font style='text-decoration:line-through'>IDR $hrg </font>";
		}else{
			$diskon = "";
			$hargalama = "";
		}
		
		echo "<tr valign='top'>";
		echo "<td><img src='fotoproduk/$rpr[foto1]' height='50px'></td>";
		echo "<td><b>$rpr[nama]</b><br>$rordt[jumlahbeli] * IDR $hrgbr <br> $brt Kg * IDR $rj[tarif] (<b>$rj[nama]</b>)</td>";
		echo "</tr>";
	}
	echo "</table>";
	$total = number_format($ro["total"]);
	echo "</div>";
	echo "<div class='kepalacard'>Total : IDR $total</div>";
	echo "</div><br>";
	echo "</div>";
}	
?>
</div>
</div>
</div>