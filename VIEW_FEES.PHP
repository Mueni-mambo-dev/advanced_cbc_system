<?php

include "db.php";

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
width:90%;
margin:auto;
border-collapse:collapse;
margin-top:30px;
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

.paid{
background:#d5f5e3;
}

.pending{
background:#fadbd8;
}

.summary{
width:80%;
margin:auto;
display:flex;
justify-content:space-around;
margin-top:20px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 5px 10px rgba(0,0,0,0.2);
width:25%;
text-align:center;
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

$class = $_GET['class'] ?? '';
$term = $_GET['term'] ?? '';
$year = $_GET['year'] ?? '';

$query = "

SELECT 
students.id,
students.name,
students.class,
SUM(fees.total_fees) AS total_required,
SUM(fees.amount_paid) AS total_paid,
SUM(fees.balance) AS total_balance

FROM students

LEFT JOIN fees ON students.id = fees.student_id

WHERE 1
";

if($class != ""){
$query .= " AND students.class='$class'";
}

if($term != ""){
$query .= " AND fees.term='$term'";
}

if($year != ""){
$query .= " AND fees.year='$year'";
}

$query .= " GROUP BY students.id ORDER BY total_balance DESC";

$result = $conn->query($query);

$total_all = 0;
$total_paid = 0;
$total_balance = 0;

$data = [];

while($row = $result->fetch_assoc()){

$total_all += $row['total_required'];
$total_paid += $row['total_paid'];
$total_balance += $row['total_balance'];

$data[] = $row;

}

echo "<h2>Fees Summary Report</h2>";

echo "

<div class='summary'>

<div class='card'>
<h3>Total Fees Required</h3>
<p>$total_all</p>
</div>

<div class='card'>
<h3>Total Paid</h3>
<p>$total_paid</p>
</div>

<div class='card'>
<h3>Total Balance</h3>
<p>$total_balance</p>
</div>

</div>

<center>
<button onclick='window.print()'>Print Report</button>
</center>

";

echo "

<table>

<tr>
<th>Student Name</th>
<th>Class</th>
<th>Total Fees</th>
<th>Amount Paid</th>
<th>Balance</th>
<th>Status</th>
</tr>

";

foreach($data as $row){

$status = "";
$classStyle = "";

if($row['total_balance'] == 0){
$status = "Fully Paid";
$classStyle = "paid";
}else{
$status = "Pending";
$classStyle = "pending";
}

echo "<tr class='$classStyle'>";

echo "<td>".$row['name']."</td>";
echo "<td>".$row['class']."</td>";
echo "<td>".($row['total_required'] ?? 0)."</td>";
echo "<td>".($row['total_paid'] ?? 0)."</td>";
echo "<td>".($row['total_balance'] ?? 0)."</td>";
echo "<td>".$status."</td>";

echo "</tr>";

}

echo "</table>";

?>