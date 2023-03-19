<?php
//include('dbconnected.php');
session_start();
include "../config.php";


$id=$_GET['id'];
$nama=$_GET['isi'];
$dd = date("Y-m-d");
$kk = $_SESSION['idu'];
//query update
$query="UPDATE komplain SET id_user='$kk',isi='$nama',tgl_komplain='$dd' where id_komplain='$id'";
if (mysql_query($query)) {
	# credirect ke page index
	header("location:header.php?page=komplain");
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}
?>
<?php
include "../config.php";
$idA=$_GET['id_apus'];
$query = "DELETE from komplain where id_komplain='$idA' ";
if (mysql_query($query)) {
	header("location:header.php?page=komplain");
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}
?>