<?php
require '../php/config.php';
$buku = new CrudBuku();
if(isset($_GET['cari'])){
    $keyword = isset($_GET['cari']) ? $_GET['cari'] : '';
    $result = $buku->searchBuku($keyword);
} else {
    $result = $buku->tampilBuku();
}

include('../templet/header.php');
?>


     <!-- Begin Page Content -->
     <div class="container-fluid">
     <?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    echo "<b class='p-3'>Hasil pencarian : ".$cari."</b>";
}
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Buku</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Tambah Buku</a> -->
</div>
<div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">id</th>
                                  <th scope="col">Judul</th>
                                  <th scope="col">Penerbit</th>
                                  <th scope="col">Pengarang</th>
                                  <th scope="col">Tahun</th>
                                  <th scope="col">kategori_id</th>
                                  <th scope="col">Harga</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <?php 
                                $no=1;
                                while ($row = $result->fetch_array()){  ?>
                                <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['judul']; ?></td>
                                  <td><?php echo $row['penerbit']; ?></td>
                                  <td><?php echo $row['pengarang']; ?></td>
                                  <td><?php echo $row['tahun']; ?></td>
                                  <td><?php echo $row['nama_kategori']; ?></td>
                                  <td><?php echo $row['harga']; ?></td>
                                  <td>
                                    <a style="color: blue" href="t_buku.php?id=<?php echo $row['id']; ?>">Edit | </a>
                                    <a style="color: blue" href="../php/hapusb.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                                  </td>
                                </tr>
                                <?php
                                  } 
                              ?>
                          </table>
                      </div>
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include('../templet/footer.php'); ?>

