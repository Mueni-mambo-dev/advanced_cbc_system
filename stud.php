<?php

include "db.php";

$name=$_POST['name'];
$class=$_POST['class'];
$stream=$_POST['stream'];
$phone=$_POST['phone'];

$conn->query("INSERT INTO students(name,class,stream,parent_phone)
VALUES('$name','$class','$stream','$phone')");

echo "Student Added";

?>