<?php
include './db.inc.php';

$medicine_id=$_POST['medicine_id'];

$msg ="<div data-role='main' class='ui-content'>";
$msg.="<ul data-role='listview' class='ui-listview'>";  

try 
{
    $db = init_db();
		
	//* 刪除藥品提醒 *//
	$delete_stmt = $db->prepare("SELECT * FROM medicine WHERE medicine_id=?");
	$delete_count = $delete_stmt->execute(array($medicine_id));
    if($delete_count)
    {
        $delete_medicine = $db->exec("DELETE FROM `medicine` WHERE `medicine`.`medicine_id` = '" .$medicine_id. "';");			
	}
	
	//* 顯示藥品提醒 *//
	$medicine_stmt = $db->query("SELECT * FROM medicine");
	
	foreach ($medicine_stmt->fetchAll(PDO::FETCH_ASSOC) as $medicine_row) {

	$msg.='<li class="ui-li-has-alt ui-first-child"><a href="medicine_update.php?u_medicine_id='.$medicine_row['medicine_id'].'&&u_medicine_name='.$medicine_row['medicine_name'].'&&u_start_time='.$medicine_row['start_time'].'&&u_stop_time='.$medicine_row['stop_time'].'&&u_interval_hour='.$medicine_row['interval_hour'].'&&u_ps='.$medicine_row['ps'].'&&u_result='.$medicine_row['result'].'" id=listid'.$medicine_row['medicine_id'].' value='.$medicine_row['medicine_id'].' class="ui-btn"><span id=list_medicine_name'.$medicine_row['medicine_id'].' value='.$medicine_row['medicine_name'].'>'.$medicine_row['medicine_name'].'</span><span>　每日'.$medicine_row['interval_hour'].'次</span><h2>用藥起始日:'.$medicine_row['start_time'].'</h2><h2>停藥日:'.$medicine_row['stop_time'].'</h2><h2>備註:'.$medicine_row['ps'].'</h2><h2>使用效果:'.$medicine_row['result'].'</h2></a><button onclick="onDeleteClick(this.value)" data-rel="popup" data-position-to="window" data-transition="pop" aria-haspopup="true" aria-owns="purchase" aria-expanded="false" class="ui-btn ui-btn-icon-notext ui-icon-delete ui-btn-a" id="medicine_id" name="medicine_id" value="'.$medicine_row['medicine_id'].'"></a></li>';
	}
	$msg.="</ul></div>";
	
	echo $msg;
} 
catch (PDOException $e) 
{
    echo $e->getMessage();
}
?>
