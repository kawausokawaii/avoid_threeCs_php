<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="10">
        <title>3密見守りくん</title>
        <!-- アコーディオンメニュー -->
        <link rel="stylesheet" href="css/sidemenu.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>

        <!-- BootstrapのCSS読み込み -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="js/bootstrap.min.js"></script>
        <style>
            niko {
                font-family: "Nico Moji";
            }
        </style>
        </style>
    </head>
    <body>

        <link rel=”stylesheet” type=”text/css” href=”css/sidemenu.css”>       
        <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">

        <div class="container-fluid bg-secondary">

            <h1>
                <niko>
                <?php 
                date_default_timezone_set('Asia/Tokyo');
                echo date("Y/m/d H:i:s") 
                ?>
                </niko>
            </h1>

            <h1>
                <niko>
                    <?php echo "三密見守りくん"; ?>
                </niko>
            </h1><br>

            <div class="row">
                <div class="col-md-2">                    
                <!-- Contenedor -->
                <ul id="accordion" class="accordion">
                    <li>
                    <div class="link"><i class="fa fa-paint-brush"></i>A会議室<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="#">一覧</a></li>
                        <li><a href="#">詳細</a></li>
                    </ul>
                    </li>
                    <li>
                    <div class="link"><i class="fa fa-mobile"></i>B会議室<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="#">一覧</a></li>
                        <li><a href="#">詳細</a></li>
                    </ul>
                    </li>
                    <li><div class="link"><i class="fa fa-globe"></i>C会議室<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="#">一覧</a></li>
                        <li><a href="#">詳細</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2"><img src="img/missetu.png" width="500" height="500" alt="密接"></div>
                <div class="col-md-1"></div>
                <div class="col-md-2"><img src="img/misyu.png" width="500" height="500" alt="密集"></div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2"><img src="img/mipei.png" width="500" height="500" alt="密閉"></div>
                <div class="col-md-5"></div>
            </dv>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"><img src="img/yuriko.jpg" alt="yuriko" title="百合子が3密について何か言っている"></div>
                <div class="col-md-4"></div>
            </dv>
        </div>
        <br><br>

        <?php
        echo "3密よ！";

        // PHP Data Objects(PDO) Sample Code:
        $con=mysqli_init();
        // mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); 
        mysqli_real_connect($con, "bunkakai-db.mysql.database.azure.com", "dbadmin@bunkakai-db", "OP8dev_flkU", "bunkakai", 3306);
        if (mysqli_connect_errno($con)) {
            die('Failed to connect to MySQL: '.mysqli_connect_error());
        }

        //Run the Select query
        printf("Reading data from table: \n");
        $res = mysqli_query($con, 'SELECT * FROM kamiya_test');
        while ($row = mysqli_fetch_assoc($res))
        {
            var_dump($row);
        }

        ?>
    </body>
</html>