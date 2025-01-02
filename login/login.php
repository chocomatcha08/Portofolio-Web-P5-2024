<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PIJARAYA - Login</title>
    <link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>
    <div class="wrapper">
        <form action="../web/tableuser/config/ceklogin.php" method="post">
            <h2>Login</h2>
            <div class="input-field">
                <input type="text" name="username" required />
                <label>Enter your username</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required />
                <label>Enter your password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember" />
                    <p>Remember Me</p>
                </label>
            </div>
            <input type="submit" class="button" type="submit" value="Login" />
            <div class="register"></div>
        </form>
    </div>

</body>

</html>