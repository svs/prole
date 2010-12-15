<?php require_once('Connections/connection.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_connection, $connection);
$query_core_content = "SELECT * FROM content_db WHERE content_page = 'index.php'";
$core_content = mysql_query($query_core_content, $connection) or die(mysql_error());
$row_core_content = mysql_fetch_assoc($core_content);
$totalRows_core_content = mysql_num_rows($core_content);

mysql_select_db($database_connection, $connection);
$query_list_frontbox = "SELECT * FROM frontbox_db ORDER BY frontbox_id DESC LIMIT 1";
$list_frontbox = mysql_query($query_list_frontbox, $connection) or die(mysql_error());
$row_list_frontbox = mysql_fetch_assoc($list_frontbox);
$totalRows_list_frontbox = mysql_num_rows($list_frontbox);

mysql_select_db($database_connection, $connection);
$query_list_ticker = "SELECT * FROM ticker_db ORDER BY ticker_id ASC";
$list_ticker = mysql_query($query_list_ticker, $connection) or die(mysql_error());
$row_list_ticker = mysql_fetch_assoc($list_ticker);
$totalRows_list_ticker = mysql_num_rows($list_ticker);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="scripts.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sankalp 2010 - <?php echo $row_core_content['content_title']; ?></title>
<link href="styles.css" rel="stylesheet" type="text/css" />

</head>
<body onLoad="MM_preloadImages('images/home_icon_apply_active.png','images/home_icon_register_active.png','images/home_icon_create_active.png','images/home_icon_connect_active.png','images/home_icon_vote_active.png','images/home_icon_request_active.png','images/footer_facebook_active.gif','images/footer_twitter_active.gif','images/footer_email_active.gif','images/footer_call_active.gif','images/footer_googlemaps_active.gif')">
<center>
<div id="wrapper">
  <?php include_once("core_topnav.php");?>
  <div id="home">
    <div class="inside">
      <?php if ($totalRows_list_ticker > 0) { // Show if recordset not empty ?>
  <div id="tickercover">
    <div class="tickerinside">
      <DIV ID="TICKER" STYLE="overflow:hidden; width:900px"  onmouseover="TICKER_PAUSED=true" onMouseOut="TICKER_PAUSED=false">
        <?php do { ?>
          <a href="<?php echo $row_list_ticker['ticker_link']; ?>"><?php echo $row_list_ticker['ticker_text']; ?></a> | 
          <?php } while ($row_list_ticker = mysql_fetch_assoc($list_ticker)); ?>
      </DIV> 
    </div>
  </div>
        
        
  <script type="text/javascript" src="webticker_lib.js" language="javascript"></script>
  <?php } // Show if recordset not empty ?>
<h1><img src="images/header_home.png" alt="Catalyzing Investment in Sustainable and Scalable Social Enterprises" width="616" height="87" />
</h1>
      <div class="icons">
        <table width="243" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="122" height="134"><a href="photos.php"><img src="images/home_icon_apply.png" alt="Photos" name="home_icon_apply" width="122" height="134" id="home_icon_apply" onMouseOver="MM_swapImage('home_icon_apply','','images/home_icon_apply_active.png',1)" onMouseOut="MM_swapImgRestore()" /></a></td>
            <td width="121" height="134"><a href="winners.php"><img src="images/home_icon_register.png" alt="Register" name="home_icon_register" width="121" height="134" id="home_icon_register" onMouseOver="MM_swapImage('home_icon_register','','images/home_icon_register_active.png',1)" onMouseOut="MM_swapImgRestore()" /></a></td>
          </tr>
          <tr>
            <td width="122" height="131"><a href="http://sankalpforum.com/users/new"><img src="images/home_icon_create.png" alt="Create" name="home_icon_create" width="122" height="131" id="home_icon_create" onMouseOver="MM_swapImage('home_icon_create','','images/home_icon_create_active.png',1)" onMouseOut="MM_swapImgRestore()" /></a></td>
            <td width="121" height="131"><a href="http://sankalpforum.com/connect"><img src="images/home_icon_connect.png" alt="Connect" name="home_icon_connect" width="121" height="131" id="home_icon_connect" onMouseOver="MM_swapImage('home_icon_connect','','images/home_icon_connect_active.png',1)" onMouseOut="MM_swapImgRestore()" /></a></td>
          </tr>
          <tr>
            <td width="122" height="128"><a href="finalists.php"><img src="images/home_icon_vote.png" alt="Finalists" name="home_icon_vote" width="122" height="128" id="home_icon_vote" onMouseOver="MM_swapImage('home_icon_vote','','images/home_icon_vote_active.png',1)" onMouseOut="MM_swapImgRestore()" /></a></td>
            <td width="121" height="128"><a href="request.php"><img src="images/home_icon_request.png" alt="Request" name="home_icon_request" width="121" height="128" id="home_icon_request" onMouseOver="MM_swapImage('home_icon_request','','images/home_icon_request_active.png',1)" onMouseOut="MM_swapImgRestore()" /></a></td>
          </tr>
        </table>
      </div>
      <div class="content">
        <h2><?php echo $row_core_content['content_title']; ?></h2>
<?php echo $row_core_content['content_text']; ?>        </div>
    </div>
  </div>
  <div class="orangebar">
    <div align="center"><strong>Create, Access and Share Your Profile</strong> - allow investors, enterprises and visitors to connect with you at Sankalp 2010.</div>
  </div>
  <div id="frontpage">
    <div class="inside">
    <ul>
    <li>
      <div class="panel">
        <h3><?php echo $row_list_frontbox['frontbox_speakers_text']; ?></h3>
<a href="<?php echo $row_list_frontbox['frontbox_speakers_link']; ?>" class="boxeda"><img src="<?php echo tNG_showDynamicImage("", "uploads/", "{list_frontbox.frontbox_speakers_pic}");?>" alt="<?php echo $row_list_frontbox['frontbox_speakers_text']; ?>" /></a>
        <div class="padding">Sankalp Speakers include some of the best names in the Social Enterprise space. Click here to view profiles of the Sankalp 2010 Speakers!</div>
      </div>
    </li>
    
        <li>
      <div class="panel">
        <h3><?php echo $row_list_frontbox['frontbox_live_text']; ?></h3>
<a href="<?php echo $row_list_frontbox['frontbox_live_link']; ?>" class="boxeda"><img src="<?php echo tNG_showDynamicImage("", "uploads/", "{list_frontbox.frontbox_live_pic}");?>" alt="<?php echo $row_list_frontbox['frontbox_live_text']; ?>" /></a>
        <div class="padding">Tune in to Sankalp  Live to view jury profiles, sessions, agenda, exhibition, attendee list and  much more!</div>
      </div>
    </li>
    
        <li>
      <div class="panel">
        <h3><?php echo $row_list_frontbox['frontbox_sankalp_text']; ?></h3>
<a href="<?php echo $row_list_frontbox['frontbox_sankalp_link']; ?>" class="boxeda"><img src="<?php echo tNG_showDynamicImage("", "uploads/", "{list_frontbox.frontbox_sankalp_pic}");?>" alt="<?php echo $row_list_frontbox['frontbox_sankalp_text']; ?>" /></a>
        <div class="padding">Browse through this  section to take a glimpse of&nbsp; and browse through the exciting sessions at  Sankalp 2010!</div>
      </div>
    </li>
    
    
    </ul>
    </div>
  </div>
<?php include_once("core_footer_index.php");?>
</div>
<?php include_once("core_google.php");?>
</center>
<?php include_once("core_code.php");?>
<script src="http://www.surveymonkey.com/jsPop.aspx?sm=kGyLOaxfzMMj6JKvJZCppA_3d_3d"> </script>
</body>

</html>
<?php
mysql_free_result($core_content);

mysql_free_result($list_frontbox);

mysql_free_result($list_ticker);
?>
