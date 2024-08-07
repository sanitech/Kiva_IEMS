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

$stm = $db->prepare("SELECT * FROM users WHERE uid='$uid'");
$stm->execute();

$userInfo = $stm->fetch(PDO::FETCH_ASSOC);
// Pagination configuration
$results_per_page = 10;

// Determine current page number
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// Calculate starting limit for results
$starting_limit = ($page - 1) * $results_per_page;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NT-IT-EMS</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <!-- End layout styles -->
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