<?php
$medicine_id=$_POST['medicine_id'];
$medicine_name=$_POST['medicine_name'];
$start_time=$_POST['start_time'];
$stop_time=$_POST['stop_time'];
$interval_hour=$_POST['interval_hour'];
$ps=$_POST['ps'];
$result=$_POST['result'];

$db_host = 'db.mis.kuas.edu.tw';
$db_name = 's1101137114';
$db_user = 's1101137114';
$db_password ='hatedb';
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";

try 
{
    $db = new PDO($dsn, $db_user, $db_password);
	
	//* 修改藥品提醒 *//
	$update_sql = $db->exec("UPDATE `medicine` SET medicine_name='".$medicine_name."', start_time='".$start_time."', stop_time='".$stop_time."', interval_hour='".$interval_hour."', ps='".$ps."', result='".$result."' WHERE medicine_id='".$medicine_id."';");

} 
catch (PDOException $e) 
{
    echo $e->getMessage();
}
?>
