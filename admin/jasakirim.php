<button type="button" class="btn btn-dis">SOUVENIR</button>
<a href="<?php echo "?p=jasakirimadd"; ?>"><button type="button" class="btn btn-add">Tambah Souvenir</button></a>
<br />
<?php
$sqlj = mysqli_query($kon, "select * from jasakirim order by nama asc");
while($rj = mysqli_fetch_array($sqlj)){
	$tarif = number_format($rj["tarif"]);
	echo "<div class='dh3'>";
	echo "<div class='card'>";
	echo "<div class='isicard' style='text-align:center;'><br>";
	echo "<img src='../fotosouvenir/$rj[logo]' border='0' width='200px' height='120px'>
		<hr>
		<big>$rj[nama]</big>
		<hr>
		<b>IDR $tarif</b>
		<hr>";
	echo "</div>";
	echo "<div class='kakicard'>";
	echo "<a href='?p=jasakirimedit&idj=$rj[idjasa]'><button type='button' class='btn btn-add'>Ubah Souvenir</button></a>";
	echo "<a href='?p=jasakirimdel&idj=$rj[idjasa]'><button type='button' class='btn btn-add'>Hapus Souvenir</button></a>";
	echo "</div>";
	echo "</div><br>";
	echo "</div>";
}
?>