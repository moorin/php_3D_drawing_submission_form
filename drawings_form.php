<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>form</title>
  
  <link rel="stylesheet" type="text/css" href="css/drawings_form.css">
  <script>
    function check_input() {
      if(!document.drawings_form.drawing_detail_information.value)
      {
        alert('도면 상세 정보를 입력하세요.');
        document.drawings_form.drawing_detail_information.focus();
        return;
      }
      if(!document.drawings_form.project_name.value)
      {
        alert('프로젝트명을 입력하세요.');
        document.drawings_form.project_name.focus();
        return;
      }
      if(!document.drawings_form.deadline_date.value)
      {
        alert('납기일을 입력하세요.');
        document.drawings_form.deadline_date.focus();
        return;
      }
      if(!document.drawings_form.estimated_budget_range_1.value)
      {
        alert('추정예산범위를 입력하세요.');
        document.drawings_form.estimated_budget_range_1.focus();
        return;
      }
      if(!document.drawings_form.estimated_budget_range_2.value)
      {
        alert('추정예산범위를 입력하세요.');
        document.drawings_form.estimated_budget_range_2.focus();
        return;
      }
      if(!document.drawings_form.phone_number.value)
      {
        alert('연락처를 입력하세요.');
        document.drawings_form.phone_number.focus();
        return;
      }
      if(!document.drawings_form.name.value)
      {
        alert('이름을 입력하세요.');
        document.drawings_form.name.focus();
        return;
      }
      if(!document.drawings_form.password.value)
      {
        alert('비밀번호를 입력하세요.');
        document.drawings_form.password.focus();
        return;
      }
      document.drawings_form.submit();
    }
  </script>
</head>
<body>
  <form action="drawings_insert.php" name="drawings_form" method="post" enctype="multipart/form-data">
    <div class="drawing_information">
      <h1>도면 정보</h1>
      <div class="drawing_content">
        <div class="drawing_row">
          <span>도면 업로드</span>
          <input type="file" name="upfile">
        </div>
          
        <div class="drawing_col1">
          <span>도면 상세 정보</span>
        </div>
        <div class="drawing_col2">
          <textarea name="drawing_detail_information" id="" cols="50" rows="8"></textarea>
        </div>
      </div>
    </div>

    <div class="project_information">
      <h1>프로젝트 정보</h1>
      <div class="project_content">
        <div class="project_col1">
          <span>프로젝트명</span>
        </div>
        <div class="project_col2">
          <input type="text" name="project_name">
        </div>
          
        <div class="project_col1">
          <span>제품용도</span>
        </div>
        <div class="project_col2">
        <select name="product_use" id="">
        <option value="">제품 용도</option>
          <option value="로봇 / 드론 / IOT / 스마트기기">로봇 / 드론 / IOT / 스마트기기</option>
          <option value="의료 / 건강">의료 / 건강</option>
          <option value="자동차 / 운송">자동차 / 운송</option>
          <option value="반도체 / 기관">반도체 / 기관</option>
          <option value="가전">가전</option>
        </select>
        </div>

        <div class="project_col1">
          <span>납기일 (2021-12-06 형식으로 입력해주세요.)</span>
        </div>
        <div class="project_col2">
          <input type="text" name="deadline_date">
        </div>

        <div class="project_col1">
          <span>추정예산범위</span>
        </div>
        <div class="project_col2" id="estimated_budget_range">
          <input name="estimated_budget_range_1" type="text" class="estimated_budget_range">
          <span>원 ~ </span>
          <input name="estimated_budget_range_2" type="text" class="estimated_budget_range">
          <span>원</span>
        </div>

        <div class="project_col1">
          <span>연락처 (010-xxxx-xxxx 형식으로 입력해주세요.)</span>
        </div>
        <div class="project_col2">
          <input type="text" name="phone_number">
        </div>
        
        <div class="project_col1">
          <span>이름</span>
        </div>
        <div class="project_col2">
          <input type="text" name="name">
        </div>

        <div class="project_col1">
          <span>비밀번호 (견적서 페이지에 들어갈 때 필요합니다.)</span>
        </div>
        <div class="project_col2">
          <input type="text" name="password">
        </div>
      </div>
    </div>
    <div class="btn">
    <button type="button" onclick="check_input()">제출</button>
    <button type="button" onclick="location.href='drawings_list.php'">목록</button>
    </div>
  </form>
</body>
</html>