<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="30">
    <title>三密みまもりくん</title>
</head>
<body>

    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">

    <!-- 会議室見出し -->
    <div class="mplus">
        <h3>
            <a onClick="sound()">
                三密みまもりくん
                <div class="img_wrap" style="display: inline-block; _display: inline;">
                    <img src="mimamori.png" alt="見守りくん" title="見守りくん" width="90" height="90" style="display: block; margin: auto;">
                </div>
            </a>
            <!-- 音声ファイルの読み込み -->
            <audio id="sound-file" preload="auto">
                <source src="onegai.mp3" type="audio/mp3">
            </audio>
        </h3>
    </div>

    <inline>
        <a href="index.php" class="btn btn-border">会議室A</a>
        <a href="b_conference_room.php" class="btn btn-border">会議室B</a>
        <a href="c_conference_room.php" class="btn btn-border2">会議室C</a>
    </inline>
    <br><br><br>

    <?php
        // DB接続情報
        $host = "bunkakai-postgre-db.postgres.database.azure.com";
        $database = "bunkakai";
        $user = "dbadmin";
        $password = "OP8dev_flkU";
        $port = "5432";

        // DB接続
        $connection = pg_connect("host=$host port=$port dbname=$database user=$user password=$password sslmode=disable")
        or die("Failed to create connection to database: ". pg_result_error(). "<br/>");
        
        $co2 = 0;
        $count = 0;
        $decibel = 0;

        // CO2の取得
        $query = "SELECT * from co2 ORDER BY send_time DESC";
        $result_set = pg_query($connection, $query) 
            or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");
        while ($row = pg_fetch_row($result_set))
        {
            $co2 = $row[1];
            break;
        }

        // 人数の取得(残件)

        // 音量の取得(残件)
        $co2 = 1000000;
        $count = 1000000;
        $decibel = 1000000;

        // 3つの密を満たしたらポップアップを表示する
        if($co2 > 1000 && $count > 3 && $decibel > 80) :
    ?>
            <!-- 音を鳴らす -->
            <audio src="mitsu.mp3" autoplay></audio>

            <div class="popup" id="js-popup">
                <div class="popup-inner">
                    <div class="close-btn" id="js-close-btn"><i class="fas fa-times"></i></div>
                    <a href="#"><img src="./yuriko.jpg" alt="yuriko"></a>
                </div>
                <div class="black-background" id="js-black-bg"></div>
            </div>
    <?php
        elseif($decibel > 80) :
    ?>
        <!-- 音を鳴らす -->
        <audio src="socialdistance.mp3" autoplay></audio>
    <?php
        endif;
    ?>

    <section class="strips">

        <!-- 密閉 -->
        <article class="strips__strip">
            <div class="strip__content">
                <h1><niko>密閉</niko></h1>
                <h1 class="strip__title" data-name="Lorem">
                    <?php echo "$co2 ppm";?>
                </h1>
                <div class="strip__inner-text">
                    <h2>Co2</h2>
                    <iframe src="https://bunkakai-grafana.azurewebsites.net/d-solo/-H9M00fnk/test?orgId=1&from=1645432439100&to=1645432559246&panelId=2" width="450" height="200" frameborder="0"></iframe>
                </div>
            </div>
        </article>

        <!-- 密集 -->
        <article class="strips__strip">
            <div class="strip__content">
                <h1><niko>密集</niko></h1>
                <h1 class="strip__title" data-name="Ipsum"><?php echo "$count/5人";?></h1>
                <div class="strip__inner-text">
                    <h2>在室者一覧</h2>
                    A<br>
                    B
                </div>
            </div>
        </article>

        <!-- 密接 -->
        <article class="strips__strip">
            <div class="strip__content">
                <h1><niko>密接</niko></h1>
                <h1 class="strip__title" data-name="Dolor"><?php echo "$decibel dB";?></h1>
                <div class="strip__inner-text">
                    <h2>音量</h2>
                    <iframe src="https://bunkakai-grafana.azurewebsites.net/d-solo/-H9M00fnk/test?orgId=1&from=1645432439100&to=1645432559246&panelId=2" width="450" height="200" frameborder="0"></iframe>
                </div>
            </div>
        </article>

        <!-- 詳細のcloseボタン -->
        <i class="fa fa-close strip__close"><h1>×</h1></i>
    </section>

    <?php if($co2 > 1000) :?><h1 class="blink">CO2濃度が高くなっています。換気してください</h1> <?php endif;?>
    <?php if($count > 5) :?><h1 class="blink">会議室の人数を調整してください</h1> <?php endif;?>
    <?php if($decibel > 80) :?>    <h1 class="blink">会話の音量を下げてください</h1> <?php endif;?>

    <!-- 時間の表示 -->
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