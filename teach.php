<?php

include "db.php";

$name=$_POST['name'];
$subject=$_POST['subject'];

$conn->query("INSERT INTO teachers(name,subject)
VALUES('$name','$subject')");

echo "Teacher Added";

?>