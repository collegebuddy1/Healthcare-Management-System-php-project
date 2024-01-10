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
            <a class="navbar-brand" href="#"><img src="../images/nitc-logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <h2>NITC-HCMS</h2>
            <h3 class="view-name">PATIENT DETAILS</h3>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/home">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/logout">LOGOUT</a>
                </li>

              </ul>
            </div>
          </nav>
    </section>

    <section class="doc-main">
        <div class="doc-container doc-grid doc-grid-3">
            <div class="doc-card doc-flex doc-pat-id">
                <h3>Patient ID</h3>
                <a href="/patientmedhist?id=<?=$patient['PAT_ID']?>" class="medhistory-link"><?=$patient['PAT_ID']?></a>
            </div>
            <div class="doc-card doc-flex">
                <h3>Consultation ID : <?=$patient['CONS_ID']?></h3>
            </div>
            <div class="doc-card doc-flex">
                <h3>Appoinment Time: <?=$patient['DATE']." ".$patient['TIME']?> </h3>
            </div>
            <div class="doc-card doc-flex">
                <table class="sup-table-container">
                <thead>
                    <tr>
                        <th><h3>Name</h3></th>
                        <th><h3>DOB</h3></th>
                        <th><h3>Sex</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$patient['FNAME']." ".$patient['LNAME']?></td>
                        <td><?=$patient['DATE']?></td>
                        <td><?=$patient['SEX']?></td>
                    </tr>

                </tbody>
            </table>
            </div>
            <form action="/patient" method="POST">
            <input type="text" style="display: none;" readonly name="cons_id" value="<?=$patient['CONS_ID']?>">
            <div class="doc-card doc-flex">
                <div class="doc-inputs">
                    <h3 class="doc-text">Prescription</h3>
                    <textarea class = "doc-input" name="presc" id="prescription" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="doc-card doc-flex">
                <div class="doc-inputs">
                    <h3 class="doc-text">Observation</h3>
                    <textarea class = "doc-input" name="obsc" id="observation" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="doc-card doc-flex">
                <div class="doc-inputs">
                    <h3 class="doc-text">Reference Hospital</h3>
                    <select name="ref">
                        <option value="">None</option>
                        <?php if($hosp) { while($row=mysqli_fetch_assoc($hosp)) { ?>
                            <option value="<?=$row['HOSPITAL']?>"><?=$row['HOSPITAL']?></option>
                        <?php }} ?>
                    </select>
                </div>
            </div>
            <?=$err_msg?>
            <div class="doc-card doc-flex">
                <input type="submit" value="SUBMIT" class="doc-button">
            </div>
            </form>
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