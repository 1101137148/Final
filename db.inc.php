<?php
function init_db() {
    $db_host = 'db.mis.kuas.edu.tw';
    $db_name = 's1101137114';
    $db_user = 's1101137114';
    $db_password ='hatedb';
    $db_dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
    $db = new PDO($db_dsn, $db_user, $db_password);
    return $db;
}
?>