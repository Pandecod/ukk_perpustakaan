<?php
require_once '../php/config.php';
$obj = new Crudbuku;
if(isset($_POST["submit"])){
$result = $obj->updateBuku($_POST["judul"], $_POST["penerbit"], $_POST["pengarang"],$_POST["tahun"],
 $_POST["kategori_id"], $_POST["harga"],$_POST["id"],$_POST["deskripsi"]); 
if($result==1){
echo "<script>alert('Data berhasil diperbaharui');</script>";
header("location:../buku/buku.php");
}else{
  echo"<script>alert('Data Gagal tll');</script>";
}
}
 if(!$obj->detailDataBuku($_GET['id']))die("Eror: id petugas not found");
include('../templet/header.php');
?>

<div class="container-fluid">
<div class="card shadow mb-5 p-5">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Buku</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Tambah Buku</a> -->
</div>
<form action="<?php echo $_SERVER['PHP_SELF'];?>"  class="user" method="post">
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Id</label> -->
    <input type="hidden" name="id" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Id"  value="<?php echo $obj->id;?>">
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Judul</label> -->
    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="Judul"  value="<?php echo $obj->judul;?>">
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Penerbit</label> -->
    <input type="text" name="penerbit" class="form-control" id="exampleFormControlInput1" placeholder="Penerbit" value="<?php echo $obj->penerbit;?>">
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Pengarang</label> -->
    <input type="text" name="pengarang" class="form-control" id="exampleFormControlInput1" placeholder="Pengarang" value="<?php echo $obj->pengarang;?>">
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Tahun</label> -->
    <input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" placeholder="Tahun" value="<?php echo $obj->tahun;?>">
  </div>
  <div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Tahun</label> -->
    <input type="text" name="deskripsi" class="form-control" id="exampleFormControlInput1" placeholder="deskripsi" value="<?php echo $obj->deskripsi;?>">
  </div>
<div class="mb-3">
<select class="form-control" name="kategori_id" value="<?php echo $obj->kategori_id;?>">
<?php
$crudKategori = new CrudKategori();
$result = $crudKategori->tampilKategori();
while($row = mysqli_fetch_assoc($result)) {
echo "<option value='" . $row['id'] . "'>" . $row['nama_kategori'] . "</option>";
}
?>
</select>
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Harga</label> -->
    <input type="text" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="harga" value="<?php echo $obj->harga;?>">
  </div>
  <button name="submit" type="submit" value="edit" class="btn btn-primary btn-user btn-block submit">edit</button>
  </div>
  </form>

<!-- End of Content Wrapper -->
</div>
</div>
<!-- End of Page Wrapper -->

<?php include('../templet/footer.php');?>