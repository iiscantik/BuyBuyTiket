<a href="<?php echo "?p=produk"; ?>"><button type="button" class="btn btn-add">TIKET KONSER</button></a>
<button type="button" class="btn btn-dis">Tambah Tiket</button>
<br />
<div class="card">
<div class="kepalacard">Tambah Tiket</div>
<div class="isicard" style="text-align:center;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
	<?php
	$sqlk = mysqli_query($kon, "select * from kategori order by namakat asc");
	echo "<select name='idkat'>";
	echo "<option value=''>Kategori</option>";
	while($rk = mysqli_fetch_array($sqlk)){
		echo "<option value='$rk[idkat]'>$rk[namakat]</option>";
	}
	echo "</select>";
	?>
	<input name="nama" type="text" id="nama" placeholder="Nama Tiket" />
	<input name="harga" type="text" id="harga" placeholder="Harga Tiket (dalam Rp.)" />
	<input name="stok" type="text" id="stok" placeholder="Stok Tiket" />
	<textarea name="spesifikasi" id="spesifikasi" placeholder="Benefit yang Diperoleh"></textarea>
	<textarea name="detail" id="detail" placeholder="Detail Tiket"></textarea>
	<input name="diskon" type="text" id="diskon" placeholder="Diskon Tiket (dalam %)" />
	<input name="berat" type="text" id="berat" placeholder="Posisi Nonton Konser (dilihat dari panggung)" />
	<textarea name="isikotak" id="isikotak" placeholder="Isi dalam Paket Konser"></textarea>
	<input name="foto1" type="file" id="foto1">
	<input name="foto2" type="file" id="foto2">
	<input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK" />
</form>
	
<?php
if($_POST["simpan"]){
	if(!empty($_POST["idkat"]) and !empty($_POST["nama"]) and !empty($_POST["harga"]) and !empty($_POST["stok"]) and !empty($_POST["spesifikasi"]) and !empty($_POST["detail"]) and !empty($_POST["berat"]) and !empty($_POST["isikotak"])){
	$nmfoto1 = $_FILES["foto1"]["name"];
	$lokfoto1 = $_FILES["foto1"]["tmp_name"];
	if(!empty($lokfoto1)){
		move_uploaded_file($lokfoto1, "../fotoproduk/$nmfoto1");
	}
	
	$nmfoto2 = $_FILES["foto2"]["name"];
	$lokfoto2 = $_FILES["foto2"]["tmp_name"];
	if(!empty($lokfoto2)){
		move_uploaded_file($lokfoto2, "../fotoproduk/$nmfoto2");
	}
	
	$spek   = nl2br($_POST["spesifikasi"]);
	$detail = nl2br($_POST["detail"]);
	$isi    = nl2br($_POST["isikotak"]);
	
	$sqlp = mysqli_query($kon, "insert into produk (idkat, idadmin, nama, harga, stok, spesifikasi, detail, diskon, berat, isikotak, foto1, foto2, tglproduk) values ('$_POST[idkat]', '$ra[idadmin]', '$_POST[nama]', '$_POST[harga]', '$_POST[stok]', '$spek', '$detai', '$_POST[diskon]', '$_POST[berat]', '$isi', '$nmfoto1', '$nmfoto2', NOW())");
	
	if($sqlp){
		echo "Tiket Berhasil disimpan";
	}else{
		echo "Gagal Menyimpan";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
  }else{
    echo "Data harus diisi dengan Lengkap !!!";
	}
}
?>