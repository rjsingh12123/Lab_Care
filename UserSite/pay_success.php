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
	
require_once ('phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "parmardhaval104@gmail.com";
$mail->Password = "dh@v@l255216";
$f1=$link->rawQueryOne('select * from booking where Booking_id='.$_SESSION['user']);

$f=0;
$f3=$link->rawQuery('select * from UserReport u,UserTB u1 where u1.UserID=u.UserID and u.UserReportID='.$_GET['ids']);
//$f2=$link->rawQueryOne('select * from UserTB where user_id='.$f1['user_id']);

foreach($f3 as $x)
{
	$f=$f+1;
}
			$email = $f3['Email'];
			
			$users = $link->rawQuery('SELECT * from userTB where gmail_id = ?', Array ($email));
			if($link->count == 0)
			{
				echo "<script>window.location.replace('forgotpassword.php?err=3');</script>";
			}
			else
			{
				
				$var = "<html>
						<head>
						<style>
						.imgclass
						{
							height:20px;
							width:20px;
							vertical-align:bottom;
						}
						</style>
						</head>
									<body>
									<img src='../images/logo-light.png' height='30px' width='100px' alt='Otomeca - car services'/>
										<p>Dear ".$f2['user_name'].",</p></br>
										<table align='center' border=2>
				<thead >
					<tr align='center' style='    background-color: #db2d2e;color:white;'>
						<th colspan='2' style='    padding: 13px;font-size:18px;
    margin-left: 500px;
    padding-left: 199px;
    padding-right: 199px;'>Total Bill  </th>
						
					</tr>
				</thead>
				<tbody>
						
					<tr style='line-height:41px;    color: black;
    font-size: 15px;'>
						<td style='padding-left:9px;'>car brand</td>
						<td style='padding-left:9px;'><span>".$_SESSION['brand']."</span>
					</td>
					</tr>			
					<tr style='line-height:41px;    color: black;
    font-size: 15px;'>
						<td style='padding-left:9px;'>car Model</td>
						<td style='padding-left:9px;'><span>".$_SESSION['model']."</span>
					</td>
					</tr>
								<tr style='line-height:41px;    color: black;
    font-size: 15px;'>
						<td style='padding-left:9px;'>Total Services:- </td>
						<td style='padding-left:9px;'>".$f."</td>
					</tr>
					<tr style='line-height:41px;    color: black;
    font-size: 15px;'>
						<td style='padding-left:9px;'>Booking Date:-</td>
						<td style='padding-left:9px;'><span>".$f1['booking_date']."</span></td>
					</tr>				
					<tr style='line-height:41px;    color: black;
    font-size: 15px;'>
						<td style='padding-left:9px;'>Appointment Date:-</td>
						<td style='padding-left:9px;'><span>".$f1['appointment_date']."</span></td>
					</tr>				
					<tr style='line-height:41px;    color: black;
    font-size: 15px;'>
						<td style='padding-left:9px;'>Appointment Time :-</td>
						<td style='padding-left:9px;'><span>".$f1['appointment_time']."</span></td>
					</tr>

					<tr style='line-height:41px; '>
						<td style='padding-left:9px;'></td>
						<td style='padding-left:9px;'>
					</td>
					</tr>	
					
					<tr style='line-height:60px;'>
						<td style='  background-color: #2b2a2a;
							color: white;
							padding-left: 144px;
							font-size: 19px;'>Total Cost:-</td>
												<td style=' background-color: #2b2a2a;
							color: white;
							padding-left: 9px;
							font-size: 19px;'>".$f1['after_offer_cost']."<span>&#8377; /-</span></td>
					</tr>
				</tbody>
			</table>
					
					<p>Please contact us via email Otomeca@website.com or phone  (007) 123 456 7890.</p></br>
					<p>Connect with us on social media: 
											<a href='https://www.facebook.com'><img src='../images/facebook.png' class='imgclass' height='20px' width='20px' style='vertical-align:bottom;height:20px;width:20px;'/></a>&nbsp;&nbsp;
											<a href='https://www.instagram.com'><img src='../images/instagram.png' class='imgclass' height='20px' width='20px' style='vertical-align:bottom;height:20px;width:20px;'/></a>&nbsp;&nbsp; 
											<a href='https://www.youtube.com'><img src='../images/youtube.png' class='imgclass' height='20px' width='20px' style='vertical-align:bottom;height:20px;width:20px;'/></a>
										</p></br>
					<p>With regards,</p></br>
					<p style='margin:0px;'>Founder& CEO</p></br>
					<p style='margin:0px;'>Shidharth Divetiya</p></br>
					<p style='margin:0px;'>Wish Gourmet Pvt Ltd</p></br>
					<p style='margin:0px;'>Email: otomecacar@gmail.com</p></br>
					<p style='margin:0px;'>Web: Otomeca@website.com</p></br>
					<p style='margin:0px;'>Add:    206 ,Richmond plaza, Above Dhiraj Sons,</p></br>
					<p style='margin:0px;'>Near G.D.Goenka School, </p></br>
					<p style='margin:0px;'> Vesu, Veer Narmad South Gujarat University,</p>
					<p style='margin:0px;'>Surat, Gujarat 395007</p>

				</body>
			</html>";
				$mail->SetFrom("chaudharijigar28@gmail.com","Otomeca");
				$mail->Subject = "Request Accepted";
				
				$mail->MsgHTML($var);
				$mail->AddAddress($email);

				if(!$mail->send())
			  {
			   echo "Mailer Error: " . $mail->ErrorInfo;
			  }
			  else
			  {
			}
		}
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