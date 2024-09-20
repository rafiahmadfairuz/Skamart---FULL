<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skamart</title>
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="<?= 'asset/style.css' ?>">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>


  <?php include 'components/NavLP.php'; ?>
  <!-- CAROUSEL -->
  <div id="banner" class="carousel slide container-md py-3 " data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#banner" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#banner" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner rounded-4 shadow" id="carousel-dalam" data-bs-interval="10000">
      <div class="carousel-item active">
        <img src="asset/img/carouselgakatekart.png" class="d-block w-100" alt="..."></img>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="asset/img/sayuranfitcomcarousel.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="asset/img/carousel fitcom.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- ============================================ -->


  <!-- KATEGORI -->
  <div class="kategori container  py-sm-2  d-flex flex-column " id="beranda">
    <h4 class="fw-bold mb-3 ms-0 ms-lg-4">Kategori tersedia</h4>
    <div class="d-flex ">
      <div class="isi-kategori d-flex justify-content-between text-center  flex-fill">
        <div class="mx-3 kotak d-flex flex-column justify-content-center align-items-center rounded-1" data-category="Jajanan">
          <div class="kotak-kategori shadow-sm d-flex justify-content-center align-items-center border rounded">
            <img src="asset/icon/download__14_-removebg-preview.png" alt="">
          </div>
          <span class="mt-1 fw-bold">Jajanan</span>
        </div>

        <div class="mx-3 kotak d-flex flex-column justify-content-center align-items-center rounded-1" data-category="Minuman">
          <div class="kotak-kategori shadow-sm d-flex justify-content-center align-items-center border rounded">
            <img src="asset/icon/Olatte_drink_Pin_pink_ver__1_-removebg-preview.png" alt="">
          </div>
          <span class="mt-1 fw-bold">Minuman</span>
        </div>
        <div class="mx-3 kotak d-flex flex-column justify-content-center align-items-center rounded-1" data-category="Bumbu">
          <div class="kotak-kategori shadow-sm d-flex justify-content-center align-items-center border rounded">
            <img src="asset/icon/download__15_-removebg-preview.png" alt="">
          </div>
          <span class="mt-1 fw-bold">Bumbu</span>
        </div>
        <div class="mx-3 kotak d-flex flex-column justify-content-center align-items-center rounded-1" data-category="Sayuran">
          <div class="kotak-kategori shadow-sm d-flex justify-content-center align-items-center border rounded">
            <img src="asset/icon/sayuran icon.png" alt="">
          </div>
          <span class="mt-1 fw-bold">Sayuran</span>
        </div>
        <div class="mx-3 kotak d-flex flex-column justify-content-center align-items-center rounded-1" data-category="Buah">
          <div class="kotak-kategori shadow-sm d-flex justify-content-center align-items-center border rounded">
            <img src="asset/icon/buah.png" alt="">
          </div>
          <span class="mt-1 fw-bold">Buah</span>
        </div>
        <div class="mx-3 kotak d-flex flex-column justify-content-center align-items-center rounded-1" data-category="ItemHarian">
          <div class="kotak-kategori shadow-sm d-flex justify-content-center align-items-center border rounded">
            <img src="asset/icon/sabun.png" alt="">
          </div>
          <span class="mt-1 fw-bold">Item Harian</span>
        </div>
      </div>
    </div>
  </div>


  <!-- ============================================ -->


  <!-- PROMO -->

  <div class="container my-3 my-md-5 d-flex justify-content-center align-items-center" id="promo">
    <div class=" promo d-flex flex-column flex-lg-row justify-content-between py-3 py-md-5 rounded">
      <div class="d-flex flex-column col-12 col-lg-3 px-0 px-lg-5 ms-3 ms-lg-0 ">
        <h1 class="fw-bold mb-2 mb-md-4 display-2 ">Flash Sale</h1>
        <h4 class="fw-bold my-2 d-none d-lg-block">Diskon tiap hari sampai 70%!</h4>
        <p class="d-none d-lg-block">Mau nikmatin Flash Deal? Beli Sekarang Di Skamart</p>
      </div>


      <div class="pr">
        <div class="kotak-promo d-flex justify-content-around ">
          <a href="detailProduct.html" class="text-decoration-none mx-2 card d-flex" id="card-promo">
            <img loading="lazy" src="asset/img/download (6).jpeg" class="card-img-top align-self-center mt-2" alt="...">
            <div class="card-body text-nowrap">
              <span class="card-title fs-5">Chitato</span><br>
              <span class="border border-success text-success px-2">Jajanan</span>
              <span class="border border-danger text-success px-2">PROMO</span>
              <div class="d-flex align-items-center column-gap-2 text-nowrap">
                <h5 class="card-text fw-bold my-1">Rp 5.000</h5>
                <span class="text-secondary">Stok: 30</span>
              </div>
              <div class="d-flex align-items-center column-gap-2 text-nowrap">
                <span class="text-secondary text-decoration-line-through">Rp 25.000</span>
                <span class="fw-bold text-success">70%</span>
              </div>
              <div class="d-flex align-items-center d-none d-md-block"><i class="bi bi-geo-alt-fill text-success me-2"></i><span>Madura</span></div>
              <div class="rating d-flex align-items-center">
                <div class="d-flex  align-items-center">
                  <i class="bi bi-star-fill me-2 text-warning "></i>
                  <span>4.5</span>
                </div>
                <div class="vr mx-2"></div>
                <span class="ulasan">51 (Ulasan)</span>
              </div>
            </div>
          </a>
          <a href="detailProduct.html" class="text-decoration-none mx-2 card " id="card-promo">
            <img loading="lazy" src="asset/img/download (1).jpeg" class="card-img-top align-self-center mt-2" alt="...">
            <div class="card-body text-nowrap">
              <span class="card-title fs-5">Gulaku</span><br>
              <span class="border border-success text-success px-2">Bumbu</span>
              <span class="border border-danger text-success px-2">PROMO</span>
              <div class="d-flex align-items-center column-gap-2 text-nowrap">
                <h5 class="card-text fw-bold my-1">Rp 5.000</h5>
                <span class="text-secondary">Stok: 30</span>
              </div>
              <div class="d-flex align-items-center column-gap-2 text-nowrap">
                <span class="text-secondary text-decoration-line-through">Rp 25.000</span>
                <span class="fw-bold text-success">70%</span>
              </div>
              <div class="d-flex align-items-center d-none d-md-block"><i class="bi bi-geo-alt-fill text-success me-2"></i><span>Madura</span></div>
              <div class="rating d-flex align-items-center">
                <div class="d-flex  align-items-center">
                  <i class="bi bi-star-fill me-2 text-warning "></i>
                  <span>4.5</span>
                </div>
                <div class="vr mx-2"></div>
                <span class="ulasan">51 (Ulasan)</span>
              </div>
            </div>
          </a>
          <a href="detailProduct.html" class="text-decoration-none mx-2 card " id="card-promo">
            <img loading="lazy" src="asset/img/download (4).jpeg" class="card-img-top align-self-center mt-2" alt="...">
            <div class="card-body text-nowrap">
              <span class="card-title fs-5">Susu Kental Manis</span><br>
              <span class="border border-success text-success px-2">Minuman</span>
              <span class="border border-danger text-success px-2">PROMO</span>
              <div class="d-flex align-items-center column-gap-2 text-nowrap">
                <h5 class="card-text fw-bold my-1">Rp 24.000</h5>
                <span class="text-secondary">Stok: 30</span>
              </div>
              <div class="d-flex align-items-center column-gap-2 text-nowrap">
                <span class="text-secondary text-decoration-line-through">Rp 25.000</span>
                <span class="fw-bold text-success">70%</span>
              </div>
              <div class="d-flex align-items-center d-none d-md-block"><i class="bi bi-geo-alt-fill text-success me-2"></i><span>Madura</span></div>
              <div class="rating d-flex align-items-center">
                <div class="d-flex  align-items-center">
                  <i class="bi bi-star-fill me-2 text-warning "></i>
                  <span>4.5</span>
                </div>
                <div class="vr mx-2"></div>
                <span class="ulasan">51 (Ulasan)</span>
              </div>
            </div>
          </a>
          <a href="detailProduct.html" class="text-decoration-none mx-2 card " id="card-promo">
            <img loading="lazy" src="asset/img/download (4).jpeg" class="card-img-top align-self-center mt-2" alt="...">
            <div class="card-body text-nowrap">
              <span class="card-title fs-5">Susu Kental Manis</span><br>
              <span class="border border-success text-success px-2">Minuman</span>
              <span class="border border-danger text-success px-2">PROMO</span>
              <div class="d-flex align-items-center column-gap-2 text-nowrap">
                <h5 class="card-text fw-bold my-1">Rp 24.000</h5>
                <span class="text-secondary">Stok: 30</span>
              </div>
              <div class="d-flex align-items-center column-gap-2 text-nowrap">
                <span class="text-secondary text-decoration-line-through">Rp 25.000</span>
                <span class="fw-bold text-success">70%</span>
              </div>
              <div class="d-flex align-items-center d-none d-md-block"><i class="bi bi-geo-alt-fill text-success me-2"></i><span>Madura</span></div>
              <div class="rating d-flex align-items-center">
                <div class="d-flex  align-items-center">
                  <i class="bi bi-star-fill me-2 text-warning "></i>
                  <span>4.5</span>
                </div>
                <div class="vr mx-2"></div>
                <span class="ulasan">51 (Ulasan)</span>
              </div>
            </div>
          </a>
        </div>
      </div>


    </div>

  </div>
  <!-- ============================================ -->


  <!-- DISPLAY PRODUK -->

  <div class="container py-5" id="produk">
    <div class="judul-produk  d-flex justify-content-between align-items-center">
      <h4 class="fw-bold ms-0 ms-lg-4 text-center text-nowrap">Temukan Kebutuhan Anda</h4>
      <div class="dropdown">
        <i class="bi bi-funnel fs-3" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
        <ul class="dropdown-menu dropdown-menu-light border shadow-sm p-3" style="width: 60vw;">
          <div class="w-100 d-flex justify-content-center justify-content-lg-end">
            <button type="button" class="btn btn-success" id="resetFilter">Reset Filter</button>
          </div>
          <hr class="text-success">
          <li class="mb-3">
            <label for="priceRange" class="form-label">Range Harga</label>
            <div class="d-flex align-items-center">
              <input type="number" name="hargarendah" class="form-control" id="minHarga" placeholder="Min" min="1" max="10000000" step="5000">
              <hr class="mx-2 w-25">
              <input type="number" name="hargatinggi" class="form-control" id="maxHarga" placeholder="Max" min="1" max="10000000" step="5000">
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="mb-3">
            <label for="stockRange" class="form-label">Range Stok</label>
            <div class="d-flex align-items-center">
              <input type="range" name="" class="form-range flex-grow-1" id="rangeStok" value="500" min="1" max="500">
              <span class="ms-2 text-nowrap" id="stokTerpilih">500</span>
            </div>
          </li>

          <li class="mb-3">
            <label for="ratingOrder" class="form-label">Urutkan Rating</label>
            <select id="ratingOrder" name="rating" class="form-select">
              <option value="">Pilih Urutan Rating</option>
              <option value="highest">Tertinggi</option>
              <option value="lowest">Terendah</option>
            </select>
          </li>
        </ul>
      </div>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-4 row-cols-xl-5 g-4 " id="displayProduk" id="product-container">
      <?php
      require_once 'controller/productcontroller.php';
      showAllProducts();
      ?>

    </div>
  </div>
  <!-- ============================================ -->



  <!--TENTANG KAMI -->
  <div class="container-fluid" id="tentang">
    <h1 class="fw-bolder ms-0 ms-lg-4 pt-5 text-center display-3">Tentang Kami</h1>
    <div class="d-flex py-5 justify-content-center ">

      <div class="d-flex justify-content-between pembungkus-about">
        <div class="mx-2 card-about  rounded-5  p-3">
          <h1 class="text-end">01</h1>
          <div class="t-a d-flex flex-column justify-content-center  ">
            <h3 class="fw-bold">Buka dan Melayani Selama 24 Jam.</h3>
            <p>Toko kami buka setiap saat, 24/7, untuk kenyamanan Anda.</p>
          </div>
        </div>


        <div class="mx-2 card-about dua rounded-5  p-3">
          <h1 class="text-end">02</h1>
          <div class="t-a d-flex flex-column justify-content-center  ">
            <h3 class="fw-bold">Tersedia Berbagai Kebutuhan Pokok.</h3>
            <p>Kami memastikan semua kebutuhan pokok Anda tersedia dengan lengkap.</p>
          </div>
        </div>


        <div class="mx-2 card-about tiga rounded-5  p-3">
          <h1 class="text-end">03</h1>
          <div class="t-a d-flex flex-column justify-content-center  ">
            <h3 class="fw-bold">Termurah Di Indonesia.</h3>
            <p>Dapatkan barang dengan harga terendah di Indonesia hanya di sini.</p>
          </div>
        </div>


        <div class="mx-2 card-about empat rounded-5  p-3">
          <h1 class="text-end">04</h1>
          <div class="t-a d-flex flex-column justify-content-center  ">
            <h3 class="fw-bold">Bisa Dikirim Ke Rumah Anda.</h3>
            <p>Pesan hari ini, dan barang akan dikirim langsung ke rumah Anda.</p>
          </div>
        </div>







      </div>
    </div>
  </div>

  <!-- ============================================ -->

  <!-- BEST SELLER -->


  <div class="container py-5" id="palinglaris">
    <h4 class="fw-bold ms-0 ms-lg-4 text-nowrap">Produk Paling Laris</h4>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-4 g-4 " id="produkTerlaris">

      <?php
      $stmt = $conn->prepare("SELECT 
    mb.kode_barang, 
    mb.nama_barang, 
    mb.satuan,
    mb.diskon,
    mg.jumlah_stok,
    mg.varian,
    mk.nama_kategori, 
    mg.harga,
    mg.url_gambar,
    mg.kode_gambar,
    mr.nilai AS rating
FROM 
    master_barang mb
LEFT JOIN 
    master_gambar mg ON mb.kode_barang = mg.kode_barang
LEFT JOIN 
    master_kategori mk ON mb.kode_kategori = mk.kode_kategori
LEFT JOIN 
    master_rating mr ON mb.kode_barang = mr.kode_barang
ORDER BY 
    mg.jumlah_stok DESC;
");
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = mysqli_fetch_assoc($result)) {
        $gambarUtama = explode(',', $row['url_gambar'])[0];

        echo "<a href='index.php?id=" . htmlspecialchars($row['kode_barang']) . "' class='text-decoration-none col card-produk' 
        data-kategori='" . htmlspecialchars($row['nama_kategori']) . "' 
        data-harga='" . htmlspecialchars($row['harga']) . "' 
        data-stok='" . htmlspecialchars($row['jumlah_stok']) . "' 
        data-nama='" . htmlspecialchars($row['nama_barang']) . "'>
            <div class='card mx-auto'>
                <img loading='lazy' src='asset/uploads/" . htmlspecialchars($gambarUtama) . "' 
                class='card-img-top' alt='" . htmlspecialchars($row['kode_gambar']) . "'>
                <div class='card-body text-nowrap'>
                    <span class='card-title fs-5'>" . htmlspecialchars($row['nama_barang']) . "</span><br>
                    <span class='border border-success text-success px-2'>" . htmlspecialchars($row['nama_kategori']) . "</span>
                    <div class='d-flex align-items-center column-gap-1 text-nowrap'>
                        <h5 class='card-text fw-bold my-1'>Rp " . htmlspecialchars($row['harga']) . "</h5>
                    </div>
                    <span class='text-secondary stok'>Stok: " . htmlspecialchars($row['jumlah_stok']) . "</span>
                    <div class='rating d-flex align-items-center'>
                        <div class='d-flex align-items-center'>
                            <i class='bi bi-star-fill me-2 text-warning'></i>
                            <span>" . htmlspecialchars($row['rating']) . "</span>
                        </div>
                        <div class='vr mx-1 mx-md-2'></div>
                        <span class='ulasan'>" . htmlspecialchars($row['jumlah_stok']) . " (Terjual)</span>
                    </div>
                </div>
            </div>
        </a>";
      }
      ?>


    </div>
  </div>
  <!-- ============================================ -->




  <!-- FOOTER -->

  <div class="container-fluid text-dark-50 footer pt-5 mt-5 " id="footer">
    <div class="container py-5">
      <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(8, 7, 1, 0.5)">
        <div class="row g-4">

          <div class="col-lg-3  w-100 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <a class="fw-bold fs-2 logo text-decoration-none" href="index.html">Skamart</a>
            <div class="input-container ">
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
        <div class="col-lg-3 col-md-6 ">
          <div class="footer-item ">
            <h4 class="fw-bold mb-3">Contact</h4>
            <div class="d-flex align-items-center column-gap-2 my-3">
              <i class="bi bi-geo-alt-fill me-2 fs-4"></i>
              <span>Sampang , Pamekasan , Madura</span>
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


  <!-- ============================================ -->
  <div class="modal fade" id="modalBerhasilh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sukses</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h2 class="fw-bold text-center">Sukses Hapus Item</h2>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['modal_message'])) {
    echo "
    <div class='modal fade' id='exampleModall' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h1 class='modal-title fs-5' id='exampleModalLabel'>{$_SESSION['modal_header']}</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body fw-bold text-center my-4'>
            {$_SESSION['modal_message']}
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var myModall = new bootstrap.Modal(document.getElementById('exampleModall'));
        myModall.show();
      });
    </script>
    ";
    unset($_SESSION['modal_message']);
  }
  ?>

  <?php
  $userId = isset($_SESSION['kode_user']) ? $_SESSION['kode_user'] : null;
  ?>

  <script>
    if ('<?php echo $userId; ?>') {
      sessionStorage.setItem('userId', '<?php echo $userId; ?>');
      var userId = sessionStorage.getItem('userId');
      console.log(userId);
    }
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="<?= 'asset/main.js' ?>"></script>
</body>

</html>