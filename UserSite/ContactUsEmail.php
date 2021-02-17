<?php
	include "connect.php";
	session_start();
	if(isset($_SESSION['user']))
	{
		$s1=$link->insert('payment',Array('booking_id'=>$_SESSION['user'],'payment_status'=>'Done'));
		if($s1)
		{
			//header('location: ../session_expire.php');
		}
	}
	
require_once ('phpmail/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "labcare506@gmail.com";
$mail->Password = "Labcare1234";
				$mail->SetFrom("parmardhaval375@gmail.com","LabCare");
				$mail->Subject = "LabCare ContactUs";
				$email=$link->rawQueryOne("select * from ContactUs where ContactUsID=".$_GET['id']);
				//$email="parmardhaval375@gmail.com";
				$var="<html>
						<head>
						</head>
						<body>
						<table border='1'>
						   <tr>
						   <td style='background: #0199ed;'>
						       <label style='color: white;'>Email:</label></td><td><span>".$email['EmailID']."</span>
						   </td>
						   </tr>
						   <tr>
						   <td style='background: #0199ed;'>
						       <label style='color: white;'>Query Type:</label></td><td><span>".$email['Query_Type']."</span>
						   </td>
                           </tr>
						   <tr>						   
						   <td style='background: #0199ed;'>
						       <label style='color: white;'>Query:</label></td><td><span>".$email['Write_Your_Query']."</span>
						   </td>
						   </tr>
						</table>
						</body>
						</html>";
				$mail->MsgHTML($var);
				$mail->AddAddress("labcare507@gmail.com");

				if(!$mail->send())
			  {
			   echo "Mailer Error: " . $mail->ErrorInfo;
			  }
			  else
			  {

		}
			   header("location:index.php");
		//header('location: new_successfully.php');
?>
<div id="myModal" class="modal fade in" style="display: block;">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons"></i>
				</div>				
				<h4 class="modal-title">Awesome!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">Your booking has been confirmed. Check your email for detials.</p>
			</div>
			<div class="modal-footer">
				<a href="../session_expire.php">Go To home Page</a>
			</div>
		</div>
	</div>
</div>