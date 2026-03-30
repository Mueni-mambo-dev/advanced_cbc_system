<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");
if($conn->connect_error) die("DB Connection failed: " . $conn->connect_error);

if(isset($_POST['submit'])){
    $date = $_POST['attendance_date'];

    $result = $conn->query("
        SELECT t.name, a.status 
        FROM teacher_attendance a
        JOIN teachers t ON a.teacher_id = t.id
        WHERE a.attendance_date = '$date'
        ORDER BY t.name ASC
    ");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Teacher Attendance Report</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #eef2f7;
    padding: 30px;
}
h2 {
    text-align: center;
    color: #003366;
    margin-bottom: 20px;
}
table {
    width: 60%;
    margin: 20px auto;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
th, td {
    border: 1px solid #003366;
    padding: 12px;
    text-align: center;
}
th {
    background: #003366;
    color: white;
}
tr:nth-child(even) {
    background: #f2f2f2;
}
.back-link {
    display: block;
    text-align: center;
    margin: 20px auto;
    padding: 12px 25px;
    background: #003366;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
}
.back-link:hover {
    background: #001f4d;
}
.message {
    text-align: center;
    color: red;
    font-size: 18px;
    margin-top: 20px;
}
</style>
</head>
<body>

<h2>Teacher Attendance for <?php echo $date ?? ''; ?></h2>

<?php
if(isset($result)){
    if($result->num_rows > 0){
        echo "<table>";
        echo "<tr><th>Teacher Name</th><th>Status</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='message'>No attendance data found for this date.</p>";
    }
}
?>

<a href="TRS_ATTENDANCE_REPORT.html" class="back-link">Back</a>

</body>
</html>
