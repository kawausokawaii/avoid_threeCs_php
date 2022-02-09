<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="10">
        <title>3密見守りくん</title>
        <!-- BootstrapのCSS読み込み -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="js/bootstrap.min.js"></script>
        <style>
            h1 {
                font-family: "Nico Moji";
            }
        </style>
        </style>
    </head>
    <body>
        <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
        <h1>
            <?php 
            echo date("Y/m/d H:i:s") 
            ?>
        </h1>
        <h1><?php echo "三密見守りくん"; ?></h1><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"><img src="img/missetu.png" width="300" height="300" alt="密接"></div>
                <div class="col-sm-4"><img src="img/mipei.png" width="300" height="300" alt="密閉"></div>
                <div class="col-sm-4"><img src="img/misyu.png" width="300" height="300" alt="密集"></div>
            </div>]

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><img src="img/yuriko.jpg" alt="yuriko" title="百合子が3密について何か言っている"></div>
                <div class="col-sm-4"></div>
            </dv>
        </div>
        <br><br>
        <?php
        echo "3密よ！";

        // PHP Data Objects(PDO) Sample Code:
        try {
            $conn = new PDO("sqlsrv:server = tcp:itmwg08-tm37-dbserver.database.windows.net,1433; Database = ITMwg08_TM37_DB", "kamiya", "{your_password_here}");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            print("Error connecting to SQL Server.");
            die(print_r($e));
        }

        // SQL Server Extension Sample Code:
        $connectionInfo = array("UID" => "kamiya", "pwd" => "{your_password_here}", "Database" => "ITMwg08_TM37_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
        $serverName = "tcp:itmwg08-tm37-dbserver.database.windows.net,1433";
        $conn = sqlsrv_connect($serverName, $connectionInfo);

        //Run the Select query
        printf("Reading data from table: \n");
        $res = mysqli_query($conn, 'SELECT * FROM Products');
        while ($row = mysqli_fetch_assoc($res))
        {
            var_dump($row);
        }

        ?>
    </body>
</html>