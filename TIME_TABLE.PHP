<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");
if($conn->connect_error) die("DB Connection failed: " . $conn->connect_error);

if(isset($_POST['submit'])){
    $class_level = $_POST['class_level'];
    $day = $_POST['day'];
    $periods = [
        $_POST['period1'],
        $_POST['period2'],
        $_POST['period3'],
        $_POST['period4'],
        $_POST['period5']
    ];

    $stmt = $conn->prepare("INSERT INTO timetable (class_level, day, period1, period2, period3, period4, period5) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $class_level, $day, $periods[0], $periods[1], $periods[2], $periods[3], $periods[4]);

    if($stmt->execute()){
        $message = "Timetable added successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Class Timetable</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #eef2f7;
    padding: 30px;
}
.message-box {
    max-width: 600px;
    margin: auto;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    text-align: center;
    font-size: 18px;
    color: #003366;
}
.back-link {
    display: block;
    margin-top: 20px;
    text-decoration: none;
    color: white;
    background: #003366;
    padding: 12px;
    border-radius: 6px;
}
.back-link:hover {
    background: #001f4d;
}

/* Timetable Table Styling */
.timetable-table {
    width: 90%;
    margin: 40px auto;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
.timetable-table th, .timetable-table td {
    border: 1px solid #003366;
    padding: 12px;
    text-align: center;
}
.timetable-table th {
    background: #003366;
    color: white;
}
.timetable-table tr:nth-child(even) {
    background: #f2f2f2;
}
</style>
</head>
<body>

<div class="message-box">
    <?php echo $message ?? ''; ?>
    <a href="TIME_TABLE.html" class="back-link">Add Another Timetable</a>
</div>

<?php
// Display timetable
$result = $conn->query("SELECT * FROM timetable ORDER BY class_level, FIELD(day,'Monday','Tuesday','Wednesday','Thursday','Friday')");

if($result->num_rows > 0){
    echo '<table class="timetable-table">';
    echo '<tr><th>Class</th><th>Day</th><th>Period 1</th><th>Period 2</th><th>Period 3</th><th>Period 4</th><th>Period 5</th></tr>';
    while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['class_level'].'</td>';
        echo '<td>'.$row['day'].'</td>';
        echo '<td>'.$row['period1'].'</td>';
        echo '<td>'.$row['period2'].'</td>';
        echo '<td>'.$row['period3'].'</td>';
        echo '<td>'.$row['period4'].'</td>';
        echo '<td>'.$row['period5'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
}
$conn->close();
?>

</body>
</html>
