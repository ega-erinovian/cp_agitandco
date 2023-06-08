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
    <section class="about-section">
        <nav class="navbar navbar-expand-lg" style="background: #504A40 !important;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/me.png" alt="logo" width="75" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link me-4" href="./index.php" id="navLink">Home</a>
                        <a class="nav-link me-4" href="./journal.php?page-nr=1" id="navLink">Journal</a>
                        <a class="nav-link me-4" href="./portfolio.php" id="navLink">Portofolio</a>
                        <a class="nav-link me-4 active" href="about.php" id="navLink">About Us</a>
                        <a class="nav-link me-4" href="contact.php" id="navLink">Contact</a>
                    </div>
                </div>
            </div>
        </nav>
        <article>
            <div class="container-fluid nospace-about Aligner" style="height: 100vh; background: #504A40 !important; overflow: hidden;">
                <div class="row visible-xs visible-sm nospace">
                    <div class="col-xs-12 nospace">
                        <div class="aligner-item wow fadeInUp" style="max-width: 700px; padding: 0 60px;">
                            <h2 class="mb-50 work-medium " style="font-size: 20px;">HELLO</h2>
                            <p class="work-regular ">Agit & Co is a photography company dedicated to creating beautiful and unforgettable moments through our lenses. We combine creative photography expertise with cutting-edge technology to deliver exceptional results to our clients. With our extensive experience in this industry, we are ready to capture every important detail in your life with stunning beauty. Agit&Co understands that every precious moment in your life deserves to be captured in impressive photos.</p>
                        </div>
                    </div>
                </div>
                <p class="miring work-medium visible-md visible-lg ">About us</p>
            </div>
            <div class="container-fluid nospace" id="photographerSection">
                <h1 id="meetourteam"class="judul work-bold">Meet Our Team</h1>
                    <div class="devisi">
                        <a href="#meetourteam" onclick="toggleContent('Photographer')" id="photographerLink" class="devisi">Photographer</a> | 
                        <a href="#meetourteam" onclick="toggleContent('Videographer')" id="videographerLink" class="devisi">Videographer</a> | 
                        <a href="#meetourteam" onclick="toggleContent('Team')" id="teamLink" class="devisi">Team</a> |
                        <a href="#meetourteam" onclick="showAll()" id="allLink" class="devisi">All</a>
                    </div>
            
                <div class="container about-container">
                    <!-- <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="about-filters">
                                <li onclick="toggleContent('Photographer')">Fotografer</li>
                                <li onclick="toggleContent('Videographer')">Videografer</li>
                                <li onclick="toggleContent('Team')">Tim</li>
                                <li onclick="showAll()">Tampilkan Semua</li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div id="about" class="container about-container">
                    <?php
                    include 'model/connect.php'; 
                    $query = mysqli_query($connect, "SELECT * FROM team ");
                    while($data=mysqli_fetch_array($query)){
                        $id_team            =$data[0];
                        $nama               =$data[1];
                        $deskripsi          = $data[2];
                        $ig                 =$data[3];
                        $devisi             =$data[4];
                        $img                =$data[5];

                    ?>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div id="<?=$devisi?>"class="row wow fadeInRight photographerList content">
                                <div class="col-md-6">
                                    <img src="<?= "assets/img/team/".$id_team."/".$img;?>" alt="" class="img-responsive" style="width:100%">
                                </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h1 class="photographerName"><?= $nama?></h1>

                                            <p class="photographerHashtag"><?= $devisi?></p>
                                            <p class="photographerDescription"><?= $deskripsi?></p>
                                            <div class="photographerInstagramWrap">
                                               <a href="https://www.instagram.com/<?=$ig?>/" class="photographerInstagram">@<?= $ig?></a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <?php }?>
            </div>
        </div>

    </article>

        <?php include 'footer.html' ?>
    </section>
    <!-- jQuery -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://bareodds.co/assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="path/to/masonry.pkgd.min.js"></script>
    <script src="path/to/isotope.pkgd.min.js"></script>
    <!-- <script src="https://bareodds.co/assets/js/bootstrap.min.js"></script>
    <script src="https://bareodds.co/assets/js/jquery.scrollify.js"></script>   
    <script src="https://bareodds.co/assets/js/wow.min.js"></script> -->
    <script>
    new WOW().init();
    </script>
    <script>
        
        function toggleContent(content) {
        // Hapus kelas "active" dari semua hyperlink
        document.getElementById("photographerLink").classList.remove("active");
        document.getElementById("videographerLink").classList.remove("active");
        document.getElementById("teamLink").classList.remove("active");
        document.getElementById("allLink").classList.remove("active");

        // Tambahkan kelas "active" pada hyperlink yang di-klik
        document.getElementById(content + "Link").classList.add("active");

        // Lakukan logika lainnya sesuai kebutuhan
        }
        function showAll() {
        // Hapus kelas "active" dari semua hyperlink
        
        }
        
        var contents = document.getElementsByClassName('content');
        var defaultContent = 'Photographer';

        // Menampilkan konten default saat halaman dimuat
        toggleContent(defaultContent);

        function toggleContent(contentID) {
        for (var i = 0; i < contents.length; i++) {
            if (contents[i].id === contentID) {
            contents[i].style.display = '';
            } else {
            contents[i].style.display = 'none';
            }
        }
        }

        function showAll() {
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = '';
        }
        document.getElementById("photographerLink").classList.remove("active");
        document.getElementById("videographerLink").classList.remove("active");
        document.getElementById("teamLink").classList.remove("active");

        // Tambahkan kelas "active" pada hyperlink "All"
        document.getElementById("allLink").classList.add("active");

        // Lakukan logika lainnya untuk menampilkan semua konten
        }

    </script>
    

