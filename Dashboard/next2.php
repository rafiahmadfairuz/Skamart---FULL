<?php
session_start();
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
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
  <?php include '../components/Navbar.php'; ?>
  <!-- BODY -->
  <div class="container p-5 mt-5">

    <form action="SemuaProses.php" method="post">

      <div class="mb-3">

        <?php
        require_once "../config/database.php";
        $conn = connectDatabase();

        if (isset($_GET['rating'])) {
          $kode = $_GET['rating'];
          $sql = mysqli_query($conn, "SELECT * FROM master_barang WHERE kode_barang = $kode");
          $data = mysqli_fetch_assoc($sql);
        ?>
          <input type="hidden" class="form-control border-success" id="kodeBarang" name="kode_barang" value="<?php echo $data['kode_barang'] ?>">
        <?php } else { ?>
          <label for="productName" class="form-label fw-bold">Kode Barang</label>
          <input type="text" class="form-control border-success" id="productName" placeholder="Masukkan Kode Barang" value="<?php echo $_SESSION['kode_barang'] ?>" disabled>
          <div class="mb-3">
            <label for="kode_rating" class="form-label fw-bold">Kode Rating</label>
            <input type="text" class="form-control border-success" id="kode_rating" placeholder="Kode_Rating Auto Increment" disabled>
          </div>
        <?php } ?>
      </div>
      <div class="mb-3">
        <label for="nilai" class="form-label fw-bold">Nilai</label>
        <select class="form-select border-success" name="nilai" id="nilai" required>
          <option selected>Nilai 1 - 5</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>

      <div class="d-flex justify-content-end mt-3">
        <?php if (isset($_GET['rating'])) { ?>
          <button type="submit" name="simpan" value="rating" class="btn btn-success me-2 fw-bold">Save Edit</button>
        <?php } else { ?>
          <button type="submit" name="next" value="tiga" class="btn btn-success me-2 fw-bold">Save / Add</button>
        <?php } ?>
        <button type="reset" name="reset" class="btn btn-outline-danger">Back</button>
      </div>
    </form>
  </div>
  <!-- =========================================================================================================================== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="<?= '../asset/das.js' ?>"></script>
</body>

</html>