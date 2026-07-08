<?php
require 'connections.php';

if (isset($_POST["login"])) {
    if (login($_POST)) {
        echo "<script>
            alert('berhasil login');
            document.location.href = 'mahasiswa.php'; 
            </script>";
             
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form action="" method="post">
        <label for="username">Masukan Username</label> <br />
        <input type="text" name="username" id="username" required />
        <br />
        <label for="password">Masukan Password</label> <br />
        <input type="password" name="password" id="password" required />
        <br />
        <button type="submit" name="login">Login</button>
    </form>
    <p>Belum Punya akun? <a href="register.php">Daftar di sini</a></p>
</body>

</html>