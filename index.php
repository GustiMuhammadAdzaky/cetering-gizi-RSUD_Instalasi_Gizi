<?php

require "functions.php";
$produk = query("SELECT * FROM produk ORDER BY id DESC");
$nomor = query("SELECT * FROM nomor_hp ORDER BY id DESC");


?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">

  <style>
    .orange {
      background-color: #fd7e14;
    }

    .merah {
      background-color: red;
    }

    .jumbotron {
      background-color: #fd7e14;
      /* height: 500px; */
      padding-top: 50px;
    }

    .ikut {
      background-color: #fd7e14;
    }

    .responsiv {
      width: 200PX;
    }




    @media (max-width: 576px) {
      .tengah {
        display: flex !important;
        justify-content: center !important;
      }
    }

    @media (min-width: 992px) {

      .navbar-brand,
      .nav-link {
        color: white !important;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.8)
      }

      .nav-link {
        text-transform: uppercase;
        margin-right: 30px;
      }

      .nav-link:hover {
        border-bottom: 3px solid white;
      }

      .responsiv {
        width: 300PX;
      }
    }
  </style>


  <title>Halaman Index</title>
</head>

<body id="home">

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color :#fd7e14;">
    <div class="container">
      <a class="navbar-brand" href="#">Catering Gizi RSMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#menu">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link merah" href="admin.php">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ahkir navbar -->

  <!-- slider -->
  <div id="containerS">
    <div id="slider" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item">
          <img src="img-slider/1.png" class="d-block w-100" alt="gb1" height="550">
        </div>
        <div class="carousel-item active">
          <img src="img-slider/2.png" class="d-block w-100" alt="gb2" height="550">
        </div>
        <div class="carousel-item">
          <img src="img-slider/3.png" class="d-block w-100" alt="gb3" height="550">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- akhir slider -->

  <!-- jumbroton -->
  <section class="jumbotron text-center mb-10">
    <img src="image/logo.png" alt="dimsum" width="300" class="rounded-circle img-thumbnail">
    <h2 class="display-4 fw-bold text-light">Catering Gizi RSMS </h2>
    <h5 class="lead text-light">Stay Healthy | Eat healthy</h5>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#fff" fill-opacity="1" d="M0,128L240,32L480,128L720,128L960,224L1200,64L1440,96L1440,320L1200,320L960,320L720,320L480,320L240,320L0,320Z"></path>
    </svg>
  </section>
  <!-- ahkir jumbroton -->




  <!-- Akhir Menu -->

  <section id="menu">

    <!-- $nomor[0]["nomor"] -->


    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="text-center naik">Menu</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php foreach ($produk as $row) : ?>
          <div class="col-md-4 mb-3 tengah">
            <div class="card" style="width: 18rem;">
              <img src="img/<?php echo $row["gambar"]; ?>" height="230px" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row["nama_produk"]; ?></h5>
                <p class="card-text"><?php echo $row["deskripsi_produk"]; ?></p>
                <span class="badge rounded-pill bg-warning text-dark">Rp.<?php echo $row["harga"]; ?></span>
                <br></br>
                <a href="https://api.whatsapp.com/send?phone=+62<?php echo $nomor[0]["nomor"]; ?>&text=Pesanan%20kamu%20adalah%20<?php echo $row["nama_produk"]; ?>%20Seharga%20Rp.<?php echo $row["harga"]; ?>" class="btn btn-primary">Beli Sekarang</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>



    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#fd7e14" fill-opacity="1" d="M0,128L240,32L480,128L720,128L960,224L1200,64L1440,96L1440,320L1200,320L960,320L720,320L480,320L240,320L0,320Z"></path>
    </svg>
  </section>
  <!-- akhir menu -->

  <!-- menu 2 -->

  <!-- akhir menu 2 -->


  <!-- Add Pagination -->
  <!-- <div class="swiper-pagination swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div> -->
  <!-- akir swiper -->




  <!-- akhir menu 2 -->

  <!-- contact -->

  <!-- akhir contact -->

  <!-- about -->
  <section id="about">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col mb-3">
          <br>
          <h1>About</h1>
        </div>
      </div>
      <div class="row justify-content-center fs-5 text-center">
        <div class="col-md-4">
          <div class="row mb-5">
            <h4>Address</h4>
            <center>
              <table border="0">
                <tbody>
                  <tr>
                    <td width="50px"><img src="image/lokasi.png" width="20px"></td>
                    <td>RSUD Prof. Dr. Margono Soekarjo
                      Instalasi Gizi
                      Jl. Dr. Gumbreg No.1 Purwokerto</td>
                  </tr>
                  <tr></tr>
                  <tr>
                    <td width="50px"><img src="image/telepon.png" width="20px"></td>
                    <td>632708</td>
                  </tr>
                  <tr></tr>
                </tbody>
              </table>
            </center>
          </div>
        </div>
        <div class="col-md-4 tengah">
          <div class="card responsiv">
            <h4>Scan Untuk Mencari Lokasi</h4>
            <img src="image/1.png" class="card-img-top" alt="barcode">
          </div>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#fd7e14" fill-opacity="1" d="M0,64L240,160L480,128L720,64L960,192L1200,96L1440,64L1440,320L1200,320L960,320L720,320L480,320L240,320L0,320Z"></path>
    </svg>
  </section>
  <!-- ahkir about -->

  <!-- footer -->
  <div class="row footer ikut">
        <div class="col text-center">
          <p class="text-light">2021 All RIght Reserved by Alma Puti Septia</p>
        </div>
    </div>
  <!-- <footer class="text-light orange text-center">2021 All RIght Reserved by Alma Puti Septia</footer> -->
  <!-- akhir footer -->

  <script src="swiper.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 60,
        stretch: 0,
        depth: 100,
        modifier: 5,
        slideShadows: true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>






  <script src="swiper.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 60,
        stretch: 0,
        depth: 100,
        modifier: 5,
        slideShadows: true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>

  <script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>

</body>

</html>