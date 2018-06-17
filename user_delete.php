<?php

//1. GETデータ取得
$id   = $_GET["id"];


//2. DB接続します(エラー処理追加)
include("functions.php");
$pdo = db_user_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  errorMsg($stmt);
}else{
  //５．user_list_view.phpへリダイレクト
  header("Location: user_list_view.php");
  exit;
}
?>
