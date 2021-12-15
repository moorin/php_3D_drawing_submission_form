<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/drawings_list.css">
</head>
<body>
  <div class="container">
    
    <ul class="list_content">
      <li class="title">
        <h2>견적서 리스트</h2>
      </li>
      <li class="row">
        <span class="item">번호</span>
        <span class="item">프로젝트명</span>
        <span class="item">글쓴이</span>
        <span class="item">첨부</span>
        <span class="item">등록일</span>
      </li>
    <hr>
  <?php

    if(isset($_GET["page"]))
      $page = $_GET["page"];
    else
      $page = 1;

      $con = mysqli_connect("localhost", "user1", "12345", "sample");
      $sql = "select * from menu order by num desc";
      $result = mysqli_query($con, $sql);
      $total_record = mysqli_num_rows($result);

      $scale = 10;

      if($total_record % $scale == 0)
        $total_page = floor($total_record/$scale);
      else
        $total_page = floor($total_record/$scale) + 1;
      
      $start = ($page-1)*$scale;
      $number = $total_record-$start;

      for($i=$start; $i<$start+$scale && $i<$total_record;$i++)
      {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $num = $row["num"];
        $project_name = $row["project_name"];
        $name = $row["name"];
        $regist_day = $row["regist_day"];

        if($row["file_name"])
          $file_image = "<img src='./img/file.gif'>";
        else
          $file_image = " ";
  ?>
          <li class="row">
            <span class="item"><?=$number?></span>
            <span class="item"><a href="javascript:window.open('check_information.php?num=<?=$num?>&page=<?=$page?>','check_information','width=400,height=180,location=no,status=no,scrollbars=yes');"><?=$project_name?></a></span>
            <span class="item"><?=$name?></span>
            <span class="item"><?=$file_image?></span>
            <span class="item"><?=$regist_day?></span>
          </li>
  <?php
      $number--;
    }
    mysqli_close($con);
  ?>
      </ul>
      <ul id="page_num">
  <?php
    if($total_page >= 2 && $page >= 2)
    {
      $new_page = $page-1;
      echo "<li><a href='drawings_list.php?num=$num&page=$new_page'>< 이전</a></li><li>&nbsp;</li>";
    }
    else
      echo "<li>&nbsp;</li>";

    for($i=1;$i<=$total_page;$i++)
    {
      if($page == $i)
        echo "<li><b> $i </b></li><li>&nbsp;</li>";
        
      else
        echo "<li><a href='drawings_list.php?num=$num&page=$i'> $i </a></li><li>&nbsp;</li>";
    }
    if($total_page >= 2 && $page != $total_page)
    {
      $new_page = $page + 1;
      echo "<li><a href='drawings_list.php?num=$num&page=$new_page'>다음 ></a></li>";
    }
    else
      echo "<li>&nbsp;</li>";
    
  ?>
    </ul>
  </div>

      <ul class="buttons">
        <li><button onclick="location.href='drawings_form.php'">견적서 작성</button></li>
      </ul>
  </table>
</body>
</html>