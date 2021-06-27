<?php
//insert.phpの処理を持ってくる
//1. POSTデータ取得
$bookname = $_POST['bookname'];
$issuedate = $_POST['issuedate'];
$author = $_POST['author'];
$url = $_POST['url'];
$genre = $_POST['genre'];
$method = $_POST['method'];
$comments = $_POST['comments'];
$reread = $_POST['reread'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ更新SQL作成（UPDATE テーブル名 SET 更新対象1=:更新データ ,更新対象2=:更新データ2,... WHERE id = 対象ID;）
$stmt = $pdo->prepare(
    "UPDATE kadai_table SET bookname=:bookname, issuedate=:issuedate, author=:author, url=:url, genre=:genre, method=:method, comments=:comments, reread=:reread, inputtime=sysdate() WHERE id=:id"
  );


  // 4. バインド変数を用意
  $stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':issuedate', $issuedate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':author', $author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':method', $method, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':comments', $comments, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':reread', $reread, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

  // 5. 実行
  $status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    //以下を関数化
    sql_error($stmt);
  }else{
    //５．index.phpへリダイレクト
    //以下を関数化
    redirect('select.php');
  }