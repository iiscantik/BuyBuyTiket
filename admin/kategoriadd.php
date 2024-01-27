<a href="<?php echo "?p=kategori"; ?>"><button type="button" class='btn btn-add'>EVENT</button></a> &raquo; 
<button type="button" class='btn btn-dis'>Tambah Event</button>
<br>
<div class="card">
<div class="kepalacard">Tambah Event</div>
<div class="isicard" style="text-align:center;">
  <form name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="namakat" type="text" id="namakat" placeholder="Nama Event">
    <textarea name="ketkat" id="ketkat" placeholder="Keterangan Event"></textarea>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN EVENT">
  </form>

<?php
if($_POST["simpan"]){
  if(!empty($_POST["namakat"]) and !empty($_POST["ketkat"])){
    $sqlk = mysqli_query($kon, "insert into kategori (idadmin, namakat, ketkat, tglkat) values ('$ra[idadmin]', '$_POST[namakat]', '$_POST[ketkat]', NOW())");
	  
	if($sqlk){
	  echo "Event Berhasil Disimpan";
	}else{
  	  echo "Gagal Menyimpan";
	}
	  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategori'>";
  }else{
    echo "Data harus diisi dengan lengkap !!!";
  }
}
?>
</div>
</div>