 <!-- NAVBAR -->
 <?php $halamanSaatIni = basename($_SERVER['PHP_SELF']) ?>
 <nav class="navbar shadow-sm bg-body-tertiary border-bottom sticky-top z-3 border">
     <div class="container-fluid px-2 px-md-3 px-lg-5 ">
         <button class="btn d-block d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
             aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <a class=" fw-bold fs-1 d-none d-md-block logo mb-2" href="">Skamart</a>
         <?php if ($halamanSaatIni == "halamanutama.php") { ?>
             <form class="d-flex input-group  p-1 col  mx-2  mx-lg-4" role="search" id="search-form">
                 <input required type="text" name="search" autocomplete="off" class="input w-100 rounded rounded-4"
                     id="search-input">
                 <label class="user-label bg-body-tertiary">Cari Produk</label>
             </form>
         <?php } else { ?>
             <button class="button-back mt-2 me-md-3 ms-auto"><a href="halamanutama.php" class="text-reset text-decoration-none text-nowrap "><i class="bi bi-caret-left"></i>Kembali Ke Beranda</a></button>
         <?php } ?>
         <div class="d-flex align-items-center ">
             <i class="bi bi-cart2 position-relative fs-2 me-2 me-md-3" type="button" data-bs-toggle="offcanvas"
                 data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                 <span class="position-absolute  start-100 translate-middle badge rounded-circle bg-danger"></span>
             </i>
             <div class="offcanvas offcanvas-bottom" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                 id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                 <div class="offcanvas-header border-bottom">
                     <h5 class="offcanvas-title fw-bold fs-2" id="offcanvasScrollingLabel">Keranjang Belanja</h5>
                     <button type="button" class="btn-close fs-4" data-bs-dismiss="offcanvas"
                         aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body " id="keranjang">

                 </div>
                 <div class="sticky-bottom border rounded-top-5 shadow-lg px-3 px-lg-5 py-3 bg-light z-3">
                     <div class="d-flex flex-column">
                         <div class="d-flex justify-content-between">
                             <span class="fw-bold" id="selectedItemsCount">Selected Item (0)</span>
                             <span class="fw-bold" id="totalPrice">Rp. 0</span>
                         </div>
                         <div class="d-flex w-100  column-gap-3">
                             <button class="btn btn-success fw-bold my-2 my-lg-4 w-100" id="beliSekarangBtn">Beli Sekarang</button>

                         </div>

                     </div>
                 </div>
             </div>
             <?php if (isset($_SESSION['username'])): ?>
                 <div class="dropdown-center">
                     <i class="bi bi-person-circle fs-2 border-start border-2 ps-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                     <ul class="dropdown-menu dropdown-menu-end  dropdown-menu-light border shadow-sm">
                         <li><span class="dropdown-item d-flex align-items-center column-gap-2"><i class="bi bi-person-circle"></i><span class="text-nowrap"><?php echo htmlspecialchars($_SESSION['username']); ?></span></span></li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li><a class="dropdown-item d-flex align-items-center" href="LoginRegister/logout.php"><i class="bi bi-box-arrow-in-left mx-2"></i> Sign Out</a></li>
                     </ul>
                 </div>
             <?php else: ?>
                 <div class="log border-start border-2 ps-1 ps-md-4 d-none d-md-block">
                     <a href="../LoginRegister/login.php" class="btn btn-outline-success">Masuk</a>
                     <a href="../LoginRegister/register.php" class="btn btn-success">Daftar</a>
                 </div>
             <?php endif; ?>
         </div>
     </div>

     <?php if ($halamanSaatIni == "halamanutama.php") { ?>
         <div class="navbar-expand-md d-flex w-100  ">
             <div class="offcanvas offcanvas-navbar offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                 <div class="offcanvas-header border-bottom">
                     <a class="offcanvas-title fw-bold fs-1 logo" id="offcanvasNavbarLabel" href="index.html">Skamart</a>
                     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body">
                     <div class="mx-md-auto d-flex flex-column flex-md-row column-gap-5 row-gap-4 fw-bold py-1">
                         <ul class="navbar-nav ">
                             <li><a href="#beranda">Beranda</a></li>
                         </ul>
                         <ul class="navbar-nav ">
                             <li><a href="#promo">Promo</a></li>
                         </ul>
                         <ul class="navbar-nav ">
                             <li><a href="#produk">Produk</a></li>
                         </ul>
                         <ul class="navbar-nav ">
                             <li><a href="#palinglaris">Paling Laris</a></li>
                         </ul>
                         <ul class="navbar-nav ">
                             <li><a href="#tentang">Tentang Kami</a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     <?php } ?>
 </nav>

 <!-- Modal Bootstrap untuk konfirmasi pembelian -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Pembelian Sedang Disiapkan</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <h5 class="fw-bold">Nama Item:</h5>
                 <ul id="modalItemsList"></ul> <!-- Menampilkan daftar item yang dipilih -->
                 <p><strong>Total Item:</strong> <span id="modalTotalQuantity"></span></p>
                 <p><strong>Total Harga:</strong> <span id="modalTotalPrice"></span></p>
                 <p class="text-center fw-bold">Silahkan Bayar Di Atm Terdekat Ya... Terimakasih</p>
             </div>
             <div class="modal-footer">
                 <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Oke</button>
             </div>
         </div>
     </div>
 </div>

 <!-- ============================================ -->