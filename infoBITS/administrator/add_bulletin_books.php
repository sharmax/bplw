<?php
include("../config.php");
$message = "";
if(isset($_SESSION['bitsid'])){
	$userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
	if($userinfo['category']=="Admin"){
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>infoBITS Bulletin</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
.hidden_box
{
    width: 95%;
	margin: auto;
	overflow:hidden;
	float:center;
	height:auto;
	margin-bottom:1%;
}
.hidden_box .hidden_box_left_panel
{
    width: 100%;
	margin: auto;
	overflow:hidden;
	float:left;
	height:auto;
	margin-bottom:1%;
	border-radius:4px;
}
.hidden_box .hidden_box_right_panel
{
    width: 100%;
	overflow:hidden;
	float:right;
	height:auto;
	margin-bottom:1%;
	border:1px solid #4a9ace;
	text-align:center;
}
    .error
	{    
	float:center;
	color:#CC3300;
	font-weight:bold;
	font-size:14px;
	}
	/* The CSS */
	.select_small_box
	{
    padding:3px;
	width:100px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}
	
select {
    padding:3px;
	width:220px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}

/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
@media screen and (-webkit-min-device-pixel-ratio:0) {
    select {padding-right:30px}
}

label {position:relative}
label:after {
    content:'<>';
    font:11px "Consolas", monospace;
    color:#aaa;
    -webkit-transform:rotate(90deg);
    -moz-transform:rotate(90deg);
    -ms-transform:rotate(90deg);
    transform:rotate(90deg);
    right:8px; top:4px; 
    border-bottom:1px solid #ddd;
    position:absolute;
    pointer-events:none;
}
label:before {
    content:'';
    right:6px; top:6px;
    width:20px; 
    background:#f8f8f8;
    position:absolute;
    pointer-events:none;
    display:block;
}
.text_box
{
padding:4px;
	width:400px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
.file_upload_box
{
padding:4px;
	width:210px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
	</style>
	<script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var book_title = document.getElementById("book_title");
	var book_author = document.getElementById("book_author");
	var book_url = document.getElementById("book_url");
	var dep_name = document.getElementById("dep_name");
	var month = document.getElementById("month");
	var book_cover = document.getElementById("book_cover");
	
	if(dep_name.value.trim() == ''){
		valid = false;
		message = message + '*Department Name is required' + '\n';
	}
	if(month.value.trim() == ''){
		valid = false;
		message = message + '*Month is required' + '\n';
	}
	if(book_title.value.trim() == ''){
		valid = false;
		message = message + '*Book Title is required' + '\n';
	}
	if(book_author.value.trim() == ''){
		valid = false;
		message = message + '*Author is required' + '\n';
	}
	if(book_url.value.trim() == ''){
		valid = false;
		message = message + '*Book URL is required' + '\n';
	}
	if(book_cover.value.trim() == ''){
		valid = false;
		message = message + '*Book Cover is required' + '\n';
	}
	if (valid == false){
		alert(message);
		return false;
	}
}
</script>
</head>
<body>
<div class="headerWrapper" style="background-position: right 0px;">
<div class="headerWrapperFix">
<div class="logoWrapper">
<a id="headercontrol_ancu" class="logo" href="../index.php">
<img id="headercontrol_imgu" usemap="#Map" alt="BITS Pilani logo" src="../images/logo.jpg">
</a>
</div>
<?php if(isset($_SESSION['bitsid'])){
    $userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
?>
<div class="loginWrapper" style="margin-right:20.5%;">
<div class="welcome">
<h2><span>Welcome</span>,<br><?php echo $userinfo['name']; ?></h2>
</div>
<div class="loginmenu">
<img src="../uploads/profilepics/<?php echo $userinfo['avatar']; ?>" width="50">
<div class="loginNav">
<ul>
<li><a href="../administrator/admin.php">Dashboard</a></li>
<li><a href="../account/dashboard.php">View User Dashboard</a></li>
<li><a href="../account/account.php">Account</a></li>
<li><a class="logout" href="../index.php?bitsid=0">Logout</a></li>
</ul>
</div>
</div>
</div><?php 
} else {
?>
<div align="center" class="login">
<a style="color:#211d70;" href="login.php">
<img src="images/login_icon.png" height="70px" width="80px"><br/>
<span style="font-size:1.5em; font-weight:bold;">Log In</span></a>
</div>
<?php } ?>
<ul class="mainNav">
<li class=" ">
<a id="1" href="JavaScript:void(0);">About Library</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<p class="navLedg"></p>
</li>
<li>
<a href="../rules_and_regulations.php">Rules and Regulations</a>
</li>
<li>
<a href="../library_staff.php">Library Staff</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="3" href="JavaScript:void(0);">Search</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a target="_blank" href="http://172.21.1.37/">Online Book Catalogue</a>
</li>
<li>
<a href="../search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="../search/periodical_finder.php">Periodical Finder</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="3" href="JavaScript:void(0);">Services</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a href="../services/circulation.php">Circulation</a>
</li>
<li>
<a href="../services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="../services/references.php">References</a>
</li>
<li>
<a href="../services/inter_library_loan.php">Inter-Library Loan</a>
</li>
<li>
<a href="../services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="../services/daily_news.php">Daily News</a>
</li>
<li>
<a href="../services/lf.php">Lost & Found</a>
</li>
<li>
<a href="../services/av.php">Audio & Visuals</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="8" href="JavaScript:void(0);">Periodicals & Databases</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a href="../search/periodical_finder.php">Print-Journals</a>
</li>
<li>
<a href="../search/e-journals.php">E-Journals</a>
</li>
<li>
<a href="../services/databases.php">Online Databases</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="9" href="JavaScript:void(0);">Research Support</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a href="../plagiarism.php">Plagiarism</a>
</li>
<li>
<a target="_blank"  href="https://www.mendeley.com/">Mendeley Research Tool</a>
</li>
<li>
<a target="_blank" href="http://endnote.com/">Endnote</a>
</li>
<li>
<a target="_blank"  href="http://shodhganga.inflibnet.ac.in/">Shodhganga</a>
</li>
<li>
<a href="theses_and_reports.php">Theses & Reports</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="905" href="JavaScript:void(0);">Feedback & Suggestions</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a href="../feedback/survey.php">Survey</a>
</li>
<li>
<a href="../feedback/feedback_form.php">Suggestion | Complaint | Compliments</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
</ul>
</div>
</div>
<div class="infoWrapper">
<div class="breadCrumbWrapper">
<p>You are here:</p>
<ul class="breadCrumb">
<?php
	if($userinfo['category']=="Admin")
	{
?>
<li class="home"><a href="../administrator/admin.php">Dashboard</a></li>
<?php
	}
	else if($userinfo['category']=="Student" || $userinfo['category']=="Research Scholar" || $userinfo['category']=="Faculty/Staff")
	{
?>
<li class="home"><a href="../account/dashboard.php">Dashboard</a></li>
<?php
	}
	else
	{
	?>
	<li class="home"><a href="../index.php">Home</a></li>
	<?php
	}
?>
<li>infoBITS Bulletin - Add Books</li>
</ul>
</div>
</div>
<div style="background-color:#FFFFFF">
<div class="hidden_box">
<table width="100%">
<tr><td align="right" style="margin-right:20px; ">
<a href="admin.php"><img src="../images/Home.png" alt="Back to Home" style="width: 40px; height: 39px; border-radius:4px;" /></a>
</td></tr></table>
<table class="hidden_box">
<tr>
<td style="width: 17%;"><div class="hidden_box_left_panel">
<table align="left" style="width: 100%; background-color: #FFFFFF; color: #211D70; border: 1px solid #4a9ace;" cellpadding="0" cellspacing="0" >
<tr style="line-height: 27px">
			<td style="background-color: #06588f; color: #FFFFFF; font-weight: bold; font-size:13px;" align="center">infoBITS Bulletin Home</td></tr>
			<tr><td align="left" style="padding:5px; border-bottom:1px solid #4a9ace;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Add Books</a></td></tr>
			<tr><td align="left" style="padding:5px; border-bottom:1px solid #4a9ace;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="add_bulletin_journals.php" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Add Journals</a></td></tr>
			<tr><td align="left" style="padding:5px;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Add Videos</a></td></tr>
			</table>
</div></td>
<td style="width:20px;">&nbsp;</td>
<td valign="top">
<table align="left" style="width: 100px; cellpadding="0" cellspacing="0" >
<tr style="line-height: 27px">
			<td style="background-color: #06588f; color: #FFFFFF; font-weight: bold; font-size:13px; border-top-left-radius:4px; border-top-right-radius:4px;" align="center">Add Books</td></tr></table>
			<br/>
<div class="hidden_box_right_panel">
<form action="add_bulletin_books.php" method="post" enctype="multipart/form-data" onSubmit="return Validate();">
<?php				
$message="";
date_default_timezone_set("Etc/UTC");
if(isset($_POST['submit']))
{
$book_title = trim($_POST['book_title']);
$book_author = trim($_POST['book_author']);
$book_url = trim($_POST['book_url']);
$month = trim($_POST['month']);
$year = trim($_POST['year']);
$book_number = trim($_POST['book_num']);
$book_type = trim($_POST['book_type']);
$name=trim($_POST['dep_name']);

if($_FILES['book_cover']['type'] != 'image/jpeg'
				&&  $_FILES['book_cover']['type'] != 'image/jpg'
				&&  $_FILES['book_cover']['type'] != 'image/gif'
				&& $_FILES['book_cover']['type'] != 'image/png')
			{
				$message ='Please upload only Image file';
			}
		else if($_FILES['book_cover']['size'] >4194304)
			{
				$message ='file size should not exceed 4mb';
			}
			else
			{
						$sql ='SELECT * from bulletin_main where name="'.$name.'"';
						$query_run = mysql_query($sql) or die('SQL Error :: '.mysql_error());
						$query_row = mysql_fetch_assoc($query_run);
						$code = $query_row['code'];	
						
						
						
	$x=mysql_num_rows(mysql_query('SELECT * from bulletin where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"'));			
	if($x == 0)
	{
		if($book_number=="Book - 1")
		{
				$issue_number = mysql_fetch_array(mysql_query('select issue_number from bulletin_main where Month="'.$month.'"'));
				$z=mysql_num_rows(mysql_query('select * from bulletin where Year="'.$year.'"'));
				
				if($z > 0)
				{				
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$volume_number=mysql_fetch_array(mysql_query('select volume_number from bulletin where Year="'.$year.'"'));
						$sql = 'INSERT INTO bulletin(name, code, pic1, auth1, title1, url1, Month, Year, issue_number, volume_number, book_one, book_type_one)VALUES("'.$name.'", "'.$code.'", "'.$filename.'", "'.$book_author.'", "'.$book_title.'", "'.$book_url.'", "'.$month.'", "'.$year.'", "'.$issue_number['issue_number'].'", "'.$volume_number['volume_number'].'", "'.$book_number.'", "'.$book_type.'")'; 
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 1 Details added Successfully!!!';
				}
				else
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$v=mysql_fetch_array(mysql_query('select DISTINCT MAX (volume_number) from bulletin'));
						$volume_number=$v['volume_number'];
						$new_volume_number=$volume_number+1;
						$sql = 'INSERT INTO bulletin(name, code, pic1, auth1, title1, url1, Month, Year, issue_number, volume_number, book_one, book_type_one)VALUES("'.$name.'", "'.$code.'", "'.$filename.'", "'.$book_author.'", "'.$book_title.'", "'.$book_url.'", "'.$month.'", "'.$year.'", "'.$issue_number['issue_number'].'", "'.$new_volume_number.'", "'.$book_number.'", "'.$book_type.'")';
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 1 Details added Successfully!!!';
				}						
		}
		if($book_number=="Book - 2")
		{
				$issue_number = mysql_fetch_array(mysql_query('select issue_number from bulletin_main where Month="'.$month.'"'));
				$z=mysql_num_rows(mysql_query('select * from bulletin where Year="'.$year.'"'));
				
				if($z > 0)
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$volume_number=mysql_fetch_array(mysql_query('select volume_number from bulletin where Year="'.$year.'"'));
						$sql = 'INSERT INTO bulletin(name, code, pic2, auth2, title2, url2, Month, Year, issue_number, volume_number, book_two, book_type_two)VALUES("'.$name.'", "'.$code.'", "'.$filename.'", "'.$book_author.'", "'.$book_title.'", "'.$book_url.'", "'.$month.'", "'.$year.'", "'.$issue_number['issue_number'].'", "'.$volume_number['volume_number'].'", "'.$book_number.'", "'.$book_type.'")'; 
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 2 Details added Successfully!!!';
				}
				else
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$v=mysql_fetch_array(mysql_query('select DISTINCT MAX (volume_number) from bulletin'));
						$volume_number=$v['volume_number'];
						$new_volume_number=$volume_number+1;
						$sql = 'INSERT INTO bulletin(name, code, pic2, auth2, title2, url2, Month, Year, issue_number, volume_number, book_two, book_type_two)VALUES("'.$name.'", "'.$code.'", "'.$filename.'", "'.$book_author.'", "'.$book_title.'", "'.$book_url.'", "'.$month.'", "'.$year.'", "'.$issue_number['issue_number'].'", "'.$new_volume_number.'", "'.$book_number.'", "'.$book_type.'")';
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 2 Details added Successfully!!!';
				}						
		}
		if($book_number=="Book - 3")
		{
				$issue_number = mysql_fetch_array(mysql_query('select issue_number from bulletin_main where Month="'.$month.'"'));
				$z=mysql_num_rows(mysql_query('select * from bulletin where Year="'.$year.'"'));
				
				if($z > 0)
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$volume_number=mysql_fetch_array(mysql_query('select volume_number from bulletin where Year="'.$year.'"'));
						$sql = 'INSERT INTO bulletin(name, code, pic3, auth3, title3, url3, Month, Year, issue_number, volume_number, book_three, book_type_three)VALUES("'.$name.'", "'.$code.'", "'.$filename.'", "'.$book_author.'", "'.$book_title.'", "'.$book_url.'", "'.$month.'", "'.$year.'", "'.$issue_number['issue_number'].'", "'.$volume_number['volume_number'].'", "'.$book_number.'", "'.$book_type.'")'; 
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 3 Details added Successfully!!!';
				}
				else
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$v=mysql_fetch_array(mysql_query('select DISTINCT MAX (volume_number) from bulletin'));
						$volume_number=$v['volume_number'];
						$new_volume_number=$volume_number+1;
						$sql = 'INSERT INTO bulletin(name, code, pic3, auth3, title3, url3, Month, Year, issue_number, volume_number, book_three, book_type_three)VALUES("'.$name.'", "'.$code.'", "'.$filename.'", "'.$book_author.'", "'.$book_title.'", "'.$book_url.'", "'.$month.'", "'.$year.'", "'.$issue_number['issue_number'].'", "'.$new_volume_number.'", "'.$book_number.'", "'.$book_type.'")';
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 3 Details added Successfully!!!';
				}						
		}
		if($book_number=="Book - 4")
		{
				$issue_number = mysql_fetch_array(mysql_query('select issue_number from bulletin_main where Month="'.$month.'"'));
				$z=mysql_num_rows(mysql_query('select * from bulletin where Year="'.$year.'"'));
				
				if($z > 0)
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$volume_number=mysql_fetch_array(mysql_query('select volume_number from bulletin where Year="'.$year.'"'));
						$sql = 'INSERT INTO bulletin(name, code, pic4, auth4, title4, url4, Month, Year, issue_number, volume_number, book_four, book_type_four)VALUES("'.$name.'", "'.$code.'", "'.$filename.'", "'.$book_author.'", "'.$book_title.'", "'.$book_url.'", "'.$month.'", "'.$year.'", "'.$issue_number['issue_number'].'", "'.$volume_number['volume_number'].'", "'.$book_number.'", "'.$book_type.'")'; 
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 4 Details added Successfully!!!';
				}
				else
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$v=mysql_fetch_array(mysql_query('select DISTINCT MAX (volume_number) from bulletin'));
						$volume_number=$v['volume_number'];
						$new_volume_number=$volume_number+1;
						$sql = 'INSERT INTO bulletin(name, code, pic4, auth4, title4, url4, Month, Year, issue_number, volume_number, book_four, book_type_four)VALUES("'.$name.'", "'.$code.'", "'.$filename.'", "'.$book_author.'", "'.$book_title.'", "'.$book_url.'", "'.$month.'", "'.$year.'", "'.$issue_number['issue_number'].'", "'.$new_volume_number.'", "'.$book_number.'", "'.$book_type.'")';
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 4 Details added Successfully!!!';
				}						
		}
	}
	else
	{
		if($book_number=="Book - 1")
		{
				$issue_number = mysql_fetch_array(mysql_query('select issue_number from bulletin_main where Month="'.$month.'"'));
				$z=mysql_num_rows(mysql_query('select * from bulletin where Year="'.$year.'"'));
				
				if($z > 0)
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$volume_number=mysql_fetch_array(mysql_query('select volume_number from bulletin where Year="'.$year.'"'));
						$sql = 'update bulletin set name="'.$name.'", code="'.$code.'", pic1="'.$filename.'", auth1="'.$book_author.'", title1="'.$book_title.'", url1="'.$book_url.'", Month="'.$month.'", Year="'.$year.'", issue_number="'.$issue_number['issue_number'].'", volume_number="'.$volume_number['volume_number'].'", book_one="'.$book_number.'", book_type_one="'.$book_type.'" where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"'; 
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 1 Details added Successfully!!!';
				}
				else
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$v=mysql_fetch_array(mysql_query('select DISTINCT MAX (volume_number) from bulletin'));
						$volume_number=$v['volume_number'];
						$new_volume_number=$volume_number+1;
						$sql = 'update bulletin set name="'.$name.'", code="'.$code.'", pic1="'.$filename.'", auth1="'.$book_author.'", title1="'.$book_title.'", url1="'.$book_url.'", Month="'.$month.'", Year="'.$year.'", issue_number="'.$issue_number['issue_number'].'", volume_number="'.$new_volume_number.'", book_one="'.$book_number.'", book_type_one="'.$book_type.'" where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"';
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 1 Details added Successfully!!!';
				}						
		}
		if($book_number=="Book - 2")
		{
				$issue_number = mysql_fetch_array(mysql_query('select issue_number from bulletin_main where Month="'.$month.'"'));
				$z=mysql_num_rows(mysql_query('select * from bulletin where Year="'.$year.'"'));
				
				if($z > 0)
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$volume_number=mysql_fetch_array(mysql_query('select volume_number from bulletin where Year="'.$year.'"'));
						$sql = 'update bulletin set name="'.$name.'", code="'.$code.'", pic2="'.$filename.'", auth2="'.$book_author.'", title2="'.$book_title.'", url2="'.$book_url.'", Month="'.$month.'", Year="'.$year.'", issue_number="'.$issue_number['issue_number'].'", volume_number="'.$volume_number['volume_number'].'", book_two="'.$book_number.'", book_type_two="'.$book_type.'" where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"';  
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 2 Details added Successfully!!!';
				}
				else
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$v=mysql_fetch_array(mysql_query('select DISTINCT MAX (volume_number) from bulletin'));
						$volume_number=$v['volume_number'];
						$new_volume_number=$volume_number+1;
						$sql = 'update bulletin set name="'.$name.'", code="'.$code.'", pic2="'.$filename.'", auth2="'.$book_author.'", title2="'.$book_title.'", url2="'.$book_url.'", Month="'.$month.'", Year="'.$year.'", issue_number="'.$issue_number['issue_number'].'", volume_number="'.$new_volume_number.'", book_two="'.$book_number.'", book_type_two="'.$book_type.'" where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"';
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 2 Details Updated Successfully!!!';
				}						
		}
		if($book_number=="Book - 3")
		{
				$issue_number = mysql_fetch_array(mysql_query('select issue_number from bulletin_main where Month="'.$month.'"'));
				$z=mysql_num_rows(mysql_query('select * from bulletin where Year="'.$year.'"'));
				
				if($z > 0)
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$volume_number=mysql_fetch_array(mysql_query('select volume_number from bulletin where Year="'.$year.'"'));
						$sql = 'update bulletin set name="'.$name.'", code="'.$code.'", pic3="'.$filename.'", auth3="'.$book_author.'", title3="'.$book_title.'", url3="'.$book_url.'", Month="'.$month.'", Year="'.$year.'", issue_number="'.$issue_number['issue_number'].'", volume_number="'.$volume_number['volume_number'].'", book_three="'.$book_number.'", book_type_three="'.$book_type.'" where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"'; 
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 3 Details added Successfully!!!';
				}
				else
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$v=mysql_fetch_array(mysql_query('select DISTINCT MAX (volume_number) from bulletin'));
						$volume_number=$v['volume_number'];
						$new_volume_number=$volume_number+1;
						$sql = 'update bulletin set name="'.$name.'", code="'.$code.'", pic3="'.$filename.'", auth3="'.$book_author.'", title3="'.$book_title.'", url3="'.$book_url.'", Month="'.$month.'", Year="'.$year.'", issue_number="'.$issue_number['issue_number'].'", volume_number="'.$new_volume_number.'", book_three="'.$book_number.'", book_type_three="'.$book_type.'" where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"';
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 3 Details added Successfully!!!';
				}						
		}
		if($book_number=="Book - 4")
		{
				$issue_number = mysql_fetch_array(mysql_query('select issue_number from bulletin_main where Month="'.$month.'"'));
				$z=mysql_num_rows(mysql_query('select * from bulletin where Year="'.$year.'"'));
				
				if($z > 0)
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$volume_number=mysql_fetch_array(mysql_query('select volume_number from bulletin where Year="'.$year.'"'));
						$sql = 'update bulletin set name="'.$name.'", code="'.$code.'", pic4="'.$filename.'", auth4="'.$book_author.'", title4="'.$book_title.'", url4="'.$book_url.'", Month="'.$month.'", Year="'.$year.'", issue_number="'.$issue_number['issue_number'].'", volume_number="'.$volume_number['volume_number'].'", book_four="'.$book_number.'", book_type_four="'.$book_type.'" where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"'; 
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 4 Details added Successfully!!!';
				}
				else
				{
						$rand_date=date('dmYHis');
						$filetmp = $_FILES["book_cover"]["tmp_name"];						
						$file_name = $_FILES["book_cover"]["name"];
						$ext = pathinfo($file_name, PATHINFO_EXTENSION);
						$filename = $rand_date.".".$ext;
						$filepath = "../uploads/bulletin/$code/".$filename;  
						move_uploaded_file($filetmp,$filepath);
						$v=mysql_fetch_array(mysql_query('select DISTINCT MAX (volume_number) from bulletin'));
						$volume_number=$v['volume_number'];
						$new_volume_number=$volume_number+1;
						$sql = 'update bulletin set name="'.$name.'", code="'.$code.'", pic4="'.$filename.'", auth4="'.$book_author.'", title4="'.$book_title.'", url4="'.$book_url.'", Month="'.$month.'", Year="'.$year.'", issue_number="'.$issue_number['issue_number'].'", volume_number="'.$new_volume_number.'", book_four="'.$book_number.'", book_type_four="'.$book_type.'" where code="'.$code.'" and Month="'.$month.'" and Year="'.$year.'"';
						$result=mysql_query($sql);
						if ($result==false)
							{
								die(mysql_error());
							}
					$message ='Book - 4 Details added Successfully!!!';
				}						
		}
	}	
  }
}
?>
<div align="center">&nbsp;<span class="error"><?php echo $message;?></span></div>
						<table align="center" style="color: #211D70;" cellpadding="0" cellspacing="0" >							
								<tr>
				<td>Select Department Name:&nbsp;</td>
				<td>
				<?php 
