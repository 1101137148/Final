<?php
$u_medicine_id = $_GET['u_medicine_id'];
$u_medicine_name = $_GET['u_medicine_name'];
$u_start_time = $_GET['u_start_time'];
$u_stop_time = $_GET['u_stop_time'];
$u_interval_hour = $_GET['u_interval_hour'];
$u_ps = $_GET['u_ps'];
$u_result = $_GET['u_result'];
?>
<!doctype html>
<html lang="zh">

    <head>
        <meta charset="utf-8">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!--<link rel="stylesheet" media="(max-width: 420px)" href="css/iphone.css">
        <link rel="stylesheet" media="(min-width: 421px) and (max-width: 1024px)" href="css/ipad.css">
        <link rel="stylesheet" media="(min-width: 1025px)" href="css/mac.css">
        <!--<link rel="stylesheet" href="css/mystyle.css">-->
        <!--<script src="js/*.js">-->
        <!--<link rel="stylesheet" href="css/main.css">-->

        <!--Theme-->
        <link rel="stylesheet" href="jqueryMobile/myTheme/myThemeStyle.min.css" />
        <link rel="stylesheet" href="jqueryMobile/myTheme/jquery.mobile.icons.min.css" />

        <link rel="stylesheet" href="jqueryMobile/jquery.mobile.structure-1.4.5.min.css" />

        <link rel="stylesheet" href="css/health.css">

        <script src="jqueryMobile/jquery/jquery-1.11.3.min.js"></script>
        <script src="jqueryMobile/jquery.mobile-1.4.5.min.js"></script>

        <style>
        </style>

        <script>
            $(function () {

            });
        </script>

    </head>

    <body>
        <div data-role="page" class="background">
            <div data-role="panel" id="revealPanel" data-display="push" data-position="right" data-position-fixed="true"> 
                <ul data-role="listview">
                    <li data-icon="home"><a href="index.html" data-rel="close">首頁</a></li>	
                </ul>
            </div>
            <header data-role="header" data-position="fixed">
                <a data-rel="back" rel="external" data-transition="slide"  class="ui-btn ui-corner-all ui-shadow ui-icon-carat-l ui-btn-icon-left">返回</a>
                <h1>醫健在手</h1>
                <a href="#revealPanel" class="ui-btn ui-corner-all ui-shadow ui-icon-bullets ui-btn-icon-left">更多</a>
            </header>

            <section data-role="page main" class="ui-content">
                <div class="container">
                    <div data-role="main" class="ui-content">
                        <div class="ui-field-contain">
                            <input type="hidden" id="u_medicine_id" name="u_medicine_id" value="<?php echo $u_medicine_id ?>">	
                            藥品名稱:
                            <input type="text" id="u_medicine_name" name="u_medicine_name" value="<?php echo $u_medicine_name ?>">
                            <br>
                            每日幾次:
                            <input type="number" id="u_interval_hour" name="u_interval_hour" min="1" max="24" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" value="<?php echo $u_interval_hour ?>">
                            <br>
                            用藥開始日:
                            <input type="date" id="u_start_time" name="u_start_time" data-role="datebox" value="<?php echo $u_start_time ?>">
                            <br>
                            停藥日:
                            <input type="date" id="u_stop_time" name="u_stop_time" data-role="datebox" value="<?php echo $u_stop_time ?>">
                            <br>
                            備註:
                            <input type="text" id="u_ps" name="u_ps" value="<?php echo $u_ps ?>">
                            <br>
                            使用效果:
                            <input type="text" id="u_result" name="u_result" value="<?php echo $u_result ?>">
                        </div>
                    </div>
                </div>
                <button onclick="update_medicine_btn()" style="width:100%;background: rgb(255, 183, 183);color: black;border-color: aliceblue;border-radius: 50px;" data-rel="popup" data-position-to="window" data-transition="fade" class="insert_health_record_btn ui-btn ui-corner-all ui-shadow ui-btn-inline show-page-loading-msg" data-theme="b" data-textonly="true" data-textvisible="true" data-msgtext="已變更"><font size="4px">修改藥品提醒</font></button>
            </section>

            <footer data-role="footer" data-position="fixed">
                <nav data-role="navbar">
                    <ul>
                        <li><a rel="external" href="health_people.html"><img class="icon_img" src="icon/people.png"><br>健康紀錄</a></li>
                        <li><a rel="external" href="health_needle.html"><img class="icon_img" src="icon/needle.png"><br>疫苗紀錄</a></li>
                        <li><a rel="external" href="health_medicine.html" class="ui-btn-active ui-state-persist"><img class="icon_img" src="icon/medicine.png"><br>吃藥紀錄</a></li>
                    </ul>
                </nav>
            </footer>

        </div>
    </body>

</html>
