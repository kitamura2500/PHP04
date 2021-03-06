<?php
$id = $_GET["id"];

//1. DB接続
include("functions.php");
$pdo = db_bm_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table where id=:id");
$stmt->bindValue(":id", $id);
$status = $stmt->execute();

if($status==false){
  //execute（SQL実行時にエラーがある場合）
  errorMsg($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $rs = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_nonlogin_list_view.php">ブックマーク一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$rs["book_name"]?>"></label><br>
     <label>書籍URL：<input type="text" name="url" value="<?=$rs["book_url"]?>"></label><br>
     <label>書籍コメント：<textarea name="comment" rows="4" cols="40" value="<?=$rs["book_comment"]?>"><?=$rs["book_comment"]?></textarea></label><br>
     <!-- <input type="submit" value="送信"> -->
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
