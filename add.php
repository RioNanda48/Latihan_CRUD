<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat User</title>
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <style>
        body {
            background-image: url('assets/IMG/1.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat; 
        }

        .container{
            margin-top: 150px;
            background-color : grey;
            width : 350px;
            height: 300px;  
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
    <a href="index.php" class="btn btn-primary">Kembali</a>
    <br><br>
    <form action="add.php" method="POST" name="addUser">
        <table border="0" style="color: white;" >
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="mobile" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="add" class="btn btn-success"></td>
            </tr>
        </table>
    </form>
    
    <!-- Handle permintaan POST dari form diatas -->
    <?php
        if(isset($_POST['Submit'])) {
            $name = $_POST['name'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];

            // Memanggil koneksi menuju database
            include_once("connection.php");

            // Query untuk insert data ke database
            $result = mysqli_query($mysqli, 
            "INSERT INTO users (name,email,mobile) VALUES ('$name','$email','$mobile')");

            
            echo '<span style="color: white;">Berhasil menambah user. <a href="index.php" class="btn btn-primary">Lihat User</a></span>';
        }
    ?>
    </div>
</body>
</html>