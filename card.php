<?php

include "db.php";

$id=$_GET['id'];

echo "<button onclick='window.print()'>Print</button>";

$result=$conn->query("SELECT subject,marks,grade
FROM marks WHERE student_id='$id'");

echo "<h2>CBC Report Card</h2>";

while($row=$result->fetch_assoc()){

echo $row['subject']." : ".
$row['marks']." Grade ".
$row['grade']."<br>";

}

?>