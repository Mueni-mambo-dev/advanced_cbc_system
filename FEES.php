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

.paid{
background:#d5f5e3;
}

.balance{
background:#fadbd8;
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
$term = $_POST['term'];
$total_fees = $_POST['total_fees'];
$amount_paid = $_POST['amount_paid'];

$balance = $total_fees - $amount_paid;

$sql="INSERT INTO fees(student_id,term,amount_paid,balance)
VALUES('$student_id','$term','$amount_paid','$balance')";

$conn->query($sql);

echo "<h2>Payment Saved Successfully</h2>";

}

echo "

<h2>Student Fee Records</h2>

<center>
<button onclick='window.print()'>Print Fee Records</button>
</center>

";

$result = $conn->query("SELECT * FROM fees");

echo "

<table>

<tr>

<th>Student ID</th>
<th>Term</th>
<th>Amount Paid</th>
<th>Balance</th>
<th>Status</th>

</tr>

";

while($row = $result->fetch_assoc()){

$status="";

$class="balance";

if($row['balance']==0){

$status="Fully Paid";

$class="paid";

}else{

$status="Balance Pending";

}

echo "<tr class='$class'>";

echo "<td>".$row['student_id']."</td>";
echo "<td>".$row['term']."</td>";
echo "<td>".$row['amount_paid']."</td>";
echo "<td>".$row['balance']."</td>";
echo "<td>".$status."</td>";

echo "</tr>";

}

echo "</table>";

?>