<script>




</script>

 
   <!-- <script src="https://gitcdn.xyz/repo/thesmart/jquery-scrollspy/0.1.3/scrollspy.js"></script> -->
  <script>
    /**
   * Porfolio isotope and filter
   */
  function toggleDiv(divId) {
    var div = document.getElementById(divId);
    if (div.style.display === "none") {
        div.style.display = "block";
    } else {
        div.style.display = "none";
    }
    }

  // Repeat demo content
  var $body = $('body');
  var $box = $('.box');
  for (var i = 0; i < 20; i++) {
    $box.clone().appendTo($body);
  }

  // Helper function for add element box list in WOW
  WOW.prototype.addBox = function(element) {
    this.boxes.push(element);
  };

  // Init WOW.js and get instance
  var wow = new WOW();
  wow.init();

  // Attach scrollSpy to .wow elements for detect view exit events,
  // then reset elements and add again for animation
  $('.wow').on('scrollSpy:exit', function() {
    $(this).css({
      'visibility': 'hidden',
      'animation-name': 'none'
    }).removeClass('animated');
    wow.addBox(this);
  }).scrollSpy();

</script>

    <script>
        // Repeat demo content
  var $body = $('body');
  var $box = $('.box');
  for (var i = 0; i < 20; i++) {
    $box.clone().appendTo($body);
  }

  // Helper function for add element box list in WOW
  WOW.prototype.addBox = function(element) {
    this.boxes.push(element);
  };

  // Init WOW.js and get instance
  var wow = new WOW();
  wow.init();

  // Attach scrollSpy to .wow elements for detect view exit events,
  // then reset elements and add again for animation
  $('.wow').on('scrollSpy:exit', function() {
    $(this).css({
      'visibility': 'hidden',
      'animation-name': 'none'
    }).removeClass('animated');
    wow.addBox(this);
  }).scrollSpy();

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
   <script>  
            // MOBILE SEARCH
            
            $(document).click(function() {
             $("#searchBarMobile").fadeOut('fast');            
            });
            
            $("#mobileSearchButton").click(function(){
                $("#searchBarMobile").fadeIn('fast');
                return false;
            });
            
             $("#searchBarMobile").click(function(){
                $(this).fadeIn('fast');
                return false;
            });

            $("#searchBarMobile").blur(function() {
                $(this).fadeOut('fast');            
            });
            
            // DEKSTOP SEARCH
            
            $(document).click(function() {
             $("#searchLayer").fadeOut('fast');            
            });
            
             $("#searchbutton").click(function(){
                $("#searchLayer").fadeIn('fast');
                return false;
            });
            
            $(".search-close").click(function(){
                $("#searchLayer").fadeOut('fast');
                return false;
            });
            
             $(".search-new").click(function(){
                $(this).fadeIn('fast');
                return false;
            });
            
        
        </script>

