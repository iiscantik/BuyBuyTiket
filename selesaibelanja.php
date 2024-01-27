<p><div class="container5">
	<div class="grid">
		<div class="dh12">
			<div class="card">
				<div class="kepalacard">Proses Checkout</div>
				<div class="isicard" style="text-align:center;">
					<form method="post" action="<?php echo "?p=selesaibelanjaaksi"; ?>" enctype="multipart/form-data">
						<input name="idag" type="hidden" value="<?php echo "$rag[idanggota]"; ?>">
						<input name="email" type="text" value="<?php echo "$rag[email]"; ?>">
						<input name="nama" type="text" value="<?php echo "$rag[nama]"; ?>">
						<input name="nohp" type="text" value="<?php echo "$rag[nohp]"; ?>">
						<input name="namakat" type="text" placeholder="Masukkan Nama Event yang dipilih "><p>
						<textarea name="ketkat" placeholder="Masukan Lokasi,Tanggal,Hari,Jam event yang di pilih diadakan ex:(lapangan gor h.agus salim padang, 28 feb 2024 jam 19.00 sampai selesai)"></textarea><p>
						<textarea name="alamatkirim" placeholder="Masukkan Hari dan jam konfirmasi pembayaranmu di pintu gerbang masuk event acara max h-2, min 5 jam sebelum acara dimulai"></textarea><P>
						<?php
						$sqlj = mysqli_query($kon, "select * from jasakirim order by nama asc");
						echo "<select name='idjasa'>";
						echo "<option value='0'>Pilih Paket Souvenir</option>";
						while($rj = mysqli_fetch_array($sqlj)){
							echo "<option value='$rj[idjasa]'>$rj[nama]</option>";
						}
						echo "</select>";
						?>
						<input type="submit" name="Submit" value="PROSES CHECKOUT">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>