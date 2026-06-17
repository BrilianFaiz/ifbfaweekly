<?php 
require 'connections.php';

//variable super global $_POST
if(isset($_POST['submit']))
    {

        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $foto = $_POST['foto'];

        $query = "INSERT INTO mahasiswa (nama,nim,jurusan,email,no_hp,foto) 
        VALUES ('$nama','$nim','$jurusan','$email','$no_hp','$foto')";
        
        mysqli_query($conn,$query);

        if(mysqli_affected_rows($conn) > 0)
        {
            echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'mahasiswa.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('data gagal ditambahkan');
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
    <title>Input data mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form action="" method="post">
    <table >
        <tr>
            <td><label for="nama">Nama</label></td>
            <td>:</td>
            <td><input type="text" name="nama" id="nama" required/></td>
        </tr>
        <tr>
            <td><label for="nim">NIM</label></td>
            <td>:</td>
            <td><input type="number" name="nim" id="nim" required/></td>
        </tr>
        <tr>
            <td><label for="jurusan">Jurusan</label></td>
            <td>:</td>
            <td><input type="text" name="jurusan" id="jurusan" required/></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td>:</td>
            <td><input type="email" name="email" id="email"/></td>
        </tr>
        <tr>
            <td><label for="no_hp">No HP</label></td>
            <td>:</td>
            <td><input type="number" name="no_hp" id="no_hp"/></td>
        </tr>
        <tr>
            <td><label for="foto">Foto</label></td>
            <td>:</td>
            <td><input type="text" name="foto" id="foto"/></td>
        </tr>
    </table>
    <button type="submit" name="submit" id="submit">Tambah data</button>
    </form>

    KUNCI DARI FORM ADALAH NAME, BUKAN ID. JADI KETIKA MAU MENGAMBIL DATA DARI FORM, MAKA YANG DIAMBIL ADALAH NAME, BUKAN ID.
</body>
</html>