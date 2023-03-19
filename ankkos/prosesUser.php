<?php
//include('dbconnected.php');
include "../config.php";


$id=$_GET['id'];
$nama=$_GET['nama'];
$almt=$_GET['alamat'];
$email=$_GET['email'];
$tlp=$_GET['telp'];
$usr=$_GET['user'];
$pss=$_GET['pass'];
//query update
$query = "UPDATE user SET nama='$nama', alamat='$almt', email='$email',
 telp='$tlp', username='$usr', password='$pss' where id_user='$id' ";
if (mysql_query($query)) {
	# credirect ke page index
	header("location:header.php?page=pengguna");
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}
?>