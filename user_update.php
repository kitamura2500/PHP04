<?php
//入力チェック(受信確認処理追加)
// echo $_POST["book_name"];
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["userId"]) || $_POST["userId"]=="" ||
  !isset($_POST["pwd"]) || $_POST["pwd"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$id = $_POST["id"];
$name = $_POST["name"];
$lid = $_POST["userId"];
$lpw = $_POST["pwd"];
$kanri_flg = 0;
$life_flg = 0;

//2. DB接続します(エラー処理追加)
include("functions.php");
$pdo = db_user_conn();

//３．データ登録SQL作成
// $stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg
// )VALUES(NULL, :a1, :a2, :a3, :a4, :a5)");
$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:a1, lid=:a2, lpw=:a3 WHERE id=:a4");
$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $lid);
$stmt->bindValue(':a3', $lpw);
$stmt->bindValue(':a4', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  errorMsg($stmt);
}else{
  //５．bm_list_view.phpへリダイレクト
  header("Location: user_list_view.php");
  exit;
}
?>
