<?php
  $real_name = $_GET["real_name"];
  $file_name = $_GET["file_name"];
  $file_type = $_GET["file_type"];
  $file_path = "./data/".$real_name;
  
  if(file_exists($file_path))
  {
    $fp = fopen($file_path, "rb");
    Header("Content-type: application/x-msdownload");
    Header("Content-Length: ".filesize($file_path));
    Header("Content-Disposition: attachment; filename=".$file_name);
    Header("Content-Transfer-Encoding: binary");
    Header("Content-Description: File Transfer");
    Header("Expires: 0");

    if(!fpassthru($fp))
      fclose($fp);
    
  }
  else
    echo "해당 파일이 없습니다.";
?>
