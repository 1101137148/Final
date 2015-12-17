<?php
include './db.inc.php';

$daily_record_id_u=$_POST['daily_record_id_u'];

try 
{
    $db = init_db();
            
	//* 修改,彈出dialog *//
	$update_stmt = $db->prepare("SELECT * FROM dailyrecord WHERE daily_record_id=?");
	$update_count = $update_stmt->execute(array($daily_record_id_u));
					
	if($update_count){
	$update_row=$update_stmt->fetch();

			$u_window = '<div class="ui-popup-container fade in ui-popup-active" id="updateDialog-popup" style="width: 260px; top: 64.5px; left: 57.5px;"><div data-role="popup" id="myUpdateDialog" class="ui-popup ui-body-inherit ui-overlay-shadow ui-corner-all">';
			$u_window.= '<div data-role="header" role="banner" class="ui-header ui-bar-inherit">';
			$u_window.= '<a href="#health_people.html" class="ui-btn-left ui-btn ui-btn-b ui-icon-delete ui-btn-icon-notext ui-btn-inline ui-shadow ui-corner-all" data-rel="back" data-role="button" role="button"></a>';
			$u_window.= '<h4 class="modal-title ui-title" role="heading" aria-level="1">修改健康紀錄</h4>';
			$u_window.= '</div>';
			$u_window.= '<div id="updateDialog" data-role="main" class="ui-content">';
			$u_window.= '<div class="modal-body" data-role="main">';
			$u_window.=	'<input type="hidden" name="people_id" id="people_id" value=1>';
			$u_window.=	"<div class='form-group'><input type='hidden' id='daily_record_id_u' name='daily_record_id_u' value=".$update_row['daily_record_id']."></div>";
			$u_window.=	"<div class='form-group'><label>日期:</label><div class='ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset'><input type='date' id='u_today_date' name='u_today_date' value=".$update_row['today_date']."></div></div>";
			$u_window.=	"<div class='form-group'><label>身高:</label><div class='ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset'><input type='text' id='u_height' name='u_height' value=".$update_row['height']."></div></div>";
			$u_window.=	"<div class='form-group'><label>體重:</label><div class='ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset'><input type='text' id='u_weight' name='u_weight' value=".$update_row['weight']."></div></div>";
			$u_window.=	"<div class='form-group'><label>收縮壓:</label><div class='ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset'><input type='text' id='u_s_pressure' name='u_s_pressure' value=".$update_row['s_pressure']."></div></div>";
			$u_window.=	"<div class='form-group'><label>舒張壓:</label><div class='ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset'><input type='text' id='u_d_pressure' name='u_d_pressure' value=".$update_row['d_pressure']."></div></div>";
			$u_window.=	"<div class='form-group'><label>飯前血糖:</label><div class='ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset'><input type='text' id='u_f_bloodglucose' name='u_f_bloodglucose' value=".$update_row['f_bloodglucose']."></div></div>";
			$u_window.=	"<div class='form-group'><label>飯後血糖:</label><div class='ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset'><input type='text' id='u_l_bloodglucose' name='u_l_bloodglucose' value=".$update_row['l_bloodglucose']."></div></div>";
			$u_window.=	'</div>';
			$u_window.= '</div>';
			$u_window.= '<div data-role="footer" role="contentinfo" class="ui-footer ui-bar-inherit">';
			$u_window.= '<h1 class="ui-title" role="heading" aria-level="1"><button data-rel="back" onclick="update_health_record()" class=" ui-btn ui-shadow ui-corner-all">送出</button></h1>';
			$u_window.= '</div>';
			$u_window.= '</div>';

	}
	echo $u_window;
} 
catch (PDOException $e) 
{
    echo $e->getMessage();
}
?>
