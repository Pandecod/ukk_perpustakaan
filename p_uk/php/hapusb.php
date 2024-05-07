<?php
require_once 'config.php';
$obj = new Crudbuku ;
if(!$obj->detailDatabuku($_GET['id']))die("Eror: id not found");
$result = $obj->deletebuku($_GET['id']);
if($result==1){
echo "<script>alert('Data berhasil dihapus');</script>";
header("location:../buku/buku.php");
}
?>