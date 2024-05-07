<?php
ob_start();
require '../php/config.php';
include('../templet/header.php');
$register=new Tambah();
if(isset($_POST["submit"])){
$result = $register->registration($_POST["id"], $_POST["nama_kategori"]);
if($result==1){  
    header("location:kategori.php");
    echo "<script>alert('Register Sukses');</script>";
}
elseif($result==10){
echo "<script>alert('Username or Email Has Alrady Taken');</script>";
}
elseif($result==100){
echo "<script>alert('Password does not match');</script>";
}
}
$obj=new CrudKategori;

?>



    <div class="container-fluid">
                 <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
              <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah kategori</a> -->
            </div>
            </div>

                <!-- Begin Page Content -->
                <div class="row">
                    <div class="w-100">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambah Kategori</h1>
                            </div>
                            <form method="post" class="user">
                                <div class="form-group ">
                                    <input type="hidden" name="id" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="id">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama_kategori" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="nama_kategori">
                                </div>
                                
                                <button name="submit" type="submit" value="submit" class="w-25 btn btn-primary btn-user btn-block submit">Tambah</button>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
        <!-- End of Content Wrapper -->
    </div>
    <?php include('../templet/footer.php')?>


