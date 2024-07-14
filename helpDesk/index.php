<?php
require('../config/connection.php');
session_start();
if (!isset($_SESSION['helpSession'])) {
    header('Location:../index.php?error=your not logged in');
}

$connect = new dbConnect();

$db = $connect->dbConnection();

$id = $_SESSION['helpSession'];

$stm = $db->prepare("SELECT * FROM users WHERE uid='$id'");

$stm->execute();

$userInfo = $stm->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NT-ICT Help Desk</title>
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
    <link rel="stylesheet" href="../assets/css/u.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/Logo-1.png" />
</head>

<body style="background-color: #212359; color: #ffff;">
    <div class="container-scroller">

        <?php
        if ($userInfo['dep'] == 'HR') {

            include 'sidebar.php';
        } ?>
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper" style="background-color: #ffff;">

                    <div class="card" style="background-color: #212359; color: #ffff;">
                        <div class="row">
                            <div class="col-lg-12 grid-margin">
                                <div class="card" style="background-color: #212359; color: #ffff;">
                                    <div class="card-body">
                                        <h4 class="card-title">Please tell us your problem</h4>
                                        </p>
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
                                        <form action="../backend/helpMessage.php" method="post" enctype="multipart/form-data">
                                            <div class="col-md-6 grid-margin stretch-card">
                                                <div class="card" style="background-color: #212359; color: #ffff;">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Full Name</label>
                                                            <select name="fname" id="" style="background-color: darkgray;" class="form-control">
                                                                <?php
                                                                $dep = $userInfo['dep'];
                                                                $stm = $db->prepare("SELECT * FROM employee WHERE dep='$dep'");
                                                                $stm->execute();
                                                                foreach ($stm->fetchAll() as $item) { ?>
                                                                    <option value="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Department</label>
                                                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="dep" placeholder="<?php echo $userInfo['dep'] ?>" value="<?php echo $userInfo['dep'] ?>">
                                                            <input type="text" class="form-control" style="background-color: darkgray;" id="exampleInputEmail1" disabled placeholder="<?php echo $userInfo['dep'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Select Support </label>
                                                            <select name="error" id="" style="background-color: darkgray;" class="form-control">
                                                                <?php
                                                                $stm = $db->prepare("SELECT * FROM error");
                                                                $stm->execute();
                                                                foreach ($stm->fetchAll() as $item) { ?>
                                                                    <option value="<?php echo $item['error_type'] ?>"><?php echo $item['error_type'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location </label>
                                                            <select name="location" id="" style="background-color: darkgray;" class="form-control">
                                                                <option value="Addis Abeba"> Addis Ababa</option>
                                                                <option value="Adama"> Adama</option>
                                                                <option value="Dire Dawa"> Dire Dawa</option>
                                                                <option value="Koka"> Koka</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Subject ( < 40 Characters )</label>
                                                                    <textarea name="subject" id="" style="background-color: darkgray;" class="form-control" cols="30" rows="10"></textarea>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                                        <a href="../backend/logout.php?to=index" class="btn btn-outline-danger me-2">Exit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- main-panel ends -->

            </div>

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