<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Credits</title>
<link type="image/png" rel="icon" href="images/fav_32.png"  >
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
<link type="text/css" rel="stylesheet" href="css/module.css">
<link type="text/css" rel="stylesheet" href="css/dashboard.css">
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/metadata.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div class="headerWrapper" style="background-position: right 0px;">
<div class="headerWrapperFix">
<div class="logoWrapper">
<a id="headercontrol_ancu" class="logo" href="index.php">
<img id="headercontrol_imgu" usemap="#Map" alt="BITS Pilani logo" src="images/logo.jpg">
</a>
</div>
<?php if(isset($_SESSION['bitsid'])){
	$userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
?>
<div class="loginWrapper" style="margin-right:20.5%;">
<div class="welcome">
<h2><span>Welcome</span>,<br><?php echo $userinfo['name']; ?></h2>
&nbsp;&nbsp;
</div>
<div class="loginmenu">
<img src="uploads/profilepics/<?php echo $userinfo['avatar']; ?>" width="50">
<div class="loginNav">
<ul>
<?php
	if($userinfo['category']=="Admin")
	{
?>
<li><a href="administrator/admin.php">Dashboard</a></li>
<?php
	}
	else
	{
?>
<li><a href="account/dashboard.php">Dashboard</a></li>
<?php
	}
?>
<li><a href="account/account.php">Account</a></li>
<li><a class="logout" href="index.php?bitsid=0">Logout</a></li>
</ul>
</div>
</div>
</div><?php 
} else {
?>
<div align="center" class="login">
<a style="color:#211d70;" href="login.php">
<img src="images/login_icon.png" height="90px" width="100px"><br/>
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
<a href="rules_and_regulations.php">Rules and Regulations</a>
</li>
<li>
<a href="library_staff.php">Library Staff</a>
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
<a href="http://172.21.1.37/" target="_blank">Online Book Catalogue</a>
</li>
<li>
<a href="search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="search/periodical_finder.php">Periodical Finder</a>
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
<a href="services/circulation.php">Circulation</a>
</li>
<li>
<a href="services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="services/references.php">References</a>
</li>
<li>
<a href="services/inter_library_loan.php">Inter-Library Loan</a>
</li>
<li>
<a href="services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="services/daily_news.php">Daily News</a>
</li>
<li>
<a href="services/lf.php">Lost & Found</a>
</li>
<li>
<a href="services/av.php">Audio & Visuals</a>
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
<a href="search/periodical_finder.php">Print-Journals</a>
</li>
<li>
<a href="search/e-journals.php">E-Journals</a>
</li>
<li>
<a href="services/databases.php">Online Databases</a>
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
<a href="plagiarism.php">Plagiarism</a>
</li>
<li>
<a target="_blank" href="https://www.mendeley.com/">Mendeley Research Tool</a>
</li>
<li>
<a target="_blank" href="http://endnote.com/">Endnote</a>
</li>
<li>
<a target="_blank"  href="http://shodhganga.inflibnet.ac.in/">Shodhganga</a>
</li>
<li>
<a  href="theses_and_reports.php">Theses & Reports</a>
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
<a href="feedback/survey.php">Survey</a>
</li>
<li>
<a href="feedback/feedback_form.php">Suggestion | Complaint | Compliments</a>
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
<p> You are here:</p>
<ul class="breadCrumb">
<?php 
if(isset($_SESSION['bitsid']))
{
	if($userinfo['category']=="Admin")
	{
?>
<li class="home"><a href="administrator/admin.php">Dashboard</a></li>
<?php
	}
	else if($userinfo['category']=="Student" || $userinfo['category']=="Research Scholar" || $userinfo['category']=="Faculty/Staff")
	{
?>
<li class="home"><a href="account/dashboard.php">Dashboard</a></li>
<?php
	}
}	
	else
	{
	?>
	<li class="home"><a href="index.php">Home</a></li>
	<?php
	}
?>
<li>Credits</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<br/>
<div align="left" style="margin:1%;">
<strong><span style="font-size:1.5em; text-align:left; font-weight:bold;">Credits</span></strong><hr/><br />
<span><strong>Giridhar Kunkur<br />
            Librarian and Chief, Publications and Media Relations, BITS Pilani<br />
            e-mail: </strong> </span> 
                    <a href="mailto: giridhar.kunkur@pilani.bits-pilani.ac.in">
					<span><strong> giridhar.kunkur@pilani.bits-pilani.ac.in</strong></span></a>
	<br /><br />				
					<span><strong>Ishappa Channappa Bandi<br />
            Deputy Librarian, BITS Pilani<br />
            e-mail: </strong> </span> 
                    <a href="mailto:ishappa.bandi@pilani.bits-pilani.ac.in">
					<span><strong>ishappa.bandi@pilani.bits-pilani.ac.in</strong></span></a>
					<br /><br />				
					<span><strong>Deepak Mehta<br />
            Assistant Librarian, BITS Pilani<br />
            e-mail: </strong> </span> 
                    <a href="mailto:deepak_mehta@pilani.bits-pilani.ac.in">
					<span><strong>deepak_mehta@pilani.bits-pilani.ac.in</strong></span></a>
					<br/><br/>
					<strong><span style="font-size:1.2em; text-align:left; font-weight:bold;">Website Development Team</span></strong><hr/><br />
					<span><strong>Abhishek Sharma<br />
            BITS ID: 2011B5A8637P<br />
            e-mail: </strong> </span> 
                    <a href="mailto:f2011637@pilani.bits-pilani.ac.in">
					<span><strong>f2011637@pilani.bits-pilani.ac.in</strong></span></a>
					<br /><br />
					<span><strong>Pravin Saini<br />
            BITS ID: 2008D2PS468P<br />
            e-mail: </strong> </span> 
                    <a href="mailto:pravin.saini89@gmail.com">
					<span><strong>pravin.saini89@gmail.com</strong></span></a>
					<br /><br />
					<span><strong>Suryansh Rastogi<br />
            BITS ID: 2012B1AB790P<br />
            e-mail: </strong> </span> 
                    <a href="mailto:f2012790@pilani.bits-pilani.ac.in">
					<span><strong>f2012790@pilani.bits-pilani.ac.in</strong></span></a>
</div>
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
<a href="services/circulation.php">Circulation</a>
</li>
<li>
<a href="services/references.php">References</a>
</li>
<li>
<a href="services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="services/daily_news.php">Daily News</a>
</li>
<li>
<a href="services/lf.php">Lost & Found</a>
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
<a href="search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="search/periodical_finder.php">Periodical Finder</a>
</li>
<li>
<a target="_blank"  href="http://172.21.1.37/">Web OPAC</a>
</li>
<li>
<a href="services/av.php">Audio Visuals</a>
</li>
<li>
<a href="services/databases.php">Online Databases</a>
</li>
<li>
<a href="search/e-journals.php">E-Journals</a>
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
               <a href="credits.php">[Credits]</a>
</div>
</div>
</body>
</html>