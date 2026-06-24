<?php 
require 'connections.php';

//variable super global $_GET
$id = $_GET["id"];

if(isset($_POST['submit']))
    {
        if(editdata($_POST, $id,$_FILES["foto"]) > 0)
        {
            echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'mahasiswa.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('data gagal diubah');
            // document.location.href = 'mahasiswa.php';
            </script>";
        }
    

}

$query = "select * from mahasiswa where id = $id";

$mhs = tampildata($query)[0]; //ini masih di dalam wadah jika [0] tidak ada, karena itu adalah aray 2 dimensi 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <table >
        <tr>
            <td><label for="nama">Nama</label></td>
            <td>:</td>
            <td><input type="text" name="nama" id="nama" value = "<?php echo $mhs['nama']; ?>" required/></td>
        </tr>
        <tr>
            <td><label for="nim">NIM</label></td>
            <td>:</td>
            <td><input type="number" name="nim" id="nim" value = "<?php echo $mhs['nim']; ?>"  required/></td>
        </tr>
        <tr>
            <td><label for="jurusan">Jurusan</label></td>
            <td>:</td>
            <td><input type="text" name="jurusan" id="jurusan" value = "<?php echo $mhs['jurusan']; ?>" required/></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td>:</td>
            <td><input type="email" name="email" id="email" value = "<?php echo $mhs['email']; ?>"/>
        </tr>
        <tr>
            <td><label for="no_hp">No HP</label></td>
            <td>:</td>
            <td><input type="number" name="no_hp" id="no_hp" value = "<?php echo $mhs['no_hp']; ?>"/></td>
        </tr>
        <tr>
            <td><label for="foto">Foto</label></td>
            <td>:</td>
            <td><input type="file" name="foto" id="foto" value = "<?php echo $mhs['foto']; ?>"/>
        </tr>
    </table>
    <button type="submit" name="submit" id="submit">Edit data</button>
    </form>

    KUNCI DARI FORM ADALAH NAME, BUKAN ID. JADI KETIKA MAU MENGAMBIL DATA DARI FORM, MAKA YANG DIAMBIL ADALAH NAME, BUKAN ID.
</body>
</html>