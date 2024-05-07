<?php
require_once '../php/config.php';
$obj = new Crudbuku;
if(isset($_POST["submit"])){
$result = $obj->updateBuku($_POST["id"], $_POST["judul"], $_POST["deskripsi"], $_POST["penerbit"], $_POST["pengarang"], $_POST["tahun"], $_POST["kategori_id"], $_POST["harga"]);
if($result==1){
echo "<script>alert('Data berhasil diperbaharui');</script>";
header("location:buku.php");
}
}
if(!$obj->detailDataBuku($_GET['id']))die("Eror: id petugas not 
found");
include ('../templet/header.php');

?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<div class="container">

    <!-- Outer Row -->
    <div class="row">

        <div class="w-100">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Detail Buku</h1>
                                </div>
                                <table>
                                <!-- <tr>
                                    <td>ID</td>
                                    <td>:</td>
                                    <td><?php echo $obj->id;?></td>
                                </tr> -->
                                <tr>
                                    <td>JUDUL</td>
                                    <td>:</td>
                                    <td><?php echo $obj->judul;?></td>
                                </tr>
                                <tr>
                                    <td>DESKRIPSI</td>
                                    <td>:</td>
                                    <td><?php echo $obj->deskripsi;?></td>
                                </tr>
                                <tr>
                                    <td>PENERBIT</td>
                                    <td>:</td>
                                    <td><?php echo $obj->penerbit;?></td>
                                </tr>
                                <tr>
                                    <td>PENGARANG</td>
                                    <td>:</td>
                                    <td><?php echo $obj->pengarang;?></td>
                                </tr>
                                <tr>
                                    <td>TAHUN</td>
                                    <td>:</td>
                                    <td><?php echo $obj->tahun;?></td>
                                </tr>
                                <tr>
                                    <td>KATEGORI ID</td>
                                    <td>:</td>
                                    <td><?php echo $obj->k_id;?></td>
                                </tr>
                                <tr>
                                    <td>HARGA</td>
                                    <td>:</td>
                                    <td><?php echo $obj->harga;?></td>
                                </tr>

                                </table>
                                    <br>
                                    <div>
                                        <a name="submit" value="submit" type="submit" class="btn btn-primary btn-user btn-block" href="buku.php">Kembali</a>
                                    </div>
                                <!-- <button name="submit" type="submit"  class="w-25 btn btn-primary btn-user btn-blocks">
                                    Kembali
                                </button> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <?php include ('../templet/footer.php');?>