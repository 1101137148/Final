<?php

include './db.inc.php';

$checkbox=$_POST['checkbox'];

try 
{
    $db = init_db();
	
	//* 勾選疫苗紀錄 *//
	$insert_VaccineRecord = $db->exec("INSERT INTO `vaccine`(`checkbox1`, `checkbox2`, `checkbox3`, `checkbox4`, `checkbox5`, `checkbox6`, `checkbox7`, `checkbox8`) VALUES ( ".$checkbox[1].", ".$checkbox[2].", ".$checkbox[3].", ".$checkbox[4].", ".$checkbox[5].", ".$checkbox[6].", ".$checkbox[7].", ".$checkbox[8].")");

} 
catch (PDOException $e) 
{
    echo $e->getMessage();
}
?>
