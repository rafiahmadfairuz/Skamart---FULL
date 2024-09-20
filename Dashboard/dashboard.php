<?php
session_start();
require_once "../config/database.php";
$conn = connectDatabase();
$query = "SELECT 
mb.kode_barang, 
mb.nama_barang, 
mk.nama_kategori, 
mg.harga
FROM 
master_barang mb
JOIN 
master_kategori mk ON mb.kode_kategori = mk.kode_kategori
LEFT JOIN 
master_gambar mg ON mb.kode_barang = mg.kode_barang";
$sql = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Skamart</title>
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="<?= '../asset/style.css' ?>">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- DATATABLES -->
  <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.6/datatables.min.css" rel="stylesheet">
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
  <?php include '../components/Navbar.php'; ?>
  <!-- BODY -->
  <div class="container">
    <div class="row column-gap-3 p-3 ms-3">
      <a class="col-4 mb-4 btn btn-success fw-bold text-nowrap" href="nextutama.php"> + Tambah Produk</a>

      <table id="tabelData" class="table table-hover table-striped border border-dark table-bordered">
        <thead class="bg-secondary">
          <tr>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php while ($data = mysqli_fetch_assoc($sql)) { ?>
            <tr>
              <th scope="row"><?php echo $data['kode_barang'] ?></th>
              <td><?php echo $data['nama_barang'] ?></td>
              <td><?php echo $data['nama_kategori'] ?></td>
              <td>Rp. <?php echo $data['harga'] ?></td>
              <td>
                <a href="detail.php?view=<?php echo  $data['kode_barang']; ?>" class="btn btn-primary rounded"><i class="bi fw-bold  bi-eye"></i></a>
                <a href="next1.php?update=<?php echo  $data['kode_barang']; ?>" class="btn btn-success rounded"><i class="bi fw-bold  bi-box-arrow-up"></i></a>
                <a data-bs-toggle="modal" data-bs-target="#modalHapus" class="btn btn-danger rounded"><i class="bi fw-bold  bi-trash3"></i></a>
                <a href="next2.php?rating=<?php echo  $data['kode_barang']; ?>" class="btn btn-warning rounded"><i class="bi fw-bold text-dark bi-star"></i></a>
              </td>
            </tr>


          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>


  <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah Anda Yakin Ingin Hapus Data?
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" data-bs-dismiss="modal">Batalkan</button>
          <a href="SemuaProses.php?delete=<?php echo  $data['kode_barang']; ?>" class="btn btn-danger">Yakin</a>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_SESSION['modal_message'])) {
    echo "
        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog  modal-dialog-centered'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h1 class='modal-title fs-5' id='exampleModalLabel'> {$_SESSION['modal_header']}</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body fw-bold text-center my-4'>
                {$_SESSION['modal_message']}
              </div>
            </div>
          </div>
        </div>
        ";

    unset($_SESSION['modal_message']);
  }
  ?>

  <!-- =========================================================================================================================== -->
  <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.6/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="<?= '../asset/das.js' ?>"></script>
  <script>
    $(document).ready(function() {
      $('#tabelData').DataTable();
    });

    document.addEventListener('DOMContentLoaded', function() {
      var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'));
      exampleModal.show();
    });
  </script>
</body>

</html>