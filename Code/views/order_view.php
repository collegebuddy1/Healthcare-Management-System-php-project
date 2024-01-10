<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Give Order</title>
    <link rel="stylesheet" href="/style/order_style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
      function acknowledgeDelivery(ord_id, uname) {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("b"+ord_id).style.display = "none";
          }
        };
        xhttp.open("POST", "/ajax/acksupply", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("ord_id="+ord_id+"&u_id="+uname);
      }

    </script>
  </head>
  <body>
    <!-- -------------------------------Navbar------------------------------- -->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="images/nitc-logo.png"></a>
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

<!-- ------------------------------Give orders dropdown box ---------------------------------->
    <section id=give>
      <form action="" method="POST" name="orderform">
        <div class="container">
          <h2>Select Supplier</h2>
          <div class="select-box">
            <div class="options-container ">
              <?php while($row=mysqli_fetch_assoc($suppliers)) { ?>

                <div class="option">
                  <label for="<?=$row['SUP_ID']?>"><?=$row['SUP_ID']." | ".$row['SUP_FNAME']." ".$row['SUP_LNAME']?></label>
                  <input type="radio" id="<?=$row['SUP_ID']?>" name="sup_id" value="<?=$row['SUP_ID']?>" required/>
                </div>

              <?php } ?>
          
            </div>

            <div class="selected">
              Select Supplier
            </div>

            <div class="search-box">
              <input type="text" placeholder="Start Typing..." />
            </div>
          </div>
          <br>
          <h2>Select Drug</h2>

          <div class="select-box">
            <div class="options-container">
              <?php while($row=mysqli_fetch_assoc($drugs)) { ?>
                
                <div class="option">
                  <label for="D<?=$row['DRUG_ID']?>"> <?=$row['DRUG_ID']." | ".$row['DRUG_NAME']." - ".$row['MANUFACTURER']?></label>
                  <input type="radio"  id="D<?=$row['DRUG_ID']?>" name="drug_id" value="<?=$row['DRUG_ID']?>" required/>
                </div>

              <?php } ?>

            </div>

            <div class="selected">
              Select Drug
            </div>

            <div class="search-box">
              <input type="text" placeholder="Start Typing..." />
            </div>
          </div>


          <br>
          <h2>Quantity</h2>
          <div class="form__group">
            <input type="number" class="form__input" placeholder="Quantity" name="qty" required />
          </div>
                  
          <br>
          <div class="error"><?=$err_msg?></div>
          <button type="submit" class="btn btn-primary">Order</button>

    </div>
    </form>
</section>


<!-- -------------------------------- orders yet to be supplied ----------------------------->
<section id="prev">
    <!-- <h1><span class="blue">&lt;</span><span class="blue">&gt;</span> <span class="yellow"></pan></h1> -->
        <h2>Orders</h2>
        <br>
        <table class="container2">
            <thead>
                <tr>
                    <th><h1>Order Id</h1></th>
                    <th><h1>Supplier</h1></th>
                    <th><h1>Drug</h1></th>
                    <th><h1>Order Time</h1></th>
                    <th><h1>Quantity</h1></th>
                </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($orders)) { ?>
                <tr>
                    <td><?=$row['ORD_ID']?></td>
                    <td><?=$row['SUP_FNAME']." ".$row['SUP_LNAME']?></td>
                    <td><?=$row['DRUG_NAME']?></td>
                    <td><?=$row['O_DATE']?></td>
                    <td><?=$row['O_QUANTITY']?></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>

</section>
<!-- --------------------------------Previous orders ----------------------------->
<section id="prev">
    <!-- <h1><span class="blue">&lt;</span><span class="blue">&gt;</span> <span class="yellow"></pan></h1> -->
        <h2>Orders Fulfilled</h2>
        <br>
        <table class="container2">
            <thead>
                <tr>
                    <th><h1>Order Id</h1></th>
                    <th><h1>Supplier</h1></th>
                    <th><h1>Drug</h1></th>
                    <th><h1>Order Time</h1></th>
                    <th><h1>Ordered Quantity</h1></th>
                    <th><h1>Fullfillment Time</h1></th>
                    <th><h1>Supplied Quantity</h1></th>
                    <th><h1>Price</h1></th>
                    <th><h1></h1></th>
                </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($supplies)) { ?>
                <tr>
                    <td><?=$row['ORD_ID']?></td>
                    <td><?=$row['SUP_FNAME']." ".$row['SUP_LNAME']?></td>
                    <td><?=$row['DRUG_NAME']?></td>
                    <td><?=$row['O_DATE']?></td>
                    <td><?=$row['O_QUANTITY']?></td>
                    <td><?=$row['S_DATE']?></td>
                    <td><?=$row['QUANTITY']?></td>
                    <td><?=$row['EST_PRC']?></td>
                    <td>
                      <?php if($row['DELIVERED']==0) {?>
                        <button id="b<?=$row['ORD_ID']?>" onclick="acknowledgeDelivery('<?=$row['ORD_ID']?>','<?=$_SESSION['uname']?>')"> Acknowledge</button>
                      <?php } ?>
                    </td>
                </tr>
              <?php } ?>
            </tbody>
        </table>

</section>
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
    <script src="scripts/order.js"></script>
  </body>
</html>
