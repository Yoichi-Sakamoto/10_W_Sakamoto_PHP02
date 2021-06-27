<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET["id"];

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM kadai_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}



?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>読書ノート</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">読書ノート</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>読書ノート</legend>
     <label>書籍名：<input type="text" name="bookname" value="<?= $result['bookname']?>"></label><br>
     <label>発行日：<input type="date" name="issuedate" value="<?= $result['issuedate']?>"></label><br>
     <label>著者名：<input type="text" name="author" value="<?= $result['author']?>"></label><br>
     <label>リンク：<input type="text" name="url" value="<?= $result['url']?>"></label><br>
     <label>ジャンル：<input type="text" name="genre" value="<?= $result['genre']?>"></label><br>
     <label>デジタル/紙：<select name="method" value="<?= $result['method']?>"><option value="デジタル">デジタル</option><option value="紙">紙</option></label><br>
     <!-- <label>デジタル/紙：<input type="text" name="method"></label><br> -->
     <label>要点：<textArea name="comments" rows="10" cols="60" value="<?= $result['comments']?>"></textArea></label><br>
     <label>読み直し：<select name="reread" value="<?= $result['reread']?>"><option value="読み直す">読み直す</option><option value="読み直さない">読み直さない</option></label><br>
     <!-- <label>読み直し：<input type="text" name="reread"></label><br> -->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

