<?php
//include('dbconnected.php');
include "../config.php";


$id=$_GET['id'];
$nama=$_GET['nomer'];
$almt=$_GET['kamar'];
$email=$_GET['lantai'];
$tlp=$_GET['harga'];
//query update
$query="UPDATE kamar SET nomer_kamar='$nama',kmr_mndi='$almt',lantai='$email',harga='$tlp' where id_kamar='$id'";
if (mysql_query($query)) {
	# credirect ke page index
	header("location:header.php?page=kamar");
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}
?>
<?php
include "../config.php";
$idA=$_GET['id_apus'];
$query = "DELETE from kamar where id_kamar='$idA' ";
if (mysql_query($query)) {
	header("location:header.php?page=kamar");
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}
?>