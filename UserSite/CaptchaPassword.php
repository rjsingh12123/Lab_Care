<?php
 include 'connect.php';
 session_start();
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LfhsqYUAAAAALTCw3D4848PU1aXweg4qP7LjQ2f',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        ?>
		<?php $err1='<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
		
    } else {
        
	 $FirstName=$_POST['FirstName'];
	 $LastName=$_POST['LastName'];
	 $Gender=$_POST['GenderId'];
	 $MobileNumber=$_POST['MobileNumber'];
	 $Email=$_POST['Email'];
	 $Address=$_POST['Address'];
	 $country=$_POST['country'];
	 $state=$_POST['state'];
	 $city=$_POST['city'];
	 $Age=$_POST['Age'];
	 $Password=$_POST['Password'];
	 $confirm=$_POST['ConfirmPassword'];
	 
	 $j=$link->insert("UserTB",Array("First_Name"=>$FirstName,"Last_Name"=>$LastName,"Gender"=>$Gender,"Gender"=>$Gender,"Mobile_Number"=>$MobileNumber,"Email"=>$Email,"Address"=>$Address,"CountryID"=>$country,"StateID"=>$state,"CityID"=>$city,"Age"=>$Age,"Password"=>$confirm)); 
	 
	 //$x=$link->insert("UserReportTB",Array("VendorID"=>0,"TestID"=>0,"DiseaseID"=>0,"PackageID"=>0,"Collection_Date"=>0,"From_Collection_Time"=>0,"To_Collection_Time"=>0,"IsPaid"=>'Pennding',"Status"=>"initial","Is_Active"=>0,"IsUpload"=>0));
	 //$x1=$link->insert("userreortpackagetb",Array("VendorID"=>0,"PackageID"=>0,"Collection_Date"=>0,"From_Collection_Time"=>0,"To_Collection_Time"=>0,"IsPaid"=>'Pennding',"Status"=>"initial","Is_Active"=>0,"IsUpload"=>0));
	 if($j)
	 {
		 if(isset($err1)){
			$err1='<p>Please go back and make sure you check the security CAPTCHA box.</p><br>'; 
		 }else{header("location:Login.php");}
	 }
     else
	 {
         header("location:Login.php");
	 }
		
    //    echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }
} else { ?>
    
<!-- FORM GOES HERE -->
<form></form>

<?php } 
?>