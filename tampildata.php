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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <h2>Data Buku</h2>
    <a href="files.php">kembali ke form</a>
    <div class="container">
    <table class="table">
        <tr>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Jumlah Halaman</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            <th>Cover</th>
        </tr>

        <?php
        $file_path = 'databuku.txt';
        $file_content = file_get_contents($file_path);
        $rows = explode("\n", $file_content);

        foreach ($rows as $row) {
            $data = explode(",", $row);
            echo '<tr>';
            foreach ($data as $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
    </div>
</body>
</html>