echo '<label><select name="dep_name" id="dep_name">';
	echo "<option>" . '' ."</option>";
    echo "<option>" . 'Biology' ."</option>";
	echo "<option>" . 'Chemistry' ."</option>";
	echo "<option>" . 'Chemical Engineering' ."</option>";
	echo "<option>" . 'Civil Engineering' ."</option>";
	echo "<option>" . 'Computer Science' ."</option>";
	echo "<option>" . 'Economics' ."</option>";
	echo "<option>" . 'Electrical and Electronics Engineering' ."</option>";
	echo "<option>" . 'Humanities' ."</option>";
	echo "<option>" . 'Management' ."</option>";
	echo "<option>" . 'Mathematics' ."</option>";
	echo "<option>" . 'Mechanical Engineering' ."</option>";
	echo "<option>" . 'Pharmacy' ."</option>";
	echo "<option>" . 'Physics' ."</option>";
echo '</label></select>';
				?>
				</td> 
				</tr>
                 <tr><td colspan="2">&nbsp;</td></tr>
				 <tr>
				 <td colspan="2">
				 <table style="color: #211D70;">
				 <tr>
				<td style="width:180px;">Month:&nbsp;</td>
				<td>
				<?php  
echo '<label><select class="select_small_box" name="month" id="month">';
	echo "<option>" . '' ."</option>";
    echo "<option>" . 'January' ."</option>";
	echo "<option>" . 'February' ."</option>";
	echo "<option>" . 'March' ."</option>";
	echo "<option>" . 'April' ."</option>";
	echo "<option>" . 'May' ."</option>";
	echo "<option>" . 'June' ."</option>";
	echo "<option>" . 'July' ."</option>";
	echo "<option>" . 'August' ."</option>";
	echo "<option>" . 'September' ."</option>";
	echo "<option>" . 'October' ."</option>";
	echo "<option>" . 'November' ."</option>";
	echo "<option>" . 'December' ."</option>";
