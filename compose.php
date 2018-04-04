<?php
//hardcode the admin's email
$from="me@gmail.com";
//store the form values
$body=$_POST['body'];
$subject=$_POST['subject'];

//for feedback
echo "From: " .$from ."<br/>";
echo "Subject: " .$subject ."<hr/>";

//open db connection
include("connect.php");

//compose the tsql
$query="Select first_name, last_name, email from mailinglist";

//run the query
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

while($row=mysqli_fetch_array($result)){
  $first_name=$row['first_name'];
  $last_name=$row['last_name'];
  $to=$row['email'];

  $msg="Dear ". $first_name ." ". $last_name."<br/>".$body;
  mail($to, $subject, $msg,'From:'.$from);

  //more feedback
  echo "mail sent to:".$to. "<br/>";
  echo $msg."<hr/>";
}

//confirmation
if(count($result)>0){
  echo "<br/>you have successfully emailed your message";
}
else
{
  echo "<br/>error has occured";
}

//close db
mysqli_close($dbc);

