<?php
// ambil koneksi database
require 'database.php';



function tampildata($perintah)// fungsi untuk menampilkan data dari database
{
    global $conn;

    $result = mysqli_query($conn, $perintah);// jalankan perintah query ke database

    $wadah = [];// nyiapin wadah untuk menampung data dari database

    while ($row = mysqli_fetch_assoc($result))// selama lemari mahasiswa masih ada isinya, ambil data dari lemari mahasiswa
    {
        $wadah[] = $row;// masukan data dari lemari mahasiswa ke dalam wadah
    }
    return $wadah;// kembalikan data dari wadah ke mahasiswa.php
}

function deletedata($id)
{
    global $conn;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function inputdata($data, $foto)
{
    global $conn;


    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);

    $namaFoto = $foto["name"];
    $newnamefoto = date('dmYhis_') . $namaFoto;
    $tmpFoto = $foto["tmp_name"];

    $pathFoto = "assets/Images/$newnamefoto";

    if (move_uploaded_file($tmpFoto, $pathFoto)) {

        $query = "INSERT INTO mahasiswa (nama,nim,jurusan,email,no_hp,foto) 
            VALUES ('$nama','$nim','$jurusan','$email','$no_hp','$newnamefoto')";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);

}

function editdata($data, $id, $foto)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);

    $namaFoto = $foto["name"];
    $newnamefoto = date('dmYhis_') . $namaFoto;
    $tmpFoto = $foto["tmp_name"];

    $pathFoto = "assets/Images/$newnamefoto";

    if (move_uploaded_file($tmpFoto, $pathFoto)) {
        $query = "UPDATE mahasiswa SET 
                  nama = '$nama',
                  nim = '$nim',
                  jurusan = '$jurusan',
                  email = '$email',
                  no_hp = '$no_hp',
                  foto = '$newnamefoto'
                  WHERE id = $id";

        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);

}

function register($data)
{
    global $conn;

    $username = stripcslashes($data["username"]);
    $password1 = mysqli_real_escape_string($conn, $data["password1"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password1 != $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai');
            </script>";

        return false;
    }

    //cek username sama gak
    $queryrow = "select * from user where username = '$username'";
    $result = mysqli_query($conn, $queryrow); //kalau query = 0/ false maka username bsa digunakan

    if(mysqli_num_rows($result)){
         echo "<script>
            alert('username sudah digunakan');
            </script>";

        return false;
    }

    $password = password_hash($password1,PASSWORD_DEFAULT);

    $query = "insert into user (username,password) values ('$username','$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function login($data){
    global $conn;

    $username = stripcslashes($data["username"]);
    $password = mysqli_real_escape_string($conn,$data["password"]);
    
    //cari berdasarkan username id nya
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn,$query);
    //cek apakah ada username
    if(mysqli_num_rows($result)==1)
        {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password,$row["password"]))
                {
                    $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];

            return true;
                }
        }else{
            echo "<script>alert('Login gagal');</script>";
            return false;
        }
    
    }
