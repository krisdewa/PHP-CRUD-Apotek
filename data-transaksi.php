<?php
    
    include_once("connectdb.php");
    login();
    include_once("navbar-staff.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/style_tab.css" />
</head>
<body>
    <div class="wrap-tab">
        <div class="tab">
            <div style="background-color: #7ECA9C;" class="card">
                <div class="card-header">
                    <h5 class="text-light card-title">Transaksi</h5>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div style="margin-left: 30px;" class="col-md-5">
                                <label class="form-label" for="">Tanggal</label>
                                <input type="text" class="form-control" placeholder="" aria-label="Tanggal">
                            </div>
                            <div style="margin-left: 60px;"  class="col-md-5">
                                <label class="form-label" for="">Nama Obat</label>
                                <input type="text" class="form-control" placeholder="" aria-label="NamaObat">
                            </div>
                            <div style="margin-left: 30px; margin-top: 15px;" class="col-md-5">
                                <label class="form-label" for="">ID Pembayaran</label>
                                <input type="text" class="form-control" placeholder="" aria-label="IDPembayaran">
                            </div>
                            <div style="margin-left: 60px; margin-top: 15px;"  class="col-md-5">
                                <label class="form-label" for="">Harga</label>
                                <input type="text" class="form-control" placeholder="" aria-label="Harga">
                            </div>
                            <div style="margin-left: 30px; margin-top: 15px;" class="col-md-5">
                                <label class="form-label" for="">Kode Obat</label>
                                <input type="text" class="form-control" placeholder="" aria-label="KodeObat">
                            </div>
                            <div style="margin-left: 60px; margin-top: 15px;"  class="col-md-5">
                                <label class="form-label" for="">Jumlah</label>
                                <input type="text" class="form-control" placeholder="" aria-label="Jumlah">
                            </div>
                            <div style="margin-left: 250px; margin-top: 55px;" class="col-md-5">
                                <input type="text" class="form-control" placeholder="Total" aria-label="TotalBayar">
                            </div>
                            <div style="margin-left: 260px; margin-top: 15px;" class="col-12">
                                <button type="submit" class="border-0 btn btn-primary">hitung</button>
                                <button style="background-color: #D3455B; margin-left: 180px;" type="submit" class="border-0 btn btn-primary">Bayar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>