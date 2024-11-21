<?php
session_start();

if (!isset($_SESSION['data'])) {
    echo "Tidak ada data untuk ditampilkan. <a href='form.php'>Kembali</a>";
    exit;
}
$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-3">
        <div class="row">
            <div class="col">
            <h2>Hasil Pendaftaran</h2>
            <table class="table table-striped mt-2">
                <tr>
                    <th class="table-secondary">Nama</th>
                    <td><?= htmlspecialchars($data['name']) ?></td>
                </tr>
                <tr>
                    <th class="table-secondary">NIM</th>
                    <td><?= htmlspecialchars($data['nim']) ?></td>
                </tr>
                <tr>
                    <th class="table-secondary">Email</th>
                    <td><?= htmlspecialchars($data['email']) ?></td>
                </tr>
                <tr>
                    <th class="table-secondary">Gender</th>
                    <td><?= nl2br(htmlspecialchars($data['gender'])) ?></td>
                </tr>
                <tr>
                    <th class="table-secondary">Informasi Browser</th>
                    <td><?= htmlspecialchars($data['browserInfo']) ?></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Isi File:</h3>
                <table class="table table-striped mt-2">
                    <tr>
                        <th class="table-info">Baris</th>
                        <th class="table-info">Isi</th>
                    </tr>
                    <?php foreach ($data['fileContent'] as $index => $line): ?>
                    <tr>
                        <td><?=$index + 1 ?></td>
                        <td><?= htmlspecialchars($line) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <a href="index.php" class="btn btn-secondary py-1 w-50 d-flex justify-content-center mx-auto mt-2">Kembali</a>
        </div>
    </div>
</body>
</html>