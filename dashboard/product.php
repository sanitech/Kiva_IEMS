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
           <!-- <div class="col-lg-4 col-md-6">
                <div class="mt-3">
                    
                    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           
                            <form action="../backend/causeRecord.php" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <input type="hidden" name="issue_id" id="issue_id">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Product Image</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center">
                                        <img scr="" alt="" id="previewProductImage" width="300"/>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color: #212359; color: #ffff;">
                    <div class="card-body">
                        <h4 class="card-title">Product Table</h4>
                        <div class="d-flex justify-content-between mb-2 align-items-center">
                            <?php if($userType !='super'){ ?>
                            <a href="addproduct.php"> <button class="btn btn-success"><i class="mdi mdi-plus"></i> Add New Products</button></a>
                            <?php }?>
                            <div class="d-flex gap-2">
                               <select name="item" id="" class="form-control" style="background-color: darkgray;" onchange="filterItem(this.value, 'items')">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM item ");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { ?>
                                            <option value="<?php echo $item['item'] ?>"><?php echo $item['item'] ?></option>
                                        <?php
                                        }
                                        ?>
                               </select>
                                <input type="text" class="form-control" id="search" style="background-color: darkgray;" placeholder="Search" oninput="filterItem(this.value, 'search')">
                            </div>
                        </div>
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
                        <div class="table-responsive">
                            <table class="table" id="dataTable" style="color: #ffff;">
                                <thead>
                                    <tr>
                                        <th class="text-light">#</th>
                                        <th class="text-light">Item</th>
                                        <th class="text-light">Product</th>
                                        <th class="text-light">Model</th>
                                        <th class="text-light">Serial No</th>
                                        <th class="text-light">Department</th>
                                        <th class="text-light">Price</th>
                                        <th class="text-light">Employee</th>
                                        <th class="text-light">Location</th>
                                        <th class="text-light">Date</th>
                                        <th class="text-light">Status</th>
                                        <th class="text-light">P_Image</th>
                                        <th class="text-light"> Action</th>
                                    </tr>
                                </thead>
                                <tbody id="productTable">
                                    <?php
                                    $no = 0;
                                    $stm = $db->prepare("SELECT * FROM product ORDER BY date desc LIMIT $starting_limit, $results_per_page");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $row) {
                                        $pimage = $row['p_image'];

                                        $no = $no + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row['item'] ?></td>
                                            <td><?php echo $row['product'] ?></td>
                                            <td><?php echo $row['model'] ?></td>
                                            <td><?php echo $row['sn'] ?></td>
                                            <td><?php echo $row['dep'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><?php echo $row['employee'] ?></td>
                                            <td><?php echo $row['location'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <td>
                                                <button type="button"  class="btn btn-danger cause" style="" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="viewProductImage('<?php echo $pimage ?>')" style="background: transparent;">
                                                    <img src="<?php echo $row['p_image'] ?>" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                                                </button>
                                            </td>
                                            <td><a href="editProduct.php?sn=<?php echo $row['sn'] ?>">
                                                    <label class="badge badge-warning pointer"><i class="mdi mdi-pen"></i></label></a>
                                                <a href="../backend/removeProduct.php?sn=<?php echo $row['sn'] ?>">
                                                    <label class="badge badge-danger pointer"><i class="mdi mdi-delete-forever"></i></label></a>
                                            </td>

                                        </tr>
                                    <?php  }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    <?php
                      $tableName = "product";
                      require('pagination.php');
                      ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>-->

<script type="text/javascript">
    const viewProductImage = (viewProductImage) => {
        console.log(viewProductImage)
        document.getElementById('previewProductImage').src = viewProductImage
    }


    const filterItem = (value, status) => {
        console.log(value)
        const al = document.getElementById('productTable')
        $.ajax({

            url: '../backend/fetchProduct.php',
            method: 'POST',
            data: {
                key: value,
                status
            },
            success: (data) => {
                console.log(data)
                // al.value = data
                $('#productTable').html(data)
            }
        })
    }
</script>
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