<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="<?= 'asset/style.css' ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    
<?php include 'components/NavLP.php'; ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h1 class="fw-bold">Pembayaran</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <form>
                <h3 class="fw-bold">Alamat Pengiriman</h3>
                <label class="w-100 mb-3">
                    Alamat lengkap <br>
                    <input type="text" class="form-control">
                </label>
                <label class="w-100 mb-3">
                    Provinsi <br>
                    <input type="text" class="form-control">
                </label>
                <label class="w-100 mb-3">
                    Kabupaten / Kota <br>
                    <input type="text" class="form-control">
                </label>
                <label class="w-100 mb-3">
                    Kode POS <br>
                    <input type="number" class="form-control">
                </label>

                <h3 class="fw-bold mt-5">Kurir Pengiriman</h3>
                <label class="w-100 mb-3 border rounded p-2">
                    <input type="radio" name="kurir">
                    <img src="asset/img/kurir-1.png">
                    <span class="float-end">+ IDR 10.000</span>
                </label>
                <label class="w-100 mb-3 border rounded p-2">
                    <input type="radio" name="kurir">
                    <img src="asset/img/kurir-2.png">
                    <span class="float-end">+ IDR 12.000</span>
                </label>

                <h3 class="fw-bold mt-5">Metode Pembayaran</h3>
                <label class="w-100 mb-3 border rounded p-2">
                    <input type="radio" name="pembayaran">
                    Transfer Bank
                </label>
                <label class="w-100 mb-3 border rounded p-2">
                    <input type="radio" name="pembayaran">
                    Cash on Delivery (COD)
                </label>
                <label class="w-100 mb-3 border rounded p-2">
                    <input type="radio" name="pembayaran">
                    <img src="asset/img/bayar-1.png">
                </label>
                <label class="w-100 mb-3 border rounded p-2">
                    <input type="radio" name="pembayaran">
                    <img src="asset/img/bayar-2.png">
                </label>
                <label class="w-100 mb-3 border rounded p-2">
                    <input type="radio" name="pembayaran">
                    <img src="asset/img/bayar-3.png">
                </label>
            </form>
        </div>

        <div class="col-md-4 offset-md-1">
            <div class="card bayar">
                <div class="card-header bg-white">
                    <h3 class="fw-bold">Detail Pembayaran</h3>
                </div>
                <div class="card-body">
                    <div class="row mt-2 mb-2">
                        <div class="col-md"><small>Sub Total</small></div>
                        <div class="col-md">IDR 145.400</div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md"><small>Biaya pengiriman</small></div>
                        <div class="col-md">IDR 10.000</div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md"><small>Total</small></div>
                        <div class="col-md">IDR 155.400</div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-lg btn-success w-100">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid text-dark-50 footer pt-5 mt-5" id="footer">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(8, 7, 1, 0.5)">
            <div class="row g-4">
                <div class="col-lg-3 w-100 d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <a class="fw-bold fs-2 logo text-decoration-none" href="index.html">Skamart</a>
                    <div class="input-container">
                        <input required="" placeholder="Kritik dan Saran" type="email">
                        <button class="invite-btn" type="button">
                            Kirim
                        </button>  
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="fw-bold mb-3">Kenapa Memilih Kami?</h4>
                    <p class="mb-4">"Skamart, tempat Anda menemukan segala kebutuhan dengan harga terjangkau dan kualitas terbaik. Kami menyediakan produk berkualitas, dari bahan pokok hingga barang unik, dengan pelayanan yang ramah dan terpercaya"</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="fw-bold mb-3">Sosial Media</h4>
                    <div class="icon-sosmed fs-2 d-flex column-gap-4 mt-2">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-tiktok"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="fw-bold mb-3">Navigasi</h4>
                    <a class="text-reset text-decoration-none" href="index.html">Beranda</a>
                    <a class="text-reset text-decoration-none" href="index.html">Produk</a>
                    <a class="text-reset text-decoration-none" href="index.html">Promo</a>
                    <a class="text-reset text-decoration-none" href="index.html">Tentang kami</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="fw-bold mb-3">Contact</h4>
                    <div class="d-flex align-items-center column-gap-2 my-3">
                        <i class="bi bi-geo-alt-fill me-2 fs-4"></i>
                        <span>Sampang, Pamekasan, Madura</span>
                    </div>
                    <div class="d-flex align-items-center column-gap-2 my-3">
                        <i class="bi bi-envelope-open-fill me-2 fs-5"></i>
                        <span>skamart@gmail.com</span>
                    </div>
                    <div class="d-flex align-items-center column-gap-2 my-3">
                        <i class="bi bi-telephone-fill fs-4"></i>
                        <span class="text-nowrap">+62 345 6543 9685</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?= 'asset/main.js' ?>"></script>
</body>
</html>
