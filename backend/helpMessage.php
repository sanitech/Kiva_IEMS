<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();

$dep = $_POST['dep'];
$subject = $_POST['subject'];
$fname = $_POST['fname'];
$error = $_POST['error'];
$location = $_POST['location'];

if(strlen($subject)>40){
    header('location:../helpDesk/index.php?error=The maximum length for subject is 40 Characters.');
    exit(); 
}

if (empty($dep) || empty($error) || empty($fname)) {
    header('location:../helpDesk/index.php?error=Failed required');
    exit();
}

date_default_timezone_set("Africa/Addis_Ababa");
$currentTimestamp = date('Y-m-d H:i:s');
// var_dump($_FILES['screenshot']);

$cr=Time();
$screenshotPath=null;
// if(!empty($_FILES['screenshot']['name']) ){
//     $fileDir='../Data/screenshot/';
//     if(!is_dir($fileDir)){
//         mkdir($fileDir, 0755, true);
//     }
//     $screenshotPath= $fileDir. $screenshot['name'];  
//     move_uploaded_file($_FILES['screenshot']['tmp_name'], $screenshotPath);
// }

$stm_1 = $db->prepare("SELECT * FROM `helpdesk` Order By `issue_id` DESC");
$stm_1->execute();
$ID = $stm_1->fetch(PDO::FETCH_ASSOC);

$ID['issue_id']++;
$help=substr($ID['issue_id'], 5);
$helpID='Help-'.$help;

$date=date('Y-m-d');
$stm = $db->prepare("INSERT INTO helpdesk(issue_id, fname, dep, subject, create_time, status, error_type, by_who, date, location) VALUES ('$helpID', '$fname', '$dep', :subject, '$currentTimestamp', 'send', '$error','all', '$date', '$location')");
$stm->bindValue(":subject",$subject);

if ($stm->execute()) {
    header('location:../helpDesk/index.php?success=Successfully send message');
}
