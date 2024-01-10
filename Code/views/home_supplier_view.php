<html>
<head>
<title>NITC-HCMS</title>    
<link rel="stylesheet" href="/style/supplier_style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>   
<body onload="slider()">
    <!------------------------Navbar---------------------------->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="/images/nitc-logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <h2>NITC-HCMS</h2>
            <h3 class="view-name">SUPPLIER</h3>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="profile">PROFILE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout">LOGOUT</a>
                </li>

              </ul>
            </div>
          </nav>
    </section>

    <section class="features-main">
        <div class="maincontainer grid">
            <div class="card flex">
                <table class="table-container">
                    <caption class="new-caption">NEW ORDERS</caption>
                    <thead>
                        <tr>
                            <th><h3>Order ID</h3></th>
                            <th><h3>Drug ID | Name</h3></th>
                            <th><h3>Date</h3></th>
                            <th><h3>Quantity</h3></th>
                            <th><h3>Client</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($orders)) { ?>

                        <tr>
                            <td><a href="orderview?o_id=<?=$row['ORD_ID']?>" class="ord-link"><?=$row['ORD_ID']?></a></td>
                            <td><?=$row['DRUG_ID']." | ".$row['DRUG_NAME']?></td>
                            <td><?=$row['O_DATE']?></td>
                            <td><?=$row['O_QUANTITY']?></td>
                            <td><?=$row['STAFF_ID']?></td>
                        </tr>

                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="card flex">
                <table class="table-container">
                    <caption class="fulfilled-caption">FULFILLED ORDERS</caption>
                    <thead>
                        <tr>
                            <th><h3>Order ID</h3></th>
                            <th><h3>Drug ID</h3></th>
                            <th><h3>Date</h3></th>
                            <th><h3>Quantity</h3></th>
                            <th><h3>Price</h3></th>
                            <th><h3>Client</h3></th>
                            <th><h3>Delivered</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($F_orders)) { ?>

                        <tr>
                            <td><?=$row['ORD_ID']?></td>
                            <td><?=$row['DRUG_ID']." | ".$row['DRUG_NAME']?></td>
                            <td><?=$row['S_DATE']?></td>
                            <td><?=$row['QUANTITY']?></td>
                            <td><?=$row['EST_PRC']?></td>
                            <td><?=$row['STAFF_ID']?></td>
                            <td><?= ($row['DELIVERED'])?"Yes":"No"; ?></td>
                        </tr>

                    <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="blank">

    </section>

    <!--------------footer---------->
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-box">
                    <img src="../images/nitc-logo.png">
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
            "../images/Capture.png",
            "../images/Capture2.png"
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