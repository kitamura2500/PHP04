<?php
//入力チェック(受信確認処理追加)
// echo $_POST["book_name"];
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["url"]) || $_POST["url"]=="" ||
  !isset($_POST["comment"]) || $_POST["comment"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$book_name  = $_POST["name"];
$book_url = $_POST["url"];
$book_comment = $_POST["comment"];

//2. DB接続します(エラー処理追加)
include("functions.php");
$pdo = db_bm_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, book_name, book_url, book_comment,
indate)VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue(':a1', $book_name);
$stmt->bindValue(':a2', $book_url);
$stmt->bindValue(':a3', $book_comment);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  errorMsg($stmt);
}else{
  //５．bm_list_view.phpへリダイレクト
  header("Location: bm_list_view.php");
  exit;
}
?>
