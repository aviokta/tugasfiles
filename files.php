<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodeBuku = $_POST['kodeBuku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahunTerbit = $_POST['tahunTerbit']; 
    $jumlahHalaman = $_POST['jumlahHalaman']; 
    $penerbit = $_POST['penerbit']; 
    $kategori = $_POST['kategori']; 
    $cover = $_POST['cover']; 


    $data = "$kodeBuku, $judul, $pengarang, $tahunTerbit, $jumlahHalaman, $penerbit, $kategori, $cover \n";

    // Menyimpan data ke file
    $file = 'databuku.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    echo "Data telah disimpan ke file.";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Form Input Data Buku</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<h1>FORMULIR BUKU PERPUSTAKAAN</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="kodeBuku">KODE BUKU:</label>
        <input type="text" name="kodeBuku" id="kodeBuku" required><br><br>

        <label for="judul">JUDUL:</label>
        <input type="text" name="judul" id="judul" required><br><br>

        <label for="pengarang">PENGARANG:</label>
        <input type="text" name="pengarang" id="pengarang"><br><br>

        <label for="tahunTerbit">TAHUN TERBIT:</label>
        <input type="text" name="tahunTerbit" id="tahunTerbit"><br><br>

        <label for="jumlahHalaman">JUMLAH HALAMAN:</label>
        <input type="number" name="jumlahHalaman" id="jumlahHalaman"><br><br>

        <label for="penerbit">PENERBIT:</label>
        <input type="text" name="penerbit" id="penerbit"><br><br>

        <label for="kategori">KATEGORI:</label>
        <input type="text" name="kategori" id="kategori"><br><br>

        <label for="cover">COVER:</label>
        <input type="file" name="cover" id="cover"><br><br>

        <input type="submit" value="Simpan">
    </form>
    
    <a href="tampildata.php">tampilan data buku perpustakaan</a>
</body>
</html>
