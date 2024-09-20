<?php require_once 'controller/cartcontroller.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Porduct</title>
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="<?= 'asset/style.css' ?>">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="modal fade" id="modalBerhasil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sukses</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h2 class="fw-bold text-center">Sukses Tambah Item</h2>
        </div>
      </div>
    </div>
  </div>
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

  <?php include 'components/NavLP.php'; ?>
  <div class="container-fluid d-flex justify-content-center ">
    <?php
    if ($product) {
      $gambarArray = explode(',', $product['url_gambar']); 

      echo "   <div class='container-fluid d-flex justify-content-center '>
        <div class='container d-flex flex-column flex-xl-row justify-content-center py-lg-5 column-gap-4 detail-produk'>
            <!-- IMAGE PRODUCT -->
            <div class='d-flex flex-column align-items-center align-items-xl-start'>
                <h2 class='fw-bold d-none d-xl-block'>" . htmlspecialchars($product['nama_barang']) . "</h2>
                <div class='bungkusImg'><img src='asset/uploads/" . htmlspecialchars($gambarArray[0]) . "' alt='" . htmlspecialchars($product['kode_gambar']) . "' class='img-utama zoom rounded  mt-3'> <!-- Tampilkan gambar utama --></div>
               
                <div class='mt-3 d-flex justify-content-center bungkusImgKecil'>";


      foreach ($gambarArray as $index => $gambar) {
        echo "<img src='asset/uploads/" . htmlspecialchars($gambar) . "' alt='" . htmlspecialchars($product['kode_gambar']) . "' class='img-kecil border rounded mx-1' data-id='" . ($index + 1) . "'>";
      }

      echo "      </div>
            </div>
            
            <!-- DESKRIPSI -->
            <div class='py-3 col-12 col-xl-4'>
                <div class='border-bottom'>
                  
                    <h1 class='display-6 text-nowrap'>" . ($product['nama_barang']) . "</h1>
                    <div class='text-nowrap d-flex align-items-center column-gap-2 w-100 my-4'>
                        <span>Terjual <span class='text-secondary'>" . htmlspecialchars($product['jumlah_stok']) . "</span></span>
                        <div class='d-flex align-items-center'>
                            <i class='bi bi-star-fill me-2 text-warning'></i>
                            <span>4.5 <span class='text-secondary d-none d-sm-inline'>(" . htmlspecialchars($product['rating']) . " rating)</span></span>
                        </div>
                    </div>
                    <h1 class='fw-bold'>Rp  " . htmlspecialchars($product['harga']) . "</h1>
                </div>
    
                <div>
                    <h2 class='border-bottom py-2'>Detail</h2>
                    <div class='py-4'>
                        <p><span class='text-secondary'>Sisa Stok: </span><span class='fw-bolder'>" . htmlspecialchars($product['jumlah_stok']) . "</span></p>
                        <p><span class='text-secondary'>Kategori: </span>" . htmlspecialchars($product['nama_kategori']) . "</p>
                        <p><span class='text-secondary'>Satuan: </span>" . htmlspecialchars($product['satuan']) . "</p>
                        <p><span class='text-secondary'>Asal pengiriman: </span> Madura </p>
                        <p><span class='text-secondary'>Garansi: </span>1 " . htmlspecialchars($product['varian']) . "</p>
                        <div class='deskripsi mt-4 border-top border-1 py-3'>
                            <div class='row align-items-center'>
                              <div class='d-flex justify-content-between align-items-center'>
                                <h4>Deskripsi Produk</h4>
                                <i class='bi bi-caret-down-fill fs-3' type='button' data-bs-toggle='collapse' data-bs-target='#productDescription' aria-controls='productDescription' aria-expanded='false' aria-label='Toggle description'></i>
                              </div>
                                <div class='collapse border-top pt-2' id='productDescription'>
                                   " . htmlspecialchars($product['keterangan_detail']) . "
                                </div>
                            </div>
                        </div>
                          
                    </div>
                </div>
            </div>
    
    
            <!-- CO -->
            <div class='border border-2 rounded p-3 co my-xl-4 bg-light shadow'>
                <div class='border-bottom py-3'>
                    <h4 class='fw-bold'>Atur Pesanan</h4>
                    <div class='d-flex align-items-center column-gap-2'>
                        <img src='asset/uploads/" . htmlspecialchars($gambarArray[0]) . "' alt='" . htmlspecialchars($product['kode_gambar']) . "' class='img-co'>
                        <p> " . htmlspecialchars($product['nama_barang']) . "</p>
                    </div>
                </div>
                <div class='d-flex justify-content-between align-items-center my-4'>
                    <p class='text-secondary text-nowrap'>Subtotal: </p>
                    <h4 class='text-nowrap'>Rp  " . htmlspecialchars($product['harga']) . "</h4>
                </div>
                <div class='d-flex flex-column'>
                    <a href='pembayaran.php?kode_barang=" . htmlspecialchars($product['kode_barang']) . "' class=' text-decoration-none btn btn-success mb-2 card-link fw-bold '>Beli</a>
                <button class=\"btn btn-outline-success fw-bold text-nowrap\" onclick=\"addToCart('" . htmlspecialchars($product['kode_barang']) . "', '" . $_SESSION['kode_user'] . "')\">Masukkan Keranjang</button>



                </div>
            </div>
        </div>
    </div>";
    } else {
      echo "Detail produk tidak tersedia.";
    }
    ?>
  </div>


  <!-- FOOTER -->

  <div class="container-fluid text-dark-50 footer pt-5 mt-5" id="footer">
    <div class="container py-5">
      <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(8, 7, 1, 0.5)">
        <div class="row g-4">

          <div class="col-lg-3  w-100 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <a class="fw-bold fs-2 logo text-decoration-none" href="index.html">Skamart</a>
            <div class="input-container ">
              <input required="" placeholder="Kritik dan Saran" type="email">
              <button class="invite-btn" type="reset">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="<?= 'asset/main.js' ?>"></script>
</body>

</html>