echo '</label></select>';
				?></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year:&nbsp;</td>
				<td>
				<?php  
echo '<label><select class="select_small_box" name="year">';
    echo "<option>" . '2015' ."</option>";
	echo "<option>" . '2016' ."</option>";
	echo "<option>" . '2017' ."</option>";
	echo "<option>" . '2018' ."</option>";
	echo "<option>" . '2019' ."</option>";
	echo "<option>" . '2020' ."</option>";
	echo "<option>" . '2021' ."</option>";
	echo "<option>" . '2022' ."</option>";
	echo "<option>" . '2023' ."</option>";
	echo "<option>" . '2024' ."</option>";
	echo "<option>" . '2025' ."</option>";
echo '</label></select>';
				?></td>
				</tr></table>
</td></tr>
            <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
			<tr>
				 <td colspan="2">
				 <table style="color: #211D70;">
				 <tr>
				<td style="width:180px;">Select Book:&nbsp;</td>
				<td>
				<?php  
echo '<label><select class="select_small_box" name="book_num">';
    echo "<option>" . 'Book - 1' ."</option>";
	echo "<option>" . 'Book - 2' ."</option>";
	echo "<option>" . 'Book - 3' ."</option>";
	echo "<option>" . 'Book - 4 ' ."</option>";
echo '</label></select>';
				?></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Book Type:&nbsp;</td>
				<td>
				<?php  
