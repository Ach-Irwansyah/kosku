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
$lv=$_GET['level'];
//query update
$query = "UPDATE user SET nama='$nama', alamat='$almt', email='$email',
 telp='$tlp', username='$usr', password='$pss', id_akses='$lv' where id_user='$id' ";
if (mysql_query($query)) {
	# credirect ke page index
	header("location:header.php?page=pengguna");
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}
?>

<?php
include "../config.php";
$idA=$_GET['id_apus'];
$query = "DELETE from user where id_user='$idA' ";
if (mysql_query($query)) {
	header("location:header.php?page=pengguna");
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}
?>