<html>
<head>
<title>NITC-HCMS</title>    
<link rel="stylesheet" href="style/medhistory_style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>   
<body>
  <div>
    <iframe src="style/waves.html" frameborder="0" class="main-frame"></iframe>
    <!------------------------Navbar---------------------------->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="images/nitc-logo.png">&nbsp;&nbsp;&nbsp;MEDICAL HISTORY</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
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
    <!---------------------banner------------------------------->
    
    <div id="main1">
        <center>
            <br><br><br>
            <div class="container p-5 my-3 bg-info text-white" >
            <h1>PREVIOUS MEDICAL HISTORY</h1>
            <form>
              <br><br>
              <?php if(!$history){ ?>
                <div class="form-group row">
                <label for="record" class="col-sm-2 col-form-label">Record</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" class="form-control" id="record" value="No Records">
                </div>
              </div> 
              <?php } else {
                while($record = mysqli_fetch_assoc($history)) { ?>

              <div class="form-group row">
                  <label for="date" class="col-sm-2 col-form-label">DATE</label>
                  <div class="col-sm-10">
                    <input type="date" readonly class="form-control-plaintext" class="form-control" id="date" value="<?=$record['H_DATE']?>" >
                  </div>
              </div>
              <div class="form-group row">
                <label for="record" class="col-sm-2 col-form-label">RECORD</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" class="form-control" id="record" value="<?=$record['DATA']?>">
                </div>
              </div>  
              <br><br>

              <?php }  } ?>
               
          </form>
              
            </form>
            </div>
            <br><br><br> 
            <div class="container p-5 my-3 bg-info text-white" <?php if($edit==0){?> style="display:none;" <?php } ?> >
            <h1>ADD NEW MEDICAL RECORD</h1>
            <form method="POST" action="">
                <br><br>
                <div class="form-group row">
                    <label for="date" class="col-sm-2 col-form-label">DATE</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="date" name="date" >
                    </div>
                </div>
                <div class="form-group row">
                  <label for="record" class="col-sm-2 col-form-label">RECORD</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="record" name="record">
                  </div>
                </div>  
                <button type="submit" class="btn btn-success">Submit</button>
                <br><br>
            </form>
            </div>
            <br><br><br><br><br><br><br><br><br>
            
        </center>
    <div>

    <!--------------footer---------->
    <section id="footer">
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
    </div>
</body> 
</html>