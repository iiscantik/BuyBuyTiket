<?php
$sqlj = mysqli_query($kon, "select * from jasakirim where idjasa='$_GET[idj]'");
$rj = mysqli_fetch_array($sqlj);
?>
<a href="<?php echo "?p=jasakirim"; ?>"><button type="button" class="btn btn-add">SOUVENIR</button></a>
<button type="button" class="btn btn-dis">Tambah Souvenir</button>
<div class="card">
<div class="kepalacard">Tambah Souvenir</div>
<div class="isicard" style="text-align:center;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
	<input type="hidden" name="idjasa" value="<?php echo "$rj[idjasa]"; ?>" />
	<input name="nama" type="text" id="nama" placeholder="Nama Paket Souvenir" value="<?php echo "$rj[nama]"; ?>"/>
	<textarea name="detail" id="detail" placeholder="Detail Paket Souvenir"><?php echo "$rj[detail]"; ?></textarea>
	<input name="tarif" type="text" id="tarif" placeholder="Harga Paket Souvenir" value="<?php echo "$rj[tarif]"; ?>" />
	<p><img src="<?php echo "../fotosouvenir/$rj[logo]"; ?>" width="200px" />
	<input name="logo" type="file" id="logo" />
	<input name="simpan" type="submit" id="simpan" value="Simpan Souvenir" />
</form>

<?php
if($_POST["simpan"]){
	if(!empty($_POST["nama"]) and !empty($_POST["tarif"]) and !empty($_POST["detail"])){
	$nmlogo  = $_FILES["logo"]["name"];
	$loklogo = $_FILES["logo"]["tmp_name"];
	if(!empty($loklogo)){
	   move_uploaded_file($loklogo, "../fotosouvenir/$nmlogo");
	   $logo = ", logo='$nmlogo'";
	}else{
	   $logo = "";
	}
	
	$detail = nl2br($_POST["detail"]);
	
	$sqlj = mysqli_query($kon, "update jasakirim set nama='$_POST[nama]', detail='$detail' $logo, tarif='$_POST[tarif]' where idjasa='$_POST[idjasa]'");
	
	if($sqlj){
		echo "Souvenir Berhasil Disimpan";
	}else{
		echo "Gagal Menyimpan";
	}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jasakirim'>";
	}else{
		echo "Data harus Diisi dengan Lengkap !!!";
	}
}
?>