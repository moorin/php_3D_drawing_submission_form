<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/check_information.css">
  <title>check_information</title>
</head>
<body>
<?php
  $action = '';

  if(isset($_POST["action"])) $action = $_POST["action"];
  
  if($action == "form_submit")
  {
    if(isset($_POST["num"])) $num = $_POST["num"];
    else $num = "";
    if(isset($_POST["page"])) $page = $_POST["page"];
    else $page = 1;

    if(isset($_POST["name"])) $name = $_POST["name"];
    else $name = "";
    if(isset($_POST["password"])) $password = $_POST["password"];
    else $password = "";
    
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from menu where num=$num";
    $result = mysqli_query($con, $sql);
  
    $row = mysqli_fetch_array($result);

    $db_name = $row["name"];
    $db_password = $row["password"];

    if($name == $db_name && $password == $db_password)
    {
      echo("
        <script>
          alert('확인되었습니다.');
          opener.location.href='drawings_view.php?num=$num&page=$page';
          window.open('about:blank', '_self').close();
        </script>
      ");
    }
    else
    {
      echo("
        <script>
          alert('정보를 다시 입력해주세요.');
          location.href='check_information.php?num=$num&page=$page';
        </script>
      ");
    }
    exit;
  }
  else
  {

    $num = $_GET["num"];
    $page = $_GET["page"];

    if(isset($_GET["page"]))
      $page = $_GET["page"];
    else
      $page = 1;
  }
?>
  <form method = "POST" action = "<?=$_SERVER['PHP_SELF']?>">
    <input type="hidden" name="action" value="form_submit" />
    <input type="hidden" name="num" value="<?=$num?>" />
    <input type="hidden" name="page" value="<?=$page?>" />
    <ul class="container">
      <li class="row">
        <span class="item">아이디</span>
        <input class="item" type="text" name="name">
        <span class="item">비밀번호</span>
        <input class="item" type="password" name="password">
        <input class="item" type="submit" value="제출하기" />
      </li>
    </ul>
    
  </form>
</body>
</html>