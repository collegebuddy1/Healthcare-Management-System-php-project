<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <title>User Profile Card</title>
  <link rel="stylesheet" href="style/profile_style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>
<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="images/nitc-logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="nav_title text-center">
                <h3>Profile</h3>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/home">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/logout">LOGOUT</a>
                </li>

              </ul>
            </>
          </nav>
    </section>
    <section id="profile">
    <div class="wrapper">
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>First Name</h4>
                    <p><?=$profile['FNAME']?></p>
                 </div>
                 <div class="data">
                   <h4>Last Name</h4>
                    <p><?=$profile['LNAME']?></p>
                    
              </div>
            </div>
            <div class="info_data">
                <div class="data">
                   <h4>Gender</h4>
                   <p><?php echo ($profile['SEX']=='M')? "Male": "Female"; ?></p>
                </div>
                <div class="data">
                  <h4>DOB</h4>
                   <p><?=$profile['DOB']?></p>
                   
             </div>
           </div>
           <div class="info_data">
            <div class="data">
               <h4>Blood Group</h4>
               <p><?=$profile['B_GROUP']?></p>
            </div>
            <div class="data">
              <h4>Mobile</h4>
               <p><?=$profile['MOB_NO']?></p>
               
            </div>
            </div>
            <div class="info_data">
                <div class="data">
                   <h4>Address Line 1</h4>
                   <p><?=$profile['ADDLINE1']?></p>
                </div>
                <div class="data">
                  <h4>Address Line 2</h4>
                   <p><?=$profile['ADDLINE2']?></p>
                   
             </div>
             
           </div>
           <div class="info_data">
            <div class="data">
               <h4>Pincode</h4>
               <p><?=$profile['PIN']?></p>
            </div>
            <!-- <div class="data">
              <h4>Address Line 2</h4>
               <p>asdfsdfsdf</p>
               
         </div> -->
         
       </div>
        </div>
      
      <!-- <div class="projects">
            <h3>Projects</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Recent</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                 </div>
                 <div class="data">
                   <h4>Most Viewed</h4>
                    <p>dolor sit amet.</p>
              </div>
            </div>
        </div> -->
      
        <!-- <div class="social_media">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
      </div> -->
    </div>
    <div class="left">
        <img src="images/profile_pic.png" 
        alt="user" width="100">
        <h4><?=$profile['U_ID']?></h4>
         <p><?php echo ($_SESSION['type']=='U')? "User":"Staff" ;?></p>
    </div>
    </div>
    </section>

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

</body>
</html>