<?php
require_once "../config/database.php";
$conn = connectDatabase();
session_start();
if (isset($_POST['next'])) {
    mysqli_begin_transaction($conn);
    try {
        if ($_POST['next'] == 'satu') {
            $nama_kategori = $_POST['nama_kategori'];
            $kode_barang = $_POST['kode_barang'];

            $_SESSION['nama_kategori'] = $nama_kategori;
            $_SESSION['kode_barang'] = $kode_barang;

            $nama_barang = $_POST['nama_barang'];
            $keterangan_barang = $_POST['keterangan_barang'];
            $satuan = $_POST['satuan'];
            $diskon = $_POST['diskon'];

            $queryInsert = "INSERT INTO master_barang(kode_barang, nama_barang, keterangan_detail, satuan, diskon) VALUE ('$kode_barang', '$nama_barang','$keterangan_barang','$satuan','$diskon')";
            if (!mysqli_query($conn, $queryInsert)) {
                throw new Exception("Error Penambahan Data ke Master Barang");
            }
            mysqli_commit($conn); 
            header("Location:../Dashboard/next1.php");
            exit();
        }

        $nama_kategoris = $_SESSION['nama_kategori'];
        $kode_barangs = $_SESSION['kode_barang'];

        if ($_POST['next'] == 'dua') {
            $varian = $_POST['varian'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            if (!empty($_FILES['gambar']['name'][0])) {
                $jumlahFile = count($_FILES['gambar']['name']);
                if ($jumlahFile != 6) {
                    $_SESSION['peringatan'] = 'Masukkan 6 Gambar!';
                    throw new Exception('Masukkan 6 Gambar !!');
                }

                $ekstensiDiizinkan = ['jpg', 'jpeg', 'png'];
                $semuaGambar = [];

                for ($i = 0; $i < $jumlahFile; $i++) {
                    $namaGambar = $_FILES['gambar']['name'][$i];
                    $lokasiSementara = $_FILES['gambar']['tmp_name'][$i];
                    $ukuranGambar = $_FILES['gambar']['size'][$i];
                    $errorGambar = $_FILES['gambar']['error'][$i];
                    $ekstensiGambar = strtolower(pathinfo($namaGambar, PATHINFO_EXTENSION));

                    if (!in_array($ekstensiGambar, $ekstensiDiizinkan)) {
                        throw new Exception('Hanya file .jpg dan .png yang diperbolehkan.');
                    }

                    if ($errorGambar === 0) {
                        $namaBaru = uniqid('', true) . '.' . $ekstensiGambar;
                        $tujuanPindah = '../asset/uploads/' . $namaBaru;

                        if (move_uploaded_file($lokasiSementara, $tujuanPindah)) {
                            $semuaGambar[] = $namaBaru;
                        } else {
                            throw new Exception('Terjadi kesalahan saat mengupload gambar.');
                        }
                    } else {
                        throw new Exception('Ada kesalahan dengan file ' . $namaGambar);
                    }
                }

                if (count($semuaGambar) === 6) {
                    $gambarString = implode(',', $semuaGambar);

                    $queryInsertMasterGambar = "INSERT INTO master_gambar(kode_barang, varian, url_gambar, harga, jumlah_stok) VALUE ('$kode_barangs','$varian','$gambarString','$harga','$stok')";
                    if (!mysqli_query($conn, $queryInsertMasterGambar)) {
                        throw new Exception("Error Penambahan Data Gambar Ke master gambar");
                    }

                    $queryInsertKategori = "INSERT INTO master_kategori(nama_kategori, url_gambar) VALUE ('$nama_kategoris','$gambarString')";
                    if (!mysqli_query($conn, $queryInsertKategori)) {
                        throw new Exception("Error Penambahan Data ke Master Kategori");
                    }

                    $kode_kategori_baru = mysqli_insert_id($conn);

                    $queryUpdateKodeKategoriKeMasterBarang = "UPDATE master_barang SET kode_kategori = '$kode_kategori_baru' WHERE kode_barang = '$kode_barangs'";
                    if (!mysqli_query($conn, $queryUpdateKodeKategoriKeMasterBarang)) {
                        throw new Exception("Error Update Data kode-kategori KE master barang");
                    }

                    mysqli_commit($conn);
                    header("Location:../Dashboard/next2.php");
                    exit();
                } else {
                    throw new Exception('Terjadi kesalahan saat menyimpan file.');
                }
            } else {
                throw new Exception('Silakan upload gambar.');
            }
        }

        if ($_POST['next'] == 'tiga') {
            $nilai = $_POST['nilai'];
            $queryInsertRating = "INSERT INTO master_rating(kode_barang, nilai) VALUE ('$kode_barangs','$nilai')";
            if (!mysqli_query($conn, $queryInsertRating)) {
                throw new Exception("Error Penambahan Data Gambar KE master rating");
            }

            mysqli_commit($conn);
            $_SESSION['modal_header'] = "Sukses";
            $_SESSION['modal_message'] = "Data Berhasil DiTambahkan";
            header('Location:../Dashboard/dashboard.php');
            exit();
        }
    } catch (Exception $pesan) {
        mysqli_rollback($conn);
        $_SESSION['modal_header'] = "Gagal";
        $_SESSION['modal_message'] =  $pesan->getMessage();
        header('Location:../Dashboard/dashboard.php');
        exit();
    }
}

if (isset($_POST['simpan'])) {
    if ($_POST['simpan'] == 'gambar') {
        $kode_barangss = $_POST['kode_barang'];

        if (!empty($_FILES['gambar']['name'][0])) {
            $jumlahFile = count($_FILES['gambar']['name']);

            if ($jumlahFile != 6) {
                echo "<script>alert('Masukkan 6 Gambar')</script>";
                $_SESSION['peringatan'] = 'Masukkan 6 Gambar!';
                exit();
            }

            $ekstensiDiizinkan = ['jpg', 'jpeg', 'png'];
            $semuaGambar = [];

            for ($i = 0; $i < $jumlahFile; $i++) {
                $namaGambar = $_FILES['gambar']['name'][$i];
                $lokasiSementara = $_FILES['gambar']['tmp_name'][$i];
                $ukuranGambar = $_FILES['gambar']['size'][$i];
                $errorGambar = $_FILES['gambar']['error'][$i];
                $ekstensiGambar = strtolower(pathinfo($namaGambar, PATHINFO_EXTENSION));

                if (!in_array($ekstensiGambar, $ekstensiDiizinkan)) {
                    echo 'Hanya file .jpg dan .png yang diperbolehkan.';
                    exit();
                }

                if ($errorGambar === 0) {
                    $namaBaru = uniqid('', true) . '.' . $ekstensiGambar;
                    $tujuanPindah = '../asset/uploads/' . $namaBaru;

                    if (move_uploaded_file($lokasiSementara, $tujuanPindah)) {
                        $semuaGambar[] = $namaBaru;
                    } else {
                        echo 'Terjadi kesalahan saat mengupload gambar.';
                        exit();
                    }
                } else {
                    echo 'Ada kesalahan dengan file ' . $namaGambar;
                    exit();
                }
            }
            if (count($semuaGambar) === 6) {
                $gambarString = implode(',', $semuaGambar);

                $queryUpdateMasterGambar = "UPDATE master_gambar SET url_gambar = '$gambarString' WHERE kode_barang = $kode_barangss";
                $sqlUpdateGambar = mysqli_query($conn, $queryUpdateMasterGambar);
                if ($sqlUpdateGambar) {
                    $_SESSION['modal_header'] = "Sukses";
                    $_SESSION['modal_message'] = "Gambar berhasil Di Update!";
                } else {
                    $_SESSION['modal_header'] = "Gagal";
                    $_SESSION['modal_message'] = "Gagal memperbarui Gambar!";
                }
                header("Location: ../Dashboard/dashboard.php");
                exit();
            } else {
                $_SESSION['modal_message'] = 'Terjadi kesalahan saat menyimpan file.';
                header("Location: ../Dashboard/dashboard.php");
                exit();
            }
        } else {
            $_SESSION['modal_message'] =  'Silakan upload gambar.';
            header("Location: ../Dashboard/dashboard.php");
            exit();
        }
    }
}
if (isset($_POST['simpan'])) {
    if ($_POST['simpan'] == 'rating') {
        $kode_barangss = $_POST['kode_barang'];
        $nilai = $_POST['nilai'];
        $queryUpdateRating = "UPDATE master_rating SET nilai = $nilai WHERE kode_barang = $kode_barangss";
        $sqlUpRate = mysqli_query($conn, $queryUpdateRating);

        if ($sqlUpRate) {
            $_SESSION['modal_header'] = "Sukses";
            $_SESSION['modal_message'] = "Rating berhasil diperbarui!";
        } else {
            $_SESSION['modal_header'] = "Gagal";
            $_SESSION['modal_message'] = "Gagal memperbarui rating!";
        }
        header("Location: ../Dashboard/dashboard.php");
        exit();
    } else {
        $_SESSION['modal_message'] = "Aksi tidak valid!";
        header("Location: ../Dashboard/dashboard.php");
        exit();
    }
} else {
    $_SESSION['modal_message'] = "Form tidak diset!";
    header("Location: ../Dashboard/dashboard.php");
    exit();
}
if (isset($_GET['delete'])) {
    $kode_barang = $_GET['delete'];
    $queryDelete = "DELETE FROM master_barang WHERE kode_barang = $kode_barang";
    $sql5 = mysqli_query($conn, $queryDelete);

    if ($sql5) {
        header("Location:../Dashboard/dashboard.php");
    } else {
        echo "Data Gagal Dihapus";
    }
}
