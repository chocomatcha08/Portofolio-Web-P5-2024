<?php 
include 'config/controller.php';
//menerima id barang yang dipilih untuk dihapus
$id = (int)$_GET['id'];

//kondisi ketika tombol hapus klik
if (delete_siswa($id) > 0) {
    echo "<script> alert('Data Siswa Berhasil Dihapus');
    document.location.href='db_siswa_admin.php';
    </script>";
} else {
    echo "<script> alert('Data Siswa Berhasil Dihapus');
    document.location.href='db_siswa_admin.php';
    </script>";
}