<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_login.css">
</head>

<body>
    <div class="container" >
        <div class="row justify-content-md-center ">
          <div id="login" class="col col-lg-4">
            <div class="alert alert-warning alert-dismissible fade show d-none" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 id="logintext" class="font-weight-bold">LOGIN</h4>
              <form class="" action="cek-login.php" method="post">
                    <div class="form-group">
                        <label style="margin-bottom: 30px;" for="formGroupExampleInput">Email</label>
                        <input style="margin-bottom: 30px;" type="text" class="form-control" name="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="margin-bottom: 30px;" for="formGroupExampleInput2">Password</label>
                        <input style="margin-bottom: 30px;" type="password" class="form-control" name="password" placeholder="">
                    </div>
                    <div class="form-groub">
                        <button style="margin-top: 14px; margin-bottom: 20px;" id="loginbtn" class="btn btn-primary" type="submit">Login</button>
                    </div>
                    <div class="form-groub">
                        <p  id="notreg">Not registered yet?<a id="create" href="daftarakun.php"> Create an Account</a></p>
                    </div>
              </form>
          </div>
          <div id="gambar" class="col col-lg-4">
              <!-- <img src="asset/login.png" class="rounded mx-auto d-block" alt=""> -->
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>