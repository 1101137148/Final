<?php
$db_host = 'db.mis.kuas.edu.tw';
$db_name = 's1101137114';
$db_user = 's1101137114';
$db_password ='hatedb';
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";

try 
{
    $db = new PDO($dsn, $db_user, $db_password);
	
	$setVaccineDate_lastID = $db->query("SELECT MAX(VaccineDate_id) as VaccineDate_lastID FROM setvaccinedate");
	$VaccineDate_lastID = $setVaccineDate_lastID->fetch();
	$VaccineDate_lastID = $VaccineDate_lastID['VaccineDate_lastID'];
	$VaccineDate_stmt = $db->prepare("SELECT * FROM setvaccinedate WHERE VaccineDate_id=?");	
	$count2 = $VaccineDate_stmt->execute(array($VaccineDate_lastID));
		if($count2)
		{
			$row2=$VaccineDate_stmt->fetch();
			$VaccineDate[0] = $row2['VaccineDate1'];
			$VaccineDate[1] = $row2['VaccineDate2'];
			$VaccineDate[2] = $row2['VaccineDate3'];
			$VaccineDate[3] = $row2['VaccineDate4'];
			$VaccineDate[4] = $row2['VaccineDate5'];
			$VaccineDate[5] = $row2['VaccineDate6'];
			$VaccineDate[6] = $row2['VaccineDate7'];
			$VaccineDate[7] = $row2['VaccineDate8'];
		}
	$msg = $VaccineDate[0].','.$VaccineDate[1].','.$VaccineDate[2].','.$VaccineDate[3].','.$VaccineDate[4].','.$VaccineDate[5].','.$VaccineDate[6].','.$VaccineDate[7];
	echo $msg;
} 
catch (PDOException $e) 
{
    echo $e->getMessage();
}
?>
