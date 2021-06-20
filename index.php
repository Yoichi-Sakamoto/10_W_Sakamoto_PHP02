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
     <label>書籍名：<input type="text" name="bookname"></label><br>
     <label>発行日：<input type="date" name="issuedate"></label><br>
     <label>著者名：<input type="text" name="author"></label><br>
     <label>リンク：<input type="text" name="url"></label><br>
     <label>ジャンル：<input type="text" name="genre"></label><br>
     <label>デジタル/紙：<select name="method"><option value="デジタル">デジタル</option><option value="紙">紙</option></label><br>
     <!-- <label>デジタル/紙：<input type="text" name="method"></label><br> -->
     <label>要点：<textArea name="comments" rows="10" cols="60"></textArea></label><br>
     <label>読み直し：<select name="reread"><option value="読み直す">読み直す</option><option value="読み直さない">読み直さない</option></label><br>
     <!-- <label>読み直し：<input type="text" name="reread"></label><br> -->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
