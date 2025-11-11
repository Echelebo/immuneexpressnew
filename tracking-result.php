<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require_once('dashboard/database.php');
require_once('dashboard/library.php');
require_once('dashboard/funciones.php');

$tracking= $_POST['shipping'];

$sql = "SELECT c.cid, c.tracking, c.cons_no, c.letra, c.book_mode, c.schedule, c.paisdestino, c.pick_time, c.pick_time2, c.invice_no, c.mode, c.type, c.weight, c.weightx, c.qty, c.comments, c.ship_name, c.s_add, c.rev_name, c.r_add, c.pick_date, c.user, s.color, c.status FROM courier c, service_mode s WHERE s.servicemode = c.status AND c.tracking = '$tracking'";

$result = dbQuery($sql);
$no = dbNumRows($result);
if($no == 1){

while($data = dbFetchAssoc($result)) {
extract($data);

?>

        <!DOCTYPE html>

        <html>

        <head>
            <meta charset="utf-8" />
            <title>Track My Parcel |  Nexo Freight</title>
            <meta name="description" content="Nexo Freight" />
            <meta name="keywords" content="Track your parcel" />
            <meta name="author" content="Nexo Freight Logistics">
            <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />-->

            <link rel="icon" href="favicon.ico" sizes="20x20" type="image/png">

            <!-- Font Awesome CSS -->
            <link rel="stylesheet" href="deprixa/asset1/css/font-awesome.min.css" type="text/css" media="screen">

            <!-- style -->
            <!--<link href="deprixa_components/content/cssefe4.css" rel="stylesheet"/>-->
            <link rel="stylesheet" href="deprixa/css/tracking.css" type="text/css" />
            <link href="deprixa_components/styles/track-order.css" rel="stylesheet" />
            <!--<link href="deprixa/css/style.css" rel="stylesheet" media="all">-->



            <!--<link href="files/css/master.css" rel="stylesheet">
       
		 SWITCHER -->
            <link rel="stylesheet" id="switcher-css" type="text/css" href="files/assets/switcher/css/switcher.css" media="all" />
            <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color1.css" title="color1" media="all" data-default-color="true" />
            <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color2.css" title="color2" media="all" />
            <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color3.css" title="color3" media="all" />
            <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color4.css" title="color4" media="all" />
            <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color5.css" title="color5" media="all" />
            <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color6.css" title="color6" media="all" />
            <!-- Style Status -->
            <style>
                <?php echo $styling['style']; ?>
            </style>


            <style>
                .label {
                    border: 1px solid #000
                }

                .label-danger {
                    background-color: #db2a31
                }

                .label-danger[href]:hover,
                .label-danger[href]:focus {
                    background-color: #c9302c
                }

                .label {
                    display: inline;
                    padding: .2em .6em .3em;
                    font-size: 75%;
                    line-height: 1;
                    color: #fff;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: baseline;
                    border-radius: .25em
                }

                .label[href]:hover,
                .label[href]:focus {
                    color: #fff;
                    text-decoration: none;
                    cursor: pointer
                }

                .label:empty {
                    display: none
                }
            </style>

        </head>

        <!-- Menu -->
        <?php include_once "menu.php"; ?>
        <!-- /Menu -->


        <div class="breadcrumb-area  margin-bottom-120" style="background-image:url(assets/img/breadcrumb/01.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-inner">
                            <h2 class="page-title11">
                                <font color="white">Parcel Tracking</font>
                            </h2>
                            <ul class="page-list">
                                <li><a href="https://nexofreight.com/">Home</a></li>
                                <li><a href="#">Parcel Result</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="slide">


            <div class="container">

<section class="mt-4">


<div class="container" style="color: #333333;">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="text-center">
        <img src="deprixa_components/images/barcode.png" />
            <h5 class="card-heading-x"><?php echo $tracking; ?></h5>
</div>
<table style="border: none; border-collapse: collapse; width: 100%; margin-top: 16px;">
    <tr>
        <td class="text-left" style="padding: 10px; width: 50%;"">
            Ship Date <br /><strong><?php echo $pick_date; ?></strong>
</td>
<td class="text-left" style="padding: 10px;">
            Actual Delivery <br /><strong><?php echo strtoupper($status); ?></strong>
</td>
    </tr>
</table>

        </div>


        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
<hr style="margin-top: 20px; border: none;">
           
<table style="border: none; border-collapse: collapse; width: 100%;">
    <tr>
 <td class="text-left" style="padding: 10px;">
            Arrived Port <br /><strong><?php echo strtoupper($s_add); ?>, <?php echo strtoupper($pick_time); ?></strong>
</td>       
    </tr>
    <tr>
    <td class="text-left" style="padding: 10px; width: 50%;">
            <strong><?php echo $qty; ?> PIECE SHIPMENT</strong>
</td>
    </tr>
</table>



		</div>

        <div class="col-sm-12 col-md-12 col-lg-12">
        <hr style="margin-top: 20px; border: none;">
        <div class="text-center mt-4">

<h5 class="card-heading-x" style="margin-bottom: 5px;">Sender/Receiver Details</h5>
<a href="contact-us.php" style="color:dodgerblue; ">Contact us now for more information on your package.</a><br /><br />
</div>
<div class="text-left">
<span style="margin-right: 20px;">Sender Name:</span><strong><?php echo strtoupper($ship_name); ?></strong><br /><br />
            <span style="margin-right: 20px;">Receiver Name:</span><strong><?php echo strtoupper($rev_name); ?></strong><br /><br />
            <span style="margin-right: 20px;">Receiver Address:</span><strong><?php echo strtoupper($r_add); ?></strong><br /><br />
            <span style="margin-right: 20px;">Package Name:</span><strong><?php echo strtoupper($comments); ?></strong>

		</div>
        </div>


			<div class="col-sm-12 col-md-12 col-lg-12 mt-4">
            <hr style="margin-top: 20px; border: none;">
            <div class="text-center">

<h5 class="card-heading-x">Shipping History</h5><br />
</div>


					<?php
						require_once('dashboard/database.php');

						//EJECUTAMOS LA CONSULTA DE BUSQUEDA
						$result = mysql_query("SELECT * FROM courier_track WHERE cid = $cid	AND cons_no = '$cons_no' ORDER BY bk_time");
						//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
						echo ' <table class="table table-bordered table-striped table-hover" >
									<tr class="car_bold col_dark_bold" align="center">
										<td><font color="Black" face="arial,verdana"><strong>New Location</strong></font></td>
										<td><font color="Black" face="arial,verdana"><strong>State</strong></font></td>
										<td><font color="Black" face="arial,verdana"><strong>Time</strong></font></td>
										<td><font color="Black" face="arial,verdana"><strong>Remarks</strong></font></td>
									</tr>';
						if(mysql_num_rows($result)>0){
							while($row = mysql_fetch_array($result)){
								echo '<tr align="center">
										<td><font size=2>'.$row['pick_time'].'</font></td>
										<td><font size=2>'.$row['status'].'</font></td>
										<td><font size=2>'.$row['bk_time'].'</font></td>
										<td><font size=2>'.$row['comments'].'</font></td>
										</tr>';
							}
						}else{
							echo '<tr>
										<td colspan="5" >There are no results</td>
									</tr>';
						}
						echo '</table>';
					?>
			</div>


        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <hr style="margin-top: 20px; border: none;">
        <div class="text-center">

<h5 class="card-heading-x">Shipment Facts</h5>
</div>
<div class="text-left">
			<span style="margin-right: 20px;">Master Tracking Number:</span><strong><?php echo strtoupper($tracking); ?></strong><br /><br />
            <span style="margin-right: 20px;">Delivered To:</span><strong><?php echo strtoupper($rev_name); ?></strong><br /><br />
            <span style="margin-right: 20px;">Shipper Reference:</span><strong><?php echo strtoupper($invice_no); ?></strong><br /><br />
            <span style="margin-right: 20px;">Expected Delivery Date:</span><strong><?php echo strtoupper($schedule); ?></strong><br /><br />
            <span style="margin-right: 20px;">Service:</span><strong><?php echo strtoupper($mode); ?></strong><br /><br />
            <span style="margin-right: 20px;">Weight:</span><strong><?php echo strtoupper($weight); ?>KG</strong><br /><br />

            <span style="margin-right: 20px;">Total Shipment Weight:</span><strong><?php echo strtoupper($weightx); ?>KG</strong><br /><br />
            <span style="margin-right: 20px;">Packaging:</span><strong><?php echo strtoupper($type); ?></strong><br /><br />

		</div>
        </div>
 <!-- End Deprixa Section -->

        </div>

</div>

</section>
</div>
</main>
        <br>
        <br>
        <br>
        <br>
        <!-- Footer -->

        <?php include_once "footer.php"; ?>

        <!-- /Footer -->


        <script src="deprixa_components/bundles/jquery"></script>
        <script src="deprixa_components/bundles/bootstrap"></script>
        <script src="deprixa_components/Scripts/tracking.js"></script>
        </body>

        </html>
        <script>
            window.onload = load;
            window.onunload = GUnload;
        </script>
    <?php

    } //while

} //if
else {
    echo '';
    ?>

    <!doctype html>
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
    <html>

    <head>
        <meta charset="utf-8" />
        <title>Track My Parcel | Nexo Freight Logistics</title>
        <meta name="description" content="Nexo Freight Logistics" />
        <meta name="keywords" content="Nexo Freight Logistics" />
        <meta name="author" content="Nexo Freight Logistics">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <link rel="icon" href="favicon.ico" sizes="20x20" type="image/png">

        <!-- style -->
        <!-- <link href="deprixa_components/content/cssefe4.css" rel="stylesheet"/>-->
        <link rel="stylesheet" href="deprixa/css/tracking.css" type="text/css" />
        <!--<link href="deprixa/css/style.css" rel="stylesheet" media="all">
<link href="files/css/master.css" rel="stylesheet">-->

        <!-- SWITCHER -->
        <link rel="stylesheet" id="switcher-css" type="text/css" href="files/assets/switcher/css/switcher.css" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color1.css" title="color1" media="all" data-default-color="true" />
        <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color2.css" title="color2" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color3.css" title="color3" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color4.css" title="color4" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color5.css" title="color5" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color6.css" title="color6" media="all" />
    </head>

    <!-- Menu -->
    <?php include_once "menu.php"; ?>
    <!-- /Menu -->

    <div class="slide">
    </div>
    <main class="slide">


        <div class="breadcrumb-area  margin-bottom-120" style="background-image:url(assets/img/breadcrumb/01.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-inner">
                            <h2 class="page-title11">
                                <font color="white">Parcel Tracking</font>
                            </h2>
                            <ul class="page-list">
                                <li><a href="https://nexofreight.com/">Home</a></li>
                                <li><a href="#">Parcel Result</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="page-content">

                <div class="text-center">
                    <h1><img src="dashboard/img/no_courier.png" /></h1>
                    <h3>Tracking number not found,</h3>
                    <p>
                        <font color="#FF0000"><?php echo $tracking; ?></font> check the number or Contact Us.
                    </p>
                    <div class="text-center"><a href="index.php" class="btn-system btn-small">Back To Home</a></div>
                </div>
            </div>
        </div>
        </div>
        <!-- End Content -->

        <!-- Footer -->

        <br />
        <br />
        <br />

        <?php include_once "footer.php"; ?>

        <!-- /Footer -->
        </div>

        <script src="deprixa_components/bundles/jquery"></script>
        <script src="deprixa_components/bundles/bootstrap"></script>
        <script src="deprixa_components/bundles/modernizr"></script>
        <script src="deprixa_components/scripts/tracking.js"></script>

        </body>

    </html>
<?php
} //else
?>