echo '<label><select class="select_small_box" name="book_type">';
    echo "<option>" . 'Print' ."</option>";
	echo "<option>" . 'eBook' ."</option>";
echo '</label></select>';
				?></td></tr></table>
				</td>
				</tr>
			<tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								<tr>
								 <td>Title&nbsp;</td>
								 <td><input type="text" name="book_title" id="book_title" placeholder="&nbsp;" class="text_box"/></td>
								 </tr>
								 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								 <tr>
								 <td>Author&nbsp;</td>
								 <td><input type="text" name="book_author" id="book_author"  placeholder="&nbsp;" class="text_box"/></td>
								 </tr>
								 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								 <tr>
								 <td>URL&nbsp;</td>
								 <td><input type="text" name="book_url" id="book_url" placeholder="&nbsp;" class="text_box"/></td>
								 </tr>
								 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								 <tr>
								 <td>Upload Cover Image&nbsp;</td>
								<td><input type="file" name="book_cover" id="book_cover" class="file_upload_box"/></td>								 
								 </tr>
	<tr><td colspan="2" align="center" style="width: 100%;">
		<br/>	
				<input type="submit" name="submit" value="Submit" class="Stylish_button" />
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="add_bulletin_books.php" style="padding: 4px 15px 4px 15px; width:80px; background-color :#06588f; color: #FFFFFF; font-weight: bold; border-radius: 5px; font-size:14px;">Reset</a>
</td></tr>
</table></form><br/>			
<br/>													 
</div></td>
</tr>
</table>
</div>
</div>
<div class="footerWrapper">
<div class="footerFix">
<h2>Quick Links
</h2>
<ul style="display: none;">
<li>
<a id="41" href="JavaScript:void(0);"></a>
<h3>
<a id="41" href="JavaScript:void(0);">Libraries</a>
</h3>
<ul>
<li>
<a target="_blank"  href="http://www.bits-goa.ac.in/Library/Index.aspx/">BITS Goa</a>
</li>
<li>
<a target="_blank" href="http://www.bits-pilani.ac.in/dubai/bitsLibrary">BITS Dubai</a>
</li>
<li>
<a target="_blank"  href="http://www.bits-pilani.ac.in/hyderabad/bitsLibrary">BITS Hyderabad</a>
</li>
<li>
<a target="_blank"  href="https://libraries.mit.edu/">MIT, USA</a>
</li>
<li>
<a target="_blank"  href="http://library.stanford.edu/">Stanford University</a>
</li>
<li>
<a target="_blank" href="http://library.harvard.edu/">Harvard University</a>
</li>
</ul>
</li>
<li>
<a id="42" href="JavaScript:void(0);"></a>
<h3>
<a id="42" href="JavaScript:void(0);">Important Services</a>
</h3>
<ul>
<li>
<a href="../services/circulation.php">Circulation</a>
</li>
<li>
<a href="../services/references.php">References</a>
</li>
<li>
<a href="../services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="../services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="../services/daily_news.php">Daily News</a>
</li>
<li>
<a href="../services/lf.php">Lost & Found</a>
</li>
</ul>
</li>
<li>
<a id="43" href="JavaScript:void(0);"></a>
<h3>
<a id="43" href="JavaScript:void(0);">Search & Subscription</a>
</h3>
<ul>
<li>
<a href="../search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="../search/periodical_finder.php">Periodical Finder</a>
</li>
<li>
<a target="_blank"  href="http://172.21.1.37/">Web OPAC</a>
</li>
<li>
<a href="../services/av.php">Audio Visuals</a>
</li>
<li>
<a href="../services/databases.php">Online Databases</a>
</li>
<li>
<a href="../search/e-journals.php">E-Journals</a>
</li>
</ul>
</li>
</ul>
</li>
</ul>
</div>
</div>
<div class="cpInfoFixWrapper">
<div class="cpInfoFix">
<p class="info">
                An institution deemed to be a University estd. vide Sec.3 of the UGC Act,1956 under
                notification # F.12-23/63.U-2 of Jun 18,1964</p><br/>
                &copy; 2015 BITS-Library, BITS-Pilani, India.
               <a href="../credits.php">[Credits]</a>
</div>
</div>
</body>
</html>
<?php
	}
	else{
		header("Location: ../account/dashboard.php");
	}
}
else{
	header("Location: ../index.php");
}
?>