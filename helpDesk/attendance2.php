<?php
$title = "attendance";
require('../config/connection.php');
session_start();
if (!isset($_SESSION['helpSession'])) {
    header('Location:../index.php?error=your not logged in');
}



$connect = new dbConnect();

$db = $connect->dbConnection();

?>
<style>
    .pointer {
        cursor: pointer;
    }

    .info-card {
        width: 25%;
        text-justify: inter-cluster;
    }
</style>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Student info/</span> Attendance Report</h4>


<div class="card">
    <h5 class="card-header">Student Attendance Report</h5>
    <div class="d-flex justify-content-end mb-5">
        <div class="card info-card">
            <p class="text-center text-info">Attendance Map</p>
            <p class="text-start text-second"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2 text-success" viewBox="0 0 16 16">
                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                </svg> Attend</p>
            <p class="text-start text-second"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg> Absent</p>
            <p class="text-start text-second"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-lg text-warning" viewBox="0 0 16 16">
                    <path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" />
                </svg>Permission</p>
            <p class="text-start text-second">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash2 text-primary" viewBox="0 0 16 16">
                    <path d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z" />
                </svg> Empty
            </p>
        </div>
    </div>
    <h4 class="card-header text-light text-center">All Student Attendance Status</h4>

    <table class="table table-hover Responsive ">
        <thead>
            <tr>
                <th>#</th>
                <th>Full name</th>
                <!-- <th>Section</th>
                <th>Value</th> -->
                <?php


                $attendanceFile = $_FILES['attendanceSheet'];



                if ($attendanceFile['size'] <= 0) {
                    header('location:../?error=Excel file required!!! please insert and upload');
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

                function removeDuplicates($array, $key)
                {
                    $result = [];
                    $seen = [];

                    var_dump($array);

                    // foreach ($array as $val) {
                    //     echo $val;
                    //     if (!isset($seen[$val[$key]])) {
                    //         $seen[$val[$key]] = true;
                    //         $result[] = $val;
                    //     }
                    // }

                    return $result;
                }

                function fetchDataByDate($data, $targetDate)
                {
                    return array_filter($data, function ($record) use ($targetDate) {
                        return !empty($record === $targetDate);
                    });
                }


                foreach ($data as $emp) {


                    $dep = $emp[0];
                    $name = $emp[1];
                    $no = $emp[2];
                    $date = $emp[3];
                    $loca = $emp[4];


                    $date = explode(' ', $date)[0];
                    $time = explode(' ', $emp[3])[1];

                    $emp[] = $date;
                    // $cleanedArray = removeDuplicates($emp, 'date');


                    // Example usage:
                    $targetDate = '6/21/2024';
                    $filteredData = fetchDataByDate($emp, $targetDate);
                    print_r($filteredData);



                ?>
                    <th><?php echo $date ?></th>

                <?php }
                ?>
            </tr>

        </thead>
        <tbody>

            <?php
            $count = 0;



            foreach ($studentFullData as $i => $student) :
                $stm = $db->prepare("SELECT * FROM attendance WHERE name=:stId");
                $stm->bindValue(':stId', $student['name']);
                $stm->execute();
                $attendFullDate =  $stm->fetchAll();
                $cleanedArray = removeDuplicates($attendFullDate);

                // $dateSelected = $cleanedArray[0]['date'];
            ?>


                <tr class="pointer" onclick="changeUrl()">
                    <td class="text-primary"><?php echo ++$i . '.' ?></td>


                    <td><strong> <?php echo $student['name'] ?></strong></td>


                    <?php


                    foreach ($cleanedArray as $as) {
                        $c = 0;
                        $stm = $db->prepare("SELECT * FROM attendance WHERE name=:stId AND date=:date");
                        $stm->bindValue(':stId', $student['name']);
                        $stm->bindValue(':date', $as['date']);
                        $stm->execute();
                        $attendanceCheck = count($stm->fetchAll());


                        echo '<td>' . $attendanceCheck . '</td>';
                    }
                    ?>




                </tr>


            <?php endforeach;
            ?>

        </tbody>
    </table>
</div>
</div>

<script src="../assets/js/jquery.min.js"></script>

<script>
    function changeUrl() {

        var currentUrl = window.location.href

        var id = document.getElementsByName('id[]')
        var new_url = currentUrl;
        window.history.pushState("data", "Title", new_url);


        // for (i = 0; i <= id.length; i++) {
        //     a = id[i]
        //     console.log(a.value)


        // }

    }
</script>

<?php include_once "include/footer.php" ?>