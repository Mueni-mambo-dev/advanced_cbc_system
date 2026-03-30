<?php

include "db.php";

$subject=$_POST['subject'];

$conn->query("INSERT INTO subjects(subject_name)
VALUES('$subject')");

echo "Subject Added";

?>