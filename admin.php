<?php
  // include 'model/connect.php';
  session_start();
  $username = $_SESSION['username'];
  if(empty($_SESSION['username'])){
    header("location:profile/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Halaman Admin - Agit & Co </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/styleadmin.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/styleadmin.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sirius
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://Sirius.com/nice-admin-bootstrap-admin-html-template/
  * Author: Sirius.com
  * License: https://Sirius.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Logo -->
    <div class="row align-items-center" style="margin-left: -1.5rem;">
      <div class="col">
        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-list toggle-sidebar-btn"></i></a>
      </div>
      <div class="col">
        <a href="admin.php" class="logo d-flex align-items-center">
          <img src="../assets/img/logo.png" alt="">
          <span class="d-none d-lg-block"> Agit & Co</span>
        </a>
      </div>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- Profile Nav -->
        <li class="nav-item dropdown pe-3">

          <!-- Profile Image Icon -->
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/me.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Agit & Co</span>
          </a><!-- End Profile Image Icon --0 -->

          <!-- Profile Dropdown Items -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Agit & Co</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

             
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <!-- <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav"> -->
      <!-- Dashboard Nav -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="admin.php">
          <i class="bi bi-grid-1x2-fill"></i>
          <span>Dashboard</span>
        </a>
      </li> -->
      <!-- End Dashboard Nav -->
      <!-- Projects -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="gambar/viewgambar.php">
          <i class="bi bi-camera-fill"></i>
          <span>Kelola Gambar</span>
        </a>
      </li> -->
      <!-- End Projects -->
      <!-- Projects -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="journal/viewjournal.php">
        <i class="bi bi-journal-bookmark-fill"></i>
          <span>Journals</span>
        </a>
      </li> -->
      <!-- End Projects -->
      <!-- Projects -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="projects/tabel_project.php">
          <i class="bi bi-folder-fill"></i>
          <span>Projects</span>
        </a>
      </li> -->
      <!-- End Projects -->
      <!-- Projects -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="projects/team.php">
          <i class="bi bi-people-fill"></i>
          <span>Team</span>
        </a>
      </li> -->
      <!-- End Projects -->
    <!-- </ul>
  </aside> -->
  <!-- End Sidebar -->

  <!-- Sidebar -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Agit & Co</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <ul class="sidebar-nav" id="sidebar-nav">
          <!-- Dashboard Nav -->
          <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <i class="bi bi-grid-1x2-fill"></i>
              <span>Dashboard</span>
            </a>
          </li><!-- End Dashboard Nav -->
          <!-- Projects -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="gambar/viewgambar.php">
              <i class="bi bi-camera-fill"></i>
              <span>Kelola Gambar</span>
            </a>
          </li><!-- End Projects -->
          <!-- Projects -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="journal/viewjournal.php">
            <i class="bi bi-journal-bookmark-fill"></i>
              <span>Journals</span>
            </a>
          </li><!-- End Projects -->
          <!-- Projects -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="projects/tabel_project.php">
              <i class="bi bi-folder-fill"></i>
              <span>Projects</span>
            </a>
          </li><!-- End Projects -->
          <!-- Projects -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="projects/team.php">
              <i class="bi bi-people-fill"></i>
              <span>Team</span>
            </a>
          </li><!-- End Projects -->
        </ul>
    </div>
  </div>
  <!-- End of Sidebar -->

  <!-- ======= Main ======= -->
  <main id="main" class="main mt-5 pt-5" style="margin: 0;">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Projects <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>10</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin: 0;">
    <div class="copyright">
      &copy; Copyright <strong><span>Sirius</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://Sirius.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://Sirius.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://Sirius.com/">Sirius</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>