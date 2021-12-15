<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
<?php
  $project_name = $_POST["project_name"];
  $product_use = $_POST["product_use"];
  $deadline_date = $_POST["deadline_date"];
  $estimated_budget_range_1 = $_POST["estimated_budget_range_1"];
  $estimated_budget_range_2 = $_POST["estimated_budget_range_2"];
  $drawing_detail_information = $_POST["drawing_detail_information"];
  $phone_number = $_POST["phone_number"];
  $name = $_POST["name"];
  $password = $_POST["password"];

  $regist_day = date('Y-m-d (H:i)');

  $product_use_num = 0;

  if($product_use == "로봇 / 드론 / IOT / 스마트기기")
    $product_use_num = 1;
  elseif($product_use == "의료 / 건강")
    $product_use_num = 2;
  elseif($product_use == "자동차 / 운송")
    $product_use_num = 3;
  elseif($product_use == "반도체 / 기관")
    $product_use_num = 4;
  else
    $product_use_num = 5;

  // 파일 업로드
  $upload_dir = './data/';

  $upfile_name = $_FILES["upfile"]["name"];
  $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
  $upfile_type = $_FILES["upfile"]["type"];
  $upfile_size = $_FILES["upfile"]["size"];
  $upfile_error = $_FILES["upfile"]["error"];

  if($upfile_name && !$upfile_error)
  {
    $file = explode(".", $upfile_name);
    $file_name = $file[0];
    $file_ext = $file[1];

    $new_file_name = date("Y_m_d_H_i_s");
    $new_file_name = $new_file_name;
    $copied_file_name = $new_file_name.".".$file_ext;
    $uploaded_file = $upload_dir.$copied_file_name;

    if($upfile_size > 1000000) {
      echo("
        <script>
          alert('업로드 파일 크기가 지정된 용량을 초과합니다<br>파일 크기를 체크해주세요');
          history.go(-1);
        </script>
      ");
      exit;
    }
    if(!move_uploaded_file($upfile_tmp_name, $uploaded_file))
    {
      echo("
        <script>
          alert('파일을 지정한 디렉터리에 복사하는데 실패했습니다.');
          history.go(-1);
        </script>
      ");
      exit;
    }
  }
  else
  {
    $upfile_name = "";
    $upfile_type = "";
    $copied_file_name = "";
  }

  $con = mysqli_connect("localhost", "user1", "12345", "sample");
  $sql = "insert into menu(project_name, product_use, deadline_date, estimated_budget_range_1, estimated_budget_range_2, file_name, file_type, file_copied, drawing_detail_information, regist_day, phone_number, name, password) ";
  $sql .= "values('$project_name', '$product_use_num', '$deadline_date', '$estimated_budget_range_1', '$estimated_budget_range_2', '$upfile_name', '$upfile_type', '$copied_file_name', '$drawing_detail_information', '$regist_day', '$phone_number', '$name', '$password')";

  mysqli_query($con, $sql);
  mysqli_close($con);

  echo "
    <script>
      location.href = 'drawings_list.php';
    </script>
  ";
?>
</body>
</html>