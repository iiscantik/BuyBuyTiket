<button type="button" class='btn btn-dis'>PENJUALAN</button> &raquo; 
<br>
  <?php
  $sqlp = mysqli_query($kon, "select * from produk");
  $rowp = mysqli_num_rows($sqlp);
  $sqlpl = mysqli_query($kon, "select * from produk order by tglproduk desc limit 2");
  $sqlc = mysqli_query($kon, "select * from cart where idcart='$id[$i]'");
  $rc = mysqli_fetch_array($sqlc);
  $sqlpi = mysqli_query($kon, "select * from produk where idproduk='$rc[idproduk]'");
  $rp = mysqli_fetch_array($sqlpi);
  $no = 1;
  $stok = $rp["stok"];
  while($rpl = mysqli_fetch_array($sqlp)){
  	echo "<div class='dh3'>";
	echo "<div class='card'>";
	echo "<div class='isicard'>";
  	echo "<hr><big>$rpl[nama]</big> 
			<hr>Stok Tersisa $rpl[stok] Tiket
			<hr><small><i>Dibuat pada $rpl[tglproduk] WIB 
			<br>Oleh $ra[namalengkap]</i></small>";
	echo "</div>";
	echo "<div class='kakicard'>";
	echo "</div>";
	echo "</div><br>";
	echo "</div>";
  }
  ?>
