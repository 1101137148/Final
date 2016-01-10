<?php
    function init_db() {
        $db_host = 'db.mis.kuas.edu.tw';
        $db_name = 's1101137114';
        $db_user = 's1101137114';
        $db_psd = 'hatedb';
        $db_dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
        return new PDO($db_dsn, $db_user, $db_psd);
    }
?>