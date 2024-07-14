<?php
require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$sn = $_POST['sn'];
$newSn = $_POST['newSn'];
$product = $_POST['product'];
$for = $_POST['for'];
$item = $_POST['item'];
$model = $_POST['model'];
$dep = $_POST['dep'];
$location = $_POST['location'];

$price = $_POST['price'];
$Date = $_POST['date'];
$status = $_POST['status'];
$pImage = $_FILES['pImage'];

if(empty($newSn) || empty($product) || empty($for)){
	header('location:../dashboard/editproduct.php?error=Failed required');
	exit();
}
if($newSn != $sn){
	$stm = $db->prepare("SELECT sn FROM product WHERE sn= '$newSn'");
	$stm->execute();
	if ($stm->rowCount() > 0) {
		header('location:../dashboard/editProduct.php?error=Serial number already exists&sn=' . $sn);
		exit();
	}
}
if(!empty($_FILES['pImage']['name']) ){
    $fileDir='../Data/product/';
    if(!is_dir($fileDir)){
        mkdir($fileDir, 0755, true);
    }
    $productImagePath= $fileDir. $pImage['name'];  
    move_uploaded_file($_FILES['pImage']['tmp_name'], $productImagePath);
}

$stm = $db->prepare("UPDATE product SET product='$product', sn='$newSn', employee='$for', item='$item', model='$model', location='$location', dep='$dep',
                     price='$price', date='$date', status='$status', p_image='$productImagePath' WHERE sn = '$sn'");
if ($stm->execute()) {
    header('location:../dashboard/product.php?success=Successfully update product');
}