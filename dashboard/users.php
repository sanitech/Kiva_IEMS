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
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                        <h4 class="card-title">For Department</h4>
                        <form class="forms-sample" action="../backend/createUserDep.php" method="POST" enctype="multipart/form-data">


                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <select name="dep" id="" class="form-control" style="background-color: darkgray;">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM department");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { 
                                            if($item['dep']==='ICT')continue;
                                            ?>
                                            <option value="<?php echo $item['dep'] ?>"><?php echo $item['dep'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="exampleInputMobile" style="background-color: darkgray;" name="password" placeholder="*********">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Record</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                        <h4 class="card-title">For Users</h4>
                        <form class="forms-sample" action="../backend/createUser.php" method="POST" enctype="multipart/form-data">


                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">ICT Employee</label>
                                <div class="col-sm-9">
                                    <select name="username" id="" class="form-control" style="background-color: darkgray;">
                                        <?php
                                        $dep = 'ICT';
                                        $stm = $db->prepare("SELECT * FROM employee WHERE dep LIKE '%$dep%'");
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
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" style="background-color: darkgray;" id="exampleInputMobile" name="password" placeholder="*********">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-warning me-2">Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                        <h4 class="card-title">Department Table</h4>
                        <div class="table-responsive">
                            <table class="table" style="color: #ffff;">
                                <thead>
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Department</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $stm = $db->prepare("SELECT * FROM users");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $row) {
                                        $id = $_SESSION['userinfo'];
                                        if ($row['uid'] === $id || $row['dep']==='ICT') continue;

                                        $no = $no + 1;
                                    ?>

                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row['dep'] ?></td>
                                            <td><a href="../backend/deleteUser.php?uid=<?php echo $row['uid'] ?>">
                                                    <div class="badge badge-outline-danger">Create New Password</div>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php  }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                        <h4 class="card-title">Users Table</h4>
                        <div class="table-responsive">
                            <table class="table" style="color: #ffff;">
                                <thead>
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Name</th>
                                        <th class="text-light">Reset</th>
                                        <th class="text-light">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $stm = $db->prepare("SELECT * FROM users WHERE dep='ICT' ORDER BY last_login desc");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $row) {
                                        $id = $_SESSION['userinfo'];
                                        if ($row['uid'] === $id) continue;

                                        $no = $no + 1;
                                    ?>

                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><a href="../backend/resetUserAccount.php?id=<?php echo $row['uid'] ?>&who=password">
                                                    <div class="badge badge-outline-warning">Reset Account</div>
                                                </a>
                                            </td>
                                            <td> <a href="../backend/statusUpdater.php?id=<?php echo $row['uid'] ?>&from=users">
                                                <div class="status badge badge-outline-<?php echo $row['status'] ? 'success' : 'danger' ?>"><?php echo $row['status'] ? 'Enabled' : 'Disable' ?></div>
                                                </a>
                                            
                                                
                                            </td>

                                        </tr>
                                    <?php  }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>

      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card" style="background-color: #212359; color: #ffff;">
            <div class="card-body">
              <h4 class="card-title">User Management </h4>
              <div class="table-responsive">
                <table class="table" style="color: #ffff;">
                  <thead>
                    <tr>

                      <th class="text-light"> # </th>
                      <th class="text-light"> UserName </th>
                      <th class="text-light"> Department </th>
                      <th class="text-light"> Status </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                            $stm = $db->prepare("SELECT * FROM users ORDER BY last_login DESC LIMIT $starting_limit, $results_per_page");
                            $stm->execute();
                            foreach ($stm->fetchAll() as $i => $users) :
                              if ($users['dep'] === 'super' || $users['dep'] === 'admin' || $users['dep'] === 'ict' || $users['dep'] === 'ICT') continue;

                              $no = $no +1;
                            ?>
                              <tr>
                                <td><?php echo $no ?></td>

                                <td>
                                  <?php echo ucwords($users['username']) ?>
                                </td>
                                <td>
                                  <?php echo ucwords($users['dep']) ?>
                                </td>
                                <td>
                                  <a href="../backend/statusUpdater.php?id=<?php echo $users['uid'] ?>&from=index">
                                    <div class="status badge badge-outline-<?php echo $users['status'] ? 'success' : 'danger' ?>"><?php echo $users['status'] ? 'Enabled' : 'Disable' ?></div>
                                  </a>
                                </td>
                              </tr>

                            <?php
                            endforeach;
                            ?>


                  </tbody>
                </table>
              </div>
              <?php
                $tableName = "users";
                require('pagination.php');
              ?>
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