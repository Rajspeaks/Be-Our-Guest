<?php
session_start();
include 'dbCon.php';
$con = connect();
$id = $_GET['id'];
$email = $_GET['email'];
$auth = $_GET['auth'];

if (isset($_GET['view'])) {
	# code... 
	if (isset($_GET['resend'])) {
		# code...
		include 'dashboard/mailSender.php'; 
		$mail->Body = '<html><body>
			Verify your account.. click the link below.
			http://localhost/tablereservation/verifyaccount.php?email='.$email.'&id='.$id.'&auth='.$auth.'
			</body></html>'; 
		$mail->addAddress($email, "Booking Approve");
		if($mail->send()) {
			echo '<script>alert("Email Confirmation is already sent. Please check you email.")</script>';
			echo '<script>window.location="verifyaccount.php?view=verifyaccount&email='.$email.'&id='.$id.'&auth='.$auth.'"</script>';
		//   	echo '<script>alert("Restaurant added successfully")</script>';
		// echo '<script>window.location="login.php"</script>';
		}else{
			echo '<script>alert("Email is not valid")</script>';
			echo '<script>window.location="login.php"</script>';
	    } 

	}else{
		echo '<a href="verifyaccount.php?view=view&resend=resend&email='.$email.'&id='.$id.'&auth='.$auth.'">Resend Email Confirmation</a>'; 
	}

}else{
	$sql ="UPDATE `restaurant_info` SET  `approve_status`=1 WHERE `id`=".$id;
	$res = $con->query($sql);
	 

	    $_SESSION['isLoggedIn'] = TRUE;

	    $SQL = "SELECT * FROM restaurant_info WHERE email = '$email' And password = '$auth' AND approve_status=1"; 
	    $result = $con->query($SQL);

	    foreach ($result as $r) {
	      $_SESSION['id'] = $r['id'];
	      $_SESSION['name'] = $r['restaurent_name'];   
	      $_SESSION['phone'] = $r['phone'];
	      $_SESSION['email'] = $r['email'];
	      $_SESSION['password'] = $r['password'];
	      $_SESSION['role'] = $r['role'];
	    }

	  echo '<script>window.location="index.php"</script>';
 

}
 
?>