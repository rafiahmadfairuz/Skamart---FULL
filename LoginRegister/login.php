<?php
session_start();
require_once "../config/database.php";
$conn = connectDatabase();
$errors = array();
$flash_message = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : null;
if ($flash_message) {
    unset($_SESSION['flash_message']); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?= '../asset/style.css' ?>">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email === 'admin@gmail.com' && $password === '12345678') {
            $_SESSION['user'] = 'admin';
            $_SESSION['username'] = $email;
            $_SESSION['modal_header'] = "Sukses";
            $_SESSION['modal_message'] = "Selamat Datang Admin";
            header("Location: ../Dashboard/dashboard.php");
            exit();
        } else {
            $stmt = $conn->prepare("SELECT * FROM master_user WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                if (password_verify($password, $data['password'])) {
                    $_SESSION['kode_user'] = $data['kode_user'];
                    $_SESSION['username'] = $email;
                    $_SESSION['modal_header'] = "Sukses";
                    $_SESSION['modal_message'] = "Selamat Datang " . $data['username'];
                    header("Location: ../halamanutama.php");
                    exit();
                } else {
                    $error['email'] = "Email/password tidak sesuai";
                    $error['password'] = "Email/password tidak sesuai";
                }
            } else {
                $errors['email'] = "Email/password tidak sesuai";
                $errors['password'] = "Email/password tidak sesuai";
            }
        }
    }
    ?>

    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center LogReg">
        <div class="login-card border border-3 col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3 p-4 p-sm-5 shadow-lg rounded rounded-4 bg-light">
            <h1 class="fw-bold text-success text-center py-3 display-4">Login</h1>
            <form action="" method="post">
                <div class="d-flex flex-column my-3">
                    <label for="email" class="fw-bold text-success">Email</label>
                    <div class="d-flex position-relative">
                        <i class="bi bi-envelope-at icon"></i>
                        <input type="email" name="email" class="w-100 rounded rounded-3 border-1 ps-5 py-1" required>
                    </div>
                 
                    <?php if (isset($errors['email'])): ?>
                        <span class="text-danger my-1 text-nowrap">
                            <i class="bi bi-exclamation-triangle me-2"></i><?= $errors['email']; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="d-flex flex-column my-3">
                    <label for="password" class="fw-bold text-success">Password</label>
                    <div class="d-flex position-relative">
                        <i class="bi bi-lock icon"></i>
                        <input type="password" name="password" class="w-100 rounded rounded-3 border-1 ps-5 py-1" required>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <span class="text-danger my-1 text-nowrap">
                            <i class="bi bi-exclamation-triangle me-2"></i><?= $errors['password']; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="flexCheckDefault">
                    <label class="form-check-label text-nowrap" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <button type="submit" class="w-100 btn btn-outline-success fw-bold rounded rounded-3 my-3">Login</button>
            </form>
            <p class="text-center">Belum Punya akun? <a href="../LoginRegister/register.php">Daftar Sekarang!</a></p>
        </div>
    </div>

    <?php
    if (isset($_SESSION['modal_message'])) {
        echo "
    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
      });
    </script>
    ";
        unset($_SESSION['modal_message']);
    }
    ?>

        <?php if ($flash_message): ?>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?= htmlspecialchars($flash_message['header']); ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body fw-bold text-center my-4">
                            <?= htmlspecialchars($flash_message['message']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    modal.show();
                });
            </script>
        <?php endif; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="<?= '../asset/main.js' ?>"></script>
</body>

</html>