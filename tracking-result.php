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

$tracking = $_POST['shipping'];

$sql = "SELECT c.cid, c.tracking, c.cons_no, c.letra, c.book_mode, c.schedule, c.paisdestino, c.pick_time, c.invice_no, c.mode, c.type, c.weight, c.comments, c.ship_name, c.phone, 
c.s_add, c.rev_name, c.r_phone, c.r_add, c.pick_date, c.user, s.color, c.status FROM courier c, service_mode s WHERE s.servicemode = c.status AND c.tracking = '$tracking'";

$result = dbQuery($sql);
$no = dbNumRows($result);
if ($no == 1) {

    while ($data = dbFetchAssoc($result)) {
        extract($data);

?>

        <!DOCTYPE html>

        <html>

        <head>
            <meta charset="utf-8" />
            <title>Track My Parcel | Immune Express</title>
            <meta name="description" content="Immune Express" />
            <meta name="keywords" content="Track your parcel" />
            <meta name="author" content="Immune Express Logistics">
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
       
		<!-- SWITCHER -->
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
                                <li><a href="https://immune-expresslogistics.org/">Home</a></li>
                                <li><a href="#">Parcel Result</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide"></div>
        <main class="slide">


            <div class="container">

                <div class="row">
                    <table border="0" align="center" width="100%">
                        <div class="row">
                            <div class="col-md-4 py-2">
                                <h3>
                                    <center>
                                        <img src="deprixa_components/images/barcode.png" /></br>
                                        <font color="#000"><?php echo $tracking; ?></font>
                                    </center>
                                </h3>
                            </div>
                            <div class="col-md-4 py-2">

                                <h3>
                                    <center>
                                        <font color="Black" face="arial,verdana"><strong>Current state</strong></font>:&nbsp;<span style="background: #<?php echo $color; ?>;" class="label label-large">
                                            <font size=2 color="White" face="arial,verdana"><?php echo $status; ?><?php if ($status == "On Hold") {
                                                                                                                        echo '<img src="https://immune-expresslogistics.org/stop.gif" height="50px" width="50px">';
                                                                                                                    } ?></font>
                                        </span>&nbsp;&nbsp;&nbsp;
                                    </center>
                                </h3>

                            </div>
                            <div class="col-md-4 py-2">
                                <h3>
                                    <center>
                                        <font color="Black" face="arial,verdana"><strong>Payment Mode</strong></font>:&nbsp;<span class="label label-danger">
                                            <font size=2 color="White" face="arial,verdana"> <?php echo $book_mode; ?></font>
                                        </span>
                                        &nbsp;&nbsp;&nbsp;
                                    </center>
                                </h3>
                            </div>
                        </div>
                        <hr />
                        <div class="row" style="padding: 50px;">

                            <div class="col-lg-4 col-md-4 py-2">
                                <center>
                                    <font size=3 color="Black" face="arial,verdana"><strong>Delivery schedule</strong></font><br />
                                    <?php echo $schedule; ?>, End of the day
                                </center>
                            </div>
                            <div class="col-lg-8 col-md-8 py-2">
                                <center>
                                    <font size=3 color="Black" face="arial,verdana"><strong>Destination</strong></font><br />
                                    <div> <?php echo $paisdestino ?></div>
                                </center>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12 py-2">
                                <h2>
                                    <center>Additional information</center>
                                </h2>
                            </div>
                            <br />
                            <div class="col-md-4 py-2">
                                <font size=2 color="Black" face="arial,verdana"><strong>Origin:</strong></font> <?php echo $invice_no; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Destination:</strong></font> <?php echo $paisdestino; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Service mode:</strong></font> <?php echo $mode; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Type service:</strong></font> <?php echo $type; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Weight:</strong></font> <?php echo $weight; ?>&nbsp;kg<br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Collection date and time:</strong></font> <?php echo $pick_date; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Shipping description:</strong></font> <?php echo $comments; ?>
                            </div>
                            <div class="col-md-4 py-2">
                                <font size=3 color="Black" face="arial,verdana"><strong>
                                        <center>Details of the sender</center>
                                    </strong></font><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Name:</strong></font> <?php echo $ship_name; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Phone:</strong></font> <?php echo $phone; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Address:</strong></font> <?php echo $s_add; ?>
                            </div>
                            <div class="col-md-4 py-2">
                                <font size=3 color="Black" face="arial,verdana"><strong>
                                        <center>Details of the recipient</center>
                                    </strong></font><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Name:</strong></font> <?php echo $rev_name; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Phone:</strong></font> <?php echo $r_phone; ?><br />
                                <font size=2 color="Black" face="arial,verdana"><strong>Address:</strong></font> <?php echo $r_add; ?>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <br />
                                <h2>Shipping history</h2>

                                <?php
                                require_once('dashboard/database.php');

                                //EJECUTAMOS LA CONSULTA DE BUSQUEDA
                                $result = mysql_query("SELECT * FROM courier_track WHERE cid = $cid	AND cons_no = '$cons_no' ORDER BY bk_time");
                                //CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
                                echo ' <table class="table table-bordered table-striped table-hover" >
									<tr class="car_bold col_dark_bold" align="center">
										<td><font color="Black" face="arial,verdana"><strong>Tracking No</strong></font></td>
										<td><font color="Black" face="arial,verdana"><strong>New Location</strong></font></td>
										<td><font color="Black" face="arial,verdana"><strong>Shipping State</strong></font></td>
										<td><font color="Black" face="arial,verdana"><strong>Date And Time</strong></font></td>
										<td><font color="Black" face="arial,verdana"><strong>Remarks</strong></font></td>																							
									</tr>';
                                if (mysql_num_rows($result) > 0) {
                                    while ($row = mysql_fetch_array($result)) {
                                        echo '<tr align="center">
										<td>' . $row['cons_no'] . '</td>
										<td>' . $row['pick_time'] . '</td>
										<td>' . $row['status'] . '</td>
										<td>' . $row['bk_time'] . '</td>				
										<td>' . $row['comments'] . '</td>
										</tr>';
                                    }
                                } else {
                                    echo '<tr>
										<td colspan="5" >There are no results</td>
									</tr>';
                                }
                                echo '</table>';
                                ?>
                            </div>
                        </div>
                    </table>
                    <!-- End Deprixa Section -->

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
        <title>Track My Parcel | Immune Express Logistics</title>
        <meta name="description" content="Immune Express Logistics" />
        <meta name="keywords" content="Immune Express Logistics" />
        <meta name="author" content="Immune Express Logistics">
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
                                <li><a href="https://immune-expresslogistics.org/">Home</a></li>
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