<?php
require_once '../php/config.php';
if(!isset($_SESSION["id"])){
    header("Location:login.php");
    exit();
}
include('../templet/header.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php
include('../templet/footer.php');
?>