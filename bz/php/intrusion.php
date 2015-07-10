<?php
include('../config/dbconnect.php');
include('../config/sql.php');
?>

<!DOCTYPE html>
<html>
<head><title>Marco Managed Health Scores | Intrusion Details</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<progress value="0"></progress>
  <div id="nav2">
	<ul class="js-css-menu shadow responsive vertical">
		<li><h3><a href="../index.php">Main</a></h3><hr>
		 <div>
		  <ul>
			<li><h3 style="margin-bottom: 0px; margin-top: 10px;">Main</h3></li>
			<hr class="hrfull">
			<li><a href="../index.php">Home</a></li>
			<li><a href="../php/stats.php">LabTech Stats</a></li>
			<li><a href="http://status.marconet.com/" target=_blank>NOC Server Status</a></li>
			<li><a href="https://ltweb1.marconet.com/" target=_blank>LabTech Web Server</a></li>
			<li><a href="http://stckbvault01/" target=_blank>LabTech Knowledgebase</a></li>
			<li><a href="https://connect.marconet.com/" target=_blank>ConnectWise</a></li>
			<li><a href="https://sp.marconet.com/" target=_blank>Marco SharePoint</a></li>
			<hr class="hrfull">
		  </ul>	
		  </div>
		  </li>
		<li><h3><a href="#">Trending</a></h3><hr>
		<div>
		  <ul>
			<li><h3 style="margin-bottom: 0px; margin-top: 10px;">Trending</h3></li>
			<hr class="hrfull">
			<li><a href=../php/trending.php?trend=Antivirus>Antivirus</a></li> 
			<li><a href=../php/trending.php?trend=Disk>Disk</a></li> 
			<li><a href=../php/trending.php?trend=Intrusion>Intrusion</a></li> 
			<li><a href=../php/trending.php?trend=Usability>Usability</a></li> 
			<li><a href=../php/trending.php?trend=Services>Services</a></li> 
			<li><a href=../php/trending.php?trend=Updates>Updates</a></li> 
			<li><a href="../php/trending.php?trend=Event Log">Events</a></li> 
			<li><a href="../php/trending.php?trend=Avg Score">Overall Score</a></li>
			<hr class="hrfull">
		  </ul>
		  </div>
		  </li>
		<li><h3><a href="#">CARE Team</a></h3><hr>
		<div>
		  <ul>
			<li><h3 style="margin-bottom: 0px; margin-top: 10px;">CARE Team</h3></li>
			<hr class="hrfull">
				<?php
					$result4 = mysqli_query($conn,$list_team);
					while ($row = mysqli_fetch_array($result4)) {echo "<li><a href=\"../php/care_score.php?careteam=".$row["netsp"]."\">".$row["netsp"]." Team</a></li>";}
				?>
			<hr class="hrfull">
		  </ul>
		  </div>
		  </li>
		<li><h3><a href="#">Network Specialist</a></h3>
		<div class="netspec">
		<h3 style="margin-bottom: 0px; margin-top: 10px;">Network Specialist</h3>
		<hr>
		  <ul class="col1">
			<?php
				$result4 = mysqli_query($conn,$list_spec);
				while ($row = mysqli_fetch_array($result4)) {echo "<li style=\"width:180px;\"><a href=\"../php/ns_score.php?net_sp=".$row["netsp"]."\">".$row["netsp"]."</a></li>";}
			?>
		  </ul>
		  <hr style="width:100%;">
		  </div>
		  </li>
		</ul>
	<h4 style='color:#ccc'>
		<img src='../images/online.png'>&nbsp;&nbsp;Computer Online<br>
		<img src='../images/offline.png'>&nbsp;&nbsp;Computer Offline<p>
	</h4>

  </div>
<div id="header">
  <div id="headerlogo">
  	<a href="../index.php"><img src="../images/marco-logo.png" align=left style="margin-left: 15px" vspace=20></img></a></div>
  <div id="headerbg"></div>
<h1><b>&nbsp; Managed Services</b></h1>
</div>
<div id="space">

	<div id="section-two">

 <?php
 $computerid = $_GET["computerid"];
