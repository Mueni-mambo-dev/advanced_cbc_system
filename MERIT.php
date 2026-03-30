<?php

include "db.php";

$class = $_GET['class'];
$term = $_GET['term'];
$year = $_GET['year'];

echo "<style>

body{
font-family:Arial;
background:#eef2f7;
}

h2{
text-align:center;
}

table{
width:80%;
margin:auto;
border-collapse:collapse;
background:white;
}

th,td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}

th{
background:#002147;
color:white;
}

button{
padding:10px;
background:#27ae60;
color:white;
border:none;
margin:20px;
}

</style>";

echo "<h2>Merit List - $class ($term $year)</h2>";

echo "<center><button onclick='window.print()'>Print Merit List</button></center>";

$sql = "

SELECT 
students.id,
students.name,
AVG(marks.marks) AS average

FROM marks

JOIN students
ON students.id = marks.student_id

WHERE students.class='$class'
AND marks.term='$term'
AND marks.year='$year'

GROUP BY students.id

ORDER BY average DESC

";

$result = $conn->query($sql);

echo "<table>";

echo "<tr>
<th>Rank</th>
<th>Student ID</th>
<th>Name</th>
<th>Average Marks</th>
<th>CBC Grade</th>
</tr>";

$rank = 1;

while($row = $result->fetch_assoc()){

$avg = $row['average'];

if($avg >= 75){
$grade = "EE";
}
elseif($avg >= 50){
$grade = "ME";
}
elseif($avg >= 25){
$grade = "AE";
}
else{
$grade = "BE";
}

echo "<tr>";

echo "<td>".$rank."</td>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".round($avg,2)."</td>";
echo "<td>".$grade."</td>";

echo "</tr>";

$rank++;

}

echo "</table>";

?>