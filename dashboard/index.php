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

require "timeAgo.php";
require "timeAgoDef.php";
// date_default_timezone_set('UTC');

$status = ['open', 'done', 'waiting', 'out source'];

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
      <?php

      $stm = $db->prepare("SELECT * FROM item");
      $stm->execute();
      foreach ($stm->fetchAll() as $item) { ?>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card" style="background-color: #212359; color: #ffff;">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">

                    <h3 class="mb-0">
                      <?php
                        $items = $item['item'];
                        $stm = $db->prepare("SELECT * FROM product WHERE item ='$items'");
                        $stm->execute();
                        echo  $stm->rowCount() > 0 ?  $stm->rowCount() : 0;
                      ?>
                    </h3>
                    <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-danger ">
                    <span class="mdi mdi-laptop icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text font-weight-normal" style="color: #ffff;"><?php echo $item['item'] ?></h6>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>
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
    <!-- Default Modal -->
    <div class="col-lg-4 col-md-6">
      <div class="mt-3">
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="../backend/causeRecord.php" method="post" enctype="multipart/form-data">
              <div class="modal-content">
                <input type="hidden" name="issue_id" id="issue_id">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Cause Model</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">Cause</label>
                      <input type="text" id="nameBasic" name="cause" class="form-control" placeholder="Enter cause" />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php

    if ($userType === 'ICT') { ?>

      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card" style="background-color: #212359; color: #ffff;">
            <div class="card-body">
              <h4 class="card-title">Help Desk </h4>
              <div class="table-responsive">
                <table class="table" id="myTable" style="color: #ffff;">
                  <thead>
                    <tr>
                      <th class="text-light"> # </th>
                      <th class="text-light"> Error Code </th>
                      <th class="text-light"> Error Type </th>
                      <th class="text-light"> Department </th>
                      <th class="text-light"> Subject </th>
                      <th class="text-light"> Created By </th>
                      <th class="text-light"> From </th>
                      <th class="text-light"> Created </th>
                      <th class="text-light"> Status </th>
                      <th class="text-light"> End Time </th>
                      <th class="text-light"> Cause </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    $stm = $db->prepare("SELECT * FROM helpdesk ORDER BY create_time DESC LIMIT $starting_limit, $results_per_page");
                    $stm->execute();
                    foreach ($stm->fetchAll() as $users):
                      if ($users['by_who'] !== $userInfo['username'] && $users['by_who'] !== 'all') continue;
                      $type = $users['error_type'];
                      $stm = $db->prepare("SELECT * FROM error WHERE error_type = '$type'");
                      $stm->execute();
                      $error = $stm->fetch(PDO::FETCH_ASSOC);

                      $no = $no + 1;
                    ?>
                      <tr>
                        <td> <?php echo $no ?> </td>
                        <td> <?php echo $error['error_code'] ? $error['error_code'] : '' ?> </td>
                        <!-- <td>
                        <?php if ($users['screenshot']) { ?>
                          <img src="<?php echo $users['screenshot'] ?>" alt="image" id="screenshot" onclick="viewScreenSot('<?php echo $users['screenshot'] ?>')" />
                        <?php } else {
                        ?>
                          <div class="badge badge-outline-warning">No screenshot</div>

                        <?php
                        } ?>
                      </td> -->
                        <td>
                          <?php echo $users['error_type'] ?>

                        </td>
                        <td> <?php echo $users['dep'] ?> </td>
                        <td> <?php echo $users['subject'] ?> </td>
                        <td> <?php echo $users['fname'] ?> </td>
                        <td> <?php echo $users['location'] ?> </td>
                        <!--   <td> <?php // echo timeago($users['create_time']) ?> </td> -->
                        <td> <?php echo $users['create_time'] ?> </td>
                        <td>
                          <?php
                          if ($users['cause'] === '') {

                          ?>
                            <style>
                              .status-container {
                                display: grid;
                                grid-template-columns: 1fr 1fr;
                                grid-template-rows: 1fr 1fr;
                                grid-template-areas: 'status selector'
                                  'cause cause';
                                gap: 10px;

                              }

                              .cause {
                                grid-area: cause;
                              }

                              .status {
                                grid-area: status;
                              }

                              .selector {
                                grid-area: selector;
                              }
                            </style>
                          <?php

                          } else {
                          ?>
                            <style>
                              .status-container {
                                display: flex;
                                gap: 5px;

                              }
                            </style>
                          <?php
                          } ?>


                          <?php

                          if ($users['status'] !== 'done') {
                            if ($users['status'] !== 'send') {
                          ?>
                              <div class="status-container">


                                <div class="status badge badge-outline-<?php if ($users['status'] === 'out source') echo 'danger';
                                                                        if ($users['status'] === 'waiting') echo 'warning';
                                                                        if ($users['status'] === 'open') echo 'info' ?>"><?php echo $users['status'] ?></div>


                                <button type="button" class="btn btn-danger cause" style="display: <?php echo $users['cause'] === '' ? 'block' : 'none' ?> ;" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="setIssueID('<?php echo $users['issue_id'] ?>')">
                                  Insert cause
                                </button>


                              <?php
                            }
                              ?>
                              <div class="dropdown selector">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Status </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                  <?php
                                  foreach ($status as $key => $value) {
                                    if ($users['status'] === $value) continue;
                                  ?>
                                    <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $users['issue_id'] ?>&status=<?php echo $value ?>"><?php echo ucwords($value) ?></a>
                                  <?php
                                  }
                                  ?>
                                </div>

                              </div>

                            <?php
                          } else { ?>
                              <div class="badge badge-outline-success">Done</div>
                            <?php
                          }
                            ?>
                              </div>
                        </td>
                        <td>
                          <?php
                          if ($users['work_start'] && $users['work_end']) {
                            $start = $users['work_start'] ? $users['work_start'] : $users['create_time'];
                            echo time_ago_def($users['work_start'], $users['work_end']);
                          }
                          ?>
                        </td>

                        <td>
                        <td> <?php echo $users['cause'] ?> </td>

                        </td>
                      </tr>

                    <?php
                    endforeach;
                    ?>

                  </tbody>
                </table>
              </div>
              <?php
              $tableName = "helpdesk";
              require('pagination.php');
              ?>
            </div>
          </div>
        </div>
      </div>
    <?php
    } else if ($userType === 'super') {
    ?>


      <div class="accordion mt-3" id="accordionExample">
        <div class="card accordion-item active">
          <h2 class="accordion-header" id="headingOne" style="color: #ffff;">
            <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne" style="background-color: #212359; color: #ffff;">
              User Management
            </button>
          </h2>

          <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: #ffff !important;">
              <div class=" row ">
                <div class=" col-12 grid-margin">
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
                              $no = $no + 1;
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
        </div>
        <div class=" accordion-item card bg-success" style="margin-top: 2px;">
          <h2 class="accordion-header" id="headingTwo">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo" style="background-color: #212359; color: #ffff;">
              Help Desk
            </button>
          </h2>
          <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: #ffff !important;">
              <div class="row ">
                <div class="col-12 grid-margin">
                  <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                      <h4 class="card-title">Help Desk </h4>
                      <div class="table-responsive">
                        <table class="table" id="myTable" style="color: #ffff;">
                          <thead>
                            <tr>
                              <th class="text-light"> # </th>
                              <th class="text-light"> Error Code </th>
                              <th class="text-light"> Error Type </th>
                              <th class="text-light"> Department </th>
                              <th class="text-light"> Subject </th>
                              <th class="text-light"> Created By </th>
                              <th class="text-light"> From </th>
                              <th class="text-light"> Created </th>
                              <th class="text-light"> Status </th>
                              <th class="text-light"> End Time </th>
                              <th class="text-light"> Cause </th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 0;
                            $stm = $db->prepare("SELECT * FROM helpdesk WHERE status!='done' ORDER BY create_time DESC LIMIT $starting_limit, $results_per_page");
                            $stm->execute();
                            foreach ($stm->fetchAll() as $users) :
                              $type = $users['error_type'];
                              $stm = $db->prepare("SELECT * FROM error WHERE error_type = '$type'");
                              $stm->execute();
                              $error = $stm->fetch(PDO::FETCH_ASSOC);

                              $no = $no + 1;
                            ?>
                              <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $error['error_code'] ? $error['error_code'] : '' ?> </td>
                                <!-- <td>
                        <?php if ($users['screenshot']) { ?>
                          <img src="<?php echo $users['screenshot'] ?>" alt="image" id="screenshot" onclick="viewScreenSot('<?php echo $users['screenshot'] ?>')" />
                        <?php } else {
                        ?>
                          <div class="badge badge-outline-warning">No screenshot</div>

                        <?php
                              } ?>
                      </td> -->
                                <td>
                                  <?php echo $users['error_type'] ?>

                                </td>
                                <td> <?php echo $users['dep'] ?> </td>
                                <td> <?php echo $users['subject'] ?> </td>
                                <td> <?php echo $users['fname'] ?> </td>
                                <td> <?php echo $users['location'] ?> </td>
                                <!--   <td> <?php // echo timeago($users['create_time']) ?> </td> -->
                                <td> <?php echo $users['create_time'] ?> </td>
                                <td>
                                  <?php
                                  if ($users['cause'] === '') {

                                  ?>
                                    <style>
                                      .status-container {
                                        display: grid;
                                        grid-template-columns: 1fr 1fr;
                                        grid-template-rows: 1fr 1fr;
                                        grid-template-areas: 'status selector'
                                          'cause cause';
                                        gap: 10px;

                                      }

                                      .cause {
                                        grid-area: cause;
                                      }

                                      .status {
                                        grid-area: status;
                                      }

                                      .selector {
                                        grid-area: selector;
                                      }
                                    </style>
                                  <?php

                                  } else {
                                  ?>
                                    <style>
                                      .status-container {
                                        display: flex;
                                        gap: 5px;

                                      }
                                    </style>
                                  <?php
                                  } ?>


                                  <?php

                                  if ($users['status'] !== 'done') {
                                    if ($users['status'] !== 'send') {
                                  ?>
                                      <div class="status-container">


                                        <div class="status badge badge-outline-<?php if ($users['status'] === 'out source') echo 'danger';
                                                                                if ($users['status'] === 'waiting') echo 'warning';
                                                                                if ($users['status'] === 'open') echo 'info' ?>"><?php echo $users['status'] ?></div>


                                        <button type="button" class="btn btn-danger cause" style="display: <?php echo $users['cause'] === '' ? 'block' : 'none' ?> ;" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="setIssueID('<?php echo $users['issue_id'] ?>')">
                                          Insert cause
                                        </button>


                                      <?php
                                    }
                                      ?>
                                      <div class="dropdown selector">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Status </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                          <?php
                                          foreach ($status as $key => $value) {
                                            if ($users['status'] === $value) continue;
                                          ?>
                                            <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $users['issue_id'] ?>&status=<?php echo $value ?>"><?php echo ucwords($value) ?></a>
                                          <?php
                                          }
                                          ?>
                                        </div>

                                      </div>

                                    <?php
                                  } else { ?>
                                      <div class="badge badge-outline-success">Done</div>
                                    <?php
                                  }
                                    ?>
                                      </div>
                                </td>
                                <td>
                                  <?php
                                  if ($users['work_start'] && $users['work_end']) {
                                    $start = $users['work_start'] ? $users['work_start'] : $users['create_time'];
                                    echo time_ago_def($users['work_start'], $users['work_end']);
                                  }
                                  ?>
                                </td>

                                <td>
                                <td> <?php echo $users['cause'] ?> </td>

                                </td>
                              </tr>

                            <?php
                            endforeach;
                            ?>

                          </tbody>
                        </table>
                      </div>
                      <?php
                      $tableName = "helpdesk";
                      require('pagination.php');
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    <?php
    }

    ?>
  </div>

</div>
<!-- main-panel ends -->

<script src="https://cdn.datatables.net/v/bs5/dt-2.0.3/datatables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script>
  // let table = new DataTable('#myTable');
  // $(document).ready(function() {
  //   alert('TableMode');
  //   new DataTable('#myTable');
  // });

  const viewScreenSot = (screenshot) => {
    let screenshotView = document.querySelector('#screenshotView');

    console.log(screenshot)
    screenshotView.classList.add('open-Model')
    screenshotView.src = screenshot
  }
  const closeModel = (e) => {
    let model = document.querySelector('#screenshotView');
    model.style.display = 'none'
    model.style.height = '0';
  }

  const setIssueID = (issueID) => {
    document.querySelector('#issue_id').value = issueID
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