$field="`Event Date`";
$sort="DESC";
if(isset($_GET["sorting"]))
{
  if($_GET["sorting"]=="ASC")
  {
  $sort="DESC";
  }
  else
  {
    $sort="ASC";
  }
}
if($_GET["field"]=="`Event Date`")
{
   $field="`Event Date`";
}
elseif($_GET["field"]=="`Intrusion Details`")
{
   $field="`Intrusion Details`";
}


	$sql = "SELECT IF((computers.lastcontact > date_add(now(),interval -10 minute)), '<img src=../images/online.png>','<img src=../images/offline.png>') AS 'Status', computerid, computers.name as 'Computer Name', eventdate as 'Event Date', SUBSTRING(stat17,6) as 'Intrusion Details' FROM h_extrastatsdaily JOIN computers USING (computerid) WHERE computers.computerid={$computerid} AND stat17 < 1 AND eventdate > DATE_ADD(NOW(), INTERVAL -1 MONTH) ORDER BY {$field} {$sort}";

	$result = mysqli_query($conn,$sql);

    echo "<div id=intTable><p><hr width=70%><p><h2><b>Intrusion Health Score Details{$exclusions_text}</b></h2>
	  <table class=TBscore>
	    <tr align=left>
		  <th width=200 class=names>Computer Name</th>
		  <th class=event_date width=150><a href=\"../php/intrusion.php?computerid={$computerid}&sorting=".$sort."&field=Event Date\">Event Date</a></th>
		  <th class=score_detail width=400><a href=\"../php/intrusion.php?computerid={$computerid}&sorting=".$sort."&field=Intrusion Details\">Intrusion Details</a></th>
		 </tr>";
 		 
    // output data of each row
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
		<td class=names><a href=\"labtech:open?computerid=".$row["computerid"]."\">".$row['Status']."&nbsp;&nbsp;".$row["Computer Name"]."</a></td>
			<td class=event_date style='text-align:left;'>".$row["Event Date"]."</td>
			<td class=score_detail style='text-align:left;'>".$row["Intrusion Details"]."</td>
		</tr>";
    }
   echo "</table></div>";
   
   
?>

<div id=intExpl>
<p><br>
<p><h3><strong>Security Event IDs</strong></h3>
  <table style="width: 30%;" border="1" cellspacing="0" cellpadding="3">
	<tbody>
	  <tr>
		<td bgcolor="#bdd0b4" style="width: 10%;"><strong>Event ID</strong></td>
		<td bgcolor="#bdd0b4" style="width: 40%;text-align:left;"><strong>Description</strong></td>
	  </tr>
	  <tr>
		<td valign="top">529</td>
		<td valign="top" style="text-align:left;">Unknown user name or bad password</td>
	  </tr>
	  <tr>
		<td valign="top">530</td>
		<td valign="top" style="text-align:left;">Account logon time restriction violation</td>
	  </tr>
	  <tr>
		<td valign="top">531</td>
		<td valign="top" style="text-align:left;">Account currently disabled</td>
	  </tr>
	  <tr>
		<td valign="top">532</td>
		<td valign="top" style="text-align:left;">The specified user account has expired</td>
	  </tr>
	  <tr>
		<td valign="top">533</td>
		<td valign="top" style="text-align:left;">User not allowed to logon at this computer</td>
	  </tr>
	  <tr>
		<td valign="top">534</td>
		<td valign="top" style="text-align:left;">The user has not been granted the requested logon type at this machine</td>
	  </tr>
	  <tr>
		<td valign="top">535</td>
		<td valign="top" style="text-align:left;">The specified account's password has expired</td>
	  </tr>
	  <tr>
		<td valign="top">539</td>
		<td valign="top" style="text-align:left;">Account locked out</td>
	  </tr>
	  <tr>
		<td valign="top">548</td>
		<td valign="top" style="text-align:left;">Domain sid inconsistent</td>
	  </tr>
	  <tr>
		<td valign="top">644</td>
		<td valign="top" style="text-align:left;">User Account Locked Out</td>
	  </tr>
	  <tr>
		<td valign="top">675</td>
		<td valign="top" style="text-align:left;">Pre-authentication failed</td>
	  </tr>
	  <tr>
		<td valign="top">676</td>
		<td valign="top" style="text-align:left;">Authentication Ticket Request Failed</td>
	  </tr>
	  <tr>
		<td valign="top">681</td>
		<td valign="top" style="text-align:left;">The logon to account: &lt;account name&gt; by: &lt;authentication package&gt;<br />from workstation: &lt;workstation name&gt; failed. The error code was: &lt;error code&gt;</td>
	  </tr>
	  <tr>
		<td valign="top">4625</td>
		<td valign="top" style="text-align:left;">An account failed to log on.</td>
	  </tr>
    </tbody>
  </table>
</p><p><br><h3><strong>How this score is calculated:</strong></h3>
<table class=score_explain style="width:30%;">
  <tr align=left>
    <td style="text-align:left">The Intrusion Health check detects if the number of failed login attempts for this computer are below the accepted amount. If the number of failed login attempts is not below the accepted amount, a score of 1% (fail) is given; otherwise a score of 100% is given (success).</td></tr></table>
</p>
</div>
<br></div></div>
<div id="footer">
<p>Copyright &copy; 2015 <a href="http://www.marconet.com/">marconet.com</a></p>
</div>
<script src="../js/progress_bar.js"></script>
</body></html>

