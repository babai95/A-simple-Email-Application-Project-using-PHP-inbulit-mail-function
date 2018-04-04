<?php
//initialise the variables with form data
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];

//print the received info into the browser
echo "<p>you entered the following details:</p>";
echo $first_name . "<br/>";
echo $last_name . "<br/>";
echo $email . "<br/>";

//open a connection with database
include("connect.php");

//write your TSQL and save it in a variable
$query= "Insert into mailinglist (id,first_name,last_name,email)"."values(NULL, '$first_name','$last_name','$email')";

//query the db
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

//test and confirm success
if($result==1){
	echo "<br/>you have been successfully added to the mailing list";	
}else{
	echo "<br/>error occured";
}

//close the connection
mysqli_close($dbc);
?>
