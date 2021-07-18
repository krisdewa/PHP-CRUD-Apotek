<?php 
    $pageactive = "home";
    include 'connectdb.php';
    login();
    include_once("navbar-staff.php") 
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title> 
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300&display=swap" rel="stylesheet">
  </head>

  <body>

    <div class="wrapper">
      <div class="top"></div>
      <!-- untuk home -->
      <section id="home">
        <div class="kolom">
          <div class="top"></div>
          <h2>Mari Kita</h2>
          <h2>Sehat Bersama</h2>
          <p class="desk">Jangan khawatir, kami akan selalu ada 24 jam melayani anda, dengan pelayanan yang profesional sesuai dengan bidangnya</>
          <p><a href="" class="telusuri">Selengkapnya</a></p>
        </div>
        <img src="asset/img/info1.svg" alt="" width="500">
      </section>

      <!-- untuk service -->
      <section id="service">
        <div><img src="asset/img/info.svg" alt="" width="500"/></div>
        <div class="background">
          <div class="kolom">
            <!-- <p class="deskripsi">You Will Need This</p> -->
            <h2>Artikel Kesehatan</h2>
            <p class="desk">Kami menyediakan layanan referensi untuk Anda, menambah wawasan tentang kesehatan</p>
            <p><a id="s" href="" class="telusuri">Selengkapnya</a></p>
          </div>
        </div>
      </section>

    </div>

    <div id="contact">
      <div class="wrapper">
        <div class="footer">
          <div class="footer-section">
            <h3>APTK24</h3>
          </div>
          <div class="footer-section">
            <h3>About</h3>
            <p>Kami menyediakan berbagai macam obat dan vitamin yang Anda butuhkan. APTK24 akan melayani dengan ramah dan tentunya melayani Anda selama 24 jam</p>
          </div>
          <div class="footer-section">
            <h3>Address</h3>
            <p>Jl. Karangsambung KM 20, Kebumen</p>
          </div>
          <div class="footer-section">
            <h3>Social Media</h3>
            <p>Instagram : @aptk24</p>
            <p>Facebook  : aptk24Official</p>
          </div>
        </div>
      </div>
    </div>
    
    <div id="copyright">
      <div class="wrapper">&copy; 2021. <b>APOTEK</b> All Rights Reserved</div>
    </div>
  </body>
</html>
