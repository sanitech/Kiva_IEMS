<?php
require "../dashboard/timeAgoDef.php";
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
if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
    $start = $_GET['start'];
    $end = $_GET['end'];
}
date_default_timezone_set("Africa/Addis_Ababa");
$today=date('Y-m-d');

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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/Logo-1.png" />
    <script src="../assets/js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/beforPrint.css" media="all">
</head>
<style>
    .date-picker {
        /* height: 2rem; */
        background-color: #ddd;
        border: none;
        padding: 10px 10px;
        margin-right: 10px;
    }

    .date-picker:active {
        border: 1px solid #ddd;
    }

    .btn-sub {
        background-color: blueviolet;
        color: #fff;
        padding: 10px 10px;
        border: none;
        outline: none;
        cursor: pointer;
        border-radius: 5px;
        box-shadow: 0 0 10 0 blueviolet;
    }

    .rest {
        background-color: red;
        margin-left: 10px;
    }

    .form-container label {
        font-family: sans-serif;
        margin-right: 10px;
        font-size: 1.2em;
        font-weight: 500;
    }

    .nowrap {
        white-space: nowrap;
    }
</style>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=900, height=1000, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write("<html><head><title>Help Desk Report</title>"); 
   docprint.document.write('<link rel="stylesheet" href="../assets/css/beforPrint.css" media="all">'); 
   docprint.document.write('</head><body onLoad="self.print()" style="font-family:Times New Roman; background-color: #212359; color: black;"> ');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus();
}
</script>


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
            <div class="col-lg-12 bg-white">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-head"><h4>Report Table</h4></div>
                    <div class="card-body">
                        <div class="print-controller">
                            <div class="d-flex justify-content-between mb-2 align-items-center">
                                <form action="" method="get" enctype="multipart/form-data" class="form-container">
                                    <label for="start"><h4>From</h4></label>
                                    <input type="date" name="start" id="start" class="date-picker" style="height: 40px;">
                                    <label for="end"><h4>To</h4></label>
                                    <input type="date" name="end" id="end" class="date-picker" style="height: 40px;">
                                    <button class="btn-sub btn-sm" type="submit ">Generate</button>
                                </form>
                                <a href="report-1.php"> <button class="btn-sub rest btn-sm">Reset Filter</button></a>
                                <i class="bi bi-printer bi-success" onclick="javascript:Clickheretoprint()"></i>
                            </div>
                        </div>

                        <div id="print_content">
                            <div class="report-container" style="background-color: #212359; color: #ffff;">
                                <div class="logo">
                                    <img src="../assets/images/National-Bi-Lingual.png" alt="">
                                </div>
                                <div class="report-info">
                                    <div class="date"><?php echo date('d-m-Y H:i a') ?></div>
                                    <div class="title">All report <?= isset($start) && isset($end) ? $start . ' / ' . $end : '' ?></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table bg-white text-dark">
                                    <thead>
                                        <th class="cell text-light" style="background-color: #212359;">#</th>
                                        <th class="cell text-light" style="background-color: #212359;">Help-ID</th>
                                        <th class="cell text-light" style="background-color: #212359;">Error type</th>
                                        <th class="cell text-light" style="background-color: #212359;">Name</th>
                                        <th class="cell text-light" style="background-color: #212359;">Department</th>
                                        <th class="cell text-light" style="background-color: #212359;">Subject</th>
                                        <th class="cell text-light" style="background-color: #212359;">From</th>
                                        <th class="cell text-light" style="background-color: #212359;">Date</th>
                                        <th class="cell text-light" style="background-color: #212359;">Completed In</th>
                                        <!-- <th class="cell text-light" style="background-color: #212359;">Status</th> -->
                                        <th class="cell text-light" style="background-color: #212359;">By Who</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])){
                                        $start = $_GET['start'];
                                        $end = $_GET['end'];

                                        if($userInfo['dep'] == 'super'){
                                            $stm = $db->prepare("SELECT * FROM helpdesk WHERE date BETWEEN '$start' AND '$end' AND status='done' ORDER BY create_time DESC");
                                        }
                                        else{
                                            $stm = $db->prepare("SELECT * FROM helpdesk WHERE date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' AND status='done' ORDER BY create_time DESC");
                                        }

                                    }
                                    elseif ($userInfo['dep'] == 'super') {
                                        $stm = $db->prepare("SELECT * FROM helpdesk WHERE work_end like '$today%' AND status='done' ORDER BY create_time DESC");
                                    }
                                    else {
                                        $stm = $db->prepare("SELECT * FROM helpdesk WHERE work_end like '$today%' AND status='done' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                    }
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $help) :
                                        
                                        ?>
                                        <tr>
                                            <td class="nowrap"><?= ++$i ?></td>
                                            <td class="nowrap"><?= $help['issue_id'] ?></td>
                                            <td class="nowrap"><?= $help['error_type'] ?></td>
                                            <td class="nowrap"><?= $help['fname'] ?></td>
                                            <td><?= $help['dep'] ?></td>
                                            <td class="nowrap"><?= $help['subject'] ?></td>
                                            <td><?= $help['location'] ?></td>
                                            <td class="nowrap"><?= $help['create_time']  ?></td>
                                            <td>
                                            <?php
                                            if ($help['work_start'] && $help['work_end']) {
                                                $start = $help['work_start'] ? $help['work_start'] : $help['create_time'];
                                                echo time_ago_def($help['work_start'], $help['work_end']);
                                            }
                                            ?>
                                            </td>
                                            <!-- <td>
                                                <div class=" status status-<?php if ($help['status'] === 'out source') echo 'danger';
                                                        if ($help['status'] === 'waiting') echo 'warning';
                                                        if ($help['status'] === 'open') echo 'info';
                                                        if ($help['status'] === 'done') echo 'success';
                                                        if ($help['status'] === 'send') echo 'danger' ?>"> <?= $help['status'] ?>
                                                </div>
                                            </td> -->
                                            <td class="nowrap"><?= ucwords($help['by_who']) ?></td>
                                        </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-title">Report by Department</div>
                                <div class="card-container">
                                    <?php
                                    if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
                                        $start = $_GET['start'];
                                        $end = $_GET['end'];

                                        if($userInfo['dep'] == 'super'){
                                                $stm = $db->prepare("SELECT DISTINCT dep FROM helpdesk WHERE status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                        }
                                        else{
                                            $stm = $db->prepare("SELECT DISTINCT dep FROM helpdesk WHERE status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                        }
                                    }
                                    elseif ($userInfo['dep'] == 'super') {
                                        $stm = $db->prepare("SELECT DISTINCT dep FROM helpdesk WHERE status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                    }
                                    else {
                                        $stm = $db->prepare("SELECT DISTINCT dep FROM helpdesk WHERE status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                    }
                                    
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $row) {
                                        if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
                                            $start = $_GET['start'];
                                            $end = $_GET['end'];

                                            if($userInfo['dep'] == 'super'){
                                                $stm = $db->prepare("SELECT * FROM helpdesk WHERE dep=:dep AND status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                            }
                                            else{
                                                $stm = $db->prepare("SELECT * FROM helpdesk WHERE dep=:dep AND status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                            }
                                        }
                                        elseif ($userInfo['dep'] == 'super') {
                                            $stm = $db->prepare("SELECT * FROM helpdesk WHERE dep=:dep AND status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                        }
                                        else {
                                            $stm = $db->prepare("SELECT * FROM helpdesk WHERE dep=:dep AND status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                        }
                                        $stm->execute([':dep'=>$row['dep']]);
                                        $count=$stm->rowCount();
                                    ?>
                                    <div class="card bg-danger" style="width:10%;">
                                        <span class="dep-name" style="font-size:18px; font-weight:bold;"><u><?= $row['dep'] ?></u></span>
                                        <span class="count-dep" style="color:#212359; font-size:18px; font-weight:bold;">Total Supp.: <?= $count?></span>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <div class="card-title">Report by Support</div>
                                <div class="card-container">
                                    <?php
                                    if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
                                        $start = $_GET['start'];
                                        $end = $_GET['end'];

                                        if($userInfo['dep'] == 'super'){
                                            $stm = $db->prepare("SELECT DISTINCT error_type FROM helpdesk WHERE status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                        }
                                        else{
                                            $stm = $db->prepare("SELECT DISTINCT error_type FROM helpdesk WHERE status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                        }
                                    }
                                    elseif ($userInfo['dep'] == 'super') {
                                        $stm = $db->prepare("SELECT DISTINCT error_type FROM helpdesk WHERE status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                    }
                                    else {
                                        $stm = $db->prepare("SELECT DISTINCT error_type FROM helpdesk WHERE status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                    }
                                
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $row) {
                                        if (isset($_GET['start']) && isset($_GET['end']) && !empty($_GET['start']) && !empty($_GET['end'])) {
                                            $start = $_GET['start'];
                                            $end = $_GET['end'];

                                            if($userInfo['dep'] == 'super'){
                                                $stm = $db->prepare("SELECT * FROM helpdesk WHERE error_type=:error_type AND status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                                $stm1 = $db->prepare("SELECT DISTINCT dep FROM helpdesk WHERE error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                                $stm2 = $db->prepare("SELECT * FROM helpdesk WHERE location='Dire Dawa' AND error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                                $stm3 = $db->prepare("SELECT * FROM helpdesk WHERE location='Adama' AND error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                                $stm4 = $db->prepare("SELECT * FROM helpdesk WHERE location='Koka' AND error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                                $stm5 = $db->prepare("SELECT * FROM helpdesk WHERE location='Addis Abeba' AND error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' ORDER BY create_time DESC");
                                            }
                                            else{
                                                $stm = $db->prepare("SELECT * FROM helpdesk WHERE error_type=:error_type AND status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                                $stm1 = $db->prepare("SELECT DISTINCT dep FROM helpdesk WHERE error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                                $stm2 = $db->prepare("SELECT * FROM helpdesk WHERE location='Dire Dawa' AND error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                                $stm3 = $db->prepare("SELECT * FROM helpdesk WHERE location='Adama' AND error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                                $stm4 = $db->prepare("SELECT * FROM helpdesk WHERE location='Koka' AND error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                                $stm5 = $db->prepare("SELECT * FROM helpdesk WHERE location='Addis Abeba' AND error_type='$row[error_type]' AND status='done' AND date BETWEEN '$start' AND '$end' AND by_who='$userInfo[username]' ORDER BY create_time DESC");
                                            }
                                        }
                                        else if ($userInfo['dep'] == 'super') {
                                            $stm = $db->prepare("SELECT * FROM helpdesk WHERE error_type=:error_type AND status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm1 = $db->prepare("SELECT DISTINCT dep FROM helpdesk WHERE error_type='$row[error_type]' AND status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm2 = $db->prepare("SELECT * FROM helpdesk WHERE location='Dire Dawa' AND error_type='$row[error_type]' AND status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm3 = $db->prepare("SELECT * FROM helpdesk WHERE location='Adama' AND error_type='$row[error_type]' AND status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm4 = $db->prepare("SELECT * FROM helpdesk WHERE location='Koka' AND error_type='$row[error_type]' AND status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm5 = $db->prepare("SELECT * FROM helpdesk WHERE location='Addis Abeba' AND error_type='$row[error_type]' AND status='done' AND work_end like '$today%' ORDER BY create_time DESC");
                                        }
                                        else {
                                            $stm = $db->prepare("SELECT * FROM helpdesk WHERE error_type=:error_type AND status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm1 = $db->prepare("SELECT DISTINCT dep FROM helpdesk WHERE error_type='$row[error_type]' AND status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm2 = $db->prepare("SELECT * FROM helpdesk WHERE location='Dire Dawa' AND error_type='$row[error_type]' AND status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm3 = $db->prepare("SELECT * FROM helpdesk WHERE location='Adama' AND error_type='$row[error_type]' AND status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm4 = $db->prepare("SELECT * FROM helpdesk WHERE location='Koka' AND error_type='$row[error_type]' AND status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                            $stm5 = $db->prepare("SELECT * FROM helpdesk WHERE location='Addis Abeba' AND error_type='$row[error_type]' AND status='done' AND by_who='$userInfo[username]' AND work_end like '$today%' ORDER BY create_time DESC");
                                        }
                                        $stm->execute([':error_type'=>$row['error_type']]);
                                        $count=$stm->rowCount();

                                        $stm1->execute();
                                        $depcount=$stm1->rowCount();
                                       
                                        $stm2->execute();
                                        $ddcount=$stm2->rowCount();
                                       
                                        $stm3->execute();
                                        $adcount=$stm3->rowCount();
                                       
                                        $stm4->execute();
                                        $kokacount=$stm4->rowCount();
                                       
                                        $stm5->execute();
                                        $addcount=$stm5->rowCount();
                                    ?>
                                    <div class="card bg-danger" style="width:15%;">
                                        <span class="dep-name" style="font-size:18px; font-weight:bold;"><u><?= $row['error_type'] ?></u></span>
                                        <span class="count-dep" style="color:#212359; font-size:18px;"><b>Total Supp.: <?= $count?></b></span>
                                        <span class="dep-name" style="color:#212359; font-size:18px;"><b>No. of Dep : <?= $depcount ?></b></span>
                                        <span class="dep-name" style="font-size:17px;"><b>Location</b></span>
                                        <?php
                                        if($ddcount != 0){
                                        ?>
                                        <span class="dep-name" style="color:#212359; font-size:18px;"><b>DD : <?= $ddcount ?></b></span>
                                        <?php
                                        }
                                        if($adcount != 0){
                                        ?>
                                        <span class="dep-name" style="color:#212359; font-size:18px;"><b>AD : <?= $adcount ?></b></span>
                                        <?php
                                        }
                                        if($kokacount != 0){
                                        ?>
                                        <span class="dep-name" style="color:#212359; font-size:18px;"><b>Koka : <?= $kokacount ?></b></span>
                                        <?php
                                        }
                                        if($addcount != 0){
                                        ?>
                                        <span class="dep-name" style="color:#212359; font-size:18px;"><b>A.A : <?= $addcount ?></b></span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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