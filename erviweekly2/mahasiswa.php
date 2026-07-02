<?php

    require 'fungsi.php';

    $query = "SELECT * FROM mahasiswa";

    $mahasiswas = tampildata($query);  ///wadah isi data

    ///lemari
    /// ambil data (fetch) dari mahasiswa
    ///mysqli_fetch_row array numerik
    /// mysqli_fetch_assoc array associative
    /// mysqli_fetch_array array numerik/associative
    /// mysqli_fetch_object
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB TI ERVI - 2026</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <style>
        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-top: 15px;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            font-size: 0.95rem;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ffe5ec;
        }
        th {
            background-color: #fb6f92;
            color: white;
            font-weight: 700;
        }
        tr:nth-child(even) {
            background-color: #fff5f7;
        }
        .btn-tambah {
            background: #ff3366;
            color: white;
            border: none;
            padding: 10px 20px;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            border-radius: 20px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(255, 51, 102, 0.2);
            transition: transform 0.2s, background 0.2s;
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;
        }
        .btn-tambah:hover {
            background: #fb6f92;
            transform: scale(1.05);
        }
        .img-table {
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ffc2d1;
        }
    </style>
</head>
<body>
    
    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <div class="bubble b3"></div>
    <div class="bubble b4"></div>

    <nav>
      <a href="index.php">🏠 Home</a>
      <a href="profile.php">🌸 Profile</a>
      <a href="contact.php">💌 Contact</a>
      <a href="mahasiswa.php">📚 Data Mahasiswa</a>
    </nav>

    <div class="hero">
        <p class="label">✨ Web TI ERVI — 2026 ✨</p>
        <h1>Data Mahasiswa</h1>
        <p class="tagline">Kelola dan lihat data mahasiswa di sini!</p>
        
        <div class="card" style="max-width: 800px; width: 100%;">
            <h2>Daftar Anggota</h2>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>Nomor WA</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                    $no = 1;
                        foreach($mahasiswas as $mhs)
                        {
                    ?>
                        <tr>
                <td><?= $no++; ?></td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["nim"]; ?></td>
                <td><?= $mhs["prodi"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td><?= $mhs["no_hp"]; ?></td>

                <td>
                    <img src="images/<?= $mhs['foto']; ?>"
                        width="45"
                        height="45"
                        class="img-table"
                        alt="<?= $mhs['nama']; ?>">
                </td>

                <td class="aksi">
                    <a href="editdata.php?id=<?= $mhs['id']; ?>" class="btn-edit">
                        ✏️ Edit
                    </a>

                    <a href="hapusdata.php?id=<?= $mhs['id']; ?>"
                    onclick="return confirm('Yakin dek?')"
                    class="btn-hapus">
                        🗑️ Hapus
                    </a>
                </td>
</tr>
                    <?php
                        }
                    ?>
                    
                    </tbody>
                </table>
            </div>

            <a href="tambahdata.php" class="btn-tambah">➕ Tambah Data Baru</a>

            <div class="dots">
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
            </div>
        </div>

        <br><br>

        <div class="card" style="max-width: 500px; width: 100%;">
            <h2>Latihan Tabel 1</h2>
            <div class="table-container">
                <table>
                    <tr>
                        <td rowspan="2" style="background: #fff5f7;">Baris 1, Kolom 1</td>
                        <td colspan="2">Baris 1, Kolom 2</td>
                    </tr>
                    <tr>
                        <td>Baris 2, Kolom 1</td>
                        <td>Baris 2, Kolom 2</td>
                    </tr>
                </table>
            </div>
        </div>

        <br><br>

        <div class="card" style="max-width: 5