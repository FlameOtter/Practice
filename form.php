<!DOCTYPE html>
<html lang="en">
<head>
	<title>Database</title>
</head>
<body>
		<h1>Contact us</h1>
		<form action="" method="post">
			
<p>       <select name = "category" id="category" placeholder = "Customer service">
            <option>Customer Service</option>
            <option>Finance</option>
            <option>Trade Business Accounts</option>
        </select>
        <br>
			</p>

<p>
			<label for="emailAddress">Email Address</label>
			<input type="text" name="email" id="emailAddress">
			</p>

			
<p>
			<label for="message">Message</label>
			<input type="text" name="message" id="messageBox">
			</p>

			<input type="submit" value="Submit">
		</form>




<?php
//var_dump(date("Y/m/d"));
//exit();

$conn = mysqli_connect("localhost", "root", "", "message_db");

if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$category = $_POST['category'];
$email_address = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO customers VALUES ('" . $category . "',
    '$email_address','$message', '" . (string)date("Y/m/d H:i:s")  . "')";
    

if(mysqli_query($conn, $sql)){
    echo "<h3>data stored in a database successfully."
        . " Please browse your localhost php my admin"
        . " to view the updated data</h3>";

    echo nl2br("\n$category\n $email_address\n "
        . "$message");
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>
