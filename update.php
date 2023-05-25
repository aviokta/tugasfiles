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
            $_POST['kode'],
            $_POST['judul'],
            $_POST['pengarang'],
            $_POST['tahun'],
            $_POST['halaman'],
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

