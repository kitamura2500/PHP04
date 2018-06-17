<?php
//最初にSESSIONを開始！！
session_start();

//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_user_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");
// 退会するとlife_flgを1に変更すれば退会していることがひと目で分かる

$lid = $_POST["userId"];
$lpw = $_POST["pwd"];

// sqlインジェクションを起こす文字が入ってきてもチェックできる
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
  queryError($stmt);
}

//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["lid"]      = $val['lid'];
  $_SESSION["lpw"]      = $val['lpw'];
  header("Location: control_view.php");
}else{
  //logout処理を経由して全画面へ
  header("Location: login.php");
}

exit();
?>