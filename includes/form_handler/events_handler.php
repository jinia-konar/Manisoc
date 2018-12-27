
<?php 
   $fname1="";
   $lname1="";
   $mname1="";
   $em="";
   $college="";
   $year="";
   $cn="";
   $error_array=array();
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

      $college= strip_tags($_POST['college']);
      $college=str_replace(' ', '', $college);
      $college=ucfirst(strtolower($college));
         $_SESSION['college']= $college;

   	$em= strip_tags($_POST['email']);
   	$em=str_replace(' ','', $em);
   		$_SESSION['email']= $em;

      $year=$_POST['year'];
      $cn=$_POST['cn'];

   	 if(strlen($fname1)>25|| strlen($fname1)<2)
   	 {
   	 	array_push( $error_array,"Your first name must be in between 2 and 25 characters<br>"); 
   	 }

   	  if(strlen($lname1)>25|| strlen($lname1)<2)
   	 {
   	 	array_push( $error_array,"Your last name must be in between 2 and 25 characters<br>"); 
   	 }
   
   if(empty($error_array))
   {
         
   	$query=mysqli_query($con,"INSERT INTO events VALUES ('','$fname1','$mname1','$lname1','$college','$em','$year','$cn')");
   	array_push( $error_array,"<span style='color:#14C800'>you have successfully registered for this site!! </span> <br>");
   	$_SESSION['fname']="";
   	$_SESSION['mname']="";
   	$_SESSION['lname']="";
   	$_SESSION['email']="";
      $_SESSION['college']="";
      $_SESSION['year']="";
      $_SESSION['cn']="";
   	
   }
}

  
 ?>