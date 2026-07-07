<?php

$conn = mysqli_connect("localhost","root","","ervweekly");

function tampildata($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function hapusdata($id)
{
    global $conn;

    $id = (int)$id;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function tambahdata($data)
{
    global $conn;

    $nama   = htmlspecialchars($data["nama"]);
    $nim    = htmlspecialchars($data["nim"]);
    $prodi  = htmlspecialchars($data["Prodi"]);
    $email  = htmlspecialchars($data["email"]);
    $no_hp  = htmlspecialchars($data["no_hp"]);

    // Upload foto
    $foto = uploadFoto();

    if(!$foto){
        return false;
    }

    $query = "INSERT INTO mahasiswa
              (nama, nim, email, no_hp, prodi, foto)
              VALUES
              ('$nama','$nim','$email','$no_hp','$prodi','$foto')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editdata($data)
{
    global $conn;

    $id = $data["id"];
    $nama   = htmlspecialchars($data["nama"]);
    $nim    = htmlspecialchars($data["nim"]);
    $prodi  = htmlspecialchars($data["Prodi"]);
    $email  = htmlspecialchars($data["email"]);
    $no_hp  = htmlspecialchars($data["no_hp"]);

    // Ambil foto lama
    $mhs = tampildata("SELECT * FROM mahasiswa WHERE id = $id")[0];

    if($_FILES["foto"]["error"] == 4){
        // Tidak upload foto baru
        $foto = $mhs["foto"];
    } else {
        // Upload foto baru
        $foto = uploadFoto();

        if(!$foto){
            return false;
        }
    }

    $query = "UPDATE mahasiswa SET
                nama='$nama',
                nim='$nim',
                email='$email',
                no_hp='$no_hp',
                prodi='$prodi',
                foto='$foto'
              WHERE id=$id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function uploadFoto()
{
    $namaFile = $_FILES["foto"]["name"];
    $ukuranFile = $_FILES["foto"]["size"];
    $error = $_FILES["foto"]["error"];
    $tmpName = $_FILES["foto"]["tmp_name"];

    // Tidak ada file dipilih
    if($error == 4){
        echo "<script>alert('Silakan pilih foto!');</script>";
        return false;
    }

    // Ekstensi yang diperbolehkan
    $ekstensiValid = ['jpg','jpeg','png'];

    $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if(!in_array($ekstensi, $ekstensiValid)){
        echo "<script>alert('File harus JPG, JPEG, atau PNG!');</script>";
        return false;
    }

    // Maksimal 2 MB
    if($ukuranFile > 2000000){
        echo "<script>alert('Ukuran gambar maksimal 2 MB!');</script>";
        return false;
    }

    // Nama file baru
    $namaBaru = uniqid() . "." . $ekstensi;

    // Simpan ke folder images
    move_uploaded_file($tmpName, "images/" . $namaBaru);

    return $namaBaru;
}