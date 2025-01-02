<?php
include 'config/controller.php';

//kondisi ketika tombol tambah diklik
if (isset($_POST['tambah'])) {
    if (create_siswa($_POST) > 0) {
        echo "<script>
        alert ('Data Siswa Berhasil Ditambahkan');
        document.location.href = 'db_siswa_admin.php';
        </script>";
    } else {
        echo "<script>
        alert ('Data Siswa Gagal Ditambahkan');
        document.location.href = 'db_siswa_admin.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="config/css/style1.css">
    <title>Data Siswa</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Data Siswa</h1>
        <form action="" method="POST">

            <div class="mb-3">
                <label for="NISN" class="form-label">NISN Siswa</label>
                <input type="text" class="form=control" id="NISN" name="NISN" placeholder="NISN Siswa..." required>
            </div>

            <div class="mb-3">
                <label for="Nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form=control" id="Nama" name="Nama" placeholder="Nama Siswa..." required>
            </div>

            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat Siswa</label>
                <textarea rows="3" cols="50" class="form-control" name="Alamat" id="Alamat" required>
                </textarea>
            </div>

            <select class="form-select" aria-label="Default select example" name="Jenis_Kelamin" id="Jenis_Kelamin"
                required>
                <option selected>Pilih Jenis Kelamin</option>
                <option value="L">L</option>
                <option value="P">P</option>
            </select>

            <div class="mb-3">
                <label for="No_Hp" class="form-label">No Hp Siswa</label>
                <input type="text" class="form=control" id="No_Hp" name="No_Hp" placeholder="No Hp Siswa..." required>
            </div>

            <div class="mb-3">
                <label for="No_Hp" class="form-label">Agama Siswa</label>
                <input type="text" class="form=control" id="Agama" name="Agama" placeholder="Agama Siswa..." required>
            </div>

            <div class="mb-3">
                <label for="Tempat_lahir" class="form-label">Tempat Lahir Siswa</label>
                <input type="text" class="form=control" id="Tempat_lahir" name="Tempat_lahir"
                    placeholder="Tempat Lahir Siswa..." required>
            </div>

            <div class="mb-3">
                <label for="Tanggal_Lahir" class="form-label">Tanggal Lahir Siswa</label>
                <input type="date" class="form=control" id="Tanggal_Lahir" name="Tanggal_Lahir"
                    placeholder="Tanggal Lahir Siswa..." required>
            </div>

            <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
        </form>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFY1zC2AbNI+tUVF0sA7Msx5P1uYJoMp4YLleUNSFAp+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
-->
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlSPiFh5osVNubq5LC7a9bD9XgDA9i+tQ8Zj3iwWAWPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVK1pHGWlC2Al4u+LWgxfkTRlcjfu0JTxR+EQDz/bgIodeIy4HOzUFOQKbrJ0EoQF" crossorigin="anonymous">
    </script>


</body>

</html>