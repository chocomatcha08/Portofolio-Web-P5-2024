<?php
// ini untuk fungsi select tabel
include "koneksi.php";
function select($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// =================== TAMBAH - EDIT - HAPUS SISWA START ===================

// =================== FUNGSI TAMBAH SISWA START ===================
function create_siswa($post)
{
    global $db;
    $NISN = ($post['NISN']);
    $Nama = ($post['Nama']);
    $Alamat = ($post['Alamat']);
    $jenis_kelamin = ($post['Jenis_Kelamin']);
    $No_HP = ($post['No_Hp']);
    $Agama = ($post['Agama']);
    $Tempat_lahir = ($post['Tempat_lahir']);
    $Tanggal_lahir = ($post['Tanggal_Lahir']);

    // query tambah data siswa
    $query = "INSERT INTO siswa
        VALUES(null, '$NISN', '$Nama', '$Alamat','$jenis_kelamin', '$No_HP', '$Agama', '$Tempat_lahir', '$Tanggal_lahir')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// =================== FUNGSI TAMBAH SISWA END ===================

// =================== FUNGSI EDIT SISWA START ===================
function update_siswa($post)
{
    global $db;
    $id = $post['id'];
    $NISN = $post['NISN'];
    $Nama = strip_tags($post['Nama']);
    $Alamat = strip_tags($post['Alamat']);
    $jenis_kelamin = strip_tags($post['Jenis_Kelamin']);
    $No_HP = strip_tags($post['No_Hp']);
    $Agama = strip_tags($post['Agama']);
    $Tempat_lahir = strip_tags($post['Tempat_lahir']);
    $Tanggal_lahir = strip_tags($post['Tanggal_Lahir']);
    

    // query edit data
    $query = "UPDATE siswa SET id='$id', NISN='$NISN', Nama='$Nama', Alamat='$Alamat', Jenis_Kelamin='$jenis_kelamin',
    No_Hp='$No_HP', Agama='$Agama', Tempat_lahir='$Tempat_lahir', Tanggal_Lahir='$Tanggal_lahir'  WHERE id='$id'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// =================== FUNGSI EDIT SISWA END ===================

// =================== FUNGSI HAPUS SISWA START ===================
function delete_siswa($id)
{
    global $db;

    // query delete data
    $query = "DELETE FROM siswa WHERE id='$id'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// =================== FUNGSI HAPUS SISWA END ===================

// =================== TAMBAH - EDIT - HAPUS SISWA END ===================