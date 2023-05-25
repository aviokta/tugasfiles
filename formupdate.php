<?php
// Function to update the data in the file
function updateData($file_path, $rows)
{
    $content = '';
    foreach ($rows as $row) {
        $content .= implode(',', $row) . "\n";
    }
    file_put_contents($file_path, $content);
}

$file_path = 'databuku.txt';
$file_content = file_get_contents($file_path);
$rows = explode("\n", $file_content);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $update_index = $_POST['update_index'];
    $updated_data = [
        $_POST['kodeBuku'],
        $_POST['judul'],
        $_POST['pengarang'],
        $_POST['tahunTerbit'],
        $_POST['jumlahHalaman'],
        $_POST['penerbit'],
        $_POST['kategori'],
        $_POST['cover']
    ];

    if ($update_index >= 0 && $update_index < count($rows)) {
        $data = explode(",", $rows[$update_index]);
        if (count($data) == count($updated_data)) {
            $rows[$update_index] = implode(',', $updated_data);
            updateData($file_path, $rows);
            echo 'Data updated successfully.';
        } else {
            echo 'Invalid data format.';
        }
    } else {
        echo 'Invalid update index.';
    }
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
        <input type="file" name="cover" id="cover" accept="image/*"><br><br>

        <input type="submit" value="upload">
    </form>
    
    <a href="tampildata.php">tampilan data buku perpustakaan</a>
</body>
</html>
