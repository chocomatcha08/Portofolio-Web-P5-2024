<?php
//ini untuk fungsi select tabel START
include "koneksi.php";
function select($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows =[];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
    
}

//--------------------------------------------
//----TAMBAH - EDIT - HAPUS PEMBELIAN START---
//--------------------------------------------

//fungsi tambah pembelian start
function create_pembelian($POST)
{
    global $db;
    $kp = strip_tags($_POST['kode_produk']);
    $no_identitas = strip_tags($_POST['no_identitas']);
    $tgl_pembelian = strip_tags($_POST['tgl_pembelian']);
    $tot_pembelian = strip_tags($_POST['total_pembelian']);
    $tot_harga = strip_tags($_POST['total_harga']);
    $kasbon = strip_tags($_POST['kasbon']);
    
    //query tambah data pembelian
    $query = "INSERT INTO pembelian values(null, '$kp','$no_identitas','$tgl_pembelian','$tot_pembelian', '$tot_harga', '$kasbon')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
//---------------------------------------------
//--------FUNGSI TAMBAH PEMBELIAN END----------
//---------------------------------------------


//---------------------------------------------
//--------FUNGSI EDIT PEMBELIAN START----------
//---------------------------------------------
function update_pembelian($POST)
{
    global $db;
    $kp = strip_tags($_POST['kode_produk']);
    $no_identitas = strip_tags($_POST['no_identitas']);
    $tgl_pembelian = strip_tags($_POST['tgl_pembelian']);
    $tot_pembelian = strip_tags($_POST['total_pembelian']);
    $tot_harga = strip_tags($_POST['total_harga']);
    $kasbon = strip_tags($_POST['kasbon']);
    
    //query edit data
    $query = "UPDATE pembelian SET kode_produk='$kp', no_identitas='$no_identitas', tgl_pembelian='$tgl_pembelian' , total_pembelian='$tot_pembelian',
    total_harga='$tot_harga', kasbon='$kasbon', WHERE kode_produk='$kp'"; 
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
//---------------------------------------------
//----------FUNGSI EDIT PEMBELIAN END----------
//---------------------------------------------


//---------------------------------------------
//--------FUNGSI HAPUS PEMBELIAN START---------
//---------------------------------------------
function delete_pembelian($kp)
{
    global $db;
    
    //query delete data
    $query = "DELETE FROM pembelian WHERE kode_produk='$kp'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
//---------------------------------------------
//---------FUNGSI HAPUS PEMBELIAN END----------
//---------------------------------------------

//---------------------------------------------
//-----TAMBAH - EDIT - HAPUS PEMBELIAN END-----
//---------------------------------------------