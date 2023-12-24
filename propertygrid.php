
<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

///search code

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Real Estate PHP">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--	Fonts
	========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!--	Css Link
	========================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--	Title
	=========================================================-->
    <title>REAL-ESTATE</title>
</head>

<body>

    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php"); ?>
            <!--	Header end  -->

            <!--	Banner   --->
            <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Lọc bất động sản</b></h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-left float-md-right">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Lọc bất động sản</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Banner   --->

            <!--	Property Grid
		===============================================================-->
            <div class="full-row">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="row">
                                
                                <?php

                                if (isset($_REQUEST['filter'])) {

                                    $sql = "SELECT property.*, user.uname,DATE_ADD(date, INTERVAL 7 DAY) AS new_date FROM `property`,`user` WHERE property.uid=user.uid AND CURDATE() <= DATE_ADD(date, INTERVAL 7 DAY) ";

                                    $type = $_REQUEST['type'];


                                    if ($type != "" && $type != null) {
                                        $sql = $sql . "and type='$type' ";
                                    }



                                    $stype = $_REQUEST['stype'];

                                    if ($stype != "" && $stype != null) {
                                        $sql = $sql . "and stype='$stype' ";
                                    }




                                    $location = $_REQUEST['city'];

                                    if ($location != "" && $location != null) {
                                        $iparr = explode(", ", $location);

                                        $state = $iparr[0];
                                        $city = $iparr[1];

                                        $sql = $sql . "and city='$city' and state='$state' ";
                                    }

                                    $price = $_REQUEST['price'];
                                    $acreage = $_REQUEST['acreage'];

                                    $str_price = str_replace(array('triệu', 'm2'), '',  $price);
                                    $str_acreage = str_replace(array('triệu', 'm2'), '',  $acreage);

                                    preg_match_all('/\d+/', $str_price, $matches_price);
                                    preg_match_all('/\d+/', $str_acreage, $matches_acreage);

                                    $arr_price = $matches_price[0];
                                    $arr_acreage = $matches_acreage[0];







                                    if (count($arr_price) > 0) {
                                        $price1 = $arr_price[0] * 1000000;
                                        if (count($arr_price) == 1) {
                                            if ($arr_price[0] == 1) {
                                                $sql = $sql . "and price <  $price1 ";
                                            } else {
                                                $sql = $sql . "and price >  $price1 ";
                                            }
                                        } else {
                                            $price2 = $arr_price[1] * 1000000;
                                            $sql = $sql . "and price BETWEEN $price1 AND $price2 ";
                                        }
                                    }


                                    if (count($arr_acreage) > 0) {
                                        if (count($arr_acreage) == 1) {
                                            if ($arr_acreage[0] == 20) {
                                                $sql = $sql . "and size < $arr_acreage[0] ";
                                            } else {
                                                $sql = $sql . "and size > $arr_acreage[0] ";
                                            }
                                        } else {
                                            $sql = $sql . "and size BETWEEN $arr_acreage[0] AND $arr_acreage[1] ";
                                        }
                                    }




                                    $result = mysqli_query($con, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        if ($result == true) {
                                            while ($row = mysqli_fetch_array($result)) {

                                ?>

                                                <div class="col-md-6">
                                                    <div class="featured-thumb hover-zoomer mb-4">
                                                        <div class="overlay-black overflow-hidden position-relative" style="border-radius: 5px;"> <img src="admin/property/<?php echo $row['18']; ?>" alt="pimage">

                                                            <div class="sale bg-success text-white"><?php echo $row['5']; ?></div>
                                                            <div class="price text-primary"><?php echo $row['12']; ?> VNĐ<span class="text-white"><?php echo $row['11']; ?> m²</span></div>

                                                        </div>
                                                        <div class="featured-thumb-data shadow-one">
                                                            <div class="p-4">
                                                                <h4 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h4>
                                                                <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['15']; ?> - <?php echo $row['16']; ?></span>
                                                            </div>
                                                            <div class="px-4 pb-4 d-inline-block w-100">
                                                                <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>Nguồn : <?php echo $row['uname']; ?></div>
                                                                <div class="float-left"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo "Ngày đăng: " . date('d-m-Y', strtotime($row['date'])); ?></div>
                                                                <div class="float-left"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo "Hết hạn: " . date('d-m-Y', strtotime($row['new_date'])); ?></div>
                                                                <div class="stars float-right" style="color: rgb(218, 165, 32);">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php
                                            }
                                        }
                                    } else {

                                        echo "<h1 class='mb-5'><center>Bất động sản hiện không có sẵn!</center></h1>";
                                    }
                                }

                                ?>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="sidebar-widget">
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Bảng tính</h4>
                                <form class="d-inline-block w-100" action="calc.php" method="post">
                                    <label class="sr-only">Số lượng bất động sản</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">VNĐ</div>
                                        </div>
                                        <input type="text" class="form-control" name="amount" placeholder="Giá bất động sản">
                                    </div>
                                    <label class="sr-only">Tháng</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="month" placeholder="Số tháng">
                                    </div>
                                    <label class="sr-only">Lãi suất</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">%</div>
                                        </div>
                                        <input type="text" class="form-control" name="interest" placeholder="Lãi suất">
                                    </div>
                                    <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4" style="border-radius:5px;">Tính trả góp</button>
                                </form>
                            </div>

                            <div class="sidebar-widget mt-5">
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Tin đăng mới nhất</h4>
                                <ul class="property_list_widget">

                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <li> <img src="admin/property/<?php echo $row['18']; ?>" style="border-radius: 3px;" alt="pimage">
                                            <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h6>
                                            <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> </i> <?php echo $row['15'];?> - </i> <?php echo $row['16'];?></span>

                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!--	Footer   start-->
            <?php include("include/footer.php"); ?>
            <!--	Footer   start-->

            <!-- Scroll to top -->
            <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
            <!-- End Scroll To top -->
        </div>
    </div>
    <!-- Wrapper End -->

    <!--	Js Link
============================================================-->
    <script src="js/jquery.min.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/greensock.js"></script>
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tmpl.js"></script>
    <script src="js/jquery.dependClass-0.1.js"></script>
    <script src="js/draggable-0.1.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.js"></script>

    <script src="js/custom.js"></script>
</body>

</html>