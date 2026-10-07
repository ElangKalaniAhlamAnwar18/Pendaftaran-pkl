<?php
/*
Praktik Form Handling (GET & POST) PHP

Analisis:
1. Saat data dikirim menggunakan metode GET, data akan muncul pada URL
   browser setelah tanda "?".

2. Metode GET tidak cocok untuk password atau data sensitif karena data
   yang dikirim dapat terlihat pada URL browser.

3. Fungsi isset() digunakan untuk mengecek apakah suatu variabel atau data
   sudah tersedia atau sudah dikirim.
*/
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Peserta PKL</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #222;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .radio-group,
        .checkbox-group {
            margin-top: 8px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #222;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #444;
        }

        .error {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffe0e0;
            color: #b00000;
            border-radius: 5px;
        }

        .hasil {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f5e9;
            border-radius: 5px;
        }

        .hasil h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Pendaftaran Peserta PKL</h1>

    <form method="post" action="">

        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama">

        <label for="nis">NIS</label>
        <input type="number" id="nis" name="nis">

        <label for="email">Email Siswa</label>
        <input type="email" id="email" name="email">

        <label>Kompetensi Keahlian / Jurusan</label>

        <div class="radio-group">
            <input type="radio" id="tjkt" name="jurusan" value="Teknik Jaringan Akses Telekomunikasi">
            <label for="tjkt" style="display:inline; font-weight:normal;">
                Teknik Jaringan Akses Telekomunikasi
            </label>
        </div>

        <div class="radio-group">
            <input type="radio" id="tkj" name="jurusan" value="Teknik Komputer dan Jaringan">
            <label for="tkj" style="display:inline; font-weight:normal;">
                Teknik Komputer dan Jaringan
            </label>
        </div>

        <label for="perusahaan">Pilihan Perusahaan PKL</label>
        <input type="text" id="perusahaan" name="perusahaan">

        <label>Kompetensi / Tech Stack yang Dikuasai</label>

        <div class="checkbox-group">
            <input type="checkbox" id="php" name="techstack[]" value="PHP">
            <label for="php" style="display:inline; font-weight:normal;">PHP</label>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="html" name="techstack[]" value="HTML">
            <label for="html" style="display:inline; font-weight:normal;">HTML</label>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="css" name="techstack[]" value="CSS">
            <label for="css" style="display:inline; font-weight:normal;">CSS</label>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="python" name="techstack[]" value="Python">
            <label for="python" style="display:inline; font-weight:normal;">Python</label>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="networking" name="techstack[]" value="Networking">
            <label for="networking" style="display:inline; font-weight:normal;">Networking</label>
        </div>

        <label for="alasan">Alasan Memilih Perusahaan</label>
        <textarea id="alasan" name="alasan"></textarea>

        <button type="submit" name="submit">Daftar PKL</button>

    </form>


    <?php

    // Mengecek apakah tombol submit sudah ditekan
    if (isset($_POST['submit'])) {

        // Mengambil data dari form
        $nama = $_POST['nama'];
        $nis = $_POST['nis'];
        $email = $_POST['email'];
        $jurusan = $_POST['jurusan'] ?? "";
        $perusahaan = $_POST['perusahaan'];
        $techstack = $_POST['techstack'] ?? [];
        $alasan = $_POST['alasan'];

        // Mengecek field wajib
        if (empty($nama) || empty($nis)) {

            echo "<div class='error'>";
            echo "<strong>Error!</strong> Nama Lengkap dan NIS wajib diisi.";
            echo "</div>";

        } else {

            echo "<div class='hasil'>";

            echo "<h2>Data Pendaftaran PKL</h2>";

            echo "<p><strong>Nama Lengkap:</strong> " . htmlspecialchars($nama) . "</p>";

            echo "<p><strong>NIS:</strong> " . htmlspecialchars($nis) . "</p>";

            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";

            echo "<p><strong>Jurusan:</strong> " . htmlspecialchars($jurusan) . "</p>";

            echo "<p><strong>Perusahaan PKL:</strong> " . htmlspecialchars($perusahaan) . "</p>";

            echo "<p><strong>Tech Stack:</strong> ";

            if (!empty($techstack)) {
                echo htmlspecialchars(implode(", ", $techstack));
            } else {
                echo "Belum memilih";
            }

            echo "</p>";

            echo "<p><strong>Alasan:</strong> " . htmlspecialchars($alasan) . "</p>";

            echo "</div>";
        }
    }

    ?>

</div>

</body>
</html>