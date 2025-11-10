<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Track My Parcel | Immune Express Logistics</title>
    <meta name="description" content="Immune Express Logistics " />
    <meta name="keywords" content="Immune Express Logistics" />
    <meta name="author" content="Immune Express Logistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="icon" href="favicon.ico" sizes="20x20" type="image/png">

    <!-- style -->
    <link href="deprixa_components/content/cssefe4.css" rel="stylesheet" />
    <link href="deprixa_components/styles/track-order.css" rel="stylesheet" />

    <!-- Validate Input -->


    <!--	<link href="files/css/master.css" rel="stylesheet">-->

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="files/assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color1.css" title="color1" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color2.css" title="color2" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color3.css" title="color3" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color4.css" title="color4" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color5.css" title="color5" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="files/assets/switcher/css/color6.css" title="color6" media="all" />


    <style type="text/css">
        .userform {
            width: 400px;
        }

        .userform p {
            width: 100%;
        }

        .userform label {
            width: 120px;
            color: #333;
            float: center;
        }

        input.error {
            border: 2px dotted red;

        }

        label.error {
            width: 100%;
            color: red;
            font-style: italic;
            margin-center: 120px;
            margin-bottom: 15px;
        }

        .userform input.submit {
            margin-center: 120px;
        }
    </style>

</head>

<!-- Menu -->
<?php include_once "menu.php"; ?>

<div class="breadcrumb-area  margin-bottom-120" style="background-image:url(assets/img/breadcrumb/01.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h2 class="page-title11">
                        <font color="white">About Us</font>
                    </h2>
                    <ul class="page-list">
                        <li><a href="https://immune-expresslogistics.org/">Home</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Menu -->

<div class="slide">
</div>
<main class="slide">

    <div class="container">
        <section class="track-num">
            <h2 for="track">Please insert your tracking number</h2>
            <br />
            <br />
        </section>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home">CONSULT LOCAL SHIPPING</a></li>
            <!--<li><a href="#menu1">CONSULT SHIPPING ONLINE</a></li>-->
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="">
                    <section class="track-num">

                        <br>
                        <form action="tracking-result.php" id="userForm" method="post">
                            <div class="search-bar">
                                <div class="form-group mob-track">
                                    <div class="input-group">
                                        <input class="form-control" name="shipping" id="shipping" type="text" placeholder="Example 472304198">
                                    </div>
                                </div>
                                <button type="submit" name="button" id="send" class="btn btn-default"><img src="dashboard/img/tracking.png" alt="x" />&nbsp;Track my parcel</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <!--<div id="menu1" class="tab-pane fade">
						<div class="">
							<section class="track-num">
								<br>
								<form action="tracking-online.php" id="userForm2" method="post">
									<div class="search-bar">					
										<div class="form-group mob-track">
											<div class="input-group">
												<input class="form-control" name="shipping_online" id="shipping_online" type="text" placeholder="Example IEL-1000001">
											</div>
										</div>
										<button type="submit" name="button" id="send" class="btn btn-info"><img src="dashboard/img/tracking.png" alt="x" />&nbsp;Track my parcel Online</button>
									</div>
								</form>
							</section>
						</div>
					</div>-->
        </div>
    </div>
</main>

<!-- Footer -->
<?php include_once "footer.php"; ?>
<!-- /Footer -->
</div>
<script src="process/jquery.min.js"></script>
<script src="process/jquery.validate.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $.validator.setDefaults({
        submit: function() {
            alert("submitted!");
        }
    });

    $(document).ready(function() {
        $("#userForm").validate({
            rules: {
                name: "required",
                shipping: {
                    required: true,
                    minlength: 6
                },

            },
            messages: {
                name: "Please enter your name",
                shipping: {
                    required: "Please enter a valid tracking number...",
                    minlength: "Your tracking number must consist of at least 7 characters"
                },
            }
        });
    });

    $(document).ready(function() {
        $("#userForm2").validate({
            rules: {
                name: "required",
                shipping_online: {
                    required: true,
                    minlength: 6
                },

            },
            messages: {
                name: "Please enter your name",
                shipping_online: {
                    required: "Please enter a valid tracking number...",
                    minlength: "Your tracking number must consist of at least 7 characters"
                },
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".nav-tabs a").click(function() {
            $(this).tab('show');
        });
    });
</script>
</body>

</html>