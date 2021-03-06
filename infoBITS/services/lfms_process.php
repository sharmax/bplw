<?php
include("../config.php");
if(isset($_SESSION['bitsid']))
{
	$info = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
	if($info['confirm']!=1){
        header("location: ../index.php");
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Lost & Found Management System</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
.Stylish_button
{
background-color :#4a9ace;
color: #FFFFFF;
font-weight: bold;
padding: 4px;
border:none;
width:100px;
height:30px;
cursor:pointer;
border-radius: 5px; 
}
.text_box
{
padding:4px;
	width:200px;
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
	var mobile = document.getElementById("mobile");
	if(mobile.value.trim() == ''){
		valid = false;
		message = message + '*Mobile Number is required' + '\n';
	}
	if (valid == false){
		alert(message);
		return false;
	}
}
</script>
</head>
<body>
<?php
if(isset($_POST['save']))
	{
		//Sanitize the data and assign to variables
		$sno = trim($_POST['sno']);
		$name = trim($_POST['name']);
		$idpsrn = trim($_POST['idpsrn']);
		$email = trim($_POST['email']);
		$mobile = trim($_POST['mobile']);
		$date = trim($_POST['date']);
		$time = trim($_POST['time']);
		
		$sql = "update lfms set 
					Name = '$name',
					ID_PSRN = '$idpsrn',
					Email = '$email',
					Mobile = '$mobile',
					Claim_Date='$date',
					status='0',
					Claim_Time='$time'
					where sno = $sno";
	
		$result = mysql_query($sql);
		header('Location: lfms.php');
		exit();	
	}
//Start of edit contact read
$gresult = ''; //declare global variable
if(isset($_POST["action"]) and $_POST["action"]=="edit"){
	$id = (isset($_POST["ci"])? $_POST["ci"] : '');
	$sql = "select * from lfms where sno = $id";
	$result = mysql_query($sql);
	$gresult = mysql_fetch_array($result);	
}
if($_POST["action"]=="")
{
	header('Location: lfms.php');
	exit();
}
?>
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
<?php
	if($userinfo['category']=="Admin")
	{
?>
<li><a href="../administrator/admin.php">Dashboard</a></li>
<?php
	}
	else
	{
?>
<li><a href="../account/dashboard.php">Dashboard</a></li>
<?php
	}
?>
<li><a href="../account/account.php">Account</a></li>
<li><a class="logout" href="../index.php?bitsid=0">Logout</a></li>
</ul>
</div>
</div>
</div><?php 
} else {
?>
<div align="center" class="login">
<a style="color:#211d70;" href="../login.php">
<img src="../images/login_icon.png" height="70px" width="80px"><br/>
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
if(isset($_SESSION['bitsid']))
{
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
}	
	else
	{
	?>
	<li class="home"><a href="../index.php">Home</a></li>
	<?php
	}
?>
<li>Lost & Found Management System</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<table style="width: 100%" align="center">
              <tr>
              <td style="width: 100%" valign="top" align="center">
              <table cellpadding="0" cellspacing="0" style="margin-top:10px" align="center">
              <tr>
              <td valign="top" align="center">
			<form id="frmContact" method="POST" action="lfms_process.php" onSubmit="return Validate();">
			<input type="hidden" name="date" id="date" value="<?php date_default_timezone_set("Etc/UTC"); echo date('d/m/Y'); ?>" />
			<input type="hidden" name="time" id="time" value="<?php date_default_timezone_set("Etc/UTC"); echo date('H:i:s'); ?>" />

				<input type="hidden" name="sno" value="<?php echo $gresult["sno"]; ?>" />
				<table cellpadding="0" cellspacing="0" style="color: #211D70;">
				<tr><td colspan="2" align="center">
				<label for="num" name="sno" style="background-color:#F5F5F5; color:green; border-radius:10px; font-weight:bold; font-size:13px; text-align:center; width:530px">Remember ! your identification Number is '<?php echo $gresult["sno"]; ?>'.<br/>Please Submit the below form and meet the librarian to identify and confirm the lost item.</label>
                  </td></tr>
				  <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
            <tr><td style="width: 130px; font-size: 13px; font-weight: bold">
                <label for="pname">Particulars Name:</label></td>
                <td>
				<input type="text" name="pname" id="pname" style="color:#211D70; border-radius:10px; font-size:13px; border:none; font-weight:normal; width:500px;" value="<?php echo $gresult["particulars"]; ?>" readonly="true"/>
                  </td></tr>
				  <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
            <tr><td style="width: 130px; font-size: 13px; font-weight: bold">
                <label for="name">Name:</label></td>
                <td>
				<input type="text" name="name" id="name" style="color:#211D70; border-radius:10px; font-size:13px; border:none; font-weight:normal; width:500px;" value="<?php echo $userinfo['name']; ?>" readonly="true"/>
                  </td></tr>

                        <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>

                        <tr><td style="font-size: 13px; font-weight: bold">
                <label for="idpsrn">ID/PSRN:</label></td>
                <td>
				<input type="text" name="idpsrn" id="idpsrn" style="color:#211D70; border-radius:10px; font-size:13px; border:none; font-weight:normal; width:500px;" value="<?php echo $userinfo['bitsid']; ?>" readonly="true"/>
                   </td></tr>
       
                        <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
<tr><td style="width: 70px; font-size: 13px; font-weight: bold">
                <label for="email">BITS Email: </label></td>
                <td>
				<input type="text" name="email" id="email" style="color:#211D70; border-radius:10px; font-size:13px; border:none; font-weight:normal; width:500px;" value="<?php echo $userinfo['email']; ?>" readonly="true"/>
                   </td></tr>
				   <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
				   <tr><td style="font-size: 13px; font-weight: bold">
                <label for="mobile">Enter Mobile: </label></td>
                <td>
				<input class="text_box" type="text" name="mobile" id="mobile" placeholder="&nbsp;" Width="300px"/>
                   </td></tr>
				    <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
                        <tr><td>&nbsp;</td><td align="left">
                            <input class="Stylish_button" type="submit" name="save" id="save" value="Submit" />&nbsp;&nbsp;&nbsp;
							<input class="Stylish_button" type="button" name="cancel" id="cancel" value="Cancel" onclick="javascript:window.location='lfms.php';"/></td></tr>
                        </table>				
			</form>			
			</td></tr></table>
</td></tr></table>
</div>
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
else
{
 header("location: ../index.php");
}
?>