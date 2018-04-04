
<?php
//here 1st we use signup.php template and then make the necessary changes.
$email=$_POST['email'];

echo $email . "<br/>";

//open a connection with database
include("connect.php");

//write your TSQL and save it in a variable
$query= "Delete from mailinglist where (email='$email')";

//query the db
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

//test and confirm success
if($result==1){
	echo "<br/>you have successfully removed " .$email;	
}else{
	echo "<br/>error occured";
}

//close the connection
mysqli_close($dbc);
?>
