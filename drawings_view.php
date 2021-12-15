<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/drawings_view.css">
</head>
<body>
<?php
  $num = $_GET["num"];
  $page = $_GET["page"];

  $con = mysqli_connect("localhost", "user1", "12345", "sample");
  $sql = "select * from menu where num=$num";
  $result = mysqli_query($con, $sql);

  $row = mysqli_fetch_array($result);

  $project_name = $row["project_name"];
  $product_use = $row["product_use"];
  $deadline_date = $row["deadline_date"];
  $estimated_budget_range_1 = $row["estimated_budget_range_1"];
  $estimated_budget_range_2 = $row["estimated_budget_range_2"];
  $drawing_detail_information = $row["drawing_detail_information"];
  $phone_number = $row["phone_number"];
  $name = $row["name"];
  $password = $row["password"];

  $regist_day = date('Y-m-d (H:i)');

  $file_name = $row["file_name"];
  $file_type = $row["file_type"];
  $file_copied = $row["file_copied"];

  if($row["file_name"])
          $file_image = "<img src='./img/file.gif'>";
        else
          $file_image = " ";

  if($file_name)
  {
    $real_name = $file_copied;
    $file_path = "./data/".$real_name;
    $file_size = filesize($file_path);
  }
?>
<form action="drawings_download.php" method="get" name="file_download"></form>
  <ul class="list_content">
      <li class="title">
        <h2>견적서 페이지</h2>
      </li>
      <li class="row">
        <span class="item">번호</span>
        <span class="item">프로젝트명</span>
        <span class="item">글쓴이</span>
        <span class="item">첨부</span>
        <span class="item">등록일</span>
      </li>
    <hr>
      <li class="row">
        <span class="item"><?=$num?></span>
        <span class="item"><?=$project_name?></span>
        <span class="item"><?=$name?></span>
        <span class="item"><?=$file_image?></span>
        <span class="item"><?=$regist_day?></span>
      </li>
      <hr>
      <div class="container">
        <li class="content_list">
          <span class="content_item">프로젝트명: </span>
          <span class="content_item"><?=$project_name?></span>
          <span class="content_item">제품 용도: </span>
          <span class="content_item"><?=$product_use?></span>
          <span class="content_item">납기일: </span>
          <span class="content_item"><?=$deadline_date?></span>
          <span class="content_item">도면 파일: </span>
<?php
    echo "
      <a class='content_item' href='drawings_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>다운로드</a>
    ";
?>
          <span class="content_item">도면 상세 정보: </span>
          <span class="content_item"><?=$drawing_detail_information?></span>
          <span class="content_item">연락처: </span>
          <span class="content_item"><?=$phone_number?></span>
        </li>
      </div>
      <ul class="buttons">
        <li><button onclick="location.href='drawings_list.php'">목록</button></li>
        <li><button onclick="location.href='drawings_form.php'">견적서 작성</button></li>
      </ul>
<?php
  
?>
</body>
</html>