<?php
require '../php/config.php';

$register=new Tambahbuku();
if(isset($_POST["submit"])){
  header("location:buku.php");
$result = $register->addbuku($_POST["id"], $_POST["judul"], $_POST["penerbit"], $_POST["pengarang"], $_POST["tahun"], $_POST["kategori_id"], $_POST["harga"]);
if($result==1){
echo "<script>alert('Tambah buku berhasil!');</script>";
}
elseif($result==10){
echo "<script>alert('ube ade kategori to');</script>";
}
elseif($result==100){
echo "<script>alert('Password does not match');</script>";
}
}

include('../templet/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
<div class="card shadow mb-5 p-5">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Buku</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Tambah Buku</a> -->
</div>
<form class="user" method="post">
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Id</label> -->
    <input type="hidden" name="id" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Id">
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Judul</label> -->
    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="Judul">
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Penerbit</label> -->
    <input type="text" name="penerbit" class="form-control" id="exampleFormControlInput1" placeholder="Penerbit">
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Pengarang</label> -->
    <input type="text" name="pengarang" class="form-control" id="exampleFormControlInput1" placeholder="Pengarang">
  </div>
<div class="mb-3">
    <!-- <label for="exampleFormControlInput1" class="form-label">Tahun</label> -->
    <input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" placeholder="Tahun">
  </div>
<div class="mb-3">
<select class="form-control" name="kategori_id">
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
    <input type="text" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="harga">
  </div>
  <button name="submit" type="submit" value="submit" class="btn btn-primary btn-user btn-block submit">Tambah</button>
  </div>
  </form>

<!-- End of Content Wrapper -->
</div>
</div>
<!-- End of Page Wrapper -->


<?php include('../templet/footer.php'); ?>