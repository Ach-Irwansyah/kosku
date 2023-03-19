<?php
//include('dbconnected.php');
session_start();
include "../config.php";
$idA=$_GET['id_apus'];
$query = "DELETE a,b from sewa a, tagihan b where a.id_sewa=b.id_sewa AND a.id_sewa='$idA' ";
if (mysql_query($query)) {
	header("location:header.php?page=sewa");
}
else{
	echo "ERROR, data gagal diapus ". mysql_error();
}
?>
<?php
$idS=$_GET['id_apuss'];
$idU=$_GET['id_apusu'];
$query = "delete a,s from sewa a left join tagihan s on a.id_sewa=s.id_sewa where s.id_sewa IS NULL AND a.id_user='$idU' AND a.id_sewa='$idS' ";
if (mysql_query($query)) {
	header("location:header.php?page=sewa");
}
else{
	echo "ERROR, data gagal diapus ". mysql_error();
}
?>
<?php
$id=$_GET['id_baru'];
$awal=$_GET['awal'];
$nama=$_GET['bayarr'];
$dd = date("Y-m-d");
$query="UPDATE tagihan SET tgl_pembayaran='$dd', nominal=(nominal+$nama) WHERE id_sewa='$id'";
if (mysql_query($query)) {
	# credirect ke page index
	header("location:header.php?page=sewa");
}
else{
	echo "ERROR, data gagal diupdate ". mysql_error();
}
?>
<?php

$id=$_GET['id'];
$nama=$_GET['bayar'];
$dd = date("Y-m-d");
//query update
$query="insert into tagihan values('','$id','$dd','$nama','')";
if (mysql_query($query)) {
	# credirect ke page index
	header("location:header.php?page=sewa");
}
else{
	echo "ERROR, data gagal ditambah". mysql_error();
}

?>