create table menu (
  num int not null auto_increment,
  project_name char(40) not null,
  product_use_num int not null,
  deadline_date char(40) not null,
  estimated_budget_range_1 int not null,
  estimated_budget_range_2 int not null,
  file_name char(40),
  file_type char(40),
  file_copied char(40),
  drawing_detail_information char(200) not null,
  regist_day char(40) not null,
  phone_number char(40) not null,
  name char(20) not null,
  password char(20) not null,
  primary key(num)
);