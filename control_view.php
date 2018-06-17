<?php
    session_start();
    include("functions.php");
    chk_ssid();
?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>G's Profile</title>
    <!-- Stylesheetの読み込み -->
    <link rel="stylesheet" href="css_php/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="css_php/english.css">

    <!-- jQueryの読み込み -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

</head>

<body class="body-wrapper">
    <div class="title-wrapper">
        <h1 class="siteTitle">G's English</h1>
        <h2 class="siteSubTitle">- How to use PHP -</h2>
    </div>

    <article class="profile-wrapper">
        <section class="profile-head">
            <div>
                <h2 class="siteSubTitle">ユーザー管理画面</h2>
            </div>
        <div>
            <p><a href="bm_reg_view.php">ブックマーク登録</a> <a href="bm_list_view.php">ブックマーク表示</a> 
            <?php if ($_SESSION["kanri_flg"] == 1) {?>
            <a href="user_reg_view.php">ユーザー登録</a> <a href="user_list_view.php">ユーザー表示</a></p>
            <?php } ?>
        </div>
        </section>
    </article>

    <footer>
        <p class="copyright">
            <small>copyrights 2018 Yasuhiro Kitamura All RIghts Reserved.</small>
        </p>
    </footer>


</body>

</html>