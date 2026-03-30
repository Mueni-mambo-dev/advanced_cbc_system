<?php

include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
WHERE username='$username'
AND password='$password'";

$result = $conn->query($sql);

if($result->num_rows > 0){

$row = $result->fetch_assoc();

echo "

<style>

body{
font-family:Arial;
background:#eef2f7;
text-align:center;
padding-top:100px;
}

.box{
background:white;
padding:40px;
width:400px;
margin:auto;
border-radius:10px;
box-shadow:0 10px 20px rgba(0,0,0,0.2);
}

a{
display:inline-block;
margin-top:20px;
padding:10px 20px;
background:#1abc9c;
color:white;
text-decoration:none;
border-radius:5px;
}

</style>

<div class='box'>

<h2>Login Successful</h2>

<p>Welcome ".$row['username']."</p>

<a href='index.html'>Go to Dashboard</a>

</div>

";

}else{

echo "

<style>

body{
font-family:Arial;
background:#f4f6f9;
text-align:center;
padding-top:100px;
}

.error{
background:white;
padding:40px;
width:400px;
margin:auto;
border-radius:10px;
box-shadow:0 10px 20px rgba(0,0,0,0.2);
}

a{
display:inline-block;
margin-top:20px;
padding:10px 20px;
background:#e74c3c;
color:white;
text-decoration:none;
border-radius:5px;
}

</style>

<div class='error'>

<h2>Login Failed</h2>

<p>Invalid Username or Password</p>

<a href='login.html'>Try Again</a>

</div>

";

}

?>