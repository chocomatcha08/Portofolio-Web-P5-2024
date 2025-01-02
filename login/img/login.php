<?php
include 'config/controller.php';

if (isset($_POST['send'])) {
    if (feedback($_POST) > 0) {
        echo "<script>
        alert('failed to login as admin');
        document.location.href = 'home.html';
    </script>";
    } else {
        echo "<script>
        alert('succesfully sent as admin');
        document.location.href = 'home.html';
        </script>";
    }
}

// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config/controller.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"SELECT * FROM user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai operator
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:home_admin.html");
		
	// cek jika user login sebagai user
	}else if($data['level']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard user
		header("location:home_user.html");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIJARAYA - Login</title>
    <link rel="stylesheet" href="../login/main.css">
    <link rel="stylesheet" href="ceklogin.php">
</head>

<body>
    <div class="wrapper">
        <form action="#">
            <h2>Login</h2>
            <div class="input-field">
                <input type="text" required>
                <label>Enter your username</label>
            </div>
            <div class="input-field">
                <input type="password" required>
                <label>Enter your password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Remember Me</p>
                </label>
            </div>
            <a class="button" type="submit">Login</a>
            <div class="register">
            </div>

        </form>
    </div>
    <!-- Preloader -->

</body>

</html>