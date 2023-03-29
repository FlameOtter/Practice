<!DOCTYPE html>
<html lang="en">
<head>
	<title>Database</title>
</head>
<body>

<link rel="stylesheet" href="style.css">

		<h1 class = "header" >Contact us</h1>
		<form action="" method="post">
			
        <div class ="cat-title">
        <label for="cat-title">Category</label>
        </div>

<p class ="cat-box">       
    
        <select name = "category" id="category" placeholder = "Customer service">
            <option>Customer Service</option>
            <option>Finance</option>
            <option>Trade Business Accounts</option>
        </select>
        <br>
			</p>

<p class = "email">

			<label for="emailAddress">Email</label>
        </p>
            
            <p class = "email-box">
			<input type="text" name="email" id="emailAddress">
			</p>

			
<p class = "message" >
			<label for="message">Message</label>
            </p>

            <div class = "text-box">
			<input type="text" name="message" id="messageBox">
			</div>
<div class ="submit">
			<input type="submit" value="Submit">
</div>

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
