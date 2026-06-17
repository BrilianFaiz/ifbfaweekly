<?php
require 'connections.php';
// query ambil data mahasiswa
$query = "select * from mahasiswa";
$mahasiswas = tampildata($query); // ambil data mahasiswa

//ambil data mahasiswa
// $mahasiswa = mysqli_fetch_assoc($query);
//$mahasiswa = mysqli_fetch_array($query);
// $mahasiswa = mysqli_fetch_row($query);
//$mahasiswa = mysqli_fetch_object($query);

//  while ($row = mysqli_fetch_assoc($query)) {
//      var_dump($row);
//  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1>WEB Informatika</h1>
    <hr>
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>
    <h2>DATA MAHASISWA</h2>
    <hr>
    <table border="1" cellpadding="5px">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Foto</th>
        </tr>
        <?php
        $no = 1;
        foreach ($mahasiswas as $mhs) : ?>
            ?>
            <tr>
                <td align="center">
                    <?= $no++; ?>
                </td>

                <td>
                    <?= $mhs['nama']; ?>
                </td>

                <td>
                    <?= $mhs['nim']; ?>
                </td>

                <td>
                    <?= $mhs['jurusan']; ?>
                </td>

                <td>
                    <?= $mhs['email']; ?>
                </td>

                <td>
                    <?= $mhs['no_hp']; ?>
                </td>

                <td align="center">
                    <img src="assets/images/<?= $mhs['foto']; ?>" width="120px">
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
    <br>
    <hr>
    <a href="inputdata.php"><button>input data</button></a>
    <!-- <table border="1">
        <tr>
            <th>1,1</th> <th>1,2</th> <th>1,3</th> <th>1,4</th>
        </tr>
        <tr>
            <th>2,1</th><th colspan="2" rowspan="2">?</th> <th>2,4</th>
        </tr>
        <tr>
            <th>3,1</th> <th>3,4</th>
        </tr>
        <tr>
            <th>4,1</th> <th>4,2</th> <th>4,3</th> <th>4,4</th>
        </tr>
    </table> -->

</body>

</html>