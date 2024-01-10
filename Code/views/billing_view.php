<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <title>Orders</title>

    <meta name="viewport" content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=no" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="/style/billing/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/style/billing/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style/billing/assets/css/main.css">
</head>

<body>
    <main id="pageContentArea">
        <div class="blog-main-slider color-white text-center" style="background-image:url('/style/billing/assets/img/bg.jpg');">
        <p style="text-align: left;"><a href="/home">HOME</a></p>
        <div class="container">
                <h1>ORDERS</h1>
            </div>

            <div class="social-search style shadow-around style-wide">
                <div class="container">


                    <div class="custome-select">
                        <b class="fa fa-caret-down"></b>
                        <span>Select Drug</span>
                        <select class="search-cate notranslate" id="drug_select">
                            <?php if ($drugs) {
                                while ($row = mysqli_fetch_assoc($drugs)) { ?>
                                    <option value="<?= $row['STOCK_ID'] ?>"> <?= $row['DRUG_NAME'] . " | " . $row['MANUFACTURER'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>


                    <div class="quantity-control">
                        <span class="btn-cart btn-square btn-plus btn-qty"><i class="fa fa-plus"></i></span>
                        <input type="text" id="d_qnt" value="2" data-min="1" data-minalert="Minimum limit reached" data-max="500" data-maxalert="Maximum limit reached" data-invalid="Enter valid quantity">
                        <span class="btn-cart btn-square btn-minus btn-qty"><i class="fa fa-minus"></i></span>
                    </div>

                    <i class="btn btn-send btn-pink" onclick="addDrugToCart()">ADD TO CART</i>
                    <!--search-form-->
                </div>
                <!--container-->
            </div>
            <!--social-search-->
            <div class="clearfix"></div>
        </div>

        <div class="container">
            <div class="xv-cart pt-60">
                <form action="" method="POST">
                <div class="xv-cart-top pb-45">
                    <div class="table-responsive cart-cal  text-center">
                        <table class="table">
                            <thead>
                                <tr class="table-head">
                                    <th>Description</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Sub Price</th>
                                </tr>
                            </thead>
                            <tbody class="shadow-around" id="tbody">
                            </tbody>
                        </table>

                    </div>
                </div>
                <!--xv-cart-top-->

                <div class="xv-accordian pt-15 pb-55">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-md-offset-1"></div>
                        <div class="col-xs-12 col-md-4">
                            <table class="table">
                                <tr class="Total">
                                    <th>TOTAL PRICE</th>
                                    <td><input  id="tot" type=number readonly name="tot_prc" value="0"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="custome-select">
                                            <b class="fa fa-caret-down"></b>
                                            <span>Select User</span>
                                            <select class="search-cate notranslate" name="u_id" id="search-dropdown-box" required>
                                                <?php if ($users) {
                                                    while ($row = mysqli_fetch_assoc($users)) { ?>
                                                        <option value="<?= $row['U_ID'] ?>"><?= $row['FNAME'] . " " . $row['LNAME'] . " - " . $row['U_ID'] ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </td>

                                </tr>
                                <tr class="Continue-Shopping">
                                    <th>Proceed to Checkout</th>
                                    <td><input type="submit" onclick="window.print();" class="btn btn-send btn-pink" value="CHECKOUT"></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!--xv-cart-->
    </main>

    <script>
        var Tot_Prc = 0;
        var drug_list = {};
        <?php while ($row = mysqli_fetch_assoc($drugs2)) { ?>
            drug_list[<?= $row['STOCK_ID'] ?>] = ['<?= $row['DRUG_NAME'] ?>', '<?= $row['MANUFACTURER'] ?>', <?= $row['PRICE'] ?>];
        <?php } ?>
    </script>
    <script>
        function addDrugToCart() {
            
            var drug_id = document.getElementById("drug_select").value;
            var drug_qnt = document.getElementById("d_qnt").value;
            var price = Number(drug_list[drug_id][2]) * Number(drug_qnt);

            Tot_Prc += price;


            var html = ` <tr class="table-body"> 
                            <td>
                                <div style="padding:5px 0px 5px 70px;" class="cart-wrappper text-left">
                                            <h6>` + drug_list[drug_id][0] + `</h6>
                                            <p><span>Drug ID</span>:` + drug_id + `</p>
                                        </div>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <div class="quantity-control">
                                            
                                            <input type="text" name="` + drug_id + `" value="` + drug_qnt + `" readonly data-min="1" data-minalert="Minimum limit reached" data-max="500" data-maxalert="Maximum limit reached" data-invalid="Enter valid quantity">
                               
                                        </div>
                                    </td>
                                    <td><span class="cart-price">₹` + drug_list[drug_id][2] + `</span></td>
                                    <td><span class="cart-price">₹` + price + `</span></td>
                                </tr>`;

            document.getElementById("tbody").innerHTML += html;

            document.getElementById("tot").value = Tot_Prc;

        };
    </script>

    <script src="/style/billing/assets/js/jquery.js"></script>
    <script src="/style/billing/assets/js/main.js"></script>

</body>

</html>