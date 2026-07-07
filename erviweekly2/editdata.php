<?php

require 'fungsi.php';

$id = $_GET["id"];

$query = "SELECT * FROM mahasiswa WHERE id = $id";

$mhs = tampildata($query)[0]; //wadah isi $id

if(isset($_POST["submit"])){

    if(editdata($_POST) > 0){

        echo "
        <script>
            alert('Data berhasil di edit');
            document.location.href='mahasiswa.php';
        </script>";

    }else{

        echo "
        <script>
            alert('Data gagal di edit');
        </script>";

    }

}


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>

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

<h2>Edit Data Mahasiswa</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">

    <label>Nama</label>
       <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required value="<?= $mhs["nama"]; ?>">

    <label>NIM</label> 
    <input type="text" name="nim" id="nim" placeholder="Masukkan NIM" required value="<?= $mhs["nim"]; ?>">

    <label>Program Studi</label>
    <select name="Prodi" id="Prodi" required>
        <option value="">Pilih Program Studi</option>
        <option value="Informatika" <?= ($mhs["prodi"] == "Teknik Informatika") ? "selected" : ""; ?>>Teknik Informatika</option>
        <option value="Teknologi Informasi" <?= ($mhs["prodi"] == "Teknologi Informasi") ? "selected" : ""; ?>>Teknologi Informasi</option>
        <option value="Arsitektur" <?= ($mhs["prodi"] == "Arsitektur") ? "selected" : ""; ?>>Arsitektur</option>
        <option value="Teknik  Mesin" <?= ($mhs["prodi"] == "Teknik  Mesin") ? "selected" : ""; ?>>Teknik  Mesin</option>
        <option value="Rekayasa Sipil" <?= ($mhs["prodi"] == "Rekayasa Sipil") ? "selected" : ""; ?>>Rekayasa Sipil</option>
        <option value="Teknik Elektro" <?= ($mhs["prodi"] == "Teknik Elektro") ? "selected" : ""; ?>>Teknik Elektro</option>
    </select>

    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="Masukkan Email" required value="<?= $mhs["email"]; ?>">

    <label>Nomor HP</label>
    <input type="text" name="no_hp" id="no_hp" placeholder="Masukkan Nomor HP" required value="<?= $mhs["no_hp"]; ?>">

    <label>Foto</label>
    <input type="file" name="foto" id="foto" accept="image/*">

    <button type="submit" name="submit">
        Edit Data
    </button>

</form>

</div>

</body>
</html>