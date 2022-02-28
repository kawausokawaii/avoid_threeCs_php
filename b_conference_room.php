<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="30">
    <title>三密みまもりくん</title>
</head>
<body>

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">

    <div class="navigation">
    <!-- 階層に分けてナビゲーションの骨組みを作成 -->
        <ul>
            <li class="button">
            <p><a href="index.php">会議室A</a></p>
            </li>
            <li class="button">
            <p><a href="b_conference_room.php">会議室B</a></p>
            </li>
            <li class="button">
            <p><a href="c_conference_room.php">会議室C</a></p>
            </li>
        </ul>
    </div>

    <div class="c">
        <h2>
            会議室B
        </h2>
    </div>

    <?php
        // Initialize connection variables.
        $host = "bunkakai-postgre-db.postgres.database.azure.com";
        $database = "bunkakai";
        $user = "dbadmin";
        $password = "OP8dev_flkU";
        $port = "5432";

        // Initialize connection object.
        $connection = pg_connect("host=$host port=$port dbname=$database user=$user password=$password sslmode=disable")
        or die("Failed to create connection to database: ". pg_result_error(). "<br/>");
        
    ?>

    <section class="strips">

        <article class="strips__strip">
            <div class="strip__content">
                <h1><niko>密閉</niko></h1>
                <h1 class="strip__title" data-name="Lorem">
                    <?php
                        // Perform some SQL queries over the connection.
                        $query = "SELECT * from co2 ORDER BY send_time DESC";
                        $result_set = pg_query($connection, $query) 
                            or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");
                        while ($row = pg_fetch_row($result_set))
                        {
                            print "$row[1]ppm";
                            break;
                        }
                    ?>
                </h1>
                <div class="strip__inner-text">
                    <h2>Co2</h2>
                    <iframe src="https://bunkakai-grafana.azurewebsites.net/d-solo/-H9M00fnk/test?orgId=1&from=1645432439100&to=1645432559246&panelId=2" width="450" height="200" frameborder="0"></iframe>
                </div>
            </div>
        </article>

        <article class="strips__strip">
            <div class="strip__content">
                <h1><niko>密集</niko></h1>
                <h1 class="strip__title" data-name="Ipsum">3/5人</h1>
                <div class="strip__inner-text">
                    <h2>Co2</h2>
                    <iframe src="https://bunkakai-grafana.azurewebsites.net/d-solo/-H9M00fnk/test?orgId=1&from=1645432439100&to=1645432559246&panelId=2" width="450" height="200" frameborder="0"></iframe>
                </div>
            </div>
        </article>

        <article class="strips__strip">
        <div class="strip__content">
        <h1><niko>密接</niko></h1>
        <h1 class="strip__title" data-name="Dolor">100dB</h1>
        <div class="strip__inner-text">
        <h2>Co2</h2>
            <iframe src="https://bunkakai-grafana.azurewebsites.net/d-solo/-H9M00fnk/test?orgId=1&from=1645432439100&to=1645432559246&panelId=2" width="450" height="200" frameborder="0"></iframe>
        </div>
        </div>
        </article>
        <i class="fa fa-close strip__close"><h1>×</h1></i>
    </section>

    <h1>
        <niko>
            <?php 
                date_default_timezone_set('Asia/Tokyo');
                echo date("Y/m/d H:i:s") 
            ?>
        </niko>
    </h1>

    <?php
        // Free result_set
        pg_free_result($result_set);

        // Closing connection
        pg_close($connection);
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="main.js"></script>

</body>
</html>