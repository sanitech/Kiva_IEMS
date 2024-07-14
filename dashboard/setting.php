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
        <?php
        if (isset($_GET['error'])) { ?>

            <div class="alert alert-danger"><?php echo $_GET['error'] ?></div>
        <?php } elseif (isset($_GET['success'])) { ?>
            <div class="alert alert-success"><?php echo $_GET['success'] ?></div>

        <?php } ?>
        <div class="card mb-4" style="background-color: #212359; color: #ffff;">
            <h5 class="card-header">Account Settings</h5>
            <!-- Account -->

            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">

                    <?php
                    if ($userInfo['profile']) {
                        echo '<img class="d-block rounded" id="profileImg" src="' . $userInfo['profile'] . '" alt="">';
                    } else {
                        $words = explode(" ", $userInfo['username']);
                        $fullName = "";

                        foreach ($words as $w) {
                            $fullName .= mb_substr($w, 0, 1);
                        }

                    ?>
                        <div class="d-block rounded no-profile setting-profile" style="width: auto;"> <?php echo strtoupper($fullName); ?></div>
                    <?php
                    }

                    ?>

                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="profile" class="account-file-input" onchange="changeProfile()" hidden accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary btn-success account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                          <a href="../backend/resetUserAccount.php?id=<?php echo $userInfo['uid'] ?>&what=profile">  <span class="d-none d-sm-block" style="color: #fff; text-decoration:none;">Reset</span></a>
                        </button>

                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG.</p>
                    </div>
                </div>

            </div>
            <hr class="my-0" />
            <div class="card-body">
                <form id="formAccountSettings" action="../backend/changePassword.php" method="post">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Current password</label>
                            <input class="form-control" type="password" id="firstName" style="background-color: darkgray;" name="password" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">New Password</label>
                            <input class="form-control" type="password" style="background-color: darkgray;" name="newPass" id="lastName" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Confirm Password</label>
                            <input class="form-control" type="password" style="background-color: darkgray;" name="rePass" />
                        </div>
                        <input type="hidden" name="redirect" id="" value="student">

                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Change Password</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
<!-- main-panel ends -->


<script>
    
    const changeProfile = (e) => {
        const profiles = document.getElementById('upload');

        let formData = new FormData();
        formData.append("profile", profiles.files[0]);
        
        console.log(profiles.files[0]['name']);
        $.ajax({
            url: '../backend/updateProfilePic.php',
            type: 'POST',
            data:formData,
            contentType: false,
            processData: false,
            
            success: function(data) {
                console.log(data);
                $('#profileImg').attr('src', data);
            },
            error: function(error) {
                console.log(error);
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