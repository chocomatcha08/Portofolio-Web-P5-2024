<?php
include 'config/controller.php';
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Mengambil data siswa berdasarkan id
    $siswa = select("SELECT * FROM siswa WHERE id=$id")[0];
}

if (isset($_POST['ubah'])) {
    if (update_siswa($_POST) > 0) {
        echo "<script>
                alert('Data siswa berhasil diubah');
                document.location.href = 'db_siswa_admin.php';
            </script>";
    } else {
        echo "<script>
                alert('Data siswa gagal diubah');
                document.location.href = 'db_siswa_admin.php';
            </script>";
    }
}
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="config/css/style1.css" rel="stylesheet">

    <title>Edit Data Siswa</title>
</head>

<body>

    <div class="container mt-5">
        <h1>Edit Data Siswa</h1>
        <form action="" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value="<?=$siswa['id']; ?>">

            <div class="mb-3">
                <label for="NISN" class="form-label">NISN Siswa</label>
                <input type="text" class="form-control" id="NISN" name="NISN" value="<?=$siswa['NISN']; ?>">
            </div>

            <div class="mb-3">
                <label for="Nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="Nama" name="Nama" value="<?=$siswa['Nama']; ?>">
            </div>

            <select class="form-select" aria-label="Default select example" name="Jenis_Kelamin" id="Jenis_Kelamin"
                required>
                <option selected>Pilih Jenis Kelamin</option>
                <option value="L">L</option>
                <option value="P">P</option>
            </select>

            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <!--<input type="text" class="form-control" id="Alamat" value="<?=$siswa['Alamat']; ?>" disabled>
                <br>-->
                <textarea class="form-control" id="Alamat" name="Alamat"><?=$siswa['Alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="No_Hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="No_Hp" name="No_Hp" value="<?=$siswa['No_Hp']; ?>">
            </div>

            <div class="mb-3">
                <label for="Agama" class="form-label">Agama</label>
                <input type="text" class="form-control" id="Agama" name="Agama" value="<?=$siswa['Agama']; ?>">
            </div>

            <div class="mb-3">
                <label for="Tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="Tempat_lahir" name="Tempat_lahir"
                    value="<?=$siswa['Tempat_lahir']; ?>">
            </div>

            <div class="mb-3">
                <label for="Tanggal_Lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="Tanggal_Lahir" name="Tanggal_Lahir"
                    value="<?=$siswa['Tanggal_Lahir']; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlcLAbNl+NUIVF0sA7MsXsP1UyJoMp4YLEuNSFAp+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>