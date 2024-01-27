<?php
$sqlo = mysqli_query($kon, "update orders set statusorders='$_POST[statusorders]' where idorders='$_POST[idorders]'");

if($sqlo){
	echo "Status order sudah berhasil diubah";
}else{
	echo "Gagal merubah status order";
}

echo "META HTTP-EQUIV='Refresh' Content='1; URL=?p=orders&st=$_POST[st]'>";
?>