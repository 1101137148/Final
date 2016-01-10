<?php
    include './db.inc.php';
    $medicine_id = $_POST['medicine_id'];
    $medicine_name = $_POST['medicine_name'];
    $start_time = $_POST['start_time'];
    $stop_time = $_POST['stop_time'];
    $interval_hour = $_POST['interval_hour'];
    $ps = $_POST['ps'];
    $result = $_POST['result'];
    try {
        $db = init_db();

        //* 修改藥品提醒 *//
        $update_sql = $db->exec("UPDATE `medicine` SET medicine_name='" . $medicine_name . "', start_time='" . $start_time . "', stop_time='" . $stop_time . "', interval_hour='" . $interval_hour . "', ps='" . $ps . "', result='" . $result . "' WHERE medicine_id='" . $medicine_id . "';");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
