<?php 
  include 'model/connect.php'; 
  date_default_timezone_get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agit & Co</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <section class="journal-details">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/img/me.png" alt="logo" width="75" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link me-4" href="index.php" id="navLink">Home</a>
            <a class="nav-link me-4 active" href="./journal.php?page-nr=1" id="navLink">Journal</a>
            <a class="nav-link me-4" href="./portfolio.php" id="navLink">Portofolio</a>
            <a class="nav-link me-4" href="about.php" id="navLink">About Us</a>
            <a class="nav-link me-4" href="contact.php" id="navLink">Contact</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="journal-details-content py-5">
      <?php 
        $query = mysqli_query($connect, "SELECT * FROM journal WHERE id_journal='$_GET[id_journal]'");
        while($data=mysqli_fetch_array($query)){
          $id_journal =$data[0];
          $kategori   =$data[1];
          $judul      =$data[2];
          $deskripsi  =$data[3];
          $tanggal    =$data[4];
          $img        =$data[5];
      ?>
      <div class="container d-flex flex-column align-items-center">
        <div class="journal-details-header text-center">
          <h1 class="journal-details-title"><?= $judul ?></h1>
          <p class="journal-detail-subtitle"><?= $kategori ?></p>
        </div>
        <div class="journal-details-cover w-100 d-flex justify-content-center my-5">
          <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="cover" height="480px">
        </div>
        <div class="journal-details-text text-center w-50">
          <p><?= $deskripsi ?></p>
        </div>
      </div>
      <?php } ?>
    </div>
    <?php include("footer.html"); ?>
  </section>
    
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>