<?php
//include('dbconnected.php');
include "../config.php";


$id=$_GET['id'];
$nama=$_GET['nama'];
//query update
$query = "UPDATE hak_akses SET nama_akses='$nama' where id_akses='$id' ";
if (mysql_query($query)) {
	# credirect ke page index
	header("location:header.php?page=akses");
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}
?>