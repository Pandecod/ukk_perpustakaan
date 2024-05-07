<?php
require_once 'config.php';
$obj = new CrudKategori;
if(!$obj->detailDataKategori($_GET['id']))die("Eror: id not found");
$result = $obj->deleteKategori($_GET['id']);
if($result==1){
echo "<script>alert('Data berhasil dihapus');</script>";
header("location:../buku/kategori.php");
}
?>