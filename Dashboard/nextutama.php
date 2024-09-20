<?php session_start(); ?>
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
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
  <?php include '../components/Navbar.php'; ?>
  <!-- BODY -->
  <div class="container p-3 mt-3">

    <form action="SemuaProses.php" method="post">
      <div class="mb-3">
        <label for="kode_barang" class="form-label fw-bold">Kode Barang</label>
        <input type="text" class="form-control border-success" id="kode_barang" name="kode_barang" required>
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label fw-bold">Nama Kategori</label>
        <select class="form-select border-success" name="nama_kategori" id="kategori" required>
          <option selected>Nama Kategori</option>
          <option value="Jajanan">Jajanan</option>
          <option value="Minuman">Minuman</option>
          <option value="Bumbu">Bumbu</option>
          <option value="Buah">Buah</option>
          <option value="Sayuran">Sayuran</option>
          <option value="Kebutuhan Harian">Kebutuhan Harian</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="nama_barang" class="form-label fw-bold">Nama Barang</label>
        <input type="text" class="form-control border-success" name="nama_barang" id="nama_barang" required>
      </div>

      <div class="mb-3">
        <label for="keterangan_barang" class="form-label fw-bold">Keterangan</label>
        <textarea style="max-height: 100px;" name="keterangan_barang" type="text" class="form-control border-success" id="keterangan_barang" required></textarea>
      </div>


      <div class="mb-3">
        <label for="satuan" class="form-label fw-bold">Satuan</label>
        <select class="form-select border-success" name="satuan" id="satuan" required>
          <option selected>Satuan</option>
          <option>Kg</option>
          <option>Pcs</option>
          <option>Pak</option>
          <option>Karton</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="diskon" class="form-label fw-bold">Diskon</label>
        <input type="number" name="diskon" class="form-control border-success" id="diskon" required>
      </div>


      <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-success me-2 fw-bold" name="next" value="satu">Next</button>
        <button type="reset" name="reset" class="btn btn-outline-danger">Cancel</button>
      </div>
    </form>
  </div>

  <!-- =========================================================================================================================== -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="<?= '../asset/das.js' ?>"></script>
</body>

</html>