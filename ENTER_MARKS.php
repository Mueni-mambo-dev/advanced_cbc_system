<?php

include "db.php";

echo "

<style>

body{
font-family:Arial;
background:#f4f6f9;
}

h2{
text-align:center;
}

table{
width:85%;
margin:auto;
border-collapse:collapse;
background:white;
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

th,td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

th{
background:#002147;
color:white;
}

.ee{
background:#d5f5e3;
}

.me{
background:#fcf3cf;
}

.ae{
background:#fadbd8;
}

.be{
background:#f5b7b1;
}

button{
background:#3498db;
color:white;
border:none;
padding:10px 20px;
margin:20px;
border-radius:5px;
cursor:pointer;
}

</style>

";

if(isset($_POST['student_id'])){

$student_id = $_POST['student_id'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];
$term = $_POST['term'];
$year = $_POST['year'];

if($marks >= 75){

$grade = "EE";

}elseif($marks >= 50){

$grade = "ME";

}elseif($marks >= 25){

$grade = "AE";

}else{

$grade = "BE";

}

$sql = "INSERT INTO marks(student_id,subject,marks,term,year,grade)
VALUES('$student_id','$subject','$marks','$term','$year','$grade')";

$conn->query($sql);

echo "<h2>Marks Saved Successfully (Grade: $grade)</h2>";

}

echo "

<h2>Student Marks Records</h2>

<center>
<button onclick='window.print()'>Print Marks</button>
</center>

";

$result = $conn->query("SELECT * FROM marks");

echo "

<table>

<tr>

<th>Student ID</th>
<th>Subject</th>
<th>Marks</th>
<th>CBC Grade</th>
<th>Term</th>
<th>Year</th>

</tr>

";

while($row = $result->fetch_assoc()){

$class="";

if($row['grade']=="EE") $class="ee";
if($row['grade']=="ME") $class="me";
if($row['grade']=="AE") $class="ae";
if($row['grade']=="BE") $class="be";

echo "<tr class='$class'>";

echo "<td>".$row['student_id']."</td>";
echo "<td>".$row['subject']."</td>";
echo "<td>".$row['marks']."</td>";
echo "<td>".$row['grade']."</td>";
echo "<td>".$row['term']."</td>";
echo "<td>".$row['year']."</td>";

echo "</tr>";

}

echo "</table>";

?>