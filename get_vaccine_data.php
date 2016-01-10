<?php
    $CName = $_GET['CName'];
    $EName = $_GET['EName'];
    $Date = $_GET['Date'];
    $Times = $_GET['Times'];
    $VaccineDate = $_GET['VaccineDate'];
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
                            <label>疫苗中文名稱:</label>
                            <input type="lable" disabled name="CName" id="CName" class="vaccine_data_label" value="<?php echo $CName ?>">
                            <br><br>
                            <label>疫苗英文簡稱:</label>
                            <input type="lable" disabled name="EName" id="EName" class="vaccine_data_label" value="<?php echo $EName ?>">
                            <br><br>
                            <label>劑次:</label>
                            <input type="lable" disabled name="Times" id="Times" class="vaccine_data_label" value="<?php echo $Times ?>">
                            <br><br>
                            <label>接種時程:</label>
                            <input type="lable" disabled name="Date" id="Date" class="vaccine_data_label" value="<?php echo $Date ?>">
                            <br><br>
                            <label>預計打疫苗日期:</label>
                            <input type="lable" disabled name="Date" id="Date" class="vaccine_data_label" value="<?php echo $VaccineDate ?>">
                        </div>
                    </div>
                </div>
            </section>

            <footer data-role="footer" data-position="fixed">
                <nav data-role="navbar">
                    <ul>
                        <li><a rel="external" href="health_people.html"><img class="icon_img" src="icon/people.png"><br>健康紀錄</a></li>
                        <li><a rel="external" href="health_needle.html" class="ui-btn-active ui-state-persist"><img class="icon_img" src="icon/needle.png"><br>疫苗紀錄</a></li>
                        <li><a href="health_medicine.html"><img class="icon_img" src="icon/medicine.png"><br>吃藥紀錄</a></li>
                    </ul>
                </nav>
            </footer>

        </div>
    </body>

</html>
