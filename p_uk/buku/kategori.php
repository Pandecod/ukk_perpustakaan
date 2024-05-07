<?php
require_once '../php/config.php';
include('../templet/header.php');
$obj=new CrudKategori; 
?>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables Kategori</h1>
                
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                  
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php 
                                $no=1;
                                $data=$obj->tampilkategori();
                                while ($row=$data->fetch_array()){ 
                                ?>
                                <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nama_kategori']; ?></td>
                                <td> 
                                <a style="color:blue;" href="../php/hapusk.php?id=<?php echo $row['id']; ?>"onclick="return confirm('Yakin Hapus?')"> <i class="fas text-danger fa-lg fa-trash-alt"></i></a> 
                                </td>
                                </tr> 
                                <?php
                                    } 
                                    ?>
                              
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

   
    
 
   

              
<?php include('../templet/footer.php')?>