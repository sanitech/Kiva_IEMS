<?php
require('../config/connection.php');
session_start();
if (!isset($_SESSION['isLogin'])) {
    header('Location:../admin.php?error=your not logged in');
}

$userType = $_SESSION['userType'];
$uid = $_SESSION['userinfo'];

$connect = new dbConnect();

$db = $connect->dbConnection();

$stm=$db->prepare("SELECT * FROM users WHERE uid='$uid'");
$stm->execute();

$userInfo = $stm->fetch(PDO::FETCH_ASSOC);

$stm_count = $db->prepare("SELECT COUNT(*) AS `count` FROM `helpdesk` WHERE `status` = 'send';");
$stm_count->execute();
$support_count = $stm_count->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php if($support_count['count'] > 0) echo '('.$support_count['count'].')'; ?> NT-ICT-EMS</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
	<link rel="stylesheet" href="../assets/css/u.css">
    <link rel="shortcut icon" href="../assets/images/Logo-1.png" />
    <script src="../assets/js/jquery.js"></script>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        <?php include 'sidebar.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <?php include '_navbar.php'; ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #ffff;">
        <div class="row">
            <div class="col-md-10">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                        <h4 class="card-title">Record Product</h4>
                        <form class="forms-sample" action="../backend/record.php" method="POST" enctype="multipart/form-data">
                            <?php
                            if (isset($_GET['error'])) {
                                $errMessage = $_GET['error'];
                            ?>
                                <div class="alert alert-danger"><?php echo $errMessage ?></div>

                            <?php
                            }
                            if (isset($_GET['success'])) {
                                $errMessage = $_GET['success'];
                            ?>
                                <div class="alert alert-success"><?php echo $errMessage ?></div>

                            <?php
                            }
                            ?>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Item</label>
                                <div class="col-sm-9">
                                    <select name="item" id="" style="background-color: darkgray;" class="form-control">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM item ");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { ?>
                                            <option value="<?php echo $item['item'] ?>"><?php echo $item['item'] ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputEmail2" style="background-color: darkgray;" name="product" placeholder="Enter product">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="background-color: darkgray;" id="exampleInputUsername2" name="model" placeholder="hp-EliteBook 840 G2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Serial Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" style="background-color: darkgray;" name="sn" placeholder="SN-23923">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <select name="for" id="" class="form-control" style="background-color: darkgray;" onchange="departmentHandler(event)">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM employee");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { ?>
                                            <option value="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control dep" id="exampleInputMobile" style="background-color: darkgray;" name="dep" id="dep" placeholder="please enter Location">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" style="background-color: darkgray;" name="location" placeholder="please enter Location">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" style="background-color: darkgray;" name="price" placeholder="200 Birr">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="exampleInputMobile" style="background-color: darkgray;" name="date" placeholder="please enter Location">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product Image</label>
                                <div class="col-sm-9">
                                    <div class="form-group row">
                                        <input type="file" name="pImage" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" style="background-color: darkgray; margin-right: 5px;" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" id="" style="background-color: darkgray; margin-bottom: 10px;" class="form-control">
                                        <option value="New">New</option>
                                        <option value="Used">Used</option>
                                </div>
                            </div>

                            <input type="submit" name="" class="btn btn-primary me-2 col-sm-3" id="" value="Record">

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- main-panel ends -->

<script>
    const departmentHandler = (e) => {
        console.log(e.target.value)
        const al = document.querySelector('.dep')
        $.ajax({

            url: '../backend/fetchEmployee.php',
            method: 'POST',
            data: {
                name: e.target.value
            },
            success: (data) => {
                console.log(data)
                al.value = data
            }
        })
    }
</script>

</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../assets/vendors/chart.js/Chart.min.js"></script>
<script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/hoverable-collapse.js"></script>
<script src="../assets/js/misc.js"></script>
<script src="../assets/js/settings.js"></script>
<script src="../assets/js/todolist.js"></script>
<script src="../assets/js/file-upload.js"></script>

<!-- endinject -->
<!-- Custom js for this page -->
<script src="../assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
</body>

</html>