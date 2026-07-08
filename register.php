<?php
require 'connections.php';

//variable super global $_

if (isset($_POST["register"])) //["foto"] dan ["submit"] setelah global var berasal dari key name di form
{

    if (register($_POST) > 0) {
        echo "<script>
            alert('berhasil membuat akun, silahkan login');
            document.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
            alert('data gagal ditambahkan');
                
            </script>";
    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <form action="" method="post">
    <label for="username">Masukan Username</label> <br />
    <input type="text" name="username" id="username" required /> <br />
    <label for="password1">Masukan Password</label> <br />
    <input type="password" name="password1" id="password1" required /> <br />
    <label for="password2">Masukan Ulang Password</label> <br />
    <input type="password" name="password2" id="password2" required /> <br />
    <button type="submit" name="register">Register</button>
    </form>
</body>

</html>