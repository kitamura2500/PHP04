<?php

//ブックマークDB接続関数（PDO）
function db_bm_conn() {
    $dbname='gs_db';
    try {
      return new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
    }
}

//DB接続関数（PDO）
function db_user_conn(){
    $dbname='gs_db_dev10';
    try {
      $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
    }
    return $pdo;
  }

//SQL処理エラー
function errorMsg($stmt){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

// SESSIONチェック&リジェネレイト
function chk_ssid() {
  if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()) {
    exit("LOGIN ERROR");
    // 例えばここでsessionErrorとか書いてしまうと仕組みを特定しやすくなる
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}

?>