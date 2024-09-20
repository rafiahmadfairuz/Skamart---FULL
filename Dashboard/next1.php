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
    <div class="d-flex row justify-content-center  py-3 container-fluid detail ">

        <form action="SemuaProses.php" method="POST" class="col-md-6 order-1 order-md-0" enctype="multipart/form-data">

            <div class="mb-3">

                <?php
                require_once "../config/database.php";
                $conn = connectDatabase();

                if (isset($_GET['update'])) {
                    $kode = $_GET['update'];
                    $sql = mysqli_query($conn, "SELECT * FROM master_barang WHERE kode_barang = $kode");
                    $data = mysqli_fetch_assoc($sql);
                ?>

                    <input type="hidden" class="form-control border-success" id="kodeBarang" name="kode_barang" value="<?php echo $data['kode_barang'] ?>">
                <?php } else { ?>
                    <label for="kodeBarang" class="form-label fw-bold">Kode Barang</label>
                    <input type="text" class="form-control border-success" id="kodeBarang" name="kode_barang" value="<?php echo $_SESSION['kode_barang'] ?>" disabled>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="imageInput" class="form-label fw-bold">Gambar Poduk <span class="fw-bold text-danger">(Masukkan 6 Gambar)</span></label>
                <input type="file" multiple class="form-control border-success" id="imageInput" name="gambar[]" accept=".jpg,.png" required>
                <?php
                if (isset($_SESSION['peringatan'])) {
                    echo '<span class="text-danger fw-bold">' . $_SESSION['peringatan'] . '</span>';
                    unset($_SESSION['peringatan']); // Hapus peringatan setelah ditampilkan
                }
                ?>
            </div>

            <?php if (isset($_GET['update'])) { ?>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" name="simpan" value="gambar" class="btn btn-success me-2 fw-bold">Save Edit</button>
                <?php } else { ?>
                    <div class="mb-3">
                        <label for="varian" class="form-label fw-bold">Varian</label>
                        <input type="text" class="form-control border-success" id="varian" name="varian" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label fw-bold">Harga</label>
                        <input type="number" class="form-control border-success" id="harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="sttok" class="form-label fw-bold">Jumlah Stok</label>
                        <input type="number" class="form-control border-success" id="sttok" name="stok" required>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" name="next" value="dua" class="btn btn-success me-2 fw-bold">Next / Save</button>
                    <?php } ?>

                    <button type="reset" name="reset" class="btn btn-outline-danger">Cancel</button>
                    </div>
        </form>

        <div id="carouselExampleIndicators" class="carousel slide d-flex flex-column col-10 col-lg-4 mt-5">
            <div class="carousel-indicators" id="carouselIndicators"></div>
            <div class="carousel-inner border shadow" id="carouselInner"></div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <span id="carouselImageNumber" class="border mt-3 py-2 px-5 fw-bold shadow bg-light">Image 1 / 0</span>
        </div>
        <!-- =========================================================================================================================== -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="<?= '../asset/das.js' ?>"></script>

</body>

</html>