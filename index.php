<?php

// Memanggil koneksi menuju database
include_once("connection.php");

// Memanggil data dari database
$result = mysqli_query($mysqli, 'SELECT * FROM users');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <style>
        body {
            background-image: url('assets/IMG/1.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat; 
        }

        .container {
        margin-top: 150px; 
        }

        .jumbotron{
            background-image: url('assets/IMG/1.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat;
        }
        
    </style>

</head>
<body>
<div class="container-fluid">
    <div class="container">
    <div class="jumbotron">
    <a href="add.php" class="btn btn-info">Tambah User</a>
    <br><br>
    <table class="table table-hover" border="1">
        <tr align="center" style="background-color: white;">
            <th>Nama</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
            while($user_data = mysqli_fetch_array($result)) {
        ?>
        <tr align="center" style="background-color: white;">
            <td><?php echo $user_data['name']; ?></td>
            <td><?php echo $user_data['mobile']; ?></td>
            <td><?php echo $user_data['email']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $user_data['id']; ?>" class="btn btn-outline-primary">Edit</a>
                <a href="delete.php?id=<?php echo $user_data['id']; ?>" class="btn btn-outline-warning">Delete</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    </div>
</div>
</div>
</body>
</html>

