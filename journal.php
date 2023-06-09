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
    <section class="journal-section">
    <?php
            $query = mysqli_query($connect, "SELECT * FROM background WHERE tempatgambar='journal'");
            while($data=mysqli_fetch_array($query)){
              $id_gambar            =$data[0];
              $tempatgambar         =$data[1];
              $img_files                  =$data[2];}
            $array_imgs = explode(",", $img_files);
            $i =0;
            foreach($array_imgs as $img ){
            $i++;
            // echo 'assets/img/page/'.$img;
            ?>
        <header class="journal" 
        style="background-image: linear-gradient(#00000065, #00000000),url(<?='assets/img/page/'.$img?>)!important; background-size: cover; background-position: center; background-repeat: no-repeat;"
        >
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
            <?php
            $query = mysqli_query($connect, "SELECT * FROM background WHERE tempatgambar='journal'");
            while($data=mysqli_fetch_array($query)){
              $id_gambar            =$data[0];
              $tempatgambar         =$data[1];
              $img_files             =$data[2];}
            $array_imgs = explode(",", $img_files);
            $i =0;
            foreach($array_imgs as $img ){
            $i++;
            ?>
            <div class="header-journal" >
                <!-- <img src="<?='assets/img/page/'.$img;?> " alt=""> -->
            </div>
            <?php }?>
            <div class="scrolldown text-light text-center w-100">
                <i class="bi bi-arrow-down"></i>
            </div>
            <?php }?>
        </header>
        <p class="miring work-medium visible-md visible-lg ">Journal</p>
        <div class="journal-container" id='journal'>
            <div class="container-fluid">
                <div class="row journals-wrapper">
                    <?php
                        // Setting the number of rows to display in a page.
                        $rows_per_page = 6;
    
                        // Setting the start from, value.
                        $start = 0;
                        
                        // Get total number of nr rows
                        $records = $connect->query("SELECT * FROM journal");
                        $nr_of_rows = $records->num_rows;
                        
                        // calculating the nr of pages
                        $pages = ceil($nr_of_rows / $rows_per_page);
                        
                        if(isset($_GET["page-nr"])){
                            $page = $_GET["page-nr"] - 1;
                            $start = $page * $rows_per_page;
                        }
                        
                        $query = mysqli_query($connect, "SELECT * FROM journal LIMIT $start, $rows_per_page");
                        while($data=mysqli_fetch_array($query)){
                          $id_journal =$data[0];
                          $kategori   =$data[1];
                          $judul      =$data[2];
                          $img_files  =$data[5];

                          $array_imgs = explode(",", $img_files);
                    ?>
                    <div class="journal-item col-lg-6 text-light" style="background-image: linear-gradient(#2b262384,#2b262384),url(<?='assets/img/journal/'.$id_journal.'/'.$array_imgs[0];?>);">
                        <div class="journal-content">
                            <span><?= $kategori ?></span>
                            <form action="./journal_details.php" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="id_journal" value=<?= $id_journal ?>>
                                <button type="submit"><h2><?= $judul ?></h2></button>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="pagination-container w-100 d-flex justify-content-center align-items-center py-3">
            <ul class="pagination">
                <!-- Go to first page -->
                <?php 
                    if(isset($_GET["page-nr"]) && $_GET["page-nr"]>1){ ?>     
                        <li><a href="journal.php?page-nr=1#journal"><<</a></li>
                <?php } ?>

                <!-- Got o previous page -->
                <?php 
                    if(isset($_GET["page-nr"]) && $_GET["page-nr"] > 1){ ?>
                        <li><a href="journal.php?page-nr=<?= $_GET["page-nr"] - 1 ?>#journal"><</a></li>
                <?php
                    }else{?>
                        <li><a><</a></li>
                <?php } ?>
                <?php  
                    for($counter = 1; $counter <= $pages; $counter++){
                        ?>
                        <li class="mx-1"><a <?php if($_GET['page-nr']==$counter) echo "class='active'" ?> href="journal.php?page-nr=<?= $counter ?>#journal"><?= $counter ?></a></li>
                        <?php
                    }
                ?>

                <!-- Go to next page -->
                <?php 
                    if(isset($_GET["page-nr"])){ 
                        if($_GET["page-nr"] == 1){?>
                            <li><a>></a></li>
                    <?php
                        }else{
                    ?>
                        <li><a href="portfolios.php?page-nr=2#portfolio">></a></li>
                    <?php } ?>
                <?php
                    }else{
                        if($_GET["page-nr"] > $pages){ ?>
                            <li><a>></a></li>
                <?php   }else{ ?>
                            <li><a href="portfolios.php?page-nr=<?= $_GET["page-nr"] + 1 ?>#portfolio">></a></li>
                <?php   }?>
                <?php } ?>

                <!-- Go to last page -->
                <?php 
                    if(isset($_GET["page-nr"]) && $_GET["page-nr"]<$pages){ ?>     
                        <li><a href="journal.php?page-nr=<?= $pages ?>#journal">>></a></li>
                <?php } ?>
            </ul>
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