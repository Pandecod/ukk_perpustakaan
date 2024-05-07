<?php
require '../php/config.php';
 $register=new Register();
 if(isset($_POST["submit"])){
  $result = $register->registration($_POST["id"], $_POST["nama"], $_POST["username"], $_POST["password"], $_POST["cpass"], $_POST["level"]);
  if($result==1){
    header("location:login.php");
    echo"<script>alert('Register sukses')</script>";
  }elseif($result==10){
    echo"<script>alert('Username or Email Has Alrady Taken')</script>";
  }elseif($result==100){
    echo"<script>alert('Password does not match')</script>";
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../../aset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../aset/css/sb-admin-2.min.css" rel="stylesheet" />
  </head>
  <style>
    .image{
        background:url(../vidio/book.jpg);
        background-position:center;
        background-size:cover;
    }
</style>

<body class="bg-gradient-primary">

      <div class="container">

          <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                  <div class="col-lg-5 d-none d-lg-block image"></div>
                      <div class="col-lg-7">
                          <div class="p-5">
                              <div class="text-center">
                                  <h1 class="h4 text-gray-900 mb-4">Register Akun</h1>
                              </div>
                              <form method="post" class="user">
                              <div class="form-group">
                                          <input type="hidden" name="id" class="form-control form-control-user" id="id"
                                              placeholder="Id">
                                  </div>
                                  <div class="form-group">
                                          <input type="text" name="nama" class="form-control form-control-user" id="nama"
                                              placeholder="Nama">
                                  </div>

                                  <div class="form-group">
                                      <input type="text" name="username" class="form-control form-control-user" id="username"
                                          placeholder="Username">
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-6 mb-3 mb-sm-0">
                                          <input type="password" name="password" class="form-control form-control-user"
                                              id="password" placeholder="Password">
                                      </div>
                                  <div class="form-group">
                                  <div class="col-sm-6">
                                          <input type="password" name="cpass" class="form-control form-control-user"
                                              id="cpass" placeholder="Confirm Password">
                                  </div>
                                  </div>
                                  <div class="form-group">
                                      <select name="level" id="">
                                          <option value="">Pilih level</option>
                                          <option value="user">User</option>
                                          <option value="admin">Admin</option>
                                      </select>
                                  </div>
                                  <button type="submit" name="submit" value="submit" class="btn btn-primary btn-user btn-block">
                                      Register Akun
                                  </button>
                              </form>
                              <hr>
                              <div class="text-center">
                                  <a class="small" href="login.php">Sudah punya akun? Login!</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>

<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
