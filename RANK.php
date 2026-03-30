<?php

include "db.php";

$class = $_GET['class'];
$term = $_GET['term'];
$year = $_GET['year'];

echo "

<style>

body{
font-family:Arial;
background:#f4f6f9;
}

.title{
text-align:center;
margin-top:20px;
}

table{
width:80%;
margin:auto;
border-collapse:collapse;
background:white;
box-shadow:0 5px 10px rgba(0,0,0,0.2);
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

.top1{
background:#ffd700;
font-weight:bold;
}

.top2{
background:#c0c0c0;
font-weight:bold;
}

.top3{
background:#cd7f32;
font-weight:bold;
}

button{
background:#27ae60;
color:white;
border:none;
padding:10px 20px;
margin:20px;
cursor:pointer;
border-radius:5px;
}

</style>

";

echo "<div class='title'>
<h2>Student Ranking - $class ($term $year)</h2>

<button onclick='window.print()'>Print Ranking</button>

</div>";

$sql = "

SELECT 
students.id,
students.name,
AVG(marks.marks) AS average_marks

FROM marks

JOIN students
ON students.id = marks.student_id

WHERE students.class='$class'
AND marks.term='$term'
AND marks.year='$year'

GROUP BY students.id

ORDER BY average_marks DESC

";

$result = $conn->query($sql);

echo "

<table>

<tr>
<th>Rank</th>
<th>Student Name</th>
<th>Average Marks</th>
<th>CBC Grade</th>
<th>Award</th>
</tr>

";

$rank = 1;

while($row = $result->fetch_assoc()){

$avg = $row['average_marks'];

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

$classStyle="";

$award="";

if($rank==1){
$classStyle="top1";
$award="🥇 Top Student";
}
elseif($rank==2){
$classStyle="top2";
$award="🥈 Second";
}
elseif($rank==3){
$classStyle="top3";
$award="🥉 Third";
}

echo "<tr class='$classStyle'>";

echo "<td>".$rank."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".round($avg,2)."</td>";
echo "<td>".$grade."</td>";
echo "<td>".$award."</td>";

echo "</tr>";

$rank++;

}

echo "</table>";

?>