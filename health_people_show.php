<?php
include './db.inc.php';
try 
{
    $db = init_db();
	
	//* 顯示個人資料  *//
	$stmt = $db->prepare("SELECT * FROM People WHERE people_id=?");
	$people_id=1; // 登入時，取得使用者id
	$count = $stmt->execute(array($people_id));
    if($count)
    {
        $row=$stmt->fetch();
	}
	
	$health_people_show = '<div class="people_label" id="name">姓名：<B>'.$row['name'].'</B></div>';
	$health_people_show.= '<div class="people_label" id="birth">出生：<B>'.$row['birth'].'</B></div>';
	$health_people_show.= '<div class="people_label" id="gender">性別：<B>'.$row['gender'].'</B></div>';
	$health_people_show.= '<div class="people_label" id="bloodType">血型：<B>'.$row['bloodType'].'</B></div>';
	
	echo $health_people_show;	
					
} 
catch (PDOException $e) 
{
    echo $e->getMessage();
}

?>