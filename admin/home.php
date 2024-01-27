<div class="grid">
	<!-- Untuk Kategori -->
	<?php 
	$sqlk = mysqli_query($kon, "select * from kategori");
	$rowk = mysqli_num_rows($sqlk);
	$sqlkl = mysqli_query($kon, "select * from kategori orders by tglket desc limit 2");
	?>
	<div class="dh3">
		<div id="boxval">
		<p>Event</p>
		<h3><?php echo "$rowk"; ?></h3>
	</div>
	<div class="card">
		<div class="kepalacard">Event Terbaru</div>
		<div class="isicard">
			<?php 
			if($rowk == 0){
				echo "Belum ada kategori ditambahkan";
			}else{
				echo"<hr>";
				while($rkl = mysqli_fetch_array($sqlk)){
				echo "<big>$rkl[namakat]</big>
					<br>$rkl[kekat]
					<hr>";
				}
			}
			?>
			</div>
			<div class="kakicard">
				<a href="<?php echo "?p=kategori"; ?>"><button type="button" class="btn btn-add">Lihat Semua Event &raquo;</button></a>
			</div>
		</div>
		<br>
	</div>
		
		<!-- untuk produk -->
		<?php 
		$sqlp = mysqli_query($kon, "select * from produk");
		$rowp = mysqli_num_rows($sqlp);
		$sqlpl = mysqli_query($kon, "select * from produk order by tglproduk desc limit 1");
		?>
		<div class="dh3">
		  <div id="boxval">
		  <p>Tiket</p>
		  <h3><?php echo "$rowp"; ?></h3>
		</div>
		<div class="card">
		   <div class="kepalacard">Tiket Terbaru</div>
		   <div class="isicard" style="text-align:center;">
		      <?php
			  if($rowp == 0){
			  	echo "<div align='center'>Belum ada produk dutambahkan</div>";
				}else{
					while($rpl = mysqli_fetch_array($sqlpl)){
					$hrg = number_format($rpl["harga"]);
					$nm = substr($rpl["nama"],0,30);
					if($rpl["stok"] > 0){
						$stok = "<font color='#00CC00'>Stok Tersedia</font>";
				}else{
					$stok = "<font color='#FF0000'>Stok  Habis </font>";
				}
				
				if($rpl["diskon"] > 0){
					$disk = ($rpl["diskon"] * $rpl["harga"]) / 100;
					$hrgbaru = $rpl["harga"] - $disk;
					$hrgbr = number_format($hrgbaru);
					$diskon = "<font color='#FF0000'> -$rpl[diskon]% </font>";
					$hrglama = "<font style='text-decoration:line-through'><small>IDR $hrg</small></font>";
				}else{
					$hrgbr = "";
					$diskon = "";
					$hrglama = "<b>$hrg</b>";
				}
				echo "<br>";
				echo "<img src='../fotoproduk/$rpl[foto1]' height='60px'>";
				echo "<img src='../fotoproduk/$rpl[foto2]' height='60px'>";
				echo "<hr>";
				echo "<b>$nm..</b>";
				echo "<hr>";
				echo "<b>IDR $hrgbr</b> $diskon $hrglama";
				echo "<hr>";
				echo "<b>$stok</b>";
				echo "<hr>";
			}
		}
		?>
		</div>
		<div class="kakicard">
			<a href="<?php echo "?p=produk"; ?>"><button type="button" class="btn btn-add">Lihat Semua Tiket &raquo;</button></button></a>
			</div>
		</div>
		<br>
	</div>
	
	<!-- Untuk Anggota -->
	<?php 
	$sqlag = mysqli_query($kon, "select * from anggota");
	$rowag = mysqli_num_rows($sqlag);
	$sqlagl = mysql_query($kon, "select * from anggota order by tgldaftar desc limit 1");
	?>
	<div class="dh3">
		<div id="boxval">
			<p>Anggota</p>
			<h3><?php echo "$rowag"; ?></h3>
		</div>
		<div class="card">
			<div class="kepalacard">Anggota Terbaru</div>
			<div class="isicard">
				<?php
				if($rowag == 0){
					echo "<hr>";
					echo "<div align='center'>Belum ada anggota yang terdaftar</div>";
					echo "<hr>";
				}else{
					while($ragl = mysqli_fetch_array($sqlagl)){
					echo "<br>";
					echo "<div align='center'><img src='../foto/$ragl[foto]'height='64px' style='border='border-radius:50%'></div>";
					echo "<hr>";
					echo "<b>$ragl[nama]</b>";
					echo "<hr>";
					echo "<b>$ragl[email]";
					echo "<hr>";
					echo "<b>$ragl[nohp]";
					echo "<hr>";
				}
			}
			?>
			</div>
			<div class="kakicard">
				<a href="<?php echo "?p=anggota";?>"><button type="button" class="btn btn-add">Lihat Semua Anggota &raquo;</button></a>
			</div>
		</div>
	<br />
</div>

<!-- Untuk Pembelian -->
		<?php 
		$sqlp = mysqli_query($kon, "select * from produk");
		$rowp = mysqli_num_rows($sqlp);
		$sqlpl = mysqli_query($kon, "select * from produk order by tglproduk desc limit 2");
		$sqlc = mysqli_query($kon, "select * from cart where idcart='$id[$i]'");
		$rc = mysqli_fetch_array($sqlc);
		$sqlpi = mysqli_query($kon, "select * from produk where idproduk='$rc[idproduk]'");
		$rp = mysqli_fetch_array($sqlpi);
		$stok = $rp["stok"];
		?>
		<div class="dh3">
		  <div id="boxval">
		  <p>Stok Tiket</p>
		  <h3><?php echo "$rowp"; ?></h3>
		</div>
		<div class="card">
		   <div class="kepalacard">Stok Tiket Terbaru</div>
		   	<div class="isicard" style="text-align:center;">
		  <?php
			if($rowp == 0){
				echo "Belum ada kategori ditambahkan";
			}else{
				echo"<hr>";
				while($rpl = mysqli_fetch_array($sqlpl)){
				echo "<big>$rpl[nama]</big>
					 <br>Stok Tersisa $rpl[stok] Tiket
					<hr>";
				}
			}
			?>
			</div>
			<div class="kakicard">
			<a href="<?php echo "?p=penjualan"; ?>"><button type="button" class="btn btn-add">Lihat Semua Stok Tiket &raquo;</button></button></a>
			</div>
		</div>
		<br>
	</div>
	
</div>