<?php
session_start();
include("functions.php");
chk_ssid();

$id = $_GET["id"];

//1.  DB接続します
$pdo = db_user_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id", $id);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  errorMsg($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $rs = $stmt->fetch();
}

// $name = explode(" ", $rs["name"]);

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

    <!-- ↓このページ参照 -->
    <!-- https://shinsotsu.mynavi-agent.jp/knowhow/article/industry-list.html -->
</head>

<body class="body-wrapper">
    <div class="title-wrapper">
        <h1 class="siteTitle">G's English</h1>
        <h2 class="siteSubTitle">- How to use PHP -</h2>
    </div>

    <article class="profile-wrapper">
        <section class="profile-head">
            <div>
                <h2 class="siteSubTitle">管理者登録</h2>
            </div>
        </section>

        <section class="profile-box">
            <div class="profile-title">
                <h2>下記入力してください</h2>
            </div>

            <form action="user_update.php" name="formProfile" method="POST">
                <div class="form-field">
                    <label for="userName">名前</label>
                    <!-- <input id="lastName" class="name-input" name="lastName" type="text" value="<?=$rs['name']?>"> -->
                    <input id="lastName" class="name-input" name="name" type="text" value="<?=$rs['name']?>">
                    <!-- <input id="firstName" class="name-input firstname-input" name="firstName" type="text" value="<?=$name[1]?>"> -->
                </div>
                <div class="form-field">
                    <label for="userId">ユーザーネーム</label>
                    <input id="userId" class="long-input" name="userId" type="text" value="<?=$rs["lid"]?>">
                </div>
                <div class="form-field">
                    <label for="pwd">パスワード</label>
                    <input id="pwd" class="long-input" name="pwd" type="text" value="<?=$rs["lpw"]?>">
                </div>
                <input type="hidden" name="id" value="<?=$rs["id"]?>">
                <div class="save-btn-field">
                    <input id="form-check-btn" class="save-btn" type="submit" value="保存する">
                </div>
            </form>

        </section>


    </article>


    <footer>
        <p class="copyright">
            <small>copyrights 2018 Yasuhiro Kitamura All RIghts Reserved.</small>
        </p>
    </footer>



</body>

</html>