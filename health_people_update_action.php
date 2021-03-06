<?php
    include './db.inc.php';
    $daily_record_id_u = $_POST['daily_record_id_u'];
    $today_date = $_POST['today_date'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $s_pressure = $_POST['s_pressure'];
    $d_pressure = $_POST['d_pressure'];
    $f_bloodglucose = $_POST['f_bloodglucose'];
    $l_bloodglucose = $_POST['l_bloodglucose'];
    $people_id = $_POST['people_id'];
    try {
        $db = init_db();

        //* 修改Table紀錄 *//
        $update_sql = $db->exec("UPDATE `dailyrecord` SET today_date='" . $today_date . "', height='" . $height . "', weight='" . $weight . "', s_pressure='" . $s_pressure . "', d_pressure='" . $d_pressure . "', f_bloodglucose='" . $f_bloodglucose . "', l_bloodglucose='" . $l_bloodglucose . "', people_id='" . $people_id . "' WHERE daily_record_id='" . $daily_record_id_u . "';");

        //* 顯示Table紀錄 *//
        $table_stmt = $db->query("SELECT * FROM dailyrecord");

        $msg = "<table>\n";
        $msg.="<tr><td></td><td>日期(Y/M/D)</td><td>身高(cm)</td><td>體重(kg)</td><td>BMI</td><td>血壓 收縮壓/舒張壓(mmHg)</td><td>血糖 飯前/飯後(mmol/l)</td></tr>";

        foreach ($table_stmt->fetchAll(PDO::FETCH_ASSOC) as $table_row) {

            if ($table_row['height'] != 0 && $table_row['weight'] != 0) {
                $height_m = $table_row['height'] / 100;
                $height_m2 = $height_m * $height_m;
                $bmi = round($table_row['weight'] / $height_m2, 2);
            }

            $msg.="<tr><td>";
            $msg.="<input type='image' onclick='update_health_record_dialog(this.value)' src='icon/update_icon.png' id='daily_record_id_u' name='daily_record_id_u' value=" . $table_row['daily_record_id'] . ">";
            $msg.="　<input type='image' onclick='delete_health_record(this.value)' src='icon/delete_icon.png' id='daily_record_id_d' name='daily_record_id_d' value=" . $table_row['daily_record_id'] . ">";
            $msg.="</td><td>";
            $msg.=$table_row['today_date'];
            $msg.="</td><td>";
            $msg.=$table_row['height'];
            $msg.="</td><td>";
            $msg.=$table_row['weight'];
            $msg.="</td><td>";
            if ($bmi < 18.5 || $bmi >= 24) {
                $msg.="<font color=red>" . $bmi . "</font>";
            } else {
                $msg.=$bmi;
            }
            $msg.="</td><td>";
            if ($table_row['s_pressure'] >= 140) {
                $msg.="<font color=red>" . $table_row['s_pressure'] . "</font>";
            } else {
                $msg.=$table_row['s_pressure'];
            }
            $msg.="/";
            if ($table_row['d_pressure'] >= 90) {
                $msg.="<font color=red>" . $table_row['d_pressure'] . "</font>";
            } else {
                $msg.=$table_row['d_pressure'];
            }
            $msg.="</td><td>";
            if ($table_row['f_bloodglucose'] >= 101) {
                $msg.="<font color=red>" . $table_row['f_bloodglucose'] . "</font>";
            } else {
                $msg.=$table_row['f_bloodglucose'];
            }
            $msg.="/";
            if ($table_row['l_bloodglucose'] >= 140) {
                $msg.="<font color=red>" . $table_row['l_bloodglucose'] . "</font>";
            } else {
                $msg.=$table_row['l_bloodglucose'];
            }
            $msg.="</td></tr>";
        }
        $msg .= "</table>";
        echo $msg;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
