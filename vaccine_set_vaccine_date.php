<?php
    include './db.inc.php';
    $VaccineDate = $_POST['VaccineDate'];
    header('Content-Type: text/html; charset=utf-8');
    $json = file_get_contents('http://opendata.hccg.gov.tw/dataset/207305c0-89a3-47a5-9782-bfa3b0b68406/resource/6de34822-7fc4-44d8-a377-6d70e2d50cb0/download/20150303145533754.json');
    $json = substr($json, 3);
    $data = json_decode($json, true);
    $msg = "<div data-role='main' class='ui-content'>";
    $msg.="<ul data-role='listview' class='ui-listview'>";
    try {
        $db = init_db();

        $insert_SetVaccineDate = $db->exec("INSERT INTO `setvaccinedate`(`VaccineDate1`, `VaccineDate2`, `VaccineDate3`, `VaccineDate4`, `VaccineDate5`, `VaccineDate6`, `VaccineDate7`, `VaccineDate8`) VALUES ('" . $VaccineDate[1] . "','" . $VaccineDate[2] . "','" . $VaccineDate[3] . "','" . $VaccineDate[4] . "','" . $VaccineDate[5] . "','" . $VaccineDate[6] . "','" . $VaccineDate[7] . "','" . $VaccineDate[8] . "')");

        $vaccine_lastID = $db->query("SELECT MAX(checkbox_id) as lastID FROM vaccine");
        $lastID = $vaccine_lastID->fetch();
        $lastID = $lastID['lastID'];
        $vaccine_stmt = $db->prepare("SELECT * FROM vaccine WHERE checkbox_id=?");
        $count = $vaccine_stmt->execute(array($lastID));
        if ($count) {
            $row = $vaccine_stmt->fetch();
            $checkbox[0] = $row['checkbox1'];
            $checkbox[1] = $row['checkbox2'];
            $checkbox[2] = $row['checkbox3'];
            $checkbox[3] = $row['checkbox4'];
            $checkbox[4] = $row['checkbox5'];
            $checkbox[5] = $row['checkbox6'];
            $checkbox[6] = $row['checkbox7'];
            $checkbox[7] = $row['checkbox8'];
        }

        $setVaccineDate_lastID = $db->query("SELECT MAX(VaccineDate_id) as VaccineDate_lastID FROM setvaccinedate");
        $VaccineDate_lastID = $setVaccineDate_lastID->fetch();
        $VaccineDate_lastID = $VaccineDate_lastID['VaccineDate_lastID'];
        $VaccineDate_stmt = $db->prepare("SELECT * FROM setvaccinedate WHERE VaccineDate_id=?");
        $count2 = $VaccineDate_stmt->execute(array($VaccineDate_lastID));
        if ($count2) {
            $row2 = $VaccineDate_stmt->fetch();
            $VaccineDate[0] = $row2['VaccineDate1'];
            $VaccineDate[1] = $row2['VaccineDate2'];
            $VaccineDate[2] = $row2['VaccineDate3'];
            $VaccineDate[3] = $row2['VaccineDate4'];
            $VaccineDate[4] = $row2['VaccineDate5'];
            $VaccineDate[5] = $row2['VaccineDate6'];
            $VaccineDate[6] = $row2['VaccineDate7'];
            $VaccineDate[7] = $row2['VaccineDate8'];
        }

        for ($x = 0; $x < count($data); $x++) {

            $id[] = $x + 1;

            if ($checkbox[$x] == 1) {
                $checkbox_status = 'checked';
            } else {
                $checkbox_status = '';
            }

            $CName[] = $data[$x]['疫苗中文名稱'];
            $EName[] = $data[$x]['疫苗英文簡稱'];
            $Date[] = $data[$x]['接種時程'];
            $Times[] = $data[$x]['劑次'];
            $msg.="<input onclick='onSaveBtnClick(this.checked)' type='checkbox' " . $checkbox_status . " value='false' id='checkbox[" . $id[$x] . "]' name='checkbox[" . $id[$x] . "]' style='float:left;'><a href='#alarmDialog" . $id[$x] . "' data-rel='popup' data-position-to='window'><img src='icon/note.png' style='float:left;'></a></button><div><li class='ui-first-child'><a id='alarm" . $id[$x] . "' style='text-align:left;' href='get_vaccine_data.php?CName=" . $CName[$x] . "&&EName=" . $EName[$x] . "&&Date=" . $Date[$x] . "&&Times=" . $Times[$x] . "&&VaccineDate=" . $VaccineDate[$x] . "' class='ui-btn ui-btn-icon-right ui-icon-carat-r'>" . $id[$x] . "　" . $CName[$x] . "　預計打疫苗日" . $VaccineDate[$x] . "</a></li></div>";
        }
        $msg.="</ul></div>";

        echo $msg;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>