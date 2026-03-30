<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");
if($conn->connect_error) die("DB Connection failed: " . $conn->connect_error);

// Fetch all teachers
$result = $conn->query("SELECT * FROM teachers ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All Teachers</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #eef2f7;
    padding: 30px;
}
h2 {
    text-align: center;
    color: #003366;
    margin-bottom: 30px;
}
.table-container {
    max-width: 900px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    border: 1px solid #003366;
    padding: 12px;
    text-align: left;
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
    margin: 20px auto 0 auto;
    padding: 12px 25px;
    background: #003366;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
}
.back-link:hover {
    background: #001f4d;
}
</style>
</head>
<body>

<h2>All Teachers in the School</h2>

<div class="table-container">
<?php
if($result->num_rows > 0){
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Email</th>
            <th>Phone</th>
          </tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['subject']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center;color:red;font-size:18px;'>No teachers found.</p>";
}
$conn->close();
?>
</div>

<a href="VIEW_TRS.html" class="back-link">Back</a>

</body>
</html>
