<?php 


include_once("connectdb.php");

if(isset($_POST['submit'])) {
    $id = $_POST['ID_User'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_insert = "INSERT INTO user VALUES('$ID_User','$nama','$email','$level','$username', '$password')";
    mysqli_query($koneksi, $sql_insert);

    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SISTEM ADMINISTRASI APOTEK </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_addlogin.css">
</head>
<body>
    <!-- <div class="container">
        <br>
        <h1 class="display-5">CREATE ACCOUNT</h1>
        <p>Silahkan mengisi form dibawah untuk mendaftar akun</p>
        <hr> -->
    <div class="container">
        <div class="row justify-content-md-center ">
        <div class="margin">
            <section class="container">
                <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
                <section class="row justify-content-center">
                    <section class="col col-lg-4 kotak">
                        <form action="daftarakun.php" method="POST" class="form-container">
                            <h4 class="text-center font-weight-bold"> Create Account </h4>
                            <div class="form-group">
                                <label style="margin-bottom: 10px; margin-left: 45px;" for="name">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="nama" autofocus autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px; margin-left: 45px;" for="InputEmail">Alamat Email</label>
                                <input type="text" class="form-control" id="InputEmail" aria-describeby="emailHelp" placeholder="Masukkan email" name="email" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px; margin-left: 45px;" for="name">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px; margin-left: 45px;" for="InputPassword">Password</label>
                                <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password" autocomplete="off" required>
                            </div>
                            <div class="sub">
                                <center><button type="submit" name="submit" class="btn btn-success btn-block">Register</button>
                                <!-- <a href="login.php" class="btn btn-danger btn-block">Cancel</a> -->
                            
                                <div id="notreg" class="form-footer mt-2">
                                    <p> Sudah punya account? <a id="create" href="login.php">Login</a></p>
                                </div>
                            </div>
                            
                        </form>
                    </section>
                </section>
            </section>
        </div>
        </div>
    </div>
        <!-- <form action="daftarakun.php" method="POST">
            <table>
                <br>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="email">
                    </div>
                </div>

                <input type="hidden" class="form-control" name="level" value="pelanggan">

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">username</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="username">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                    </div>
                </div>
            </table><br>
            <div class="">
            <button class="btn col-1" id="submit" name="submit" type="submit" style="background-color: #7ECA9C;">Daftar</button>
            <a href="login.php" class="btn btn-danger col-1 ">Cancel</a>
            </div>
            
        </form>
    </div> -->



</body>
</html>