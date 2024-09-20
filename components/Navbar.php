<style>
  .dropdown-menu {
    width: 10vw !important;
  }
</style>
<nav class="container-fluid d-flex justify-content-between align-items-center px-4 py-3 border-bottom  z-3" id="navbarBesar">
  <h3 class="fw-bold d-none d-lg-block text-success">Skamart</h3>
  <div class="d-block d-lg-none">
    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <i class="bi bi-list fs-2 fw-bold"></i>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header border-bottom px-4">
        <h4 class="offcanvas-title" id="offcanvasNavbarLabel">Skamart</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="d-flex flex-column my-4" id="navbarsamping">
          <div class="ms-3">
            <button class="my-2 rounded text-start d-flex align-items-center"><i class="text-secondary me-3 fs-4 bi bi-house "></i><a class="text-reset text-decoration-none" href="index.html">Dashboard</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if (isset($_SESSION['username'])): ?>
    <div class="dropdown">
      <i class="bi bi-person-circle fs-3" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
      <ul class="dropdown-menu dropdown-menu-light border shadow-sm">
        <li><span class="dropdown-item d-flex align-items-center column-gap-2"><i class="bi bi-person-circle"></i><span class="text-nowrap"><?php echo htmlspecialchars($_SESSION['username']); ?></span></span></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item d-flex align-items-center" href="../LoginRegister/logout.php"><i class="bi bi-box-arrow-in-left mx-2"></i> Sign Out</a></li>
      </ul>
    </div>
  <?php else: ?>
    <div class="log border-start border-2 ps-1 ps-md-4 d-none d-md-block">
      <a href="../LoginRegister/login.php" class="btn btn-outline-success">Masuk</a>
      <a href="../LoginRegister/register.php" class="btn btn-success">Daftar</a>
    </div>
  <?php endif; ?>
</nav>