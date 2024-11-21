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
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <img src="freemason.png" alt="" width="100px" class="d-block mx-auto">
                <h2 class="text-center">FORM PENDAFTARAN BERGABUNG DENGAN FREEMASON</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6 shadow-lg py-3 rounded">
                <form name="registrationForm" action="process.php" method="POST" enctype="multipart/form-data" onsubmit="validateForm(event)" class="mt-5">
                    <label for="name" class="form-label">Nama:</label><br>
                    <input type="text" id="name" name="name" required class="form-control">
                    <br>
                    <label for="nim" class="form-label">NIM</label><br>
                    <input type="text" id="nim" name="nim" required class="form-control">
                    <br>
                    <label for="email" class="form-label">Email:</label><br>
                    <input type="email" id="email" name="email" required class="form-control">
                    <br>
                    <div id="gender" class="my-2">
                        <p>Pilih Jenis Kelamin</p>
                        <label for="male" class="form-label">Laki-Laki</label><input type="radio" id="male" name="gender" value="Laki-laki" required checked class="form-check-input mx-3">
                        <label for="female" class="form-label">Perempuan</label><input type="radio" id="female" name="gender" value="Perempuan" required class="form-check-input mx-3"><br>
                    </div>
                    <label for="upload" class="form-label">Unggah File (.txt):</label><br>
                    <input type="file" id="upload" name="upload" accept=".txt" required class="form-control"><br>
                    <button type="submit" class="btn btn-primary w-50 d-flex justify-content-center mx-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        function validateForm(event) {
            const name = document.forms["registrationForm"]["name"].value.trim();
            const NIM = document.forms["registrationForm"]["nim"].value.trim();
            const email = document.forms["registrationForm"]["email"].value.trim();
            const gender = document.forms["registrationForm"]["gender"].value.trim();
            const fileInput = document.forms["registrationForm"]["upload"].files[0];

            if (!name || name.length < 3) {
                alert("Nama harus diisi dan minimal 3 karakter.");
                event.preventDefault();
            }
            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert("Email tidak valid.");
                event.preventDefault();
            }
            if (!NIM || NIM.length < 5 || isNaN(NIM)) {
                alert("NIM harus berupa angka dan minimal 5 karakter.");
                event.preventDefault();
            }
            if (!fileInput) {
                alert("File harus diunggah.");
                event.preventDefault();
            } else if (!/\.txt$/i.test(fileInput.name)) {
                alert("Hanya file .txt yang diizinkan.");
                event.preventDefault();
            } else if (fileInput.size > 1024 * 1024) {
                alert("Ukuran file tidak boleh lebih dari 1MB.");
                event.preventDefault();
            }
        }
    </script>
</body>
</html>