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
            <div class="col-md-6 grid-margin">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                        <h4 class="card-title">Record Item</h4>
                        <form class="forms-sample" action="../backend/recordItem.php" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" style="background-color: darkgray;" id="exampleInputUsername2" name="item" placeholder="Laptop">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Record</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                        <h4 class="card-title">Item Table</h4>


                        <div class="table-responsive">
                            <table class="table" style="color: #ffff;">
                                <thead>
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Item</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $stm = $db->prepare("SELECT * FROM item");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $row) {
                                        $no = $no + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row['item'] ?></td>

                                            <td><a href="addItem.php?id=<?php echo $row['id'] ?>">
                                                    <label class="badge badge-warning pointer"><i class="mdi mdi-pen"></i></label></a>
                                                <a href="../backend/removeItem.php?id=<?php echo $row['id'] ?>">
                                                    <label class="badge badge-danger pointer"><i class="mdi mdi-delete-forever"></i></label></a>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>
<!-- main-panel ends -->

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