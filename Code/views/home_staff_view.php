<html>
<head>
<title>NITC-HCMS</title>    
<link rel="stylesheet" href="style/staff_style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>   
<body onload="slider()">
    <!------------------------Navbar---------------------------->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="images/nitc-logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/profile">PROFILE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/logout">LOGOUT</a>
                </li>

              </ul>
            </div>
          </nav>
    </section>
    <!---------------------banner------------------------------->
    <section id="banner">
        <div class="banner1">
            <div class="slider">
                <img src="images/Capture.PNG" id="slideImg">
            </div>
            <div class="overlay">
                <div class="col-md-6">
                <div class="content">
                    <p class="promo-title">NITC Health Care Management System</p>
                    <p class="promo">ABOUT US</p>
                    <p>Healthcare management systems, also known as healthcare information management systems, are designed to help healthcare providers collect, store, retrieve and exchange patient healthcare information more efficiently and enable better patient care. </p>
                    <a href="https://www.youtube.com/watch?v=F-flvgL3huk"><img src="images/play-button-overlay-png-transparent.png" class="play-btn">Watch Videos</a>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------Services------------------------>
    <section id="services">
        <div class="container text-center">
            <h1 class="title">Services</h1>
            <div class="activities-grid">
                <!-- grid irem1 -->
                <a href="/drugstock">
                <div class="activities-grid-item drug" >
                    
                    <h1>Drug Stock</h1>
                    <p></p>
               
                </div>
                </a>
                 <!-- grid irem2 -->
                 <a href="/billing">
                 <div class="activities-grid-item billing">
                    <h1>Billing</h1>
                    <p></p>
                </div>
                </a>
                <!-- grid irem3 -->
                <a href="/order">
                <div class="activities-grid-item order">
                    <h1>Give Orders</h1>
                    <p></p>
                </div>
                </a>
                <!-- grid irem4 -->
                <a href="/bloodbank">
                <div class="activities-grid-item bloodbank">
                    <h1>Blood Bank</h1>
                    <p></p>
                </div>
                </a>

            </div>
        </div>
    </section>
    <!--------------------Social media--------------->
    <!-- <section id="social-media">
        <div class="container text-center">
            <p>FIND US ON SOCIAL MEDIA</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/Jaguar/"><img src="images/facebook.png"></a>
                <a href="https://www.instagram.com/jaguar/?hl=en"><img src="images/instagram.png"></a>
                <a href="https://twitter.com/Jaguar?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="images/twitter.png"></a>
                <a href="https://www.whatsapp.com/"><img src="images/whatsapp.png"></a>
                <a href="https://www.linkedin.com/company/jaguar-land-rover_1"><img src="images/linkedin.png"></a>
                <a href="https://www.snapchat.com/"><img src="images/snapchat.png"></a>   
            </div>
        </div>
    </section> -->

    <!--------------footer---------->
    <section id="footer">
        <!-- <img src="images/waves2.png" class="footer-img"> -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-box">
                    <img src="images/nitc-logo.png">
                    <p></p>
                </div>
                <div class="col-md-4 footer-box">
                    <p><b>CONTACT US</b></p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                        National Institute Of Technology, Calicut Mukkam Road, Kattangal, Kerala 673601 </p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i>
                        0495 228 6106</p>
                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i>
                        mail </p>
                </div>
            </div>
        </div>
    </section>

    <!------------smooth scroll--------------->
    <!-- <script src="smooth-scroll.js"></script>
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script> -->

    <!------------------slider-------------->
    <script>
        var slideImg=document.getElementById("slideImg");
        var images = new Array(
            "images/Capture.png",
            "images/Capture2.png"
        );
        var len = images.length
        var i = 0;
        function slider(){
            if(i>len-1){
                i=0;
            }
            slideImg.src=images[i];
            i++;
            setTimeout('slider()',3000);
        }
    </script>
</body> 
</html>