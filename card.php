<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "your_db_name"); // change your_db_name

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Check form submission
if(isset($_POST['submit'])){
    $student_id = $_POST['student_id'];
    $term = $_POST['term'];
    $year = $_POST['year'];

    // Fetch student info
    $student = $conn->query("SELECT * FROM students WHERE id=$student_id")->fetch_assoc();

    // Fetch student's marks for the selected term and year
    $marks = $conn->query("SELECT * FROM marks WHERE student_id=$student_id AND term='$term' AND year='$year'");

    echo "<h2 style='text-align:center;'>Report Card for {$student['name']} - $term $year</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0' style='margin:auto; border-collapse:collapse;'>";
    echo "<tr style='background:#007bff; color:white;'><th>Subject</th><th>Marks</th></tr>";

    while($row = $marks->fetch_assoc()){
        echo "<tr><td>{$row['subject']}</td><td>{$row['marks']}</td></tr>";
    }

    echo "</table>";
    echo "<p style='text-align:center; margin-top:20px;'><a href='report_card.html'>Back to Form</a></p>";
}
?>
