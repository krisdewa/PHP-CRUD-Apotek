<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SISTEM ADMINISTRASI APOTEK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style_login.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>
    <div class="container" data-aos="zoom-in">
        <div class="row justify-content-md-center ">
          <div id="login" class="col col-lg-4 kotak1">

            <div class="margin">
                <h4 id="logintext" class="font-weight-bold">LOGIN</h4>
                <form class="" action="cek-login.php" method="post">
                        <div class="form-group">
                            <label style="margin-bottom: 10px; margin-left: 25px;" for="formGroupExampleInput">Email</label>
                            <input style="margin-bottom: 30px; margin-left: 25px;" type="text" class="form-control" name="email" placeholder="Masukkan Email anda...." autofocus autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom: 10px; margin-left: 25px;" for="formGroupExampleInput2">Password</label>
                            <input style="margin-bottom: 30px; margin-left: 25px;" type="password" class="form-control" name="password" placeholder="Masukkan Password anda..." required>
                        </div>
                        <div class="form-groub">
                            <button style="margin-top: 14px; margin-bottom: 20px; margin-left: 25px;" id="loginbtn" class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <div class="form-groub">
                            <p  id="notreg">Belum punya akun?<a id="create" href="daftarakun.php"> Buat Akun </a></p>
                        </div>
                        <div class="form-groub">
                            <p  id="notreg">Kembali ke Home?<a id="create" href="index.php"> Klik disini</a></p>
                        </div>
                </form>
                </div>
          </div>
          <div id="gambar" class="col col-lg-4 kotak2">
              <img src="asset/img/apotek1.svg" class="rounded mx-auto d-block" alt="">
          </div>
        </div>
      </div>
    
    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</body>
</html>