<?php

include "db.php";

$class = $_GET['class'];
$stream = $_GET['stream'];
$term = $_GET['term'];

echo "

<style>

body{
font-family:Arial;
background:#eef2f7;
}

h2{
text-align:center;
}

table{
width:95%;
margin:auto;
border-collapse:collapse;
margin-top:30px;
background:white;
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

th,td{
border:1px solid #ccc;
padding:12px;
text-align:center;
}

th{
background:#002147;
color:white;
}

.time{
background:#d6eaf8;
font-weight:bold;
}

.subject{
background:#d5f5e3;
}

button{
padding:10px 20px;
background:#3498db;
color:white;
border:none;
border-radius:5px;
margin:20px;
cursor:pointer;
}

</style>

";

echo "<h2>$class - $stream Weekly Timetable ($term)</h2>";

echo "<center>
<button onclick='window.print()'>Print Timetable</button>
</center>";

$days = ["Monday","Tuesday","Wednesday","Thursday","Friday"];

/* Get all time slots */
$times_query = $conn->query("
SELECT DISTINCT time_start, time_end 
FROM timetable 
WHERE class='$class' AND stream='$stream' AND term='$term'
ORDER BY time_start
");

$times = [];
while($row = $times_query->fetch_assoc()){
$times[] = $row;
}

/* Build timetable array */
$timetable = [];

$result = $conn->query("
SELECT * FROM timetable 
WHERE class='$class' AND stream='$stream' AND term='$term'
");

while($row = $result->fetch_assoc()){
$timetable[$row['time_start']."-".$row['time_end']][$row['day']] = $row['subject'];
}

/* Table Start */

echo "<table>";

echo "<tr>";
echo "<th>Time</th>";

foreach($days as $day){
echo "<th>$day</th>";
}

echo "</tr>";

foreach($times as $t){

$timeKey = $t['time_start']."-".$t['time_end'];

echo "<tr>";

echo "<td class='time'>".$t['time_start']." - ".$t['time_end']."</td>";

foreach($days as $day){

$subject = $timetable[$timeKey][$day] ?? "-";

echo "<td class='subject'>$subject</td>";

}

echo "</tr>";

}

echo "</table>";

?>