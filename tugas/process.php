<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $nim = trim($_POST['nim']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $browserInfo = $_SERVER['HTTP_USER_AGENT'];

    $errors = [];

    // Validasi server-side
    if (empty($name) || strlen($name) < 3) $errors[] = "Nama minimal 3 karakter.";
    if (empty($nim) || strlen($nim) < 5 || !is_numeric($nim)) $errors[] = "NIM tidak valid";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid.";

    if (!isset($_FILES['upload']) || $_FILES['upload']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "File tidak diunggah.";
    } else {
        $file = $_FILES['upload'];
        $fileName = $file['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileSize = $file['size'];

        if ($fileType !== 'txt') $errors[] = "Hanya file .txt yang diizinkan.";
        if ($fileSize > 1024 * 1024) $errors[] = "Ukuran file tidak boleh lebih dari 1MB.";
    }

    if (!empty($errors)) {
        echo "<h3>Terjadi Kesalahan:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='index.php'>Kembali</a>";
        exit;
    }

    $fileContent = file_get_contents($file['tmp_name']);
    $rows = explode("\n", $fileContent);

    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'nim' => $nim,
        'email' => $email,
        'gender' => $gender,
        'fileContent' => $rows,
        'browserInfo' => $browserInfo
    ];

    header("Location: result.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
