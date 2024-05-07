<?php
require_once '../php/config.php';
include('../templet/header.php');
$buku = new Crudbuku();
if(isset($_GET['cari'])){
    $keyword = isset($_GET['cari']) ? $_GET['cari'] : '';
    $result = $buku->searchBuku($keyword);
} else {
    $result = $buku->tampilBuku();
}
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  id="example1" class="table table-bordered table-striped text-center" width="100%" cellspacing="0">
                                    <thead> 
                                        <tr>
                                        <th scope="col">no</th>
                                        <th scope="col">id</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">deskripsi</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Pengarang</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">kategori_id</th>
                                        <th scope="col">Harga</th>
                                       
                                        </tr>
                                  </thead>
                                      <?php 
                                        $no=1;
                                        while ($row = $result->fetch_array()){  ?>
                                        <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $row['id']; ?></td>
                                          <td><?php echo $row['judul']; ?></td>
                                          <td><?php echo $row['deskripsi']; ?></td>
                                          <td><?php echo $row['penerbit']; ?></td>
                                          <td><?php echo $row['pengarang']; ?></td>
                                          <td><?php echo $row['tahun']; ?></td>
                                          <td><?php echo $row['kategori_id']; ?></td>
                                          <td><?php echo $row['harga']; ?></td>
                                         
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