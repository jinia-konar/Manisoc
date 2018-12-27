
<?php 
   $fname1="";
   $lname1="";
   $mname1="";
   $username="";
   $em="";
   $em2="";
   $password11="";
   $password21="";
   $error_array=array();
   $date1="";
   if(isset($_POST['register']))
   {
   	$fname1= strip_tags($_POST['fname']);
   	$fname1=str_replace(' ', '', $fname1);
   	$fname1=ucfirst(strtolower($fname1));
   	$_SESSION['fname']= $fname1;

   	$lname1= strip_tags($_POST['lname']);
   	$lname1=str_replace(' ', '', $lname1);
   	$lname1=ucfirst(strtolower($lname1));
   		$_SESSION['lname']= $lname1;

   	$mname1= strip_tags($_POST['mname']);
   	$mname1=str_replace(' ', '', $mname1);
   	$mname1=ucfirst(strtolower($mname1));
   		$_SESSION['mname']= $mname1;

   	$em= strip_tags($_POST['email1']);
   	$em=str_replace(' ','', $em);
   		$_SESSION['email1']= $em;

   	$em2= strip_tags($_POST['email2']);
   	$em2=str_replace(' ','', $em2);
   	$_SESSION['email2']= $em2;

   	$password11= strip_tags($_POST['password1']);

   	$password21= strip_tags($_POST['password2']);

   	$date1=date("Y-m-d");
   	 if($em == $em2)
   	 {
   	 	
   	 	if(filter_var($em,FILTER_VALIDATE_EMAIL))
   	 	{
   	 		$em=filter_var($em,FILTER_VALIDATE_EMAIL);

   	 		$e_check=mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
   	 		$num_rows= mysqli_num_rows($e_check);
   	 		if($num_rows>0)
   	 		{
   	 			array_push( $error_array, "EMAIL IS ALREADY IN USE!!<br>") ; 
   	 		}
   	 	}
   	 	else
   	 	{
   	 		array_push( $error_array,"format of email is not valid<br>");
   	 	}


   	 }
   	 else
   	 {
   	 	array_push( $error_array, "EMAILS DON'T MATCH<br>");
   	 }
   	 if(strlen($fname1)>25|| strlen($fname1)<2)
   	 {
   	 	array_push( $error_array,"Your first name must be in between 2 and 25 characters<br>"); 
   	 }

   	  if(strlen($lname1)>25|| strlen($lname1)<2)
   	 {
   	 	array_push( $error_array,"Your last name must be in between 2 and 25 characters<br>"); 
   	 }
   	 if($password11 != $password21)
   	 {
   	 	array_push( $error_array," Your password dont match<br>");
   	 }
   	 else
   	 {
   	 	if(preg_match('/[^A-Za-z0-9]/', $password11))
   	 	{
   	 		array_push( $error_array,"your password can only contain alphabetes and numbers<br>");
   	 	}
   	 	if(strlen($password11)>30||strlen($password11)<2)
   	 		array_push( $error_array,"the length of the password must be in between 2 and 30<br>");
   	 }
   
   if(empty($error_array))
   {
   	$password11=md5($password11);
   	$username= strtolower($fname1." ". $lname1);
   	$check_username_query= mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
   	$i=0;
   	while(mysqli_num_rows($check_username_query)!=0)
   	{
   		$i++;
   	    $username= strtolower($fname1." ". $lname1)."_".$i;
   	  	$check_username_query= mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
   	}
         

   	$query=mysqli_query($con,"INSERT INTO users VALUES ('','$fname1','$mname1','$lname1','$username','$em','$password11','no','$date1')");
   	array_push( $error_array,"<span style='color:#14C800'>you have successfully registered for this site!! </span> <br>");
   	$_SESSION['fname']="";
   	$_SESSION['mname']="";
   	$_SESSION['lname']="";
   	$_SESSION['email1']="";
   	$_SESSION['email2']="";
   }
}

  
 ?>