<?php

require 'fungsi.php';

if(isset($_POST["submit"])){

    if(tambahdata($_POST) > 0){

        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href='mahasiswa.php';
        </script>";

    }else{

        echo "
        <script>
            alert('Data gagal ditambahkan');
        </script>";

    }

}


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#ffe6ef;
        }

        .container{
            width:450px;
            margin:40px auto;
            background:#fff;
            padding:25px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,.2);
        }

        h2{
            text-align:center;
            color:#fb6f92;
        }

        label{
            font-weight:bold;
        }

        input, select{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
            border-radius:8px;
            border:1px solid #ccc;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            background:#fb6f92;
            color:white;
            font-size:16px;
            border-radius:10px;
            cursor:pointer;
        }

        button:hover{
            background:#ff4d7a;
        }
    </style>

</head>
<body>

<div class="container">

<h2>Tambah Data Mahasiswa</h2>

<form action="" method="POST" enctype="multipart/form-data">

    <label>Nama</label>
       <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required>

    <label>NIM</label> 
    <input type="text" name="nim" id="nim" placeholder="Masukkan NIM" required>

    <label>Program Studi</label>
    <select name="Prodi" id="Prodi" required>
        <option value="">Pilih Program Studi</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Teknologi Informasi">Teknologi Informasi</option>
    </select>

    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="Masukkan Email" required>

    <label>Nomor HP</label>
    <input type="text" name="no_hp" id="no_hp" placeholder="Masukkan Nomor HP" required>
    

    <label>Foto</label>
    <input type="file" name="foto" id="foto" accept="image/*" required>

    <button type="submit" name="submit">
        Tambah Data
    </button>

</form>

</div>

</body>
</html>