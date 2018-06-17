<?php
    session_start();
    include("functions.php");
    chk_ssid();

//1.  DB接続します
$pdo_bm = db_bm_conn();
$pdo_user = db_user_conn();

//２．データ登録SQL作成
$stmt_bm = $pdo_bm->prepare("SELECT * FROM gs_bm_table");
$status_bm = $stmt_bm->execute();

$stmt_user = $pdo_user->prepare("SELECT * FROM gs_user_table");
$status_user = $stmt_user->execute();

//３．データ表示
$view_bm="";
if($status_bm==false){
  //execute（SQL実行時にエラーがある場合）
  errorMsg($stmt_bm);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt_bm->fetch(PDO::FETCH_ASSOC)){
    $view_bm .= '<p>';
    $view_bm .= '<a href="bm_detail_view.php?id='.$result["id"].'">';
    $view_bm .= $result["book_name"]."[".$result["book_url"]."]<br>";
    $view_bm .= '</a>';
    $view_bm .= '</p>';
  }
}

// ユーザー管理機能

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view_bm?></div>
</div>
<!-- Main[End] -->

</body>
</html>
