<?php

    include_once("connection.php");

    // Update
    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        // query untuk update data
        $query = mysqli_query($mysqli,
        "UPDATE users SET name='$name', email='$email', mobile='$mobile' WHERE id='$id' ");

        header('Location: index.php');
    }

    // Ambil data user
    $id = $_GET['id'];

    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id'");

    while($user_data = mysqli_fetch_array($query)) {
        $name = $user_data['name'];
        $email = $user_data['email'];
        $mobile = $user_data['mobile'];
    }
?>

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
            width : 300px;
            height: 250px;
              
        }
    </style>
</head>
<body>
<div class="container">
    <br>
    <a href="index.php" class="btn btn-primary">Kembali</a>
    <form action="edit.php" method="POST" name="editUser">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" value="<?= $name ?>"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="mobile" value="<?= $mobile ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?= $email ?>"></td>
            </tr>
            <tr align = "center">
                <br>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
                <td><input type="submit" name="update" value="Update" class="btn btn-success"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>