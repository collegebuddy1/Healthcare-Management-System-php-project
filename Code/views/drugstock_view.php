<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript">
      function fetchDrugInfo(id) {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("temp").innerHTML = this.responseText;
          }
        };
        xhttp.open("POST", "/ajax/fetchdruginfo", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id);
      }

        function abc(id){
            console.log(id);
            document.getElementById('temp').textContent = id;
          }
    </script>
    <style>
      @charset "UTF-8";
      @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

      body {
      font-family: 'Open Sans', sans-serif;
      font-weight: 300;
      line-height: 1.42em;
      color:#A7A1AE;
      background-color:#1F2739;
      }

      h1 {
      font-size:3em;
      font-weight: 300;
      line-height:1em;
      text-align: center;
      color: #4DC3FA;
      }

      h2 {
      font-size:1em;
      font-weight: 300;
      text-align: center;
      display: block;
      line-height:1em;
      padding-bottom: 2em;
      color: #FB667A;
      }

      h2 a {
      font-weight: 700;
      text-transform: uppercase;
      color: #FB667A;
      text-decoration: none;
      }

      .blue { color: #185875; }
      .yellow { color: #FFF842; }

      .container th h1 {
        font-weight: bold;
        font-size: 1em;
      text-align: left;
      color: #185875;
      }

      .container td {
        font-weight: normal;
        font-size: 1em;
      -webkit-box-shadow: 0 2px 2px -2px #0E1119;
         -moz-box-shadow: 0 2px 2px -2px #0E1119;
              box-shadow: 0 2px 2px -2px #0E1119;
      }

      .container {
        text-align: left;
        overflow: hidden;
        width: 80%;
        margin: 0 auto;
        display: table;
        padding: 0 0 8em 0;
      }

      .container td, .container th {
        padding-bottom: 2%;
        padding-top: 2%;
      padding-left:2%;
      }

      /* Background-color of the odd rows */
      .container tr:nth-child(odd) {
        background-color: #323C50;
      }

      /* Background-color of the even rows */
      .container tr:nth-child(even) {
        background-color: #2C3446;
      }

      .container th {
        background-color: #1F2739;
      }

      .container td:first-child { color: #FB667A; }

      .container tr:hover {
       background-color: #464A52;
      -webkit-box-shadow: 0 6px 6px -6px #0E1119;
         -moz-box-shadow: 0 6px 6px -6px #0E1119;
              box-shadow: 0 6px 6px -6px #0E1119;
      }

      .container td:hover {
      background-color: #FFF842;
      color: #403E10;
      font-weight: bold;

      box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
      transform: translate3d(6px, -6px, 0);

      transition-delay: 0s;
        transition-duration: 0.4s;
        transition-property: all;
      transition-timing-function: line;
      }

      @media (max-width: 800px) {
      .container td:nth-child(4),
      .container th:nth-child(4) { display: none; }
      }

      /* alert box */
      .overlay {
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          background: rgba(0, 0, 0, 0.7);
          transition: opacity 500ms;
          visibility: hidden;
          opacity: 0;
        }
        .overlay:target {
          visibility: visible;
          opacity: 1;
        }

        .popup {
          margin: 70px auto;
          padding: 20px;
          background: #fff;
          border-radius: 5px;
          width: 30%;
          position: relative;
          transition: all 5s ease-in-out;
        }

        .popup h2 {
          font-size:2em;
          font-weight: 300;
          margin-top: 0;
          color: #4DC3FA;
          font-family: Tahoma, Arial, sans-serif;
        }
        .popup .close {
          position: absolute;
          top: 20px;
          right: 30px;
          transition: all 200ms;
          font-size: 30px;
          font-weight: bold;
          text-decoration: none;
          color: #333;
        }
        .popup .close:hover {
          color: #4DC3FA;
        }
        .popup .content {
          max-height: 30%;
          overflow: auto;
        }

    </style>
  </head>
  <body>
    <a href="/home" style="color:white; text-decoration:none;">HOME</a>
    <h1><span class="blue"></span>Drug Stock<span class="blue"></span></h1>
    <table class="container">
    	<thead>
    		<tr>
    			<th><h1>Name</h1></th>
          <th><h1>Manufacturer</h1></th>
    			<th><h1>Batch</h1></th>
    			<th><h1>Quantity</h1></th>
          <th><h1>Expiry Date</h1></th>
          <th><h1>Price</h1></th>
    		</tr>
    	</thead>
    	<tbody>
        <?php
  				while($arr = mysqli_fetch_assoc($sel))
  				{
  					echo "<tr>";
  						echo "<td onclick='fetchDrugInfo(".$arr['DRUG_ID'].")'><a href='#popup1' style='text-decoration: none; color: inherit'>".$arr['DRUG_NAME']."</a></td>";
  						echo "<td>".$arr['MANUFACTURER']."</td>";
  						echo "<td>".$arr['BATCH']."</td>";
  						echo "<td>".$arr['QNT']."</td>";
            	echo "<td>".$arr['EXP_DATE']."</td>";
              echo "<td>".$arr['PRICE']."</td>";
  					echo "</tr>";

  				}
        ?>
    	</tbody>
    </table>
    <div id="popup1" class="overlay">
          <div class="popup">
            <h2 id='temp'></h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
              You can close this window by clicking 'x' on top left.
            </div>
          </div>
        </div>

      <div id="druginfo"></div>
  </body>
</html>
