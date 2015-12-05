<?php
$checkbox=$_POST['checkbox'];

$db_host = 'db.mis.kuas.edu.tw';
$db_name = 's1101137114';
$db_user = 's1101137114';
$db_password ='hatedb';
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";

try 
{
    $db = new PDO($dsn, $db_user, $db_password);
	
	//* 勾選疫苗紀錄 *//
	$insert_VaccineRecord = $db->exec("INSERT INTO `vaccine`(`checkbox1`, `checkbox2`, `checkbox3`, `checkbox4`, `checkbox5`, `checkbox6`, `checkbox7`, `checkbox8`) VALUES ( ".$checkbox[1].", ".$checkbox[2].", ".$checkbox[3].", ".$checkbox[4].", ".$checkbox[5].", ".$checkbox[6].", ".$checkbox[7].", ".$checkbox[8].")");

} 
catch (PDOException $e) 
{
    echo $e->getMessage();
}
?>
