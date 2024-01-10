<html>
<head>
<title>ADMIN DASHBOARD</title>    
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/medhistory_style.css">

</head>   
<body>
  <div>
    <iframe src="/style/waves.html" frameborder="0" class="main-frame"></iframe>
    <!------------------------Navbar---------------------------->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="images/nitc-logo.png">&nbsp;&nbsp;&nbsp;ADMIN DASHBOARD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
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
            <h1>ROLE ASSIGNMENT</h1>
            <form method="POST" action="">
              <div class="form-group">
                <label for="sel1">USERS</label>
                <select class="form-control" name="u_id" id="sel1" required>
                  <?php if($users){ while($row = mysqli_fetch_assoc($users)) { ?>
                    <option value="<?=$row['U_ID']?>"><?=$row['FNAME']." ".$row['LNAME']." - ".$row['U_ID']?></option>
                  <?php } } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="sel2">ROLE</label>
                <select class="form-control" id="sel3" name="role">
                  <option value="D">Doctor</option>
                  <option value="S">Nurse</option>
                  <option value="S">Staff</option>
                </select>
                <br>
                <!--<h7>WORKING DAYS</h7><br>
                <label class="checkbox-inline"><input type="checkbox" value="SUNDAY">Sunday</label>
                <label class="checkbox-inline"><input type="checkbox" value="MONDAY">Monday</label>
                <label class="checkbox-inline"><input type="checkbox" value="TUESDAY">Tuesday</label>
                <label class="checkbox-inline"><input type="checkbox" value="WEDNESDAY">Wednesday</label>
                <label class="checkbox-inline"><input type="checkbox" value="THURSDAY">Thursday</label>
                <label class="checkbox-inline"><input type="checkbox" value="FRIDAY">Friday</label>
                <label class="checkbox-inline"><input type="checkbox" value="SATURDAY">Saturday</label>
                <br><br>-->
                <label for="start_time">SHIFT START TIME:&nbsp;&nbsp;&nbsp;</label>
                <input type="time" id="start_time" name="start_time">
                <br><br>
                <label for="end_time">SHIFT END TIME:&nbsp;&nbsp;&nbsp;</label>
                <input type="time" id="end_time" name="end_time">
                <br><br>
                <?=$err_msg?>
                <button type="submit" class="btn btn-success">Submit</button> 
              </div>
  
            </form>
            </div>
            <br><br><br> 
            <div class="container p-5 my-3 bg-info text-white">
            <h1>CURRENT ROLES</h1>
            <br>
              <table class="table-fill">
              <thead>
              <tr>
              <th class="text-left">USERNAME</th>
              <th class="text-left">FIRST NAME</th>
              <th class="text-left">LAST NAME</th>
              <th class="text-left">ASSIGNED ROLE</th>
              <th class="text-left">SHIFT START</th>
              <th class="text-left">SHIFT END</th>
              </tr>
              </thead>
              <tbody class="table-hover">
                <?php if($staffs){ while($row = mysqli_fetch_assoc($staffs)) { ?>
              <tr>
              <td class="text-left"><?=$row['STAFF_ID']?></td>
              <td class="text-left"><?=$row['FNAME']?></td>
              <td class="text-left"><?=$row['LNAME']?></td>
              <td class="text-left"><?=($row['S_TYPE']=='D')? "Doctor" : "Staff" ?></td>
              <td class="text-left"><?=$row['SHIFT_START']?></td>
              <td class="text-left"><?=$row['SHIFT_END']?></td>
              </tr>
              <?php } } ?>
              </tbody>
              </table>  
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
<style scoped>
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #3e94ec;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 16px;
  font-weight: 400;
  text-rendering: optimizeLegibility;
}

div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}

</style>