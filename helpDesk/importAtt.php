<?php
require('../config/connection.php');
session_start();
if (!isset($_SESSION['helpSession'])) {
    header('Location:../index.php?error=your not logged in');
}



$connect = new dbConnect();

$db = $connect->dbConnection();

if (isset($_POST['upload'])) {

    $attendanceFile = $_FILES['attendanceSheet'];



    if ($attendanceFile['size'] <= 0) {
        header('location:import.php?error=Excel file required!!! please insert and upload');
        exit();
    }

    $fileDir = '../Data/Attendance/';
    if (!is_dir($fileDir)) {
        mkdir($fileDir, 0755, true);
    }

    require "../excelReader/excel_reader2.php";
    require "../excelReader/SpreadsheetReader.php";

    $fileDirPath = $fileDir . $attendanceFile['name'];

    move_uploaded_file($_FILES['attendanceSheet']['tmp_name'], $fileDirPath);

    $data = new SpreadsheetReader($fileDirPath);
    $excelData = [];
    $stm = $db->prepare("DELETE FROM `attendance`");
    $stm->execute();

    foreach ($data as $emp) {
        $excelData[] = array_unique($emp);
        $dep = $emp[0];
        $name = $emp[1];
        $no = $emp[2];
        $date = $emp[3];
        $loca = $emp[4];


        $date = explode(' ', $date)[0];
        $time = explode(' ', $emp[3])[1];







        $stm = $db->prepare("INSERT INTO  attendance(name, dep, date, time) VALUES(:name, :dep, :date, :time)");
        $stm->bindParam(':name', $name);
        $stm->bindParam(':dep', $dep);
        $stm->bindParam(':date', $date);
        $stm->bindParam(':time', $time);
        $stm->execute();
    }
    header('location:attendance.php?success=Successfully Recorded attendance');
}
